<?php
declare(strict_types=1);

namespace App;

/**
 * Class VendingMachine
 * @package App
 */
class VendingMachine
{
    /** @var int */
    private $quantityOfCoke = 5;

    /** @var int */
    private $quantityOfDietCoke = 5;

    /** @var int */
    private $quantityOfTea = 5;

    /** @var int */
    private $numberOf100Yen = 10;

    /** @var int */
    private $charge = 0;

    /**
     * @param int $i
     * @param int $kindOfDrink
     * @return Drink|null
     */
    public function buy(int $i, int $kindOfDrink) : Drink
    {
        // 100円と500円だけ受け付ける
        if (($i != 100) && ($i != 500)) {
            $this->charge += $i;
            return null;
        }

        if (($kindOfDrink == Drink::COKE) && ($this->quantityOfCoke == 0)) {
            $this->charge += $i;
            return null;
        } else if (($kindOfDrink == Drink::DIET_COKE) && ($this->quantityOfDietCoke == 0)) {
            $this->charge += $i;
            return null;
        } else if (($kindOfDrink == Drink::TEA) && ($this->quantityOfTea == 0)) {
            $this->charge += $i;
            return null;
        }

        // 釣り銭不足
        if ($i == 500 && $this->numberOf100Yen < 4) {
            $this->charge += $i;
            return null;
        }

        if ($i == 100) {
            // 100円玉を釣り銭に使える
            $this->numberOf100Yen++;
        } else if ($i == 500) {
            // 400円のお釣り
            $this->charge += ($i - 100);
            // 100円玉を釣り銭に使える
            $this->numberOf100Yen -= ($i - 100) / 100;
        }

        if ($kindOfDrink == Drink::COKE) {
            $this->quantityOfCoke--;
        } else if ($kindOfDrink == Drink::DIET_COKE) {
            $this->quantityOfDietCoke--;
        } else {
            $this->quantityOfTea--;
        }

        return new Drink($kindOfDrink);
    }

    /**
     * お釣りを取り出す.
     *
     * @return int お釣りの金額
     */
    public function refund() : int
    {
        $result = $this->charge;
        $this->charge = 0;
        return $result;
    }
}
