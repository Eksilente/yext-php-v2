<?php
/**
 * AnalyticsFilter
 *
 * PHP version 5
 *
 * @category Class
 * @package  Yext\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Yext API
 *
 * # Policies and Conventions  This section gives you the basic information you need to use our APIs.  ## Authentication All requests must be authenticated using an app’s API key.  <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?<b>api_key=API_KEY</b>&v=YYYYMMDD</pre>  The API key should be kept secret, as each app has exactly one API key.  ## Versioning All requests must be versioned using the v parameter.   <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?api_key=API_KEY&<b>v=YYYYMMDD</b></pre>  The **`v`** parameter (a date in `YYYYMMDD` format) is designed to give you the freedom to adapt to Yext API changes on your own schedule. When you pass this parameter, any changes we made to the API after the specified date will not affect the behavior of the request or the content of the response.  **NOTE:** Yext has the ability to make changes that affect previous versions of the API, if necessary.  ## Errors and Warnings There are three kinds of issues that can be reported for a given request:  * **`FATAL_ERROR`**     * An issue caused the entire request to be rejected. * **`NON_FATAL_ERROR`**     * An item is rejected, but other items present in the request are accepted (e.g., one invalid Product List item).      * A field is rejected, but the item otherwise is accepted (e.g., invalid website URL in a Location). * **`WARNING`**     * The request did not adhere to our best practices or recommendations, but the data was accepted anyway (e.g., data was sent that may cause some listings to become unavailable, a deprecated API was used, or we changed the format of a field's content to meet our requirements).  ## Validation Modes API v2 will support two request validation modes: *Strict Mode* and *Lenient Mode*.  In Strict Mode, both `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported simply as `FATAL_ERROR`s, and any error will cause the entire request to fail.  In Lenient Mode, `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported as such, and only `FATAL_ERROR`s will cause a request to fail.  All requests will be processed in Strict Mode by default.  To activate Lenient Mode, append the parameter `validation=lenient` to your request URLs.  ## Serialization API v2 only accepts data in JSON format.  ### Dates and times * We always use milliseconds since epoch (a.k.a. Unix time) for timestamps (e.g., review creation times, webhook update times). * We always use ISO 8601 without timezone for local date times (e.g., Event start time, Event end time). * Dates are transmitted as strings: `“YYYY-MM-DD”`.  ## Account ID In keeping with RESTful design principles, every URL in API v2 has an account ID prefix. This prefix helps to ensure that you have unique URLs for all resources.  In addition to specifying resources by explicit account ID, the following two macros are defined: * **`me`** - refers to the account that owns the API key sent with the request * **`all`** - refers to the account that owns the API key sent with the request, as well as all sub-accounts (recursively)  **IMPORTANT:** The **`me`** macro is supported in all API methods.  The **`all`** macro will only be supported in certain URLs, as noted in the reference documentation.  ### Examples This URL refers to all locations in account 123. <pre>https://api.yext.com/v2/accounts/<b>123</b>/locations?api_key=456&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456. <pre>https://api.yext.com/v2/accounts/<b>me</b>/locations?<b>api_key=456</b>&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456, as well as all locations from any of its child accounts. <pre>https://api.yext.com/v2/accounts/<b>all</b>/locations?<b>api_key=456</b>&v=20160822</pre>  ## Actor Headers To attribute changes to a particular user or employee, all requests may be passed with the following headers.  **NOTE:** If you choose to provide actor headers, and we are unable to authenticate the request using the values you provide, the request will result in an error and fail.  * Attribute activity to Admin user via admin login cookie *(for Yext’s use only)*     * Header: `YextEmployee`     * Value: Admin user’s AlphaLogin cookie * Attribute activity to Admin user via email address and password     * Headers: `YextEmployeeEmail`, `YextEmployeePassword`     * Values: Admin user’s email address, Admin user’s Admin password * Attribute activity to customer user via login cookie     * Header: `YextUser`     * Value: Customer user’s YextAppsLogin cookie * Attribute activity to customer user via email address and password     * Headers: `YextUserEmail`, `YextUserPassword`     * Values: Customer user’s email address, Customer user’s password  Changes will be logged as follows:  * App with no designated actor     * History Entry \"Updated By\" Value: `App [App ID] - ‘[App Name]’`     * Example: `App 432 - ‘Hello World App’` * App with customer user actor     * History Entry \"Updated By\" Value: `[user name] ([user email]) (App [App ID] - ‘[App Name]’)`     * Example: `Jordan Smith (jsmith@example.com) (App 432 - ‘Hello World App’)` * App with Yext employee actor## Response Format   * History Entry \"Updated By\" Value: `[employee username] (App [App ID] - ‘[App Name]’)`   * Example: `hlerman (App 432 - ‘Hello World App’)`  ## Response Format * **`meta`**     * Response metadata  * **`meta.uuid`**     * Unique ID for this request / response * **`meta.errors[]`**     * List of errors and warnings  * **`meta.errors[].code`**     * Code that uniquely identifies the error or warning  * **`meta.errors[].type`**     * One of:         * `FATAL_ERROR`         * `NON_FATAL_ERROR`         * `WARNING`     * See \"Errors and Warnings\" above for details. * **`meta.errors[].message`**     *  An explanation of the issue * **`response`**     * An explanation of the issue   Example: <pre><code> {     \"meta\": {         \"uuid\": \"bb0c7e19-4dc3-4891-bfa5-8593b1f124ad\",         \"errors\": [             {                 \"code\": ...error code...,                 \"type\": ...error, fatal error, non fatal error, or warning...,                 \"message\": ...explanation of the issue...             }         ]     },     \"response\": {         ...results...     } } </code></pre>  ## Status Codes * `200 OK`    * Either there are no errors or warnings, or the only issues are of type `WARNING`. * `207 Multi-Status`     * There are errors of type `itemError` or `fieldError` (but none of type `requestError`). * `400 Bad Request`     * A parameter is invalid, or a required parameter is missing. This includes the case where no API key is provided and the case where a resource ID is specified incorrectly in a path.     * This status is if any of the response errors are of type `requestError`. * `401 Unauthorized`     * The API key provided is invalid.     * `403 Forbidden`     * The requested information cannot be viewed by the acting user.  * `404 Not Found`     * The endpoint does not exist. * `405 Method Not Allowed`     * The request is using a method that is not allowed (e.g., POST with a GET-only endpoint). * `409 Conflict`     * The request could not be completed in its current state.     * Use the information included in the response to modify the request and retry. * `429 Too Many Requests`     * You have exceeded your rate limit / quota. * `500 Internal Server Error`     * Yext’s servers are not operating as expected. The request is likely valid but should be resent later. * `504 Timeout`     * Yext’s servers took too long to handle this request, and it timed out.  ## Quotas and Rate Limits Default quotas and rate limits are as follows.  * **Location Cloud API** *(includes Analytics, PowerListings, Location Manager, Reviews, Social, and User endpoints)*: 5,000 requests per hour * **Administrative API**: 1 qps * **Live API**: 100,000 requests per hour  **NOTE:** Webhook requests do not count towards an account’s quota.  For the most current and accurate rate-limit usage information for a particular request type, check the **`RateLimit-Remaining`** and **`RateLimit-Limit`** HTTP headers of your API responses.  If you are currently over your limit, our API will return a `429` error, and the response object returned by our API will be empty. We will also include a **`RateLimit-Reset`** header in the response, which indicates when you will have additional quota.  ## Client- vs. Yext-assigned IDs You can set the ID for the following objects when you create them. If you do not provide an ID, Yext will generate one for you.  * Account * User * Location * Bio List * Menu List * Product List * Event List * Bio List Item * Menu List Item * Product List Item * Event List Item  ## Logging All API requests are logged, and can be found in your Developer Console.  API logs are stored for 90 days.
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
 * AnalyticsFilter Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Yext\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class AnalyticsFilter implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'AnalyticsFilter';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'start_date' => '\DateTime',
        'end_date' => '\DateTime',
        'location_ids' => 'string[]',
        'folder_id' => 'int',
        'countries' => 'string[]',
        'location_labels' => 'string[]',
        'platforms' => 'string[]',
        'sites' => 'string[]',
        'activity_types' => 'string[]',
        'actors' => 'string[]',
        'min_search_frequency' => 'double',
        'max_search_frequency' => 'double',
        'search_term' => 'string',
        'search_type' => 'string',
        'foursquare_checkin_type' => 'string',
        'foursquare_checkin_age' => 'string',
        'foursquare_checkin_gender' => 'string',
        'foursquare_checkin_time_of_day' => 'string',
        'instagram_content_type' => 'string'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'start_date' => 'startDate',
        'end_date' => 'endDate',
        'location_ids' => 'locationIds',
        'folder_id' => 'folderId',
        'countries' => 'countries',
        'location_labels' => 'locationLabels',
        'platforms' => 'platforms',
        'sites' => 'sites',
        'activity_types' => 'activityTypes',
        'actors' => 'actors',
        'min_search_frequency' => 'minSearchFrequency',
        'max_search_frequency' => 'maxSearchFrequency',
        'search_term' => 'searchTerm',
        'search_type' => 'searchType',
        'foursquare_checkin_type' => 'foursquareCheckinType',
        'foursquare_checkin_age' => 'foursquareCheckinAge',
        'foursquare_checkin_gender' => 'foursquareCheckinGender',
        'foursquare_checkin_time_of_day' => 'foursquareCheckinTimeOfDay',
        'instagram_content_type' => 'instagramContentType'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'start_date' => 'setStartDate',
        'end_date' => 'setEndDate',
        'location_ids' => 'setLocationIds',
        'folder_id' => 'setFolderId',
        'countries' => 'setCountries',
        'location_labels' => 'setLocationLabels',
        'platforms' => 'setPlatforms',
        'sites' => 'setSites',
        'activity_types' => 'setActivityTypes',
        'actors' => 'setActors',
        'min_search_frequency' => 'setMinSearchFrequency',
        'max_search_frequency' => 'setMaxSearchFrequency',
        'search_term' => 'setSearchTerm',
        'search_type' => 'setSearchType',
        'foursquare_checkin_type' => 'setFoursquareCheckinType',
        'foursquare_checkin_age' => 'setFoursquareCheckinAge',
        'foursquare_checkin_gender' => 'setFoursquareCheckinGender',
        'foursquare_checkin_time_of_day' => 'setFoursquareCheckinTimeOfDay',
        'instagram_content_type' => 'setInstagramContentType'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'start_date' => 'getStartDate',
        'end_date' => 'getEndDate',
        'location_ids' => 'getLocationIds',
        'folder_id' => 'getFolderId',
        'countries' => 'getCountries',
        'location_labels' => 'getLocationLabels',
        'platforms' => 'getPlatforms',
        'sites' => 'getSites',
        'activity_types' => 'getActivityTypes',
        'actors' => 'getActors',
        'min_search_frequency' => 'getMinSearchFrequency',
        'max_search_frequency' => 'getMaxSearchFrequency',
        'search_term' => 'getSearchTerm',
        'search_type' => 'getSearchType',
        'foursquare_checkin_type' => 'getFoursquareCheckinType',
        'foursquare_checkin_age' => 'getFoursquareCheckinAge',
        'foursquare_checkin_gender' => 'getFoursquareCheckinGender',
        'foursquare_checkin_time_of_day' => 'getFoursquareCheckinTimeOfDay',
        'instagram_content_type' => 'getInstagramContentType'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getActivityTypesAllowableValues()
    {
        return [
            
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getActorsAllowableValues()
    {
        return [
            
        ];
    }
    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
        $this->container['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;
        $this->container['location_ids'] = isset($data['location_ids']) ? $data['location_ids'] : null;
        $this->container['folder_id'] = isset($data['folder_id']) ? $data['folder_id'] : null;
        $this->container['countries'] = isset($data['countries']) ? $data['countries'] : null;
        $this->container['location_labels'] = isset($data['location_labels']) ? $data['location_labels'] : null;
        $this->container['platforms'] = isset($data['platforms']) ? $data['platforms'] : null;
        $this->container['sites'] = isset($data['sites']) ? $data['sites'] : null;
        $this->container['activity_types'] = isset($data['activity_types']) ? $data['activity_types'] : null;
        $this->container['actors'] = isset($data['actors']) ? $data['actors'] : null;
        $this->container['min_search_frequency'] = isset($data['min_search_frequency']) ? $data['min_search_frequency'] : null;
        $this->container['max_search_frequency'] = isset($data['max_search_frequency']) ? $data['max_search_frequency'] : null;
        $this->container['search_term'] = isset($data['search_term']) ? $data['search_term'] : null;
        $this->container['search_type'] = isset($data['search_type']) ? $data['search_type'] : null;
        $this->container['foursquare_checkin_type'] = isset($data['foursquare_checkin_type']) ? $data['foursquare_checkin_type'] : null;
        $this->container['foursquare_checkin_age'] = isset($data['foursquare_checkin_age']) ? $data['foursquare_checkin_age'] : null;
        $this->container['foursquare_checkin_gender'] = isset($data['foursquare_checkin_gender']) ? $data['foursquare_checkin_gender'] : null;
        $this->container['foursquare_checkin_time_of_day'] = isset($data['foursquare_checkin_time_of_day']) ? $data['foursquare_checkin_time_of_day'] : null;
        $this->container['instagram_content_type'] = isset($data['instagram_content_type']) ? $data['instagram_content_type'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        $allowed_values = array();
        if (!in_array($this->container['activity_types'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'activity_types', must be one of #{allowed_values}.";
        }
        $allowed_values = array();
        if (!in_array($this->container['actors'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'actors', must be one of #{allowed_values}.";
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
        $allowed_values = array();
        if (!in_array($this->container['activity_types'], $allowed_values)) {
            return false;
        }
        $allowed_values = array();
        if (!in_array($this->container['actors'], $allowed_values)) {
            return false;
        }
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
     * @param \DateTime $start_date The inclusive start date for the report data.  Defaults to 90 days before the end date. E.g. ‘2016-08-22’ NOTE: If WEEKS, MONTHS, or MONTHS_RETAIL is in dimensions, startDate must coincide with the beginning and end of a week or month, depending on the dimension chosen.
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
     * @param \DateTime $end_date The inclusive end date for the report data.  Defaults to the lowest common denominator of the relevant maximum reporting dates. E.g. ‘2016-08-30’ NOTE: If WEEKS, MONTHS, or MONTHS_RETAIL is in dimensions, endDate must coincide with the beginning and end of a week or month, depending on the dimension chosen.
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
     * Gets folder_id
     * @return int
     */
    public function getFolderId()
    {
        return $this->container['folder_id'];
    }

    /**
     * Sets folder_id
     * @param int $folder_id Specifies the folder whose locations and subfolders should be included in the results. Default is 0 (root folder). Cannot be used when ACCOUNT_ID is in dimensions.
     * @return $this
     */
    public function setFolderId($folder_id)
    {
        $this->container['folder_id'] = $folder_id;

        return $this;
    }

    /**
     * Gets countries
     * @return string[]
     */
    public function getCountries()
    {
        return $this->container['countries'];
    }

    /**
     * Sets countries
     * @param string[] $countries Array of 3166 Alpha-2 country codes.
     * @return $this
     */
    public function setCountries($countries)
    {
        $this->container['countries'] = $countries;

        return $this;
    }

    /**
     * Gets location_labels
     * @return string[]
     */
    public function getLocationLabels()
    {
        return $this->container['location_labels'];
    }

    /**
     * Sets location_labels
     * @param string[] $location_labels Array of location labels
     * @return $this
     */
    public function setLocationLabels($location_labels)
    {
        $this->container['location_labels'] = $location_labels;

        return $this;
    }

    /**
     * Gets platforms
     * @return string[]
     */
    public function getPlatforms()
    {
        return $this->container['platforms'];
    }

    /**
     * Sets platforms
     * @param string[] $platforms Array of platform IDs.
     * @return $this
     */
    public function setPlatforms($platforms)
    {
        $this->container['platforms'] = $platforms;

        return $this;
    }

    /**
     * Gets sites
     * @return string[]
     */
    public function getSites()
    {
        return $this->container['sites'];
    }

    /**
     * Sets sites
     * @param string[] $sites
     * @return $this
     */
    public function setSites($sites)
    {
        $this->container['sites'] = $sites;

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
        $allowed_values = array();
        if (!in_array($activity_types, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'activity_types', must be one of ");
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
        $allowed_values = array();
        if (!in_array($actors, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'actors', must be one of ");
        }
        $this->container['actors'] = $actors;

        return $this;
    }

    /**
     * Gets min_search_frequency
     * @return double
     */
    public function getMinSearchFrequency()
    {
        return $this->container['min_search_frequency'];
    }

    /**
     * Sets min_search_frequency
     * @param double $min_search_frequency
     * @return $this
     */
    public function setMinSearchFrequency($min_search_frequency)
    {
        $this->container['min_search_frequency'] = $min_search_frequency;

        return $this;
    }

    /**
     * Gets max_search_frequency
     * @return double
     */
    public function getMaxSearchFrequency()
    {
        return $this->container['max_search_frequency'];
    }

    /**
     * Sets max_search_frequency
     * @param double $max_search_frequency
     * @return $this
     */
    public function setMaxSearchFrequency($max_search_frequency)
    {
        $this->container['max_search_frequency'] = $max_search_frequency;

        return $this;
    }

    /**
     * Gets search_term
     * @return string
     */
    public function getSearchTerm()
    {
        return $this->container['search_term'];
    }

    /**
     * Sets search_term
     * @param string $search_term
     * @return $this
     */
    public function setSearchTerm($search_term)
    {
        $this->container['search_term'] = $search_term;

        return $this;
    }

    /**
     * Gets search_type
     * @return string
     */
    public function getSearchType()
    {
        return $this->container['search_type'];
    }

    /**
     * Sets search_type
     * @param string $search_type
     * @return $this
     */
    public function setSearchType($search_type)
    {
        $this->container['search_type'] = $search_type;

        return $this;
    }

    /**
     * Gets foursquare_checkin_type
     * @return string
     */
    public function getFoursquareCheckinType()
    {
        return $this->container['foursquare_checkin_type'];
    }

    /**
     * Sets foursquare_checkin_type
     * @param string $foursquare_checkin_type
     * @return $this
     */
    public function setFoursquareCheckinType($foursquare_checkin_type)
    {
        $this->container['foursquare_checkin_type'] = $foursquare_checkin_type;

        return $this;
    }

    /**
     * Gets foursquare_checkin_age
     * @return string
     */
    public function getFoursquareCheckinAge()
    {
        return $this->container['foursquare_checkin_age'];
    }

    /**
     * Sets foursquare_checkin_age
     * @param string $foursquare_checkin_age
     * @return $this
     */
    public function setFoursquareCheckinAge($foursquare_checkin_age)
    {
        $this->container['foursquare_checkin_age'] = $foursquare_checkin_age;

        return $this;
    }

    /**
     * Gets foursquare_checkin_gender
     * @return string
     */
    public function getFoursquareCheckinGender()
    {
        return $this->container['foursquare_checkin_gender'];
    }

    /**
     * Sets foursquare_checkin_gender
     * @param string $foursquare_checkin_gender
     * @return $this
     */
    public function setFoursquareCheckinGender($foursquare_checkin_gender)
    {
        $this->container['foursquare_checkin_gender'] = $foursquare_checkin_gender;

        return $this;
    }

    /**
     * Gets foursquare_checkin_time_of_day
     * @return string
     */
    public function getFoursquareCheckinTimeOfDay()
    {
        return $this->container['foursquare_checkin_time_of_day'];
    }

    /**
     * Sets foursquare_checkin_time_of_day
     * @param string $foursquare_checkin_time_of_day
     * @return $this
     */
    public function setFoursquareCheckinTimeOfDay($foursquare_checkin_time_of_day)
    {
        $this->container['foursquare_checkin_time_of_day'] = $foursquare_checkin_time_of_day;

        return $this;
    }

    /**
     * Gets instagram_content_type
     * @return string
     */
    public function getInstagramContentType()
    {
        return $this->container['instagram_content_type'];
    }

    /**
     * Sets instagram_content_type
     * @param string $instagram_content_type
     * @return $this
     */
    public function setInstagramContentType($instagram_content_type)
    {
        $this->container['instagram_content_type'] = $instagram_content_type;

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

