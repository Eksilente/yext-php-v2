# LocationServiceArea

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**radius** | **int** | &lt;msg&gt;The distance around the location that the business serves&lt;/msg&gt;  &lt;msg desc&#x3D;\&quot;unit and radius are constants and should not be translated\&quot;&gt;**Requires unit:** If the service area is specified with **radius**, a value for **unit** must also be specified&lt;/msg&gt;. | [optional] 
**unit** | **string** | &lt;msg&gt;The unit in which radius is measured.&lt;/msg&gt;  &lt;msg desc&#x3D;\&quot;Header before a list of possible values\&quot;&gt;One of:&lt;/msg&gt; * km - &lt;msg&gt;kilometers&lt;/msg&gt; * mi - &lt;msg&gt;miles&lt;/msg&gt; | [optional] 
**places** | **string[]** | &lt;msg&gt;A list of places served by the location, where each place is either:&lt;/msg&gt; &lt;msg desc&#x3D;\&quot;A list of possible values for a field\&quot;&gt;* a postal code, or * the name of a city.&lt;/msg&gt; | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


