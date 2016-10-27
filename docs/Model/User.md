# User

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID of this User.  Ignored when sent in update requests. | [optional] 
**first_name** | **string** | User’s first name. | [optional] 
**last_name** | **string** | User’s last name. | [optional] 
**username** | **string** | User’s username. | [optional] 
**email_address** | **string** | User’s email address. | [optional] 
**phone_number** | **string** | User’s phone number. | [optional] 
**password** | **string** | User’s password.  Only used when creating a new user (never returned in an API response). | [optional] 
**sso** | **bool** | Indicates whether SSO has been enabled for this user.  Defaults to false. | [optional] 
**acl** | [**\Yext\Client\Model\UserAcl[]**](UserAcl.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


