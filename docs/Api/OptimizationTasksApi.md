# Yext\Client\OptimizationTasksApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getLinkOptimizationTask**](OptimizationTasksApi.md#getLinkOptimizationTask) | **GET** /accounts/{accountId}/optimizationlink | Optimization Tasks: Get Link
[**getOptimizationTasks**](OptimizationTasksApi.md#getOptimizationTasks) | **GET** /accounts/{accountId}/optimizationtasks | Optimization Tasks: List


# **getLinkOptimizationTask**
> \Yext\Client\Model\OptimizationTaskLinksResponse getLinkOptimizationTask($account_id, $v, $task_ids, $location_id, $mode)

Optimization Tasks: Get Link

Retrieve a link to perform any pending Optimization Tasks given a set of Optimization Tasks and a location

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\OptimizationTasksApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$task_ids = "task_ids_example"; // string | Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account.
$location_id = "location_id_example"; // string | Location ID to be used as a filter.  If no ID is provided, defaults to all Locations in the account.
$mode = "PENDING_ONLY"; // string | When mode is PENDING_ONLY, the resulting link will only ask the user to complete tasks that are pending or in progress (that have not been completed before).  When mode is ALL_TASKS, the resulting link will ask the user to complete all specified tasks for all specified locations, regardless of whether they have been completed before, are pending, or are in progress.

try {
    $result = $api_instance->getLinkOptimizationTask($account_id, $v, $task_ids, $location_id, $mode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OptimizationTasksApi->getLinkOptimizationTask: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **task_ids** | **string**| Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account. | [optional]
 **location_id** | **string**| Location ID to be used as a filter.  If no ID is provided, defaults to all Locations in the account. | [optional]
 **mode** | **string**| When mode is PENDING_ONLY, the resulting link will only ask the user to complete tasks that are pending or in progress (that have not been completed before).  When mode is ALL_TASKS, the resulting link will ask the user to complete all specified tasks for all specified locations, regardless of whether they have been completed before, are pending, or are in progress. | [optional] [default to PENDING_ONLY]

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

$api_instance = new Yext\Client\Api\OptimizationTasksApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$task_ids = "task_ids_example"; // string | Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account.
$location_ids = "location_ids_example"; // string | Comma-separated list of Location IDs to be used as a filter.  If no IDs are provided, defaults to all Locations in the account.

try {
    $result = $api_instance->getOptimizationTasks($account_id, $v, $task_ids, $location_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OptimizationTasksApi->getOptimizationTasks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **task_ids** | **string**| Comma-separated list of Optimization Task IDs corresponding to Optimization Tasks that should be included in the response.  If no IDs are provided, defaults to all available Optimization Tasks in the account. | [optional]
 **location_ids** | **string**| Comma-separated list of Location IDs to be used as a filter.  If no IDs are provided, defaults to all Locations in the account. | [optional]

### Return type

[**\Yext\Client\Model\OptimizationTasksResponse**](../Model/OptimizationTasksResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

