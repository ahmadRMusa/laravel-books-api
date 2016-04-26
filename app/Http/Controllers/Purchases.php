<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\Purchase;

class Purchases extends Controller
{

    /**
     * Purchase book and generate invoice.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request) {

        $invoice = new Invoice;
        $book = null;
        $purchaseService = new Purchase();
        $invoice->qty = $request->input('qty');
        $invoice->bookId = $request->input('book_id');

        $book = Invoice::find($invoice->bookId);
        $purchaseResult = $purchaseService->purchaseBook($book,$invoice);

        return $purchaseResult;
    }
}
