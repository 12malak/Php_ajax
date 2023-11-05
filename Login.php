<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>login</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
   $(document).ready(function() {

    $('#btn').click(function() {
   // Send data to the server using AJAX
    // I sent data to the registry via the post, and I must receive them through the registry via the post
   $.ajax({
                type: 'POST',
                url: 'mylog.php',
                data: {
                    UserName:$("#UserName").val(),   
                    password:$("#password").val(), 
                 

                },success: function(myData) {
                    // Handle the response from the server
if(myData==1){
window.location= "Home.php"

}
else if (myData ==0) {
                $("#myDiv").html("<p style='color:red;'>Incorrect password </p>");
            }
else if (myData ==2){
                            $("#myDiv").html("<p  style='color:red;'> User not found </p>");
                        }
                }
            });   //  end ajax






   });   //  end btn click



    }); //  end j qurey

 
</script>







</head>

<body>
    <div class="form">
        <div class="title">Log in</div>
      
      
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


        <button type="text" class="submit" id="btn">submit</button>
      
        <div class="subtitle" id="myDiv"> Need an account <a style='color:#08d;' href='Index.php'> Register</a> </div>
    </div>
</body>

</html>