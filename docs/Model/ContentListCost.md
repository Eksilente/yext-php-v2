# ContentListCost

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**price** | **string** | Price in USD, e.g., 9.50. Must be greater than or equal to 0.0 and less than or equal to 1000000.00. | [optional] 
**other** | **string** | Specified only if &#x60;type&#x60; is &#x60;OTHER&#x60;. User-entered text, e.g., Market Price. | [optional] 
**range_to** | **string** | Specified only if &#x60;type&#x60; is &#x60;RANGE&#x60;. In that case, this Cost represents a &#x60;price&#x60; range from &#x60;price&#x60; to &#x60;rangeTo&#x60;. Must be greater than &#x60;price&#x60; and less than or equal to 1000000.00. | [optional] 
**type** | **string** |  | [optional] 
**options** | [**\Yext\Client\Model\ContentListCostOption[]**](ContentListCostOption.md) | Add-ons or product variations that affect the price. | [optional] 
**unit** | **string** | e.g., Per Gallon, Each. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


