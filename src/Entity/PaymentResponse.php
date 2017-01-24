<?php

namespace YuriiOrg\Entity;

use YuriiOrg\Interfaces\PaymentCardInterface;
use YuriiOrg\Interfaces\ResponseInterface;

class PaymentResponse implements ResponseInterface
{
    /**
     * @var bool
     */
    protected $isSuccess = false;
    /**
     * @var string
     */
    protected $error;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var PaymentCardInterface
     */
    protected $paymentCard;
    /**
     * @var string
     */
    protected $errorCode;
    /**
     * @var string Using at creating profile step only
     */
    protected $customerProfileId;
    /**
     * @var string Using at creating profile step only
     */
    protected $paymentProfileId;

    public function __construct()
    {
        $this->paymentCard = new PaymentCard();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * @return string
     */
    public function getPaymentProfileId()
    {
        return $this->paymentProfileId;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }
}
