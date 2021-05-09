var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue.js',
  },
  methods: {
  	onclick: function() {
    	// alert('onclick!');
      this.now = new Date().toLocaleString();
    }
  }
})

// var app = new Vue({
//   el: '#app',
//   data: {
//     message: 'Hello Vue.js',
//     count: 0,
//     toggle: true,
//     colors: ['Red', 'Green', 'Blue'],
//     user: {
//       firstname: 'tarou',
//       lastname: 'yamada',
//       age: 20,
//     }
//   }
// });