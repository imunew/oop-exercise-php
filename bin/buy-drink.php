<?php
declare(strict_types=1);

require_once __DIR__. '/../vendor/autoload.php';

use App\BuyDrink;

/**
 * Class BuyDrink
 */

function main()
{
    $buyDrink = new BuyDrink();
    $buyDrink->inputCoin();
    $buyDrink->selectDrinkType();
}

main();
