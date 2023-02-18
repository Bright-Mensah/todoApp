

<?php
include './db/index.php';

header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X- Request-With');

$method = $_SERVER['REQUEST_METHOD'];


if($method == 'POST'){
    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $api = $_POST['apiKey'];

    $apiKey =  '633af4e982a5214aeb8466a3b9f2644acde2e920c91b03269e11bcf8581b878d';
    
    $md5Password = md5($password);
    $query = "select * from users where email='$email' and password='$md5Password' ";
    $query_run = mysqli_query($connection,$query);

    if($api == $apiKey){
    if( mysqli_num_rows($query_run) !=0){

            $getData = mysqli_fetch_assoc($query_run);
            
            http_response_code(200);
            $result = array("message"=>"success", "data"=>$getData);
    
            echo  json_encode($result);
        }
        else{
            http_response_code(404);
            $result = array("message"=>"no records were found" );
        
            echo json_encode($result);
    
        }
           
        
    }
    else{
        http_response_code(403);
      $result = array("message"=>"Invalid api key");

      echo  json_encode($result);

  }
  

}
else if($method == 'GET'){
    $email = $_GET['email'];
    $api = $_GET['apiKey'];

    $apiKey =  '633af4e982a5214aeb8466a3b9f2644acde2e920c91b03269e11bcf8581b878d';

   
//     $query = "select name,email, date_format(created_at, '%e-%b-%y') as 'reg_date'
//    from users where email ='$email'";

    $query = "select name,email, date_format(created_at, '%D-%M-%Y') as 'reg_date'
   from users where email ='$email'";
   
    
  

    $query_run = mysqli_query($connection,$query);

    if($api == $apiKey){

        if(mysqli_num_rows($query_run) !=0){

        //     $time = strtotime($datetimeFromMysql);
        // $myFormatForView = date("m/d/y g:i A", $time);
            
            
            $data = mysqli_fetch_assoc($query_run);

            $result= array("data"=>$data);
          

            
            echo json_encode(array("result"=>$result));
        }
        else{
            $msg = "no records were found";
            echo json_encode(array("message"=>$msg));



        }
    }
    else{
        http_response_code(403);
        $msg = "Invalid api key";
        echo json_encode(array("message"=> $msg));


    }
}




?>