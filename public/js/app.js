/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

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
  computed: {
    link: function link() {
      return '/doctor';
    }
  },
  methods: {
    recensione: function recensione() {
      this.lasciaRecensione = !this.lasciaRecensione;
    },
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
});
var ctx = 'myChart';
var iconMenu = document.querySelector('.nav-mobile');
var barMenu = document.querySelector('.menu-mobile');
var close = document.querySelector('.close');
var cont = document.querySelector('#cont');
iconMenu.addEventListener("click", function () {
  barMenu.classList.toggle('display'); // gsap.from(".menu-mobile", { opacity: 0, duration: 0.8 });

  gsap.timeline().from(".menu-mobile", {
    yPercent: -70,
    opacity: 0,
    duration: .4
  }).from("li", {
    opacity: 0,
    y: '-50px',
    stagger: .2
  }, "-=1.5");
});
close.addEventListener("click", function () {
  barMenu.classList.toggle('display');
});
cont.addEventListener("click", function () {
  barMenu.classList.toggle('display');
});
gsap.timeline().from(".jumbo", {
  duration: 1.4
}).from(".centrato", {
  yPercent: -70,
  opacity: 0,
  duration: 0.6
}, "-=.9").from("#img", {
  opacity: 0,
  duration: 1
}).from("#but", {
  scale: 0,
  duration: .8,
  stagger: .6
});
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
}); // require('./bootstrap');

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			__webpack_require__.O();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;