var app = angular.module('angular', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('SelectAuthorController', function($scope){
	
});