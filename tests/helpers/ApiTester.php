<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;

/**
 * Class ApiTester
 */
abstract class ApiTester extends TestCase
{
    use Factory;

    protected $fake;
    protected $user;

    /**
     * Constructor
     */
    public function __construct() {
        $this->fake = Faker::create();
    }

    /**
     * Setup data
     */
    public function setUp() {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     *
     * Get JSON
     *
     * @param $uri
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function getJson($uri, $method = 'GET', $parameters = []) {
        if($method == 'POST')
            Auth::login($this->user);
        return json_decode($this->call($method, $uri, $parameters)->getContent());
    }

    /**
     * Check if object has attributes
     */
    public function assertObjectHasAttributes() {
        $args = func_get_args();
        $object = array_shift($args);

        foreach($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }
}
