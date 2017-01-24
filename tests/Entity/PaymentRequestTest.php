<?php

namespace YuriiOrg\Tests\Entity;

use YuriiOrg\Entity\CustomerAddress;
use YuriiOrg\Entity\PaymentCard;
use YuriiOrg\Entity\PaymentRequest;

class PaymentRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function dataProvider_testSettersAndGetters()
    {
        return array(
            'Customer profile id setter&getter'   => array('customerProfileId'),
            'Payment profile id setter&getter'    => array('paymentProfileId'),
            'Transaction id setter&getter'        => array('transactionId'),
            'Parent transaction id setter&getter' => array('parentTransactionId'),
            'Token value setter&getter'           => array('tokenValue'),
            'Description setter&getter'           => array('description'),
            'Email setter&getter'                 => array('email'),
            'Currency setter&getter'              => array('currency'),
            'Amount setter&getter'                => array('amount'),
            'Customer address setter&getter'      => array('customerAddress', new CustomerAddress()),
            'Payment card setter&getter'          => array('paymentCard', new PaymentCard()),
        );
    }

    /**
     * @dataProvider dataProvider_testSettersAndGetters
     *
     * @param string $methodName Property name, which will set and get
     * @param mixed  $object     Address and Card objects
     */
    public function testSettersAndGetters($methodName, $object = null)
    {
        $value = $object ?: 'some value';
        $address = new PaymentRequest();
        $result = $address->{'set' . $methodName}($value);

        $this->assertInstanceOf('YuriiOrg\Entity\PaymentRequest', $result);
        $this->assertEquals($value, $address->{'get' . $methodName}());
    }
}
