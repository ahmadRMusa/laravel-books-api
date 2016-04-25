<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class BooksTest
 */
class BooksTest extends TestCase {

    /** @test */
    public function testfetchBooks() {
        $this->json('GET', '/api/v1/books')
            ->seeJsonStructure([
                '*' => [
                    'id', 'title','author','description','created_at','updated_at'
                ]
            ]);
    }

    /** @test */
    public function testFetchSingleBook() {
        $this->get('/api/v1/books/1')
            ->seeJsonStructure([
                'id',
                'title',
                'author',
                'description',
                'created_at',
                'updated_at',
            ]);
    }

    /** @test */
    public function testCreateNewBook() {
        //Must authorize
        $this->post('api/v1/books', $this->getBook());
        $this->assertResponseStatus(200);
    }

    protected function getBook() {
        return [
            'title' => 'TEST',
            'author' => 'TEST',
            'description' => 'TEST',
            'publication' => 'TEST',
            'price' => 1,
            'quantity' => 1,
        ];
    }
}
