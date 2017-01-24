<?php

namespace YuriiOrg\Interfaces;

interface CustomerAddressInterface
{
    /**
     * @return mixed
     */
    public function getStreet();

    /**
     * @param mixed $street
     *
     * @return $this
     */
    public function setStreet($street);

    /**
     * @return mixed
     */
    public function getCity();

    /**
     * @param mixed $city
     *
     * @return $this
     */
    public function setCity($city);

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @param mixed $state
     *
     * @return $this
     */
    public function setState($state);

    /**
     * @return mixed
     */
    public function getZip();

    /**
     * @param mixed $zip
     *
     * @return $this
     */
    public function setZip($zip);

    /**
     * @return mixed
     */
    public function getCountry();

    /**
     * @param mixed $country
     *
     * @return $this
     */
    public function setCountry($country);
}
