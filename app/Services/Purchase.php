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
        $bookAvailableQty = intval($book->quantity);
        $purchasePrice = null;

        if($bookAvailableQty >= $bookPurchaseQty && $bookPurchaseQty > 0) {
            $purchasePrice = $bookPurchaseQty * $bookPrice;
        }

        return $purchasePrice;
    }
}
