<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        $copy = $this->wallet;
        sort($this->wallet);
        $this->wallet = array_reverse($this->wallet);
        $len = count($this->wallet);
        for ($i = 0; $i < $len && $price > 0; $i++) {
            // convert to int php
            $value = (int) $this->wallet[$i];
            if ($value) {
                $price -= $this->wallet[$i];
                array_splice($this->wallet, $i, 1);
                $i--;
                $len--;
            }
        }

        $this->computeTotal();
        if ($price <= 0) {
            return true;
        }
        else {
            $this->wallet = $copy;
            $this->computeTotal();
            return false;
        }
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
