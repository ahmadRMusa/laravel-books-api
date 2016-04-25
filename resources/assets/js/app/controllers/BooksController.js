
(function() {

    var app = angular.module("bookRecords").constant('API_URL', 'http://localhost:8000/api/v1/');

    var BooksController = function($scope ,$http , $routeParams , API_URL){

        $scope.onlyNumbers = /^(?:[1-9]\d*|0)?(?:\.\d+)?$/;

        //retrieve books from API
        $http.get(API_URL + "books")
            .success(function(response) {
                $scope.books = response;
            });

        //show modal form
        $scope.toggle = function(modalstate, id) {
            $scope.modalstate = modalstate;

            switch (modalstate) {
                case 'add':
                    $scope.form_title = "Add New Book";
                    break;
                case 'edit':
                    $scope.form_title = "Book Detail";
                    $scope.id = id;
                    $http.get(API_URL + 'books/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.book = response;
                        });
                    break;
                default:
                    break;
            }
            console.log(id);
            $('#myModal').modal('show');
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            var url = API_URL + "books";

            //append employee id to the URL if the form is in edit mode
            if (modalstate === 'edit'){
                url += "/" + id;
            }

            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.book),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);
                location.reload();
            }).error(function(response) {
                console.log(response);
                alert('This is embarrassing. An error has occurred. Please check the log for details');
            });
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Are you sure you want to delete this record?');
            if (isConfirmDelete) {
                $http({
                    method: 'DELETE',
                    url: API_URL + 'books/' + id
                }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete record');
                    });
            } else {
                return false;
            }
        }

    };

    app.controller("BooksController" , ["$scope", "$http" , "$routeParams" , "API_URL", BooksController ] );

}());
