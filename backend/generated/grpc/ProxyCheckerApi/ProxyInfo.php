<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace ProxyCheckerApi;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>proxy_checker_api.ProxyInfo</code>
 */
class ProxyInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.proxy_checker_api.ProxyType type = 1;</code>
     */
    protected $type = 0;
    /**
     * Generated from protobuf field <code>string externalIp = 2;</code>
     */
    protected $externalIp = '';
    /**
     * Generated from protobuf field <code>string country = 3;</code>
     */
    protected $country = '';
    /**
     * Generated from protobuf field <code>string city = 4;</code>
     */
    protected $city = '';
    /**
     * Generated from protobuf field <code>double timeout = 5;</code>
     */
    protected $timeout = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $type
     *     @type string $externalIp
     *     @type string $country
     *     @type string $city
     *     @type float $timeout
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.proxy_checker_api.ProxyType type = 1;</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Generated from protobuf field <code>.proxy_checker_api.ProxyType type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \ProxyCheckerApi\ProxyType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string externalIp = 2;</code>
     * @return string
     */
    public function getExternalIp()
    {
        return $this->externalIp;
    }

    /**
     * Generated from protobuf field <code>string externalIp = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setExternalIp($var)
    {
        GPBUtil::checkString($var, True);
        $this->externalIp = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string country = 3;</code>
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Generated from protobuf field <code>string country = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setCountry($var)
    {
        GPBUtil::checkString($var, True);
        $this->country = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string city = 4;</code>
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Generated from protobuf field <code>string city = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setCity($var)
    {
        GPBUtil::checkString($var, True);
        $this->city = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>double timeout = 5;</code>
     * @return float
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Generated from protobuf field <code>double timeout = 5;</code>
     * @param float $var
     * @return $this
     */
    public function setTimeout($var)
    {
        GPBUtil::checkDouble($var);
        $this->timeout = $var;

        return $this;
    }

}

