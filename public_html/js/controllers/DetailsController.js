app.controller('DetailsController',  ['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
	$scope.data = {};
	var loadData = function() {
		var id = $routeParams.id;
		$http.get('api/listings/' + id).success(function(response) {
			$scope.data = response[0];
			console.log(response[0]);
		}).error(function(response) {
		});
	};
	loadData();
}]);
