<?php

include_once './db/index.php';

$msg = '';

error_reporting(0);

if(isset($_POST['btnSignUp'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword  = $_POST['retypePassword'];

    if(empty($name)){
        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Name is empty</div>";
    }
    else if(empty($email)){
        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Email is empty</div>";

    }
    else if(empty($password)){
        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Password is empty</div>";
        
    }
    else if(empty($retypePassword)){
        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Retype Password is empty</div>";
        
    }
    else {
        
        // check if retype password and password are the same
        if($retypePassword == $password){
            
            // check if password length is equal or greater than 8
            
            if(strlen($password) >= 8 ){

                $md5Password = md5($password);
                // check whether user data already exist

                $query = "select email , password  from users where email='$email' and password='$md5Password'";
                $query_run = mysqli_query($connection,$query);

                if(mysqli_num_rows($query_run) > 0){
              $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>User already exist. </div>";


                }
                else{

                    // add the user details in the db  or sign the user up
                    $query = "insert into users(name,email,password)values('$name','$email','$md5Password')";
                    $query_run = mysqli_query($connection,$query);
    
                    if($query_run){
                  
                 $msg = "<div class='font-medium text-lime-600 hover:text-lime-500 text-center'>Sign up successful</div>";
                 header("refresh:2;url=https://99a5-154-160-24-164.eu.ngrok.i/todoApp/");
    
    
                    }
                    else{
                        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Something went wrong, try again ......</div>";
    
                    }
                }


            }
            else{
        
                $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Password should be equal or greater than 8 characters</div>";
            }
        }
        else{
            $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Password does not match</div>";

        }

            


      
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign up for an account</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        
        <?php echo $msg; ?>
      </p>
    </div>
    <form class="mt-8 space-y-6" action="" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="name" class="sr-only">Name</label>
          <input id="name" name="name" type="name" autocomplete="name" value="<?php echo $_POST['name'] ?>"  class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Name">
        </div>
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email"  value="<?php echo $_POST['email'] ?>" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="text" autocomplete="current-password" value="<?php echo $_POST['password'] ?>"  class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
        </div>
        <div>
          <label for="retypePassword" class="sr-only">retype password</label>
          <input id="retypePassword" name="retypePassword" type="text" autocomplete="current-password" value="<?php echo $_POST['retypePassword'] ?>"  class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="retype password">
        </div>
      </div>

     
      <div>
        <button type="submit" name="btnSignUp" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            
          </span>
          Sign Up
        </button>
      </div>
    </form>
  </div>
</div>

    
</body>
</html>