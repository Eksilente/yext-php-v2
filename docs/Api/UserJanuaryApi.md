# Yext\Client\UserJanuaryApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createUser**](UserJanuaryApi.md#createUser) | **POST** /accounts/{accountId}/users | Users: Create
[**deleteUser**](UserJanuaryApi.md#deleteUser) | **DELETE** /accounts/{accountId}/users/{userId} | Users: Delete
[**getLinkOptimizationTask**](UserJanuaryApi.md#getLinkOptimizationTask) | **GET** /accounts/{accountId}/optimizationlink | Optimization Tasks: Get Link
[**getOptimizationTasks**](UserJanuaryApi.md#getOptimizationTasks) | **GET** /accounts/{accountId}/optimizationtasks | Optimization Tasks: List
[**getRoles**](UserJanuaryApi.md#getRoles) | **GET** /accounts/{accountId}/roles | Roles: Get
[**getUser**](UserJanuaryApi.md#getUser) | **GET** /accounts/{accountId}/users/{userId} | Users: Get
[**getUsers**](UserJanuaryApi.md#getUsers) | **GET** /accounts/{accountId}/users | Users: List
[**updateUser**](UserJanuaryApi.md#updateUser) | **PUT** /accounts/{accountId}/users/{userId} | Users: Update


# **createUser**
> \Yext\Client\Model\IdResponse createUser($account_id, $v, $user_request)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$user_request = new \Yext\Client\Model\User(); // \Yext\Client\Model\User | 

try {
    $result = $api_instance->createUser($account_id, $v, $user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->createUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **user_request** | [**\Yext\Client\Model\User**](../Model/\Yext\Client\Model\User.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteUser**
> \Yext\Client\Model\ErrorResponse deleteUser($account_id, $v, $user_id, $user_request)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$user_id = "user_id_example"; // string | 
$user_request = new \Yext\Client\Model\User(); // \Yext\Client\Model\User | 

try {
    $result = $api_instance->deleteUser($account_id, $v, $user_id, $user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **user_id** | **string**|  |
 **user_request** | [**\Yext\Client\Model\User**](../Model/\Yext\Client\Model\User.md)|  |

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLinkOptimizationTask**
> \Yext\Client\Model\OptimizationTaskLinksResponse getLinkOptimizationTask($account_id, $v, $task_ids, $location_ids, $mode)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$task_ids = "task_ids_example"; // string | Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account.
$location_ids = "location_ids_example"; // string | Comma-separated list of Location IDs to be used as a filter.  If no IDs are provided, defaults to all Locations in the account.
$mode = "PENDING_ONLY"; // string | When mode is PENDING_ONLY, the resulting link will only ask the user to complete tasks that are pending or in progress (that have not been completed before).  When mode is ALL_TASKS, the resulting link will ask the user to complete all specified tasks for all specified locations, regardless of whether they have been completed before, are pending, or are in progress.

try {
    $result = $api_instance->getLinkOptimizationTask($account_id, $v, $task_ids, $location_ids, $mode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->getLinkOptimizationTask: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **task_ids** | **string**| Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account. |
 **location_ids** | **string**| Comma-separated list of Location IDs to be used as a filter.  If no IDs are provided, defaults to all Locations in the account. |
 **mode** | **string**| When mode is PENDING_ONLY, the resulting link will only ask the user to complete tasks that are pending or in progress (that have not been completed before).  When mode is ALL_TASKS, the resulting link will ask the user to complete all specified tasks for all specified locations, regardless of whether they have been completed before, are pending, or are in progress. | [default to PENDING_ONLY]

### Return type

[**\Yext\Client\Model\OptimizationTaskLinksResponse**](../Model/OptimizationTaskLinksResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getOptimizationTasks**
> \Yext\Client\Model\OptimizationTasksResponse getOptimizationTasks($account_id, $v, $task_ids, $location_ids)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$task_ids = "task_ids_example"; // string | Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account.
$location_ids = "location_ids_example"; // string | Comma-separated list of Location IDs to be used as a filter.  If no IDs are provided, defaults to all Locations in the account.

try {
    $result = $api_instance->getOptimizationTasks($account_id, $v, $task_ids, $location_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->getOptimizationTasks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **task_ids** | **string**| Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account. |
 **location_ids** | **string**| Comma-separated list of Location IDs to be used as a filter.  If no IDs are provided, defaults to all Locations in the account. |

### Return type

[**\Yext\Client\Model\OptimizationTasksResponse**](../Model/OptimizationTasksResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRoles**
> \Yext\Client\Model\RolesResponse getRoles($account_id, $v)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.

try {
    $result = $api_instance->getRoles($account_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->getRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]

### Return type

[**\Yext\Client\Model\RolesResponse**](../Model/RolesResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUser**
> \Yext\Client\Model\UserResponse getUser($account_id, $v, $user_id)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$user_id = "user_id_example"; // string | 

try {
    $result = $api_instance->getUser($account_id, $v, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->getUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **user_id** | **string**|  |

### Return type

[**\Yext\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUsers**
> \Yext\Client\Model\UsersResponse getUsers($account_id, $v, $limit, $offset)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$limit = 10; // int | Number of results to return.
$offset = 0; // int | Number of results to skip. Used to page through results.

try {
    $result = $api_instance->getUsers($account_id, $v, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->getUsers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **limit** | **int**| Number of results to return. | [optional] [default to 10]
 **offset** | **int**| Number of results to skip. Used to page through results. | [optional] [default to 0]

### Return type

[**\Yext\Client\Model\UsersResponse**](../Model/UsersResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUser**
> \Yext\Client\Model\IdResponse updateUser($account_id, $v, $user_id, $user_request)

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

$api_instance = new Yext\Client\Api\UserJanuaryApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$user_id = "user_id_example"; // string | 
$user_request = new \Yext\Client\Model\User(); // \Yext\Client\Model\User | 

try {
    $result = $api_instance->updateUser($account_id, $v, $user_id, $user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserJanuaryApi->updateUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **user_id** | **string**|  |
 **user_request** | [**\Yext\Client\Model\User**](../Model/\Yext\Client\Model\User.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)
