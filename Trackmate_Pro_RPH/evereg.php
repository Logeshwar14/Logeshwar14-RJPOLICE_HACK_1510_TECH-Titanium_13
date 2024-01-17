<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap">
    <title>Event Registration Form</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid #007bff;
        }

        form {
            flex: 1;
            padding: 40px;
            transition: all 0.3s;
            color: #000;
        }

        legend {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #000;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #000;
        }

        input {
            width: calc(100% - 22px);
            padding: 15px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #000;
            outline: none;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 22px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 22px);
            transition: background-color 0.3s, transform 0.2s ease-out;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 100%;
            margin-bottom: 10px;
            color: #000;
        }

        .form-group .date-time-box {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 20px;
        }

        .form-group .date-time-box label {
            width: 48%;
            margin-bottom: 0;
            color: #000;
        }

        .form-group input {
            width: 48%;
            margin-bottom: 20px;
        }

        #map-container {
            flex: 1;
            height: 100vh;
            position: relative;
            transition: all 0.3s;
        }

        #map {
            width: 100%;
            height: 100%;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="evereg_action.php">
            <fieldset>
                <legend>Add Event</legend>
                <label for="event">Event Name</label>
                <input type="text" autocomplete="off" name="event" required>

                <div class="form-group">
                    <div class="date-time-box">
                        <label for="date">Event Date</label>
                        <input type="date" name="date" required>
                    </div>

                    <div class="date-time-box">
                        <label for="time">Event Time</label>
                        <input type="time" name="time" required>
                    </div>
                </div>

                <label for="location">Event Location</label>
                <input type="text" autocomplete="off" name="location" id="locationInput" required>

                <div class="coordinates-box">
                    <label>Event Coordinates</label>
                    <input type="text" autocomplete="off" name="lat" id="lat" class="coordinates-input"
                        required placeholder="Latitude">
                    <input type="text" autocomplete="off" name="log" id="log" class="coordinates-input"
                        required placeholder="Longitude">
                </div>

                <label for="Event_description">Event Description</label>
                <input type="text" autocomplete="off" name="Event_description" required>

                <button type="submit">Add Event</button>
            </fieldset>
        </form>

        

        <div id="map-container">
            <div id="map"></div>
        </div>
    </div>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqkbkdi7tRpRzCDrSmLjpbk9Jx51D14y8&libraries=places&callback=initMap"
        async defer></script>

    <script>
        var map, marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 12.988240, lng: 79.971808 },
                zoom: 15
            });

            marker = new google.maps.Marker({
                position: { lat: 0, lng: 0 },
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {
                updateCoordinatesAndLocation(event.latLng.lat(), event.latLng.lng());
            });

            google.maps.event.addListener(map, 'click', function (event) {
                marker.setPosition(event.latLng);
                updateCoordinatesAndLocation(event.latLng.lat(), event.latLng.lng());
            });
        }

        function updateCoordinatesAndLocation(lat, lng) {
            document.getElementById('lat').value = lat;
            document.getElementById('log').value = lng;

            var geocoder = new google.maps.Geocoder();
            var latLng = new google.maps.LatLng(lat, lng);

            geocoder.geocode({ 'latLng': latLng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        document.getElementById('locationInput').value = results[0].formatted_address;
                    } else {
                        console.log('No results found');
                    }
                } else {
                    console.log('Geocoder failed due to: ' + status);
                }
            });
        }

        // Update map when manually entering latitude and longitude
        document.getElementById('lat').addEventListener('input', function () {
            var lat = parseFloat(document.getElementById('lat').value);
            var lng = parseFloat(document.getElementById('log').value);

            if (!isNaN(lat) && !isNaN(lng)) {
                var newLatLng = new google.maps.LatLng(lat, lng);
                marker.setPosition(newLatLng);
                map.panTo(newLatLng);
                updateCoordinatesAndLocation(lat, lng);
            }
        });

        document.getElementById('log').addEventListener('input', function () {
            var lat = parseFloat(document.getElementById('lat').value);
            var lng = parseFloat(document.getElementById('log').value);

            if (!isNaN(lat) && !isNaN(lng)) {
                var newLatLng = new google.maps.LatLng(lat, lng);
                marker.setPosition(newLatLng);
                map.panTo(newLatLng);
                updateCoordinatesAndLocation(lat, lng);
            }
        });
    </script>

</body>

</html>
