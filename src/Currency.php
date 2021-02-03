<?php
namespace Hillel\MyApplication;


use InvalidArgumentException;

class Currency
{
    /**
     * @var $isoCode
     */
    private $isoCode;
    public array $allIsoCode = [];

    public function __construct($isoCode)
    {
        $this->allIsoCode = DataIsoCode::getAllCode();
        $this->setIsoCode($isoCode);
    }

    /**
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function getAllIsoCode()
    {
        return $this->allIsoCode;
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
        if (!array_key_exists($isoCode, $this->getAllIsoCode())) {
            throw new InvalidArgumentException('Not found this isoCode');
        }
        return true;
    }

    /**
     * @param Currency $currency1
     * @param Currency $currency2
     * @return bool
     */
    public function equals(Currency $currency1,Currency $currency2)
    {
        return $currency1 == $currency2;
    }
}
