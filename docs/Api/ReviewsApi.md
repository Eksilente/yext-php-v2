# Yext\Client\ReviewsApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createComment**](ReviewsApi.md#createComment) | **POST** /accounts/{accountId}/reviews/{reviewId}/comments | Comments: Create
[**createReviewInvites**](ReviewsApi.md#createReviewInvites) | **POST** /accounts/{accountId}/reviewinvites | Review Invitations: Create
[**getReview**](ReviewsApi.md#getReview) | **GET** /accounts/{accountId}/reviews/{reviewId} | Reviews: Get
[**listReviews**](ReviewsApi.md#listReviews) | **GET** /accounts/{accountId}/reviews | Reviews: List


# **createComment**
> \Yext\Client\Model\ErrorResponse createComment($account_id, $review_id, $v, $content, $visibility, $parent_id)

Comments: Create

Creates a new Comment on a Review.

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
$content = "content_example"; // string | Content of the new comment.
$visibility = "PRIVATE"; // string | 
$parent_id = 56; // int | If this Comment is in response to another comment, use this field to specify the ID of the parent Comment.

try {
    $result = $api_instance->createComment($account_id, $review_id, $v, $content, $visibility, $parent_id);
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
 **content** | **string**| Content of the new comment. | [optional]
 **visibility** | **string**|  | [optional] [default to PRIVATE]
 **parent_id** | **int**| If this Comment is in response to another comment, use this field to specify the ID of the parent Comment. | [optional]

### Return type

[**\Yext\Client\Model\ErrorResponse**](../Model/ErrorResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createReviewInvites**
> \Yext\Client\Model\CreateReviewInvitationResponse[] createReviewInvites($account_id, $reviews)

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
$reviews = array(new ReviewInvitation()); // \Yext\Client\Model\ReviewInvitation[] | 

try {
    $result = $api_instance->createReviewInvites($account_id, $reviews);
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
 **reviews** | [**\Yext\Client\Model\ReviewInvitation[]**](../Model/ReviewInvitation.md)|  |

### Return type

[**\Yext\Client\Model\CreateReviewInvitationResponse[]**](../Model/CreateReviewInvitationResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReview**
> \Yext\Client\Model\ReviewResponse getReview($account_id, $review_id, $v)

Reviews: Get

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
$limit = 100; // int | Number of results to return.
$offset = 0; // int | Number of results to skip. Used to page through results.
$location_ids = array("location_ids_example"); // string[] | When provided, only reviews for the requested locations will be returned.  By default, reviews will be returned for all locations subscribed to Review Monitoring.  **Example:** loc123,loc456,loc789
$folder_id = "folder_id_example"; // string | When provided, only reviews for locations in the given folder and its subfolders will be included in the results.
$countries = array("countries_example"); // string[] | When present, only reviews for locations in the given countries will be returned. Countries are denoted by ISO 3166 2-letter country codes.
$location_labels = array("location_labels_example"); // string[] | When present, only reviews for location with the provided labels will be returned.
$publisher_ids = array("publisher_ids_example"); // string[] | List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP
$review_content = "review_content_example"; // string | When specified, only reviews that include the provided content will be returned.
$min_rating = 1.2; // double | When specified, only reviews with the provided minimum rating or higher will be returned.
$max_rating = 1.2; // double | 
$min_publisher_date = new \DateTime(); // \DateTime | When specified, only reviews with a publisher date on or after the given date will be returned.
$max_publisher_date = new \DateTime(); // \DateTime | When specified, only reviews with a publisher date on or before the given date will be returned.
$min_last_yext_update_date = new \DateTime(); // \DateTime | When specified, only reviews with a last Yext update date on or after the given date will be returned.
$max_last_yext_update_date = new \DateTime(); // \DateTime | When specified, only reviews with a last Yext update date on or before the given date will be returned.
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
 **limit** | **int**| Number of results to return. | [optional] [default to 100]
 **offset** | **int**| Number of results to skip. Used to page through results. | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| When provided, only reviews for the requested locations will be returned.  By default, reviews will be returned for all locations subscribed to Review Monitoring.  **Example:** loc123,loc456,loc789 | [optional]
 **folder_id** | **string**| When provided, only reviews for locations in the given folder and its subfolders will be included in the results. | [optional]
 **countries** | [**string[]**](../Model/string.md)| When present, only reviews for locations in the given countries will be returned. Countries are denoted by ISO 3166 2-letter country codes. | [optional]
 **location_labels** | [**string[]**](../Model/string.md)| When present, only reviews for location with the provided labels will be returned. | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| List of publisher IDs. If no IDs are specified, defaults to all publishers subscribed by account.  **Example:** MAPQUEST,YELP | [optional]
 **review_content** | **string**| When specified, only reviews that include the provided content will be returned. | [optional]
 **min_rating** | **double**| When specified, only reviews with the provided minimum rating or higher will be returned. | [optional]
 **max_rating** | **double**|  | [optional]
 **min_publisher_date** | **\DateTime**| When specified, only reviews with a publisher date on or after the given date will be returned. | [optional]
 **max_publisher_date** | **\DateTime**| When specified, only reviews with a publisher date on or before the given date will be returned. | [optional]
 **min_last_yext_update_date** | **\DateTime**| When specified, only reviews with a last Yext update date on or after the given date will be returned. | [optional]
 **max_last_yext_update_date** | **\DateTime**| When specified, only reviews with a last Yext update date on or before the given date will be returned. | [optional]
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

