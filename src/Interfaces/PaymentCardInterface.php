<?php

namespace YuriiOrg\Interfaces;

interface PaymentCardInterface
{
    /**
     * @return mixed
     */
    public function getHolderFirstName();

    /**
     * @param mixed $firstName
     *
     * @return $this
     */
    public function setHolderFirstName($firstName);

    /**
     * @return mixed
     */
    public function getHolderLastName();

    /**
     * @param mixed $lastName
     *
     * @return $this
     */
    public function setHolderLastName($lastName);

    /**
     * @return mixed
     */
    public function getExpirationMonth();

    /**
     * @return mixed
     *
     * @return $this
     */
    public function setExpirationMonth($expirationMonth);

    /**
     * @return mixed
     */
    public function getExpirationYear();

    /**
     * @return mixed
     *
     * @return $this
     */
    public function setExpirationYear($expirationYear);

    /**
     * @return mixed
     */
    public function getLast4();

    /**
     * @return mixed
     *
     * @return $this
     */
    public function setLast4($last4);
}
