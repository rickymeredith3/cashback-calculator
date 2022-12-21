/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
$(function () {
  var addCard = new bootstrap.Modal('#add-card-popup', {
    keyboard: false
  });
  $('#add-card').on('click', function () {
    console.log('this works');
    addCard.show();
  });
});
/******/ })()
;