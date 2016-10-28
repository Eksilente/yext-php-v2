<?php
/**
 * ActivityFilter
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
 * # Policies and Conventions  This section gives you the basic information you need to use our APIs.  ## Authentication All requests must be authenticated using an app’s API key.  <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?<b>api_key=API_KEY</b>&v=YYYYMMDD</pre>  The API key should be kept secret, as each app has exactly one API key.  ## Versioning All requests must be versioned using the **`v`** parameter.   <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?api_key=API_KEY&<b>v=YYYYMMDD</b></pre>  The **`v`** parameter (a date in `YYYYMMDD` format) is designed to give you the freedom to adapt to Yext API changes on your own schedule. When you pass this parameter, any changes we made to the API after the specified date will not affect the behavior of the request or the content of the response.  **NOTE:** Yext has the ability to make changes that affect previous versions of the API, if necessary.  ## Serialization API v2 only accepts data in JSON format.  ## Content-Type Headers For all requests that include a request body, the Content-Type header must be included and set to `application/json`.  ## Errors and Warnings There are three kinds of issues that can be reported for a given request:  * **`FATAL_ERROR`**     * An issue caused the entire request to be rejected. * **`NON_FATAL_ERROR`**     * An item is rejected, but other items present in the request are accepted (e.g., one invalid Product List item).      * A field is rejected, but the item otherwise is accepted (e.g., invalid website URL in a Location). * **`WARNING`**     * The request did not adhere to our best practices or recommendations, but the data was accepted anyway (e.g., data was sent that may cause some listings to become unavailable, a deprecated API was used, or we changed the format of a field's content to meet our requirements).  ## Validation Modes *(Available December 2016)*  API v2 will support two request validation modes: *Strict Mode* and *Lenient Mode*.  In Strict Mode, both `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported simply as `FATAL_ERROR`s, and any error will cause the entire request to fail.  In Lenient Mode, `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported as such, and only `FATAL_ERROR`s will cause a request to fail.  All requests will be processed in Strict Mode by default.  To activate Lenient Mode, append the parameter `validation=lenient` to your request URLs.  ### Dates and times * We always use milliseconds since epoch (a.k.a. Unix time) for timestamps (e.g., review creation times, webhook update times). * We always use ISO 8601 without timezone for local date times (e.g., Event start time, Event end time). * Dates are transmitted as strings: `“YYYY-MM-DD”`.  ## Account ID In keeping with RESTful design principles, every URL in API v2 has an account ID prefix. This prefix helps to ensure that you have unique URLs for all resources.  In addition to specifying resources by explicit account ID, the following two macros are defined: * **`me`** - refers to the account that owns the API key sent with the request * **`all`** - refers to the account that owns the API key sent with the request, as well as all sub-accounts (recursively)  **IMPORTANT:** The **`me`** macro is supported in all API methods.  The **`all`** macro will only be supported in certain URLs, as noted in the reference documentation.  ### Examples This URL refers to all locations in account 123. <pre>https://api.yext.com/v2/accounts/<b>123</b>/locations?api_key=456&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456. <pre>https://api.yext.com/v2/accounts/<b>me</b>/locations?<b>api_key=456</b>&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456, as well as all locations from any of its child accounts. <pre>https://api.yext.com/v2/accounts/<b>all</b>/locations?<b>api_key=456</b>&v=20160822</pre>  ## Actor Headers *(Available December 2016)*  To attribute changes to a particular user or employee, all requests may be passed with the following headers.  **NOTE:** If you choose to provide actor headers, and we are unable to authenticate the request using the values you provide, the request will result in an error and fail.  * Attribute activity to Admin user via admin login cookie *(for Yext’s use only)*     * Header: `YextEmployee`     * Value: Admin user’s AlphaLogin cookie * Attribute activity to Admin user via email address and password     * Headers: `YextEmployeeEmail`, `YextEmployeePassword`     * Values: Admin user’s email address, Admin user’s Admin password * Attribute activity to customer user via login cookie     * Header: `YextUser`     * Value: Customer user’s YextAppsLogin cookie * Attribute activity to customer user via email address and password     * Headers: `YextUserEmail`, `YextUserPassword`     * Values: Customer user’s email address, Customer user’s password  Changes will be logged as follows:  * App with no designated actor     * History Entry \"Updated By\" Value: `App [App ID] - ‘[App Name]’`     * Example: `App 432 - ‘Hello World App’` * App with customer user actor     * History Entry \"Updated By\" Value: `[user name] ([user email]) (App [App ID] - ‘[App Name]’)`     * Example: `Jordan Smith (jsmith@example.com) (App 432 - ‘Hello World App’)` * App with Yext employee actor   * History Entry \"Updated By\" Value: `[employee username] (App [App ID] - ‘[App Name]’)`   * Example: `hlerman (App 432 - ‘Hello World App’)`  ## Response Format * **`meta`**     * Response metadata  * **`meta.uuid`**     * Unique ID for this request / response * **`meta.errors[]`**     * List of errors and warnings  * **`meta.errors[].code`**     * Code that uniquely identifies the error or warning  * **`meta.errors[].type`**     * One of:         * `FATAL_ERROR`         * `NON_FATAL_ERROR`         * `WARNING`     * See \"Errors and Warnings\" above for details. * **`meta.errors[].message`**     * An explanation of the issue * **`response`**     * The main content (body) of the response  Example: <pre><code> {     \"meta\": {         \"uuid\": \"bb0c7e19-4dc3-4891-bfa5-8593b1f124ad\",         \"errors\": [             {                 \"code\": ...error code...,                 \"type\": ...error, fatal error, non fatal error, or warning...,                 \"message\": ...explanation of the issue...             }         ]     },     \"response\": {         ...results...     } } </code></pre>  ## Status Codes * `200 OK`    * Either there are no errors or warnings, or the only issues are of type `WARNING`. * `207 Multi-Status`     * There are errors of type `itemError` or `fieldError` (but none of type `requestError`). * `400 Bad Request`     * A parameter is invalid, or a required parameter is missing. This includes the case where no API key is provided and the case where a resource ID is specified incorrectly in a path.     * This status is if any of the response errors are of type `requestError`. * `401 Unauthorized`     * The API key provided is invalid.     * `403 Forbidden`     * The requested information cannot be viewed by the acting user.  * `404 Not Found`     * The endpoint does not exist. * `405 Method Not Allowed`     * The request is using a method that is not allowed (e.g., POST with a GET-only endpoint). * `409 Conflict`     * The request could not be completed in its current state.     * Use the information included in the response to modify the request and retry. * `429 Too Many Requests`     * You have exceeded your rate limit / quota. * `500 Internal Server Error`     * Yext’s servers are not operating as expected. The request is likely valid but should be resent later. * `504 Timeout`     * Yext’s servers took too long to handle this request, and it timed out.  ## Quotas and Rate Limits Default quotas and rate limits are as follows.  * **Location Cloud API** *(includes Analytics, PowerListings®, Location Manager, Reviews, Social, and User endpoints)*: 5,000 requests per hour * **Administrative API**: 1 qps * **Live API**: 100,000 requests per hour  **NOTE:** Webhook requests do not count towards an account’s quota.  For the most current and accurate rate-limit usage information for a particular request type, check the **`Rate-Limit-Remaining`** and **`Rate-Limit-Limit`** HTTP headers of your API responses.  If you are currently over your limit, our API will return a `429` error, and the response object returned by our API will be empty. We will also include a **`Rate-Limit-Reset`** header in the response, which indicates when you will have additional quota.  ## Client- vs. Yext-assigned IDs You can set the ID for the following objects when you create them. If you do not provide an ID, Yext will generate one for you.  * Account * User * Location * Bio List * Menu List * Product List * Event List * Bio List Item * Menu List Item * Product List Item * Event List Item  ## Logging All API requests are logged. API logs can be found in your Developer Console and are stored for 90 days.
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
 * ActivityFilter Class Doc Comment
 *
 * @category    Class */
