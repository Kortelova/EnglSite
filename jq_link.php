<?php
include_once("db.php");
include_once("reg.php");
include_once("backdictionary.php");
include_once("gamedev.php");
include_once("Mchat.php");
$action = $_REQUEST['a'];
    
switch ($action)
{

    case 'reg':
       // print_r('reg');
        addtodb($_POST);
        break;

    case 'au':
        print_r('AU::::');
        autorization($_POST);
        break;

    case 'logout':
        session_start();
        unset($_SESSION['User_id']);
        unset($_SESSION['token']);
       
        break;
    case 'addtodict':
       
        add_to_db($_POST);
        break;
    case 'getwords':
        getwords($_POST);
        break;
    case 'getcard':
        getcard($_POST);
         break;
    case 'getNameGroup':
        getNameGroup();
        break;
    case 'getMyChat':
        getMyChat();
        break;
    case 'sendmessage':
        sendmessage();
        break;
    case 'getMessageChat':
        getssMessageChat();
        break;
    case 'getuserinfo':
        getuserinfo();
        break;
    case 'createchat':
        break;
    case 'getstats':
        getstats();
        break;
    
}
?>
