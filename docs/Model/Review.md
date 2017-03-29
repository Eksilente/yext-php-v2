# Review

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | The current status of the review; only returned for First Party and External First Party reviews. Defaults to &#x60;QUARANTINED&#x60; when creating. | [optional] 
**rating** | **double** | Normalized rating out of 5. This value is omitted if the review does not include a rating. | [optional] 
**title** | **string** | Title of the review. This value is omitted if reviews on the publisher&#39;s site do not have titles. | [optional] 
**url** | **string** | The URL of the review, or the URL of the listing where the review can be found if there is no specific URL for the review. | [optional] 
**publisher_date** | **int** | The timestamp of the review as reported by the publisher. If edits impact the review date on the publisher, then this date may change. This date always comes from the publisher and we respect whatever they have. | [optional] 
**last_yext_update_date** | **int** | This is the timestamp Yext last ingested an update for the review. This is a timestamp from Yext, and it always means the last time this review changed in Yext. | [optional] 
**comments** | [**\Yext\Client\Model\ReviewComment[]**](ReviewComment.md) | An ordered array of Comments on the review.  **NOTE:** The order is a flattened tree with depth ties broken by publisher date. | [optional] 
**content** | **string** | Content of the review. | [optional] 
**author_name** | **string** | The name of the person who wrote the review (if we have it). | [optional] 
**author_email** | **string** | The email address of the person who wrote the review (if we have it). | [optional] 
**location_id** | **string** | ID of the location associated with this review | [optional] 
**publisher_id** | **string** | For third-party reviews, the ID of publisher associated with this listing. For first-party reviews, this will be FIRST_PARTY. | [optional] 
**id** | **int** | ID of this review | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


