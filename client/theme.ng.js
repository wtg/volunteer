'use strict'

angular.module('volunteerApp')
.config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default')
  .primaryPalette('deep-orange')
  .accentPalette('lime');
});