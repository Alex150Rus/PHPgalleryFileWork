<?php

function logData () {
    $data = date('H:i:s') . "\r\n";
    $file = fopen('log.txt', 'a');
    fwrite($file, $data);
    fclose($file);
}
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 04.12.2018
 * Time: 13:53
 */