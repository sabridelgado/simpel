<?php
$jumlahAntrian = 5;
$durasi = 60 * 60;

for ($i = 0; $i <= $jumlahAntrian; $i++) {
    $randomValue = rand(0 * 10, 1 * 10) / 10;
    $result = abs(1 / $jumlahAntrian * log($randomValue));

    echo $randomValue;
};
