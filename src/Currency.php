<?php

namespace MyApplication;

use Data\DataIsoCode;
use InvalidArgumentException;

require 'autoloader.php';

class Currency
{
    /**
     * @var $isoCode
     */
    private $isoCode;
    private array $allIsoCode = [];

    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
        $this->allIsoCode = DataIsoCode::getAllCode();
    }

    /**
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @param mixed $isoCode
     */
    private function setIsoCode($isoCode)
    {
        $this->checkIsoCode($isoCode);
        $this->isoCode = $isoCode;
    }

    /**
     * @param $isoCode
     * @return bool
     */
    private function checkIsoCode($isoCode)
    {
        if (!$isoCode && !array_key_exists($isoCode, $this->allIsoCode)) {
            throw new InvalidArgumentException('Not found this isoCode');
        }
        return true;
    }

    /**
     * @param Currency $currency
     * @return bool
     */
    public function equals(Currency $currency)
    {
        return $this == $currency;
    }
}