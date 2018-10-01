<?php
$koneksi = mysqli_connect("localhost", "root", "", "ccp");//isikan sesuai nama database kalian

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}