
(function() {

    var app = angular.module("bookRecords").constant('API_URL', 'http://localhost:8000/api/v1/');

    var InvoicesController = function($scope ,$http , $routeParams , API_URL){

        $scope.onlyNumbers = /^[1-9][0-9]*$/;

        //Retrieve invoices from API
        $http.get(API_URL + "invoices")
            .success(function(response) {
                $scope.invoices = response;
            });

        //Retrieve books from API
        $http.get(API_URL + "books")
            .success(function(response) {
                $scope.books = response;
            });

        //show modal form
        $scope.toggle = function(modalstate, id) {
            $scope.modalstate = modalstate;

            switch (modalstate) {
                case 'add':
                    $scope.form_title = "Purchase New Book";
                    break;
                default:
                    break;
            }
            console.log(id);
            $('#myModal').modal('show');
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            var url = API_URL + "purchases";

            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.invoice),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);
                location.reload();
            }).error(function(response) {
                console.log(response);
                alert('This is embarrassing. An error has occurred. Please check the log for details');
            });
        };

    };

    app.controller("InvoicesController" , ["$scope", "$http" , "$routeParams" , "API_URL", InvoicesController ] );

}());
