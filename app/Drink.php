<?php
declare(strict_types=1);

namespace App;

/**
 * Class Drink
 * @package App
 */
class Drink
{
    const COKE = 0;
    const DIET_COKE = 1;
    const TEA = 2;

    /** @var int */
    private $kind;

    /**
     * Drink constructor.
     * @param int $kind
     */
    public function __construct(int $kind)
    {
        $this->kind = $kind;
    }
}
