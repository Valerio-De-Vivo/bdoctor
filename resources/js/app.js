
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



// require('./bootstrap');
