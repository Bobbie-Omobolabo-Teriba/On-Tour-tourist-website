<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>On Tour!</title>
        <link rel="icon" href="img/plane.png">
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <style>
            #mapDiv
            {
                width:800px;
                height:600px;
                border:thin solid black;
            }
            #dkit_content
            {
                width:400px;
                height:250px;
            }
            #dkit_content img
            {
                clear:both;
                float:left;
                width: 150px;
                border-radius:100px;
                margin: 20px;
                margin-top:0px;
                border:thin solid #CCC;
            }
            #controlPanel 
            {
                float:left;
                width:30%;
                margin-left: 10px;
            }
            select
            {
                display:inline;
            }
            .LocImg
            {
                width: 300px;
                height: 200px;
                margin: 15px;
                display: inline-block;
            }
            h4
            {
                color: #2E64FE;
            }
            #foot
            {
                color:black;
            }
        </style>

        <style>
            #mapDiv
            {
                width:1000px;
                height:600px;
                border:thin solid black;
                margin-right: 20px;

            }
            #dkit_content
            {
                width:400px;
                height:200px;
            }
            #dkit_content img
            {
                clear:both;
                float:left;
                width: 150px;
                border-radius:100px;
                margin: 20px;
                margin-top:0px;
                border:thin solid #CCC;
            }
            #showData
            {
                position:relative;
                display:inline-block;
                margin: 10px;
            }
            #legend {
                font-family: Arial, sans-serif;
                background: #fff;
                padding: 10px;
                margin: 10px;
                border: 3px solid #000;
                width: 20%;
                
            }
            #legend h4 {
                margin-top: 0;
            }
            #legend img {
                vertical-align: middle;
            }





        </style>
        <script>



            var contentSrting;
            var CONTENT = 0;
            var LATITUDE = 1;
            var LONGITUDE = 2;
            var locations;
            var dkit_map;
            var location_marker;
            var mapWindow;
            var iconBase;
            var icons;
            var marker;
            var scaledSize;

            function ajaxGetHotels()
            {
                var fileName = "ajaxGetHotels.php";  /* name of file to send request to */

                var method = "POST";                     /* use POST method */

                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    http_request = new XMLHttpRequest();

                } else
                {

                    // code for IE6, IE5

                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()

                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);
                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<select>";

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        htmlString += "<option>" + jsonData[i].hotelName + ", Price per night: " + jsonData[i].price + ", " + jsonData[i].address + "</option>";
                    }
                    htmlString += "</select><br><i>" + jsonData.length + " Hotels displayed.</i>";
                    document.getElementById('hotels').innerHTML = htmlString;

                }
            }

            function ajaxGetAirport()
            {
                var fileName = "ajaxGetAirport.php";  /* name of file to send request to */

                var method = "POST";                     /* use POST method */

                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    http_request = new XMLHttpRequest();

                } else
                {

                    // code for IE6, IE5

                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()

                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);
                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<select>";

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        htmlString += "<option>" + jsonData[i].airportName + ", " + jsonData[i].address + "</option>";
                    }
                    htmlString += "</select><br><i>" + jsonData.length + " Airports displayed.</i>";
                    document.getElementById('airport').innerHTML = htmlString;

                }
            }

            function ajaxGetMuseum()
            {
                var fileName = "ajaxGetMuseum.php";  /* name of file to send request to */

                var method = "POST";                     /* use POST method */

                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    http_request = new XMLHttpRequest();

                } else
                {

                    // code for IE6, IE5

                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()

                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);
                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<select>";

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        htmlString += "<option>" + jsonData[i].museumName + ", Opening Hours: " + jsonData[i].openTime + "am to " + jsonData[i].closeTime + "pm,  " + jsonData[i].address + "</option>";
                    }
                    htmlString += "</select><br><i>" + jsonData.length + " Museums displayed.</i>";
                    document.getElementById('museum').innerHTML = htmlString;

                }
            }

            function ajaxGetRestaurant()
            {
                var fileName = "ajaxGetRestaurant.php";  /* name of file to send request to */

                var method = "POST";                     /* use POST method */

                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    http_request = new XMLHttpRequest();

                } else
                {

                    // code for IE6, IE5

                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()

                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);
                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<select>";

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        htmlString += "<option>" + jsonData[i].restaurantName + ", Type: " + jsonData[i].type + ", Cost: " + jsonData[i].cost + ", " + jsonData[i].address + "</option>";
                    }
                    htmlString += "</select><br><i>" + jsonData.length + " Restaurants displayed.</i>";
                    document.getElementById('restaurant').innerHTML = htmlString;

                }
            }

            function ajaxGetFunfair()
            {
                var fileName = "ajaxGetFunfair.php";  /* name of file to send request to */

                var method = "POST";                     /* use POST method */

                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    http_request = new XMLHttpRequest();

                } else
                {

                    // code for IE6, IE5

                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()

                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);
                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<select>";

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        htmlString += "<option>" + jsonData[i].funfairName + ",  Price: €" + jsonData[i].price + " , Opening hours: " + jsonData[i].openTime + "am to " + jsonData[i].closeTime + "pm" + "</option>";
                    }
                    htmlString += "</select><br><i>" + jsonData.length + " Amusement parks displayed.</i>";
                    document.getElementById('funfair').innerHTML = htmlString;

                }
            }

            function ajaxLoadMapDetails()
            {
                ajaxGetFunfair();
                ajaxGetRestaurant();
                ajaxGetMuseum();
                ajaxGetAirport();
                ajaxGetHotels();

                var fileName = "getMapDetails.php";  /* name of file to send request to */

                var method = "POST";                     /* use POST method */

                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    http_request = new XMLHttpRequest();

                } else
                {

                    // code for IE6, IE5

                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()

                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);
                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);

                    locations = [[contentSrting, 53.69471189999999, -6.4754917000000205], //newgrange
                        [contentSrting, 53.3446394, -6.259537300000034], //trinity
                        [contentSrting, 52.97188, -9.426510000000007], //cliffs
                        [contentSrting, 53.01197999999999, -6.32983999999999], //glendalough
                        [contentSrting, 52.0180696, -9.504135799999972], //muckross
                        [contentSrting, 53.184251, -6.186632700000018], //powerscourt
                        [contentSrting, 53.0971747, -9.65633200000002], //aran
                        [contentSrting, 52.5200763, -7.890452200000027], //cashel
                        [contentSrting, 53.2743394, -9.049227599999995]];//eyre

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        locations[i][0] = '<div id="dkit_content"><h1>' + jsonData[i].title +
                                '</h1><div id="content"><img src = "' + jsonData[i].image + '">\n\
                                <p>' + jsonData[i].content +
                                '</p></div></div>';

                    }
                    dkit_map = new google.maps.Map(document.getElementById('mapDiv'),
                            {zoom: 7,
                                center: new google.maps.LatLng(53.4239331, -7.940689799999973),
                                mapTypeId: google.maps.MapTypeId.ROADMAP});


                    mapWindow = new google.maps.InfoWindow();
                    for (var i = 0; i < locations.length; i++)
                    {
                        location_marker = new google.maps.Marker({
                            animation: google.maps.Animation.DROP,
                            position: new google.maps.LatLng(locations[i][LATITUDE], locations[i][LONGITUDE]),
                            map: dkit_map});
                        google.maps.event.addListener(location_marker, 'click', (function (location_marker, i)
                        {
                            return function ()
                            {
                                mapWindow.setContent(locations[i][CONTENT]);
                                mapWindow.open(dkit_map, location_marker);
                            }
                        })(location_marker, i));

                    }
                    //  iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';


                    icons = {
                        parking: {
                            name: 'Parking',
                            icon: 'img/parking.jpg'
                        },
                        info: {
                            name: 'Info',
                            icon: 'img/info.png'
                        },
                        hospital: {
                            name: 'Hospital',
                            icon: 'img/hospital.png'
                        },
                        shopping: {
                            name: 'Shopping Centre',
                            icon: 'img/shop.png'
                        },
                        hotel: {
                            name: 'Hotel',
                            icon: 'img/hotel.png'
                        },
                        airport: {
                            name: 'Airport',
                            icon: 'img/airport.png'
                        },
                        funfair: {
                            name: 'Amusement Park',
                            icon: 'img/funfair.png'
                        },
                        museum: {
                            name: 'Museum',
                            icon: 'img/museum.png'
                        },
                        restaurant: {
                            name: 'Restaurant',
                            icon: 'img/restaurant.png'
                        }
                    };

                    var features = [
                        {
                            position: new google.maps.LatLng(53.09615110670179, -7.9102321124724995),
                            type: 'info'
                        }, {
                            position: new google.maps.LatLng(53.424003107992306, -7.9362495399169575),
                            type: 'parking'
                        }, {
                            position: new google.maps.LatLng(52.2613146, -9.6783504),
                            type: 'parking'
                        }, {
                            position: new google.maps.LatLng(52.2486212, -7.078131999999982),
                            type: 'hospital'
                        }, {
                            position: new google.maps.LatLng(52.66254499999999, -8.628582999999935),
                            type: 'hotel'
                        }, {
                            position: new google.maps.LatLng(54.2540865, -8.470665800000006),
                            type: 'hotel'
                        }, {
                            position: new google.maps.LatLng(53.274193, -9.043817600000011),
                            type: 'hotel'
                        }, {
                            position: new google.maps.LatLng(54.0632659, -8.181249699999967),
                            type: 'hotel'
                        }, {
                            position: new google.maps.LatLng(51.8490591, -8.489884500000016),
                            type: 'airport'
                        }, {
                            position: new google.maps.LatLng(52.6996573, -8.914691100000027),
                            type: 'airport'
                        }, {
                            position: new google.maps.LatLng(55.0381768, -8.342578600000024),
                            type: 'airport'
                        }, {
                            position: new google.maps.LatLng(54.2802866, -8.599832900000024),
                            type: 'airport'
                        }, {
                            position: new google.maps.LatLng(53.42644809999999, -6.249909800000069),
                            type: 'airport'
                        }, {
                            position: new google.maps.LatLng(53.54537699999999, -6.459375000000023),
                            type: 'funfair'
                        }, {
                            position: new google.maps.LatLng(52.9746081, -6.277539899999965),
                            type: 'funfair'
                        }, {
                            position: new google.maps.LatLng(53.7051445, -6.363514000000009),
                            type: 'funfair'
                        }, {
                            position: new google.maps.LatLng(53.80063639999999, -9.53550789999997),
                            type: 'funfair'
                        }, {
                            position: new google.maps.LatLng(53.77706, -8.097952999999961),
                            type: 'museum'
                        }, {
                            position: new google.maps.LatLng(53.34291700000001, -6.300048000000061),
                            type: 'museum'
                        }, {
                            position: new google.maps.LatLng(52.293145, -6.504681000000005),
                            type: 'museum'
                        }, {
                            position: new google.maps.LatLng(51.7039873, -8.52162880000003),
                            type: 'restaurant'
                        }, {
                            position: new google.maps.LatLng(52.65589199999999, -7.246687999999949),
                            type: 'restaurant'
                        }, {
                            position: new google.maps.LatLng(53.39220899999999, -6.069431000000009),
                            type: 'restaurant'
                        }, {
                            position: new google.maps.LatLng(52.51963629999999, -7.887455700000032),
                            type: 'restaurant'
                        }, {
                            position: new google.maps.LatLng(52.8332995,-6.923828500000013),
                            type: 'shopping'
                        }, {
                            position: new google.maps.LatLng(53.3528913,-6.390922700000033),
                            type: 'shopping'
                        }, {
                            position: new google.maps.LatLng(54.0005921,-6.398595500000056),
                            type: 'shopping'
                        }

                    ];

                    // Create markers.
                    features.forEach(function (feature) {
                        marker = new google.maps.Marker({
                            animation: google.maps.Animation.DROP,
                            position: feature.position,
                            icon: icons[feature.type].icon,
                            map: dkit_map
                        });
                    });
                    var legend = document.getElementById('legend');
                    for (var key in icons) {
                        var type = icons[key];
                        var name = type.name;
                        var icon = type.icon;
                        var div = document.createElement('div');
                        div.innerHTML = '<img src="' + icon + '"> ' + name;
                        legend.appendChild(div);
                    }

                    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
                }
            }

        </script>
    </head> 
    <body onload="ajaxLoadMapDetails();">
        <!-- Navigation -->
        <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle">
            <i class="fa fa-bars"></i>
        </a>
        <nav id="sidebar-wrapper"> 
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
                <i class="fa fa-times"></i>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class="js-scroll-trigger" href="#top">Menu</a>
                </li>
                <li>
                    <a class="js-scroll-trigger" href="index.html">Home</a>
                </li>
                <li>
                    <a class="js-scroll-trigger" href="http://www.planetware.com/tourist-attractions/ireland-irl.htm" target="blank">Ireland's Top Attractions</a>
                </li>
                <li>
                    <a class="js-scroll-trigger" href="routePlanner.php">Create Account</a>
                </li>
            </ul>
        </nav>
        <!-- Call to Action -->
        <aside class="call-to-action bg-primary text-white">
            <div class="container text-center">
                <h3>View Top Locations and attractions</h3>
            </div>
        </aside>

        <div id="showData">
            <h4>Airports</h4>
            <p id ="airport"></p>
            <h4>Hotels</h4>
            <p id ="hotels"></p>
            <h4>Restaurants</h4>
            <p id ="restaurant"></p>
        </div>
        <div id="showData">
            <h4>Museums</h4>
            <p id ="museum"></p>
            <h4>Amusement Parks</h4>
            <p id ="funfair"></p>
        </div>

        <br>
        <aside class= "map">
            <div id="mapDiv"></div>
            <div id="legend"><h4>Legend</h4></div>
        </aside>
        <br>
        <br>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h4 id="foot">
                            <strong >Go On Tour! today</strong>
                        </h4>
                        <p>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</p>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                (123) 456-7890</li>
                            <li>
                                <i class="fa fa-envelope-o fa-fw"></i>
                                <a href="mailto:name@example.com">ontour@gmail.com</a>
                            </li>
                        </ul>
                        <br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="fa fa-facebook fa-fw fa-3x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/?lang=en" target="_blank">
                                    <i class="fa fa-twitter fa-fw fa-3x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-dribbble fa-fw fa-3x"></i>
                                </a>
                            </li>
                        </ul>
                        <hr class="small">
                        <p class="text-muted">Copyright &copy; On Tour! 2017</p>
                    </div>
                </div>
            </div>
            <a id="to-top" href="#top" class="btn btn-dark btn-lg js-scroll-trigger">
                <i class="fa fa-chevron-up fa-fw fa-1x"></i>
            </a>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/stylish-portfolio.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPAotLGeLeb0fY6ZBxpcr7jmmN9vTQPgQ"></script>




    </body>

</html>