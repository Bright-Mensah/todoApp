<?php
include './db/index.php';

header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X- Request-With');

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $api = $_POST['apiKey'];

    $apiKey =  '633af4e982a5214aeb8466a3b9f2644acde2e920c91b03269e11bcf8581b878d';


    
    $md5Password = md5($password);
    if($api == $apiKey){

        // check if user account exist already 

        $query = "select email from users where email='$email'";
        $query_run = mysqli_query($connection,$query);

        if(mysqli_num_rows($query_run) != 0){

            $msg = array("msg"=> "User exist already");
            
            echo json_encode($msg);
        }
        else{

            $query = "insert into users (name,email,password)values('$name','$email','$md5Password')";
        
            $query_run = mysqli_query($connection,$query);
        
            if($query_run){
                $msg = array("msg"=> "User added Successfully");
                
                echo json_encode($msg);
            }
            else{
                $msg = array("msg"=> "Something went wrong....");
                
                echo json_encode($msg);

            }
        }
    }
    else{
        $msg = array("msg"=> "Invalid API Key");
        
        echo json_encode($msg);

    }

}

?>