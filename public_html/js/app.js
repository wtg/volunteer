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

	$routeProvider.when('/listings', {
		templateUrl: 'public_html/partials/listing.html',
		controller: 'ListingController'
	});

	$routeProvider.when('/add', {
		templateUrl: 'public_html/partials/add.html',
		controller: 'AddController'
	});

	$routeProvider.when('/details', {
		templateUrl: 'public_html/partials/details.html',
		controller: 'DetailsController'
	});

	$routeProvider.when('/profile', {
		templateUrl: 'public_html/partials/profile.html',
		controller: 'ProfileController'
	});

	$routeProvider.otherwise({
		redirectTo: '/'
	});
}]);
