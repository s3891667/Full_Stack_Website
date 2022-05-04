<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin test</title>
    <link rel="stylesheet" href="admin_content.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="admin_content.js"></script>
</head>

<body>
    <!--Sidebar menu-->
    <div class="sidebar">
        <!--Logo-->
        <div class="profile">
            <div class="logo">
                <img src="picture/logo_picture.png" alt="logo_pic">
            </div>
        </div>
        <div class="title">ADMIN</div>
        <div class="message">Welcom to InstaKilogram!</div>
        
        <!--Navigator list-->
        <ul class="nav_list">
            <li>
                <a href="listofaccount.php">
                    <img src="picture/user-account-solid-24.png" alt="user-account">
                    <span class="link">User-account</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="picture/image-solid-24.png" alt="image-list">
                    <span class="link">List of image</span>
                </a>
            </li>
            
            <!--Log out-->
            <li class ="log_out">
                <a href="../logout.php">
                    <img src="picture/log-out-regular-24.png" alt="log-out">
                    <span class="link">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="user_content">
        <div class="text">List of account</div>
        <form action="" method="POST">
            <input type="text" id="myInput" name="myInput" placeholder="Search...">
        </form>
<?php
        
    $xmldata= simplexml_load_file("accounts.xml") or die("Failed to load");
    $dom_sxe = dom_import_simplexml($xmldata);
    $dom = new DOMDocument ('1.0');
    $dom_sxe = $dom->importNode($dom_sxe, true);
    $dom_sxe = $dom->appendChild($dom_sxe);
    $user = $dom->getElementsByTagName('user');
    drawing_table();
    /*when there is user input*/
    if(isset($_POST['myInput'])){
        $input = $_POST['myInput'];
        foreach($user as $node) {
            $firstname = $node->getElementsByTagName('firstname');
            $lastname = $node->getElementsByTagName('lastname');
            $password = $node->getElementsByTagName('password');
            $email = $node->getElementsByTagName('email');
            $date = $node->getElementsByTagName('date');
            $time = $node->getElementsByTagName('time');
            if ($input != "" ) {
                /*firstname case*/
                foreach($firstname as $child){
                    if(strtoupper($child->nodeValue) == strtoupper($input)){
                        echo "<tr>";
                        echo "<td>" . "$child->nodeValue" . "</td>";

                        foreach($lastname as $child) {
                            echo "<td>" . "$child->nodeValue" . "</td>";
                        }
                        listing($password,$email,$date,$time);

                    }
                }
                /*lastname case*/
                foreach($lastname as $child1){
                    if(strtoupper($child1->nodeValue) == strtoupper($input)){
                        echo "<tr>";
                        
                        foreach($firstname as $child) {
                            echo "<td>" . "$child->nodeValue" . "</td>";
                        }
                        echo "<td>" . "$child1->nodeValue" . "</td>";

                        listing($password,$email,$date,$time);
                    }
                }
            }
            else {
                foreach($firstname as $child) {

                    foreach($firstname as $child) {
                        echo "<td>" . "$child->nodeValue" . "</td>";
                    }

                    foreach($lastname as $child) {
                        echo "<td>" . "$child->nodeValue" . "</td>";
                    }
                    
                    listing($password,$email,$date,$time);
                }
            }
        }
    } 
        echo "</table>";
        
        /*when there is no user input*/
    



    function drawing_table () {
        echo "<table id='myTable'>"
        ."<tr>"
        ."<th>" . "First name" . "</th>"
        ."<th>" . "Last name" . "</th>"
        ."<th>" . "Password" . "</th>"
        ."<th>" . "Email" . "</th>"
        ."<th>" . "Date" . "</th>"
        ."<th>" . "Time" . "</th>"
        ."</tr>";

    }
    

    function listing($password,$email,$date,$time) {
        foreach($password as $child) {
            echo "<td>" . "$child->nodeValue" . "</td>";
        }
        
        foreach($email as $child) {
            echo "<td>" . "$child->nodeValue" . "</td>";
        }

        foreach($date as $child) {
            echo "<td>" . "$child->nodeValue" . "</td>";
        }

        foreach($time as $child) {
            echo "<td>" . "$child->nodeValue" . "</td>";
        }
        echo "</tr>";
        
    }

    function listing2() {
        
    }



?>  
    </div>
</body>
</html>