# PostEntry

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID of this PostEntry. | [optional] 
**location_id** | **string** | Location ID for this PostEntry. | [optional] 
**publisher_id** | **string** | Publisher ID for this PostEntry. | [optional] 
**parent_id** | **string** | If this is an original Post, the parentId will be null.   If this PostEntry is in response to another PostEntry, this is the ID of the parent PostEntry. | [optional] 
**timestamp** | **int** | Date and time this PostEntry was created, as reported by the publisher (milliseconds since epoch). | [optional] 
**likes** | **int** | Total number of likes this PostEntry has received. | [optional] 
**liked** | **bool** | True if the business representative for the given location and publisher likes this PostEntry | [optional] 
**comments** | **int** | Total number of Comments that have been written in response to this PostEntry. (i.e. the number of descendents of this node in the PostEntry graph) | [optional] 
**author** | [**\Yext\Client\Model\Author**](Author.md) |  | [optional] 
**message** | **string** | The message included in the PostEntry, if any. | [optional] 
**photo_url** | **string** | The URL of the photo included in the PostEntry, if any. | [optional] 
**link_url** | **string** | The URL of the link included in the PostEntry, if any. | [optional] 
**status** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


