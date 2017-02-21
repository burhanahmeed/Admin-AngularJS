app.controller('linksCtrl',function($rootScope, $scope, $http) { 
  $rootScope.header = "Dashboard | Links Management";
  $scope.links = [];
  $http.get(BASE_URL+'link_managemet/list_links')
  	.success(function($data){
  		$scope.links = $data;
  	})
});