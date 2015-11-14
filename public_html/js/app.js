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
	
	$routeProvider.when('/', {
		templateUrl: 'public_html/partials/home.html',
		controller: 'HomeController'
	});
	
	$routeProvider.when('/listing', {
		templateUrl: 'public_html/partials/listing.html',
		controller: 'ListingController'
	});
	
	$routeProvider.otherwise({
		redirectTo: '/'
	});
}]);