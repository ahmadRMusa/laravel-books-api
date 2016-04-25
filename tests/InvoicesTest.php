<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class BooksTest
 */
class InvoicesTest extends TestCase {

    /** @test */
    public function testfetchInvoices() {
        $this->json('GET', '/api/v1/invoices')
            ->seeJsonStructure([
                '*' => [
                    'id', 'amount','created_at','qty','updated_at'
                ]
            ]);
    }

    /** @test */
    public function testFetchSingleInvoice() {
        $this->get('/api/v1/invoices/1')
            ->seeJsonStructure([
                'id',
                'amount',
                'qty',
                'updated_at'
            ]);
    }
}
