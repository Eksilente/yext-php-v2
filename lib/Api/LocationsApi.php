<?php
/**
 * LocationsApi
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

namespace Yext\Client\Api;

use \Yext\Client\Configuration;
use \Yext\Client\ApiClient;
use \Yext\Client\ApiException;
use \Yext\Client\ObjectSerializer;

/**
 * LocationsApi Class Doc Comment
 *
 * @category Class
 * @package  Yext\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LocationsApi
{

    /**
     * API Client
     *
     * @var \Yext\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Yext\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Yext\Client\ApiClient $apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://api.yext.com/v2');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Yext\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Yext\Client\ApiClient $apiClient set the API client
     *
     * @return LocationsApi
     */
    public function setApiClient(\Yext\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createLocation
     *
     * Locations: Create
     *
     * @param string $account_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param \Yext\Client\Model\Location $location_request  (required)
     * @return \Yext\Client\Model\InlineResponse201
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function createLocation($account_id, $v, $location_request)
    {
        list($response) = $this->createLocationWithHttpInfo($account_id, $v, $location_request);
        return $response;
    }

    /**
     * Operation createLocationWithHttpInfo
     *
     * Locations: Create
     *
     * @param string $account_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param \Yext\Client\Model\Location $location_request  (required)
     * @return Array of \Yext\Client\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function createLocationWithHttpInfo($account_id, $v, $location_request)
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling createLocation');
        }
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling createLocation');
        }
        // verify the required parameter 'location_request' is set
        if ($location_request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $location_request when calling createLocation');
        }
        // parse inputs
        $resourcePath = "/accounts/{accountId}/locations";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // path params
        if ($account_id !== null) {
            $resourcePath = str_replace(
                "{" . "accountId" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($location_request)) {
            $_tempBody = $location_request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse201',
                '/accounts/{accountId}/locations'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse201', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse201', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getBusinessCategories
     *
     * Categories: List
     *
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param string $language Only categories that apply to this language will be returned. (optional, default to en)
     * @param string $country Only categories that apply in this country will be returned. (optional, default to us)
     * @return \Yext\Client\Model\InlineResponse2007
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getBusinessCategories($v, $language = null, $country = null)
    {
        list($response) = $this->getBusinessCategoriesWithHttpInfo($v, $language, $country);
        return $response;
    }

    /**
     * Operation getBusinessCategoriesWithHttpInfo
     *
     * Categories: List
     *
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param string $language Only categories that apply to this language will be returned. (optional, default to en)
     * @param string $country Only categories that apply in this country will be returned. (optional, default to us)
     * @return Array of \Yext\Client\Model\InlineResponse2007, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getBusinessCategoriesWithHttpInfo($v, $language = null, $country = null)
    {
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling getBusinessCategories');
        }
        // parse inputs
        $resourcePath = "/categories";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // query params
        if ($language !== null) {
            $queryParams['language'] = $this->apiClient->getSerializer()->toQueryValue($language);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = $this->apiClient->getSerializer()->toQueryValue($country);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse2007',
                '/categories'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse2007', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse2007', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getCustomFields
     *
     * Custom Fields: List
     *
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param string $account_id  (required)
     * @param string $offset Number of results to skip. Used to page through results (optional, default to 0)
     * @param int $limit Number of results to return (optional, default to 100)
     * @return \Yext\Client\Model\InlineResponse200
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getCustomFields($v, $account_id, $offset = null, $limit = null)
    {
        list($response) = $this->getCustomFieldsWithHttpInfo($v, $account_id, $offset, $limit);
        return $response;
    }

    /**
     * Operation getCustomFieldsWithHttpInfo
     *
     * Custom Fields: List
     *
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param string $account_id  (required)
     * @param string $offset Number of results to skip. Used to page through results (optional, default to 0)
     * @param int $limit Number of results to return (optional, default to 100)
     * @return Array of \Yext\Client\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getCustomFieldsWithHttpInfo($v, $account_id, $offset = null, $limit = null)
    {
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling getCustomFields');
        }
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling getCustomFields');
        }
        if ($limit > 1000.0) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling LocationsApi.getCustomFields, must be smaller than or equal to 1000.0.');
        }

        // parse inputs
        $resourcePath = "/accounts/{accountId}/customfields";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = $this->apiClient->getSerializer()->toQueryValue($offset);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // path params
        if ($account_id !== null) {
            $resourcePath = str_replace(
                "{" . "accountId" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse200',
                '/accounts/{accountId}/customfields'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse200', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse200', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getGoogleKeywords
     *
     * Google Fields: List
     *
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @return \Yext\Client\Model\InlineResponse2008
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getGoogleKeywords($v)
    {
        list($response) = $this->getGoogleKeywordsWithHttpInfo($v);
        return $response;
    }

    /**
     * Operation getGoogleKeywordsWithHttpInfo
     *
     * Google Fields: List
     *
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @return Array of \Yext\Client\Model\InlineResponse2008, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getGoogleKeywordsWithHttpInfo($v)
    {
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling getGoogleKeywords');
        }
        // parse inputs
        $resourcePath = "/googlefields";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse2008',
                '/googlefields'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse2008', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse2008', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getLocation
     *
     * Locations: Get
     *
     * @param string $account_id  (required)
     * @param string $location_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @return \Yext\Client\Model\InlineResponse201
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getLocation($account_id, $location_id, $v)
    {
        list($response) = $this->getLocationWithHttpInfo($account_id, $location_id, $v);
        return $response;
    }

    /**
     * Operation getLocationWithHttpInfo
     *
     * Locations: Get
     *
     * @param string $account_id  (required)
     * @param string $location_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @return Array of \Yext\Client\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getLocationWithHttpInfo($account_id, $location_id, $v)
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling getLocation');
        }
        // verify the required parameter 'location_id' is set
        if ($location_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $location_id when calling getLocation');
        }
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling getLocation');
        }
        // parse inputs
        $resourcePath = "/accounts/{accountId}/locations/{locationId}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // path params
        if ($account_id !== null) {
            $resourcePath = str_replace(
                "{" . "accountId" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_id),
                $resourcePath
            );
        }
        // path params
        if ($location_id !== null) {
            $resourcePath = str_replace(
                "{" . "locationId" . "}",
                $this->apiClient->getSerializer()->toPathValue($location_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse201',
                '/accounts/{accountId}/locations/{locationId}'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse201', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse201', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getLocationFolders
     *
     * Folders: List
     *
     * @param string $account_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param string $offset Number of results to skip. Used to page through results (optional, default to 0)
     * @param int $limit Number of results to return (optional, default to 100)
     * @return \Yext\Client\Model\InlineResponse2001
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getLocationFolders($account_id, $v, $offset = null, $limit = null)
    {
        list($response) = $this->getLocationFoldersWithHttpInfo($account_id, $v, $offset, $limit);
        return $response;
    }

    /**
     * Operation getLocationFoldersWithHttpInfo
     *
     * Folders: List
     *
     * @param string $account_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param string $offset Number of results to skip. Used to page through results (optional, default to 0)
     * @param int $limit Number of results to return (optional, default to 100)
     * @return Array of \Yext\Client\Model\InlineResponse2001, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getLocationFoldersWithHttpInfo($account_id, $v, $offset = null, $limit = null)
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling getLocationFolders');
        }
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling getLocationFolders');
        }
        if ($limit > 1000.0) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling LocationsApi.getLocationFolders, must be smaller than or equal to 1000.0.');
        }

        // parse inputs
        $resourcePath = "/accounts/{accountId}/folders";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($offset !== null) {
            $queryParams['offset'] = $this->apiClient->getSerializer()->toQueryValue($offset);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // path params
        if ($account_id !== null) {
            $resourcePath = str_replace(
                "{" . "accountId" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse2001',
                '/accounts/{accountId}/folders'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse2001', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse2001', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getLocations
     *
     * Locations: List
     *
     * @param string $account_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param int $limit Number of results to return (optional, default to 10)
     * @param string $offset Number of results to skip. Used to page through results (optional, default to 0)
     * @return \Yext\Client\Model\InlineResponse2002
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getLocations($account_id, $v, $limit = null, $offset = null)
    {
        list($response) = $this->getLocationsWithHttpInfo($account_id, $v, $limit, $offset);
        return $response;
    }

    /**
     * Operation getLocationsWithHttpInfo
     *
     * Locations: List
     *
     * @param string $account_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param int $limit Number of results to return (optional, default to 10)
     * @param string $offset Number of results to skip. Used to page through results (optional, default to 0)
     * @return Array of \Yext\Client\Model\InlineResponse2002, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function getLocationsWithHttpInfo($account_id, $v, $limit = null, $offset = null)
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling getLocations');
        }
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling getLocations');
        }
        if ($limit > 50.0) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling LocationsApi.getLocations, must be smaller than or equal to 50.0.');
        }

        // parse inputs
        $resourcePath = "/accounts/{accountId}/locations";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = $this->apiClient->getSerializer()->toQueryValue($offset);
        }
        // path params
        if ($account_id !== null) {
            $resourcePath = str_replace(
                "{" . "accountId" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse2002',
                '/accounts/{accountId}/locations'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse2002', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse2002', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation updateLocation
     *
     * Locations: Update
     *
     * @param string $account_id  (required)
     * @param string $location_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param \Yext\Client\Model\Location $location_request  (required)
     * @return \Yext\Client\Model\InlineResponse201
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function updateLocation($account_id, $location_id, $v, $location_request)
    {
        list($response) = $this->updateLocationWithHttpInfo($account_id, $location_id, $v, $location_request);
        return $response;
    }

    /**
     * Operation updateLocationWithHttpInfo
     *
     * Locations: Update
     *
     * @param string $account_id  (required)
     * @param string $location_id  (required)
     * @param string $v A date in &#x60;YYYYMMDD&#x60; format (required)
     * @param \Yext\Client\Model\Location $location_request  (required)
     * @return Array of \Yext\Client\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     * @throws \Yext\Client\ApiException on non-2xx response
     */
    public function updateLocationWithHttpInfo($account_id, $location_id, $v, $location_request)
    {
        // verify the required parameter 'account_id' is set
        if ($account_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_id when calling updateLocation');
        }
        // verify the required parameter 'location_id' is set
        if ($location_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $location_id when calling updateLocation');
        }
        // verify the required parameter 'v' is set
        if ($v === null) {
            throw new \InvalidArgumentException('Missing the required parameter $v when calling updateLocation');
        }
        // verify the required parameter 'location_request' is set
        if ($location_request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $location_request when calling updateLocation');
        }
        // parse inputs
        $resourcePath = "/accounts/{accountId}/locations/{locationId}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

        // query params
        if ($v !== null) {
            $queryParams['v'] = $this->apiClient->getSerializer()->toQueryValue($v);
        }
        // path params
        if ($account_id !== null) {
            $resourcePath = str_replace(
                "{" . "accountId" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_id),
                $resourcePath
            );
        }
        // path params
        if ($location_id !== null) {
            $resourcePath = str_replace(
                "{" . "locationId" . "}",
                $this->apiClient->getSerializer()->toPathValue($location_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($location_request)) {
            $_tempBody = $location_request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api_key');
        if (strlen($apiKey) !== 0) {
            $queryParams['api_key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Yext\Client\Model\InlineResponse201',
                '/accounts/{accountId}/locations/{locationId}'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Yext\Client\Model\InlineResponse201', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponse201', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Yext\Client\Model\InlineResponseDefault', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

}