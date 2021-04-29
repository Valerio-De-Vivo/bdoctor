
var app = new Vue({
  el: '#app',
  data: {
    lasciaRecensione: false,
    filtered: [],
    newFilter: '',
    cittaDisponibili: [],
    nRisultato: 0,
    x: 0,
    y: 0,
    eventMemo: '',
    review: [],
    specialization: []
  },

  mounted: function mounted(){

    var _this = this;

    axios.get('http://127.0.0.1:8000/api/dottori').then(function (res) {

        _this.contacts = res.data.response;

        _this.review = res.data.review;

        _this.specialization = res.data.specialization;
        console.log(_this.specialization);

        _this.filtered = _this.contacts;
        _this.nRisultato = _this.filtered.length;



        _this.contacts.forEach( function(element) {


          if (!_this.cittaDisponibili.includes(element.city)) {
            _this.cittaDisponibili.push(element.city)
          }
        });

    });
  },
  computed: {

    link(){
      return '/doctor';
    }
  },
  methods: {

    recensione(){
      this.lasciaRecensione = !this.lasciaRecensione
    },

    doctorFilter(event) {
      this.eventMemo = event.target.value;
      this.filtered = [];
      this.contacts.forEach((element, i) => {
        this.filtered.push(this.contacts[i]);
      });
      if (this.cittaDisponibili.includes(this.eventMemo) || this.eventMemo == 'All') {
        this.cityFilter = event.target.value;
      }
      if (!this.cittaDisponibili.includes(this.cityFilter)) {
        this.cityFilter = 'All';
      }
      if (this.cityFilter != 'All') {
        this.x = this.filtered.length;
        this.y = 0;
        for (var i = 0; i < this.x; i++) {
          if (this.filtered[this.y].citta != this.cityFilter) {
            this.filtered.splice(this.y, 1);
          }
          else {
            this.y++;
          }
        }
      }
      this.newFilter = this.newFilter.charAt(0).toUpperCase() + this.newFilter.slice(1);
      if (this.newFilter != '') {
        this.x = this.filtered.length;
        this.y = 0;
        for (var i = 0; i < this.x; i++) {
          if (this.filtered[this.y].name.includes(this.newFilter)) {
            this.y++;
          }
          else {
            this.filtered.splice(this.y, 1);
          }
        }
      }
      this.nRisultato = this.filtered.length;
    }
  }
});

var ctx = 'myChart';

let iconMenu = document.querySelector('.nav-mobile');
let barMenu = document.querySelector('.menu-mobile');
let close = document.querySelector('.close');
let cont = document.querySelector('#cont');

iconMenu.addEventListener("click", function () {
    barMenu.classList.toggle('display');
    // gsap.from(".menu-mobile", { opacity: 0, duration: 0.8 });

    gsap.timeline()
    .from(".menu-mobile", {yPercent: -70, opacity: 0, duration: .4 })
    .from("li", { opacity: 0, y: '-50px', stagger: .2,}, "-=1.5")
});

close.addEventListener("click", function () {
    barMenu.classList.toggle('display');
});

cont.addEventListener("click", function () {
  barMenu.classList.toggle('display');
});


gsap.timeline()
    .from(".jumbo", { duration: 1.4 })
    .from(".centrato", {yPercent: -70, opacity: 0, duration: 0.6}, "-=.9")
    .from("#img", { opacity: 0, duration: 1})
    .from("#but", { scale: 0, duration: .8, stagger: .6});


    gsap.from(".category", {
      scrollTrigger: {
          trigger: ".categories",
          start: "top bottom",
          end: "center center",
          toggleActions: "restart none none none ",
          scrub: true
      },
      xPercent: 400,
      opacity: 0,
      stagger: .3
  });

  gsap.from(".icon", {
    scrollTrigger: {
        trigger: "#contatti",
        start: "top bottom",
        end: "top center",
        toggleActions: "restart none none none ",
        scrub: true
    },
    xPercent: 200,
    opacity: 0,
    stagger: .3
});
    



// require('./bootstrap');
