/*
    The angularjs router is fully created by BURHAN MED
*/

var app = angular.module('adminJs',['ui.router','angularUtils.directives.dirPagination']);

app.config(function($stateProvider,$urlRouterProvider,$locationProvider){
  $stateProvider.state('dashboard', {
        url:'/',
        templateUrl:BASE_URL+'dashboard/home',
        controller: 'dbCtrl'
    }).state('links_management', {
        url:'/links_management',
        templateUrl: BASE_URL+'dashboard/links_management',
        controller:'linksCtrl',
    }).state('link_stats', {
        url:'/link_stats',
        templateUrl: BASE_URL+'dashboard/link_stats',
        controller:'viewsCtrl',
    }).state('profile',{
        url:'/profile',
        templateUrl: BASE_URL+'dashboard/profile',
        controller: 'profileCtrl'
    });
    $urlRouterProvider.otherwise('/')
});

