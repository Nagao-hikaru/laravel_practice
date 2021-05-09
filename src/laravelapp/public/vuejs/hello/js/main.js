Vue.component('hello-component', {
  template: '<p>Hello</p>',
})

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
