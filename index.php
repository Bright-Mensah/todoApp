<?php

include_once './db/index.php';

error_reporting(0);

$msg = '';


session_start();

if(isset( $_SESSION['loggedIn'])){

    header('location:success');
  
}
else{
}

if(isset($_POST['btnSignIn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];


    if(empty($email)){
        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Email is empty</div>";


    }
    else if(empty($password)){
        $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Password is empty</div>";


    }
    else{

        $md5Password = md5($password);
        $query = "select * from users where email='$email' and password='$md5Password' ";

        $query_run = mysqli_query($connection,$query);

        if(mysqli_num_rows($query_run) > 0){

            $data = mysqli_fetch_assoc($query_run);

    

           $_SESSION['name'] = $data['name'];
           $_SESSION['email'] = $data['email'];


            $msg = "<div class='font-medium text-lime-600 hover:text-lime-500 text-center'>Sign in  successful</div>";
            $_SESSION['loggedIn'] = true;
            // header("refresh:2;url=https://mob-todo-app-103-181-222-272.loca.lt/todoApp/success");
            header("refresh:2;url=http://localhost/todoApp/success");
            
        }
        else{
            $msg = "<div class='font-medium text-red-600 hover:text-red-500 text-center'>Either email or password is incorrect</div>";

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
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <a href="signup" class="font-medium text-indigo-600 hover:text-indigo-500">Dont have an account ?Sign up</a>
        <?php echo $msg ?>
      </p>
    </div>
    <form class="mt-8 space-y-6" action="" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" value="<?php echo $_POST['email'] ?>"  class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="text" autocomplete="off"  value="<?php echo $_POST['password'] ?>" class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
          <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
        </div>
      </div>

      <div>
        <button type="submit" name="btnSignIn" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
         
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>

    
</body>
</html>