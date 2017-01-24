<?php

namespace YuriiOrg\Entity;

use YuriiOrg\Interfaces\PaymentCardInterface;

class PaymentCard implements PaymentCardInterface
{
    /**
     * @var string
     */
    protected $holderFirstName;
    /**
     * @var string
     */
    protected $holderLastName;
    /**
     * @var int
     */
    protected $expirationMonth;
    /**
     * @var int
     */
    protected $expirationYear;
    /**
     * @var int
     */
    protected $last4;

    /**
     * @return string
     */
    public function getHolderFirstName()
    {
        return $this->holderFirstName;
    }

    /**
     * @param string $holderFirstName
     *
     * @return $this
     */
    public function setHolderFirstName($holderFirstName)
    {
        $this->holderFirstName = $holderFirstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getHolderLastName()
    {
        return $this->holderLastName;
    }

    /**
     * @param string $holderLastName
     *
     * @return $this
     */
    public function setHolderLastName($holderLastName)
    {
        $this->holderLastName = $holderLastName;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param int $expirationMonth
     *
     * @return $this
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * @param int $expirationYear
     *
     * @return $this
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;

        return $this;
    }

    /**
     * @return int
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * @param int $last4
     *
     * @return $this
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;

        return $this;
    }
}
