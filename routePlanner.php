
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

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

            form{
                margin-left: 20px;
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
            }strong{
                color: mistyrose;
            }
            .req {
                color: goldenrod;
            }
            .row{
                margin-top: 5px;
                margin-bottom: 5px;
                color: mistyrose;
            }
            input{
                margin-top: 5px;
                margin-bottom: 5px;
            }

            select{
                width: 305px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            form{
                margin-bottom: 10px;
            }
            label {
                width: 150px;
                display: inline-block;
                color: black;
            }
            legend
            {
                color: #2E64FE;
            }
            fieldset
            {
                margin-top: 10px;
            }
            .login
            {
                color: mistyrose;
            }
            table{
                margin-top: 20px;
            }
            .addform{
                color: goldenrod;
            }
            .storeHead
            {
                margin-top: 10px;
            }
            h2{
                color: red;
            }
        </style>
        <script type="text/javascript">
            var currentLocationMap;
            var directionsDisplay;
            var directionsService;
            var currentLocationMap;

            function init()
            {
                directionsService = new google.maps.DirectionsService();
                // route planner
                directionsDisplay = new google.maps.DirectionsRenderer();
                currentLocationMap = new google.maps.LatLng(54, -6.3);  // DkIT

                var mapOptions = {zoom: 7,
                    center: new google.maps.LatLng(53.4239331, -7.940689799999973)};
                currentLocationMap = new google.maps.Map(document.getElementById('mapDiv'), mapOptions);
                directionsDisplay.setMap(currentLocationMap);

                // add directions to the route
                directionsDisplay.setPanel(document.getElementById('directions'));
            }

            var travelMode = "DRIVING";
            function calculateRoute()
            {
                var start = document.getElementById('start').value;
                var end = document.getElementById('end').value;

                var request = {origin:start,
                    destination: end,
                    travelMode: google.maps.TravelMode[travelMode]};

                directionsService.route(request, function (response, status)
                {
                    if (status === google.maps.DirectionsStatus.OK)
                    {
                        directionsDisplay.setDirections(response);
                    }
                });
            }
            
            
        </script>
    
    </head>

    <body onload='init(); '>
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
                    <a class="js-scroll-trigger" href="locations.php">Locations</a>
                </li>
            </ul>
        </nav>
        <!-- Call to Action -->

        <aside class="call-to-action bg-primary text-white">
            <div class="container text-center">
                <h3>Plan your trip</h3>
            </div>
        </aside>
        <br> 

        <div class= "map">
            <div id="controlPanel">
                <form action ="addAccount.php" method ="post">
                    <fieldset>
                <legend>CREATE ACCOUNT</legend>
                <div class="row">
                    <label for="email"> E-mail <span class = "req">*</span></label>
                    <input type="email" name ="email" required>
                </div>
                <div class="row">
                    <label for ="password"> Password <span class = "req">*</span></label>
                    <input type="password" name ="password" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>PERSONAL INFORMATION</legend>
                <div class ="row">
                    <label for ="name"> Name <span class = "req">*</span></label>
                    <input type ="text" name="name" required>
                </div>
                <div class ="row">
                    <label for="date"> Date Of Birth <span class = "req">*</span></label>
                    <input type ="date" name="date" required>
                </div>
                <div class="row">
                    <label for ="telephone"> Telephone <span class = "req">*</span></label>
                    <input type ="Tel" name ="phone" required>
                </div>
            </fieldset>
            <fieldset>
                <legend>CHOOSE DESTINATION</legend>
                <div class ="row">
                    <label for ="start">Start<span class = "req">*</span></label>
                    <select name = "start" id="start">
                        <option value = "newgrange">Newgrange, Co. Meath</option>
                        <option value = "tcd">Trinity College, Co. Dublin</option>
                        <option value = "cliffsMoher">Cliffs of Moher, Co. Clare</option>
                        <option value = "glendalough">Glendalough, Co. Wicklow</option>
                        <option value = "muckross">Muckross House & Gardens, Co. Kerry</option>
                        <option value = "powerscourt">Powerscourt House and Gardens, Co. Wicklow</option>
                        <option value = "aranIslands">The Aran Islands</option>
                        <option value = "cashel">The Rock of Cashel</option>
                        <option value = "eyreSquare">Eyre Sqaure, Co. Galway</option>
                    </select>
                </div>
                <div class ="row">
                    <label for ="end"> End <span class = "req">*</span></label>
                    <select name="end" id="end">
                        <option value = "cliffsMoher">Cliffs of Moher, Co. Clare</option>
                        <option value = "glendalough">Glendalough, Co. Wicklow</option>
                        <option value = "muckross">Muckross House & Gardens, Co. Kerry</option>
                        <option value = "powerscourt">Powerscourt House and Gardens, Co. Wicklow</option>
                        <option value = "aranIslands">The Aran Islands</option>
                        <option value = "cashel">The Rock of Cashel</option>
                        <option value = "eyreSquare">Eyre Sqaure, Co. Galway</option>
                        <option value = "tcd">Trinity College, Co. Dublin</option>
                        <option value = "newgrange">Newgrange, Co. Meath</option>
                    </select>
                </div>
                <button type="button" onclick='calculateRoute()'>Calculate Route</button>
            </fieldset>
                    
                    <br>
                    <br>
                <input type ="submit" name="submit" value="Submit" >
                <input type ="reset" name="reset" value="Reset">
                <br>
                <br>
                <button type="button"><i class="material-icons" onclick="travelMode = 'DRIVING';calculateRoute()">directions_car</i></button>
                <button type="button"><i class="material-icons" onclick="travelMode = 'TRANSIT';calculateRoute()">directions_bus</i></button>
                <button type="button"><i class="material-icons" onclick="travelMode = 'BICYCLING';calculateRoute()">directions_bike</i></button>
                <button type="button"><i class="material-icons" onclick="travelMode = 'WALKING';calculateRoute()">directions_walk</i></button>
                <br>
                <br>
                <details><summary>Directions</summary>
                    <div id="directions"></div>
                </details>
                
            </div>
            <div id="mapDiv"></div> 
            
        </form>
        </div>
       
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
