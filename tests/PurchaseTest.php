<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Book;
use App\Services\Purchase;

/**
 * Class BooksTest
 */
class PurchaseTest extends TestCase {

    /** @test */
    public function testPurchaseOneBook() {
        $book = Book::find(1);
        $purchaseQty = 1;
        $purchaseService = new Purchase();
        $purchasePrice = $purchaseService->purchaseBook($book,$purchaseQty);
        $this->assertEquals('5.9900',$purchasePrice);
    }

    /** @test */
    public function testPurchaseTwoBooks() {
        $book = Book::find(1);
        $purchaseQty = 2;
        $purchaseService = new Purchase();
        $purchasePrice = $purchaseService->purchaseBook($book,$purchaseQty);
        $this->assertEquals('11.9800',$purchasePrice);
    }

    /** @test */
    public function testPurchaseZeroBooks() {
        $book = Book::find(1);
        $purchaseQty = 0;
        $purchaseService = new Purchase();
        $purchasePrice = $purchaseService->purchaseBook($book,$purchaseQty);
        $this->assertEquals(null,$purchasePrice);
    }

    /** @test */
    public function testPurchaseMinuzOneBooks() {
        $book = Book::find(1);
        $purchaseQty = -1;
        $purchaseService = new Purchase();
        $purchasePrice = $purchaseService->purchaseBook($book,$purchaseQty);
        $this->assertEquals(null,$purchasePrice);
    }

}
