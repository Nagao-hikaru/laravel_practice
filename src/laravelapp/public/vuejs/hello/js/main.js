var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue.js',
    count: 0,
    user: {
      lastname: 'yamada',
      firstname: 'syouta',
      prefecture: 'Tokyo',
    },
    colors: [
      'Red',
      'Green',
      'Blue',
    ]
  }
})