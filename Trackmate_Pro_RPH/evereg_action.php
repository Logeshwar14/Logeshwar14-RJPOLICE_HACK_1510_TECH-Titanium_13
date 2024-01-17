<?php
    include("configeve.php");
    include("firebaseRDB.php");

    $event = $_POST['event'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $lat = $_POST['lat'];
    $log = $_POST['log'];
    $Event_description = $_POST['Event_description'];

    if($event == ""){
        echo "Event name is required";
    }else if($date == ""){
        echo "Date is required";
    }else if($time == ""){
        echo "Time is required";
    }else if($location == ""){
        echo "location is required";
    }else if($lat == ""){
        echo "Latitude is required";
    }else if($log == ""){
        echo "Longitude is required";    
    // }else if($Event_description == ""){
    //     echo "About Event is required";    
    }else{
        $rdb = new firebaseRDB($databaseURL);
        $retrieve = $rdb->retrieve("event","EQUAL",$event);
        $data = json_decode($retrieve, 1);

        // require_once 'firebaseRDB.php';(ChatGPT )

        // // Instantiate your Firebase class or SDK (replace this with your actual implementation)
        // $firebase = new firebaseRDB();

        // // Instantiate your firebaseRDB class
        // $rdb = new firebaseRDB($firebase);

        // $existingData = $rdb->ge("/user/Events");
        // $dataExists = false;

        // foreach ($existingData as $key => $event) {
        //     // Check if the combination of event and date is already present
        //     if ($event['event'] == $event && $event['date'] == $date) {
        //         $dataExists = true;
        //         break; 
        //     }
        // }

        // if (!$dataExists) {
        //     $insert = $rdb->insert("/user/Events", [
        //         "event" => $event,
        //         "date" => $date,
        //         "time" => $time,
        //         "location" => $location,
        //         "lat" => $lat,
        //         "log" => $log
        //     ]);
        
        //     // Check if the insertion was successful
        //     if ($insert) {
        //         echo "Data inserted successfully!";
        //     } else {
        //         echo "Error inserting data. Please try again.";
        //     }
        // } else {
        //     echo "Data already exists in the database.";
        // }

        $insert = $rdb->insert("/",  [
            "event" => $event,
            "date" => $date,
            "time" => $time,
            "location" => $location,
            "lat" => $lat,
            "log" => $log,
            // "Event_description" => $Event_description

        ]);

        if ($insert) {
            echo "Data inserted successfully! <a href='dashboard.php'>Home</a>";
        } else {
            echo "Error inserting data:) <a href='evereg.php'>Please try again</a>";
        }

        

        // if(count($data) != 0){
        //     echo "Event Already Registered.";
        //     echo "<a href='delreg.php'>Delete Event</a>";
        // }else{
        //     $insert = $rdb->insert("/user/Events", [
        //         "event" => $event,
        //         "date" => $date,
        //         "time" => $time,
        //         "location" => $location,
        //         "lat" => $lat,
        //         "log" => $log
        //     ]);

        //     $result = json_decode($insert,1);
        //     if(isset($result['event'])){
        //         echo "Event registered successful, To Home Page <a href='dashboard.php'>Home</a>";
        //     }else{
        //         echo "Registration failed";
        //     }
        // }
    }
    

   