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
            return Invoice::orderBy('id', 'asc')->get();
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
        $book = new Book;

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->reference = $request->input('description');
        $book->publication = $request->input('publication');
        $book->price = $request->input('price');
        $book->quantity = $request->input('quantity');
        $book->save();

        return 'Book record successfully created with id ' . $book->id;
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
