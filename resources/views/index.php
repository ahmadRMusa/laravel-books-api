<!DOCTYPE html>
<html lang="en-US" ng-app="bookRecords">
<head>
    <title>Laravel API Books CRUD</title>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/app.css') ?>" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Books App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#/books">Books</a></li>
                <li><a href="#/invoices">Invoices</a></li>
            </ul>
        </div>
    </div>
</nav>

<div ng-view></div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('assets/js/vendor.js') ?>"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('assets/js/app.js') ?>"></script>

</body>
</html>