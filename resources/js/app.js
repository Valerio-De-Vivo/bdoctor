import Vue from 'vue'
var app = new Vue({
  el: '#app',
  data: {
    contacts: [
      {
        name: 'Bernardo Rocco',
        nome: 'Bernardo',
        cognome: 'Rocco',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Modena',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Herbert Schoenhuber',
        nome: 'Herbert',
        cognome: 'Schoenhuber',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Milano',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Claudio Corbellini',
        nome: 'Claudio',
        cognome: 'Corbellini',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Bologna',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Patrizia Boni',
        nome: 'Patrizia',
        cognome: 'Boni',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Milano',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Silvia Simonetti',
        nome: 'Silvia',
        cognome: 'Simonetti',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Milano',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Alberto Vaiarelli',
        nome: 'Alberto',
        cognome: 'Vaiarelli',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Viterbo',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Andrea Lenzi',
        nome: 'Andrea',
        cognome: 'Lenzi',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Roma',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Ernesta Petrangeli',
        nome: 'Ernesta',
        cognome: 'Petrangeli',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Roma',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Annalisa Limosani',
        nome: 'Annalisa',
        cognome: 'Limosani',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Firenze',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
      },
      {
        name: 'Simona Monilari',
        nome: 'Simona',
        cognome: 'Monilari',
        bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
        citta: 'Milano',
        telefono: '+39 366 1234567',
        valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
      },
    ],
    filtered: [],
    newFilter: '',
    cittaDisponibili: [],
    nRisultato: 0,
    x: 0,
    y: 0,
    eventMemo: ''
  },
  created(){
    this.filtered = this.contacts;
    this.nRisultato = this.filtered.length;
    this.contacts.forEach((element, i) => {
      if (!this.cittaDisponibili.includes(element.citta)) {
        this.cittaDisponibili.push(element.citta)
      }
    });
  },
  methods: {
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
require('./bootstrap');