/**
 * @package     Yext\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ActivityFilter implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ActivityFilter';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'start_date' => '\DateTime',
        'end_date' => '\DateTime',
        'location_ids' => 'string[]',
        'activity_types' => 'string[]',
        'actors' => 'string[]'
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
        'start_date' => 'startDate',
        'end_date' => 'endDate',
        'location_ids' => 'locationIds',
        'activity_types' => 'activityTypes',
        'actors' => 'actors'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'start_date' => 'setStartDate',
        'end_date' => 'setEndDate',
        'location_ids' => 'setLocationIds',
        'activity_types' => 'setActivityTypes',
        'actors' => 'setActors'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'start_date' => 'getStartDate',
        'end_date' => 'getEndDate',
        'location_ids' => 'getLocationIds',
        'activity_types' => 'getActivityTypes',
        'actors' => 'getActors'
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

    const ACTIVITY_TYPES_LOCATION_UPDATED = 'LOCATION_UPDATED';
    const ACTIVITY_TYPES_PUBLISHER_SUGGESTION_CREATED = 'PUBLISHER_SUGGESTION_CREATED';
    const ACTIVITY_TYPES_PUBLISHER_SUGGESTION_APPROVED = 'PUBLISHER_SUGGESTION_APPROVED';
    const ACTIVITY_TYPES_PUBLISHER_SUGGESTION_REJECTED = 'PUBLISHER_SUGGESTION_REJECTED';
    const ACTIVITY_TYPES_PUBLISHER_SUGGESTION_EXPIRED = 'PUBLISHER_SUGGESTION_EXPIRED';
    const ACTIVITY_TYPES_REVIEW_CREATED = 'REVIEW_CREATED';
    const ACTIVITY_TYPES_REVIEW_RESPONDED = 'REVIEW_RESPONDED';
    const ACTIVITY_TYPES_SOCIAL_POST_CREATED = 'SOCIAL_POST_CREATED';
    const ACTIVITY_TYPES_SOCIAL_POST_UPDATED = 'SOCIAL_POST_UPDATED';
    const ACTIVITY_TYPES_SOCIAL_POST_COMMENT_CREATED = 'SOCIAL_POST_COMMENT_CREATED';
    const ACTIVITY_TYPES_SOCIAL_POST_COMMENT_UPDATED = 'SOCIAL_POST_COMMENT_UPDATED';
    const ACTIVITY_TYPES_LISTING_LIVE = 'LISTING_LIVE';
    const ACTIVITY_TYPES_DUPLICATE_DETECTED = 'DUPLICATE_DETECTED';
    const ACTIVITY_TYPES_DUPLICATE_SUPPRESSED = 'DUPLICATE_SUPPRESSED';
    const ACTIVITY_TYPES_DUPLICATE_IGNORED = 'DUPLICATE_IGNORED';
    const ACTORS_YEXT_SYSTEM = 'YEXT_SYSTEM';
    const ACTORS_SCHEDULED_CONTENT = 'SCHEDULED_CONTENT';
    const ACTORS_API = 'API';
    const ACTORS_PUBLISHER = 'PUBLISHER';
    const ACTORS_CUSTOMER = 'CUSTOMER';
    const ACTORS_CONSUMER = 'CONSUMER';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getActivityTypesAllowableValues()
    {
        return [
            self::ACTIVITY_TYPES_LOCATION_UPDATED,
            self::ACTIVITY_TYPES_PUBLISHER_SUGGESTION_CREATED,
            self::ACTIVITY_TYPES_PUBLISHER_SUGGESTION_APPROVED,
            self::ACTIVITY_TYPES_PUBLISHER_SUGGESTION_REJECTED,
            self::ACTIVITY_TYPES_PUBLISHER_SUGGESTION_EXPIRED,
            self::ACTIVITY_TYPES_REVIEW_CREATED,
            self::ACTIVITY_TYPES_REVIEW_RESPONDED,
            self::ACTIVITY_TYPES_SOCIAL_POST_CREATED,
            self::ACTIVITY_TYPES_SOCIAL_POST_UPDATED,
            self::ACTIVITY_TYPES_SOCIAL_POST_COMMENT_CREATED,
            self::ACTIVITY_TYPES_SOCIAL_POST_COMMENT_UPDATED,
            self::ACTIVITY_TYPES_LISTING_LIVE,
            self::ACTIVITY_TYPES_DUPLICATE_DETECTED,
            self::ACTIVITY_TYPES_DUPLICATE_SUPPRESSED,
            self::ACTIVITY_TYPES_DUPLICATE_IGNORED,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getActorsAllowableValues()
    {
        return [
            self::ACTORS_YEXT_SYSTEM,
            self::ACTORS_SCHEDULED_CONTENT,
            self::ACTORS_API,
            self::ACTORS_PUBLISHER,
            self::ACTORS_CUSTOMER,
            self::ACTORS_CONSUMER,
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
        $this->container['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
        $this->container['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;
        $this->container['location_ids'] = isset($data['location_ids']) ? $data['location_ids'] : null;
        $this->container['activity_types'] = isset($data['activity_types']) ? $data['activity_types'] : null;
        $this->container['actors'] = isset($data['actors']) ? $data['actors'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
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
        return true;
    }


    /**
     * Gets start_date
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->container['start_date'];
    }

    /**
     * Sets start_date
     * @param \DateTime $start_date The inclusive start date for the activity data.
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->container['start_date'] = $start_date;

        return $this;
    }

    /**
     * Gets end_date
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->container['end_date'];
    }

    /**
     * Sets end_date
     * @param \DateTime $end_date The inclusive end date for the activity data.
     * @return $this
     */
    public function setEndDate($end_date)
    {
        $this->container['end_date'] = $end_date;

        return $this;
    }

    /**
     * Gets location_ids
     * @return string[]
     */
    public function getLocationIds()
    {
        return $this->container['location_ids'];
    }

    /**
     * Sets location_ids
     * @param string[] $location_ids Array of locationIds
     * @return $this
     */
    public function setLocationIds($location_ids)
    {
        $this->container['location_ids'] = $location_ids;

        return $this;
    }

    /**
     * Gets activity_types
     * @return string[]
     */
    public function getActivityTypes()
    {
        return $this->container['activity_types'];
    }

    /**
     * Sets activity_types
     * @param string[] $activity_types Activity types to include in an Activity list.
     * @return $this
     */
    public function setActivityTypes($activity_types)
    {
        $allowed_values = array('LOCATION_UPDATED', 'PUBLISHER_SUGGESTION_CREATED', 'PUBLISHER_SUGGESTION_APPROVED', 'PUBLISHER_SUGGESTION_REJECTED', 'PUBLISHER_SUGGESTION_EXPIRED', 'REVIEW_CREATED', 'REVIEW_RESPONDED', 'SOCIAL_POST_CREATED', 'SOCIAL_POST_UPDATED', 'SOCIAL_POST_COMMENT_CREATED', 'SOCIAL_POST_COMMENT_UPDATED', 'LISTING_LIVE', 'DUPLICATE_DETECTED', 'DUPLICATE_SUPPRESSED', 'DUPLICATE_IGNORED');
        if (!is_null($activity_types) && (array_diff($activity_types, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'activity_types', must be one of 'LOCATION_UPDATED', 'PUBLISHER_SUGGESTION_CREATED', 'PUBLISHER_SUGGESTION_APPROVED', 'PUBLISHER_SUGGESTION_REJECTED', 'PUBLISHER_SUGGESTION_EXPIRED', 'REVIEW_CREATED', 'REVIEW_RESPONDED', 'SOCIAL_POST_CREATED', 'SOCIAL_POST_UPDATED', 'SOCIAL_POST_COMMENT_CREATED', 'SOCIAL_POST_COMMENT_UPDATED', 'LISTING_LIVE', 'DUPLICATE_DETECTED', 'DUPLICATE_SUPPRESSED', 'DUPLICATE_IGNORED'");
        }
        $this->container['activity_types'] = $activity_types;

        return $this;
    }

    /**
     * Gets actors
     * @return string[]
     */
    public function getActors()
    {
        return $this->container['actors'];
    }

    /**
     * Sets actors
     * @param string[] $actors List of actors whose activities should be included in an Activity list.
     * @return $this
     */
    public function setActors($actors)
    {
        $allowed_values = array('YEXT_SYSTEM', 'SCHEDULED_CONTENT', 'API', 'PUBLISHER', 'CUSTOMER', 'CONSUMER');
        if (!is_null($actors) && (array_diff($actors, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'actors', must be one of 'YEXT_SYSTEM', 'SCHEDULED_CONTENT', 'API', 'PUBLISHER', 'CUSTOMER', 'CONSUMER'");
        }
        $this->container['actors'] = $actors;

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
