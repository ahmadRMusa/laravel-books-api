<?php

namespace App\Http\Controllers;

use App\Invoice;
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
        $purchaseResult = $purchaseService->purchaseBook($book);

        $invoice->title = $request->input('title');
        $invoice->author = $request->input('author');
        $invoice->description = $request->input('description');
        $invoice->reference = $request->input('reference');
        $invoice->publication = $request->input('publication');
        $invoice->price = $request->input('price');
        $invoice->qty = $request->input('qty');

        return Invoice::find(1);
    }
}
