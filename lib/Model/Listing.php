<?php
/**
 * Listing
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
 * Listing Class Doc Comment
 *
 * @category    Class */
/**
 * @package     Yext\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Listing implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Listing';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'status' => 'string',
        'screenshot_url' => 'string',
        'additional_status' => 'string',
        'listing_url' => 'string',
        'location_id' => 'string',
        'login_url' => 'string',
        'publisher_id' => 'string',
        'id' => 'string',
        'status_details' => '\Yext\Client\Model\ListingStatusDetail[]'
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
        'screenshot_url' => 'screenshotUrl',
        'additional_status' => 'additionalStatus',
        'listing_url' => 'listingUrl',
        'location_id' => 'locationId',
        'login_url' => 'loginUrl',
        'publisher_id' => 'publisherId',
        'id' => 'id',
        'status_details' => 'statusDetails'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'status' => 'setStatus',
        'screenshot_url' => 'setScreenshotUrl',
        'additional_status' => 'setAdditionalStatus',
        'listing_url' => 'setListingUrl',
        'location_id' => 'setLocationId',
        'login_url' => 'setLoginUrl',
        'publisher_id' => 'setPublisherId',
        'id' => 'setId',
        'status_details' => 'setStatusDetails'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'status' => 'getStatus',
        'screenshot_url' => 'getScreenshotUrl',
        'additional_status' => 'getAdditionalStatus',
        'listing_url' => 'getListingUrl',
        'location_id' => 'getLocationId',
        'login_url' => 'getLoginUrl',
        'publisher_id' => 'getPublisherId',
        'id' => 'getId',
        'status_details' => 'getStatusDetails'
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

    const STATUS_WAITING_ON_YEXT = 'WAITING_ON_YEXT';
    const STATUS_WAITING_ON_CUSTOMER = 'WAITING_ON_CUSTOMER';
    const STATUS_WAITING_ON_PUBLISHER = 'WAITING_ON_PUBLISHER';
    const STATUS_LIVE = 'LIVE';
    const STATUS_UNAVAILABLE = 'UNAVAILABLE';
    const STATUS_OPTED_OUT = 'OPTED_OUT';
    const ADDITIONAL_STATUS_CONNECTED = 'CONNECTED';
    const ADDITIONAL_STATUS_NOT_CONNECTED = 'NOT_CONNECTED';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_WAITING_ON_YEXT,
            self::STATUS_WAITING_ON_CUSTOMER,
            self::STATUS_WAITING_ON_PUBLISHER,
            self::STATUS_LIVE,
            self::STATUS_UNAVAILABLE,
            self::STATUS_OPTED_OUT,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getAdditionalStatusAllowableValues()
    {
        return [
            self::ADDITIONAL_STATUS_CONNECTED,
            self::ADDITIONAL_STATUS_NOT_CONNECTED,
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
        $this->container['screenshot_url'] = isset($data['screenshot_url']) ? $data['screenshot_url'] : null;
        $this->container['additional_status'] = isset($data['additional_status']) ? $data['additional_status'] : null;
        $this->container['listing_url'] = isset($data['listing_url']) ? $data['listing_url'] : null;
        $this->container['location_id'] = isset($data['location_id']) ? $data['location_id'] : null;
        $this->container['login_url'] = isset($data['login_url']) ? $data['login_url'] : null;
        $this->container['publisher_id'] = isset($data['publisher_id']) ? $data['publisher_id'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['status_details'] = isset($data['status_details']) ? $data['status_details'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        $allowed_values = ["WAITING_ON_YEXT", "WAITING_ON_CUSTOMER", "WAITING_ON_PUBLISHER", "LIVE", "UNAVAILABLE", "OPTED_OUT"];
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'status', must be one of #{allowed_values}.";
        }

        $allowed_values = ["CONNECTED", "NOT_CONNECTED"];
        if (!is_null($this->container['additional_status']) && !in_array($this->container['additional_status'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'additional_status', must be one of #{allowed_values}.";
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
        $allowed_values = ["WAITING_ON_YEXT", "WAITING_ON_CUSTOMER", "WAITING_ON_PUBLISHER", "LIVE", "UNAVAILABLE", "OPTED_OUT"];
        if (!in_array($this->container['status'], $allowed_values)) {
            return false;
        }
        $allowed_values = ["CONNECTED", "NOT_CONNECTED"];
        if (!in_array($this->container['additional_status'], $allowed_values)) {
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
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $allowed_values = array('WAITING_ON_YEXT', 'WAITING_ON_CUSTOMER', 'WAITING_ON_PUBLISHER', 'LIVE', 'UNAVAILABLE', 'OPTED_OUT');
        if (!is_null($status) && (!in_array($status, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'status', must be one of 'WAITING_ON_YEXT', 'WAITING_ON_CUSTOMER', 'WAITING_ON_PUBLISHER', 'LIVE', 'UNAVAILABLE', 'OPTED_OUT'");
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets screenshot_url
     * @return string
     */
    public function getScreenshotUrl()
    {
        return $this->container['screenshot_url'];
    }

    /**
     * Sets screenshot_url
     * @param string $screenshot_url URL of a screenshot of the profile page that includes the Featured Message
     * @return $this
     */
    public function setScreenshotUrl($screenshot_url)
    {
        $this->container['screenshot_url'] = $screenshot_url;

        return $this;
    }

    /**
     * Gets additional_status
     * @return string
     */
    public function getAdditionalStatus()
    {
        return $this->container['additional_status'];
    }

    /**
     * Sets additional_status
     * @param string $additional_status
     * @return $this
     */
    public function setAdditionalStatus($additional_status)
    {
        $allowed_values = array('CONNECTED', 'NOT_CONNECTED');
        if (!is_null($additional_status) && (!in_array($additional_status, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'additional_status', must be one of 'CONNECTED', 'NOT_CONNECTED'");
        }
        $this->container['additional_status'] = $additional_status;

        return $this;
    }

    /**
     * Gets listing_url
     * @return string
     */
    public function getListingUrl()
    {
        return $this->container['listing_url'];
    }

    /**
     * Sets listing_url
     * @param string $listing_url Listing URL
     * @return $this
     */
    public function setListingUrl($listing_url)
    {
        $this->container['listing_url'] = $listing_url;

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
     * @param string $location_id ID of the location associated with this listing
     * @return $this
     */
    public function setLocationId($location_id)
    {
        $this->container['location_id'] = $location_id;

        return $this;
    }

    /**
     * Gets login_url
     * @return string
     */
    public function getLoginUrl()
    {
        return $this->container['login_url'];
    }

    /**
     * Sets login_url
     * @param string $login_url URL where the user can log in to the publisher to manage this listing at that publisher (only returned for Google My Business)
     * @return $this
     */
    public function setLoginUrl($login_url)
    {
        $this->container['login_url'] = $login_url;

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
     * @param string $publisher_id ID of publisher associated with this listing
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
     * @param string $id ID of this listing
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets status_details
     * @return \Yext\Client\Model\ListingStatusDetail[]
     */
    public function getStatusDetails()
    {
        return $this->container['status_details'];
    }

    /**
     * Sets status_details
     * @param \Yext\Client\Model\ListingStatusDetail[] $status_details List of warnings, or reasons why the listing is unavailable
     * @return $this
     */
    public function setStatusDetails($status_details)
    {
        $this->container['status_details'] = $status_details;

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
