(function(){

    var app = angular.module("bookRecords",["ngRoute"]);

    app.config(function($routeProvider){

        $routeProvider
            .when("/books",{
                templateUrl: "books.html",
                controller: "BooksController"
            })
            .when("/invoices",{
                templateUrl: "invoices.html",
                controller: "InvoicesController"
            })
            .otherwise({redirectTo:"/"});
    });

}());