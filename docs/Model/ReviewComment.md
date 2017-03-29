# ReviewComment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**content** | **string** | Content of the comment. | [optional] 
**author_role** | **string** |  | [optional] 
**publisher_date** | **int** | The timestamp of the comment as reported by the publisher.  If edits impact the comment timestamp on the publisher, then this timestamp may change.  This timestamp always comes from the publisher and we respect whatever they have. | [optional] 
**visibility** | **string** | Defaults to &#x60;PUBLIC&#x60; when creating a comment | [optional] 
**author_email** | **string** | The email address of the person who wrote the comment (if we have it). | [optional] 
**author_name** | **string** | The name of the person who wrote the comment (if we have it). | [optional] 
**parent_id** | **int** | If this comment is in response to another comment, this is the ID of the parent comment. | [optional] 
**id** | **int** | ID of this comment (assigned by Yext). | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


