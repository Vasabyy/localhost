<link rel="stylesheet" href="/assets/css/main.css">
<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();

    if (!($_SESSION['user']['email'])) {
        header('Location: ../index.php');
        exit();
    }

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://catfact.ninja/fact?max_length=255');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);
?>
<div class='api_text'>
    <div>
<?php

echo $data['fact'];
?>
</div>
<a href='/index.php?logout=yes'>Выйти</a>
 </div>