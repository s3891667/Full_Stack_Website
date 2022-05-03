<?php

    $information = ['First name', 'Last name', 'Password', 'Email'];
    $uList = "Account list:";
    
    $uList .= "<ul>";

    foreach($information as $information){

        $uList .= "<li>$information</li>";
    }

    $uList .= "</ul>";

    echo $uList;
?>