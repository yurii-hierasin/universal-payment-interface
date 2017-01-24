<?php

namespace YuriiOrg;

use YuriiOrg\Exceptions\PaymentResolverGatewayNotFound;
use YuriiOrg\Exceptions\PaymentResolverInvalidArgumentException;
use YuriiOrg\Interfaces\PaymentInterface;
use YuriiOrg\Interfaces\RequestInterface;

class PaymentResolver
{
    public static $liveMode = 'liveMode';
    public static $testMode = 'testMode';

    protected $payment;
    protected $domainLocation;
    protected $configuration;
    protected $environments = array('liveMode', 'testMode');

    public function __construct($domainLocation, $configuration)
    {
        if (empty($configuration)) {
            return null;
        }

        $this->domainLocation = strtoupper($domainLocation);
        $this->configuration = $configuration;
    }

    /**
     * @param string $environment
     *
     * @return PaymentInterface
     * @throws PaymentResolverGatewayNotFound
     * @throws PaymentResolverInvalidArgumentException
     */
    public function getPaymentInstance($environment = 'liveMode')
    {
        if (!in_array($environment, $this->environments)) {
            throw new PaymentResolverInvalidArgumentException('Wrong environment argument, passed: ' . $environment);
        }

        // Find settings for current domain
        foreach ($this->configuration['domains'] as $paymentGatewayClass => $settings) {
            foreach ($settings as $availableDomain => $arguments) {
                if ($this->domainLocation == $availableDomain) {
                    $reflection = new \ReflectionClass($paymentGatewayClass);

                    $this->payment = $reflection->newInstanceArgs($arguments[$environment]);
                    break;
                }
            }
        }

        // In previous block we don't find a configuration, try get default payment
        if (!$this->payment) {
            foreach ($this->configuration['domains'] as $paymentGatewayClass => $settings) {
                if ($this->configuration['default'] == $paymentGatewayClass) {
                    foreach ($settings as $availableDomain => $arguments) {
                        $reflection = new \ReflectionClass($paymentGatewayClass);

                        $this->payment = $reflection->newInstanceArgs($arguments[$environment]);
                        break;
                    }
                }
            }
        }

        if (!$this->payment) {
            throw new PaymentResolverGatewayNotFound('Can not find any available payment gateways for current settings.');
        }

        return $this->payment;
    }

    /**
     * @param string $gatewayName
     *
     * @return RequestInterface
     */
    public function getRequestInstance($gatewayName)
    {
        $className = sprintf('\YuriiOrg\Gateways\%s\Entity\Request', $gatewayName);

        return new $className();
    }

    /**
     * Get list of domains, which don't has a universal payment interface realization
     *
     * @return array
     */
    public function getCustomRealizationDomainList()
    {
        return is_array($this->configuration['customRealizationDomainsList'])
            ? $this->configuration['customRealizationDomainsList']
            : array();
    }
}
