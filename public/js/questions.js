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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/classes/Answer.js":
/*!****************************************!*\
  !*** ./resources/js/classes/Answer.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Answer; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Answer =
/*#__PURE__*/
function () {
  function Answer(element, layerModel) {
    _classCallCheck(this, Answer);

    this.element = element || this.createElement();
    this.selectedLayers = [];
    this.layersList = this.element.querySelector('.m-question--edit__answers__layers');
    this.layerModel = layerModel;
    this.input = this.element.querySelector('input');
    this.openLayers = this.element.querySelector('button');
    this.answer = this.input.value;
    this.openLayers.addEventListener('click', this.handleOpenForm.bind(this));
    this.input.addEventListener('change', this.handleChangeAnswer.bind(this));
  }

  _createClass(Answer, [{
    key: "handleChangeAnswer",
    value: function handleChangeAnswer(e) {
      this.answer = e.target.value;
    }
  }, {
    key: "handleOpenForm",
    value: function handleOpenForm(e) {
      e.preventDefault();
      this.layerModel.open(this);
    }
  }, {
    key: "getData",
    value: function getData() {
      return {
        answer: this.answer,
        layers: this.selectedLayers
      };
    }
  }, {
    key: "setLayers",
    value: function setLayers(layers) {
      var _this = this;

      this.selectedLayers = layers;

      while (this.layersList.lastElementChild) {
        this.layersList.removeChild(this.layersList.lastElementChild);
      }

      this.selectedLayers.forEach(function (layer) {
        _this.layersList.insertAdjacentHTML('beforeend', "\n                <li>\n                    ".concat(layer.name, "\n                </li>\n            "));
      });
    }
  }, {
    key: "createElement",
    value: function createElement() {
      var container = document.querySelector('.m-question--edit__answers');
      var row = document.createElement('div');
      row.classList.add('row');
      row.insertAdjacentHTML('beforeend', "\n                <div class= \"col-md-10\">\n                    <input type=\"text\" class=\"form-control\" placeholder=\"Antwoord\">\n                </div>\n                <div class=\"col-md-2\">\n                    <button class=\"btn btn-info\">Selecteer lagen</button>\n                </div>\n                <div class=\"col-md-12\">\n\n                    <ul class=\"m-question--edit__answers__layers\">\n                    </ul>\n                </div>\n            ");
      container.appendChild(row);
      return row;
    }
  }]);

  return Answer;
}();



/***/ }),

/***/ "./resources/js/classes/SelectLayerModel.js":
/*!**************************************************!*\
  !*** ./resources/js/classes/SelectLayerModel.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return SelectLayerModel; });
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var SelectLayerModel =
/*#__PURE__*/
function () {
  function SelectLayerModel() {
    _classCallCheck(this, SelectLayerModel);

    this.activeAnswerClass = null;
    this.model = document.querySelector('.m-question--edit__layer--select');
    this.model.addEventListener('click', this.close.bind(this));
    this.layers = _toConsumableArray(this.model.querySelectorAll('.m-question--edit__layer--select__form__selection input'));
    this.model.querySelector('#saveSelection').addEventListener('click', this.handleSubmit.bind(this));
  }

  _createClass(SelectLayerModel, [{
    key: "handleSubmit",
    value: function handleSubmit() {
      var selectedLayers = _toConsumableArray(this.layers.filter(function (layer) {
        return layer.checked;
      }).map(function (layer) {
        return {
          id: layer.id,
          name: layer.value
        };
      }));

      this.activeAnswerClass.setLayers(selectedLayers);
      this.close();
    }
  }, {
    key: "resetForm",
    value: function resetForm() {
      this.layers.forEach(function (layer) {
        layer.checked = false;
      });
    }
  }, {
    key: "open",
    value: function open(AnswerClass) {
      this.layers.forEach(function (layer) {
        layer.checked = AnswerClass.selectedLayers.find(function (l) {
          return l.id === layer.id;
        });
      });
      this.model.classList.add('active');
      this.activeAnswerClass = AnswerClass;
    }
  }, {
    key: "close",
    value: function close(e) {
      if (!e || e.target === this.model) {
        this.model.classList.remove('active');
        this.resetForm();
        this.activeAnswerClass = null;
      }
    }
  }]);

  return SelectLayerModel;
}();



/***/ }),

/***/ "./resources/js/questions.js":
/*!***********************************!*\
  !*** ./resources/js/questions.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _classes_Answer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./classes/Answer */ "./resources/js/classes/Answer.js");
/* harmony import */ var _classes_SelectLayerModel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./classes/SelectLayerModel */ "./resources/js/classes/SelectLayerModel.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }



var answers = [];
var answersInput = document.querySelector('#answers');
var form = document.querySelector('#question_form');
var layerModel = new _classes_SelectLayerModel__WEBPACK_IMPORTED_MODULE_1__["default"]();
var addAnswerButton = document.querySelector('#addAnswer');
document.querySelectorAll('.m-question--edit__answers').forEach(function (answer) {
  answers.push(new _classes_Answer__WEBPACK_IMPORTED_MODULE_0__["default"](answer, layerModel));
});
addAnswerButton.addEventListener('click', function (e) {
  e.preventDefault();
  answers.push(new _classes_Answer__WEBPACK_IMPORTED_MODULE_0__["default"](null, layerModel));
});
form.addEventListener('submit', function (e) {
  var data = _toConsumableArray(answers.map(function (answer) {
    return answer.getData();
  }));

  answersInput.value = JSON.stringify(data);
});

/***/ }),

/***/ 3:
/*!*****************************************!*\
  !*** multi ./resources/js/questions.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\berke\Documents\School\Projecten\Bosgroep zuid\code\resources\js\questions.js */"./resources/js/questions.js");


/***/ })

/******/ });