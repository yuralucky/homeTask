<?php

namespace Hillel\MyApplication;

use InvalidArgumentException;

class Money
{
    private $amount;
    private Currency $currency;

    public function __construct($amount, $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * @param $amount
     */
    private function setAmount($amount)
    {
        $this->amount = $amount;
    }


    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param Money $money1
     * @return bool
     */
    public function equals(Money $money1)
    {
        return $money1 == $this;
    }

    /**
     * @param Money $money1
     * @param Money $money2
     * @return bool
     */
    private function checkDiffCurrencies(Money $money1, Money $money2)
    {
        return $money1->getCurrency() == $money2->getCurrency();
    }

    /**
     * @param Money $money
     * @return mixed
     */
    public function add(Money $money)
    {
        $checkDiffCurrencies = $this->checkDiffCurrencies($this, $money);
        if ($checkDiffCurrencies) {
            $this->setAmount($this->getAmount() + $money->getAmount());
            return $this->getAmount();
        } else {
            throw new InvalidArgumentException(' Impossible to add two different currencies');
        }
    }


}
