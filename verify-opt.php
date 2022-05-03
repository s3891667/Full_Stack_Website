<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
    <form class="form-login">
        <div class="form-group">
            <input type="text" class="form-control"
                name="otp" id="OTP"
                aria-describedby="emailHelp"
                placeholder="Enter OTP" required>
        </div>
 
        <button type="button"
            class="btn btn-primary btn-lg"
            id="verify-otp">
            verify otp
        </button>
    </form>
    
    
    <script>
        $("#resend-otp").click(function () {
            window.location.replace("resend-otp.php");
        });
        $("#verify-otp").click(function () {
 
            // window.location.replace("index.php");
            var otp1 = document.getElementById("OTP").value;
 
            // alert(otp1);
            var otp2 = ("<?php echo($otp)?>");
             
            // alert(otp2);
            if (otp1 == <?php $opt ?>) {
                window.location.replace("logged-in.php");
            }
            else {
                alert("otp not matches")
            }
        });
    </script>
</body>
</html>