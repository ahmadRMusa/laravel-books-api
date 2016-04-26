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
        $invoice = null;
        $purchaseService = new Purchase();
        $purchaseQty = $request->input('qty');
        $book = Invoice::find($request->input('book_id'));
        $purchasePrice = $purchaseService->purchaseBook($book,$purchaseQty);

        if($purchasePrice !== null) {
            $invoice = new Invoice();
            $invoice->book_id = $book->id;
            $invoice->amount = $purchasePrice;
            $invoice->qty = $purchaseQty;
            $invoice->created_at = date('Y-m-d H:i:s');
            $invoice->updated_at = date('Y-m-d H:i:s');
            $invoice->save();
        }

        return $invoice;
    }
}
