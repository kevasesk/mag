
var mag=angular.module('Main',['ngRoute'])
    .config(function($routeProvider,$locationProvider){
        $routeProvider.when("/home",{
            templateUrl:'frontend/home.html',
            controller:"MagController"
        }).when("/about",{
            templateUrl:'frontend/about.html',
            controller:"MagController"
        });
            // .when("/",{
            //     templateUrl:'index.html',
            //     controller:"MagController"
            // });
        $locationProvider.html5Mode(true);
    });
mag.controller('MagController',function($scope)
{
    $scope.products={
        first:{
            'title':'product 1',
            'desc':'description of prod 1',
            'price':100,
            'img':'images/watch.jpg'
        },
        secound:{
            'title':'product 2',
            'desc':'description of prod 2',
            'price':200,
            'img':'images/watch.jpg'
        },
        third:{
            'title':'product 3',
            'desc':'description of prod 3',
            'price':300,
            'img':'images/watch.jpg'
        },
    };

});