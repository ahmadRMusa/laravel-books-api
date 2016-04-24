<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class BooksTest
 */
class BooksTest extends TestCase {

    /** @test */
    public function it_fetches_books() {
        $this->json('GET', '/api/v1/books')
            ->seeJsonStructure([
                '*' => [
                    'id', 'title','author','description','created_at','updated_at'
                ]
            ]);
    }

    /** @test */
//    public function it_fetches_a_single_book() {
//        $this->make('App\Book');
//
//        $book = $this->getJson('api/v1/books/1')->data;
//
//        $this->assertResponseOk();
//
//        $this->assertObjectHasAttributes(
//            $book,
//            'title',
//            'author',
//            'description',
//            'reference',
//            'publication_date'
//        );
//    }

    /**
     *
     * Get Book attributes for validating JSON
     *
     * @return array
     */
    protected function getBookJSONStruct() {
        return [
            'title' => $this->fake->sentence,
            'author' => $this->fake->sentence,
            'description' => $this->fake->paragraph,
            'reference' => $this->fake->sentence,
            'publication_date' => $this->fake->sentence,
        ];
    }
}
