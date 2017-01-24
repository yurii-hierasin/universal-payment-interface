<?php

namespace YuriiOrg\Tests\Entity;

use YuriiOrg\Entity\CustomerAddress;

class CustomerAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function dataProvider_testSettersAndGetters()
    {
        return array(
            'Street setter&getter'  => array('street'),
            'City setter&getter'    => array('city'),
            'State setter&getter'   => array('state'),
            'Zip setter&getter'     => array('zip'),
            'Country setter&getter' => array('country'),
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
        $address = new CustomerAddress();
        $result = $address->{'set' . $methodName}($value);

        $this->assertInstanceOf('YuriiOrg\Entity\CustomerAddress', $result);
        $this->assertEquals($value, $address->{'get' . $methodName}());
    }
}
