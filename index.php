<!DOCTYPE html>
<html>

<head>
    <title>SerbaPHP - Tentang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1><?php echo "Latihan php";?></h1>
    <?php

function hitungUmur($tahunLahir) {
    $tahunSekarang = date("Y");
    return $tahunSekarang - $tahunLahir;
}
echo "Umur saya: " . hitungUmur(2006) . " tahun<br>";

function konversiUSDkeIDR($usd) {
    $idr = 16000;
    return $usd * $idr;
}
echo "100 USD = " . konversiUSDkeIDR(100) . " IDR<br>";

function celciusToFahrenheit($celcius) {
    return ($celcius * 9/5) + 32;
}
echo "25°C = " . celciusToFahrenheit(25) . "°F<br>";

function hitungLuasLingkaran($jariJari) {
    return pi() * pow($jariJari, 2);
}
echo "Luas lingkaran dengan jari-jari 7 = " . hitungLuasLingkaran(7) . "<br>";

function listPerkalian() {
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= 10; $j++) {
            echo "$i x $j = " . ($i * $j) . " - ";
        }
        echo "<br>";
    }
}
echo "<h4>Perkalian 1 sampai 5:</h4>";
listPerkalian();
    ?>
</body>

</html>