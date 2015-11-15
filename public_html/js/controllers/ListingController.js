app.controller('ListingController',  ['$scope', '$http', function($scope, $http) {
	$scope.data = [];
	var loadData = function() {
		$http.get('api/listings/').success(function(response) {
			$scope.data = response;
			console.log(response);
			// success callback
		}).error(function(response) {
			// error callback
		});
	};
	loadData();

	$scope.cropDesc = function(desc) {
		if(desc.length > 100) {
			var cutIndex = desc.indexOf(" ", 100);
			return desc.slice(0, cutIndex)+'...';
		} else {
			return desc;
		}
	}
}]);