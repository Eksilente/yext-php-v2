# Yext\Client\LocationManagerApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBio**](LocationManagerApi.md#createBio) | **POST** /accounts/{accountId}/bios | Bios: Create
[**createEvent**](LocationManagerApi.md#createEvent) | **POST** /accounts/{accountId}/locations/events | Events: Create
[**createLocation**](LocationManagerApi.md#createLocation) | **POST** /accounts/{accountId}/locations | Locations: Create
[**createMenu**](LocationManagerApi.md#createMenu) | **POST** /accounts/{accountId}/menus | Menus: Create
[**createProduct**](LocationManagerApi.md#createProduct) | **POST** /accounts/{accountId}/products | Products: Create
[**deleteBioList**](LocationManagerApi.md#deleteBioList) | **DELETE** /accounts/{accountId}/bios/{listId} | Bios: Delete
[**deleteEventList**](LocationManagerApi.md#deleteEventList) | **DELETE** /accounts/{accountId}/locations/events/{listId} | Events: Delete
[**deleteLanguageProfile**](LocationManagerApi.md#deleteLanguageProfile) | **DELETE** /accounts/{accountId}/locations/{locationId}/profiles/{language_code} | Language Profiles: Delete
[**deleteMenuList**](LocationManagerApi.md#deleteMenuList) | **DELETE** /accounts/{accountId}/menus/{listId} | Menus: Delete
[**deleteProductList**](LocationManagerApi.md#deleteProductList) | **DELETE** /accounts/{accountId}/locations/products/{listId} | Products: Delete
[**getBio**](LocationManagerApi.md#getBio) | **GET** /accounts/{accountId}/bios/{listId} | Bios: Get
[**getBios**](LocationManagerApi.md#getBios) | **GET** /accounts/{accountId}/bios | Bios: List
[**getBusinessCategories**](LocationManagerApi.md#getBusinessCategories) | **GET** /categories | Categories: List
[**getCustomFields**](LocationManagerApi.md#getCustomFields) | **GET** /accounts/{accountId}/customfields | Custom Fields: List
[**getEvent**](LocationManagerApi.md#getEvent) | **GET** /accounts/{accountId}/locations/events/{listId} | Events: Get
[**getEvents**](LocationManagerApi.md#getEvents) | **GET** /accounts/{accountId}/locations/events | Events: List
[**getGoogleKeywords**](LocationManagerApi.md#getGoogleKeywords) | **GET** /googlefields | Google Fields: List
[**getLanguageProfile**](LocationManagerApi.md#getLanguageProfile) | **GET** /accounts/{accountId}/locations/{locationId}/profiles/{language_code} | Language Profiles: Get
[**getLanguageProfiles**](LocationManagerApi.md#getLanguageProfiles) | **GET** /accounts/{accountId}/locations/{locationId}/profiles | Language Profiles: List
[**getLocation**](LocationManagerApi.md#getLocation) | **GET** /accounts/{accountId}/locations/{locationId} | Locations: Get
[**getLocationFolders**](LocationManagerApi.md#getLocationFolders) | **GET** /accounts/{accountId}/folders | Folders: List
[**getLocations**](LocationManagerApi.md#getLocations) | **GET** /accounts/{accountId}/locations | Locations: List
[**getMenu**](LocationManagerApi.md#getMenu) | **GET** /accounts/{accountId}/menus/{listId} | Menus: Get
[**getMenus**](LocationManagerApi.md#getMenus) | **GET** /accounts/{accountId}/menus | Menus: List
[**getProduct**](LocationManagerApi.md#getProduct) | **GET** /accounts/{accountId}/locations/products/{listId} | Products: Get
[**getProducts**](LocationManagerApi.md#getProducts) | **GET** /accounts/{accountId}/products | Products: List
[**updateBio**](LocationManagerApi.md#updateBio) | **PUT** /accounts/{accountId}/bios/{listId} | Bios: Update
[**updateEvent**](LocationManagerApi.md#updateEvent) | **PUT** /accounts/{accountId}/locations/events/{listId} | Events: Update
[**updateLocation**](LocationManagerApi.md#updateLocation) | **PUT** /accounts/{accountId}/locations/{locationId} | Locations: Update
[**updateMenu**](LocationManagerApi.md#updateMenu) | **PUT** /accounts/{accountId}/menus/{listId} | Menus: Update
[**updateProduct**](LocationManagerApi.md#updateProduct) | **PUT** /accounts/{accountId}/locations/products/{listId} | Products: Update
[**upsertLanguageProfile**](LocationManagerApi.md#upsertLanguageProfile) | **PUT** /accounts/{accountId}/locations/{locationId}/profiles/{language_code} | Language Profiles: Upsert


# **createBio**
> \Yext\Client\Model\IdResponse createBio($account_id, $v, $body)

Bios: Create

Create new Bio ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Bio(); // \Yext\Client\Model\Bio | 

try {
    $result = $api_instance->createBio($account_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->createBio: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Bio**](../Model/\Yext\Client\Model\Bio.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createEvent**
> \Yext\Client\Model\IdResponse createEvent($account_id, $v, $body)

Events: Create

Create a new Events ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Event(); // \Yext\Client\Model\Event | 

try {
    $result = $api_instance->createEvent($account_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->createEvent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Event**](../Model/\Yext\Client\Model\Event.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createLocation**
> \Yext\Client\Model\IdResponse createLocation($account_id, $v, $location_request)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$location_request = new \Yext\Client\Model\Location(); // \Yext\Client\Model\Location | 

try {
    $result = $api_instance->createLocation($account_id, $v, $location_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->createLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **location_request** | [**\Yext\Client\Model\Location**](../Model/\Yext\Client\Model\Location.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createMenu**
> \Yext\Client\Model\IdResponse createMenu($account_id, $v, $body)

Menus: Create

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Menu(); // \Yext\Client\Model\Menu | 

try {
    $result = $api_instance->createMenu($account_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->createMenu: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Menu**](../Model/\Yext\Client\Model\Menu.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createProduct**
> \Yext\Client\Model\IdResponse createProduct($account_id, $v, $body)

Products: Create

Create a new Product ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Product(); // \Yext\Client\Model\Product | 

try {
    $result = $api_instance->createProduct($account_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->createProduct: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Product**](../Model/\Yext\Client\Model\Product.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteBioList**
> \Yext\Client\Model\ErrorResponse deleteBioList($account_id, $list_id, $v)

Bios: Delete

Delete an existing Bios ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->deleteBioList($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->deleteBioList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteEventList**
> \Yext\Client\Model\ErrorResponse deleteEventList($account_id, $list_id, $v)

Events: Delete

Delete an existing Events ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->deleteEventList($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->deleteEventList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteLanguageProfile**
> \Yext\Client\Model\ErrorResponse deleteLanguageProfile($account_id, $location_id, $language_code, $v)

Language Profiles: Delete

Remove a Language Profile from a location

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$language_code = "language_code_example"; // string | Locale code
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->deleteLanguageProfile($account_id, $location_id, $language_code, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->deleteLanguageProfile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **language_code** | **string**| Locale code |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteMenuList**
> \Yext\Client\Model\ErrorResponse deleteMenuList($account_id, $list_id, $v)

Menus: Delete

Delete an existing Menu

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->deleteMenuList($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->deleteMenuList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteProductList**
> \Yext\Client\Model\ErrorResponse deleteProductList($account_id, $list_id, $v)

Products: Delete

Delete an existing Products ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->deleteProductList($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->deleteProductList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBio**
> \Yext\Client\Model\BioListResponse getBio($account_id, $list_id, $v)

Bios: Get

Retrieve a specific Bios ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getBio($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getBio: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\BioListResponse**](../Model/BioListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBios**
> \Yext\Client\Model\BioListsResponse getBios($account_id, $v, $limit, $offset)

Bios: List

Retrieve all Bio ECls for an account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getBios($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getBios: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]

### Return type

[**\Yext\Client\Model\BioListsResponse**](../Model/BioListsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBusinessCategories**
> \Yext\Client\Model\BusinessCategoriesResponse getBusinessCategories($v, $language, $country)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$v = "20161012"; // string | A date in `YYYYMMDD` format
$language = "en"; // string | Only categories that apply to this language will be returned.  **Example:** en
$country = "US"; // string | Only categories that apply in this country will be returned.  **Example:** US

try {
    $result = $api_instance->getBusinessCategories($v, $language, $country);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getBusinessCategories: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **language** | **string**| Only categories that apply to this language will be returned.  **Example:** en | [optional] [default to en]
 **country** | **string**| Only categories that apply in this country will be returned.  **Example:** US | [optional] [default to US]

### Return type

[**\Yext\Client\Model\BusinessCategoriesResponse**](../Model/BusinessCategoriesResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCustomFields**
> \Yext\Client\Model\CustomFieldsResponse getCustomFields($v, $account_id, $offset, $limit)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$v = "20161012"; // string | A date in `YYYYMMDD` format
$account_id = "account_id_example"; // string | 
$offset = 0; // int | Number of results to skip. Used to page through results
$limit = 100; // int | Number of results to return

try {
    $result = $api_instance->getCustomFields($v, $account_id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **account_id** | **string**|  |
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **limit** | **int**| Number of results to return | [optional] [default to 100]

### Return type

[**\Yext\Client\Model\CustomFieldsResponse**](../Model/CustomFieldsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEvent**
> \Yext\Client\Model\EventListResponse getEvent($account_id, $list_id, $v)

Events: Get

Retrieve a specific Events ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getEvent($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getEvent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\EventListResponse**](../Model/EventListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEvents**
> \Yext\Client\Model\EventListsResponse getEvents($account_id, $v, $limit, $offset)

Events: List

Retrieve all Events content lists for an account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getEvents($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getEvents: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]

### Return type

[**\Yext\Client\Model\EventListsResponse**](../Model/EventListsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getGoogleKeywords**
> \Yext\Client\Model\GoogleFieldsResponse getGoogleKeywords($v)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getGoogleKeywords($v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getGoogleKeywords: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\GoogleFieldsResponse**](../Model/GoogleFieldsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLanguageProfile**
> \Yext\Client\Model\LocationResponse getLanguageProfile($account_id, $location_id, $language_code, $v)

Language Profiles: Get

Gets the the requested Language Profile for a given Location

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$language_code = "language_code_example"; // string | Locale code
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getLanguageProfile($account_id, $location_id, $language_code, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getLanguageProfile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **language_code** | **string**| Locale code |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\LocationResponse**](../Model/LocationResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLanguageProfiles**
> \Yext\Client\Model\LanguageProfilesResponse getLanguageProfiles($account_id, $location_id, $v)

Language Profiles: List

Get Language Profiles for a Location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getLanguageProfiles($account_id, $location_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getLanguageProfiles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\LanguageProfilesResponse**](../Model/LanguageProfilesResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLocation**
> \Yext\Client\Model\LocationResponse getLocation($account_id, $location_id, $v)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getLocation($account_id, $location_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\LocationResponse**](../Model/LocationResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLocationFolders**
> \Yext\Client\Model\FoldersResponse getLocationFolders($account_id, $v, $offset, $limit)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$offset = 0; // int | Number of results to skip. Used to page through results
$limit = 100; // int | Number of results to return

try {
    $result = $api_instance->getLocationFolders($account_id, $v, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getLocationFolders: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **limit** | **int**| Number of results to return | [optional] [default to 100]

### Return type

[**\Yext\Client\Model\FoldersResponse**](../Model/FoldersResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLocations**
> \Yext\Client\Model\LocationsResponse getLocations($account_id, $v, $limit, $offset)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getLocations($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getLocations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]

### Return type

[**\Yext\Client\Model\LocationsResponse**](../Model/LocationsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMenu**
> \Yext\Client\Model\MenuListResponse getMenu($account_id, $list_id, $v)

Menus: Get

Retrieve a specific Menu

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getMenu($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getMenu: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\MenuListResponse**](../Model/MenuListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMenus**
> \Yext\Client\Model\MenuListsResponse getMenus($account_id, $v, $limit, $offset)

Menus: List

Retrieve all Menu ECLs for an account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getMenus($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getMenus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]

### Return type

[**\Yext\Client\Model\MenuListsResponse**](../Model/MenuListsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProduct**
> \Yext\Client\Model\ProductListResponse getProduct($account_id, $list_id, $v)

Products: Get

Retrieve a specific Products ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getProduct($account_id, $list_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getProduct: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\ProductListResponse**](../Model/ProductListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProducts**
> \Yext\Client\Model\ProductListsResponse getProducts($account_id, $v, $limit, $offset)

Products: List

Retrieve all Products content lists for an account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getProducts($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->getProducts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **limit** | **int**| Number of results to return | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]

### Return type

[**\Yext\Client\Model\ProductListsResponse**](../Model/ProductListsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateBio**
> \Yext\Client\Model\BioListResponse updateBio($account_id, $list_id, $v, $body)

Bios: Update

Update an existing Bios ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Bio(); // \Yext\Client\Model\Bio | 

try {
    $result = $api_instance->updateBio($account_id, $list_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->updateBio: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Bio**](../Model/\Yext\Client\Model\Bio.md)|  |

### Return type

[**\Yext\Client\Model\BioListResponse**](../Model/BioListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateEvent**
> \Yext\Client\Model\EventListResponse updateEvent($account_id, $list_id, $v, $body)

Events: Update

Update an existing Events ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Event(); // \Yext\Client\Model\Event | 

try {
    $result = $api_instance->updateEvent($account_id, $list_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->updateEvent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Event**](../Model/\Yext\Client\Model\Event.md)|  |

### Return type

[**\Yext\Client\Model\EventListResponse**](../Model/EventListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateLocation**
> \Yext\Client\Model\IdResponse updateLocation($account_id, $location_id, $v, $location_request)

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

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$location_request = new \Yext\Client\Model\Location(); // \Yext\Client\Model\Location | 

try {
    $result = $api_instance->updateLocation($account_id, $location_id, $v, $location_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->updateLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **location_request** | [**\Yext\Client\Model\Location**](../Model/\Yext\Client\Model\Location.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateMenu**
> \Yext\Client\Model\MenuListResponse updateMenu($account_id, $list_id, $v, $body)

Menus: Update

Update an existing Menu

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Menu(); // \Yext\Client\Model\Menu | 

try {
    $result = $api_instance->updateMenu($account_id, $list_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->updateMenu: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Menu**](../Model/\Yext\Client\Model\Menu.md)|  |

### Return type

[**\Yext\Client\Model\MenuListResponse**](../Model/MenuListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateProduct**
> \Yext\Client\Model\ProductListResponse updateProduct($account_id, $list_id, $v, $body)

Products: Update

Update an existing Product ECL

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$list_id = "list_id_example"; // string | ID of this List
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Product(); // \Yext\Client\Model\Product | 

try {
    $result = $api_instance->updateProduct($account_id, $list_id, $v, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->updateProduct: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **list_id** | **string**| ID of this List |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Product**](../Model/\Yext\Client\Model\Product.md)|  |

### Return type

[**\Yext\Client\Model\ProductListResponse**](../Model/ProductListResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **upsertLanguageProfile**
> \Yext\Client\Model\LocationResponse upsertLanguageProfile($account_id, $location_id, $language_code, $v, $body, $primary)

Language Profiles: Upsert

Creates and / or sets the fields for a Language Profile  **NOTE:** You can change a Language Profile’s language by supplying a different (but unused) language code.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\LocationManagerApi();
$account_id = "account_id_example"; // string | 
$location_id = "location_id_example"; // string | 
$language_code = "language_code_example"; // string | Locale code
$v = "20161012"; // string | A date in `YYYYMMDD` format
$body = new \Yext\Client\Model\Location(); // \Yext\Client\Model\Location | 
$primary = true; // bool | When present and set to true, the specified profile will become the location’s primary Language Profile

try {
    $result = $api_instance->upsertLanguageProfile($account_id, $location_id, $language_code, $v, $body, $primary);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationManagerApi->upsertLanguageProfile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_id** | **string**|  |
 **language_code** | **string**| Locale code |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **body** | [**\Yext\Client\Model\Location**](../Model/\Yext\Client\Model\Location.md)|  |
 **primary** | **bool**| When present and set to true, the specified profile will become the location’s primary Language Profile | [optional]

### Return type

[**\Yext\Client\Model\LocationResponse**](../Model/LocationResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

