<?php

namespace App\ExternalProviders;

use App\Helpers\RequestHelper;
use App\Helpers\RequestHelperHelper;
use Illuminate\Support\Facades\Cache;

class Esri
{

    public function __construct()
    {

    }

    public function test()
    {
        return true;
    }

    /**
     * GET WEB MAP FROM ESRI
     * @param $report
     * @return string
     */
    public function mapImageFromEsriOptions( $report ){

        return '{
                "mapOptions": {
                    "extent": {
                        "xmin": '. $report->longitude .',
                        "ymin": '. $report->latitude .',
                        "xmax": '. $report->longitude .',
                        "ymax": '. $report->latitude .',
                        "spatialReference": {
                            "wkid": 4326
                        }
                    },
                    "scale": 80000,
                    "rotation": 0,
                    "spatialReference": {
                        "wkid": 102100
                    }
                },
                "exportOptions": {
                    "dpi": 150,
                    "outputSize": [1024, 600]
                },
                "operationalLayers": [{
		"id": "HIPS_Facilities_Secured_8865",
		"layerType": "ArcGISMapServiceLayer",
		"url": "https://gis.hipsonline.co.za/server/rest/services/NationalDepartmentofHealthData/Hips_Facility_Secured/MapServer",
		"visibility": true,
		"opacity": 1,
		"title": "HIPS_Facilities_Secured - Focus",
		"itemId": "a51fb7ff84d245aebfeea5d9a4b5cfd8",
		"layers": [{
			"id": 1,
			"name": "Hips_Facility_Secured",
			"showLabels": true,
			"popupInfo": {
				"title": "{facility_name}",
				"mediaInfos": [],
				"popupElements": [{
					"fieldInfos": [{
						"fieldName": "facility_id",
						"isEditable": true,
						"visible": true,
						"label": "Facility ID"
					}, {
						"fieldName": "mfl_facility_code",
						"isEditable": true,
						"visible": true,
						"label": "MFL Code"
					}, {
						"fieldName": "pmis_facility_key",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "PMIS ID"
					}, {
						"fieldName": "ten_id",
						"visible": true,
						"label": "ten_id"
					}, {
						"fieldName": "facility_code_ndoh",
						"isEditable": true,
						"visible": true,
						"label": "facility_code_ndoh"
					}, {
						"fieldName": "facility_code_pcns",
						"isEditable": true,
						"visible": true,
						"label": "facility_code_pcns"
					}, {
						"fieldName": "facility_name",
						"isEditable": true,
						"visible": true,
						"label": "facility_name"
					}, {
						"fieldName": "area_type",
						"isEditable": true,
						"visible": true,
						"label": "area_type"
					}, {
						"fieldName": "facility_type",
						"isEditable": true,
						"visible": true,
						"label": "facility_type"
					}, {
						"fieldName": "gazetted_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "gazetted_beds"
					}, {
						"fieldName": "design_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "design_bed"
					}, {
						"fieldName": "usable_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "usable_bed"
					}, {
						"fieldName": "level_1_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "level_1_bed"
					}, {
						"fieldName": "level_2_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "level_2_bed"
					}, {
						"fieldName": "level_3_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "level_3_bed"
					}, {
						"fieldName": "critical_care_beds",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "critical_care_beds"
					}, {
						"fieldName": "gynaecology_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "gynaecology_beds"
					}, {
						"fieldName": "high_care_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "high_care_beds"
					}, {
						"fieldName": "intensive_care_unit_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "intensive_care_unit_beds"
					}, {
						"fieldName": "maternity_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "maternity_beds"
					}, {
						"fieldName": "medicine_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "medicine_beds"
					}, {
						"fieldName": "neo_natal_high_care_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "neo_natal_high_care_beds"
					}, {
						"fieldName": "neo_natal_intensive_care_unit_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "neo_natal_intensive_care_unit_beds"
					}, {
						"fieldName": "orthopaedic_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "orthopaedic_beds"
					}, {
						"fieldName": "paediatric_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "paediatric_beds"
					}, {
						"fieldName": "psychiatry_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "psychiatry_beds"
					}, {
						"fieldName": "surgery_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "surgery_beds"
					}, {
						"fieldName": "with_oxygen_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "with_oxygen_beds"
					}, {
						"fieldName": "inpatient_total_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "inpatient_total_beds"
					}, {
						"fieldName": "private_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "private_beds"
					}, {
						"fieldName": "scanners",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "scanners"
					}, {
						"fieldName": "test_kits",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "test_kits"
					}, {
						"fieldName": "approved_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "approved_beds"
					}, {
						"fieldName": "available_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "available_beds"
					}, {
						"fieldName": "province",
						"isEditable": true,
						"visible": true,
						"label": "province"
					}, {
						"fieldName": "district_municipality",
						"isEditable": true,
						"visible": true,
						"label": "district_municipality"
					}, {
						"fieldName": "local_muncipality",
						"isEditable": true,
						"visible": true,
						"label": "local_muncipality"
					}, {
						"fieldName": "is_relevant",
						"visible": true,
						"label": "is_relevant"
					}, {
						"fieldName": "latitude",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "latitude"
					}, {
						"fieldName": "longitude",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "longitude"
					}],
					"type": "fields"
				}],
				"fieldInfos": [{
					"fieldName": "facility_id",
					"isEditable": true,
					"visible": true,
					"label": "Facility ID"
				}, {
					"fieldName": "pmis_facility_key",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "PMIS ID"
				}, {
					"fieldName": "mfl_facility_code",
					"isEditable": true,
					"visible": true,
					"label": "MFL Code"
				}, {
					"fieldName": "facility_code_ndoh",
					"isEditable": true,
					"visible": true,
					"label": "facility_code_ndoh"
				}, {
					"fieldName": "facility_code_pcns",
					"isEditable": true,
					"visible": true,
					"label": "facility_code_pcns"
				}, {
					"fieldName": "facility_name",
					"isEditable": true,
					"visible": true,
					"label": "facility_name"
				}, {
					"fieldName": "area_type",
					"isEditable": true,
					"visible": true,
					"label": "area_type"
				}, {
					"fieldName": "facility_type",
					"isEditable": true,
					"visible": true,
					"label": "facility_type"
				}, {
					"fieldName": "gazetted_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "gazetted_beds"
				}, {
					"fieldName": "design_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "design_bed"
				}, {
					"fieldName": "usable_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "usable_bed"
				}, {
					"fieldName": "level_1_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "level_1_bed"
				}, {
					"fieldName": "level_2_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "level_2_bed"
				}, {
					"fieldName": "level_3_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "level_3_bed"
				}, {
					"fieldName": "critical_care_beds",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "critical_care_beds"
				}, {
					"fieldName": "gynaecology_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "gynaecology_beds"
				}, {
					"fieldName": "high_care_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "high_care_beds"
				}, {
					"fieldName": "intensive_care_unit_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "intensive_care_unit_beds"
				}, {
					"fieldName": "maternity_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "maternity_beds"
				}, {
					"fieldName": "medicine_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "medicine_beds"
				}, {
					"fieldName": "neo_natal_high_care_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "neo_natal_high_care_beds"
				}, {
					"fieldName": "neo_natal_intensive_care_unit_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "neo_natal_intensive_care_unit_beds"
				}, {
					"fieldName": "orthopaedic_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "orthopaedic_beds"
				}, {
					"fieldName": "paediatric_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "paediatric_beds"
				}, {
					"fieldName": "psychiatry_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "psychiatry_beds"
				}, {
					"fieldName": "surgery_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "surgery_beds"
				}, {
					"fieldName": "with_oxygen_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "with_oxygen_beds"
				}, {
					"fieldName": "inpatient_total_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "inpatient_total_beds"
				}, {
					"fieldName": "private_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "private_beds"
				}, {
					"fieldName": "scanners",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "scanners"
				}, {
					"fieldName": "test_kits",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "test_kits"
				}, {
					"fieldName": "approved_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "approved_beds"
				}, {
					"fieldName": "available_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "available_beds"
				}, {
					"fieldName": "province",
					"isEditable": true,
					"visible": true,
					"label": "province"
				}, {
					"fieldName": "district_municipality",
					"isEditable": true,
					"visible": true,
					"label": "district_municipality"
				}, {
					"fieldName": "local_muncipality",
					"isEditable": true,
					"visible": true,
					"label": "local_muncipality"
				}, {
					"fieldName": "latitude",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "latitude"
				}, {
					"fieldName": "longitude",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "longitude"
				}, {
					"fieldName": "ten_id",
					"visible": true,
					"label": "ten_id"
				}, {
					"fieldName": "is_relevant",
					"visible": true,
					"label": "is_relevant"
				}],
				"expressionInfos": []
			},
			"layerDefinition": {
				"source": {
					"type": "mapLayer",
					"mapLayerId": 1
				},
				"drawingInfo": {
					"labelingInfo": [{
						"labelExpression": null,
						"labelExpressionInfo": {
							"expression": "$feature[\"facility_name\"]",
							"value": "{facility_name}"
						},
						"useCodedValues": true,
						"maxScale": 0,
						"minScale": 70609,
						"where": null,
						"labelPlacement": "esriServerPointLabelPlacementAboveRight",
						"symbol": {
							"color": [0, 0, 0, 255],
							"type": "esriTS",
							"backgroundColor": null,
							"borderLineColor": null,
							"borderLineSize": null,
							"haloSize": 0.75,
							"haloColor": [255, 255, 255, 255],
							"verticalAlignment": "bottom",
							"horizontalAlignment": "left",
							"rightToLeft": false,
							"angle": 0,
							"xoffset": 0,
							"yoffset": 0,
							"text": "",
							"rotated": false,
							"kerning": true,
							"font": {
								"size": 9,
								"style": "normal",
								"decoration": "none",
								"weight": "normal",
								"family": "Tahoma"
							}
						}
					}],
					"showLabels": true,
					"renderer": {
						"type": "simple",
						"symbol": {
							"color": [255, 170, 0, 255],
							"size": 11.25,
							"angle": 0,
							"xoffset": 0,
							"yoffset": 0,
							"type": "esriSMS",
							"style": "esriSMSCircle",
							"outline": {
								"color": [255, 255, 255, 64],
								"width": 0.75,
								"type": "esriSLS",
								"style": "esriSLSSolid"
							}
						}
					}
				},
				"definitionExpression": "facility_id = \'{'.$report->facility_id.'}\'"
			},
			"minScale": 0,
			"maxScale": 0,
			"parentLayerId": -1,
			"defaultVisibility": true
		}]
	}, {
		"id": "HIPS_Facilities_Secured_8865_7482",
		"layerType": "ArcGISMapServiceLayer",
		"url": "https://gis.hipsonline.co.za/server/rest/services/NationalDepartmentofHealthData/Hips_Facility_Secured/MapServer",
		"visibility": true,
		"visibleLayers": [1],
		"opacity": 1,
		"title": "HIPS_Facilities_Secured - Other",
		"layers": [{
			"id": 1,
			"name": "Hips_Facility_Secured",
			"showLabels": true,
			"popupInfo": {
				"title": "{facility_name}",
				"mediaInfos": [],
				"popupElements": [{
					"fieldInfos": [{
						"fieldName": "facility_id",
						"isEditable": true,
						"visible": true,
						"label": "Facility ID"
					}, {
						"fieldName": "mfl_facility_code",
						"isEditable": true,
						"visible": true,
						"label": "MFL Code"
					}, {
						"fieldName": "pmis_facility_key",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "PMIS ID"
					}, {
						"fieldName": "ten_id",
						"visible": true,
						"label": "ten_id"
					}, {
						"fieldName": "facility_code_ndoh",
						"isEditable": true,
						"visible": true,
						"label": "facility_code_ndoh"
					}, {
						"fieldName": "facility_code_pcns",
						"isEditable": true,
						"visible": true,
						"label": "facility_code_pcns"
					}, {
						"fieldName": "facility_name",
						"isEditable": true,
						"visible": true,
						"label": "facility_name"
					}, {
						"fieldName": "area_type",
						"isEditable": true,
						"visible": true,
						"label": "area_type"
					}, {
						"fieldName": "facility_type",
						"isEditable": true,
						"visible": true,
						"label": "facility_type"
					}, {
						"fieldName": "gazetted_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "gazetted_beds"
					}, {
						"fieldName": "design_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "design_bed"
					}, {
						"fieldName": "usable_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "usable_bed"
					}, {
						"fieldName": "level_1_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "level_1_bed"
					}, {
						"fieldName": "level_2_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "level_2_bed"
					}, {
						"fieldName": "level_3_bed",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "level_3_bed"
					}, {
						"fieldName": "critical_care_beds",
						"isEditable": true,
						"format": {
							"places": 0,
							"digitSeparator": false
						},
						"visible": true,
						"label": "critical_care_beds"
					}, {
						"fieldName": "gynaecology_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "gynaecology_beds"
					}, {
						"fieldName": "high_care_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "high_care_beds"
					}, {
						"fieldName": "intensive_care_unit_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "intensive_care_unit_beds"
					}, {
						"fieldName": "maternity_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "maternity_beds"
					}, {
						"fieldName": "medicine_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "medicine_beds"
					}, {
						"fieldName": "neo_natal_high_care_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "neo_natal_high_care_beds"
					}, {
						"fieldName": "neo_natal_intensive_care_unit_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "neo_natal_intensive_care_unit_beds"
					}, {
						"fieldName": "orthopaedic_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "orthopaedic_beds"
					}, {
						"fieldName": "paediatric_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "paediatric_beds"
					}, {
						"fieldName": "psychiatry_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "psychiatry_beds"
					}, {
						"fieldName": "surgery_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "surgery_beds"
					}, {
						"fieldName": "with_oxygen_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "with_oxygen_beds"
					}, {
						"fieldName": "inpatient_total_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "inpatient_total_beds"
					}, {
						"fieldName": "private_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "private_beds"
					}, {
						"fieldName": "scanners",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "scanners"
					}, {
						"fieldName": "test_kits",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "test_kits"
					}, {
						"fieldName": "approved_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "approved_beds"
					}, {
						"fieldName": "available_beds",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "available_beds"
					}, {
						"fieldName": "province",
						"isEditable": true,
						"visible": true,
						"label": "province"
					}, {
						"fieldName": "district_municipality",
						"isEditable": true,
						"visible": true,
						"label": "district_municipality"
					}, {
						"fieldName": "local_muncipality",
						"isEditable": true,
						"visible": true,
						"label": "local_muncipality"
					}, {
						"fieldName": "is_relevant",
						"visible": true,
						"label": "is_relevant"
					}, {
						"fieldName": "latitude",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "latitude"
					}, {
						"fieldName": "longitude",
						"isEditable": true,
						"format": {
							"places": 3,
							"digitSeparator": false
						},
						"visible": true,
						"label": "longitude"
					}],
					"type": "fields"
				}],
				"fieldInfos": [{
					"fieldName": "facility_id",
					"isEditable": true,
					"visible": true,
					"label": "Facility ID"
				}, {
					"fieldName": "pmis_facility_key",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "PMIS ID"
				}, {
					"fieldName": "mfl_facility_code",
					"isEditable": true,
					"visible": true,
					"label": "MFL Code"
				}, {
					"fieldName": "facility_code_ndoh",
					"isEditable": true,
					"visible": true,
					"label": "facility_code_ndoh"
				}, {
					"fieldName": "facility_code_pcns",
					"isEditable": true,
					"visible": true,
					"label": "facility_code_pcns"
				}, {
					"fieldName": "facility_name",
					"isEditable": true,
					"visible": true,
					"label": "facility_name"
				}, {
					"fieldName": "area_type",
					"isEditable": true,
					"visible": true,
					"label": "area_type"
				}, {
					"fieldName": "facility_type",
					"isEditable": true,
					"visible": true,
					"label": "facility_type"
				}, {
					"fieldName": "gazetted_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "gazetted_beds"
				}, {
					"fieldName": "design_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "design_bed"
				}, {
					"fieldName": "usable_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "usable_bed"
				}, {
					"fieldName": "level_1_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "level_1_bed"
				}, {
					"fieldName": "level_2_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "level_2_bed"
				}, {
					"fieldName": "level_3_bed",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "level_3_bed"
				}, {
					"fieldName": "critical_care_beds",
					"isEditable": true,
					"format": {
						"places": 0,
						"digitSeparator": false
					},
					"visible": true,
					"label": "critical_care_beds"
				}, {
					"fieldName": "gynaecology_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "gynaecology_beds"
				}, {
					"fieldName": "high_care_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "high_care_beds"
				}, {
					"fieldName": "intensive_care_unit_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "intensive_care_unit_beds"
				}, {
					"fieldName": "maternity_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "maternity_beds"
				}, {
					"fieldName": "medicine_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "medicine_beds"
				}, {
					"fieldName": "neo_natal_high_care_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "neo_natal_high_care_beds"
				}, {
					"fieldName": "neo_natal_intensive_care_unit_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "neo_natal_intensive_care_unit_beds"
				}, {
					"fieldName": "orthopaedic_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "orthopaedic_beds"
				}, {
					"fieldName": "paediatric_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "paediatric_beds"
				}, {
					"fieldName": "psychiatry_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "psychiatry_beds"
				}, {
					"fieldName": "surgery_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "surgery_beds"
				}, {
					"fieldName": "with_oxygen_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "with_oxygen_beds"
				}, {
					"fieldName": "inpatient_total_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "inpatient_total_beds"
				}, {
					"fieldName": "private_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "private_beds"
				}, {
					"fieldName": "scanners",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "scanners"
				}, {
					"fieldName": "test_kits",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "test_kits"
				}, {
					"fieldName": "approved_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "approved_beds"
				}, {
					"fieldName": "available_beds",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "available_beds"
				}, {
					"fieldName": "province",
					"isEditable": true,
					"visible": true,
					"label": "province"
				}, {
					"fieldName": "district_municipality",
					"isEditable": true,
					"visible": true,
					"label": "district_municipality"
				}, {
					"fieldName": "local_muncipality",
					"isEditable": true,
					"visible": true,
					"label": "local_muncipality"
				}, {
					"fieldName": "latitude",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "latitude"
				}, {
					"fieldName": "longitude",
					"isEditable": true,
					"format": {
						"places": 3,
						"digitSeparator": false
					},
					"visible": true,
					"label": "longitude"
				}, {
					"fieldName": "ten_id",
					"visible": true,
					"label": "ten_id"
				}, {
					"fieldName": "is_relevant",
					"visible": true,
					"label": "is_relevant"
				}],
				"expressionInfos": []
			},
			"layerDefinition": {
				"source": {
					"type": "mapLayer",
					"mapLayerId": 1
				},
				"drawingInfo": {
					"labelingInfo": [{
						"labelExpression": null,
						"labelExpressionInfo": {
							"expression": "$feature[\"facility_name\"]",
							"value": "{facility_name}"
						},
						"useCodedValues": true,
						"maxScale": 0,
						"minScale": 70609,
						"where": null,
						"labelPlacement": "esriServerPointLabelPlacementAboveRight",
						"symbol": {
							"color": [0, 0, 0, 255],
							"type": "esriTS",
							"backgroundColor": null,
							"borderLineColor": null,
							"borderLineSize": null,
							"haloSize": 0.75,
							"haloColor": [255, 255, 255, 255],
							"verticalAlignment": "bottom",
							"horizontalAlignment": "left",
							"rightToLeft": false,
							"angle": 0,
							"xoffset": 0,
							"yoffset": 0,
							"text": "",
							"rotated": false,
							"kerning": true,
							"font": {
								"size": 8.25,
								"style": "normal",
								"decoration": "none",
								"weight": "normal",
								"family": "Tahoma"
							}
						}
					}],
					"showLabels": true
				},
				"definitionExpression": "facility_id = \'{'.$report->facility_id.'}\'"
			},
			"minScale": 0,
			"maxScale": 0,
			"parentLayerId": -1,
			"defaultVisibility": true
		}]
	}],
                
                "baseMap": {
                    "baseMapLayers": [{
                            "id": "World_Imagery_Firefly_8749",
                            "layerType": "ArcGISTiledMapServiceLayer",
                            "url": "https://fly.maptiles.arcgis.com/arcgis/rest/services/World_Imagery_Firefly/MapServer",
                            "visibility": true,
                            "opacity": 1,
                            "title": "World Imagery (Firefly)"
                        }, {
                            "id": "VectorTile_8368",
                            "type": "VectorTileLayer",
                            "layerType": "VectorTileLayer",
                            "title": "Hybrid Reference Layer",
                            "styleUrl": "https://cdn.arcgis.com/sharing/rest/content/items/cd1d774669c741699063fe6b13f7dbe9/resources/styles/root.json",
                            "isReference": true,
                            "visibility": true,
                            "opacity": 1
                        }
                    ],
                    "title": "Light Gray Canvas"
                },
                "authoringApp": "ArcGISMapViewer",
                "authoringAppVersion": "9.2",
                "initialState": {
                    "viewpoint": {
                        "targetGeometry": {
                            "spatialReference": {
                                "latestWkid": 4326,
                                "wkid": 4326
                            },
                            "xmin": 15.0,
                            "ymin": -35.0,
                            "xmax": 34.0,
                            "ymax": -22.0
                        }
                    }
                },
                "spatialReference": {
                    "latestWkid": 3857,
                    "wkid": 102100
                },
                "version": "2.21"
            }';

    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return mixed
     */
    public function getRefreshToken( $url, $options, $body )
    {

        Cache::forget( 'tokenEsri' );
        $tokenKey = Cache::get( 'tokenEsri' );

        if ( !$tokenKey ) {

            $getRefreshToken = RequestHelper::requestPost( $url, $options, $body );

            if( $getRefreshToken ){

                //  --------- STORE TOKEN IN CACHE
                Cache::put( 'tokenEsri', $getRefreshToken->json(), $seconds = 20000 );

                return $getRefreshToken->json();

            }else{

                return false;

            }

        }else{

            return $tokenKey;

        }

    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return bool|mixed
     */
    public function getServiceAreas( $url, $options, $body ){

        try {

            $serviceAreas = RequestHelper::requestPost( $url, $options, $body );

            return $serviceAreas->json();

        } catch (Exception $e) {

            return false;

        }

    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return bool|mixed
     */
    public function generateMapImage( $url, $options, $body )
    {

        try {

            $mapImage = RequestHelper::requestPost( $url, $options, $body );

            return $mapImage->json();

        } catch (Exception $e) {

            return false;

        }

    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return bool|mixed
     */
    public function networkAnalysisServiceAreas( $url, $options, $body ){

        try {

            $networkAnalysis = RequestHelper::requestPost( $url, $options, $body );

            return array(
                'success' => true,
                'data'    => $networkAnalysis->json()
            );

        } catch (\Exception $e) {

            return array(
                'success' => false,
                'error'   => $e->getMessage()
            );

        }

    }

    /**
     * @param $url
     * @param $options
     * @return array
     */
    public function mapServerQuery( $url, $options ){

        try {

            $mapQuery = RequestHelper::requestGet( $url, $options );

            return array(
                'success' => true,
                'data'    => $mapQuery->json()
            );

        } catch (\Exception $e) {

            return array(
                'success' => false,
                'error'   => $e->getMessage()
            );

        }

    }

    /**
     * @param $url
     * @param $options
     * @return array
     */
    public function getProgressOnJob( $url, $options ){

        try {

            $progress = RequestHelper::requestGet( $url, $options );

            return array(
                'success' => true,
                'data'    => $progress->json()
            );

        } catch (\Exception $e) {

            return array(
                'success' => false,
                'error'   => $e->getMessage()
            );

        }

    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return array
     */
    public function originDestinationCostMatrix( $url, $options, $body ){

        try {

            $networkAnalysis = RequestHelper::requestPost( $url, $options, $body );

            return array(
                'success' => true,
                'data'    => $networkAnalysis->json()
            );

        } catch (\Exception $e) {

            return array(
                'success' => false,
                'error'   => $e->getMessage()
            );

        }

    }

}