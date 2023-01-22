<?php

if (isset ($_POST ["submit"])){ /* Submiting button from SignUp page linked with a Post method to add user infos into database*/
       
    $name = $_POST ["name"]; 
    $email = $_POST ["email"];
    $username = $_POST ["uid"];
    $pwd = $_POST ["pwd"];
    $pwdrepeat = $_POST ["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputSignup ($name, $email, $username, $pwd, $pwdrepeat) !== false) {
        header ("location: ../signup.php?error=emptyinput");
        exit ();
        }
    if (invalidUid ($username) !== false) {
        header ("location: ../signup.php?error=invalidUid");
        exit ();
        } 
    if (pwdMatch ($pwd, $pwdrepeat) !== false) {
        header ("location: ../signup.php?error=passwordsdontmatch");
        exit ();
        }
    
    createUser ($conn, $name, $username, $email, $pwd);     

}
    else {
    header ("location: ../signup.php");
    exit ();
    }