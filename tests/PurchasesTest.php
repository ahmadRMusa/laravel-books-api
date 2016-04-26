<?php

/**
 * Class BooksTest
 */
class PurchasesTest extends TestCase {

    /** @test */
    public function testPurchase() {
        $data = array(
            'book_id' => '1',
            'qty' => '1',
        );

        $this->call('POST', '/api/v1/purchases', $data);
        $this->assertResponseOk();
    }
}
