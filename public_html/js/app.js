var dependencies = [
	'ngRoute'
];

var app = angular.module("volunteerApp", []);

app.config(['$routeProvider', function($routeProvider) {
	// EXAMPLE:
	// $routeProvider.when('/phones', {
	// 	templateUrl: 'partials/phone-list.html',
	// 	controller: 'PhoneListCtrl'
	// });
	
	$routeProvider.otherwise({
		redirectTo: '/home'
	});
}]);