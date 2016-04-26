<?php namespace App\Services;

class Purchase
{
    /**
     *
     * Purchase book function
     *
     * @param $book \App\Book
     * @param $bookPurchaseQty integer
     * @return array
     */
    public function purchaseBook($book , $bookPurchaseQty)
    {
        $bookPrice = $book->price;
        $bookAvailableQty = $book->quantity;

        return ['message' => 'TEST' , 'data'=> 'DATA TEST'];
    }
}
