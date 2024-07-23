<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />

    <title>HIPS REPORT</title>

    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">--}}

    {{--<script src="https://js.arcgis.com/4.23/"></script>--}}

    <style>
        body{
            font-family: "Roboto","Helvetica","Arial",sans-serif
        }
        table {
            font-family: "Inter";
            font-size: 12px;
            width:100%;
            table-layout: fixed;
        }
        td {
            word-break: break-all;
            text-align: center;
        }
        .small_table {
            width: 50%;
            table-layout: fixed;
        }
        .label {
            text-align: left;
            font-weight: bold;
        }
        .val-blank {
            background-color:#f2f2f2;
            border-color: #4d4d4d;
            border-width: 2px;
            padding: 10px;

        }
        .val-left {
            text-align: left;
        }
        h1  {
            font-family: "Inter";
            font-size: 20px;
            color: #000;
        }
        h2 {
            font-family: "Inter";
            font-size: 14px;

        }
        .facilityName{
            /*font-size: 30px;*/
            text-align: center;
        }
        h3  {
            font-family: "Inter";
            font-size: 14px;
        }
        p {
            font-family: "Inter";
            font-size: 13px;
            color: white;
        }
    </style>

    <script>
        // require(["esri/config","esri/Map", "esri/views/MapView"], function (esriConfig,Map, MapView) {
        //
        //     esriConfig.portalUrl = "https://gis.smec.co.za/portal";
        //
        //     esriConfig.request.interceptors.push({
        //
        //         // set the `urls` property to the URL of the FeatureLayer so that this
        //         // interceptor only applies to requests made to the FeatureLayer URL
        //         urls: 'https://gis.smec.co.za/server/rest/services',
        //
        //         // use the BeforeInterceptorCallback to check if the query of the
        //         // FeatureLayer has a maxAllowableOffset property set.
        //         // if so, then set the maxAllowableOffset to 0
        //         before: function(params) {
        //
        //             params.requestOptions.headers = {"Content-Type" : "application/x-www-form-urlencoded"}
        //             params.requestOptions.body = 'HIPS_token=ZOmIdVBarMFbDfnAdZqrQLsFuvNy4OJj5wZ6bZarU1t6aYFN2mV33TSkLpQozsIMypPOtzcW7BQ4s1PINs9TAWtXAIFYUbUhN9F02Xt2yid7MM24A6BAUcMXfzgW/naVnW99Vj8fIhHtszFyniW+p0DdhRBL+hp6hwjpQ/l7/8k=';
        //             //params.requestOptions.query.HIPS_token = 'QhzRjPr/r7STTdwQabIkXIHklNoBBwDYnr6k4Q7cKkkQnbgzKO3W2WQSzUwlEHZJmJLp9mj63W6PlG8bivp4OY/YNzmT7lCRWfV7RPrZnY4gnxVY6kUgbei3F3pZUaGqjqwcCgOWkNGHlCRyP7J+OOv6hlcDZjQQmYExLARhIH4=';
        //
        //         },
        //
        //         // use the AfterInterceptorCallback to check if `ssl` is set to 'true'
        //         // on the response to the request, if it's set to 'false', change
        //         // the value to 'true' before returning the response
        //         after: function(response) {
        //             // if (!response.ssl) {
        //             //     response.ssl = true;
        //             // }
        //         }
        //
        //     });
        //
        //     // then we load a web map from an id
        //     const webmap = new Map({
        //         // autocasts as new PortalItem()
        //         portalItem: {
        //             // get item id from the props
        //             id: '0139d08674fa4b23baa4e19cb38549a6'
        //         }
        //     });
        //
        //     // and we show that map in a container
        //     view = new MapView({
        //
        //         map: webmap,
        //         // use the ref as a container
        //         container: 'viewDiv'
        //
        //     });
        //
        // });
    </script>

</head>

<body class="antialiased container mt-5">

