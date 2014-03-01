<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'dds';
$DBPass   = 'dds';
$DBName   = 'dhagga';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
 
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

?>