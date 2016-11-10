# Yext\Client\PowerListingsApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createDuplicate**](PowerListingsApi.md#createDuplicate) | **POST** /accounts/{accountId}/powerlistings/duplicates | Duplicates: Create (January 2017)
[**deleteDuplicate**](PowerListingsApi.md#deleteDuplicate) | **DELETE** /accounts/{accountId}/powerlistings/duplicates/{duplicateId} | Duplicates: Delete (January 2017)
[**getPublisherSuggestion**](PowerListingsApi.md#getPublisherSuggestion) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Get
[**listDuplicates**](PowerListingsApi.md#listDuplicates) | **GET** /accounts/{accountId}/powerlistings/duplicates | Duplicates: List (January 2017)
[**listListings**](PowerListingsApi.md#listListings) | **GET** /accounts/{accountId}/powerlistings/listings | Listings: List
[**listPublisherSuggestions**](PowerListingsApi.md#listPublisherSuggestions) | **GET** /accounts/{accountId}/powerlistings/publishersuggestions | Publisher Suggestions: List
[**listPublishers**](PowerListingsApi.md#listPublishers) | **GET** /accounts/{accountId}/powerlistings/publishers | Publishers: List
[**optInListings**](PowerListingsApi.md#optInListings) | **PUT** /accounts/{accountId}/powerlistings/listings/optin | Listings: Opt In
[**optOutListings**](PowerListingsApi.md#optOutListings) | **PUT** /accounts/{accountId}/powerlistings/listings/optout | Listings: Opt Out
[**suppressDuplicate**](PowerListingsApi.md#suppressDuplicate) | **PUT** /accounts/{accountId}/powerlistings/duplicates/{duplicateId} | Duplicates: Suppress (January 2017)
[**updatePublisherSuggestion**](PowerListingsApi.md#updatePublisherSuggestion) | **PUT** /accounts/{accountId}/powerlistings/publishersuggestions/{suggestionId} | Publisher Suggestions: Update


# **createDuplicate**
> \Yext\Client\Model\IdResponse createDuplicate($account_id, $v, $url, $location_ids, $publisher_ids)

Duplicates: Create (January 2017)

Creates a new Duplicate with status SUPPRESSION_REQUESTED

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$url = "url_example"; // string | URL of the Duplicate listing
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->createDuplicate($account_id, $v, $url, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->createDuplicate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **url** | **string**| URL of the Duplicate listing |
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteDuplicate**
> \Yext\Client\Model\ErrorResponse deleteDuplicate($account_id, $v, $duplicate_id)

Duplicates: Delete (January 2017)

Indicates that a Duplicate should be ignored

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$duplicate_id = "duplicate_id_example"; // string | 

try {
    $result = $api_instance->deleteDuplicate($account_id, $v, $duplicate_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->deleteDuplicate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **duplicate_id** | **string**|  |

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPublisherSuggestion**
> \Yext\Client\Model\PublisherSuggestionResponse getPublisherSuggestion($account_id, $v, $suggestion_id)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$suggestion_id = "suggestion_id_example"; // string | 

try {
    $result = $api_instance->getPublisherSuggestion($account_id, $v, $suggestion_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->getPublisherSuggestion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **suggestion_id** | **string**|  |

### Return type

[**\Yext\Client\Model\PublisherSuggestionResponse**](../Model/PublisherSuggestionResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listDuplicates**
> \Yext\Client\Model\DuplicatesResponse listDuplicates($account_id, $v, $limit, $offset, $location_ids, $publisher_ids, $statuses)

Duplicates: List (January 2017)

Retrieve Duplicates for an account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results.
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP
$statuses = array("statuses_example"); // string[] | When specified, only Duplicates with the provided statuses will be returned  **Example:** POSSIBLE_DUPLICATE,SUPPRESSION_REQUESTED

try {
    $result = $api_instance->listDuplicates($account_id, $v, $limit, $offset, $location_ids, $publisher_ids, $statuses);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->listDuplicates: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results. | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]
 **statuses** | [**string[]**](../Model/string.md)| When specified, only Duplicates with the provided statuses will be returned  **Example:** POSSIBLE_DUPLICATE,SUPPRESSION_REQUESTED | [optional]

### Return type

[**\Yext\Client\Model\DuplicatesResponse**](../Model/DuplicatesResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listListings**
> \Yext\Client\Model\ListingsResponse listListings($account_id, $v, $limit, $offset, $location_ids, $publisher_ids)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$limit = 100; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results.
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->listListings($account_id, $v, $limit, $offset, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->listListings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 100]
 **offset** | **int**| Number of results to skip. Used to page through results. | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\ListingsResponse**](../Model/ListingsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listPublisherSuggestions**
> \Yext\Client\Model\PublisherSuggestionsResponse listPublisherSuggestions($account_id, $v, $limit, $offset, $location_ids, $publisher_ids, $statuses)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results.
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP
$statuses = array("statuses_example"); // string[] | When specified, only Publisher Suggestions with the provided statuses will be returned  **Example:** WAITING_ON_CUSTOMER,EXPIRED

try {
    $result = $api_instance->listPublisherSuggestions($account_id, $v, $limit, $offset, $location_ids, $publisher_ids, $statuses);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->listPublisherSuggestions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results. | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]
 **statuses** | [**string[]**](../Model/string.md)| When specified, only Publisher Suggestions with the provided statuses will be returned  **Example:** WAITING_ON_CUSTOMER,EXPIRED | [optional]

### Return type

[**\Yext\Client\Model\PublisherSuggestionsResponse**](../Model/PublisherSuggestionsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listPublishers**
> \Yext\Client\Model\PublishersResponse listPublishers($account_id, $v, $subset)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$subset = "RELEVANT_ONLY"; // string | **ALL** - return all publishers  **RELEVANT_ONLY** - only return publishers relevant to the account based on supported countries and location types

try {
    $result = $api_instance->listPublishers($account_id, $v, $subset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->listPublishers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **subset** | **string**| **ALL** - return all publishers  **RELEVANT_ONLY** - only return publishers relevant to the account based on supported countries and location types | [optional] [default to RELEVANT_ONLY]

### Return type

[**\Yext\Client\Model\PublishersResponse**](../Model/PublishersResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optInListings**
> \Yext\Client\Model\ErrorResponse optInListings($account_id, $v, $location_ids, $publisher_ids)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->optInListings($account_id, $v, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->optInListings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **optOutListings**
> \Yext\Client\Model\ErrorResponse optOutListings($account_id, $v, $location_ids, $publisher_ids)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP

try {
    $result = $api_instance->optOutListings($account_id, $v, $location_ids, $publisher_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->optOutListings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example:** loc123,loc456,loc789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **suppressDuplicate**
> \Yext\Client\Model\ErrorResponse suppressDuplicate($account_id, $v, $duplicate_id)

Duplicates: Suppress (January 2017)

Request suppression of a Duplicate

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$duplicate_id = "duplicate_id_example"; // string | 

try {
    $result = $api_instance->suppressDuplicate($account_id, $v, $duplicate_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->suppressDuplicate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **duplicate_id** | **string**|  |

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatePublisherSuggestion**
> \Yext\Client\Model\ErrorResponse updatePublisherSuggestion($account_id, $v, $suggestion_id, $status)

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

$api_instance = new Yext\Client\Api\PowerListingsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$suggestion_id = "suggestion_id_example"; // string | 
$status = "status_example"; // string | The status of the Publisher Suggestion

try {
    $result = $api_instance->updatePublisherSuggestion($account_id, $v, $suggestion_id, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PowerListingsApi->updatePublisherSuggestion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **suggestion_id** | **string**|  |
 **status** | **string**| The status of the Publisher Suggestion |

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

