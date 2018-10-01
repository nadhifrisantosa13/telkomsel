<?php include('server2.php') ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <link rel="stylesheet"  href="style.css">
  <link rel="stylesheet"  href="style1.css">
<center>
<h2>Conten Complaint Procedure</h2>
<p>Klik Tombol Di Bawah Inih:</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Retry NBP Provisioning')">Retry NBP Provisioning</button>
  <button class="tablinks" onclick="openCity(event, 'Retry NBP Provisioning(Batch)')">Retry NBP Provisioning (Batch)</button>
  <button class="tablinks" onclick="openCity(event, 'MSISDN Encrypted / Decrypted')">MSISDN Encrypted / Decrypted</button>
  <button class="tablinks" onclick="openCity(event, 'Management And Report')">Management And Report</button>
</div>

<div id="Retry NBP Provisioning" class="tabcontent">
   <center>
       <div class="loginbox1">
        <center>
        <img src="logoTelkomsel.png" class="logo">
        <h2>Content Complaint Procedure</h2>

        <form method="POST" action="index.php">
            <p>MSISDN</p>
                <input type="text" name='MSISDN' autocomplete="off" placeholder="ex: 62812xxxxxxx">
            <p>ADN</p>
                <input type="text" name='ADN' autocomplete="off">
            <p>KEYWORD</p>
                <input type="text" name='keyword' autocomplete="off">
            <p>TICKET NUMBER</p>
                <input type="text" name='ticketNumber' autocomplete="off">
            <center><input type="submit" name="submit" value="Submit"></center> 
        </form>
 
    </div>
 
</div>

<div id="Retry NBP Provisioning(Batch)" class="tabcontent">
  <div class="loginbox1">
        <center>
        <img src="logoTelkomsel.png" class="logo">
        <h2>Content Complaint Procedure</h2>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <br>
            <input type="file" name="file" id="file">
            <br>
            <input type="submit" value="Upload File" name="submit">
        </form>
 
    
</div>

<div id="MSISDN Encrypted / Decrypted" class="tabcontent">
  <h3></h3>
  <p></p>
</div>
  <div id="Management And Report" class="tabcontent">
  <h3></h3>
  <p></p>
</center>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if ( strpos($fullUrl, "submit=empty") == true ) {
        echo "<p class='error'>Data masih kosong !</p>";
        exit();
    }
    elseif ( strpos($fullUrl, "submit=falseMSISDN") == true ) {
        echo "<p class='error'>MSISDN harus berupa angka !</p>";
        exit();
    }
    elseif ( strpos($fullUrl, "submit=falseADN") == true ) {
        echo "<p class='error'>ADN harus berupa angka !</p>";
        exit();
    }
    elseif ( strpos($fullUrl, "submit=success") == true ) {
        echo "<p class='success'>Data berhasil dikirim !</p>";
        exit();
    }
?>
     
</body>
</html> 
