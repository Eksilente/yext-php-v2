# Yext\Client\ReviewsApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createComment**](ReviewsApi.md#createComment) | **POST** /accounts/{accountId}/reviews/{reviewId}/comments | Comment: Create
[**createReview**](ReviewsApi.md#createReview) | **POST** /accounts/{accountId}/reviews | Reviews: Create
[**createReviewInvites**](ReviewsApi.md#createReviewInvites) | **POST** /accounts/{accountId}/reviewinvites | Review Invitations: Create
[**getReview**](ReviewsApi.md#getReview) | **GET** /accounts/{accountId}/reviews/{reviewId} | Review: Get
[**getReviewGenerationSettings**](ReviewsApi.md#getReviewGenerationSettings) | **GET** /accounts/{accountId}/reviews/settings/generation | Review Generation Settings: Get
[**listReviews**](ReviewsApi.md#listReviews) | **GET** /accounts/{accountId}/reviews | Reviews: List
[**updateReview**](ReviewsApi.md#updateReview) | **PUT** /accounts/{accountId}/reviews/{reviewId} | Review: Update
[**updateReviewGenerationSettings**](ReviewsApi.md#updateReviewGenerationSettings) | **POST** /accounts/{accountId}/reviews/settings/generation | Review Generation Settings: Update


# **createComment**
> \Yext\Client\Model\ErrorResponse createComment($account_id, $review_id, $v, $comment_request)

Comment: Create

Creates a new Comment on a Review. <br><br>  ## Required fields * **`content`** <br><br>  ## Optional fields * **`parentId`** * **`visiblity`** <br><br>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$review_id = 56; // int | ID of this Review.
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$comment_request = new \Yext\Client\Model\ReviewComment(); // \Yext\Client\Model\ReviewComment | 

try {
    $result = $api_instance->createComment($account_id, $review_id, $v, $comment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->createComment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **review_id** | **int**| ID of this Review. |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **comment_request** | [**\Yext\Client\Model\ReviewComment**](../Model/\Yext\Client\Model\ReviewComment.md)|  |

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createReview**
> \Yext\Client\Model\IdResponse createReview($account_id, $v, $review_request)

Reviews: Create

Create a new External First Party Review. <br><br>  ## Required fields * **`locationId`** * **`authorName`** * **`rating`** * **`content`** <br><br>  ## Optional fields * **`authorEmail`** * **`status`** <br><br>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$review_request = new \Yext\Client\Model\Review(); // \Yext\Client\Model\Review | 

try {
    $result = $api_instance->createReview($account_id, $v, $review_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->createReview: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **review_request** | [**\Yext\Client\Model\Review**](../Model/\Yext\Client\Model\Review.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createReviewInvites**
> \Yext\Client\Model\CreateReviewInvitationsResponse createReviewInvites($account_id, $v, $reviews)

Review Invitations: Create

Sends review invitations to one or more consumers.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$reviews = array(new ReviewInvitation()); // \Yext\Client\Model\ReviewInvitation[] | 

try {
    $result = $api_instance->createReviewInvites($account_id, $v, $reviews);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->createReviewInvites: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **reviews** | [**\Yext\Client\Model\ReviewInvitation[]**](../Model/ReviewInvitation.md)|  |

### Return type

[**\Yext\Client\Model\CreateReviewInvitationsResponse**](../Model/CreateReviewInvitationsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReview**
> \Yext\Client\Model\ReviewResponse getReview($account_id, $review_id, $v)

Review: Get

Retrieve a specific Review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$review_id = 56; // int | ID of this Review.
$v = "20161012"; // string | A date in `YYYYMMDD` format.

try {
    $result = $api_instance->getReview($account_id, $review_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->getReview: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **review_id** | **int**| ID of this Review. |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]

### Return type

[**\Yext\Client\Model\ReviewResponse**](../Model/ReviewResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReviewGenerationSettings**
> \Yext\Client\Model\ReviewGenerationSettingsResponse getReviewGenerationSettings($account_id, $v)

Review Generation Settings: Get

Returns all current generation settings for a specified account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.

try {
    $result = $api_instance->getReviewGenerationSettings($account_id, $v);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->getReviewGenerationSettings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]

### Return type

[**\Yext\Client\Model\ReviewGenerationSettingsResponse**](../Model/ReviewGenerationSettingsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listReviews**
> \Yext\Client\Model\ReviewsResponse listReviews($account_id, $v, $limit, $offset, $location_ids, $folder_id, $countries, $location_labels, $publisher_ids, $review_content, $min_rating, $max_rating, $min_publisher_date, $max_publisher_date, $min_last_yext_update_date, $max_last_yext_update_date, $awaiting_response, $min_non_owner_comments, $reviewer_name, $reviewer_email)

Reviews: List

Retrieve all Reviews matching the given criteria.  **NOTE:** Yelp Reviews are **not** included.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$limit = 10; // int | Number of results to return.
$offset = 0; // int | Number of results to skip. Used to page through results.
$location_ids = array("location_ids_example"); // string[] | When provided, only reviews for the requested locations will be returned.  By default, reviews will be returned for all locations subscribed to Review Monitoring.  **Example:** loc123,loc456,loc789
$folder_id = "folder_id_example"; // string | When provided, only reviews for locations in the given folder and its subfolders will be included in the results.
$countries = array("countries_example"); // string[] | When present, only reviews for locations in the given countries will be returned. Countries are denoted by ISO 3166 2-letter country codes.
$location_labels = array("location_labels_example"); // string[] | When present, only reviews for location with the provided labels will be returned.
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP
$review_content = "review_content_example"; // string | When specified, only reviews that include the provided content will be returned.
$min_rating = 1.2; // double | When specified, only reviews with the provided minimum rating or higher will be returned.
$max_rating = 1.2; // double | When specified, only reviews with the provided maximum rating or lower will be returned.
$min_publisher_date = new \DateTime(); // \DateTime | (`YYYY-MM-DD` format) When specified, only reviews with a publisher date on or after the given date will be returned.
$max_publisher_date = new \DateTime(); // \DateTime | (`YYYY-MM-DD` format) When specified, only reviews with a publisher date on or before the given date will be returned.
$min_last_yext_update_date = new \DateTime(); // \DateTime | (`YYYY-MM-DD` format) When specified, only reviews with a last Yext update date on or after the given date will be returned.
$max_last_yext_update_date = new \DateTime(); // \DateTime | (`YYYY-MM-DD` format) When specified, only reviews with a last Yext update date on or before the given date will be returned.
$awaiting_response = "awaiting_response_example"; // string | When specified, only reviews that are awaiting an owner reply on the given objects will be returned.  For example, when `awaitingResponse=COMMENT`, reviews will only be returned if they have at least one comment that has not been responded to by the owner.
$min_non_owner_comments = 56; // int | When specified, only reviews that have at least the provided number of non-owner comments will be returned.
$reviewer_name = "reviewer_name_example"; // string | When specified, only reviews whose authorName contains the provided string will be returned.
$reviewer_email = "reviewer_email_example"; // string | When specified, only reviews whose authorEmail matches the provided email address will be returned.

try {
    $result = $api_instance->listReviews($account_id, $v, $limit, $offset, $location_ids, $folder_id, $countries, $location_labels, $publisher_ids, $review_content, $min_rating, $max_rating, $min_publisher_date, $max_publisher_date, $min_last_yext_update_date, $max_last_yext_update_date, $awaiting_response, $min_non_owner_comments, $reviewer_name, $reviewer_email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->listReviews: ', $e->getMessage(), PHP_EOL;
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
 **location_ids** | [**string[]**](../Model/string.md)| When provided, only reviews for the requested locations will be returned.  By default, reviews will be returned for all locations subscribed to Review Monitoring.  **Example:** loc123,loc456,loc789 | [optional]
 **folder_id** | **string**| When provided, only reviews for locations in the given folder and its subfolders will be included in the results. | [optional]
 **countries** | [**string[]**](../Model/string.md)| When present, only reviews for locations in the given countries will be returned. Countries are denoted by ISO 3166 2-letter country codes. | [optional]
 **location_labels** | [**string[]**](../Model/string.md)| When present, only reviews for location with the provided labels will be returned. | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]
 **review_content** | **string**| When specified, only reviews that include the provided content will be returned. | [optional]
 **min_rating** | **double**| When specified, only reviews with the provided minimum rating or higher will be returned. | [optional]
 **max_rating** | **double**| When specified, only reviews with the provided maximum rating or lower will be returned. | [optional]
 **min_publisher_date** | **\DateTime**| (&#x60;YYYY-MM-DD&#x60; format) When specified, only reviews with a publisher date on or after the given date will be returned. | [optional]
 **max_publisher_date** | **\DateTime**| (&#x60;YYYY-MM-DD&#x60; format) When specified, only reviews with a publisher date on or before the given date will be returned. | [optional]
 **min_last_yext_update_date** | **\DateTime**| (&#x60;YYYY-MM-DD&#x60; format) When specified, only reviews with a last Yext update date on or after the given date will be returned. | [optional]
 **max_last_yext_update_date** | **\DateTime**| (&#x60;YYYY-MM-DD&#x60; format) When specified, only reviews with a last Yext update date on or before the given date will be returned. | [optional]
 **awaiting_response** | **string**| When specified, only reviews that are awaiting an owner reply on the given objects will be returned.  For example, when &#x60;awaitingResponse&#x3D;COMMENT&#x60;, reviews will only be returned if they have at least one comment that has not been responded to by the owner. | [optional]
 **min_non_owner_comments** | **int**| When specified, only reviews that have at least the provided number of non-owner comments will be returned. | [optional]
 **reviewer_name** | **string**| When specified, only reviews whose authorName contains the provided string will be returned. | [optional]
 **reviewer_email** | **string**| When specified, only reviews whose authorEmail matches the provided email address will be returned. | [optional]

### Return type

[**\Yext\Client\Model\ReviewsResponse**](../Model/ReviewsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateReview**
> \Yext\Client\Model\IdResponse updateReview($account_id, $review_id, $v, $review_request)

Review: Update

Updates an External First Party Review. <br><br> **NOTE:** Despite using the `PUT` method, Reviews: Update only updates supplied fields. Omitted fields are not modified. <br><br>  ## Optional fields * **`rating`** * **`content`** * **`authorName`** * **`authorEmail`** * **`status`** <br><br>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$review_id = 56; // int | ID of this Review.
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$review_request = new \Yext\Client\Model\Review(); // \Yext\Client\Model\Review | 

try {
    $result = $api_instance->updateReview($account_id, $review_id, $v, $review_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->updateReview: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **review_id** | **int**| ID of this Review. |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **review_request** | [**\Yext\Client\Model\Review**](../Model/\Yext\Client\Model\Review.md)|  |

### Return type

[**\Yext\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateReviewGenerationSettings**
> \Yext\Client\Model\ReviewGenerationSettingsResponse updateReviewGenerationSettings($account_id, $v, $review_generation_settings_request)

Review Generation Settings: Update

Updates any generation settings specified in a specified account. Call may include any/all settings available to the account. Settings not included will remain unchanged.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\ReviewsApi();
$account_id = "account_id_example"; // string | 
$v = "20161012"; // string | A date in `YYYYMMDD` format.
$review_generation_settings_request = new \Yext\Client\Model\ReviewGenerationSettings(); // \Yext\Client\Model\ReviewGenerationSettings | 

try {
    $result = $api_instance->updateReviewGenerationSettings($account_id, $v, $review_generation_settings_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewsApi->updateReviewGenerationSettings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **v** | **string**| A date in &#x60;YYYYMMDD&#x60; format. | [default to 20161012]
 **review_generation_settings_request** | [**\Yext\Client\Model\ReviewGenerationSettings**](../Model/\Yext\Client\Model\ReviewGenerationSettings.md)|  |

### Return type

[**\Yext\Client\Model\ReviewGenerationSettingsResponse**](../Model/ReviewGenerationSettingsResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

