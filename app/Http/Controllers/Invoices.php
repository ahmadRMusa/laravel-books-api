<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests;

class Invoices extends Controller
{
    /**
     * Display book resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            $invoices = Invoice
                ::join('books', 'invoices.book_id', '=', 'books.id')
                ->select(
                    'invoices.id',
                    'invoices.amount',
                    'invoices.qty',
                    'invoices.created_at',
                    'invoices.updated_at',
                    'books.title',
                    'books.author',
                    'books.price',
                    'books.quantity'
                )
                ->getQuery()
                ->get();
            return $invoices;
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store new invoice resource in database.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $invoice = new Invoice;

        $invoice->title = $request->input('title');
        $invoice->author = $request->input('author');
        $invoice->description = $request->input('description');
        $invoice->reference = $request->input('description');
        $invoice->publication = $request->input('publication');
        $invoice->price = $request->input('price');
        $invoice->qty = $request->input('qty');
        $invoice->save();

        return 'Book record successfully created with id ' . $invoice->id;
    }

    /**
     * Display the specified book resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Invoice::find($id);
    }
}
