# ContentListCost

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  | [optional] 
**price** | **string** | Price in USD , e.g., 9.50. Must be &gt;&#x3D; 0.0 and &lt;&#x3D; 1000000.00 | [optional] 
**unit** | **string** | e.g., Per Gallon, Each | [optional] 
**range_to** | **string** | Specified only if &lt;b&gt;type&lt;/b&gt; is RANGE. In that case, this Cost represents a price range from &lt;b&gt;price&lt;/b&gt; to &lt;b&gt;rangeTo&lt;/b&gt;. Must be &gt; &lt;b&gt;price&lt;/b&gt; and &lt;&#x3D; 1000000.00 | [optional] 
**other** | **string** | Specified only if &lt;b&gt;type&lt;/b&gt; is OTHER. User-entered text, e.g., Market Price | [optional] 
**options** | [**\Yext\Client\Model\ContentListCostOption[]**](ContentListCostOption.md) | Add-ons or product variations that affect the price. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


