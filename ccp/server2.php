<?php

if( isset($_POST['submit']) ) {

include_once 'db.php';

// inisialisasi variabel
$MSISDN = $_POST['MSISDN'];
$ADN = $_POST['ADN'];
$keyword = $_POST['keyword'];
$ticketNumber = $_POST['ticketNumber'];

// koneksi ke database
$db = mysqli_connect('localhost', 'root', '', 'ccp');

if (empty($MSISDN) || empty($ADN) || empty($keyword) || empty($ticketNumber)) {
    header("Location: index.php?submit=empty");
    exit();
}
else {
    if ( !is_numeric($MSISDN) ) {
       header("Location: index.php?submit=falseMSISDN");
       exit();
    } 
    elseif ( !is_numeric($ADN) ) {
        header("Location: index.php?submit=falseADN");
        exit();
    }
    else {
       header("Location: index.php?submit=success");
       exit();
    }
}

}