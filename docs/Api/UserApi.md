# Yext\Client\UserApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createUser**](UserApi.md#createUser) | **POST** /accounts/{accountId}/users | Users: Create
[**deleteUser**](UserApi.md#deleteUser) | **DELETE** /accounts/{accountId}/users/{userId} | Users: Delete
[**getLinkOptimizationTask**](UserApi.md#getLinkOptimizationTask) | **GET** /accounts/{accountId}/optimizationlink | Optimization Tasks: Get Link
[**getOptimizationTasks**](UserApi.md#getOptimizationTasks) | **GET** /accounts/{accountId}/optimizationtasks | Optimization Tasks: List
[**getRoles**](UserApi.md#getRoles) | **GET** /accounts/{accountId}/roles | Roles: Get
[**getUser**](UserApi.md#getUser) | **GET** /accounts/{accountId}/users/{userId} | Users: Get
[**getUsers**](UserApi.md#getUsers) | **GET** /accounts/{accountId}/users | Users: List
[**updateUser**](UserApi.md#updateUser) | **PUT** /accounts/{accountId}/users/{userId} | Users: Update


# **createUser**
> \Yext\Client\Model\InlineResponse2015 createUser($account_id, $v, $user_request)

Users: Create

Create a new User

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$user_request = new \Yext\Client\Model\User(); // \Yext\Client\Model\User | 

try {
    $result = $api_instance->createUser($account_id, $v, $user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->createUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **user_request** | [**\Yext\Client\Model\User**](../Model/\Yext\Client\Model\User.md)|  |

### Return type

[**\Yext\Client\Model\InlineResponse2015**](../Model/InlineResponse2015.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteUser**
> \Yext\Client\Model\InlineResponse2015 deleteUser($account_id, $v, $user_id, $user_request)

Users: Delete

Deletes an existing User.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$user_id = "user_id_example"; // string | 
$user_request = new \Yext\Client\Model\User(); // \Yext\Client\Model\User | 

try {
    $result = $api_instance->deleteUser($account_id, $v, $user_id, $user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **user_id** | **string**|  |
 **user_request** | [**\Yext\Client\Model\User**](../Model/\Yext\Client\Model\User.md)|  |

### Return type

[**\Yext\Client\Model\InlineResponse2015**](../Model/InlineResponse2015.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLinkOptimizationTask**
> \Yext\Client\Model\InlineResponse20013 getLinkOptimizationTask($account_id, $v, $task_ids, $location_ids, $mode)

Optimization Tasks: Get Link

Retrieve a link to perform any pending Optimization Tasks given a set of Optimization Tasks and Locations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$task_ids = "task_ids_example"; // string | Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  Defaults to all available Optimization Tasks in the account.
$location_ids = "location_ids_example"; // string | Comma-separated list of Location IDs, corresponding to Locations to be evaluated when returning the number of locations eligible & completed for each Optimization Task.  Defaults to all Locations in the account.
$mode = "PENDING_ONLY"; // string | When mode is PENDING_ONLY, the resulting link will only ask the user to complete tasks that are pending or in progress (that have not been completed before).  When mode is ALL_TASKS, the resulting link will ask the user to complete all specified tasks for all specified locations, regardless of whether they have been completed before, are pending, or are in progress.

try {
    $result = $api_instance->getLinkOptimizationTask($account_id, $v, $task_ids, $location_ids, $mode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getLinkOptimizationTask: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **task_ids** | **string**| Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  Defaults to all available Optimization Tasks in the account. |
 **location_ids** | **string**| Comma-separated list of Location IDs, corresponding to Locations to be evaluated when returning the number of locations eligible &amp; completed for each Optimization Task.  Defaults to all Locations in the account. |
 **mode** | **string**| When mode is PENDING_ONLY, the resulting link will only ask the user to complete tasks that are pending or in progress (that have not been completed before).  When mode is ALL_TASKS, the resulting link will ask the user to complete all specified tasks for all specified locations, regardless of whether they have been completed before, are pending, or are in progress. | [default to PENDING_ONLY]

### Return type

[**\Yext\Client\Model\InlineResponse20013**](../Model/InlineResponse20013.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getOptimizationTasks**
> \Yext\Client\Model\InlineResponse20014 getOptimizationTasks($account_id, $v, $task_ids, $location_ids)

Optimization Tasks: List

List Optimization Tasks for the account, optionally filtered by task and location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$task_ids = "task_ids_example"; // string | Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  Defaults to all available Optimization Tasks in the account.
$location_ids = "location_ids_example"; // string | Comma-separated list of Location IDs, corresponding to Locations to be evaluated when returning the number of locations eligible & completed for each Optimization Task.  Defaults to all Locations in the account.

try {
    $result = $api_instance->getOptimizationTasks($account_id, $v, $task_ids, $location_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getOptimizationTasks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **task_ids** | **string**| Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  Defaults to all available Optimization Tasks in the account. |
 **location_ids** | **string**| Comma-separated list of Location IDs, corresponding to Locations to be evaluated when returning the number of locations eligible &amp; completed for each Optimization Task.  Defaults to all Locations in the account. |

### Return type

[**\Yext\Client\Model\InlineResponse20014**](../Model/InlineResponse20014.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRoles**
> \Yext\Client\Model\InlineResponse20024 getRoles($account_id, $v)

Roles: Get

Retrieves a list of the roles that users can have within a customer’s account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format

try {
    $result = $api_instance->getRoles($account_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]

### Return type

[**\Yext\Client\Model\InlineResponse20024**](../Model/InlineResponse20024.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUser**
> \Yext\Client\Model\InlineResponse2015 getUser($account_id, $v, $user_id)

Users: Get

Retrieves details of a specific User.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$user_id = "user_id_example"; // string | 

try {
    $result = $api_instance->getUser($account_id, $v, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **user_id** | **string**|  |

### Return type

[**\Yext\Client\Model\InlineResponse2015**](../Model/InlineResponse2015.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUsers**
> \Yext\Client\Model\InlineResponse20025 getUsers($account_id, $v, $limit, $offset)

Users: List

Lists all Users in an account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$limit = 10; // int | Number of results to return
$offset = 0; // int | Number of results to skip. Used to page through results

try {
    $result = $api_instance->getUsers($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getUsers: ', $e->getMessage(), PHP_EOL;
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

[**\Yext\Client\Model\InlineResponse20025**](../Model/InlineResponse20025.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUser**
> \Yext\Client\Model\InlineResponse2015 updateUser($account_id, $v, $user_id, $user_request)

Users: Update

Updates an existing User.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\UserApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format
$user_id = "user_id_example"; // string | 
$user_request = new \Yext\Client\Model\User(); // \Yext\Client\Model\User | 

try {
    $result = $api_instance->updateUser($account_id, $v, $user_id, $user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->updateUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format | [default to 20161012]
 **user_id** | **string**|  |
 **user_request** | [**\Yext\Client\Model\User**](../Model/\Yext\Client\Model\User.md)|  |

### Return type

[**\Yext\Client\Model\InlineResponse2015**](../Model/InlineResponse2015.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

