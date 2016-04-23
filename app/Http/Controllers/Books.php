<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Books extends Controller
{
    /**
     * Display book resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Book::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store new book resource in database.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $book = new Book;

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->save();

        return 'Book record successfully created with id ' . $book->id;
    }

}
