<h2>Invoices</h2>
<div  ng-controller="InvoicesController">

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <!--            <th>Book name</th>-->
            <th>Amount</th>
            <th>Quantity Sold</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">
                    Add New Book
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="book in books">
            <td>{{ invoice.id }}</td>
            <!--            <td>{{ invoice.title }}</td>-->
            <td>{{ invoice.amount }}</td>
            <td>{{ invoice.quantity }}</td>
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
                    <form name="frmInvoices" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="title" class="form-control" id="amount" name="amount"
                                       placeholder="Amount" value="{{amount}}"
                                       ng-model="invoice.amount" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmBooks.amount.$invalid && frmBooks.amount.$touched">
                                            Amount field is required
                                        </span>
                            </div>
                        </div>

                        <div class="form-group error">
                            <label for="author" class="col-sm-3 control-label">Author</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="quantity" name="quantity"
                                       placeholder="Quantity" value="{{quantity}}"
                                       ng-model="book.quantity" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmBooks.quantity.$invalid && frmBooks.quantity.$touched">
                                            Quantity field is required
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
