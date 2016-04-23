<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests;

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

    /**
     * Display the specified book resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Book::find($id);
    }

    /**
     * Update the specified book resource from the database.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $book = Book::find($id);

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->save();

        return "Successfully updated book #" . $book->id;
    }

    /**
     * Remove the specified book resource from the database.
     *
     * @param  $request Request
     * @return Response
     */
    public function destroy(Request $request) {
        $book = Book::find($request->input('id'));
        $book->delete();

        return "Successfully deleted book #" . $request->input('id');
    }
}
