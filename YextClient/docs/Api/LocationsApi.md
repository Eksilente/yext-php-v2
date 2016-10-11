# Yext\Client\LocationsApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createLocation**](LocationsApi.md#createLocation) | **POST** /accounts/{accountId}/locations | Locations: Create
[**getBusinessCategories**](LocationsApi.md#getBusinessCategories) | **GET** /categories | Categories: List
[**getCustomFields**](LocationsApi.md#getCustomFields) | **GET** /accounts/{accountId}/customfields | Custom Fields: List
[**getGoogleKeywords**](LocationsApi.md#getGoogleKeywords) | **GET** /googlefields | Google Fields: List
[**getLocation**](LocationsApi.md#getLocation) | **GET** /accounts/{accountId}/locations/{locationId} | Locations: Get
[**getLocationFolders**](LocationsApi.md#getLocationFolders) | **GET** /accounts/{accountId}/folders | Folders: List
[**getLocations**](LocationsApi.md#getLocations) | **GET** /accounts/{accountId}/locations | Locations: List
[**updateLocation**](LocationsApi.md#updateLocation) | **PUT** /accounts/{accountId}/locations/{locationId} | Locations: Update


# **createLocation**
> \Yext\Client\Model\InlineResponse201 createLocation($account_id, $v, $location_request)

Locations: Create

Create a new Location

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$location_request = new \Yext\Client\Model\Location(); // \Yext\Client\Model\Location | 

try {
    $result = $api_instance->createLocation($account_id, $v, $location_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->createLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **location_request** | [**\Yext\Client\Model\Location**](../Model/\Yext\Client\Model\Location.md)|  |

### Return type

[**\Yext\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBusinessCategories**
> \Yext\Client\Model\InlineResponse2007 getBusinessCategories($v, $language, $country)

Categories: List

Get available Categories.  All Locations are required to have an associated Category to assist with organization and search. Yext provides a hierarchy of business categories for this purpose, exposed by this API.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$v = "v_example"; // string | A date in `YYYYMMDD` format
$language = "en"; // string | Only categories that apply to this language will be returned.
$country = "us"; // string | Only categories that apply in this country will be returned.

try {
    $result = $api_instance->getBusinessCategories($v, $language, $country);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getBusinessCategories: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **language** | **string**| Only categories that apply to this language will be returned. | [optional] [default to en]
 **country** | **string**| Only categories that apply in this country will be returned. | [optional] [default to us]

### Return type

[**\Yext\Client\Model\InlineResponse2007**](../Model/InlineResponse2007.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCustomFields**
> \Yext\Client\Model\InlineResponse200 getCustomFields($v, $account_id, $offset, $limit)

Custom Fields: List

Returns a list of Custom Fields in an Account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$v = "v_example"; // string | A date in `YYYYMMDD` format
$account_id = "account_id_example"; // string | 
$offset = "0"; // string | Number of results to skip. Used to page through results
$limit = 100; // int | Number of results to return

try {
    $result = $api_instance->getCustomFields($v, $account_id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **account_id** | **string**|  |
 **offset** | **string**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **limit** | **int**| Number of results to return | [optional] [default to 100]

### Return type

[**\Yext\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getGoogleKeywords**
> \Yext\Client\Model\InlineResponse2008 getGoogleKeywords($v)

Google Fields: List

Use the Google Attributes API to retrieve a complete list of Google's location attributes for each business category. This list includes attributes that may not apply to all Partner Locations in an account. The attributes available to a Partner Location depends on its primary business category. You can view and edit the attributes of Partner Locationsvia the googleKeywords field in the Locations API.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$v = "v_example"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getGoogleKeywords($v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getGoogleKeywords: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |

### Return type

[**\Yext\Client\Model\InlineResponse2008**](../Model/InlineResponse2008.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLocation**
> \Yext\Client\Model\InlineResponse201 getLocation($account_id, $location_id, $v)

Locations: Get

Gets the primary profile for a single Location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getLocation($account_id, $location_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |

### Return type

[**\Yext\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLocationFolders**
> \Yext\Client\Model\InlineResponse2001 getLocationFolders($account_id, $v, $offset, $limit)

Folders: List

Returns a list of Location Folders in an Account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$offset = "0"; // string | Number of results to skip. Used to page through results
$limit = 100; // int | Number of results to return

try {
    $result = $api_instance->getLocationFolders($account_id, $v, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getLocationFolders: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **offset** | **string**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **limit** | **int**| Number of results to return | [optional] [default to 100]

### Return type

[**\Yext\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLocations**
> \Yext\Client\Model\InlineResponse2002 getLocations($account_id, $v, $limit, $offset)

Locations: List

Get multiple Locations (primary profiles only).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$account_id = "account_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = "0"; // string | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getLocations($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getLocations: ', $e->getMessage(), PHP_EOL;
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

### Return type

[**\Yext\Client\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateLocation**
> \Yext\Client\Model\InlineResponse201 updateLocation($account_id, $location_id, $v, $location_request)

Locations: Update

Updates the primary profile for a Location.  **NOTE:** Despite using the PUT method, Locations: Update only updates supplied fields. Omitted fields are not modified.  **NOTE:** The Location's primary profile language can be changed by calling this endpoint with a different, but unused, language code.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationsApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$v = "v_example"; // string | A date in `YYYYMMDD` format
$location_request = new \Yext\Client\Model\Location(); // \Yext\Client\Model\Location | 

try {
    $result = $api_instance->updateLocation($account_id, $location_id, $v, $location_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->updateLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format |
 **location_request** | [**\Yext\Client\Model\Location**](../Model/\Yext\Client\Model\Location.md)|  |

### Return type

[**\Yext\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

