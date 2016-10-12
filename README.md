# YextClient
# Policies and Conventions  This section gives you the basic information you need to use our APIs.  ## Authentication All requests must be authenticated using an app’s API key.  <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?<b>api_key=API_KEY</b>&v=YYYYMMDD</pre>  The API key should be kept secret, as each app has exactly one API key.  ## Versioning All requests must be versioned using the v parameter.   <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?api_key=API_KEY&<b>v=YYYYMMDD</b></pre>  The **`v`** parameter (a date in `YYYYMMDD` format) is designed to give you the freedom to adapt to Yext API changes on your own schedule. When you pass this parameter, any changes we made to the API after the specified date will not affect the behavior of the request or the content of the response.  **NOTE:** Yext has the ability to make changes that affect previous versions of the API, if necessary.  ## Errors and Warnings There are three kinds of issues that can be reported for a given request:  * **`FATAL_ERROR`**     * An issue caused the entire request to be rejected. * **`NON_FATAL_ERROR`**     * An item is rejected, but other items present in the request are accepted (e.g., one invalid Product List item).      * A field is rejected, but the item otherwise is accepted (e.g., invalid website URL in a Location). * **`WARNING`**     * The request did not adhere to our best practices or recommendations, but the data was accepted anyway (e.g., data was sent that may cause some listings to become unavailable, a deprecated API was used, or we changed the format of a field's content to meet our requirements).  ## Validation Modes API v2 will support two request validation modes: *Strict Mode* and *Lenient Mode*.  In Strict Mode, both `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported simply as `FATAL_ERROR`s, and any error will cause the entire request to fail.  In Lenient Mode, `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported as such, and only `FATAL_ERROR`s will cause a request to fail.  All requests will be processed in Strict Mode by default.  To activate Lenient Mode, append the parameter `validation=lenient` to your request URLs.  ## Serialization API v2 only accepts data in JSON format.  ### Dates and times * We always use milliseconds since epoch (a.k.a. Unix time) for timestamps (e.g., review creation times, webhook update times). * We always use ISO 8601 without timezone for local date times (e.g., Event start time, Event end time). * Dates are transmitted as strings: `“YYYY-MM-DD”`.  ## Account ID In keeping with RESTful design principles, every URL in API v2 has an account ID prefix. This prefix helps to ensure that you have unique URLs for all resources.  In addition to specifying resources by explicit account ID, the following two macros are defined: * **`me`** - refers to the account that owns the API key sent with the request * **`all`** - refers to the account that owns the API key sent with the request, as well as all sub-accounts (recursively)  **IMPORTANT:** The **`me`** macro is supported in all API methods.  The **`all`** macro will only be supported in certain URLs, as noted in the reference documentation.  ### Examples This URL refers to all locations in account 123. <pre>https://api.yext.com/v2/accounts/<b>123</b>/locations?api_key=456&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456. <pre>https://api.yext.com/v2/accounts/<b>me</b>/locations?<b>api_key=456</b>&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456, as well as all locations from any of its child accounts. <pre>https://api.yext.com/v2/accounts/<b>all</b>/locations?<b>api_key=456</b>&v=20160822</pre>  ## Actor Headers To attribute changes to a particular user or employee, all requests may be passed with the following headers.  **NOTE:** If you choose to provide actor headers, and we are unable to authenticate the request using the values you provide, the request will result in an error and fail.  * Attribute activity to Admin user via admin login cookie *(for Yext’s use only)*     * Header: `YextEmployee`     * Value: Admin user’s AlphaLogin cookie * Attribute activity to Admin user via email address and password     * Headers: `YextEmployeeEmail`, `YextEmployeePassword`     * Values: Admin user’s email address, Admin user’s Admin password * Attribute activity to customer user via login cookie     * Header: `YextUser`     * Value: Customer user’s YextAppsLogin cookie * Attribute activity to customer user via email address and password     * Headers: `YextUserEmail`, `YextUserPassword`     * Values: Customer user’s email address, Customer user’s password  Changes will be logged as follows:  * App with no designated actor     * History Entry \"Updated By\" Value: `App [App ID] - ‘[App Name]’`     * Example: `App 432 - ‘Hello World App’` * App with customer user actor     * History Entry \"Updated By\" Value: `[user name] ([user email]) (App [App ID] - ‘[App Name]’)`     * Example: `Jordan Smith (jsmith@example.com) (App 432 - ‘Hello World App’)` * App with Yext employee actor## Response Format   * History Entry \"Updated By\" Value: `[employee username] (App [App ID] - ‘[App Name]’)`   * Example: `hlerman (App 432 - ‘Hello World App’)`  ## Response Format * **`meta`**     * Response metadata  * **`meta.uuid`**     * Unique ID for this request / response * **`meta.errors[]`**     * List of errors and warnings  * **`meta.errors[].code`**     * Code that uniquely identifies the error or warning  * **`meta.errors[].type`**     * One of:         * `FATAL_ERROR`         * `NON_FATAL_ERROR`         * `WARNING`     * See \"Errors and Warnings\" above for details. * **`meta.errors[].message`**     *  An explanation of the issue * **`response`**     * An explanation of the issue   Example: <pre><code> {     \"meta\": {         \"uuid\": \"bb0c7e19-4dc3-4891-bfa5-8593b1f124ad\",         \"errors\": [             {                 \"code\": ...error code...,                 \"type\": ...error, fatal error, non fatal error, or warning...,                 \"message\": ...explanation of the issue...             }         ]     },     \"response\": {         ...results...     } } </code></pre>  ## Status Codes * `200 OK`    * Either there are no errors or warnings, or the only issues are of type `WARNING`. * `207 Multi-Status`     * There are errors of type `itemError` or `fieldError` (but none of type `requestError`). * `400 Bad Request`     * A parameter is invalid, or a required parameter is missing. This includes the case where no API key is provided and the case where a resource ID is specified incorrectly in a path.     * This status is if any of the response errors are of type `requestError`. * `401 Unauthorized`     * The API key provided is invalid.     * `403 Forbidden`     * The requested information cannot be viewed by the acting user.  * `404 Not Found`     * The endpoint does not exist. * `405 Method Not Allowed`     * The request is using a method that is not allowed (e.g., POST with a GET-only endpoint). * `409 Conflict`     * The request could not be completed in its current state.     * Use the information included in the response to modify the request and retry. * `429 Too Many Requests`     * You have exceeded your rate limit / quota. * `500 Internal Server Error`     * Yext’s servers are not operating as expected. The request is likely valid but should be resent later. * `504 Timeout`     * Yext’s servers took too long to handle this request, and it timed out.  ## Quotas and Rate Limits Default quotas and rate limits are as follows.  * **Location Cloud API** *(includes Analytics, PowerListings, Location Manager, Reviews, Social, and User endpoints)*: 5,000 requests per hour * **Administrative API**: 1 qps * **Live API**: 100,000 requests per hour  **NOTE:** Webhook requests do not count towards an account’s quota.  For the most current and accurate rate-limit usage information for a particular request type, check the **`RateLimit-Remaining`** and **`RateLimit-Limit`** HTTP headers of your API responses.  If you are currently over your limit, our API will return a `429` error, and the response object returned by our API will be empty. We will also include a **`RateLimit-Reset`** header in the response, which indicates when you will have additional quota.  ## Client- vs. Yext-assigned IDs You can set the ID for the following objects when you create them. If you do not provide an ID, Yext will generate one for you.  * Account * User * Location * Bio List * Menu List * Product List * Event List * Bio List Item * Menu List Item * Product List Item * Event List Item  ## Logging All API requests are logged, and can be found in your Developer Console.  API logs are stored for 90 days.

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 0.0.2
- Build date: 2016-10-12T09:13:00.028-04:00
- Build package: class io.swagger.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.4.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/yext/yext-php-v2.git"
    }
  ],
  "require": {
    "yext/yext-php-v2": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/YextClient/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit lib/Tests
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\AnalyticsApi();
$account_id = "account_id_example"; // string | 
$body = new \Yext\Client\Model\ActivityLogRequest(); // \Yext\Client\Model\ActivityLogRequest | 

try {
    $result = $api_instance->activityLog($account_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->activityLog: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.yext.com/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AnalyticsApi* | [**activityLog**](docs/Api/AnalyticsApi.md#activitylog) | **GET** /accounts/{accountId}/analytics/activity | Activity Log
*AnalyticsApi* | [**createReports**](docs/Api/AnalyticsApi.md#createreports) | **GET** /accounts/{accountId}/analytics/reports | Create Reports
*AnalyticsApi* | [**getMaxDates**](docs/Api/AnalyticsApi.md#getmaxdates) | **GET** /accounts/{accountId}/analytics/maxdates | Max Dates
*AnalyticsApi* | [**reportStatus**](docs/Api/AnalyticsApi.md#reportstatus) | **GET** /accounts/{accountId}/analytics/standardreports/{reportId} | Report Status
*ListingsApi* | [**getPublisherSuggestion**](docs/Api/ListingsApi.md#getpublishersuggestion) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Get
*ListingsApi* | [**listListings**](docs/Api/ListingsApi.md#listlistings) | **GET** /accounts/{accountId}/powerlistings/listings | Listings: List
*ListingsApi* | [**listPublisherSuggestions**](docs/Api/ListingsApi.md#listpublishersuggestions) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions | Publisher Suggestions: List
*ListingsApi* | [**listPublishers**](docs/Api/ListingsApi.md#listpublishers) | **GET** /accounts/{accountId}/powerlistings/publishers | Publishers: List
*ListingsApi* | [**optInListings**](docs/Api/ListingsApi.md#optinlistings) | **PUT** /accounts/{accountId}/powerlistings/listings/optin | Listings: Opt In
*ListingsApi* | [**optOutListings**](docs/Api/ListingsApi.md#optoutlistings) | **PUT** /accounts/{accountId}/powerlistings/listings/optout | Listings: Opt Out
*ListingsApi* | [**updatePublisherSuggestion**](docs/Api/ListingsApi.md#updatepublishersuggestion) | **PUT** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Update
*LocationsApi* | [**createLocation**](docs/Api/LocationsApi.md#createlocation) | **POST** /accounts/{accountId}/locations | Locations: Create
*LocationsApi* | [**getBusinessCategories**](docs/Api/LocationsApi.md#getbusinesscategories) | **GET** /categories | Categories: List
*LocationsApi* | [**getCustomFields**](docs/Api/LocationsApi.md#getcustomfields) | **GET** /accounts/{accountId}/customfields | Custom Fields: List
*LocationsApi* | [**getGoogleKeywords**](docs/Api/LocationsApi.md#getgooglekeywords) | **GET** /googlefields | Google Fields: List
*LocationsApi* | [**getLocation**](docs/Api/LocationsApi.md#getlocation) | **GET** /accounts/{accountId}/locations/{locationId} | Locations: Get
*LocationsApi* | [**getLocationFolders**](docs/Api/LocationsApi.md#getlocationfolders) | **GET** /accounts/{accountId}/folders | Folders: List
*LocationsApi* | [**getLocations**](docs/Api/LocationsApi.md#getlocations) | **GET** /accounts/{accountId}/locations | Locations: List
*LocationsApi* | [**updateLocation**](docs/Api/LocationsApi.md#updatelocation) | **PUT** /accounts/{accountId}/locations/{locationId} | Locations: Update
*ReviewsApi* | [**createComment**](docs/Api/ReviewsApi.md#createcomment) | **POST** /accounts/{accountId}/reviews/{reviewId}/comments | Comments: Create
*ReviewsApi* | [**getReview**](docs/Api/ReviewsApi.md#getreview) | **GET** /accounts/{accountId}/reviews/{reviewId} | Reviews: Get
*ReviewsApi* | [**listReviews**](docs/Api/ReviewsApi.md#listreviews) | **GET** /accounts/{accountId}/reviews | Reviews: List


## Documentation For Models

 - [Activity](docs/Model/Activity.md)
 - [ActivityFilter](docs/Model/ActivityFilter.md)
 - [ActivityLogRequest](docs/Model/ActivityLogRequest.md)
 - [AnalyticsFilter](docs/Model/AnalyticsFilter.md)
 - [Category](docs/Model/Category.md)
 - [CreateReportRequestBody](docs/Model/CreateReportRequestBody.md)
 - [CustomField](docs/Model/CustomField.md)
 - [CustomOption](docs/Model/CustomOption.md)
 - [Folder](docs/Model/Folder.md)
 - [GoogleCategory](docs/Model/GoogleCategory.md)
 - [GoogleField](docs/Model/GoogleField.md)
 - [GoogleOption](docs/Model/GoogleOption.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse20010](docs/Model/InlineResponse20010.md)
 - [InlineResponse20011](docs/Model/InlineResponse20011.md)
 - [InlineResponse20011Response](docs/Model/InlineResponse20011Response.md)
 - [InlineResponse20012](docs/Model/InlineResponse20012.md)
 - [InlineResponse20013](docs/Model/InlineResponse20013.md)
 - [InlineResponse20013Response](docs/Model/InlineResponse20013Response.md)
 - [InlineResponse20014](docs/Model/InlineResponse20014.md)
 - [InlineResponse20014Response](docs/Model/InlineResponse20014Response.md)
 - [InlineResponse2001Response](docs/Model/InlineResponse2001Response.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse2002Response](docs/Model/InlineResponse2002Response.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse2003Response](docs/Model/InlineResponse2003Response.md)
 - [InlineResponse2004](docs/Model/InlineResponse2004.md)
 - [InlineResponse2004Response](docs/Model/InlineResponse2004Response.md)
 - [InlineResponse2005](docs/Model/InlineResponse2005.md)
 - [InlineResponse2005Response](docs/Model/InlineResponse2005Response.md)
 - [InlineResponse2006](docs/Model/InlineResponse2006.md)
 - [InlineResponse2006Response](docs/Model/InlineResponse2006Response.md)
 - [InlineResponse2007](docs/Model/InlineResponse2007.md)
 - [InlineResponse2007Response](docs/Model/InlineResponse2007Response.md)
 - [InlineResponse2008](docs/Model/InlineResponse2008.md)
 - [InlineResponse2009](docs/Model/InlineResponse2009.md)
 - [InlineResponse2009Response](docs/Model/InlineResponse2009Response.md)
 - [InlineResponse200Response](docs/Model/InlineResponse200Response.md)
 - [InlineResponse201](docs/Model/InlineResponse201.md)
 - [InlineResponse2011](docs/Model/InlineResponse2011.md)
 - [InlineResponseDefault](docs/Model/InlineResponseDefault.md)
 - [Listing](docs/Model/Listing.md)
 - [ListingStatusDetail](docs/Model/ListingStatusDetail.md)
 - [Location](docs/Model/Location.md)
 - [LocationClosed](docs/Model/LocationClosed.md)
 - [LocationEducationList](docs/Model/LocationEducationList.md)
 - [LocationGoogleAttributes](docs/Model/LocationGoogleAttributes.md)
 - [LocationHolidayHours](docs/Model/LocationHolidayHours.md)
 - [LocationPhoto](docs/Model/LocationPhoto.md)
 - [LocationServiceArea](docs/Model/LocationServiceArea.md)
 - [LocationType](docs/Model/LocationType.md)
 - [Publisher](docs/Model/Publisher.md)
 - [PublisherAlternateBrands](docs/Model/PublisherAlternateBrands.md)
 - [PublisherSuggestion](docs/Model/PublisherSuggestion.md)
 - [ResponseError](docs/Model/ResponseError.md)
 - [ResponseMeta](docs/Model/ResponseMeta.md)
 - [Review](docs/Model/Review.md)
 - [ReviewComment](docs/Model/ReviewComment.md)


## Documentation For Authorization


## api_key

- **Type**: API key
- **API key parameter name**: api_key
- **Location**: URL query string


## Author




