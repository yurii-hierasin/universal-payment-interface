<?php

namespace YuriiOrg\Interfaces;

/**
 * Provide universal access to the transaction data,
 * such as request and response data.
 *
 * Interface ResponseInterface
 *
 * @package YuriiOrg\Interfaces
 */
interface ResponseInterface
{
    /**
     * Transaction id, using for void|refund
     *
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getCustomerProfileId();

    /**
     * @return string
     */
    public function getPaymentProfileId();

    /**
     * Result of transaction.
     *
     * @return bool
     */
    public function isSuccess();

    /**
     * Get error if isSuccess return false.
     *
     * @return string
     */
    public function getError();
}