<table class="table">
    <>

    {{--<div class="facilityName">{{ ( isset($p[0]->district_municipality)) ? $p[0]->district_municipality : '' }}</div>--}}

    @foreach ($p as $data)

        <h1 class="facilityName" style="margin-top: 30px; text-decoration: underline;">{{ $data->district_municipality }} - {{ $data->primaryfacilityname }}</h1>

        <img width="100%" src="{{ storage_path('app/' . $data->facilitycodendoh . '.jpg' ) }}">

        <span style="display: block; height:50"></span>

        <table>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td class="label">Facility Name: </td>
                <td class="val-left val-blank" colspan="3">{{ $data->primaryfacilityname }}</td>
                <td class="label">Facility MFL Code: </td>
                <td class="val-left val-blank"  colspan="3">{{ $data->facilitycodendoh }}</td>
                <td class="label">Facility Category: </td>
                <td class="val-left val-blank"  colspan="3">{{ $data->p_facility_category }}</td>
                <td class="label">Facility Owner: </td>
                <td class="val-left val-blank"  colspan="3">{{ $data->p_facility_owner }}</td>
            </tr>
            <tr>
                <td class="label">Address: </td>
                <td class="val-left val-blank" colspan="12"> * Address</td>
            </tr>
            {{--<tr>--}}
                {{--<td class="label">Property Type: </td>--}}
                {{--[% CASE WHEN length("addresstype") > 0 THEN '<td>' + "addresstype" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
                {{--<td class="label">Office Park: </td>--}}
                {{--[% CASE WHEN length("officepark") > 0 THEN '<td>' + "officepark" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
                {{--<td class="label">Building (Floor): </td>--}}
                {{--[% CASE WHEN length("building") > 0 AND length("floor") > 0 THEN '<td>' + "building" + ' (' + "floor" + ')</td>' WHEN length("building") > 0 THEN '<td>' + "building" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
            {{--</tr>--}}
            <tr>
                <td class="label">District: </td>
                <td class="val-left val-blank"  colspan="3"> {{ $data->district_municipality }}</td>
            </tr>
            <tr>
                <td class="label">Province: </td>
                <td class="val-left val-blank"  colspan="3"> {{ $data->province }}</td>
            </tr>
            <tr>
                <td class="label">Status: </td>
                <td class="val-left val-blank"  colspan="3"> {{ $data->p_status }}</td>
            </tr>
            {{--<tr>--}}
                {{--<td class="label">City: </td>--}}
                {{--[% CASE WHEN length("city") > 0 THEN '<td>' + "city" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
                {{--<td class="label">Town: </td>--}}
                {{--[% CASE WHEN length("town") > 0 THEN '<td>' + "town" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
                {{--<td class="label">Suburb: </td>--}}
                {{--[% CASE WHEN length("suburb") > 0 THEN '<td>' + "suburb" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="label">Rural Town: </td>--}}
                {{--[% CASE WHEN length("ruraltown") > 0 THEN '<td>' + "ruraltown" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
                {{--<td class="label">Rural Community: </td>--}}
                {{--[% CASE WHEN length("ruralcommunity") > 0 THEN '<td>' + "ruralcommunity" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
                {{--<td class="label">Village: </td>--}}
                {{--[% CASE WHEN length("village") > 0 THEN '<td>' + "village" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="label">Township: </td>--}}
                {{--[% CASE WHEN length("township") > 0 THEN '<td>' + "township" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Settlement: </td>--}}
                {{--[% CASE WHEN length("settlement") > 0 THEN '<td>' + "settlement" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Province: </td>--}}
                {{--[% CASE WHEN length("province") > 0 THEN '<td>' + "province" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="label">Country: </td>--}}
                {{--[% CASE WHEN length("country") > 0 THEN '<td>' + "country" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Postal Code: </td>--}}
                {{--[% CASE WHEN length("postalcode") > 0 THEN '<td>' + "postalcode" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Bag Address: </td>--}}
                {{--[% CASE WHEN length("bagaddress") > 0 THEN '<td>' + "bagaddress" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="label">Postal Address: </td>--}}
                {{--[% CASE WHEN length("postaladdress") > 0 THEN '<td>' + "postaladdress" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Administrative Area: </td>--}}
                {{--[% CASE WHEN length("administrativearea") > 0 THEN '<td>' + "administrativearea" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Gated Community: </td>--}}
                {{--[% CASE WHEN length("gatedcommunity") > 0 THEN '<td>' + "gatedcommunity" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="label">Roman Catholic M: </td>--}}
                {{--[% CASE WHEN length("romancatholicmission") > 0 THEN '<td>' + "romancatholicmission" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label">Unknown: </td>--}}
                {{--[% CASE WHEN length("unknown") > 0 THEN '<td>' + "unknown" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

                {{--<td class="label"> </td>--}}
                {{--<td></td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="label">Latitude: </td>--}}
                {{--[% CASE WHEN "latitude" IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("latitude") + '</td>'   END %]--}}

                {{--<td class="label">Longitude: </td>--}}
                {{--[% CASE WHEN "longitude" IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("longitude") + '</td>' END %]--}}

                {{--<td class="label">Country: </td>--}}
                {{--[% CASE WHEN length("country") > 0 THEN '<td>' + "country" + '</td>' ELSE '<td class="val-blank"></td>' END %]--}}

            {{--</tr>--}}
        </table>

        <h2>Facility</h2>

        <table>
            <tr>
                <td class="label" >Type of Facility: </td>
                <td class="val-left val-blank" colspan="12"> {{ $data->facilitytype  }}</td>
            </tr>
            {{--<tr>--}}
                {{--<td class="label" style="width:25%;">Type of Covid-19 Facility: </td>--}}
                {{--[% CASE WHEN length("covid_facility_types") > 0 THEN '<td class="val-left" style="width:75%;">' + "covid_facility_types" + '</td>' ELSE '<td class="val-blank" style="width:75%;"></td>' END %]--}}
            {{--</tr>--}}
        </table>
        <!-- <table>
            <tr>
                <td class="label">Permit Status: </td>
                [% CASE WHEN "Status" IS NULL THEN '<td>' + "Status" + '</td>' ELSE '<td class="val-blank"></td>' END %]

                <td class="label">Permit No.: </td>
                [% CASE WHEN "PermitNumber" IS NULL THEN '<td>' + "PermitNumber" + '</td>' ELSE '<td class="val-blank"></td>' END %]

                <td class="label">Permit Type: </td>
                [% CASE WHEN length("TypeName") > 0 THEN '<td>' + "TypeName" + '</td>' ELSE '<td class="val-blank"></td>' END %]

            </tr>
        </table>  -->

        {{--<h2>Facility Indicators</h2>--}}
        {{--<table>--}}
            {{--<tr>--}}
                {{--<th>Catchment Population</th>--}}
                {{--<th>Vulnerable Population</th>--}}
                {{--<th>Households</th>--}}
                {{--<th>Average OPD / month</th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--[% CASE WHEN length("catchPop") > 0 THEN '<td>' + "catchPop" + '</td>'                      ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("vulnPop") > 0 THEN '<td>' + "vulnPop" + '</td>'                        ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("household") > 0 THEN '<td>' + "household" + '</td>'                    ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("AverageOPDperMonth") > 0 THEN '<td>' + "AverageOPDperMonth" + '</td>'  ELSE '<td class="val-blank">TBC</td>' END %]--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<th>Average New Admissions</th>--}}
                {{--<th>Beds/1000</th>--}}
                {{--<th>ICU Beds/1000</th>--}}
                {{--<th>Gazetted Beds</th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--[% CASE WHEN length("AverageNewAdmissions") > 0 THEN '<td>' + "AverageNewAdmissions" + '</td>'  ELSE '<td class="val-blank">TBC</td>'   END %]--}}
                {{--[% CASE WHEN length("bedsPerThousand") > 0 THEN '<td>' + "bedsPerThousand" + '</td>'            ELSE '<td class="val-blank">TBC</td>'   END %]--}}
                {{--[% CASE WHEN length("icuBedsPerThousand") > 0 THEN '<td>' + "icuBedsPerThousand" + '</td>'      ELSE '<td class="val-blank">TBC</td>'   END %]--}}
                {{--[% CASE WHEN "gazetted_beds" IS NULL THEN '<td class="val-blank"></td>'                         ELSE '<td>' + to_string("gazetted_beds") + '</td>' END %]--}}
            {{--</tr>--}}
        {{--</table>--}}

        {{--<h2>Facility Details</h2>--}}

        {{--<table>--}}
            {{--<tr>--}}
                {{--<th>Laundry Facilities</th>--}}
                {{--<th>Kitchen Facilities</th>--}}
                {{--<th>First Aid Facilities</th>--}}
                {{--<th>Security Facilities</th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--[% CASE WHEN length("availabilitylaundry") > 0 THEN '<td>' + "availabilitylaundry" + '</td>'                    ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("availabilitykitchen") > 0 THEN '<td>' + "availabilitykitchen" + '</td>'                    ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("availabilityhealthorfirstaid") > 0 THEN '<td>' + "availabilityhealthorfirstaid" + '</td>'  ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("availabilitysecurity") > 0 THEN '<td>' + "availabilitysecurity" + '</td>'                  ELSE '<td class="val-blank">TBC</td>' END %]--}}
            {{--</tr>--}}
        {{--</table>--}}

        {{--<h2>Staffing </h2>--}}

        {{--<table>--}}
            {{--<tr>--}}
                {{--<th>Doctors</th>--}}
                {{--<th>Nurses</th>--}}
                {{--<th>Total Employees</th>--}}
                {{--<th>Staff Trained (Quarantine)</th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--[% CASE WHEN length("nurses") > 0 THEN '<td>' + "nurses" + '</td>'                                          ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("doctors") > 0 THEN '<td>' + "doctors" + '</td>'                                        ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("numberofemployees") > 0 THEN '<td>' + "numberofemployees" + '</td>'                    ELSE '<td class="val-blank">TBC</td>' END %]--}}
                {{--[% CASE WHEN length("hasstafftrainedquarantine") > 0 THEN '<td>' + "hasstafftrainedquarantine" + '</td>'    ELSE '<td class="val-blank">TBC</td>' END %]--}}
            {{--</tr>--}}
        {{--</table>--}}

        {{--<h2>Inventory</h2>--}}

        {{--<table>--}}
            {{--<tr>--}}
                {{--<th>Scanners</th>--}}
                {{--<th>Medicines</th>--}}
                {{--<th>Test Kits</th>--}}
                {{--<th></th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--[% CASE WHEN "scanners"  IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("scanners") + '</td>'   END %]--}}
                {{--[% CASE WHEN "medicines" IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("medicines") + '</td>'  END %]--}}
                {{--[% CASE WHEN "testKits"  IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("testKits") + '</td>'   END %]--}}
                {{--<td></td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<th>Approved Beds</th>--}}
                {{--<th>Available Beds</th>--}}
                {{--<th>Private Beds</th>--}}
                {{--<th>Total Beds</th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--[% CASE WHEN "approvedBeds"  IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("approvedBeds") + '</td>'  END %]--}}
                {{--[% CASE WHEN "availableBeds" IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("availableBeds") + '</td>' END %]--}}
                {{--[% CASE WHEN "privateBeds"   IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("privateBeds") + '</td>'   END %]--}}
                {{--[% CASE WHEN "totalBeds"     IS NULL THEN '<td class="val-blank"></td>' ELSE '<td>' + to_string("totalBeds") + '</td>'     END %]--}}
            {{--</tr>--}}
        {{--</table>--}}

        <h2>Beds (In Patient)</h2>

        <table>
            <tr>
                <td class="label">Maternity: </td>
                <td class="val-left val-blank"  colspan="3">{{$data->maternity}}</td>
                <td class="label">Neonatal (HC): </td>
                <td class="val-left val-blank"  colspan="3">{{$data->neonatalhighcare}}</td>
                <td class="label">Neonatal (ICU): </td>
                <td class="val-left val-blank"  colspan="3">{{$data->neonatalintensivecareunit}}</td>
                <td class="label">Paediatric: </td>
                <td class="val-left val-blank"  colspan="3">{{$data->paediatric}}</td>
            </tr>
            <tr>
                <td class="label">Gynaecology: </td>
                <td class="val-left val-blank"  colspan="3">{{ $data->gynaecology }}</td>
                <td class="label">Surgery: </td>
                <td class="val-left val-blank" colspan="3">{{$data->surgery}}</td>
                <td class="label">Mate: </td>
                <td class="val-left val-blank" colspan="3">{{$data->mate}}</td>
                <td class="label">Medicine: </td>
                <td class="val-left val-blank" colspan="3">{{$data->medicine}}</td>
            </tr>
            <tr>
                <td class="label">With Oxygen: </td>
                <td class="val-left val-blank" colspan="3">{{$data->withoxygen}}</td>
                <td class="label">Critical Care: </td>
                <td class="val-left val-blank" colspan="3">{{$data->criticalcare}}</td>
                <td class="label">High Care: </td>
                <td class="val-left val-blank" colspan="3">{{$data->highcare}}</td>
                <td class="label">ICU: </td>
                <td class="val-left val-blank" colspan="3">{{$data->intensivecareunit}}</td>
            </tr>
            <tr>
                <td class="label">Orthopaedic: </td>
                <td class="val-left val-blank" colspan="3">{{$data->orthopaedic}}</td>
                <td class="label">Psychiatry: </td>
                <td class="val-left val-blank" colspan="3">{{$data->psychiatry}}</td>
                <td class="label"> </td>
                <td></td>
                <td class="label"> </td>
                <td></td>
            </tr>
            <tr>
                <td class="label">Gazetted: </td>
                <td class="val-left val-blank" colspan="3">{{$data->gazetted_beds}}</td>
                <td class="label"> </td>
                <td></td>
            </tr>
        </table>

        <span style="display: block; height:200"></span>

        {{--<h2>Contact Persons ([% relation_aggregate( relation:='facility_contacts',aggregate:='count',expression:="person"  ) %])</h2>--}}
        {{--<table>--}}
            {{--<tr>--}}
                {{--<th>Name</th>--}}
                {{--<th>Position</th>--}}
                {{--<th>Language</th>--}}
                {{--<th>Mobile (Other)</th>--}}
                {{--<th>Email</th>--}}
            {{--</tr>--}}
        </table>

    @endforeach

    </tbody>
</table>



</body>

</html>