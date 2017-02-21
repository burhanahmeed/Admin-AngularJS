var app = angular.module('angularCodeigniter', ['ui.router']);
app.config(function($stateProvider,$urlRouterProvider,$locationProvider){

    $stateProvider.state('home', {
        url:'/',
        templateUrl:BASE_URL+'home/login',
        controller: 'aboutCtrl'
    }).state('dashboard', {
        url:'/dashboard',
        templateUrl: BASE_URL+'home/dashboard',
        controller: 'DashboardCtrl'
    });
    $urlRouterProvider.otherwise('/')
});

function LoginCtrl() {

  
}
function DashboardCtrl () {
	// body...
}
app.controller('aboutCtrl', function($scope){
        $scope.about = ["HTML",
                        "CSS",
                        "Javascript",
                        "PHP",
                        "Java",
                        "AngularJs",
                        "Codeigniter"]
});