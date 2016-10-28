# User

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**username** | **string** | User’s username. | [optional] 
**first_name** | **string** | User’s first name. | [optional] 
**last_name** | **string** | User’s last name. | [optional] 
**acl** | [**\Yext\Client\Model\UserAcl[]**](UserAcl.md) |  | [optional] 
**sso** | **bool** | Indicates whether SSO has been enabled for this user.  Defaults to false. | [optional] 
**phone_number** | **string** | User’s phone number. | [optional] 
**email_address** | **string** | User’s email address. | [optional] 
**password** | **string** | User’s password.  Only used when creating a new user (never returned in an API response). | [optional] 
**id** | **string** | ID of this User.  Ignored when sent in update requests. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


