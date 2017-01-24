<?php

namespace YuriiOrg\Tests;

use YuriiOrg\PaymentResolver;

class Foo
{
    public $first;
    public $second;

    public function __construct($first, $second)
    {
        $this->first = $first;
        $this->second = $second;
    }
}

class Bar
{
    public $first;
    public $second;

    public function __construct($first, $second)
    {
        $this->first = $first;
        $this->second = $second;
    }
}

class PaymentResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolver()
    {
        $cfg = array(
            'customRealizationDomainsList' => array(),
            'default' => '\YuriiOrg\Tests\Bar',
            'domains' => array(
                '\YuriiOrg\Tests\Bar' => array(
                    'US' => array(
                        'liveMode' => array(
                            'authorizePublicKey',
                            'authorizePrivetKey',
                        ),
                        'testMode' => array(
                            'authorizePublicKeyTest',
                            'authorizePrivetKeyTest',
                        ),
                    )
                ),
                '\YuriiOrg\Tests\Foo' => array(
                    'CA' => array(
                        'liveMode' => array(
                            'fooPublicKey',
                            'fooPrivetKey',
                        ),
                        'testMode' => array(
                            'fooPublicKeyTest',
                            'fooPrivetKeyTest',
                        ),
                    )
                ),
                '\SomeOtherClass\PaymentGateway' => array(
                    'GB' => array(
                        'liveMode' => array(
                            'gatewayPublicKey',
                            'gatewayPrivetKey',
                            'gatewayPrivetKey',
                        ),
                        'testMode' => array(
                            'gatewayPublicKeyTest',
                            'gatewayPrivetKeyTest',
                            'gatewayPrivetKeyTest',
                        ),
                    ),
                ),
            )
        );

        $paymentResolver = new PaymentResolver('CA', $cfg);
        $payment = $paymentResolver->getPaymentInstance();
        $this->assertInstanceOf('\YuriiOrg\Tests\Foo', $payment);
        $this->assertAttributeEquals('fooPublicKey', 'first', $payment);
        $this->assertAttributeEquals('fooPrivetKey', 'second', $payment);

        $paymentResolver = new PaymentResolver('UA', $cfg);
        $payment = $paymentResolver->getPaymentInstance();
        $this->assertInstanceOf('\YuriiOrg\Tests\Bar', $payment);
        $this->assertAttributeEquals('authorizePublicKey', 'first', $payment);
        $this->assertAttributeEquals('authorizePrivetKey', 'second', $payment);

        $paymentResolver = new PaymentResolver('CA', $cfg);
        $payment = $paymentResolver->getPaymentInstance(PaymentResolver::$testMode);
        $this->assertInstanceOf('\YuriiOrg\Tests\Foo', $payment);
        $this->assertAttributeEquals('fooPublicKeyTest', 'first', $payment);
        $this->assertAttributeEquals('fooPrivetKeyTest', 'second', $payment);

        $paymentResolver = new PaymentResolver('UA', $cfg);
        $payment = $paymentResolver->getPaymentInstance(PaymentResolver::$testMode);
        $this->assertInstanceOf('\YuriiOrg\Tests\Bar', $payment);
        $this->assertAttributeEquals('authorizePublicKeyTest', 'first', $payment);
        $this->assertAttributeEquals('authorizePrivetKeyTest', 'second', $payment);
    }

    /**
     * @expectedException \YuriiOrg\Exceptions\PaymentResolverInvalidArgumentException
     * @expectedExceptionMessage Wrong environment argument, passed: someWrongEnvironmentKey
     */
    public function testExceptionInvalidArgumentCase()
    {
        $paymentResolver = new PaymentResolver('CA', array('someThings'));
        $payment = $paymentResolver->getPaymentInstance('someWrongEnvironmentKey');
    }

    /**
     * @expectedException \YuriiOrg\Exceptions\PaymentResolverGatewayNotFound
     * @expectedExceptionMessage Can not find any available payment gateways for current setting
     */
    public function testExceptionPaymentGatewayNotFound()
    {
        $cfg = array(
            'default' => '',
            'domains' => array(),
        );

        $paymentResolver = new PaymentResolver('CA', $cfg);
        $payment = $paymentResolver->getPaymentInstance(PaymentResolver::$liveMode);
    }

    public function testGetCustomRealizationDomainList()
    {
        $cfg = array(
            'customRealizationDomainsList' => array(
                'AE', 'EG',
            ),
            'default' => '\YuriiOrg\Tests\Bar',
            'domains' => array(
                '\YuriiOrg\Tests\Bar' => array(
                    'US' => array(
                        'liveMode' => array(
                            'authorizePublicKey',
                            'authorizePrivetKey',
                        ),
                        'testMode' => array(
                            'authorizePublicKeyTest',
                            'authorizePrivetKeyTest',
                        ),
                    )
                ),
            ),
        );

        $paymentResolver = new PaymentResolver('CA', $cfg);
        $this->assertEquals(array('AE', 'EG'), $paymentResolver->getCustomRealizationDomainList());

        $cfg['customRealizationDomainsList'] = array();
        $paymentResolver = new PaymentResolver('CA', $cfg);
        $this->assertEquals(array(), $paymentResolver->getCustomRealizationDomainList());

        $cfg['customRealizationDomainsList'] = null;
        $paymentResolver = new PaymentResolver('CA', $cfg);
        $this->assertEquals(array(), $paymentResolver->getCustomRealizationDomainList());
    }
}
