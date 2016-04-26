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
        $purchaseService = new Purchase();
        $book = Invoice::find($request->input('book_id'));
        $purchaseResult = $purchaseService->purchaseBook($book,$request->input('qty'));

        return $purchaseResult;
    }
}
