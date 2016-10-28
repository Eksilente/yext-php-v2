# YextClient
# Policies and Conventions  This section gives you the basic information you need to use our APIs.  ## Authentication All requests must be authenticated using an app’s API key.  <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?<b>api_key=API_KEY</b>&v=YYYYMMDD</pre>  The API key should be kept secret, as each app has exactly one API key.  ## Versioning All requests must be versioned using the **`v`** parameter.   <pre>GET https://api.yext.com/v2/accounts/[accountId]/locations?api_key=API_KEY&<b>v=YYYYMMDD</b></pre>  The **`v`** parameter (a date in `YYYYMMDD` format) is designed to give you the freedom to adapt to Yext API changes on your own schedule. When you pass this parameter, any changes we made to the API after the specified date will not affect the behavior of the request or the content of the response.  **NOTE:** Yext has the ability to make changes that affect previous versions of the API, if necessary.  ## Serialization API v2 only accepts data in JSON format.  ## Content-Type Headers For all requests that include a request body, the Content-Type header must be included and set to `application/json`.  ## Errors and Warnings There are three kinds of issues that can be reported for a given request:  * **`FATAL_ERROR`**     * An issue caused the entire request to be rejected. * **`NON_FATAL_ERROR`**     * An item is rejected, but other items present in the request are accepted (e.g., one invalid Product List item).      * A field is rejected, but the item otherwise is accepted (e.g., invalid website URL in a Location). * **`WARNING`**     * The request did not adhere to our best practices or recommendations, but the data was accepted anyway (e.g., data was sent that may cause some listings to become unavailable, a deprecated API was used, or we changed the format of a field's content to meet our requirements).  ## Validation Modes *(Available December 2016)*  API v2 will support two request validation modes: *Strict Mode* and *Lenient Mode*.  In Strict Mode, both `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported simply as `FATAL_ERROR`s, and any error will cause the entire request to fail.  In Lenient Mode, `FATAL_ERROR`s and `NON_FATAL_ERROR`s are reported as such, and only `FATAL_ERROR`s will cause a request to fail.  All requests will be processed in Strict Mode by default.  To activate Lenient Mode, append the parameter `validation=lenient` to your request URLs.  ### Dates and times * We always use milliseconds since epoch (a.k.a. Unix time) for timestamps (e.g., review creation times, webhook update times). * We always use ISO 8601 without timezone for local date times (e.g., Event start time, Event end time). * Dates are transmitted as strings: `“YYYY-MM-DD”`.  ## Account ID In keeping with RESTful design principles, every URL in API v2 has an account ID prefix. This prefix helps to ensure that you have unique URLs for all resources.  In addition to specifying resources by explicit account ID, the following two macros are defined: * **`me`** - refers to the account that owns the API key sent with the request * **`all`** - refers to the account that owns the API key sent with the request, as well as all sub-accounts (recursively)  **IMPORTANT:** The **`me`** macro is supported in all API methods.  The **`all`** macro will only be supported in certain URLs, as noted in the reference documentation.  ### Examples This URL refers to all locations in account 123. <pre>https://api.yext.com/v2/accounts/<b>123</b>/locations?api_key=456&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456. <pre>https://api.yext.com/v2/accounts/<b>me</b>/locations?<b>api_key=456</b>&v=20160822</pre>  This URL refers to all locations in the account that owns API key 456, as well as all locations from any of its child accounts. <pre>https://api.yext.com/v2/accounts/<b>all</b>/locations?<b>api_key=456</b>&v=20160822</pre>  ## Actor Headers *(Available December 2016)*  To attribute changes to a particular user or employee, all requests may be passed with the following headers.  **NOTE:** If you choose to provide actor headers, and we are unable to authenticate the request using the values you provide, the request will result in an error and fail.  * Attribute activity to Admin user via admin login cookie *(for Yext’s use only)*     * Header: `YextEmployee`     * Value: Admin user’s AlphaLogin cookie * Attribute activity to Admin user via email address and password     * Headers: `YextEmployeeEmail`, `YextEmployeePassword`     * Values: Admin user’s email address, Admin user’s Admin password * Attribute activity to customer user via login cookie     * Header: `YextUser`     * Value: Customer user’s YextAppsLogin cookie * Attribute activity to customer user via email address and password     * Headers: `YextUserEmail`, `YextUserPassword`     * Values: Customer user’s email address, Customer user’s password  Changes will be logged as follows:  * App with no designated actor     * History Entry \"Updated By\" Value: `App [App ID] - ‘[App Name]’`     * Example: `App 432 - ‘Hello World App’` * App with customer user actor     * History Entry \"Updated By\" Value: `[user name] ([user email]) (App [App ID] - ‘[App Name]’)`     * Example: `Jordan Smith (jsmith@example.com) (App 432 - ‘Hello World App’)` * App with Yext employee actor   * History Entry \"Updated By\" Value: `[employee username] (App [App ID] - ‘[App Name]’)`   * Example: `hlerman (App 432 - ‘Hello World App’)`  ## Response Format * **`meta`**     * Response metadata  * **`meta.uuid`**     * Unique ID for this request / response * **`meta.errors[]`**     * List of errors and warnings  * **`meta.errors[].code`**     * Code that uniquely identifies the error or warning  * **`meta.errors[].type`**     * One of:         * `FATAL_ERROR`         * `NON_FATAL_ERROR`         * `WARNING`     * See \"Errors and Warnings\" above for details. * **`meta.errors[].message`**     * An explanation of the issue * **`response`**     * The main content (body) of the response  Example: <pre><code> {     \"meta\": {         \"uuid\": \"bb0c7e19-4dc3-4891-bfa5-8593b1f124ad\",         \"errors\": [             {                 \"code\": ...error code...,                 \"type\": ...error, fatal error, non fatal error, or warning...,                 \"message\": ...explanation of the issue...             }         ]     },     \"response\": {         ...results...     } } </code></pre>  ## Status Codes * `200 OK`    * Either there are no errors or warnings, or the only issues are of type `WARNING`. * `207 Multi-Status`     * There are errors of type `itemError` or `fieldError` (but none of type `requestError`). * `400 Bad Request`     * A parameter is invalid, or a required parameter is missing. This includes the case where no API key is provided and the case where a resource ID is specified incorrectly in a path.     * This status is if any of the response errors are of type `requestError`. * `401 Unauthorized`     * The API key provided is invalid.     * `403 Forbidden`     * The requested information cannot be viewed by the acting user.  * `404 Not Found`     * The endpoint does not exist. * `405 Method Not Allowed`     * The request is using a method that is not allowed (e.g., POST with a GET-only endpoint). * `409 Conflict`     * The request could not be completed in its current state.     * Use the information included in the response to modify the request and retry. * `429 Too Many Requests`     * You have exceeded your rate limit / quota. * `500 Internal Server Error`     * Yext’s servers are not operating as expected. The request is likely valid but should be resent later. * `504 Timeout`     * Yext’s servers took too long to handle this request, and it timed out.  ## Quotas and Rate Limits Default quotas and rate limits are as follows.  * **Location Cloud API** *(includes Analytics, PowerListings®, Location Manager, Reviews, Social, and User endpoints)*: 5,000 requests per hour * **Administrative API**: 1 qps * **Live API**: 100,000 requests per hour  **NOTE:** Webhook requests do not count towards an account’s quota.  For the most current and accurate rate-limit usage information for a particular request type, check the **`RateLimit-Remaining`** and **`RateLimit-Limit`** HTTP headers of your API responses.  If you are currently over your limit, our API will return a `429` error, and the response object returned by our API will be empty. We will also include a **`RateLimit-Reset`** header in the response, which indicates when you will have additional quota.  ## Client- vs. Yext-assigned IDs You can set the ID for the following objects when you create them. If you do not provide an ID, Yext will generate one for you.  * Account * User * Location * Bio List * Menu List * Product List * Event List * Bio List Item * Menu List Item * Product List Item * Event List Item  ## Logging All API requests are logged. API logs can be found in your Developer Console and are stored for 90 days.

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 0.0.2
- Build date: 2016-10-28T13:55:33.891-04:00
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
*AnalyticsApi* | [**activityLog**](docs/Api/AnalyticsApi.md#activitylog) | **POST** /accounts/{accountId}/analytics/activity | Activity Log
*AnalyticsApi* | [**createReports**](docs/Api/AnalyticsApi.md#createreports) | **GET** /accounts/{accountId}/analytics/reports | Create Reports
*AnalyticsApi* | [**getMaxDates**](docs/Api/AnalyticsApi.md#getmaxdates) | **GET** /accounts/{accountId}/analytics/maxdates | Max Dates
*AnalyticsApi* | [**reportStatus**](docs/Api/AnalyticsApi.md#reportstatus) | **GET** /accounts/{accountId}/analytics/standardreports/{reportId} | Report Status
*LocationManagerApi* | [**createBio**](docs/Api/LocationManagerApi.md#createbio) | **POST** /accounts/{accountId}/bios | Bios: Create
*LocationManagerApi* | [**createEvent**](docs/Api/LocationManagerApi.md#createevent) | **POST** /accounts/{accountId}/locations/events | Events: Create
*LocationManagerApi* | [**createLocation**](docs/Api/LocationManagerApi.md#createlocation) | **POST** /accounts/{accountId}/locations | Locations: Create
*LocationManagerApi* | [**createMenu**](docs/Api/LocationManagerApi.md#createmenu) | **POST** /accounts/{accountId}/menus | Menus: Create
*LocationManagerApi* | [**createProduct**](docs/Api/LocationManagerApi.md#createproduct) | **POST** /accounts/{accountId}/products | Products: Create
*LocationManagerApi* | [**deleteBioList**](docs/Api/LocationManagerApi.md#deletebiolist) | **DELETE** /accounts/{accountId}/bios/{listId} | Bios: Delete
*LocationManagerApi* | [**deleteEventList**](docs/Api/LocationManagerApi.md#deleteeventlist) | **DELETE** /accounts/{accountId}/locations/events/{listId} | Events: Delete
*LocationManagerApi* | [**deleteLanguageProfile**](docs/Api/LocationManagerApi.md#deletelanguageprofile) | **DELETE** /accounts/{accountId}/locations/{locationId}/profiles/{language_code} | Language Profiles: Delete
*LocationManagerApi* | [**deleteMenuList**](docs/Api/LocationManagerApi.md#deletemenulist) | **DELETE** /accounts/{accountId}/menus/{listId} | Menus: Delete
*LocationManagerApi* | [**deleteProductList**](docs/Api/LocationManagerApi.md#deleteproductlist) | **DELETE** /accounts/{accountId}/locations/products/{listId} | Products: Delete
*LocationManagerApi* | [**getBio**](docs/Api/LocationManagerApi.md#getbio) | **GET** /accounts/{accountId}/bios/{listId} | Bios: Get
*LocationManagerApi* | [**getBios**](docs/Api/LocationManagerApi.md#getbios) | **GET** /accounts/{accountId}/bios | Bios: List
*LocationManagerApi* | [**getBusinessCategories**](docs/Api/LocationManagerApi.md#getbusinesscategories) | **GET** /categories | Categories: List
*LocationManagerApi* | [**getCustomFields**](docs/Api/LocationManagerApi.md#getcustomfields) | **GET** /accounts/{accountId}/customfields | Custom Fields: List
*LocationManagerApi* | [**getEvent**](docs/Api/LocationManagerApi.md#getevent) | **GET** /accounts/{accountId}/locations/events/{listId} | Events: Get
*LocationManagerApi* | [**getEvents**](docs/Api/LocationManagerApi.md#getevents) | **GET** /accounts/{accountId}/locations/events | Events: List
*LocationManagerApi* | [**getGoogleKeywords**](docs/Api/LocationManagerApi.md#getgooglekeywords) | **GET** /googlefields | Google Fields: List
*LocationManagerApi* | [**getLanguageProfile**](docs/Api/LocationManagerApi.md#getlanguageprofile) | **GET** /accounts/{accountId}/locations/{locationId}/profiles/{language_code} | Language Profiles: Get
*LocationManagerApi* | [**getLanguageProfiles**](docs/Api/LocationManagerApi.md#getlanguageprofiles) | **GET** /accounts/{accountId}/locations/{locationId}/profiles | Language Profiles: List
*LocationManagerApi* | [**getLocation**](docs/Api/LocationManagerApi.md#getlocation) | **GET** /accounts/{accountId}/locations/{locationId} | Locations: Get
*LocationManagerApi* | [**getLocationFolders**](docs/Api/LocationManagerApi.md#getlocationfolders) | **GET** /accounts/{accountId}/folders | Folders: List
*LocationManagerApi* | [**getLocations**](docs/Api/LocationManagerApi.md#getlocations) | **GET** /accounts/{accountId}/locations | Locations: List
*LocationManagerApi* | [**getMenu**](docs/Api/LocationManagerApi.md#getmenu) | **GET** /accounts/{accountId}/menus/{listId} | Menus: Get
*LocationManagerApi* | [**getMenus**](docs/Api/LocationManagerApi.md#getmenus) | **GET** /accounts/{accountId}/menus | Menus: List
*LocationManagerApi* | [**getProduct**](docs/Api/LocationManagerApi.md#getproduct) | **GET** /accounts/{accountId}/locations/products/{listId} | Products: Get
*LocationManagerApi* | [**getProducts**](docs/Api/LocationManagerApi.md#getproducts) | **GET** /accounts/{accountId}/products | Products: List
*LocationManagerApi* | [**updateBio**](docs/Api/LocationManagerApi.md#updatebio) | **PUT** /accounts/{accountId}/bios/{listId} | Bios: Update
*LocationManagerApi* | [**updateEvent**](docs/Api/LocationManagerApi.md#updateevent) | **PUT** /accounts/{accountId}/locations/events/{listId} | Events: Update
*LocationManagerApi* | [**updateLocation**](docs/Api/LocationManagerApi.md#updatelocation) | **PUT** /accounts/{accountId}/locations/{locationId} | Locations: Update
*LocationManagerApi* | [**updateMenu**](docs/Api/LocationManagerApi.md#updatemenu) | **PUT** /accounts/{accountId}/menus/{listId} | Menus: Update
*LocationManagerApi* | [**updateProduct**](docs/Api/LocationManagerApi.md#updateproduct) | **PUT** /accounts/{accountId}/locations/products/{listId} | Products: Update
*LocationManagerApi* | [**upsertLanguageProfile**](docs/Api/LocationManagerApi.md#upsertlanguageprofile) | **PUT** /accounts/{accountId}/locations/{locationId}/profiles/{language_code} | Language Profiles: Upsert
*PowerListingsApi* | [**createDuplicate**](docs/Api/PowerListingsApi.md#createduplicate) | **POST** /accounts/{accountId}/powerlistings/duplicates | Duplicates: Create
*PowerListingsApi* | [**deleteDuplicate**](docs/Api/PowerListingsApi.md#deleteduplicate) | **DELETE** /accounts/{accountId}/powerlistings/duplicates/{duplicateId} | Duplicates: Delete
*PowerListingsApi* | [**getPublisherSuggestion**](docs/Api/PowerListingsApi.md#getpublishersuggestion) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Get
*PowerListingsApi* | [**listDuplicates**](docs/Api/PowerListingsApi.md#listduplicates) | **GET** /accounts/{accountId}/powerlistings/duplicates | Duplicates: List
*PowerListingsApi* | [**listListings**](docs/Api/PowerListingsApi.md#listlistings) | **GET** /accounts/{accountId}/powerlistings/listings | Listings: List
*PowerListingsApi* | [**listPublisherSuggestions**](docs/Api/PowerListingsApi.md#listpublishersuggestions) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions | Publisher Suggestions: List
*PowerListingsApi* | [**listPublishers**](docs/Api/PowerListingsApi.md#listpublishers) | **GET** /accounts/{accountId}/powerlistings/publishers | Publishers: List
*PowerListingsApi* | [**optInListings**](docs/Api/PowerListingsApi.md#optinlistings) | **PUT** /accounts/{accountId}/powerlistings/listings/optin | Listings: Opt In
*PowerListingsApi* | [**optOutListings**](docs/Api/PowerListingsApi.md#optoutlistings) | **PUT** /accounts/{accountId}/powerlistings/listings/optout | Listings: Opt Out
*PowerListingsApi* | [**suppressDuplicate**](docs/Api/PowerListingsApi.md#suppressduplicate) | **PUT** /accounts/{accountId}/powerlistings/duplicates/{duplicateId} | Duplicates: Suppress
*PowerListingsApi* | [**updatePublisherSuggestion**](docs/Api/PowerListingsApi.md#updatepublishersuggestion) | **PUT** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Update
*ReviewsApi* | [**createComment**](docs/Api/ReviewsApi.md#createcomment) | **POST** /accounts/{accountId}/reviews/{reviewId}/comments | Comments: Create
*ReviewsApi* | [**getReview**](docs/Api/ReviewsApi.md#getreview) | **GET** /accounts/{accountId}/reviews/{reviewId} | Reviews: Get
*ReviewsApi* | [**listReviews**](docs/Api/ReviewsApi.md#listreviews) | **GET** /accounts/{accountId}/reviews | Reviews: List
*SocialApi* | [**createComment**](docs/Api/SocialApi.md#createcomment) | **POST** /accounts/{accountId}/posts/{postId}/comments | Comments: create
*SocialApi* | [**createPosts**](docs/Api/SocialApi.md#createposts) | **POST** /accounts/{accountId}/posts | Posts: create
*SocialApi* | [**deleteComment**](docs/Api/SocialApi.md#deletecomment) | **DELETE** /accounts/{accountId}/posts/{postId}/comments/{commentId} | Comments: delete
*SocialApi* | [**deletePost**](docs/Api/SocialApi.md#deletepost) | **DELETE** /accounts/{accountId}/posts/{postId} | Posts: delete
*SocialApi* | [**getComments**](docs/Api/SocialApi.md#getcomments) | **GET** /accounts/{accountId}/posts/{postId}/comments | Comments: list
*SocialApi* | [**getLinkedAccount**](docs/Api/SocialApi.md#getlinkedaccount) | **GET** /accounts/{accountId}/linkedaccounts/{linkedAccountId} | Linked Accounts: get
*SocialApi* | [**getLinkedAccounts**](docs/Api/SocialApi.md#getlinkedaccounts) | **GET** /accounts/{accountId}/linkedaccounts | Linked Accounts: list
*SocialApi* | [**getPosts**](docs/Api/SocialApi.md#getposts) | **GET** /accounts/{accountId}/posts | Posts: List
*SocialApi* | [**updateComment**](docs/Api/SocialApi.md#updatecomment) | **PUT** /accounts/{accountId}/posts/{postId}/comments/{commentId} | Comments: update
*SocialApi* | [**updateLinkedAccount**](docs/Api/SocialApi.md#updatelinkedaccount) | **PUT** /accounts/{accountId}/linkedaccounts/{linkedAccountId} | Linked Accounts: update
*UserApi* | [**createUser**](docs/Api/UserApi.md#createuser) | **POST** /accounts/{accountId}/users | Users: Create
*UserApi* | [**deleteUser**](docs/Api/UserApi.md#deleteuser) | **DELETE** /accounts/{accountId}/users/{userId} | Users: Delete
*UserApi* | [**getLinkOptimizationTask**](docs/Api/UserApi.md#getlinkoptimizationtask) | **GET** /accounts/{accountId}/optimizationlink | Optimization Tasks: Get Link
*UserApi* | [**getOptimizationTasks**](docs/Api/UserApi.md#getoptimizationtasks) | **GET** /accounts/{accountId}/optimizationtasks | Optimization Tasks: List
*UserApi* | [**getRoles**](docs/Api/UserApi.md#getroles) | **GET** /accounts/{accountId}/roles | Roles: Get
*UserApi* | [**getUser**](docs/Api/UserApi.md#getuser) | **GET** /accounts/{accountId}/users/{userId} | Users: Get
*UserApi* | [**getUsers**](docs/Api/UserApi.md#getusers) | **GET** /accounts/{accountId}/users | Users: List
*UserApi* | [**updateUser**](docs/Api/UserApi.md#updateuser) | **PUT** /accounts/{accountId}/users/{userId} | Users: Update


## Documentation For Models

 - [Activity](docs/Model/Activity.md)
 - [ActivityFilter](docs/Model/ActivityFilter.md)
 - [ActivityLogRequest](docs/Model/ActivityLogRequest.md)
 - [AnalyticsFilter](docs/Model/AnalyticsFilter.md)
 - [Author](docs/Model/Author.md)
 - [BaseEcl](docs/Model/BaseEcl.md)
 - [BaseEclItem](docs/Model/BaseEclItem.md)
 - [BaseEclSection](docs/Model/BaseEclSection.md)
 - [Bio](docs/Model/Bio.md)
 - [BioItem](docs/Model/BioItem.md)
 - [BioSection](docs/Model/BioSection.md)
 - [Calories](docs/Model/Calories.md)
 - [Category](docs/Model/Category.md)
 - [ContentListCost](docs/Model/ContentListCost.md)
 - [ContentListCostOption](docs/Model/ContentListCostOption.md)
 - [ContentListPhoto](docs/Model/ContentListPhoto.md)
 - [CreateReportRequestBody](docs/Model/CreateReportRequestBody.md)
 - [CustomField](docs/Model/CustomField.md)
 - [CustomOption](docs/Model/CustomOption.md)
 - [Duplicate](docs/Model/Duplicate.md)
 - [DuplicateUnavailableReason](docs/Model/DuplicateUnavailableReason.md)
 - [Event](docs/Model/Event.md)
 - [EventItem](docs/Model/EventItem.md)
 - [EventSection](docs/Model/EventSection.md)
 - [Folder](docs/Model/Folder.md)
 - [GoogleCategory](docs/Model/GoogleCategory.md)
 - [GoogleField](docs/Model/GoogleField.md)
 - [GoogleOption](docs/Model/GoogleOption.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse20010](docs/Model/InlineResponse20010.md)
 - [InlineResponse20010Response](docs/Model/InlineResponse20010Response.md)
 - [InlineResponse20011](docs/Model/InlineResponse20011.md)
 - [InlineResponse20012](docs/Model/InlineResponse20012.md)
 - [InlineResponse20013](docs/Model/InlineResponse20013.md)
 - [InlineResponse20013Response](docs/Model/InlineResponse20013Response.md)
 - [InlineResponse20014](docs/Model/InlineResponse20014.md)
 - [InlineResponse20014Response](docs/Model/InlineResponse20014Response.md)
 - [InlineResponse20015](docs/Model/InlineResponse20015.md)
 - [InlineResponse20015Response](docs/Model/InlineResponse20015Response.md)
 - [InlineResponse20016](docs/Model/InlineResponse20016.md)
 - [InlineResponse20016Response](docs/Model/InlineResponse20016Response.md)
 - [InlineResponse20017](docs/Model/InlineResponse20017.md)
 - [InlineResponse20017Response](docs/Model/InlineResponse20017Response.md)
 - [InlineResponse20018](docs/Model/InlineResponse20018.md)
 - [InlineResponse20018Response](docs/Model/InlineResponse20018Response.md)
 - [InlineResponse20019](docs/Model/InlineResponse20019.md)
 - [InlineResponse20019Response](docs/Model/InlineResponse20019Response.md)
 - [InlineResponse2001Response](docs/Model/InlineResponse2001Response.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse20020](docs/Model/InlineResponse20020.md)
 - [InlineResponse20020Response](docs/Model/InlineResponse20020Response.md)
 - [InlineResponse20021](docs/Model/InlineResponse20021.md)
 - [InlineResponse20021Response](docs/Model/InlineResponse20021Response.md)
 - [InlineResponse20022](docs/Model/InlineResponse20022.md)
 - [InlineResponse20023](docs/Model/InlineResponse20023.md)
 - [InlineResponse20023Response](docs/Model/InlineResponse20023Response.md)
 - [InlineResponse20024](docs/Model/InlineResponse20024.md)
 - [InlineResponse20025](docs/Model/InlineResponse20025.md)
 - [InlineResponse20025Response](docs/Model/InlineResponse20025Response.md)
 - [InlineResponse20026](docs/Model/InlineResponse20026.md)
 - [InlineResponse20026Response](docs/Model/InlineResponse20026Response.md)
 - [InlineResponse20027](docs/Model/InlineResponse20027.md)
 - [InlineResponse20028](docs/Model/InlineResponse20028.md)
 - [InlineResponse20028Response](docs/Model/InlineResponse20028Response.md)
 - [InlineResponse20029](docs/Model/InlineResponse20029.md)
 - [InlineResponse20029Response](docs/Model/InlineResponse20029Response.md)
 - [InlineResponse2002Response](docs/Model/InlineResponse2002Response.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse20030](docs/Model/InlineResponse20030.md)
 - [InlineResponse20030Response](docs/Model/InlineResponse20030Response.md)
 - [InlineResponse20031](docs/Model/InlineResponse20031.md)
 - [InlineResponse20031Response](docs/Model/InlineResponse20031Response.md)
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
 - [InlineResponse2008Response](docs/Model/InlineResponse2008Response.md)
 - [InlineResponse2009](docs/Model/InlineResponse2009.md)
 - [InlineResponse2009Response](docs/Model/InlineResponse2009Response.md)
 - [InlineResponse200Response](docs/Model/InlineResponse200Response.md)
 - [InlineResponse201](docs/Model/InlineResponse201.md)
 - [InlineResponse2011](docs/Model/InlineResponse2011.md)
 - [InlineResponse2011Response](docs/Model/InlineResponse2011Response.md)
 - [InlineResponse2012](docs/Model/InlineResponse2012.md)
 - [InlineResponse2013](docs/Model/InlineResponse2013.md)
 - [InlineResponse2014](docs/Model/InlineResponse2014.md)
 - [InlineResponse2014Response](docs/Model/InlineResponse2014Response.md)
 - [InlineResponse2015](docs/Model/InlineResponse2015.md)
 - [InlineResponse2016](docs/Model/InlineResponse2016.md)
 - [InlineResponseDefault](docs/Model/InlineResponseDefault.md)
 - [LinkedAccount](docs/Model/LinkedAccount.md)
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
 - [Menu](docs/Model/Menu.md)
 - [MenuItem](docs/Model/MenuItem.md)
 - [MenuSection](docs/Model/MenuSection.md)
 - [OptimizationTask](docs/Model/OptimizationTask.md)
 - [Photos](docs/Model/Photos.md)
 - [PostEntry](docs/Model/PostEntry.md)
 - [Product](docs/Model/Product.md)
 - [ProductItem](docs/Model/ProductItem.md)
 - [ProductSection](docs/Model/ProductSection.md)
 - [Publisher](docs/Model/Publisher.md)
 - [PublisherAlternateBrands](docs/Model/PublisherAlternateBrands.md)
 - [PublisherSuggestion](docs/Model/PublisherSuggestion.md)
 - [ResponseError](docs/Model/ResponseError.md)
 - [ResponseMeta](docs/Model/ResponseMeta.md)
 - [Review](docs/Model/Review.md)
 - [ReviewComment](docs/Model/ReviewComment.md)
 - [Role](docs/Model/Role.md)
 - [Url](docs/Model/Url.md)
 - [User](docs/Model/User.md)
 - [UserAcl](docs/Model/UserAcl.md)
 - [Video](docs/Model/Video.md)


## Documentation For Authorization


## api_key

- **Type**: API key
- **API key parameter name**: api_key
- **Location**: URL query string


## Author




