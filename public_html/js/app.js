var dependencies = [
	'ngRoute'
];

var app = angular.module("volunteerApp", dependencies);

app.config(['$routeProvider', function($routeProvider) {
	// EXAMPLE:
	// $routeProvider.when('/phones', {
	// 	templateUrl: 'partials/phone-list.html',
	// 	controller: 'PhoneListCtrl'
	// });
	
	$routeProvider.when('/home', {
		templateUrl: 'partials/home.html',
		controller: 'HomeController'
	});
	
	$routeProvider.otherwise({
		redirectTo: '/home'
	});
}]);