window._ = require('lodash');

try {
   window.Popper = require('popper.js').default;
   window.$ = window.jQuery = require('jquery');

   require('bootstrap');
} catch (e) {
}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
   broadcaster: 'pusher',
   key: '167de64f4fbd3b7d931e',
   cluster: 'ap2',
   authEndpoint: 'http://localhost:8080/realtime_chatapp/public/broadcasting/auth'
});