<?php
    include("config.php");
    include("firebaseRDB.php");

    // $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($name == ""){
        echo "Email is required";
    }else if($name == ""){
        echo "Email is required";
    }else if($password == ""){
        echo "Password is required";
    }else{
        $rdb = new firebaseRDB($databaseURL);
        $retrieve = $rdb->retrieve("/user","email","EQUAL",$email);
        $data = json_decode($retrieve, 1);

        if(count($data) > 0){
            echo "Email already registered";
            echo "<a href='logout.php'>Try Login</a>";
        }else{
            $insert = $rdb->insert("/user", [
                "name" => $name,
                "email" => $email,
                "password" => $password
            ]);

            $result = json_decode($insert,1);
            if(isset($result['name'])){
                echo "Signup successful, Now <a href='login.php'>Login</a>";
            }else{
                echo "Signup failed";
            }
        }
    }
