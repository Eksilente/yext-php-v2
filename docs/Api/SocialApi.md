# Yext\Client\SocialApi

All URIs are relative to *https://api.yext.com/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createComment**](SocialApi.md#createComment) | **POST** /accounts/{accountId}/posts/{postId}/comments | Comments: create
[**createPosts**](SocialApi.md#createPosts) | **POST** /accounts/{accountId}/posts | Posts: create
[**deleteComment**](SocialApi.md#deleteComment) | **DELETE** /accounts/{accountId}/posts/{postId}/comments/{commentId} | Comments: delete
[**deletePost**](SocialApi.md#deletePost) | **DELETE** /accounts/{accountId}/posts/{postId} | Posts: delete
[**getComments**](SocialApi.md#getComments) | **GET** /accounts/{accountId}/posts/{postId}/comments | Comments: list
[**getLinkedAccount**](SocialApi.md#getLinkedAccount) | **GET** /accounts/{accountId}/linkedaccounts/{linkedAccountId} | Linked Accounts: get
[**getLinkedAccounts**](SocialApi.md#getLinkedAccounts) | **GET** /accounts/{accountId}/linkedaccounts | Linked Accounts: list
[**getPosts**](SocialApi.md#getPosts) | **GET** /accounts/{accountId}/posts | Posts: List
[**updateComment**](SocialApi.md#updateComment) | **PUT** /accounts/{accountId}/posts/{postId}/comments/{commentId} | Comments: update
[**updateLinkedAccount**](SocialApi.md#updateLinkedAccount) | **PUT** /accounts/{accountId}/linkedaccounts/{linkedAccountId} | Linked Accounts: update


# **createComment**
> \Yext\Client\Model\InlineResponse2014 createComment($account_id, $post_id, $parent_id, $message, $photo_url, $link_url)

Comments: create

Create a new Comment in response to another Post / Comment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$post_id = "post_id_example"; // string | 
$parent_id = "parent_id_example"; // string | The ID of the Comment this Comment is replying to.  **Example** 123
$message = "message_example"; // string | The message included in the Comment, if any.  **Example** “Hello, World!”
$photo_url = "photo_url_example"; // string | The URL of the photo included in the Comment, if any.  **Example** “https://…”
$link_url = "link_url_example"; // string | The URL of the link included in the Comment, if any.  **Example** “https://…”

try {
    $result = $api_instance->createComment($account_id, $post_id, $parent_id, $message, $photo_url, $link_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->createComment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **post_id** | **string**|  |
 **parent_id** | **string**| The ID of the Comment this Comment is replying to.  **Example** 123 |
 **message** | **string**| The message included in the Comment, if any.  **Example** “Hello, World!” | [optional]
 **photo_url** | **string**| The URL of the photo included in the Comment, if any.  **Example** “https://…” | [optional]
 **link_url** | **string**| The URL of the link included in the Comment, if any.  **Example** “https://…” | [optional]

### Return type

[**\Yext\Client\Model\InlineResponse2014**](../Model/InlineResponse2014.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createPosts**
> \Yext\Client\Model\InlineResponse2014 createPosts($account_id, $location_ids, $publisher_ids, $message, $photo_url, $link_url)

Posts: create

Create a new Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$location_ids = array("location_ids_example"); // string[] | List of Location IDs for this Post
$publisher_ids = array("publisher_ids_example"); // string[] | List of Publisher IDs for this Post
$message = "message_example"; // string | The message included in the Post, if any.  **Example** \"Hello, World!\"
$photo_url = "photo_url_example"; // string | The URL of the photo included in the Post, if any.  **Example** \"https://...\"
$link_url = "link_url_example"; // string | The URL of the link included in the Post, if any.  **Example** \"https://...\"

try {
    $result = $api_instance->createPosts($account_id, $location_ids, $publisher_ids, $message, $photo_url, $link_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->createPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **location_ids** | [**string[]**](../Model/string.md)| List of Location IDs for this Post |
 **publisher_ids** | [**string[]**](../Model/string.md)| List of Publisher IDs for this Post |
 **message** | **string**| The message included in the Post, if any.  **Example** \&quot;Hello, World!\&quot; |
 **photo_url** | **string**| The URL of the photo included in the Post, if any.  **Example** \&quot;https://...\&quot; | [optional]
 **link_url** | **string**| The URL of the link included in the Post, if any.  **Example** \&quot;https://...\&quot; | [optional]

### Return type

[**\Yext\Client\Model\InlineResponse2014**](../Model/InlineResponse2014.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteComment**
> \Yext\Client\Model\InlineResponseDefault deleteComment($account_id, $post_id, $comment_id)

Comments: delete

Deletes an existing Comment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$post_id = "post_id_example"; // string | 
$comment_id = "comment_id_example"; // string | 

try {
    $result = $api_instance->deleteComment($account_id, $post_id, $comment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->deleteComment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **post_id** | **string**|  |
 **comment_id** | **string**|  |

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletePost**
> \Yext\Client\Model\InlineResponseDefault deletePost($account_id, $post_id)

Posts: delete

Deletes an existing Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$post_id = "post_id_example"; // string | 

try {
    $result = $api_instance->deletePost($account_id, $post_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->deletePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **post_id** | **string**|  |

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getComments**
> \Yext\Client\Model\InlineResponse20018 getComments($account_id, $post_id, $limit, $offset, $type)

Comments: list

Retrieve list of Comments for a Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$post_id = "post_id_example"; // string | 
$limit = 100; // int | Number of results to return, up to 100. Default 100.  **Example** 20
$offset = 0; // int | Number of results to skip. Used to page through results
$type = "type_example"; // string | Determines which type of Comments are returned

try {
    $result = $api_instance->getComments($account_id, $post_id, $limit, $offset, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->getComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **post_id** | **string**|  |
 **limit** | **int**| Number of results to return, up to 100. Default 100.  **Example** 20 | [optional] [default to 100]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **type** | **string**| Determines which type of Comments are returned | [optional]

### Return type

[**\Yext\Client\Model\InlineResponse20018**](../Model/InlineResponse20018.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLinkedAccount**
> \Yext\Client\Model\InlineResponse2008 getLinkedAccount($account_id, $linked_account_id)

Linked Accounts: get

Retrieve a specific Linked Account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$linked_account_id = "linked_account_id_example"; // string | 

try {
    $result = $api_instance->getLinkedAccount($account_id, $linked_account_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->getLinkedAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **linked_account_id** | **string**|  |

### Return type

[**\Yext\Client\Model\InlineResponse2008**](../Model/InlineResponse2008.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLinkedAccounts**
> \Yext\Client\Model\InlineResponse2007 getLinkedAccounts($account_id, $limit, $offset, $location_ids, $publisher_ids, $status)

Linked Accounts: list

Retrieve all Linked Accounts and their last known statuses.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$limit = 100; // int | Number of results to return, up to 100. Default 100.  **Example** 20
$offset = 0; // int | Number of results to skip. Used to page through results
$location_ids = array("location_ids_example"); // string[] | Defaults to all account locations with a PowerListings subscription.  **Example** 123, 456, 789
$publisher_ids = array("publisher_ids_example"); // string[] | Defaults to all publishers subscribed by account  **Example** FACEBOOK, FOURSQUARE
$status = "ALL"; // string | Used to filter for Linked Accounts with a particular status.

try {
    $result = $api_instance->getLinkedAccounts($account_id, $limit, $offset, $location_ids, $publisher_ids, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->getLinkedAccounts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **limit** | **int**| Number of results to return, up to 100. Default 100.  **Example** 20 | [optional] [default to 100]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| Defaults to all account locations with a PowerListings subscription.  **Example** 123, 456, 789 | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| Defaults to all publishers subscribed by account  **Example** FACEBOOK, FOURSQUARE | [optional]
 **status** | **string**| Used to filter for Linked Accounts with a particular status. | [optional] [default to ALL]

### Return type

[**\Yext\Client\Model\InlineResponse2007**](../Model/InlineResponse2007.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPosts**
> \Yext\Client\Model\InlineResponse20017 getPosts($account_id, $limit, $offset, $location_ids, $folder_id, $countries, $location_labels, $publisher_ids, $keywords)

Posts: List

Retrieve list of Posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$limit = 100; // int | Number of results to return, up to 100. Default 100.  **Example** 20
$offset = 0; // int | Number of results to skip. Used to page through results
$location_ids = array("location_ids_example"); // string[] | When provided, only Posts that involve the requested locations will be returned.  By defaults, reviews will be returned for all locations subscribed to Social Posting.  **Example** 123, 456, 789
$folder_id = "folder_id_example"; // string | When provided, only Posts for locations in the given folder and its subfolders will be included in the results.  **Example** 123
$countries = array("countries_example"); // string[] | Array of 3166 Alpha-2 country codes. When present, only Posts for locations in the given countries will be returned.  **Example** ['US', 'CA']
$location_labels = array("location_labels_example"); // string[] | Array of location labels. When present, only Posts for location with the provided labels will be returned.  **Example** ['pilot stores']
$publisher_ids = array("publisher_ids_example"); // string[] | Defaults to all publishers subscribed by account  **Example** FACEBOOK, FOURSQUARE
$keywords = array("keywords_example"); // string[] | When provided, only Posts that mention the given keywords will be returned. Posts will be returned if the original post or any comments contain this string.  **Example** ['pizza']

try {
    $result = $api_instance->getPosts($account_id, $limit, $offset, $location_ids, $folder_id, $countries, $location_labels, $publisher_ids, $keywords);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->getPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **limit** | **int**| Number of results to return, up to 100. Default 100.  **Example** 20 | [optional] [default to 100]
 **offset** | **int**| Number of results to skip. Used to page through results | [optional] [default to 0]
 **location_ids** | [**string[]**](../Model/string.md)| When provided, only Posts that involve the requested locations will be returned.  By defaults, reviews will be returned for all locations subscribed to Social Posting.  **Example** 123, 456, 789 | [optional]
 **folder_id** | **string**| When provided, only Posts for locations in the given folder and its subfolders will be included in the results.  **Example** 123 | [optional]
 **countries** | [**string[]**](../Model/string.md)| Array of 3166 Alpha-2 country codes. When present, only Posts for locations in the given countries will be returned.  **Example** [&#39;US&#39;, &#39;CA&#39;] | [optional]
 **location_labels** | [**string[]**](../Model/string.md)| Array of location labels. When present, only Posts for location with the provided labels will be returned.  **Example** [&#39;pilot stores&#39;] | [optional]
 **publisher_ids** | [**string[]**](../Model/string.md)| Defaults to all publishers subscribed by account  **Example** FACEBOOK, FOURSQUARE | [optional]
 **keywords** | [**string[]**](../Model/string.md)| When provided, only Posts that mention the given keywords will be returned. Posts will be returned if the original post or any comments contain this string.  **Example** [&#39;pizza&#39;] | [optional]

### Return type

[**\Yext\Client\Model\InlineResponse20017**](../Model/InlineResponse20017.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateComment**
> \Yext\Client\Model\InlineResponseDefault updateComment($account_id, $post_id, $comment_id, $comment)

Comments: update

Updates an existing Comment.    **NOTE:** Only updates supplied fields (aka PATCH).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$post_id = "post_id_example"; // string | 
$comment_id = "comment_id_example"; // string | 
$comment = new \Yext\Client\Model\PostEntry(); // \Yext\Client\Model\PostEntry | 

try {
    $result = $api_instance->updateComment($account_id, $post_id, $comment_id, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->updateComment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **post_id** | **string**|  |
 **comment_id** | **string**|  |
 **comment** | [**\Yext\Client\Model\PostEntry**](../Model/\Yext\Client\Model\PostEntry.md)|  |

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateLinkedAccount**
> \Yext\Client\Model\InlineResponseDefault updateLinkedAccount($account_id, $linked_account_id, $assign_location_ids, $unassign_location_ids)

Linked Accounts: update

Assign or Unassign a Linked Account to one or more Locations.  **Note:** When assigning Locations to a Linked Account, if any of the Locations are already assigned to another Linked Account with the same Publisher, they will be re-assigned to this Linked Account, and lose their association with the previous Linked Account.  **Note:** It is an error to include the same Location ID in both the assignLocations and unassignLocations lists in the same request.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Yext\Client\Configuration::getDefaultConfiguration()->setApiKey('api_key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Yext\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api_key', 'Bearer');

$api_instance = new Yext\Client\Api\SocialApi();
$account_id = "account_id_example"; // string | 
$linked_account_id = "linked_account_id_example"; // string | 
$assign_location_ids = array("assign_location_ids_example"); // string[] | Array of Location IDs to be assigned to this Linked Account.  Use this field to assign this Linked Account to Locations without affecting any other assigned Locations.
$unassign_location_ids = array("unassign_location_ids_example"); // string[] | Array of Location IDs to be unassigned from this Linked Account.  Use this field to unassign this Linked Account from Locations without affecting any other assigned Locations.

try {
    $result = $api_instance->updateLinkedAccount($account_id, $linked_account_id, $assign_location_ids, $unassign_location_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SocialApi->updateLinkedAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **string**|  |
 **linked_account_id** | **string**|  |
 **assign_location_ids** | [**string[]**](../Model/string.md)| Array of Location IDs to be assigned to this Linked Account.  Use this field to assign this Linked Account to Locations without affecting any other assigned Locations. | [optional]
 **unassign_location_ids** | [**string[]**](../Model/string.md)| Array of Location IDs to be unassigned from this Linked Account.  Use this field to unassign this Linked Account from Locations without affecting any other assigned Locations. | [optional]

### Return type

[**\Yext\Client\Model\InlineResponseDefault**](../Model/InlineResponseDefault.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

