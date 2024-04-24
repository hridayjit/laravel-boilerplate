<?php
    include('vendor/autoload.php');

    use WhatPress\Lib\WhatPress;

    $whatpress = new WhatPress();

    $groupid='713090752192333825';
    $recieverNumber='7783047354';
    $message=array();
    $msg='Hello Everyone';
    $message[]=$msg;
    $imageurl='';

    
    //var_dump($whatpress->createMessage($recieverNumber, $message, $imageurl));
    //var_dump($whatpress->customerDetails());
    //var_dump($whatpress->getQR());
    //var_dump($whatpress->sentMessageStatus($groupid));
    //var_dump($whatpress->adminusername);



?>