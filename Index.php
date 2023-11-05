<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Register</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
   $(document).ready(function() {

    $('#btn').click(function() {
   // Send data to the server using AJAX
    // I sent data to the registry via the post, and I must receive them through the registry via the post
   $.ajax({
                type: 'POST',
                url: 'register.php',
                data: {
                    UserName:$("#UserName").val(),   
                    password:$("#password").val(), 
                    email:$("#email").val() 

                }, success: function(myData) {


            // Handle the response from the server
            if (myData == "1") {
                $("#myDiv").html("<p style='color:red;'>Please Fill Out The Form!</p>");
            }
            else if (myData == "3") {
                $("#myDiv").html("<p style='color:red;'> Email already exists </p>");
            }
            
            else if (myData == "2") {
                $("#myDiv").html("<p style='color:red;'>Registration successful <a style='color:#08d;' href='Login.php'>login</a></p>");
        
            }
            else if (myData == "6") {
                $("#myDiv").html("<p style='color:red;'> password:It must be at least 8 characters long and contain a mix of letters, numbers, and special characters.</p>");
        
            }
            else if (myData == "7") {
                $("#myDiv").html("<p style='color:red;'>The email address is invalid. It should be of the following format example@gmail.com</p>");
        
            }
            
            else {
                $("#myDiv").html("<p style='color:red;'>Registration failed</p>");
            }
        }
            });   //  end ajax






   });   //  end btn click



    }); //  end j qurey

 
</script>







</head>

<body>
    <div class="form">
        <div class="title">Register</div>
      
      
        <div class="input-container ic1">


            <input  id="UserName" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
            <label for="" class="placeholder"> User Name</label>
        </div>


        <div class="input-container ic2">
            <input id="password" class="input" type="password" placeholder=" " />
            <div class="cut"></div>
            <label for="" class="placeholder">Password</label>
        </div>


        <div class="input-container ic2">
            <input id="email" class="input" type="text" placeholder=" " />
            <div class="cut cut-short"></div>

            
            <label for="" class="placeholder">Email</>
        </div>
        <button type="text" class="submit" id="btn">submit</button>
      
        <div class="subtitle" id="myDiv">  Need an account?  <a style='color:#08d;' href='Login.php'>login</a>  </div>
    </div>
</body>

</html>