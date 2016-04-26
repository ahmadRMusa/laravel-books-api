<?php namespace App\Services;

class Purchase
{
    /**
     *
     * Purchase book function
     *
     * @param $book \App\Book
     * @param $invoice \App\Invoice
     * @return array
     */
    public function purchaseBook($book , $invoice)
    {
        return ['message' => 'TEST' , 'data'=> 'DATA TEST'];
    }
}
