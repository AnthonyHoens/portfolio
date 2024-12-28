/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./web/app/themes/portfolio/resources/js/app.js":
/*!******************************************************!*\
  !*** ./web/app/themes/portfolio/resources/js/app.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _parts_Rect__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./parts/Rect */ "./web/app/themes/portfolio/resources/js/parts/Rect.js");

var animation = {
  canvas: null,
  ctx: null,
  rects: [],
  frameCounter: 0,
  frameInterval: 50,
  init: function init() {
    this.canvas = document.querySelector('#animation');
    this.ctx = this.canvas.getContext('2d');
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
    this.update();
  },
  background: function background(color) {
    this.ctx.beginPath();
    this.ctx.rect(0, 0, this.canvas.width, this.canvas.height);
    this.ctx.fillStyle = color;
    this.ctx.fill();
  },
  draw: function draw() {
    this.background('#272727');
  },
  update: function update() {
    var _this = this;
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
    this.draw();
    if (this.frameCounter++ > this.frameInterval) {
      this.rects.push(new _parts_Rect__WEBPACK_IMPORTED_MODULE_0__["default"](this));
      this.frameCounter = 0;
    }
    this.rects.forEach(function (rect) {
      rect.update();
      if (rect.die()) {
        _this.rects.splice(0, 1);
      }
    });
    window.addEventListener('resize', function () {
      _this.canvas.width = window.innerWidth;
      _this.canvas.height = window.innerHeight;
      _this.rects.forEach(function (rect) {
        rect.resetLifetime();
      });
    });
    window.requestAnimationFrame(function () {
      _this.update();
    });
  }
};
animation.init();

/***/ }),

/***/ "./web/app/themes/portfolio/resources/js/parts/Rect.js":
/*!*************************************************************!*\
  !*** ./web/app/themes/portfolio/resources/js/parts/Rect.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Rect)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Rect = /*#__PURE__*/function () {
  function Rect(animation) {
    _classCallCheck(this, Rect);
    this.animation = animation;
    this.lifetime = this.animation.canvas.width + this.animation.canvas.height;
    this.width = 200 + Math.random() * 200;
    this.height = 10 + Math.random() * 20;
    this.angle = -30;
    this.minSpeed = 2;
    this.maxSpeed = 8;
    this.speed = this.animation.canvas.width / this.width;
    this.opacity = 0.6;
    this.maxOpacity = 1 - this.opacity;
    this.x = -this.width;
    this.y = this.height + Math.random() * (this.animation.canvas.width + this.animation.canvas.height);
    this.colors = ['rgba(27, 130, 132,' + (this.opacity + Math.random() * this.maxOpacity) + ')', 'rgba(230, 230, 230,' + (this.opacity + Math.random() * this.maxOpacity) + ')', 'rgba(179, 254, 255,' + (this.opacity + Math.random() * this.maxOpacity) + ')'];
    this.color = this.colors.sort(function () {
      return 0.5 - Math.random();
    })[0];
  }
  return _createClass(Rect, [{
    key: "roundRect",
    value: function roundRect(x, y, w, h, radius) {
      var r = x + w;
      var b = y + h;
      this.animation.ctx.beginPath();
      this.animation.ctx.shadowColor = this.color;
      this.animation.ctx.shadowOffsetX = 0;
      this.animation.ctx.shadowOffsetY = 0;
      this.animation.ctx.shadowBlur = 10;
      this.animation.ctx.fillStyle = this.color;
      this.animation.ctx.moveTo(x + radius, y);
      this.animation.ctx.lineTo(r - radius, y);
      this.animation.ctx.quadraticCurveTo(r, y, r, y + radius);
      this.animation.ctx.lineTo(r, y + h - radius);
      this.animation.ctx.quadraticCurveTo(r, b, r - radius, b);
      this.animation.ctx.lineTo(x + radius, b);
      this.animation.ctx.quadraticCurveTo(x, b, x, b - radius);
      this.animation.ctx.lineTo(x, y + radius);
      this.animation.ctx.quadraticCurveTo(x, y, x + radius, y);
      this.animation.ctx.fill();
    }
  }, {
    key: "render",
    value: function render() {
      this.animation.ctx.save();
      this.animation.ctx.translate(this.x, this.y);
      this.animation.ctx.rotate(this.angle * Math.PI / 180);
      this.roundRect(0, 0, this.width, this.height, 5);
      this.animation.ctx.restore();
    }
  }, {
    key: "update",
    value: function update() {
      if (this.speed < this.minSpeed) {
        this.speed = this.minSpeed;
      } else if (this.speed > this.maxSpeed) {
        this.speed = this.maxSpeed;
      }
      this.x += this.speed;
      this.y += -this.speed * (-this.angle / 45);
      this.lifetime--;
      this.render();
    }
  }, {
    key: "resetLifetime",
    value: function resetLifetime() {
      this.lifetime = this.animation.canvas.width + this.animation.canvas.height;
    }
  }, {
    key: "die",
    value: function die() {
      if (this.lifetime < 0) {
        return true;
      } else {
        return false;
      }
    }
  }]);
}();


/***/ }),

/***/ "./web/app/themes/portfolio/resources/sass/theme.scss":
/*!************************************************************!*\
  !*** ./web/app/themes/portfolio/resources/sass/theme.scss ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
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
/******/ 			"css/theme": 0
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
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkportfolio"] = self["webpackChunkportfolio"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/theme"], () => (__webpack_require__("./web/app/themes/portfolio/resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/theme"], () => (__webpack_require__("./web/app/themes/portfolio/resources/sass/theme.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;