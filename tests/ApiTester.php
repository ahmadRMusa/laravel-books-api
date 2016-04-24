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
    protected $fake;

    protected $times = 1;

    /**
     * Constructor
     */
    public function __construct() {
        $this->fake = Faker::create();
    }

    /**
     * Migrate data
     */
    public function setUp() {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * Count function
     *
     * @param $count
     * @return $this
     */
     public function times($count) {
        $this->times = $count;

        return $this;
    }

    /**
     *
     * Get JSON
     *
     * @param $uri
     * @return mixed
     */
    public function getJson($uri) {
        return json_decode($this->call('GET', $uri)->getContent());
    }

    /**
     * Verify object attributes
     */
    public function assertObjectHasAttributes() {
        $args = func_get_args();

        $object = array_shift($args);

        foreach($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }

    /**
     *
     * Make resource item from stub
     *
     * @param $type
     * @param array $fields
     */
    protected function make($type, array $fields = []) {
        while($this->times--) {
            $stub = array_merge($this->getStub(), $fields);
            $type::create($stub);
        }
    }

    /**
     * Get stub
     */
    protected function getStub() {
        throw new BadMethodCallException('Create your own getStub method to declare fields');
    }
}
