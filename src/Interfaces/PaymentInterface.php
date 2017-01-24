<?php

namespace YuriiOrg\Interfaces;

/**
 * Provide universal interface for collaboration with different payment gateways.
 *
 * Interface PaymentInterface
 *
 * @package YuriiOrg\Interfaces
 */
interface PaymentInterface
{
    /**
     * Get money from client.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function charge(RequestInterface $request);

    /**
     * Create full/partial refund transaction
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function credit(RequestInterface $request);

    /**
     * Create full refund transaction, available during 24 hours.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function void(RequestInterface $request);

    /**
     * Create customer profile.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function createCustomerProfile(RequestInterface $request);

    /**
     * Create payment profile. It using to store at server side only hash of card,
     * no whole information with credit card number, expiration and cvc code.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function createPaymentProfile(RequestInterface $request);

    /**
     * Some payment gateways like Authorize not allow create few identical payments profiles (cards)
     * under one customer profile. This method allow to get payment profile id,
     * if id not exist it will create profile,
     * if id exist it will find it and return id.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface|string
     */
    public function getPaymentProfileId(RequestInterface $request);

    /**
     * Login can be used to get Token in js
     *
     * @return string
     */
    public function getLogin();

    /**
     * Public key ca be used to get token in js
     *
     * @return string
     */
    public function getPublicKey();
}
