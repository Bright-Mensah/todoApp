<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form >
      
        <input type="text" id="email" placeholder="email"> <br>
        <input type="text" id="password" placeholder="password">
        <button type="button" id="btnLogin">login</button>
    </form>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$('#btnLogin').click(function(){

   $email =  $('#email').val();
   $password =  $('#password').val();

    $.ajax({
        method:'post',
        url:'http://localhost/todoApp/api',
        data:{"email":$email,"password":$password},
        cache:false,
        success:function(response){
            if(response.message== "success"){
                alert('success');
            }
            
            else{
                alert('failed');
            }
        }

    })
})
</script>
</body>
</html>