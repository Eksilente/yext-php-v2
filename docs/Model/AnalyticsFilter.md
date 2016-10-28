# AnalyticsFilter

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**start_date** | [**\DateTime**](Date.md) | The inclusive start date for the report data.  Defaults to 90 days before the end date. E.g. ‘2016-08-22’ NOTE: If WEEKS, MONTHS, or MONTHS_RETAIL is in dimensions, startDate must coincide with the beginning and end of a week or month, depending on the dimension chosen. | [optional] 
**location_ids** | **string[]** | Array of locationIds | [optional] 
**end_date** | [**\DateTime**](Date.md) | The inclusive end date for the report data.  Defaults to the lowest common denominator of the relevant maximum reporting dates. E.g. ‘2016-08-30’ NOTE: If WEEKS, MONTHS, or MONTHS_RETAIL is in dimensions, endDate must coincide with the beginning and end of a week or month, depending on the dimension chosen. | [optional] 
**search_type** | **string** |  | [optional] 
**countries** | **string[]** | Array of 3166 Alpha-2 country codes. | [optional] 
**min_search_frequency** | **double** |  | [optional] 
**foursquare_checkin_gender** | **string** |  | [optional] 
**activity_types** | **string[]** | Activity types to include in an Activity list. | [optional] 
**instagram_content_type** | **string** |  | [optional] 
**location_labels** | **string[]** | Array of location labels | [optional] 
**sites** | **string[]** |  | [optional] 
**platforms** | **string[]** | Array of platform IDs. | [optional] 
**max_search_frequency** | **double** |  | [optional] 
**actors** | **string[]** | List of actors whose activities should be included in an Activity list. | [optional] 
**foursquare_checkin_age** | **string** |  | [optional] 
**foursquare_checkin_type** | **string** |  | [optional] 
**search_term** | **string** |  | [optional] 
**folder_id** | **int** | Specifies the folder whose locations and subfolders should be included in the results. Default is 0 (root folder). Cannot be used when ACCOUNT_ID is in dimensions. | [optional] 
**foursquare_checkin_time_of_day** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


