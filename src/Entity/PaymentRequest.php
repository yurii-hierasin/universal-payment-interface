<?php

namespace YuriiOrg\Entity;

use YuriiOrg\Interfaces\CustomerAddressInterface;
use YuriiOrg\Interfaces\PaymentCardInterface;
use YuriiOrg\Interfaces\RequestInterface;

class PaymentRequest implements RequestInterface
{
    protected $customerProfileId;
    protected $paymentProfileId;
    protected $transactionId;
    protected $parentTransactionId;
    protected $tokenValue;
    protected $description;
    protected $email;
    protected $currency;
    protected $amount;
    /**
     * @var CustomerAddressInterface
     */
    protected $customerAddress;
    /**
     * @var PaymentCardInterface
     */
    protected $paymentCard;

    /**
     * @return mixed
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * @param mixed $customerProfileId
     *
     * @return $this
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentProfileId()
    {
        return $this->paymentProfileId;
    }

    /**
     * @param mixed $paymentProfileId
     *
     * @return $this
     */
    public function setPaymentProfileId($paymentProfileId)
    {
        $this->paymentProfileId = $paymentProfileId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentTransactionId()
    {
        return $this->parentTransactionId;
    }

    /**
     * @param mixed $parentTransactionId
     *
     * @return $this
     */
    public function setParentTransactionId($parentTransactionId)
    {
        $this->parentTransactionId = $parentTransactionId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenValue()
    {
        return $this->tokenValue;
    }

    /**
     * @param mixed $tokenValue
     *
     * @return $this
     */
    public function setTokenValue($tokenValue)
    {
        $this->tokenValue = $tokenValue;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return CustomerAddressInterface
     */
    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }

    /**
     * @param CustomerAddressInterface $customerAddress
     *
     * @return $this
     */
    public function setCustomerAddress(CustomerAddressInterface $customerAddress)
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * @return PaymentCardInterface
     */
    public function getPaymentCard()
    {
        return $this->paymentCard;
    }

    /**
     * @param PaymentCardInterface $paymentCard
     *
     * @return $this
     */
    public function setPaymentCard(PaymentCardInterface $paymentCard)
    {
        $this->paymentCard = $paymentCard;

        return $this;
    }
}
