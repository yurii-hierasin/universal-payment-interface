<?php

namespace YuriiOrg\Tests\Entity;

use YuriiOrg\Entity\PaymentCard;

class PaymentCardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function dataProvider_testSettersAndGetters()
    {
        return array(
            'Holder first name setter&getter'             => array('holderFirstName'),
            'Holder last name setter&getter'              => array('holderLastName'),
            'Expiration month setter&getter'              => array('expirationMonth'),
            'Expiration year setter&getter'               => array('expirationYear'),
            'Last 4 digits of payment card setter&getter' => array('last4'),
        );
    }

    /**
     * @dataProvider dataProvider_testSettersAndGetters
     *
     * @param string $methodName Property name, which will set and get
     */
    public function testSettersAndGetters($methodName)
    {
        $value = 'some value';
        $address = new PaymentCard();
        $result = $address->{'set' . $methodName}($value);

        $this->assertInstanceOf('YuriiOrg\Entity\PaymentCard', $result);
        $this->assertEquals($value, $address->{'get' . $methodName}());
    }
}
