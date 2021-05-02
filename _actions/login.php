<?php

/*
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if ($email === 'john.doe@gmail.com' and $password === 'jd123pwd') {
    $_SESSION['user'] = ['username' => 'John Doe'];
    header('location: ../profile.php');
} else {
    header('location: ../index.php?incorrect=1');
}
*/
session_start();
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST['email'];
$mypassword = $_POST['password'];


//md5 passowrd authentication
/*
$email = $_POST['email'];
$password = md5( $_POST['password'] );
*/

//hash password authentication
$pwd = new UsersTable(new MySQL());
$hash = $pwd->getALL();
count($hash);
foreach($hash as $hashpass);
$hashpassword = $hashpass->password;

//echo ("$hashpassword" . "step1 <br>");


if(password_verify($mypassword, $hashpassword)){

  //  echo ("$hashpassword" . "step2 <br>");
    $password = $hashpassword;

    $table = new UsersTable(new MySQL());
    $user = $table->findByEmailAndPasword($email, $password);
    //        echo ( "$password" ."step3" );
        if ($user)  {
            if($table->suspend($user->id)) {
            HTTP::redirect("/index.php", "suspend=1");
           }
            
            $_SESSION['user'] = $user;
            HTTP::redirect("/profile.php");
        } else {
            HTTP::redirect("/index.php", "incorrect=1");
        } 
    } 
