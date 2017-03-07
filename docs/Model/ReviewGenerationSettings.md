# ReviewGenerationSettings

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**max_contact_frequency** | **int** | If null is provided, no maximum contact frequency will be enforced. | [optional] 
**max_texts_per_day** | **int** | If null is provided, review invitations by text will be disabled. | [optional] 
**site_distribution** | **map[string,object]** | NOTE: First retrieve sites via the Publishers: List endpoint. Valid sites will have REVIEW MONITORING returned in the feature array. | [optional] 
**balancing_optimization** | **string** | Must include one of these choices:  * **&#x60;DISTRIBUTION&#x60;**: The balancing algorithm will prefer following the weighting distribution outlined in Target Distribution of Reviews by Site, even if this means sending users to sites they are not logged into. * **&#x60;MORE_REVIEWS&#x60;**: The balancing algorithm will attempt to generate as many reviews as possible by sending users to sites they are logged into, even if this means less closely following the distribution. | [optional] 
**algorithm_configuration** | **string[]** | Must include zero or more of these choices:  * **&#x60;WEBSITE&#x60;**: Generate more first party reviews when a 1-star review is visible on the first page, that is, within the last five reviews. * **&#x60;RATING&#x60;**: Focus on selected sites that have a rating significantly below the location average. * **&#x60;RECENCY&#x60;**: Ensure each selected site has one review within the last month. | [optional] 
**review_quarantine_days** | **int** | Prevents 1st party reviews from immediately showing up on your website or wherever else they may appear. During this quarantine period, users may respond to reviews, increasing the likelihood consumers revise or remove their negative reviews. This may be set to at most 7 days. | [optional] 
**privacy_policy_override** | **string** | Update request must contain a URL or null. Null indicates that the Yext privacy policy default will be used. | [optional] 
**max_emails_per_day** | **int** | Must contain an integer value between 0 and 200. If 0 or null is provided, review invitations by email will be disabled. | [optional] 
**max_texts_per_month** | **int** | If null is provided, the system enforced maximum will act as the enabled max. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


