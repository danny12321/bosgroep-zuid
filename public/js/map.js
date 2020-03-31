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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/classes/Layer.js":
/*!***************************************!*\
  !*** ./resources/js/classes/Layer.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return LayerContainer; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var LayerContainer =
/*#__PURE__*/
function () {
  function LayerContainer(layerName, opacity) {
    _classCallCheck(this, LayerContainer);

    this.layerName = layerName;
    this.opacity = opacity;
    this.layer = this.createLayer();
    this.layer.setOpacity(this.opacity);
  }

  _createClass(LayerContainer, [{
    key: "createLayer",
    value: function createLayer() {
      return new ol.layer.Image({
        source: new ol.source.ImageWMS({
          url: 'http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms',
          params: {
            'LAYERS': this.layerName
          },
          serverType: 'geoserver'
        })
      });
    }
  }]);

  return LayerContainer;
}();



/***/ }),

/***/ "./resources/js/classes/Map.js":
/*!*************************************!*\
  !*** ./resources/js/classes/Map.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Map; });
/* harmony import */ var _Layer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Layer */ "./resources/js/classes/Layer.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var Map =
/*#__PURE__*/
function () {
  function Map(targetElement, lat, _long) {
    _classCallCheck(this, Map);

    this.lat = lat;
    this["long"] = _long;
    this.targetElement = targetElement;
    this.layers = [];
    this.map = this.createMap();
  }

  _createClass(Map, [{
    key: "addLayer",
    value: function addLayer(layerName, opacity) {
      var layerContainer = new _Layer__WEBPACK_IMPORTED_MODULE_0__["default"](layerName, opacity);
      this.layers.push(layerContainer);
      this.map.addLayer(layerContainer.layer);
    }
  }, {
    key: "createMap",
    value: function createMap() {
      return new ol.Map({
        target: this.targetElement,
        layers: [new ol.layer.Tile({
          source: new ol.source.OSM()
        })],
        view: new ol.View({
          center: ol.proj.fromLonLat([this["long"], this.lat]),
          zoom: 10
        })
      });
    }
  }]);

  return Map;
}();



/***/ }),

/***/ "./resources/js/map.js":
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _classes_Map__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./classes/Map */ "./resources/js/classes/Map.js");

var lat = document.querySelector(".m-php__lat").innerHTML;
var _long = document.querySelector(".m-php__long").innerHTML;
var map = new _classes_Map__WEBPACK_IMPORTED_MODULE_0__["default"]('map', lat, _long);
map.addLayer('biodiversiteithorst:Schimmels_std', 0.3);
map.addLayer('biodiversiteithorst:Reptielen_std', 0.3);

/***/ }),

/***/ 1:
/*!***********************************!*\
  !*** multi ./resources/js/map.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Documenten\School\bosgroepzuid\bosgroep-zuid\resources\js\map.js */"./resources/js/map.js");


/***/ })

/******/ });