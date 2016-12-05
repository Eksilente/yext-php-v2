<?php
/**
 * Duplicate
 *
 * PHP version 5
 *
 * @category Class
 * @package  Yext\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Yext API
 *
 * 
 *
 * OpenAPI spec version: 0.0.2
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Yext\Client\Model;

use \ArrayAccess;

/**
 * Duplicate Class Doc Comment
 *
 * @category    Class */
/**
 * @package     Yext\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Duplicate implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Duplicate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'status' => 'string',
        'name' => 'string',
        'url' => 'string',
        'longitude' => 'string',
        'phone' => 'string',
        'location_id' => 'string',
        'address' => 'string',
        'latitude' => 'string',
        'publisher_id' => 'string',
        'id' => 'string',
        'unavailable_reasons' => '\Yext\Client\Model\DuplicateUnavailableReason[]'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'status' => 'status',
        'name' => 'name',
        'url' => 'url',
        'longitude' => 'longitude',
        'phone' => 'phone',
        'location_id' => 'locationId',
        'address' => 'address',
        'latitude' => 'latitude',
        'publisher_id' => 'publisherId',
        'id' => 'id',
        'unavailable_reasons' => 'unavailableReasons'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'status' => 'setStatus',
        'name' => 'setName',
        'url' => 'setUrl',
        'longitude' => 'setLongitude',
        'phone' => 'setPhone',
        'location_id' => 'setLocationId',
        'address' => 'setAddress',
        'latitude' => 'setLatitude',
        'publisher_id' => 'setPublisherId',
        'id' => 'setId',
        'unavailable_reasons' => 'setUnavailableReasons'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'status' => 'getStatus',
        'name' => 'getName',
        'url' => 'getUrl',
        'longitude' => 'getLongitude',
        'phone' => 'getPhone',
        'location_id' => 'getLocationId',
        'address' => 'getAddress',
        'latitude' => 'getLatitude',
        'publisher_id' => 'getPublisherId',
        'id' => 'getId',
        'unavailable_reasons' => 'getUnavailableReasons'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    const STATUS_POSSIBLE_DUPLICATE = 'POSSIBLE_DUPLICATE';
    const STATUS_SUPPRESSION_REQUESTED = 'SUPPRESSION_REQUESTED';
    const STATUS_SUPRESSED = 'SUPRESSED';
    const STATUS_UNAVAILABLE = 'UNAVAILABLE';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_POSSIBLE_DUPLICATE,
            self::STATUS_SUPPRESSION_REQUESTED,
            self::STATUS_SUPRESSED,
            self::STATUS_UNAVAILABLE,
        ];
    }
    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['longitude'] = isset($data['longitude']) ? $data['longitude'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['location_id'] = isset($data['location_id']) ? $data['location_id'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['latitude'] = isset($data['latitude']) ? $data['latitude'] : null;
        $this->container['publisher_id'] = isset($data['publisher_id']) ? $data['publisher_id'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['unavailable_reasons'] = isset($data['unavailable_reasons']) ? $data['unavailable_reasons'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        $allowed_values = ["POSSIBLE_DUPLICATE", "SUPPRESSION_REQUESTED", "SUPRESSED", "UNAVAILABLE"];
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'status', must be one of #{allowed_values}.";
        }

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        $allowed_values = ["POSSIBLE_DUPLICATE", "SUPPRESSION_REQUESTED", "SUPRESSED", "UNAVAILABLE"];
        if (!in_array($this->container['status'], $allowed_values)) {
            return false;
        }
        return true;
    }


    /**
     * Gets status
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     * @param string $status The status of the duplicate
     * @return $this
     */
    public function setStatus($status)
    {
        $allowed_values = array('POSSIBLE_DUPLICATE', 'SUPPRESSION_REQUESTED', 'SUPRESSED', 'UNAVAILABLE');
        if (!is_null($status) && (!in_array($status, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'status', must be one of 'POSSIBLE_DUPLICATE', 'SUPPRESSION_REQUESTED', 'SUPRESSED', 'UNAVAILABLE'");
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name Duplicate listing name
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets url
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     * @param string $url URL of Duplicate listing
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets longitude
     * @return string
     */
    public function getLongitude()
    {
        return $this->container['longitude'];
    }

    /**
     * Sets longitude
     * @param string $longitude Duplicate listing longitude
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->container['longitude'] = $longitude;

        return $this;
    }

    /**
     * Gets phone
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     * @param string $phone Duplicate listing phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets location_id
     * @return string
     */
    public function getLocationId()
    {
        return $this->container['location_id'];
    }

    /**
     * Sets location_id
     * @param string $location_id ID of the location the suggestion is for
     * @return $this
     */
    public function setLocationId($location_id)
    {
        $this->container['location_id'] = $location_id;

        return $this;
    }

    /**
     * Gets address
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     * @param string $address Duplicate listing address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets latitude
     * @return string
     */
    public function getLatitude()
    {
        return $this->container['latitude'];
    }

    /**
     * Sets latitude
     * @param string $latitude Duplicate listing latitude
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->container['latitude'] = $latitude;

        return $this;
    }

    /**
     * Gets publisher_id
     * @return string
     */
    public function getPublisherId()
    {
        return $this->container['publisher_id'];
    }

    /**
     * Sets publisher_id
     * @param string $publisher_id ID of the publisher who submitted the suggestion
     * @return $this
     */
    public function setPublisherId($publisher_id)
    {
        $this->container['publisher_id'] = $publisher_id;

        return $this;
    }

    /**
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param string $id ID of this Publisher Suggestion
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets unavailable_reasons
     * @return \Yext\Client\Model\DuplicateUnavailableReason[]
     */
    public function getUnavailableReasons()
    {
        return $this->container['unavailable_reasons'];
    }

    /**
     * Sets unavailable_reasons
     * @param \Yext\Client\Model\DuplicateUnavailableReason[] $unavailable_reasons List of reasons why suppression is unavailable for this Duplicate (will be empty unless status is UNAVAILABLE)
     * @return $this
     */
    public function setUnavailableReasons($unavailable_reasons)
    {
        $this->container['unavailable_reasons'] = $unavailable_reasons;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Yext\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Yext\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}
