<?php

namespace League\CLImate\Util;

use League\CLImate\Util\System\SystemFactory;
use League\CLImate\Util\System\SystemInterface;

class UtilFactory
{
    /**
     * A instance of the appropriate System class
     *
     * @var \League\CLImate\Util\System\SystemInterface
     */

    public $system;

    /**
     * A instance of the Cursor class
     *
     * @var \League\CLImate\Util\Cursor
     */

    public $cursor;

    public function __construct(SystemInterface $system = null, Cursor $cursor = null)
    {
        $this->system     = $system ?: SystemFactory::getInstance();
        $this->cursor     = $cursor ?: new Cursor();
    }

    /**
     * Get the width of the terminal
     *
     * @return integer
     */

    public function width()
    {
        return $this->getDimension($this->system->width(), 80);
    }

    /**
     * Get the height of the terminal
     *
     * @return integer
     */

    public function height()
    {
        return $this->getDimension($this->system->height(), 25);
    }

    /**
     * Determine if the value is numeric, fallback to a default if not
     *
     * @param integer|null $dimension
     * @param integer $default
     * @return integer
     */

    protected function getDimension($dimension, $default)
    {
        return (is_numeric($dimension)) ? $dimension : $default;
    }
}
