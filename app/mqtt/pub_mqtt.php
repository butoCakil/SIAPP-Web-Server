<?php
// beri feedback
$array = array(
    "0" => array(
        "message" => "404",
        "info" => "ERROR. Method Not Allowed"
    )
);

// encode array to json
$json = json_encode(array('respon' => $array));

require("vendor/autoload.php"); // Memuat pustaka phpMQTT

$host = "localhost";
$port = 1883;
// $port = 1884;
$username = "ben";
$password = "1234";
$topic = "responServer";
// $topic = "responServer_" . $nodevice; // Menggunakan topik "responServer" dengan tambahan ID perangkat
$message = @$jsonString ? $jsonString : "{" . $json . "}";


$mqtt = new \Bluerhinos\phpMQTT($host, $port, "PHP Client");

if ($mqtt->connect(true, NULL, $username, $password)) {
    echo "Koneksi berhasil publish: $topic";
    echo "\n";
    $mqtt->publish($topic, $message, 0);
    $mqtt->close();
} else {
    echo "Koneksi gagal.";
}
