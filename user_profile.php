<?php 
session_start();
echo $_SESSION['id']
?>

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
        <form  action="./user_resources_handling.php" method="post"  >
            <h1>Posts </h1>
            <div id="container1" class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="text" name="contents"   ></textarea>
            <label for="floatingTextarea">How do you feel today ?</label>
        </div>
        <div class="mb-3 form-check">
            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="checker" value="one">
            <label class="form-check-label" for="flexRadioDefault2">
            Default mode <?php   ?>
            </label>
        </div>
            <div class=" mb-3 form-check">
            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="checker" value="two">
            <label class="form-check-label" for="flexRadioDefault1">
            Global mode
            </label>
        </div>
        <div class="mb-3 form-group">
            <div class="custom-file">
            <label id="avatar_label" class="custom-file-label" for="customFile">Choose your pics</label>
            <input name="picture" class="custom-file-input" type="file" id="avatar" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

    <script> 
    </script>
</html>