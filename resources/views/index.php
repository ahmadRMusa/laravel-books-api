<!DOCTYPE html>
<html lang="en-US" ng-app="bookRecords">
<head>
    <title>Laravel API Books CRUD</title>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/app.css') ?>" rel="stylesheet">
</head>
<body>
<h2>Books Database</h2>
<div  ng-controller="booksController">

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Reference</th>
            <th>Publication Year</th>
            <th>Price</th>
            <th>Quantity</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">
                    Add New Book
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="book in books">
            <td>{{  book.id }}</td>
            <td>{{ book.title }}</td>
            <td>{{ book.author }}</td>
            <td>{{ book.description }}</td>
            <td>{{ book.reference }}</td>
            <td>{{ book.publication }}</td>
            <td>{{ book.price }}</td>
            <td>{{ book.quantity }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', book.id)">
                    Edit
                </button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(book.id)">
                    Delete
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmBooks" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="title" class="form-control" id="title" name="title"
                                       placeholder="Title" value="{{title}}"
                                       ng-model="book.title" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmBooks.title.$invalid && frmBooks.title.$touched">
                                            Valid Title field is required
                                        </span>
                            </div>
                        </div>

                        <div class="form-group error">
                            <label for="author" class="col-sm-3 control-label">Author</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="author" name="author"
                                       placeholder="Author" value="{{author}}"
                                       ng-model="book.author" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmBooks.author.$invalid && frmBooks.author.$touched">
                                            Author field is required
                                        </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="Description" value="{{description}}"
                                       ng-model="book.description" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmBooks.description.$invalid && frmBooks.description.$touched">
                                        Book description field is required
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="reference" class="col-sm-3 control-label">Book reference</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="reference" name="reference"
                                       placeholder="Reference" value="{{reference}}"
                                       ng-model="book.reference" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmBooks.reference.$invalid && frmBooks.reference.$touched">
                                        Book reference field is required
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="publication" class="col-sm-3 control-label">Publication Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="publication" name="publication"
                                       placeholder="Publication Year" value="{{publication}}"
                                       ng-model="book.publication" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmBooks.publication.$invalid && frmBooks.publication.$touched">
                                        Book publication year field is required
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price" name="price"
                                       placeholder="Price" value="{{price}}"
                                       ng-model="book.price" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmBooks.price.$invalid && frmBooks.price.$touched">
                                        Book price field is required
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                       placeholder="Quantity" value="{{quantity}}"
                                       ng-model="book.quantity" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmBooks.quantity.$invalid && frmBooks.quantity.$touched">
                                        Book quantity field is required
                                    </span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                            ng-disabled="frmBooks.$invalid">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('assets/js/vendor.js') ?>"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('assets/js/app.js') ?>"></script>

</body>
</html>