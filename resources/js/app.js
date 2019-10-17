import Echo from "laravel-echo/dist/echo";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll);
Vue.component('message', require('./components/message.vue').default);
const app = new Vue({
       el: '#app',

       data: {
          message: '',
          onlineUsers: [],
          chat: {
             message: [],
             user: [],
             color: [],
          },
          typing: ''
       },
       watch: {
          message() {
             window.Echo.private('chat')
                 .whisper('typing', {
                    name: this.message
                 });
          }
       },
       methods:
           {
              send() {
                 if (this.message.length !== 0) {
                    this.chat.message.push(this.message);
                    this.chat.user.push('You');
                    this.chat.color.push('success');
                    axios.post('/realtime_chatapp/public/send', {
                       message: this.message
                    })
                        .then(response => {
                           //console.log(response);
                           this.message = '';
                        })
                        .catch(error => {
                           console.log(error);
                        });

                 }
              }
           },

       mounted() {

          window.Echo.private('chat')
              .listen('ChatEvent', (e) => {
                 this.chat.message.push(e.message);
                 this.chat.user.push(e.user);
                 this.chat.color.push('warning');
              })
              .listenForWhisper('typing', (e) => {

                 if (e.name !== '') {
                    this.typing = 'Typing...';
                 } else {
                    this.typing = '';
                 }
              });
          window.Echo.join('chat')
              .here((users) => {
                 this.onlineUsers = users;
                 // console.log(users);
              })
              .joining((user) => {

                 this.onlineUsers.push(user);
                 // console.log(user.name + " joined");
              })
              .leaving((user) => {

                 let index = this.onlineUsers.indexOf(user.name);
                 this.onlineUsers.splice(index, 1);
                 // console.log(user.name + " leaved");
              })

       }
    })
;