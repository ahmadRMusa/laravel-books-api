 <?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

 /**
  * Class BooksTest
  */
class BooksTest extends ApiTester {

    /** @test */
    public function it_fetches_books() {
        //arrange
        $this->times(5)->make('App\Book');

        //act
        $this->getJson('api/v1/books');

        //assert
        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_a_single_book() {
        $this->make('App\Book');

        $book = $this->getJson('api/v1/books/1')->data;

        $this->assertResponseOk();

        $this->assertObjectHasAttributes(
            $book,
            'title',
            'author',
            'description',
            'reference',
            'publication_date'
        );
    }

    /** @test */
    public function it_creates_a_new_book_given_parameters() {
        //Must authorize
        $this->getJson('api/v1/books', 'POST', $this->getStub());
        $this->assertResponseStatus(201);
    }

    /**
     *
     * Generate stub
     *
     * @return array
     */
    protected function getStub() {
        return [
            'title' => $this->fake->sentence,
            'author' => $this->fake->sentence,
            'description' => $this->fake->paragraph,
            'reference' => $this->fake->sentence,
            'publication_date' => $this->fake->sentence,
        ];
    }
}
