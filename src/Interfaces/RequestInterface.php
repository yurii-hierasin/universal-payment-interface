<?php

namespace YuriiOrg\Interfaces;

interface RequestInterface
{
    /**
     * @return mixed
     */
    public function getCustomerProfileId();

    /**
     * @param mixed $customerProfileId
     *
     * @return $this
     */
    public function setCustomerProfileId($customerProfileId);

    /**
     * @return mixed
     */
    public function getPaymentProfileId();

    /**
     * @param mixed $paymentProfileId
     *
     * @return $this
     */
    public function setPaymentProfileId($paymentProfileId);

    /**
     * @return mixed
     */
    public function getTransactionId();

    /**
     * @param mixed $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId);

    /**
     * @return mixed
     */
    public function getParentTransactionId();

    /**
     * @param mixed $parentTransactionId
     *
     * @return $this
     */
    public function setParentTransactionId($parentTransactionId);

    /**
     * @return mixed
     */
    public function getTokenValue();

    /**
     * @param mixed $tokenValue
     *
     * @return $this
     */
    public function setTokenValue($tokenValue);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param mixed $description
     *
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @param mixed $email
     *
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return mixed
     */
    public function getCurrency();

    /**
     * @param mixed $currency
     *
     * @return $this
     */
    public function setCurrency($currency);

    /**
     * @return mixed
     */
    public function getAmount();

    /**
     * @param mixed $amount
     *
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return CustomerAddressInterface
     */
    public function getCustomerAddress();

    /**
     * @param CustomerAddressInterface $customerAddress
     *
     * @return $this;
     */
    public function setCustomerAddress(CustomerAddressInterface $customerAddress);

    /**
     * @return PaymentCardInterface
     */
    public function getPaymentCard();

    /**
     * @param PaymentCardInterface $paymentCard
     *
     * @return $this
     */
    public function setPaymentCard(PaymentCardInterface $paymentCard);
}
