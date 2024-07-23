<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>ArcGIS API for JavaScript Tutorials: Display a map</title>

    <style>
        html,
        body,
        #viewDiv {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
        }
    </style>

    <link rel="stylesheet" href="https://js.arcgis.com/4.23/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.23/"></script>

    <script>
        require(["esri/config","esri/Map", "esri/views/MapView"], function (esriConfig,Map, MapView) {

            esriConfig.portalUrl = "https://gis.smec.co.za/portal";

            esriConfig.request.interceptors.push({

                // set the `urls` property to the URL of the FeatureLayer so that this
                // interceptor only applies to requests made to the FeatureLayer URL
                urls: 'https://gis.smec.co.za/server/rest/services',

                // use the BeforeInterceptorCallback to check if the query of the
                // FeatureLayer has a maxAllowableOffset property set.
                // if so, then set the maxAllowableOffset to 0
                before: function(params) {

                    params.requestOptions.headers = {"Content-Type" : "application/x-www-form-urlencoded"}
                    params.requestOptions.body = 'HIPS_token=ZOmIdVBarMFbDfnAdZqrQLsFuvNy4OJj5wZ6bZarU1t6aYFN2mV33TSkLpQozsIMypPOtzcW7BQ4s1PINs9TAWtXAIFYUbUhN9F02Xt2yid7MM24A6BAUcMXfzgW/naVnW99Vj8fIhHtszFyniW+p0DdhRBL+hp6hwjpQ/l7/8k=';
                    //params.requestOptions.query.HIPS_token = 'QhzRjPr/r7STTdwQabIkXIHklNoBBwDYnr6k4Q7cKkkQnbgzKO3W2WQSzUwlEHZJmJLp9mj63W6PlG8bivp4OY/YNzmT7lCRWfV7RPrZnY4gnxVY6kUgbei3F3pZUaGqjqwcCgOWkNGHlCRyP7J+OOv6hlcDZjQQmYExLARhIH4=';

                },

                // use the AfterInterceptorCallback to check if `ssl` is set to 'true'
                // on the response to the request, if it's set to 'false', change
                // the value to 'true' before returning the response
                after: function(response) {
                    // if (!response.ssl) {
                    //     response.ssl = true;
                    // }
                }

            });

            console.log(esriConfig);

            // then we load a web map from an id
            const webmap = new Map({
                // autocasts as new PortalItem()
                portalItem: {
                    // get item id from the props
                    id: '0139d08674fa4b23baa4e19cb38549a6'
                }
            });

            // and we show that map in a container
            view = new MapView({

                map: webmap,
                // use the ref as a container
                container: 'viewDiv'

            });

        });

    </script>

</head>
<body>
<div id="viewDiv"></div>
</body>
</html>