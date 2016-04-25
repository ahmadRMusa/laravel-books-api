app.controller('InvoicesController', function($scope, $http, API_URL) {

    $scope.onlyNumbers = /^[1-9][0-9]*$/;

    //retrieve books from API
    $http.get(API_URL + "invoices")
        .success(function(response) {
            console.debug(response);
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
        var url = API_URL + "invoices";

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
});