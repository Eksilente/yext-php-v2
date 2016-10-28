<?php
/**
 * Location
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
 * # Policies and Conventions  This section gives you the basic information you need to use our APIs.  ## Authentication All requests must be authenticated using an app’s API key.  <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?<b>api_key=API_KEY</b>&v=YYYYMMDD</pre>  The API key should be kept secret, as each app has exactly one API key.  ## Versioning All requests must be versioned using the **`v`** parameter.   <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?api_key=API_KEY&<b>v=YYYYMMDD</b></pre>  The **`v`** parameter (a date in `YYYYMMDD` format) is designed to give you the freedom to adapt to Yext API changes on your own schedule. When you pass this parameter, any changes we made to the API after the specified date will not affect the behavior of the request or the content of the response.  **NOTE:** Yext has the ability to make changes that affect previous versions of the API, if necessary.  ## Serialization API v2 only accepts data in JSON format.  ## Content-Type Headers For all requests that include a request body, the Content-Type header must be included and set to `application/json`.  ## Errors and Warnings There are three kinds of issues that can be reported for a given request:  * **`FATAL_ERROR`**     * An issue caused the entire request to be rejected. * **`NON_FATAL_ERROR`**     * An item is rejected, but other items present in the request are accepted (e.g., one invalid Product List item).      * A field is rejected, but the item otherwise is accepted (e.g., invalid website URL in a Location). * **`WARNING`**     * The request did not adhere to our best practices or recommendations, but the data was accepted anyway (e.g., data was sent that may cause some listings to become unavailable, a deprecated API was used, or we changed the format of a field's content to meet our requirements).  ## Validation Modes *(Available December 2016)*  API v2 will support two request validation modes: *Strict Mode* and *Lenient Mode*.  In Strict Mode, both `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported simply as `FATAL_ERROR`s, and any error will cause the entire request to fail.  In Lenient Mode, `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported as such, and only `FATAL_ERROR`s will cause a request to fail.  All requests will be processed in Strict Mode by default.  To activate Lenient Mode, append the parameter `validation=lenient` to your request URLs.  ### Dates and times * We always use milliseconds since epoch (a.k.a. Unix time) for timestamps (e.g., review creation times, webhook update times). * We always use ISO 8601 without timezone for local date times (e.g., Event start time, Event end time). * Dates are transmitted as strings: `“YYYY-MM-DD”`.  ## Account ID In keeping with RESTful design principles, every URL in API v2 has an account ID prefix. This prefix helps to ensure that you have unique URLs for all resources.  In addition to specifying resources by explicit account ID, the following two macros are defined: * **`me`** - refers to the account that owns the API key sent with the request * **`all`** - refers to the account that owns the API key sent with the request, as well as all sub-accounts (recursively)  **IMPORTANT:** The **`me`** macro is supported in all API methods.  The **`all`** macro will only be supported in certain URLs, as noted in the reference documentation.  ### Examples This URL refers to all locations in account 123. <pre>https://api.yext.com/v2/accounts/<b>123</b>/locations?api_key=456&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456. <pre>https://api.yext.com/v2/accounts/<b>me</b>/locations?<b>api_key=456</b>&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456, as well as all locations from any of its child accounts. <pre>https://api.yext.com/v2/accounts/<b>all</b>/locations?<b>api_key=456</b>&v=20160822</pre>  ## Actor Headers *(Available December 2016)*  To attribute changes to a particular user or employee, all requests may be passed with the following headers.  **NOTE:** If you choose to provide actor headers, and we are unable to authenticate the request using the values you provide, the request will result in an error and fail.  * Attribute activity to Admin user via admin login cookie *(for Yext’s use only)*     * Header: `YextEmployee`     * Value: Admin user’s AlphaLogin cookie * Attribute activity to Admin user via email address and password     * Headers: `YextEmployeeEmail`, `YextEmployeePassword`     * Values: Admin user’s email address, Admin user’s Admin password * Attribute activity to customer user via login cookie     * Header: `YextUser`     * Value: Customer user’s YextAppsLogin cookie * Attribute activity to customer user via email address and password     * Headers: `YextUserEmail`, `YextUserPassword`     * Values: Customer user’s email address, Customer user’s password  Changes will be logged as follows:  * App with no designated actor     * History Entry \"Updated By\" Value: `App [App ID] - ‘[App Name]’`     * Example: `App 432 - ‘Hello World App’` * App with customer user actor     * History Entry \"Updated By\" Value: `[user name] ([user email]) (App [App ID] - ‘[App Name]’)`     * Example: `Jordan Smith (jsmith@example.com) (App 432 - ‘Hello World App’)` * App with Yext employee actor   * History Entry \"Updated By\" Value: `[employee username] (App [App ID] - ‘[App Name]’)`   * Example: `hlerman (App 432 - ‘Hello World App’)`  ## Response Format * **`meta`**     * Response metadata  * **`meta.uuid`**     * Unique ID for this request / response * **`meta.errors[]`**     * List of errors and warnings  * **`meta.errors[].code`**     * Code that uniquely identifies the error or warning  * **`meta.errors[].type`**     * One of:         * `FATAL_ERROR`         * `NON_FATAL_ERROR`         * `WARNING`     * See \"Errors and Warnings\" above for details. * **`meta.errors[].message`**     * An explanation of the issue * **`response`**     * The main content (body) of the response  Example: <pre><code> {     \"meta\": {         \"uuid\": \"bb0c7e19-4dc3-4891-bfa5-8593b1f124ad\",         \"errors\": [             {                 \"code\": ...error code...,                 \"type\": ...error, fatal error, non fatal error, or warning...,                 \"message\": ...explanation of the issue...             }         ]     },     \"response\": {         ...results...     } } </code></pre>  ## Status Codes * `200 OK`    * Either there are no errors or warnings, or the only issues are of type `WARNING`. * `207 Multi-Status`     * There are errors of type `itemError` or `fieldError` (but none of type `requestError`). * `400 Bad Request`     * A parameter is invalid, or a required parameter is missing. This includes the case where no API key is provided and the case where a resource ID is specified incorrectly in a path.     * This status is if any of the response errors are of type `requestError`. * `401 Unauthorized`     * The API key provided is invalid.     * `403 Forbidden`     * The requested information cannot be viewed by the acting user.  * `404 Not Found`     * The endpoint does not exist. * `405 Method Not Allowed`     * The request is using a method that is not allowed (e.g., POST with a GET-only endpoint). * `409 Conflict`     * The request could not be completed in its current state.     * Use the information included in the response to modify the request and retry. * `429 Too Many Requests`     * You have exceeded your rate limit / quota. * `500 Internal Server Error`     * Yext’s servers are not operating as expected. The request is likely valid but should be resent later. * `504 Timeout`     * Yext’s servers took too long to handle this request, and it timed out.  ## Quotas and Rate Limits Default quotas and rate limits are as follows.  * **Location Cloud API** *(includes Analytics, PowerListings®, Location Manager, Reviews, Social, and User endpoints)*: 5,000 requests per hour * **Administrative API**: 1 qps * **Live API**: 100,000 requests per hour  **NOTE:** Webhook requests do not count towards an account’s quota.  For the most current and accurate rate-limit usage information for a particular request type, check the **`RateLimit-Remaining`** and **`RateLimit-Limit`** HTTP headers of your API responses.  If you are currently over your limit, our API will return a `429` error, and the response object returned by our API will be empty. We will also include a **`RateLimit-Reset`** header in the response, which indicates when you will have additional quota.  ## Client- vs. Yext-assigned IDs You can set the ID for the following objects when you create them. If you do not provide an ID, Yext will generate one for you.  * Account * User * Location * Bio List * Menu List * Product List * Event List * Bio List Item * Menu List Item * Product List Item * Event List Item  ## Logging All API requests are logged. API logs can be found in your Developer Console and are stored for 90 days.
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
 * Location Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Yext\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Location implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Location';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'id' => 'string',
        'account_id' => 'string',
        'timestamp' => 'int',
        'location_type' => '\Yext\Client\Model\LocationType',
        'location_name' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'office_name' => 'string',
        'gender' => 'string',
        'npi' => 'string',
        'address' => 'string',
        'address2' => 'string',
        'suppress_address' => 'bool',
        'display_address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'country_code' => 'string',
        'service_area' => '\Yext\Client\Model\LocationServiceArea',
        'phone' => 'string',
        'is_phone_tracked' => 'bool',
        'local_phone' => 'string',
        'alternate_phone' => 'string',
        'fax_phone' => 'string',
        'mobile_phone' => 'string',
        'toll_free_phone' => 'string',
        'tty_phone' => 'string',
        'category_ids' => 'string[]',
        'featured_message' => 'string',
        'featured_message_url' => 'string',
        'website_url' => 'string',
        'display_website_url' => 'string',
        'reservation_url' => 'string',
        'hours' => 'string',
        'additional_hours_text' => 'string',
        'holiday_hours' => '\Yext\Client\Model\LocationHolidayHours[]',
        'description' => 'string',
        'conditions_treated' => 'string[]',
        'certifications' => 'string[]',
        'education_list' => '\Yext\Client\Model\LocationEducationList[]',
        'admitting_hospitals' => 'string[]',
        'accepting_new_patients' => 'bool',
        'closed' => '\Yext\Client\Model\LocationClosed',
        'payment_options' => 'string[]',
        'insurance_accepted' => 'string[]',
        'logo' => '\Yext\Client\Model\LocationPhoto',
        'photos' => '\Yext\Client\Model\LocationPhoto[]',
        'headshot' => 'object',
        'video_urls' => 'string[]',
        'instagram_handle' => 'string',
        'twitter_handle' => 'string',
        'google_website_override' => 'string',
        'google_cover_photo' => 'object',
        'google_profile_photo' => 'object',
        'google_preferred_photo' => 'string',
        'google_attributes' => '\Yext\Client\Model\LocationGoogleAttributes[]',
        'facebook_page_url' => 'string',
        'facebook_cover_photo' => 'object',
        'facebook_profile_picture' => 'object',
        'uber_link_type' => 'string',
        'uber_link_text' => 'string',
        'uber_trip_branding_text' => 'string',
        'uber_trip_branding_url' => 'string',
        'uber_client_id' => 'string',
        'uber_embed_code' => 'string',
        'uber_link' => 'string',
        'year_established' => 'string',
        'display_lat' => 'double',
        'routable_lat' => 'double',
        'yext_display_lat' => 'double',
        'yext_routable_lat' => 'double',
        'emails' => 'string[]',
        'specialties' => 'string[]',
        'associations' => 'string[]',
        'products' => 'string[]',
        'services' => 'string[]',
        'brands' => 'string[]',
        'languages' => 'string[]',
        'keywords' => 'string[]',
        'menus_label' => 'string',
        'menu_ids' => 'string[]',
        'bio_lists_label' => 'string',
        'bio_list_ids' => 'string[]',
        'product_lists_label' => 'string',
        'product_list_ids' => 'string[]',
        'event_lists_label' => 'string',
        'event_list_ids' => 'string[]',
        'folder_id' => 'string',
        'label_ids' => 'string[]',
        'custom_fields' => 'map[string,object]'
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
        'id' => 'id',
        'account_id' => 'accountId',
        'timestamp' => 'timestamp',
        'location_type' => 'locationType',
        'location_name' => 'locationName',
        'first_name' => 'firstName',
        'middle_name' => 'middleName',
        'last_name' => 'lastName',
        'office_name' => 'officeName',
        'gender' => 'gender',
        'npi' => 'npi',
        'address' => 'address',
        'address2' => 'address2',
        'suppress_address' => 'suppressAddress',
        'display_address' => 'displayAddress',
        'city' => 'city',
        'state' => 'state',
        'zip' => 'zip',
        'country_code' => 'countryCode',
        'service_area' => 'serviceArea',
        'phone' => 'phone',
        'is_phone_tracked' => 'isPhoneTracked',
        'local_phone' => 'localPhone',
        'alternate_phone' => 'alternatePhone',
        'fax_phone' => 'faxPhone',
        'mobile_phone' => 'mobilePhone',
        'toll_free_phone' => 'tollFreePhone',
        'tty_phone' => 'ttyPhone',
        'category_ids' => 'categoryIds',
        'featured_message' => 'featuredMessage',
        'featured_message_url' => 'featuredMessageUrl',
        'website_url' => 'websiteUrl',
        'display_website_url' => 'displayWebsiteUrl',
        'reservation_url' => 'reservationUrl',
        'hours' => 'hours',
        'additional_hours_text' => 'additionalHoursText',
        'holiday_hours' => 'holidayHours',
        'description' => 'description',
        'conditions_treated' => 'conditionsTreated',
        'certifications' => 'certifications',
        'education_list' => 'educationList',
        'admitting_hospitals' => 'admittingHospitals',
        'accepting_new_patients' => 'acceptingNewPatients',
        'closed' => 'closed',
        'payment_options' => 'paymentOptions',
        'insurance_accepted' => 'insuranceAccepted',
        'logo' => 'logo',
        'photos' => 'photos',
        'headshot' => 'headshot',
        'video_urls' => 'videoUrls',
        'instagram_handle' => 'instagramHandle',
        'twitter_handle' => 'twitterHandle',
        'google_website_override' => 'googleWebsiteOverride',
        'google_cover_photo' => 'googleCoverPhoto',
        'google_profile_photo' => 'googleProfilePhoto',
        'google_preferred_photo' => 'googlePreferredPhoto',
        'google_attributes' => 'googleAttributes',
        'facebook_page_url' => 'facebookPageUrl',
        'facebook_cover_photo' => 'facebookCoverPhoto',
        'facebook_profile_picture' => 'facebookProfilePicture',
        'uber_link_type' => 'uberLinkType',
        'uber_link_text' => 'uberLinkText',
        'uber_trip_branding_text' => 'uberTripBrandingText',
        'uber_trip_branding_url' => 'uberTripBrandingUrl',
        'uber_client_id' => 'uberClientId',
        'uber_embed_code' => 'uberEmbedCode',
        'uber_link' => 'uberLink',
        'year_established' => 'yearEstablished',
        'display_lat' => 'displayLat',
        'routable_lat' => 'routableLat',
        'yext_display_lat' => 'yextDisplayLat',
        'yext_routable_lat' => 'yextRoutableLat',
        'emails' => 'emails',
        'specialties' => 'specialties',
        'associations' => 'associations',
        'products' => 'products',
        'services' => 'services',
        'brands' => 'brands',
        'languages' => 'languages',
        'keywords' => 'keywords',
        'menus_label' => 'menusLabel',
        'menu_ids' => 'menuIds',
        'bio_lists_label' => 'bioListsLabel',
        'bio_list_ids' => 'bioListIds',
        'product_lists_label' => 'productListsLabel',
        'product_list_ids' => 'productListIds',
        'event_lists_label' => 'eventListsLabel',
        'event_list_ids' => 'eventListIds',
        'folder_id' => 'folderId',
        'label_ids' => 'labelIds',
        'custom_fields' => 'customFields'
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
        'id' => 'setId',
        'account_id' => 'setAccountId',
        'timestamp' => 'setTimestamp',
        'location_type' => 'setLocationType',
        'location_name' => 'setLocationName',
        'first_name' => 'setFirstName',
        'middle_name' => 'setMiddleName',
        'last_name' => 'setLastName',
        'office_name' => 'setOfficeName',
        'gender' => 'setGender',
        'npi' => 'setNpi',
        'address' => 'setAddress',
        'address2' => 'setAddress2',
        'suppress_address' => 'setSuppressAddress',
        'display_address' => 'setDisplayAddress',
        'city' => 'setCity',
        'state' => 'setState',
        'zip' => 'setZip',
        'country_code' => 'setCountryCode',
        'service_area' => 'setServiceArea',
        'phone' => 'setPhone',
        'is_phone_tracked' => 'setIsPhoneTracked',
        'local_phone' => 'setLocalPhone',
        'alternate_phone' => 'setAlternatePhone',
        'fax_phone' => 'setFaxPhone',
        'mobile_phone' => 'setMobilePhone',
        'toll_free_phone' => 'setTollFreePhone',
        'tty_phone' => 'setTtyPhone',
        'category_ids' => 'setCategoryIds',
        'featured_message' => 'setFeaturedMessage',
        'featured_message_url' => 'setFeaturedMessageUrl',
        'website_url' => 'setWebsiteUrl',
        'display_website_url' => 'setDisplayWebsiteUrl',
        'reservation_url' => 'setReservationUrl',
        'hours' => 'setHours',
        'additional_hours_text' => 'setAdditionalHoursText',
        'holiday_hours' => 'setHolidayHours',
        'description' => 'setDescription',
        'conditions_treated' => 'setConditionsTreated',
        'certifications' => 'setCertifications',
        'education_list' => 'setEducationList',
        'admitting_hospitals' => 'setAdmittingHospitals',
        'accepting_new_patients' => 'setAcceptingNewPatients',
        'closed' => 'setClosed',
        'payment_options' => 'setPaymentOptions',
        'insurance_accepted' => 'setInsuranceAccepted',
        'logo' => 'setLogo',
        'photos' => 'setPhotos',
        'headshot' => 'setHeadshot',
        'video_urls' => 'setVideoUrls',
        'instagram_handle' => 'setInstagramHandle',
        'twitter_handle' => 'setTwitterHandle',
        'google_website_override' => 'setGoogleWebsiteOverride',
        'google_cover_photo' => 'setGoogleCoverPhoto',
        'google_profile_photo' => 'setGoogleProfilePhoto',
        'google_preferred_photo' => 'setGooglePreferredPhoto',
        'google_attributes' => 'setGoogleAttributes',
        'facebook_page_url' => 'setFacebookPageUrl',
        'facebook_cover_photo' => 'setFacebookCoverPhoto',
        'facebook_profile_picture' => 'setFacebookProfilePicture',
        'uber_link_type' => 'setUberLinkType',
        'uber_link_text' => 'setUberLinkText',
        'uber_trip_branding_text' => 'setUberTripBrandingText',
        'uber_trip_branding_url' => 'setUberTripBrandingUrl',
        'uber_client_id' => 'setUberClientId',
        'uber_embed_code' => 'setUberEmbedCode',
        'uber_link' => 'setUberLink',
        'year_established' => 'setYearEstablished',
        'display_lat' => 'setDisplayLat',
        'routable_lat' => 'setRoutableLat',
        'yext_display_lat' => 'setYextDisplayLat',
        'yext_routable_lat' => 'setYextRoutableLat',
        'emails' => 'setEmails',
        'specialties' => 'setSpecialties',
        'associations' => 'setAssociations',
        'products' => 'setProducts',
        'services' => 'setServices',
        'brands' => 'setBrands',
        'languages' => 'setLanguages',
        'keywords' => 'setKeywords',
        'menus_label' => 'setMenusLabel',
        'menu_ids' => 'setMenuIds',
        'bio_lists_label' => 'setBioListsLabel',
        'bio_list_ids' => 'setBioListIds',
        'product_lists_label' => 'setProductListsLabel',
        'product_list_ids' => 'setProductListIds',
        'event_lists_label' => 'setEventListsLabel',
        'event_list_ids' => 'setEventListIds',
        'folder_id' => 'setFolderId',
        'label_ids' => 'setLabelIds',
        'custom_fields' => 'setCustomFields'
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
        'id' => 'getId',
        'account_id' => 'getAccountId',
        'timestamp' => 'getTimestamp',
        'location_type' => 'getLocationType',
        'location_name' => 'getLocationName',
        'first_name' => 'getFirstName',
        'middle_name' => 'getMiddleName',
        'last_name' => 'getLastName',
        'office_name' => 'getOfficeName',
        'gender' => 'getGender',
        'npi' => 'getNpi',
        'address' => 'getAddress',
        'address2' => 'getAddress2',
        'suppress_address' => 'getSuppressAddress',
        'display_address' => 'getDisplayAddress',
        'city' => 'getCity',
        'state' => 'getState',
        'zip' => 'getZip',
        'country_code' => 'getCountryCode',
        'service_area' => 'getServiceArea',
        'phone' => 'getPhone',
        'is_phone_tracked' => 'getIsPhoneTracked',
        'local_phone' => 'getLocalPhone',
        'alternate_phone' => 'getAlternatePhone',
        'fax_phone' => 'getFaxPhone',
        'mobile_phone' => 'getMobilePhone',
        'toll_free_phone' => 'getTollFreePhone',
        'tty_phone' => 'getTtyPhone',
        'category_ids' => 'getCategoryIds',
        'featured_message' => 'getFeaturedMessage',
        'featured_message_url' => 'getFeaturedMessageUrl',
        'website_url' => 'getWebsiteUrl',
        'display_website_url' => 'getDisplayWebsiteUrl',
        'reservation_url' => 'getReservationUrl',
        'hours' => 'getHours',
        'additional_hours_text' => 'getAdditionalHoursText',
        'holiday_hours' => 'getHolidayHours',
        'description' => 'getDescription',
        'conditions_treated' => 'getConditionsTreated',
        'certifications' => 'getCertifications',
        'education_list' => 'getEducationList',
        'admitting_hospitals' => 'getAdmittingHospitals',
        'accepting_new_patients' => 'getAcceptingNewPatients',
        'closed' => 'getClosed',
        'payment_options' => 'getPaymentOptions',
        'insurance_accepted' => 'getInsuranceAccepted',
        'logo' => 'getLogo',
        'photos' => 'getPhotos',
        'headshot' => 'getHeadshot',
        'video_urls' => 'getVideoUrls',
        'instagram_handle' => 'getInstagramHandle',
        'twitter_handle' => 'getTwitterHandle',
        'google_website_override' => 'getGoogleWebsiteOverride',
        'google_cover_photo' => 'getGoogleCoverPhoto',
        'google_profile_photo' => 'getGoogleProfilePhoto',
        'google_preferred_photo' => 'getGooglePreferredPhoto',
        'google_attributes' => 'getGoogleAttributes',
        'facebook_page_url' => 'getFacebookPageUrl',
        'facebook_cover_photo' => 'getFacebookCoverPhoto',
        'facebook_profile_picture' => 'getFacebookProfilePicture',
        'uber_link_type' => 'getUberLinkType',
        'uber_link_text' => 'getUberLinkText',
        'uber_trip_branding_text' => 'getUberTripBrandingText',
        'uber_trip_branding_url' => 'getUberTripBrandingUrl',
        'uber_client_id' => 'getUberClientId',
        'uber_embed_code' => 'getUberEmbedCode',
        'uber_link' => 'getUberLink',
        'year_established' => 'getYearEstablished',
        'display_lat' => 'getDisplayLat',
        'routable_lat' => 'getRoutableLat',
        'yext_display_lat' => 'getYextDisplayLat',
        'yext_routable_lat' => 'getYextRoutableLat',
        'emails' => 'getEmails',
        'specialties' => 'getSpecialties',
        'associations' => 'getAssociations',
        'products' => 'getProducts',
        'services' => 'getServices',
        'brands' => 'getBrands',
        'languages' => 'getLanguages',
        'keywords' => 'getKeywords',
        'menus_label' => 'getMenusLabel',
        'menu_ids' => 'getMenuIds',
        'bio_lists_label' => 'getBioListsLabel',
        'bio_list_ids' => 'getBioListIds',
        'product_lists_label' => 'getProductListsLabel',
        'product_list_ids' => 'getProductListIds',
        'event_lists_label' => 'getEventListsLabel',
        'event_list_ids' => 'getEventListIds',
        'folder_id' => 'getFolderId',
        'label_ids' => 'getLabelIds',
        'custom_fields' => 'getCustomFields'
    );

    public static function getters()
    {
        return self::$getters;
    }

    const GENDER_FEMALE = 'FEMALE';
    const GENDER_F = 'F';
    const GENDER_MALE = 'MALE';
    const GENDER_M = 'M';
    const GENDER_UNSPECIFIED = 'UNSPECIFIED';
    const UBER_LINK_TYPE_TEXT = 'TEXT';
    const UBER_LINK_TYPE_BUTTON = 'BUTTON';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getGenderAllowableValues()
    {
        return [
            self::GENDER_FEMALE,
            self::GENDER_F,
            self::GENDER_MALE,
            self::GENDER_M,
            self::GENDER_UNSPECIFIED,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getUberLinkTypeAllowableValues()
    {
        return [
            self::UBER_LINK_TYPE_TEXT,
            self::UBER_LINK_TYPE_BUTTON,
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['timestamp'] = isset($data['timestamp']) ? $data['timestamp'] : null;
        $this->container['location_type'] = isset($data['location_type']) ? $data['location_type'] : null;
        $this->container['location_name'] = isset($data['location_name']) ? $data['location_name'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['middle_name'] = isset($data['middle_name']) ? $data['middle_name'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['office_name'] = isset($data['office_name']) ? $data['office_name'] : null;
        $this->container['gender'] = isset($data['gender']) ? $data['gender'] : null;
        $this->container['npi'] = isset($data['npi']) ? $data['npi'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['address2'] = isset($data['address2']) ? $data['address2'] : null;
        $this->container['suppress_address'] = isset($data['suppress_address']) ? $data['suppress_address'] : null;
        $this->container['display_address'] = isset($data['display_address']) ? $data['display_address'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['zip'] = isset($data['zip']) ? $data['zip'] : null;
        $this->container['country_code'] = isset($data['country_code']) ? $data['country_code'] : null;
        $this->container['service_area'] = isset($data['service_area']) ? $data['service_area'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['is_phone_tracked'] = isset($data['is_phone_tracked']) ? $data['is_phone_tracked'] : null;
        $this->container['local_phone'] = isset($data['local_phone']) ? $data['local_phone'] : null;
        $this->container['alternate_phone'] = isset($data['alternate_phone']) ? $data['alternate_phone'] : null;
        $this->container['fax_phone'] = isset($data['fax_phone']) ? $data['fax_phone'] : null;
        $this->container['mobile_phone'] = isset($data['mobile_phone']) ? $data['mobile_phone'] : null;
        $this->container['toll_free_phone'] = isset($data['toll_free_phone']) ? $data['toll_free_phone'] : null;
        $this->container['tty_phone'] = isset($data['tty_phone']) ? $data['tty_phone'] : null;
        $this->container['category_ids'] = isset($data['category_ids']) ? $data['category_ids'] : null;
        $this->container['featured_message'] = isset($data['featured_message']) ? $data['featured_message'] : null;
        $this->container['featured_message_url'] = isset($data['featured_message_url']) ? $data['featured_message_url'] : null;
        $this->container['website_url'] = isset($data['website_url']) ? $data['website_url'] : null;
        $this->container['display_website_url'] = isset($data['display_website_url']) ? $data['display_website_url'] : null;
        $this->container['reservation_url'] = isset($data['reservation_url']) ? $data['reservation_url'] : null;
        $this->container['hours'] = isset($data['hours']) ? $data['hours'] : null;
        $this->container['additional_hours_text'] = isset($data['additional_hours_text']) ? $data['additional_hours_text'] : null;
        $this->container['holiday_hours'] = isset($data['holiday_hours']) ? $data['holiday_hours'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['conditions_treated'] = isset($data['conditions_treated']) ? $data['conditions_treated'] : null;
        $this->container['certifications'] = isset($data['certifications']) ? $data['certifications'] : null;
        $this->container['education_list'] = isset($data['education_list']) ? $data['education_list'] : null;
        $this->container['admitting_hospitals'] = isset($data['admitting_hospitals']) ? $data['admitting_hospitals'] : null;
        $this->container['accepting_new_patients'] = isset($data['accepting_new_patients']) ? $data['accepting_new_patients'] : null;
        $this->container['closed'] = isset($data['closed']) ? $data['closed'] : null;
        $this->container['payment_options'] = isset($data['payment_options']) ? $data['payment_options'] : null;
        $this->container['insurance_accepted'] = isset($data['insurance_accepted']) ? $data['insurance_accepted'] : null;
        $this->container['logo'] = isset($data['logo']) ? $data['logo'] : null;
        $this->container['photos'] = isset($data['photos']) ? $data['photos'] : null;
        $this->container['headshot'] = isset($data['headshot']) ? $data['headshot'] : null;
        $this->container['video_urls'] = isset($data['video_urls']) ? $data['video_urls'] : null;
        $this->container['instagram_handle'] = isset($data['instagram_handle']) ? $data['instagram_handle'] : null;
        $this->container['twitter_handle'] = isset($data['twitter_handle']) ? $data['twitter_handle'] : null;
        $this->container['google_website_override'] = isset($data['google_website_override']) ? $data['google_website_override'] : null;
        $this->container['google_cover_photo'] = isset($data['google_cover_photo']) ? $data['google_cover_photo'] : null;
        $this->container['google_profile_photo'] = isset($data['google_profile_photo']) ? $data['google_profile_photo'] : null;
        $this->container['google_preferred_photo'] = isset($data['google_preferred_photo']) ? $data['google_preferred_photo'] : null;
        $this->container['google_attributes'] = isset($data['google_attributes']) ? $data['google_attributes'] : null;
        $this->container['facebook_page_url'] = isset($data['facebook_page_url']) ? $data['facebook_page_url'] : null;
        $this->container['facebook_cover_photo'] = isset($data['facebook_cover_photo']) ? $data['facebook_cover_photo'] : null;
        $this->container['facebook_profile_picture'] = isset($data['facebook_profile_picture']) ? $data['facebook_profile_picture'] : null;
        $this->container['uber_link_type'] = isset($data['uber_link_type']) ? $data['uber_link_type'] : null;
        $this->container['uber_link_text'] = isset($data['uber_link_text']) ? $data['uber_link_text'] : null;
        $this->container['uber_trip_branding_text'] = isset($data['uber_trip_branding_text']) ? $data['uber_trip_branding_text'] : null;
        $this->container['uber_trip_branding_url'] = isset($data['uber_trip_branding_url']) ? $data['uber_trip_branding_url'] : null;
        $this->container['uber_client_id'] = isset($data['uber_client_id']) ? $data['uber_client_id'] : null;
        $this->container['uber_embed_code'] = isset($data['uber_embed_code']) ? $data['uber_embed_code'] : null;
        $this->container['uber_link'] = isset($data['uber_link']) ? $data['uber_link'] : null;
        $this->container['year_established'] = isset($data['year_established']) ? $data['year_established'] : null;
        $this->container['display_lat'] = isset($data['display_lat']) ? $data['display_lat'] : null;
        $this->container['routable_lat'] = isset($data['routable_lat']) ? $data['routable_lat'] : null;
        $this->container['yext_display_lat'] = isset($data['yext_display_lat']) ? $data['yext_display_lat'] : null;
        $this->container['yext_routable_lat'] = isset($data['yext_routable_lat']) ? $data['yext_routable_lat'] : null;
        $this->container['emails'] = isset($data['emails']) ? $data['emails'] : null;
        $this->container['specialties'] = isset($data['specialties']) ? $data['specialties'] : null;
        $this->container['associations'] = isset($data['associations']) ? $data['associations'] : null;
        $this->container['products'] = isset($data['products']) ? $data['products'] : null;
        $this->container['services'] = isset($data['services']) ? $data['services'] : null;
        $this->container['brands'] = isset($data['brands']) ? $data['brands'] : null;
        $this->container['languages'] = isset($data['languages']) ? $data['languages'] : null;
        $this->container['keywords'] = isset($data['keywords']) ? $data['keywords'] : null;
        $this->container['menus_label'] = isset($data['menus_label']) ? $data['menus_label'] : null;
        $this->container['menu_ids'] = isset($data['menu_ids']) ? $data['menu_ids'] : null;
        $this->container['bio_lists_label'] = isset($data['bio_lists_label']) ? $data['bio_lists_label'] : null;
        $this->container['bio_list_ids'] = isset($data['bio_list_ids']) ? $data['bio_list_ids'] : null;
        $this->container['product_lists_label'] = isset($data['product_lists_label']) ? $data['product_lists_label'] : null;
        $this->container['product_list_ids'] = isset($data['product_list_ids']) ? $data['product_list_ids'] : null;
        $this->container['event_lists_label'] = isset($data['event_lists_label']) ? $data['event_lists_label'] : null;
        $this->container['event_list_ids'] = isset($data['event_list_ids']) ? $data['event_list_ids'] : null;
        $this->container['folder_id'] = isset($data['folder_id']) ? $data['folder_id'] : null;
        $this->container['label_ids'] = isset($data['label_ids']) ? $data['label_ids'] : null;
        $this->container['custom_fields'] = isset($data['custom_fields']) ? $data['custom_fields'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        if (!is_null($this->container['id']) && (strlen($this->container['id']) > 50)) {
            $invalid_properties[] = "invalid value for 'id', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['account_id']) && (strlen($this->container['account_id']) > 50)) {
            $invalid_properties[] = "invalid value for 'account_id', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['location_name']) && (strlen($this->container['location_name']) > 100)) {
            $invalid_properties[] = "invalid value for 'location_name', the character length must be smaller than or equal to 100.";
        }

        $allowed_values = array("FEMALE", "F", "MALE", "M", "UNSPECIFIED");
        if (!in_array($this->container['gender'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'gender', must be one of #{allowed_values}.";
        }

        if (!is_null($this->container['address']) && (strlen($this->container['address']) > 255)) {
            $invalid_properties[] = "invalid value for 'address', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['address2']) && (strlen($this->container['address2']) > 255)) {
            $invalid_properties[] = "invalid value for 'address2', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['display_address']) && (strlen($this->container['display_address']) > 255)) {
            $invalid_properties[] = "invalid value for 'display_address', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['city']) && (strlen($this->container['city']) > 80)) {
            $invalid_properties[] = "invalid value for 'city', the character length must be smaller than or equal to 80.";
        }

        if (!is_null($this->container['state']) && (strlen($this->container['state']) > 80)) {
            $invalid_properties[] = "invalid value for 'state', the character length must be smaller than or equal to 80.";
        }

        if (!is_null($this->container['zip']) && (strlen($this->container['zip']) > 10)) {
            $invalid_properties[] = "invalid value for 'zip', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['country_code']) && (strlen($this->container['country_code']) > 2)) {
            $invalid_properties[] = "invalid value for 'country_code', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['featured_message']) && (strlen($this->container['featured_message']) > 50)) {
            $invalid_properties[] = "invalid value for 'featured_message', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['featured_message_url']) && (strlen($this->container['featured_message_url']) > 255)) {
            $invalid_properties[] = "invalid value for 'featured_message_url', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['website_url']) && (strlen($this->container['website_url']) > 255)) {
            $invalid_properties[] = "invalid value for 'website_url', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['display_website_url']) && (strlen($this->container['display_website_url']) > 255)) {
            $invalid_properties[] = "invalid value for 'display_website_url', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['reservation_url']) && (strlen($this->container['reservation_url']) > 255)) {
            $invalid_properties[] = "invalid value for 'reservation_url', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['hours']) && (strlen($this->container['hours']) > 255)) {
            $invalid_properties[] = "invalid value for 'hours', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['additional_hours_text']) && (strlen($this->container['additional_hours_text']) > 255)) {
            $invalid_properties[] = "invalid value for 'additional_hours_text', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['description']) && (strlen($this->container['description']) > 5000)) {
            $invalid_properties[] = "invalid value for 'description', the character length must be smaller than or equal to 5000.";
        }

        if (!is_null($this->container['twitter_handle']) && (strlen($this->container['twitter_handle']) > 15)) {
            $invalid_properties[] = "invalid value for 'twitter_handle', the character length must be smaller than or equal to 15.";
        }

        if (!is_null($this->container['google_website_override']) && (strlen($this->container['google_website_override']) > 255)) {
            $invalid_properties[] = "invalid value for 'google_website_override', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['facebook_page_url']) && (strlen($this->container['facebook_page_url']) > 255)) {
            $invalid_properties[] = "invalid value for 'facebook_page_url', the character length must be smaller than or equal to 255.";
        }

        $allowed_values = array("TEXT", "BUTTON");
        if (!in_array($this->container['uber_link_type'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'uber_link_type', must be one of #{allowed_values}.";
        }

        if (!is_null($this->container['uber_link_text']) && (strlen($this->container['uber_link_text']) > 100)) {
            $invalid_properties[] = "invalid value for 'uber_link_text', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['uber_trip_branding_text']) && (strlen($this->container['uber_trip_branding_text']) > 28)) {
            $invalid_properties[] = "invalid value for 'uber_trip_branding_text', the character length must be smaller than or equal to 28.";
        }

        if (!is_null($this->container['year_established']) && (strlen($this->container['year_established']) > 4)) {
            $invalid_properties[] = "invalid value for 'year_established', the character length must be smaller than or equal to 4.";
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
        if (strlen($this->container['id']) > 50) {
            return false;
        }
        if (strlen($this->container['account_id']) > 50) {
            return false;
        }
        if (strlen($this->container['location_name']) > 100) {
            return false;
        }
        $allowed_values = array("FEMALE", "F", "MALE", "M", "UNSPECIFIED");
        if (!in_array($this->container['gender'], $allowed_values)) {
            return false;
        }
        if (strlen($this->container['address']) > 255) {
            return false;
        }
        if (strlen($this->container['address2']) > 255) {
            return false;
        }
        if (strlen($this->container['display_address']) > 255) {
            return false;
        }
        if (strlen($this->container['city']) > 80) {
            return false;
        }
        if (strlen($this->container['state']) > 80) {
            return false;
        }
        if (strlen($this->container['zip']) > 10) {
            return false;
        }
        if (strlen($this->container['country_code']) > 2) {
            return false;
        }
        if (strlen($this->container['featured_message']) > 50) {
            return false;
        }
        if (strlen($this->container['featured_message_url']) > 255) {
            return false;
        }
        if (strlen($this->container['website_url']) > 255) {
            return false;
        }
        if (strlen($this->container['display_website_url']) > 255) {
            return false;
        }
        if (strlen($this->container['reservation_url']) > 255) {
            return false;
        }
        if (strlen($this->container['hours']) > 255) {
            return false;
        }
        if (strlen($this->container['additional_hours_text']) > 255) {
            return false;
        }
        if (strlen($this->container['description']) > 5000) {
            return false;
        }
        if (strlen($this->container['twitter_handle']) > 15) {
            return false;
        }
        if (strlen($this->container['google_website_override']) > 255) {
            return false;
        }
        if (strlen($this->container['facebook_page_url']) > 255) {
            return false;
        }
        $allowed_values = array("TEXT", "BUTTON");
        if (!in_array($this->container['uber_link_type'], $allowed_values)) {
            return false;
        }
        if (strlen($this->container['uber_link_text']) > 100) {
            return false;
        }
        if (strlen($this->container['uber_trip_branding_text']) > 28) {
            return false;
        }
        if (strlen($this->container['year_established']) > 4) {
            return false;
        }
        return true;
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
     * @param string $id <msg desc=\"Describes an identifier field\">Primary key. Unique alphanumeric (Latin-1) ID assigned by the Customer.</msg>
     * @return $this
     */
    public function setId($id)
    {
        if (strlen($id) > 50) {
            throw new \InvalidArgumentException('invalid length for $id when calling Location., must be smaller than or equal to 50.');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets account_id
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     * @param string $account_id <msg desc=\"Describes an accountId field. account.id should not be translated\">Must refer to an **account.id** that already exists.</msg>
     * @return $this
     */
    public function setAccountId($account_id)
    {
        if (strlen($account_id) > 50) {
            throw new \InvalidArgumentException('invalid length for $account_id when calling Location., must be smaller than or equal to 50.');
        }
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets timestamp
     * @return int
     */
    public function getTimestamp()
    {
        return $this->container['timestamp'];
    }

    /**
     * Sets timestamp
     * @param int $timestamp <msg desc=\"Describes a timestamp field\">The timestamp of the most recent change to this location record.  Will be ignored when the client is saving location data to Yext.</msg>  <msg>**NOTE:** The timestamp may change even if observable fields stay the same.</msg>
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->container['timestamp'] = $timestamp;

        return $this;
    }

    /**
     * Gets location_type
     * @return \Yext\Client\Model\LocationType
     */
    public function getLocationType()
    {
        return $this->container['location_type'];
    }

    /**
     * Sets location_type
     * @param \Yext\Client\Model\LocationType $location_type
     * @return $this
     */
    public function setLocationType($location_type)
    {
        $this->container['location_type'] = $location_type;

        return $this;
    }

    /**
     * Gets location_name
     * @return string
     */
    public function getLocationName()
    {
        return $this->container['location_name'];
    }

    /**
     * Sets location_name
     * @param string $location_name <msg desc=\"Control character examples in parentheses do not get translated\">Cannot include: * inappropriate language * HTML markup or entities * a URL or domain name * a phone number * control characters ([\\x00-\\x1F\\x7F])</msg>  <msg>Should be in appropriate letter case (e.g., not in all capital letters)</msg>
     * @return $this
     */
    public function setLocationName($location_name)
    {
        if (strlen($location_name) > 100) {
            throw new \InvalidArgumentException('invalid length for $location_name when calling Location., must be smaller than or equal to 100.');
        }
        $this->container['location_name'] = $location_name;

        return $this;
    }

    /**
     * Gets first_name
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     * @param string $first_name <msg>The first name of the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets middle_name
     * @return string
     */
    public function getMiddleName()
    {
        return $this->container['middle_name'];
    }

    /**
     * Sets middle_name
     * @param string $middle_name <msg>The middle name of the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setMiddleName($middle_name)
    {
        $this->container['middle_name'] = $middle_name;

        return $this;
    }

    /**
     * Gets last_name
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     * @param string $last_name <msg>The last name of the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets office_name
     * @return string
     */
    public function getOfficeName()
    {
        return $this->container['office_name'];
    }

    /**
     * Sets office_name
     * @param string $office_name <msg desc=\"locationName should not be translated\">The name of the office where the healthcare professional works, if different from **locationName**</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setOfficeName($office_name)
    {
        $this->container['office_name'] = $office_name;

        return $this;
    }

    /**
     * Gets gender
     * @return string
     */
    public function getGender()
    {
        return $this->container['gender'];
    }

    /**
     * Sets gender
     * @param string $gender <msg>The gender of the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setGender($gender)
    {
        $allowed_values = array('FEMALE', 'F', 'MALE', 'M', 'UNSPECIFIED');
        if (!in_array($gender, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'gender', must be one of 'FEMALE', 'F', 'MALE', 'M', 'UNSPECIFIED'");
        }
        $this->container['gender'] = $gender;

        return $this;
    }

    /**
     * Gets npi
     * @return string
     */
    public function getNpi()
    {
        return $this->container['npi'];
    }

    /**
     * Sets npi
     * @param string $npi <msg>The National Provider Identifier (NPI) of the healthcare provider</msg>  <msg desc=\"locationType, HEALTHCARE_PROFESSIONAL, and HEALTHCARE_FACILITY should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL or HEALTHCARE_FACILITY.</msg>
     * @return $this
     */
    public function setNpi($npi)
    {
        $this->container['npi'] = $npi;

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
     * @param string $address <msg desc=\"Describes an address field\">Must be a valid address</msg>  <msg>Cannot be a P.O. Box</msg>
     * @return $this
     */
    public function setAddress($address)
    {
        if (strlen($address) > 255) {
            throw new \InvalidArgumentException('invalid length for $address when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets address2
     * @return string
     */
    public function getAddress2()
    {
        return $this->container['address2'];
    }

    /**
     * Sets address2
     * @param string $address2 <msg>Cannot be a P.O. Box</msg>
     * @return $this
     */
    public function setAddress2($address2)
    {
        if (strlen($address2) > 255) {
            throw new \InvalidArgumentException('invalid length for $address2 when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['address2'] = $address2;

        return $this;
    }

    /**
     * Gets suppress_address
     * @return bool
     */
    public function getSuppressAddress()
    {
        return $this->container['suppress_address'];
    }

    /**
     * Sets suppress_address
     * @param bool $suppress_address <msg desc=\"true and false are constants and should not be translated\">If true, do not show street address on listings. Defaults to false.</msg>
     * @return $this
     */
    public function setSuppressAddress($suppress_address)
    {
        $this->container['suppress_address'] = $suppress_address;

        return $this;
    }

    /**
     * Gets display_address
     * @return string
     */
    public function getDisplayAddress()
    {
        return $this->container['display_address'];
    }

    /**
     * Sets display_address
     * @param string $display_address <msg desc=\"Describes a location field\">Provides additional information to help consumers get to the location. This string appears along with the location's address (e.g. In Menlo Mall, 3rd Floor).</msg>  <msg desc=\"Describes a location field. supportAddress and true are constants and should not be translated\">It may also be used in conjunction with a hidden address (i.e., when **suppressAddress** is true) to give consumers information about where the location is found (e.g., Servicing the New York area).</msg>  <msg>Cannot be a P.O. Box</msg>
     * @return $this
     */
    public function setDisplayAddress($display_address)
    {
        if (strlen($display_address) > 255) {
            throw new \InvalidArgumentException('invalid length for $display_address when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['display_address'] = $display_address;

        return $this;
    }

    /**
     * Gets city
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        if (strlen($city) > 80) {
            throw new \InvalidArgumentException('invalid length for $city when calling Location., must be smaller than or equal to 80.');
        }
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets state
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param string $state <msg desc=\"Describes a location state field. DC is a constant and should not be translated\">The two-character state code, or DC for the District of Columbia</msg>
     * @return $this
     */
    public function setState($state)
    {
        if (strlen($state) > 80) {
            throw new \InvalidArgumentException('invalid length for $state when calling Location., must be smaller than or equal to 80.');
        }
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets zip
     * @return string
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     * @param string $zip <msg desc=\"Describes a location postal code field\">The five- or nine-digit ZIP code (the hyphen is optional)</msg>
     * @return $this
     */
    public function setZip($zip)
    {
        if (strlen($zip) > 10) {
            throw new \InvalidArgumentException('invalid length for $zip when calling Location., must be smaller than or equal to 10.');
        }
        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets country_code
     * @return string
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     * @param string $country_code <msg desc=\"Describes a location country field. US is a constant and should not be translated\">The country code (two-character ISO 3166-1) of the location's country . US is the only valid value.</msg>
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        if (strlen($country_code) > 2) {
            throw new \InvalidArgumentException('invalid length for $country_code when calling Location., must be smaller than or equal to 2.');
        }
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets service_area
     * @return \Yext\Client\Model\LocationServiceArea
     */
    public function getServiceArea()
    {
        return $this->container['service_area'];
    }

    /**
     * Sets service_area
     * @param \Yext\Client\Model\LocationServiceArea $service_area
     * @return $this
     */
    public function setServiceArea($service_area)
    {
        $this->container['service_area'] = $service_area;

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
     * @param string $phone <msg>Must be a valid 10-digit phone number.</msg>
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets is_phone_tracked
     * @return bool
     */
    public function getIsPhoneTracked()
    {
        return $this->container['is_phone_tracked'];
    }

    /**
     * Sets is_phone_tracked
     * @param bool $is_phone_tracked <msg desc=\"true and **phone** should not be translated\">Set to true if the number listed in **phone** is a tracked phone number.</msg>  <msg desc=\"isPhoneTracked and phone are constants and should not be translated. Request is a HTTP request\">**NOTE:** When updating **isPhoneTracked**, you must provide a value for **phone** in the same request.</msg>
     * @return $this
     */
    public function setIsPhoneTracked($is_phone_tracked)
    {
        $this->container['is_phone_tracked'] = $is_phone_tracked;

        return $this;
    }

    /**
     * Gets local_phone
     * @return string
     */
    public function getLocalPhone()
    {
        return $this->container['local_phone'];
    }

    /**
     * Sets local_phone
     * @param string $local_phone <msg>Must be a valid, non-toll-free 10-digit phone number.</msg>  <msg desc=\"isPhoneTracked and phone are constants and should not be translated\">Required if: * **isPhoneTracked** is true and the non-tracked number is a toll-free number, **OR** * **isPhoneTracked** is false and **phone** is a toll-free number</msg>
     * @return $this
     */
    public function setLocalPhone($local_phone)
    {
        $this->container['local_phone'] = $local_phone;

        return $this;
    }

    /**
     * Gets alternate_phone
     * @return string
     */
    public function getAlternatePhone()
    {
        return $this->container['alternate_phone'];
    }

    /**
     * Sets alternate_phone
     * @param string $alternate_phone <msg>Must be a valid 10-digit phone number. Phone numbers for US locations must contain 10 digits.</msg>
     * @return $this
     */
    public function setAlternatePhone($alternate_phone)
    {
        $this->container['alternate_phone'] = $alternate_phone;

        return $this;
    }

    /**
     * Gets fax_phone
     * @return string
     */
    public function getFaxPhone()
    {
        return $this->container['fax_phone'];
    }

    /**
     * Sets fax_phone
     * @param string $fax_phone <msg>Must be a valid 10-digit phone number. Phone numbers for US locations must contain 10 digits.</msg>
     * @return $this
     */
    public function setFaxPhone($fax_phone)
    {
        $this->container['fax_phone'] = $fax_phone;

        return $this;
    }

    /**
     * Gets mobile_phone
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->container['mobile_phone'];
    }

    /**
     * Sets mobile_phone
     * @param string $mobile_phone <msg>Must be a valid 10-digit phone number. Phone numbers for US locations must contain 10 digits.</msg>
     * @return $this
     */
    public function setMobilePhone($mobile_phone)
    {
        $this->container['mobile_phone'] = $mobile_phone;

        return $this;
    }

    /**
     * Gets toll_free_phone
     * @return string
     */
    public function getTollFreePhone()
    {
        return $this->container['toll_free_phone'];
    }

    /**
     * Sets toll_free_phone
     * @param string $toll_free_phone <msg>Must be a valid 10-digit phone number. Phone numbers for US locations must contain 10 digits.</msg>
     * @return $this
     */
    public function setTollFreePhone($toll_free_phone)
    {
        $this->container['toll_free_phone'] = $toll_free_phone;

        return $this;
    }

    /**
     * Gets tty_phone
     * @return string
     */
    public function getTtyPhone()
    {
        return $this->container['tty_phone'];
    }

    /**
     * Sets tty_phone
     * @param string $tty_phone <msg>Must be a valid 10-digit phone number. Phone numbers for US locations must contain 10 digits.</msg>
     * @return $this
     */
    public function setTtyPhone($tty_phone)
    {
        $this->container['tty_phone'] = $tty_phone;

        return $this;
    }

    /**
     * Gets category_ids
     * @return string[]
     */
    public function getCategoryIds()
    {
        return $this->container['category_ids'];
    }

    /**
     * Sets category_ids
     * @param string[] $category_ids <msg>Yext Category IDs. A Location must have at least one and at most 10 Categories.</msg>  <msg>IDs must be valid and selectable (i.e., cannot be parent categories).</msg>  <msg>**NOTE:** The list of category IDs that you send us must be comprehensive. For example, if you send us a list of IDs that does not include IDs that you sent in your last update, Yext considers the missing categories to be deleted, and we remove them from your listings.</msg>
     * @return $this
     */
    public function setCategoryIds($category_ids)
    {
        $this->container['category_ids'] = $category_ids;

        return $this;
    }

    /**
     * Gets featured_message
     * @return string
     */
    public function getFeaturedMessage()
    {
        return $this->container['featured_message'];
    }

    /**
     * Sets featured_message
     * @param string $featured_message <msg desc=\"Call today! should not be translated\">The Featured Message. Default: Call today!</msg>  <msg>Cannot include: * inappropriate language * HTML markup * a URL or domain name * a phone number * control characters ([\\x00-\\x1F\\x7F]) * insufficient spacing</msg>  <msg>If you submit a Featured Message that contains profanity or more than 50 characters, it will be ignored. The success response will contain a warning message explaining why your Featured Message wasn't stored in the system.</msg>
     * @return $this
     */
    public function setFeaturedMessage($featured_message)
    {
        if (strlen($featured_message) > 50) {
            throw new \InvalidArgumentException('invalid length for $featured_message when calling Location., must be smaller than or equal to 50.');
        }
        $this->container['featured_message'] = $featured_message;

        return $this;
    }

    /**
     * Gets featured_message_url
     * @return string
     */
    public function getFeaturedMessageUrl()
    {
        return $this->container['featured_message_url'];
    }

    /**
     * Sets featured_message_url
     * @param string $featured_message_url <msg>Valid URL to which the Featured Message is linked</msg>
     * @return $this
     */
    public function setFeaturedMessageUrl($featured_message_url)
    {
        if (strlen($featured_message_url) > 255) {
            throw new \InvalidArgumentException('invalid length for $featured_message_url when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['featured_message_url'] = $featured_message_url;

        return $this;
    }

    /**
     * Gets website_url
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->container['website_url'];
    }

    /**
     * Sets website_url
     * @param string $website_url <msg desc=\"displayWebsiteUrl should not be translated\">The URL of the location's website. This URL will be shown on your listings unless you specify a value for **displayWebsiteUrl**.</msg>  <msg desc=\"displayWebsiteUrl should not be translated\">Must be a valid URL and is required whenever **displayWebsiteUrl** is specified</msg>
     * @return $this
     */
    public function setWebsiteUrl($website_url)
    {
        if (strlen($website_url) > 255) {
            throw new \InvalidArgumentException('invalid length for $website_url when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['website_url'] = $website_url;

        return $this;
    }

    /**
     * Gets display_website_url
     * @return string
     */
    public function getDisplayWebsiteUrl()
    {
        return $this->container['display_website_url'];
    }

    /**
     * Sets display_website_url
     * @param string $display_website_url <msg desc=\"displayWebsiteUrl and websiteUrl should not be translated\">The URL that is shown on your listings in place of **websiteUrl**. You can use **displayWebsiteUrl** to display a short, memorable web address that redirects consumers to the URL given in **websiteUrl**.</msg>  <msg desc=\"websiteUrl should not be translated\">Must be a valid URL and be specified along with **websiteUrl**</msg>
     * @return $this
     */
    public function setDisplayWebsiteUrl($display_website_url)
    {
        if (strlen($display_website_url) > 255) {
            throw new \InvalidArgumentException('invalid length for $display_website_url when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['display_website_url'] = $display_website_url;

        return $this;
    }

    /**
     * Gets reservation_url
     * @return string
     */
    public function getReservationUrl()
    {
        return $this->container['reservation_url'];
    }

    /**
     * Sets reservation_url
     * @param string $reservation_url <msg>A valid URL used for reservations at this location</msg>
     * @return $this
     */
    public function setReservationUrl($reservation_url)
    {
        if (strlen($reservation_url) > 255) {
            throw new \InvalidArgumentException('invalid length for $reservation_url when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['reservation_url'] = $reservation_url;

        return $this;
    }

    /**
     * Gets hours
     * @return string
     */
    public function getHours()
    {
        return $this->container['hours'];
    }

    /**
     * Sets hours
     * @param string $hours <msg desc=\"Describes the format of a field containing a location's hours of operation. **holidayHours** and **hours** are constants and should not be translated. closed is a constant when used as a value and should not be translated.\">Hours should be submitted as a comma-separated list of days, where each day's hours are specified as follows:  d:oh:om:ch:cm * d = day of the week –   * 1 – Sunday   * 2 – Monday   * 3 – Tuesday   * 4 – Wednesday   * 5 – Thursday   * 6 – Friday   * 7 – Saturday * oh:om = opening time in 24-hour format * ch:cm = closing time in 24-hour format  Times with single-digit hours (e.g., 9 AM) can be submitted with or without a leading zero (9:00 or 09:00).  **Example:** open 9 AM to 5 PM Monday and Tuesday, open 10 AM to 4 PM on Saturday – 2:9:00:17:00,3:9:00:17:00,7:10:00:16:00  SPECIAL CASES: * To indicate that a location is open 24 hours on a specific day, set 00:00 as both the opening and closing time for that day.   * **Example:** open all day on Saturdays – 7:00:00:00:00 * To indicate that a location is closed on a specific day, omit that day from the list or set it as closed (\"closed\" is not case sensitive).   * **Example:** closed on Sundays – 1:closed   * **NOTE:** If a location is closed seven days a week, set at least one day to closed. Otherwise, **hours** is an empty string, and we assume you are not submitting hours information for that location. * To indicate that a location has split hours on a specific day, submit a set of hours for each block of time the location is open.   * **Example:** open from 9:00 AM to 12:00 PM and again from 1:00 PM to 5:00 PM on Mondays – 2:9:00:12:00,2:13:00:17:00  **NOTE:** To set hours for specific days of the year rather than days of the week, use **holidayHours**.</msg>
     * @return $this
     */
    public function setHours($hours)
    {
        if (strlen($hours) > 255) {
            throw new \InvalidArgumentException('invalid length for $hours when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['hours'] = $hours;

        return $this;
    }

    /**
     * Gets additional_hours_text
     * @return string
     */
    public function getAdditionalHoursText()
    {
        return $this->container['additional_hours_text'];
    }

    /**
     * Sets additional_hours_text
     * @param string $additional_hours_text <msg desc=\"**hours** should not be translated\">Additional information about business hours that does not fit in **hours** (e.g., Closed during the winter)</msg>
     * @return $this
     */
    public function setAdditionalHoursText($additional_hours_text)
    {
        if (strlen($additional_hours_text) > 255) {
            throw new \InvalidArgumentException('invalid length for $additional_hours_text when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['additional_hours_text'] = $additional_hours_text;

        return $this;
    }

    /**
     * Gets holiday_hours
     * @return \Yext\Client\Model\LocationHolidayHours[]
     */
    public function getHolidayHours()
    {
        return $this->container['holiday_hours'];
    }

    /**
     * Sets holiday_hours
     * @param \Yext\Client\Model\LocationHolidayHours[] $holiday_hours <msg>Holiday hours for this location.</msg>  <msg desc=\"hours and holidayHours are constants and should not be translated\">**NOTE:** hours must be set in order for holidayHours to appear on your listings)</msg>
     * @return $this
     */
    public function setHolidayHours($holiday_hours)
    {
        $this->container['holiday_hours'] = $holiday_hours;

        return $this;
    }

    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        if (strlen($description) > 5000) {
            throw new \InvalidArgumentException('invalid length for $description when calling Location., must be smaller than or equal to 5000.');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets conditions_treated
     * @return string[]
     */
    public function getConditionsTreated()
    {
        return $this->container['conditions_treated'];
    }

    /**
     * Sets conditions_treated
     * @param string[] $conditions_treated <msg>A list of the conditions treated by the healthcare provider</msg>  <msg desc=\"locationType, HEALTHCARE_PROFESSIONAL, and HEALTHCARE_FACILITY should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL or HEALTHCARE_FACILITY.</msg>
     * @return $this
     */
    public function setConditionsTreated($conditions_treated)
    {
        $this->container['conditions_treated'] = $conditions_treated;

        return $this;
    }

    /**
     * Gets certifications
     * @return string[]
     */
    public function getCertifications()
    {
        return $this->container['certifications'];
    }

    /**
     * Sets certifications
     * @param string[] $certifications <msg>A list of the certifications held by the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setCertifications($certifications)
    {
        $this->container['certifications'] = $certifications;

        return $this;
    }

    /**
     * Gets education_list
     * @return \Yext\Client\Model\LocationEducationList[]
     */
    public function getEducationList()
    {
        return $this->container['education_list'];
    }

    /**
     * Sets education_list
     * @param \Yext\Client\Model\LocationEducationList[] $education_list <msg>A list of the types of education and training completed by the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setEducationList($education_list)
    {
        $this->container['education_list'] = $education_list;

        return $this;
    }

    /**
     * Gets admitting_hospitals
     * @return string[]
     */
    public function getAdmittingHospitals()
    {
        return $this->container['admitting_hospitals'];
    }

    /**
     * Sets admitting_hospitals
     * @param string[] $admitting_hospitals <msg>A list of hospitals where the healthcare professional admits patients</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setAdmittingHospitals($admitting_hospitals)
    {
        $this->container['admitting_hospitals'] = $admitting_hospitals;

        return $this;
    }

    /**
     * Gets accepting_new_patients
     * @return bool
     */
    public function getAcceptingNewPatients()
    {
        return $this->container['accepting_new_patients'];
    }

    /**
     * Sets accepting_new_patients
     * @param bool $accepting_new_patients <msg>Indicates whether the healthcare provider is accepting new patients</msg>  <msg desc=\"true is a constant and should not be translated\">Default is true</msg>  <msg desc=\"locationType, HEALTHCARE_PROFESSIONAL, and HEALTHCARE_FACILITY should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL or HEALTHCARE_FACILITY.</msg>
     * @return $this
     */
    public function setAcceptingNewPatients($accepting_new_patients)
    {
        $this->container['accepting_new_patients'] = $accepting_new_patients;

        return $this;
    }

    /**
     * Gets closed
     * @return \Yext\Client\Model\LocationClosed
     */
    public function getClosed()
    {
        return $this->container['closed'];
    }

    /**
     * Sets closed
     * @param \Yext\Client\Model\LocationClosed $closed
     * @return $this
     */
    public function setClosed($closed)
    {
        $this->container['closed'] = $closed;

        return $this;
    }

    /**
     * Gets payment_options
     * @return string[]
     */
    public function getPaymentOptions()
    {
        return $this->container['payment_options'];
    }

    /**
     * Sets payment_options
     * @param string[] $payment_options <msg>The payment methods accepted at this location</msg>  <msg>Valid elements depend on the location's country. For US locations, valid elements are:</msg> * AMERICANEXPRESS * CASH * CHECK * DINERSCLUB * DISCOVER * FINANCING * INVOICE * MASTERCARD * TRAVELERSCHECK * VISA
     * @return $this
     */
    public function setPaymentOptions($payment_options)
    {
        $this->container['payment_options'] = $payment_options;

        return $this;
    }

    /**
     * Gets insurance_accepted
     * @return string[]
     */
    public function getInsuranceAccepted()
    {
        return $this->container['insurance_accepted'];
    }

    /**
     * Sets insurance_accepted
     * @param string[] $insurance_accepted <msg>A list of insurance policies accepted by the healthcare provider</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setInsuranceAccepted($insurance_accepted)
    {
        $this->container['insurance_accepted'] = $insurance_accepted;

        return $this;
    }

    /**
     * Gets logo
     * @return \Yext\Client\Model\LocationPhoto
     */
    public function getLogo()
    {
        return $this->container['logo'];
    }

    /**
     * Sets logo
     * @param \Yext\Client\Model\LocationPhoto $logo
     * @return $this
     */
    public function setLogo($logo)
    {
        $this->container['logo'] = $logo;

        return $this;
    }

    /**
     * Gets photos
     * @return \Yext\Client\Model\LocationPhoto[]
     */
    public function getPhotos()
    {
        return $this->container['photos'];
    }

    /**
     * Sets photos
     * @param \Yext\Client\Model\LocationPhoto[] $photos <msg>Up to 50 Photos.</msg>  <msg>**NOTE:** The list of photos that you send us must be comprehensive. For example, if you send us a list of photos that does not include photos that you sent in your last update, Yext considers the missing photos to be deleted, and we remove them from your listings.</msg>
     * @return $this
     */
    public function setPhotos($photos)
    {
        $this->container['photos'] = $photos;

        return $this;
    }

    /**
     * Gets headshot
     * @return object
     */
    public function getHeadshot()
    {
        return $this->container['headshot'];
    }

    /**
     * Sets headshot
     * @param object $headshot <msg>A portrait of the healthcare professional</msg>  <msg desc=\"locationType and HEALTHCARE_PROFESSIONAL should not be translated\">**NOTE:** This field is only available to locations whose **locationType** is HEALTHCARE_PROFESSIONAL.</msg>
     * @return $this
     */
    public function setHeadshot($headshot)
    {
        $this->container['headshot'] = $headshot;

        return $this;
    }

    /**
     * Gets video_urls
     * @return string[]
     */
    public function getVideoUrls()
    {
        return $this->container['video_urls'];
    }

    /**
     * Sets video_urls
     * @param string[] $video_urls <msg>Valid YouTube URLs for embedding a video on some publisher sites.</msg>  <msg>**NOTE:** Currently, only the first URL in the Array appears in your listings.</msg>
     * @return $this
     */
    public function setVideoUrls($video_urls)
    {
        $this->container['video_urls'] = $video_urls;

        return $this;
    }

    /**
     * Gets instagram_handle
     * @return string
     */
    public function getInstagramHandle()
    {
        return $this->container['instagram_handle'];
    }

    /**
     * Sets instagram_handle
     * @param string $instagram_handle <msg>Valid Instagram username for the location (e.g., NewCityFiat (without the leading \"@\"))</msg>
     * @return $this
     */
    public function setInstagramHandle($instagram_handle)
    {
        $this->container['instagram_handle'] = $instagram_handle;

        return $this;
    }

    /**
     * Gets twitter_handle
     * @return string
     */
    public function getTwitterHandle()
    {
        return $this->container['twitter_handle'];
    }

    /**
     * Sets twitter_handle
     * @param string $twitter_handle <msg>Valid Twitter handle for the location (e.g., JohnSmith (without the leading '@')).</msg> <msg>If you submit an invalid Twitter handle, it will be ignored. The success response will contain a warning message explaining why your Twitter handle wasn't stored in the system.</msg>
     * @return $this
     */
    public function setTwitterHandle($twitter_handle)
    {
        if (strlen($twitter_handle) > 15) {
            throw new \InvalidArgumentException('invalid length for $twitter_handle when calling Location., must be smaller than or equal to 15.');
        }
        $this->container['twitter_handle'] = $twitter_handle;

        return $this;
    }

    /**
     * Gets google_website_override
     * @return string
     */
    public function getGoogleWebsiteOverride()
    {
        return $this->container['google_website_override'];
    }

    /**
     * Sets google_website_override
     * @param string $google_website_override <msg desc=\"Google My Business and websiteUrl should not be translated\">The URL you would like to submit to Google My Business in place of the one given in **websiteUrl** (if applicable).</msg>  <msg>For example, if you want to analyze the traffic driven by your Google listings separately from other traffic, enter the alternate URL that you will use for tracking in this field.</msg>
     * @return $this
     */
    public function setGoogleWebsiteOverride($google_website_override)
    {
        if (strlen($google_website_override) > 255) {
            throw new \InvalidArgumentException('invalid length for $google_website_override when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['google_website_override'] = $google_website_override;

        return $this;
    }

    /**
     * Gets google_cover_photo
     * @return object
     */
    public function getGoogleCoverPhoto()
    {
        return $this->container['google_cover_photo'];
    }

    /**
     * Sets google_cover_photo
     * @param object $google_cover_photo <msg>The cover photo for your business's Google profile</msg>  <msg>NOTE: Your cover photo must meet all of the following requirements: * have a 16:9 aspect ratio * be at least 480 x 270 pixels * be no more than 2120 x 1192 pixels</msg>
     * @return $this
     */
    public function setGoogleCoverPhoto($google_cover_photo)
    {
        $this->container['google_cover_photo'] = $google_cover_photo;

        return $this;
    }

    /**
     * Gets google_profile_photo
     * @return object
     */
    public function getGoogleProfilePhoto()
    {
        return $this->container['google_profile_photo'];
    }

    /**
     * Sets google_profile_photo
     * @param object $google_profile_photo <msg>The profile photo for your business's Google profile</msg>  <msg>**NOTE:** Your profile picture must meet all of the following requirements: * be a square * be at least 200 x 200 pixels * be no more than 500 x 500 pixels</msg>
     * @return $this
     */
    public function setGoogleProfilePhoto($google_profile_photo)
    {
        $this->container['google_profile_photo'] = $google_profile_photo;

        return $this;
    }

    /**
     * Gets google_preferred_photo
     * @return string
     */
    public function getGooglePreferredPhoto()
    {
        return $this->container['google_preferred_photo'];
    }

    /**
     * Sets google_preferred_photo
     * @param string $google_preferred_photo <msg>The photo Google will consider first when deciding which photo display with the location's business information on Google Maps or Search</msg>  <msg desc=\"UNSPECIFIED, COVER, PROFILE, googleCoverPhoto, and googleProfilePhoto are constants and should not be translated\">One of: * UNSPECIFIED (default) * COVER - the photo in **googleCoverPhoto** * PROFILE - the photo in **googleProfilePhoto**</msg>  <msg desc=\"googlePreferredPhoto and UNSPECIFIED should not be translated\">**NOTE:** If the value of a location's **googlePreferredPhoto** is UNSPECIFIED, **googlePreferredPhoto** will be omitted from the location's data in responses.</msg>
     * @return $this
     */
    public function setGooglePreferredPhoto($google_preferred_photo)
    {
        $this->container['google_preferred_photo'] = $google_preferred_photo;

        return $this;
    }

    /**
     * Gets google_attributes
     * @return \Yext\Client\Model\LocationGoogleAttributes[]
     */
    public function getGoogleAttributes()
    {
        return $this->container['google_attributes'];
    }

    /**
     * Sets google_attributes
     * @param \Yext\Client\Model\LocationGoogleAttributes[] $google_attributes <msg desc=\"Google My Business should not be translated\">The Google My Business attributes for this location.</msg>
     * @return $this
     */
    public function setGoogleAttributes($google_attributes)
    {
        $this->container['google_attributes'] = $google_attributes;

        return $this;
    }

    /**
     * Gets facebook_page_url
     * @return string
     */
    public function getFacebookPageUrl()
    {
        return $this->container['facebook_page_url'];
    }

    /**
     * Sets facebook_page_url
     * @param string $facebook_page_url <msg>URL for the location's Facebook Page.</msg>  <msg desc=\"Describes valid URL formats. URLs should not be translated. facebookPageUrl should not be translated\">Valid formats: * facebook.com/profile.php?id=[numId] * facebook.com/group.php?gid=[numId] * facebook.com/groups/[numId] * facebook.com/[Name] * facebook.com/pages/[Name]/[numId]  where [Name] is a String and [numId] is an Integer  If you submit a URL that is not in one of the valid formats, it will be ignored. The success response will contain a warning message explaining why the URL wasn't stored in the system.  **NOTE:** This value is automatically set to the location's Facebook Page URL. You can only manually set **facebookPageUrl** if the location meets one of the following criteria: * It is not subscribed to a Listings package that contains Facebook. * It is opted out of Facebook.</msg>
     * @return $this
     */
    public function setFacebookPageUrl($facebook_page_url)
    {
        if (strlen($facebook_page_url) > 255) {
            throw new \InvalidArgumentException('invalid length for $facebook_page_url when calling Location., must be smaller than or equal to 255.');
        }
        $this->container['facebook_page_url'] = $facebook_page_url;

        return $this;
    }

    /**
     * Gets facebook_cover_photo
     * @return object
     */
    public function getFacebookCoverPhoto()
    {
        return $this->container['facebook_cover_photo'];
    }

    /**
     * Sets facebook_cover_photo
     * @param object $facebook_cover_photo <msg>The cover photo for your business's Facebook profile  Displayed as a 851 x 315 pixel image  You must have a cover photo in order for your listing to appear on Facebook.  **NOTE:** Your cover photo must be at least 400 pixels wide.</msg>
     * @return $this
     */
    public function setFacebookCoverPhoto($facebook_cover_photo)
    {
        $this->container['facebook_cover_photo'] = $facebook_cover_photo;

        return $this;
    }

    /**
     * Gets facebook_profile_picture
     * @return object
     */
    public function getFacebookProfilePicture()
    {
        return $this->container['facebook_profile_picture'];
    }

    /**
     * Sets facebook_profile_picture
     * @param object $facebook_profile_picture <msg>The profile picture for your business's Facebook profile  You must have a profile picture in order for your listing to appear on Facebook.  **NOTE:** Your profile picture must be larger than 180 x 180 pixels.</msg>
     * @return $this
     */
    public function setFacebookProfilePicture($facebook_profile_picture)
    {
        $this->container['facebook_profile_picture'] = $facebook_profile_picture;

        return $this;
    }

    /**
     * Gets uber_link_type
     * @return string
     */
    public function getUberLinkType()
    {
        return $this->container['uber_link_type'];
    }

    /**
     * Sets uber_link_type
     * @param string $uber_link_type <msg desc=\"Uber is a company name and should not be translated\">Indicates whether the embedded Uber link for this location appears as text or a button</msg>  <msg desc=\"Uber is a company name and should not be translated\">When consumers click on this link on a mobile device, the Uber app (if installed) will open with your location set as the trip destination. If the Uber app is not installed, the consumer will be prompted to download it.</msg>
     * @return $this
     */
    public function setUberLinkType($uber_link_type)
    {
        $allowed_values = array('TEXT', 'BUTTON');
        if (!in_array($uber_link_type, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'uber_link_type', must be one of 'TEXT', 'BUTTON'");
        }
        $this->container['uber_link_type'] = $uber_link_type;

        return $this;
    }

    /**
     * Gets uber_link_text
     * @return string
     */
    public function getUberLinkText()
    {
        return $this->container['uber_link_text'];
    }

    /**
     * Sets uber_link_text
     * @param string $uber_link_text <msg desc=\"Uber is a company name and should not be translated\">The text of the embedded Uber link</msg>  <msg desc=\"'Ride there with Uber' is a constant and should not be translated\">Default is Ride there with Uber.</msg>  <msg desc=\"uberLinkType and TEXT are constants and should not be translated\">**NOTE:** This field is only available if **uberLinkType** is TEXT.</msg>
     * @return $this
     */
    public function setUberLinkText($uber_link_text)
    {
        if (strlen($uber_link_text) > 100) {
            throw new \InvalidArgumentException('invalid length for $uber_link_text when calling Location., must be smaller than or equal to 100.');
        }
        $this->container['uber_link_text'] = $uber_link_text;

        return $this;
    }

    /**
     * Gets uber_trip_branding_text
     * @return string
     */
    public function getUberTripBrandingText()
    {
        return $this->container['uber_trip_branding_text'];
    }

    /**
     * Sets uber_trip_branding_text
     * @param string $uber_trip_branding_text <msg desc=\"Uber is a company name and should not be translated\">The text of the call-to-action that will appear in the Uber app during a trip to your location (e.g., Check out our menu!)</msg>  <msg desc=\"uberTripBrandingText and uberTripBrandingUrl are constants and should not be translated\">**NOTE:** If a value for **uberTripBrandingText** is provided, a value must also be provided for **uberTripBrandingUrl**.</msg>
     * @return $this
     */
    public function setUberTripBrandingText($uber_trip_branding_text)
    {
        if (strlen($uber_trip_branding_text) > 28) {
            throw new \InvalidArgumentException('invalid length for $uber_trip_branding_text when calling Location., must be smaller than or equal to 28.');
        }
        $this->container['uber_trip_branding_text'] = $uber_trip_branding_text;

        return $this;
    }

    /**
     * Gets uber_trip_branding_url
     * @return string
     */
    public function getUberTripBrandingUrl()
    {
        return $this->container['uber_trip_branding_url'];
    }

    /**
     * Sets uber_trip_branding_url
     * @param string $uber_trip_branding_url <msg desc=\"Uber is a company name and should not be translated\">The URL that the consumer will be redirected to when tapping on the call-to-action in the Uber app during a trip to your location.</msg>  <msg desc=\"uberTripBrandingUrl and uberTripBrandingText are constants and should not be translated\">**NOTE:** If a value for **uberTripBrandingUrl** is provided, a value must also be provided for **uberTripBrandingText**.</msg>
     * @return $this
     */
    public function setUberTripBrandingUrl($uber_trip_branding_url)
    {
        $this->container['uber_trip_branding_url'] = $uber_trip_branding_url;

        return $this;
    }

    /**
     * Gets uber_client_id
     * @return string
     */
    public function getUberClientId()
    {
        return $this->container['uber_client_id'];
    }

    /**
     * Sets uber_client_id
     * @param string $uber_client_id <msg desc=\"uberTripBrandingText and uberTripBrandingUrl are constants and should not be translated\">The ID that enables **uberTripBrandingText** and **uberTripBrandingUrl**.</msg> <msg>For more information, contact your Account Manager.</msg>
     * @return $this
     */
    public function setUberClientId($uber_client_id)
    {
        $this->container['uber_client_id'] = $uber_client_id;

        return $this;
    }

    /**
     * Gets uber_embed_code
     * @return string
     */
    public function getUberEmbedCode()
    {
        return $this->container['uber_embed_code'];
    }

    /**
     * Sets uber_embed_code
     * @param string $uber_embed_code <msg desc=\"Uber is a company name and should not be translated\">The Yext-powered code that can be copied and pasted into the markup of emails or web pages where the embedded Uber link should appear</msg>
     * @return $this
     */
    public function setUberEmbedCode($uber_embed_code)
    {
        $this->container['uber_embed_code'] = $uber_embed_code;

        return $this;
    }

    /**
     * Gets uber_link
     * @return string
     */
    public function getUberLink()
    {
        return $this->container['uber_link'];
    }

    /**
     * Sets uber_link
     * @param string $uber_link <msg desc=\"Uber is a company name and should not be translated\">The Yext-powered link that can be copied and pasted into the markup of Yext Pages where the embedded Uber link should appear</msg>
     * @return $this
     */
    public function setUberLink($uber_link)
    {
        $this->container['uber_link'] = $uber_link;

        return $this;
    }

    /**
     * Gets year_established
     * @return string
     */
    public function getYearEstablished()
    {
        return $this->container['year_established'];
    }

    /**
     * Sets year_established
     * @param string $year_established <msg desc=\"Clarifies what a yearEstablished field means\">The year that this location was opened, not the number of years it was open</msg>  <msg desc=\"Constraints on the values of a field containing a year\">Minimum of 1000, maximum of current year + 10.</msg>
     * @return $this
     */
    public function setYearEstablished($year_established)
    {
        if (strlen($year_established) > 4) {
            throw new \InvalidArgumentException('invalid length for $year_established when calling Location., must be smaller than or equal to 4.');
        }
        $this->container['year_established'] = $year_established;

        return $this;
    }

    /**
     * Gets display_lat
     * @return double
     */
    public function getDisplayLat()
    {
        return $this->container['display_lat'];
    }

    /**
     * Sets display_lat
     * @param double $display_lat <msg>Longitude where the map pin should be displayed, as provided by you</msg>  <msg desc=\"Constraints on the values of a field containing a longitude\">Between -180.0 and 180.0, inclusive</msg>
     * @return $this
     */
    public function setDisplayLat($display_lat)
    {
        $this->container['display_lat'] = $display_lat;

        return $this;
    }

    /**
     * Gets routable_lat
     * @return double
     */
    public function getRoutableLat()
    {
        return $this->container['routable_lat'];
    }

    /**
     * Sets routable_lat
     * @param double $routable_lat <msg>Longitude to use for driving directions to the location, as provided by you</msg>  <msg desc=\"Constraints on the values of a field containing a longitude\">Between -180.0 and 180.0, inclusive</msg>
     * @return $this
     */
    public function setRoutableLat($routable_lat)
    {
        $this->container['routable_lat'] = $routable_lat;

        return $this;
    }

    /**
     * Gets yext_display_lat
     * @return double
     */
    public function getYextDisplayLat()
    {
        return $this->container['yext_display_lat'];
    }

    /**
     * Sets yext_display_lat
     * @param double $yext_display_lat <msg>Longitude where the map pin should be displayed, as calculated by Yext</msg>  <msg desc=\"Constraints on the values of a field containing a longitude\">Between -180.0 and 180.0, inclusive</msg>
     * @return $this
     */
    public function setYextDisplayLat($yext_display_lat)
    {
        $this->container['yext_display_lat'] = $yext_display_lat;

        return $this;
    }

    /**
     * Gets yext_routable_lat
     * @return double
     */
    public function getYextRoutableLat()
    {
        return $this->container['yext_routable_lat'];
    }

    /**
     * Sets yext_routable_lat
     * @param double $yext_routable_lat <msg>Longitude to use for driving directions to the location, as calculated by Yext</msg>  <msg desc=\"Constraints on the values of a field containing a longitude\">Between -180.0 and 180.0, inclusive</msg>
     * @return $this
     */
    public function setYextRoutableLat($yext_routable_lat)
    {
        $this->container['yext_routable_lat'] = $yext_routable_lat;

        return $this;
    }

    /**
     * Gets emails
     * @return string[]
     */
    public function getEmails()
    {
        return $this->container['emails'];
    }

    /**
     * Sets emails
     * @param string[] $emails <msg>Up to five emails addresses for reaching this location</msg>  <msg>Must be valid email addresses</msg>
     * @return $this
     */
    public function setEmails($emails)
    {
        $this->container['emails'] = $emails;

        return $this;
    }

    /**
     * Gets specialties
     * @return string[]
     */
    public function getSpecialties()
    {
        return $this->container['specialties'];
    }

    /**
     * Sets specialties
     * @param string[] $specialties <msg>Up to 100 specialties (e.g., for food and dining: Chicago style)</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setSpecialties($specialties)
    {
        $this->container['specialties'] = $specialties;

        return $this;
    }

    /**
     * Gets associations
     * @return string[]
     */
    public function getAssociations()
    {
        return $this->container['associations'];
    }

    /**
     * Sets associations
     * @param string[] $associations <msg>Up to 100 specialties (e.g., for food and dining: Chicago style)</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setAssociations($associations)
    {
        $this->container['associations'] = $associations;

        return $this;
    }

    /**
     * Gets products
     * @return string[]
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     * @param string[] $products <msg>Up to 100 products sold at this location</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setProducts($products)
    {
        $this->container['products'] = $products;

        return $this;
    }

    /**
     * Gets services
     * @return string[]
     */
    public function getServices()
    {
        return $this->container['services'];
    }

    /**
     * Sets services
     * @param string[] $services <msg>Up to 100 services offered at this location</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setServices($services)
    {
        $this->container['services'] = $services;

        return $this;
    }

    /**
     * Gets brands
     * @return string[]
     */
    public function getBrands()
    {
        return $this->container['brands'];
    }

    /**
     * Sets brands
     * @param string[] $brands <msg>Up to 100 brands sold by this location</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setBrands($brands)
    {
        $this->container['brands'] = $brands;

        return $this;
    }

    /**
     * Gets languages
     * @return string[]
     */
    public function getLanguages()
    {
        return $this->container['languages'];
    }

    /**
     * Sets languages
     * @param string[] $languages <msg>Up to 100 languages spoken at this location.</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setLanguages($languages)
    {
        $this->container['languages'] = $languages;

        return $this;
    }

    /**
     * Gets keywords
     * @return string[]
     */
    public function getKeywords()
    {
        return $this->container['keywords'];
    }

    /**
     * Sets keywords
     * @param string[] $keywords <msg>Up to 100 keywords may be provided</msg>  <msg>All strings must be non-empty when trimmed of whitespace.</msg>
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->container['keywords'] = $keywords;

        return $this;
    }

    /**
     * Gets menus_label
     * @return string
     */
    public function getMenusLabel()
    {
        return $this->container['menus_label'];
    }

    /**
     * Sets menus_label
     * @param string $menus_label <msg>Label to be used for this location’s Menu lists.</msg>
     * @return $this
     */
    public function setMenusLabel($menus_label)
    {
        $this->container['menus_label'] = $menus_label;

        return $this;
    }

    /**
     * Gets menu_ids
     * @return string[]
     */
    public function getMenuIds()
    {
        return $this->container['menu_ids'];
    }

    /**
     * Sets menu_ids
     * @param string[] $menu_ids <msg>IDs of Menu lists associated with this location.</msg>
     * @return $this
     */
    public function setMenuIds($menu_ids)
    {
        $this->container['menu_ids'] = $menu_ids;

        return $this;
    }

    /**
     * Gets bio_lists_label
     * @return string
     */
    public function getBioListsLabel()
    {
        return $this->container['bio_lists_label'];
    }

    /**
     * Sets bio_lists_label
     * @param string $bio_lists_label <msg>Label to be used for this location’s Bio lists.</msg>
     * @return $this
     */
    public function setBioListsLabel($bio_lists_label)
    {
        $this->container['bio_lists_label'] = $bio_lists_label;

        return $this;
    }

    /**
     * Gets bio_list_ids
     * @return string[]
     */
    public function getBioListIds()
    {
        return $this->container['bio_list_ids'];
    }

    /**
     * Sets bio_list_ids
     * @param string[] $bio_list_ids <msg>IDs of Bio lists associated with this location.</msg>
     * @return $this
     */
    public function setBioListIds($bio_list_ids)
    {
        $this->container['bio_list_ids'] = $bio_list_ids;

        return $this;
    }

    /**
     * Gets product_lists_label
     * @return string
     */
    public function getProductListsLabel()
    {
        return $this->container['product_lists_label'];
    }

    /**
     * Sets product_lists_label
     * @param string $product_lists_label <msg>Label to be used for this location’s Product & Services lists.</msg>
     * @return $this
     */
    public function setProductListsLabel($product_lists_label)
    {
        $this->container['product_lists_label'] = $product_lists_label;

        return $this;
    }

    /**
     * Gets product_list_ids
     * @return string[]
     */
    public function getProductListIds()
    {
        return $this->container['product_list_ids'];
    }

    /**
     * Sets product_list_ids
     * @param string[] $product_list_ids <msg>IDs of Product lists associated with this location.</msg>
     * @return $this
     */
    public function setProductListIds($product_list_ids)
    {
        $this->container['product_list_ids'] = $product_list_ids;

        return $this;
    }

    /**
     * Gets event_lists_label
     * @return string
     */
    public function getEventListsLabel()
    {
        return $this->container['event_lists_label'];
    }

    /**
     * Sets event_lists_label
     * @param string $event_lists_label <msg>Label to be used for this location’s Event lists.</msg>
     * @return $this
     */
    public function setEventListsLabel($event_lists_label)
    {
        $this->container['event_lists_label'] = $event_lists_label;

        return $this;
    }

    /**
     * Gets event_list_ids
     * @return string[]
     */
    public function getEventListIds()
    {
        return $this->container['event_list_ids'];
    }

    /**
     * Sets event_list_ids
     * @param string[] $event_list_ids <msg>IDs of Event lists associated with this location.</msg>
     * @return $this
     */
    public function setEventListIds($event_list_ids)
    {
        $this->container['event_list_ids'] = $event_list_ids;

        return $this;
    }

    /**
     * Gets folder_id
     * @return string
     */
    public function getFolderId()
    {
        return $this->container['folder_id'];
    }

    /**
     * Sets folder_id
     * @param string $folder_id <msg desc=\"folderId is a constant and should not be translated\">The folder that this location is in. If the location is in the customer-level (root) folder, its folderId will be 0. Must be a valid, existing Yext Folder ID or 0</msg>
     * @return $this
     */
    public function setFolderId($folder_id)
    {
        $this->container['folder_id'] = $folder_id;

        return $this;
    }

    /**
     * Gets label_ids
     * @return string[]
     */
    public function getLabelIds()
    {
        return $this->container['label_ids'];
    }

    /**
     * Sets label_ids
     * @param string[] $label_ids <msg>The IDs of the location labels that have been added to this location.</msg>  <msg>**NOTE:** You can only add labels that have already been created via our web interface. Currently, it is not possible to create new labels via the API.</msg>
     * @return $this
     */
    public function setLabelIds($label_ids)
    {
        $this->container['label_ids'] = $label_ids;

        return $this;
    }

    /**
     * Gets custom_fields
     * @return map[string,object]
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     * @param map[string,object] $custom_fields <msg>A set of key-value pairs indicating the location's custom fields and their values. The keys are the Yext Custom Field IDs of the custom fields, and the values are the fields' contents. If the fields' contents are options, those options must be represented by their Yext IDs.</msg>
     * @return $this
     */
    public function setCustomFields($custom_fields)
    {
        $this->container['custom_fields'] = $custom_fields;

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


