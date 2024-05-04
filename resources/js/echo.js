import Echo from 'laravel-echo'

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: '1bc33a1dbfb769043e5f',
  cluster: 'ap2',
  forceTLS: true
});




