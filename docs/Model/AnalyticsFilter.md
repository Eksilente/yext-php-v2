# AnalyticsFilter

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**start_date** | [**\DateTime**](Date.md) | The inclusive start date for the report data.  Defaults to 90 days before the end date. Must be before the date given in &#x60;endDate&#x60;. E.g. ‘2016-08-22’ NOTE: If &#x60;WEEKS&#x60;, &#x60;MONTHS&#x60;, or &#x60;MONTHS_RETAIL&#x60; is in dimensions, startDate must coincide with the beginning and end of a week or month, depending on the dimension chosen. | [optional] 
**location_labels** | **string[]** | Array of location labels | [optional] 
**end_date** | [**\DateTime**](Date.md) | The exclusive end date for the report data.  Defaults to the lowest common denominator of the relevant maximum reporting dates. Must be after the date given in &#x60;startDate&#x60;. E.g. ‘2016-08-30’ NOTE: If &#x60;WEEKS&#x60;, &#x60;MONTHS&#x60;, or &#x60;MONTHS_RETAIL&#x60; is in dimensions, endDate must coincide with the beginning and end of a week or month, depending on the dimension chosen. | [optional] 
**instagram_content_type** | **string** |  | [optional] 
**google_action_type** | **string[]** | Specifies the type of customer actions to be included in the report. Can only be used with the &#x60;GOOGLE_CUSTOMER_ACTIONS&#x60; metric. | [optional] 
**google_query_type** | **string[]** | Specifies the type of queries to be included in the report. Can only be used with the &#x60;GOOGLE_SEARCHES&#x60; metric. | [optional] 
**platforms** | **string[]** | Array of platform IDs. | [optional] 
**search_term** | **string** |  | [optional] 
**partners** | **float[]** | Specifies the partners that should be included in the report. Can only be used with Reviews metrics. | [optional] 
**search_type** | **string** |  | [optional] 
**foursquare_checkin_age** | **string** |  | [optional] 
**frequent_words** | **string[]** | Specifies the words that should be included in the report. Can only be used with Reviews metrics. | [optional] 
**foursquare_checkin_time_of_day** | **string** |  | [optional] 
**ratings** | **int[]** | Specifies the ratings to be included in the report. Can only be used with Reviews metrics. | [optional] 
**foursquare_checkin_gender** | **string** |  | [optional] 
**foursquare_checkin_type** | **string** |  | [optional] 
**hours** | **float[]** | Specifies the hour(s) of day that should be included in the report. Can only, and must be used with the &#x60;GOOGLE_PHONE_CALLS&#x60; metric. | [optional] 
**max_search_frequency** | **double** |  | [optional] 
**folder_id** | **int** | Specifies the folder whose locations and subfolders should be included in the results. Default is 0 (root folder). Cannot be used when &#x60;ACCOUNT_ID&#x60; is in dimensions. | [optional] 
**location_ids** | **string[]** | Array of locationIds | [optional] 
**countries** | **string[]** | Array of 3166 Alpha-2 country codes. | [optional] 
**min_search_frequency** | **double** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


