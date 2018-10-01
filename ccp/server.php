<?php
session_start();

// inisialisasi variabel
$MSISDN = "";
$ADN = "";
$keyword = "";
$ticketNumber = "";
$errors = array();

// koneksi ke database
$db = mysqli_connect('localhost', 'root', '', 'ccp');

if (isset($_POST['submit'])) {
    $MSISDN = mysqli_real_escape_string($db, $_POST['MSISDN']);
    $ADN = mysqli_real_escape_string($db, $_POST['ADN']);
    $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
    $ticketNumber = mysqli_real_escape_string($db, $_POST['ticketNumber']);

    if (empty($MSISDN)) {array_push($errors, "MSISDN harus diisi !");}
    if (empty($ADN)) {array_push($errors, " ADN harus diisi !");}
    if (empty($keyword)) {array_push($errors, "Keyword harus diisi !");}
    if (empty($ticketNumber)) {array_push($errors, "Ticket Number harus diisi !");}

    $user_check_query = "SELECT * FROM users WHERE MSISDN='$MSISDN' OR ADN='$ADN'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $MSISDN)) {
            array_push($errors, "MSISDN harus nomor");
        }
    }

    if (count($errors) == 0) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://localhost/ccp/index.php?msisdn=" . $MSISDN . "&adn=" . $ADN . "&keyword=" . urlencode($keyword));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $query = "INSERT INTO users (MSISDN, ADN, keyword, ticketNumber) VALUES('$MSISDN', '$ADN', '$keyword', '$ticketNumber')";
        mysqli_query($db, $query);
        $_SESSION['MSISDN'] = $MSISDN;
        $_SESSION['sukses'] = "MSISDN Anda adalah : {$MSISDN} <br> ADN Anda adalah : {$ADN} <br>Keyword Anda adalah : {$keyword} <br>Ticket Number Anda adalah : {$ticketNumber} <br>";
        header('location: homePage.php');
    }
}