/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

var app = new Vue({
  el: '#app',
  data: {
    // contacts: [
    //   {
    //     name: 'Bernardo Rocco',
    //     nome: 'Bernardo',
    //     cognome: 'Rocco',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Modena',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Herbert Schoenhuber',
    //     nome: 'Herbert',
    //     cognome: 'Schoenhuber',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Milano',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Claudio Corbellini',
    //     nome: 'Claudio',
    //     cognome: 'Corbellini',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Bologna',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Patrizia Boni',
    //     nome: 'Patrizia',
    //     cognome: 'Boni',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Milano',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Silvia Simonetti',
    //     nome: 'Silvia',
    //     cognome: 'Simonetti',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Milano',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Alberto Vaiarelli',
    //     nome: 'Alberto',
    //     cognome: 'Vaiarelli',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Viterbo',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Andrea Lenzi',
    //     nome: 'Andrea',
    //     cognome: 'Lenzi',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Roma',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Ernesta Petrangeli',
    //     nome: 'Ernesta',
    //     cognome: 'Petrangeli',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Roma',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Annalisa Limosani',
    //     nome: 'Annalisa',
    //     cognome: 'Limosani',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Firenze',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
    //   },
    //   {
    //     name: 'Simona Monilari',
    //     nome: 'Simona',
    //     cognome: 'Monilari',
    //     bio: 'Laureato a pieni voti in chirurgia, specializzato in specializzazione e operante a Milano',
    //     citta: 'Milano',
    //     telefono: '+39 366 1234567',
    //     valutazione: '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
    //   },
    // ],
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
  mounted: function mounted() {
    var _this = this;

    axios.get('http://127.0.0.1:8000/api/dottori').then(function (res) {
      _this.contacts = res.data.response;
      _this.review = res.data.review;
      _this.specialization = res.data.specialization;
      console.log(_this.specialization);
      _this.filtered = _this.contacts;
      _this.nRisultato = _this.filtered.length;

      _this.contacts.forEach(function (element) {
        if (!_this.cittaDisponibili.includes(element.city)) {
          _this.cittaDisponibili.push(element.city);
        }
      });
    });
  },
  created: function created() {// this.filtered = this.contacts;
    // this.nRisultato = this.filtered.length;
    // this.contacts.forEach((element, i) => {
    //   if (!this.cittaDisponibili.includes(element.citta)) {
    //     this.cittaDisponibili.push(element.citta)
    //   }
    // });
  },
  methods: {
    doctorFilter: function doctorFilter(event) {
      var _this2 = this;

      this.eventMemo = event.target.value;
      this.filtered = [];
      this.contacts.forEach(function (element, i) {
        _this2.filtered.push(_this2.contacts[i]);
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
          } else {
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
          } else {
            this.filtered.splice(this.y, 1);
          }
        }
      }

      this.nRisultato = this.filtered.length;
    }
  }
}); // require('./bootstrap');

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/valeriodevivo/Desktop/ESERCIZI/mamp_public/bdoctor/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/valeriodevivo/Desktop/ESERCIZI/mamp_public/bdoctor/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });