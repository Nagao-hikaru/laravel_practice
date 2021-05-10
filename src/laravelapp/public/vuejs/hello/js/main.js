Vue.component('component-js', {
  template: '<a>Hello.js</a>',
})

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue.js',
    now: '',
    user: {
      js: 'JavaScript',
      ruby: 'Ruby', 
      python: 'Python',
    }
  },
  methods: {
  	onclick: function() {
    	// alert('onclick!');
      this.now = new Date().toLocaleString();
    }
  }
})
