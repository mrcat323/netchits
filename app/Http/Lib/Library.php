<?php

function is_youtube($address) {
    return (bool) strpos($address, 'youtube');
}

function getcode_youtube($address) {

    if(strpos($address, "&")) {
        $videocode = stristr($email, '&', true);
        return $videocode;
    }

    $code = strstr($address, 'v=');
    $videocode = str_replace("v=", "", $code);
    return $videocode;
}
