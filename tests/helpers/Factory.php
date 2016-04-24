<?php

/**
 * Class Factory
 */
trait Factory {

    /**
     * @var int
     */
    protected $times = 1;

    /**
     * @param $count
     * @return $this
     */
    public function times($count) {
        $this->times = $count;

        return $this;
    }

    /**
     *
     * Create stub
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
     * Get stub method
     */
    protected function getStub() {
        throw new BadMethodCallException('Create your own getStub method to declare fields');
    }
}
