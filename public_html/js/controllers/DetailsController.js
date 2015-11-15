app.controller('DetailsController',  ['$scope', '$routeParams', function($scope, $routeParams) {
	$scope.data = {};
	var loadData = function() {
		var id = $routeParams.id;
		$http.get('api/listings/' + id).success(function(response) {
			$scope.data = response;
			console.log(response);
		}).error(function(response) {

		});
	};
	loadData();
}]);
