<?php

class ListBuilder extends RecursiveIteratorIterator
{
    protected $array;
    protected $output = '';

    public function __construct(array $array) {
        // We need to be able to loop over the array recursively
        $this->array = new RecursiveArrayIterator($array);
        // Call the RecursiveIteratorIterator parent constructor
        // Second argument gets both array keys & values
        parent::__construct($this->array, parent::SELF_FIRST);
    }

    /**
     * Called automatically at the beginning of the loop
     * Add opening list tag
     */
    public function beginIteration() {
        $this->output .= '<ul>';
    }

    /**
     * Called automatically at the end of the loop
     * Add closing list tag
     */
    public function endIteration() {
        $this->output .= '</ul>';
    }

    /**
     * Called automatically at the beginning of a subarray
     * Add an opening list tag
     */
    public function beginChildren() {
        $this->output .= '<ul>';
    }

    /**
     * Called automatically at the end of a subarray
     * Close the nested list and current list item
     */
    public function endChildren() {
        $this->output .= '</ul></li>';
    }

    /**
     * Called automatically for each array element
     */
    public function nextElement() {
        // Check whether there's a subarray
        if (parent::callHasChildren()) {
            // Display the subarray's key
            $this->output .= '<li>' . self::key();
        } else {
            // Display the current array element
            $this->output .= '<li>' . self::current() . '</li>';
        }
    }

    /**
     * Generate the list and return the output as a string
     */
    public function __toString() {
        // Generate the list
        $this->run();
        return $this->output;
    }

    /**
     * Run the iterator internally
     */
    protected function run() {
        self::beginIteration();
        while (self::valid()) {
            self::next();
        }
        self::endIteration();
    }
}