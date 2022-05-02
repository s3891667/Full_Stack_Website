<?php
    <link rel="stylesheet" href="admin_content.css">;
    <link rel="stylesheet" href="./css/bootstrap.css">;
    $information = ['First name', 'Last name', 'Password', 'Email'];
    $uList = "Account list:";
    
    $uList .= "<ul>";

    foreach($information as $information){

        $uList .= "<li>$information</li>";
    }

    $uList .= "</ul>";

    echo $uList;
?>