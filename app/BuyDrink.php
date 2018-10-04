<?php
declare(strict_types=1);

namespace App;

/**
 * Class BuyDrink
 * @package App
 */
class BuyDrink
{
    /** @var VendingMachine */
    private $vendingMachine;

    /** @var int */
    private $coin;

    /** @var int */
    private $kindOfDrink;

    /**
     * BuyDrink constructor.
     */
    public function __construct()
    {
        $this->vendingMachine = new VendingMachine();
    }

    /**
     * @return void
     */
    public function inputCoin()
    {
        static $availableCoins = [1 => 100, 5 => 500];

        do {
            echo '硬貨を投入してください 1:100円, 5:500円'. PHP_EOL;
            list($coin) = fscanf(STDIN, '%d');

        } while (!array_key_exists($coin, $availableCoins));

        $this->coin = $availableCoins[$coin];
    }

    /**
     * @return void
     */
    public function selectDrinkType()
    {
        static $availableKindOfDrinks = [
            1 => Drink::COKE,
            2 => Drink::DIET_COKE,
            3 => Drink::TEA
        ];

        do {
            echo '飲み物を選択してください 1:コーラ, 2:ダイエットコーラ, 3:紅茶'. PHP_EOL;
            list($kindOfDrink) = fscanf(STDIN, '%d');

        } while (!array_key_exists($kindOfDrink, $availableKindOfDrinks));

        $this->kindOfDrink = $availableKindOfDrinks[$kindOfDrink];
        $drink = $this->vendingMachine->buy($this->coin, $this->kindOfDrink);

        if ($drink instanceof Drink) {
            echo "購入ありがとうございました。". PHP_EOL;
            return;
        }
        echo "購入できませんでした。". PHP_EOL;
    }
}
