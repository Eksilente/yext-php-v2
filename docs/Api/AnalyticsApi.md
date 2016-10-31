# Yext\Client\AnalyticsApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**activityLog**](AnalyticsApi.md#activityLog) | **POST** /accounts/{accountId}/analytics/activity | Activity Log
[**createReports**](AnalyticsApi.md#createReports) | **GET** /accounts/{accountId}/analytics/reports | Create Reports
[**getMaxDates**](AnalyticsApi.md#getMaxDates) | **GET** /accounts/{accountId}/analytics/maxdates | Max Dates
[**reportStatus**](AnalyticsApi.md#reportStatus) | **GET** /accounts/{accountId}/analytics/standardreports/{reportId} | Report Status


# **activityLog**
> \Yext\Client\Model\ActivitiesResponse activityLog($account_id, $body)

Activity Log

Fetches account activity information.

### Example
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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **body** | [**\Yext\Client\Model\ActivityLogRequest**](../Model/\Yext\Client\Model\ActivityLogRequest.md)|  | [optional]

### Return type

[**\Yext\Client\Model\ActivitiesResponse**](../Model/ActivitiesResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createReports**
> \Yext\Client\Model\CreateReportsResponse createReports($account_id, $async, $callback, $body)

Create Reports

Begins the process of producing a report.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\AnalyticsApi();
$account_id = "account_id_example"; // string | 
$async = true; // bool | Defaults to false.  When true, the report’s ID will be returned immediately and the report results can be fetched later.  When false, the report results will be returned immediately, but an error may occur if the data requested is too large
$callback = "callback_example"; // string | Optional.  When async=true and callback is specified, the provided URL will be called when the report is ready.  The URL must of of the form:       POST https://[your domain]/[your path]  It must accept the following parameters:      id:     (int)     - The ID of the report that is ready      status: (string)  - one of [DONE, FAILED]      url:    (string)  - When status=DONE, contains the URL to download the report data as a text file.
$body = new \Yext\Client\Model\CreateReportRequestBody(); // \Yext\Client\Model\CreateReportRequestBody | JSON object containing any filters to be applied to the report

try {
    $result = $api_instance->createReports($account_id, $async, $callback, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->createReports: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **async** | **bool**| Defaults to false.  When true, the report’s ID will be returned immediately and the report results can be fetched later.  When false, the report results will be returned immediately, but an error may occur if the data requested is too large | [optional]
 **callback** | **string**| Optional.  When async&#x3D;true and callback is specified, the provided URL will be called when the report is ready.  The URL must of of the form:       POST https://[your domain]/[your path]  It must accept the following parameters:      id:     (int)     - The ID of the report that is ready      status: (string)  - one of [DONE, FAILED]      url:    (string)  - When status&#x3D;DONE, contains the URL to download the report data as a text file. | [optional]
 **body** | [**\Yext\Client\Model\CreateReportRequestBody**](../Model/\Yext\Client\Model\CreateReportRequestBody.md)| JSON object containing any filters to be applied to the report | [optional]

### Return type

[**\Yext\Client\Model\CreateReportsResponse**](../Model/CreateReportsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMaxDates**
> \Yext\Client\Model\MaximumDatesResponse getMaxDates($account_id)

Max Dates

The dates through which reporting data is available.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\AnalyticsApi();
$account_id = "account_id_example"; // string | 

try {
    $result = $api_instance->getMaxDates($account_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->getMaxDates: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |

### Return type

[**\Yext\Client\Model\MaximumDatesResponse**](../Model/MaximumDatesResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reportStatus**
> \Yext\Client\Model\ReportStatusResponse reportStatus($account_id, $report_id)

Report Status

Checks the status of a Report created with async=true.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\AnalyticsApi();
$account_id = "account_id_example"; // string | 
$report_id = 56; // int | 

try {
    $result = $api_instance->reportStatus($account_id, $report_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->reportStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **report_id** | **int**|  |

### Return type

[**\Yext\Client\Model\ReportStatusResponse**](../Model/ReportStatusResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

