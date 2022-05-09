<?php
//print out all the posts from the xml files;
session_start();
$xml = simplexml_load_file("./posts.xml");

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
    <form action="./user_resources_handling.php" method="post" enctype="multipart/form-data">
        <h1>Posts </h1>
        <div id="container1" class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="text" name="contents"></textarea>
            <label for="floatingTextarea">How do you feel today ?</label>
        </div>
        <div class="mb-3 form-check">
            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="checker" value="one">
            <label class="form-check-label" for="flexRadioDefault2">
                Default mode
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
                <input name="picture" class="custom-file-input" type="file" id="avatar">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    foreach ($xml->user as $user) {
        $tmp = $_SESSION['id'];
        $compare = "user{$tmp}";
        if ($compare == $user['id']) {
            $image = $user->attachment;
            //generate current time to compare the posts upload time
            $currentDate = date_create(date("Y-m-d"));
            $currentTime = date_create(date("h:i:sa"));
            //query time from the xml file
            $postDate = date_create($user->date);

            $dateDiff = date_diff($postDate, $currentDate);
            //check to choose display method time or date
            $check = (int)$dateDiff->format('%a');
            $postTime = date_create($user->time);
            $timeDiff = date_diff($postTime, $currentTime);
            echo $user->content;
            time_check($check, $dateDiff, $timeDiff);
            printf('<img src="%s" class="img-fluid" alt="">', $image);
        }
    }
    ?>
</body>

</html>

<?php
function time_check($check, $dateDiff, $timeDiff)
{
    //day check
    if ($check >= 1) {
        if ($check == 1) {
            echo $dateDiff->format('%a day ago');
        } else {
            echo $dateDiff->format('%a days ago');
        }
    } else {
        // hour check
        if ((int)$timeDiff->format('%h') == 0) {
            //minutes check
            if ((int)$timeDiff->format('%i') <= 0) {
                echo "recently";
            } else {
                echo $timeDiff->format('%i minutes ago');
            }
        } else {
            echo $timeDiff->format('%h hours ago');
        }
    }
}
?>