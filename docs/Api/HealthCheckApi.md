# Yext\Client\HealthCheckApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**healthCheck**](HealthCheckApi.md#healthCheck) | **GET** /healthy | Health Check


# **healthCheck**
> string healthCheck()

Health Check

The Health Check endpoint allows you to monitor the status of Yext's systems.  A response with a status code other than 200 OK indicates that our systems are not operational.  The body of the response may contain information about the status. However, no part of your Yext integration should depend on the content of the response.  **NOTE:** This call does not require authentication.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\HealthCheckApi();

try {
    $result = $api_instance->healthCheck();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HealthCheckApi->healthCheck: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

**string**

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

