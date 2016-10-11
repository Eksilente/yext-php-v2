# Yext\Client\ListingsApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPublisherSuggestion**](ListingsApi.md#getPublisherSuggestion) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Get
[**listListings**](ListingsApi.md#listListings) | **GET** /accounts/{accountId}/powerlistings/listings | Listings: List
[**listPublisherSuggestions**](ListingsApi.md#listPublisherSuggestions) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions | Publisher Suggestions: List
[**listPublishers**](ListingsApi.md#listPublishers) | **GET** /accounts/{accountId}/powerlistings/publishers | Publishers: List
[**optInListings**](ListingsApi.md#optInListings) | **PUT** /accounts/{accountId}/powerlistings/listings/optin | Listings: Opt In
[**optOutListings**](ListingsApi.md#optOutListings) | **PUT** /accounts/{accountId}/powerlistings/listings/optout | Listings: Opt Out
[**updatePublisherSuggestion**](ListingsApi.md#updatePublisherSuggestion) | **PUT** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Update


# **getPublisherSuggestion**
> \Yext\Client\Model\InlineResponse2006 getPublisherSuggestion($account_id, $v, $suggestion_id)

Publisher Suggestions: Get

Fetches details of a specific Publisher Suggestion

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$suggestion_id = "suggestion_id_example"; // string | 

try {
    $result = $api_instance->getPublisherSuggestion($account_id, $v, $suggestion_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->getPublisherSuggestion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **suggestion_id** | **string**|  |

### Return type

[**\Yext\Client\Model\InlineResponse2006**](../Model/InlineResponse2006.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listListings**
> \Yext\Client\Model\InlineResponse2003 listListings($account_id, $v, $limit, $offset, $location_ids, $publisher_ids)

Listings: List

Retrieve all Listings matching the given criteria including status and reasons why a Listing may be unavailable

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$limit = 20; // int | Number of results to return
$offset = "0"; // string | Number of results to skip. Used to page through results
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->listListings($account_id, $v, $limit, $offset, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->listListings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **limit** | **int**| Number of results to return | [optional] [default to 20]
 **offset** | **string**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listPublisherSuggestions**
> \Yext\Client\Model\InlineResponse2005 listPublisherSuggestions($account_id, $v, $limit, $offset, $location_ids, $publisher_ids, $statuses)

Publisher Suggestions: List

Retrieve suggestions publishers have submitted for the Locations in an account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = "0"; // string | Number of results to skip. Used to page through results
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP
$statuses = array("statuses_example"); // string[] | When specified, only Publisher Suggestions with the provided statuses will be returned  **Example:** PENDING,EXPIRED

try {
    $result = $api_instance->listPublisherSuggestions($account_id, $v, $limit, $offset, $location_ids, $publisher_ids, $statuses);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->listPublisherSuggestions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **string**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP | [optional]
 **statuses** | [**string[]**](../Model/string.md)| When specified, only Publisher Suggestions with the provided statuses will be returned  **Example:** PENDING,EXPIRED | [optional]

### Return type

[**\Yext\Client\Model\InlineResponse2005**](../Model/InlineResponse2005.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listPublishers**
> \Yext\Client\Model\InlineResponse2004 listPublishers($account_id, $v, $subset)

Publishers: List

Retrieve list of Publishers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$subset = "RELEVANT_ONLY"; // string | **ALL** - return all publishers  **RELEVANT_ONLY** - only return publishers relevant to the account based on supported countries and location types

try {
    $result = $api_instance->listPublishers($account_id, $v, $subset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->listPublishers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **subset** | **string**| **ALL** - return all publishers  **RELEVANT_ONLY** - only return publishers relevant to the account based on supported countries and location types | [optional] [default to RELEVANT_ONLY]

### Return type

[**\Yext\Client\Model\InlineResponse2004**](../Model/InlineResponse2004.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optInListings**
> \Yext\Client\Model\InlineResponseDefault optInListings($account_id, $v, $location_ids, $publisher_ids)

Listings: Opt In

Opts designated locations into designated publishers  **NOTE:** The number of Location IDs multiplied by the number of Publisher IDs is capped at 100. If you exceed this, you will receive a 400 error response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->optInListings($account_id, $v, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->optInListings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optOutListings**
> \Yext\Client\Model\InlineResponseDefault optOutListings($account_id, $v, $location_ids, $publisher_ids)

Listings: Opt Out

Opts designated locations out of designated publishers  **NOTE:** The number of Location IDs multiplied by the number of Publisher IDs is capped at 100. If you exceed this, you will receive a 400 error response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->optOutListings($account_id, $v, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->optOutListings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| Defaults to all publishers subscribed by account  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatePublisherSuggestion**
> \Yext\Client\Model\InlineResponseDefault updatePublisherSuggestion($account_id, $v, $suggestion_id, $status)

Publisher Suggestions: Update

Accept or reject a Publisher Suggestion

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ListingsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$suggestion_id = "suggestion_id_example"; // string | 
$status = "status_example"; // string | The status of the Publisher Suggestion

try {
    $result = $api_instance->updatePublisherSuggestion($account_id, $v, $suggestion_id, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ListingsApi->updatePublisherSuggestion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **suggestion_id** | **string**|  |
 **status** | **string**| The status of the Publisher Suggestion |

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

