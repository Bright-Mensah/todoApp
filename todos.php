<?php 

include_once './db/index.php';

error_reporting(0);


header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X- Request-With');

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){


    $apiKey =  '633af4e982a5214aeb8466a3b9f2644acde2e920c91b03269e11bcf8581b878d';

    $api = $_GET['apiKey'];

$createdBy = $_GET['created_by'];
    $query = "select * from todo where created_by='$createdBy' order by id desc";

    $query_run = mysqli_query($connection,$query);

  
        // check if api key exist and matches

        if($api == $apiKey ){
           
            http_response_code(200);

            if(mysqli_num_rows($query_run) > 0){
          
            while($row = mysqli_fetch_assoc($query_run)){
                $time = strtotime($row['created_at']);
                $myFormatForView = date("m/d/y g:i A", $time);
                            
                $data[] = array(
                    "id" => $row['id'],
                    "title" =>$row['title'],
                    "task" => $row['task'],
                    "created_by" => $row['created_by'],
                    "created_at" => $myFormatForView,
                    
                    
                
                );
            }
            echo json_encode(array("data"=>$data));
        }
        else{
            echo json_encode(array("data"=>array("no data exist")));

        }
            

                
        }
        else{
            http_response_code(403);
            $result = array("message"=>"Invalid api key");
            echo json_encode($result);

        }

 

}
else if($method == 'POST'){

    $title = $_POST['title'];
    $task = $_POST['task'];
    $created_by = $_POST['created_by'];

    // check if task and title does not exist already 

     $query = "select title,task from todo where title='$title' and task='$task'";

     $query_run = mysqli_query($connection,$query);

    if(mysqli_num_rows($query_run) > 0){

        $msg = array("msg" =>"task already exist");

    
        echo json_encode($msg);

     }
     else{

        $query = "insert into todo(title,task,created_by)values('$title','$task','$created_by')";
    
        $query_run = mysqli_query($connection,$query);

        if($query_run){
            $msg = array("msg" =>"task added successfully");

            echo json_encode($msg);
        }
        else{
            $msg = array("msg" =>"Something went wrong....");
            echo json_encode($msg);
        }

    }


   



}
else if($method == 'PUT'){

    $apiKey =  '633af4e982a5214aeb8466a3b9f2644acde2e920c91b03269e11bcf8581b878d';

    $id = $_GET['id'];
    $title = $_GET['title'];
    $task  = $_GET['task'];

    $api = $_GET['apiKey'];
   

    $query = "update todo set title='$title', task='$task', updated_at = now() where id ='$id'";

    $query_run = mysqli_query($connection,$query);

    if($api == $apiKey ){

    if($query_run){
        http_response_code(200);
        $msg = array("msg"=> "updated successfully");
        
        echo json_encode($msg);
    }
    else{
        http_response_code(503);
        $msg = array("msg"=> "Something went wrong");
    
        echo json_encode($msg);

    }
}
else{
    http_response_code(405);
    $msg = array("msg"=> "Invalid api key ");
        
    echo json_encode($msg);

}
}
else if($method == 'DELETE'){

    $id = $_GET['id'];
    $api = $_GET['apiKey'];

 $apiKey ='633af4e982a5214aeb8466a3b9f2644acde2e920c91b03269e11bcf8581b878d';

 
 if($api == $apiKey){
        
     $query = "delete from todo where id='$id'";
     $query_run = mysqli_query($connection,$query);

     if($query_run){
        http_response_code(200);

           $msg = array("msg"=> "Task deleted");
          
          echo json_encode($msg);

     }
     else{
           $msg = array("msg"=> "Something went wrong. try again....");
          
          echo json_encode($msg);

     }

    }
    else{
       
          $msg = array("msg"=> "Invalid api key ");

          echo json_encode($msg);
    }
}

?>