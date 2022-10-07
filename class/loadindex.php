<?php
include_once("ChromePhp.php");
include_once("Mahasiswa.php");
include_once("Matakuliah.php");
include_once("Peserta.php");
function load_index()
{
    $arrmk = Matakuliah::select("", "");
    $sizemk = sizeof($arrmk);
    // part where it'll display matakuliah and
    // put it as a header in the table
    echo "<table>";
    echo "<tr>";
    echo "<th>Nama Peserta</th>";
    foreach ($arrmk as $mk) {
        echo "<th>{$mk['nama']}</th>";
    }
    echo "</tr>";

    $arrmh = Mahasiswa::select('', '');
    $sizemh = sizeof($arrmh);
    echo "<form action='index.php' method='post'>";
    foreach ($arrmh as $mh) {
        # code...
        echo "<tr>";
        echo "<td>{$mh['nama']}-{$mh['nrp']}</td>";
        $arrpeserta = Peserta::select('', $mh['nrp'], 0);
        // ChromePhp::log($arrpeserta);
        if (sizeof($arrpeserta) == 0) {
            foreach ($arrmk as $mk) {
                echo "<td><input type='number' id='quantity' name='{$mk['kode']}-{$mh['nrp']}' min='0' max='100'></td>";
            }
        } else {
            foreach ($arrmk as $mk) {
                $found = false;
                foreach ($arrpeserta as $peserta) {
                    if ($peserta['kode'] == $mk['kode'] && $peserta['nrp'] == $mh['nrp']) {
                        echo "<td><input type='number' id='quantity' name='{$peserta['kode']}-{$peserta['nrp']}' min='0' max='100' value='{$peserta['nilai']}'></td>";
                        $found = true;
                        break 1;
                    }
                }
                if (!$found) {
                    echo "<td><input type='number' id='quantity' name='{$mk['kode']}-{$mh['nrp']}' min='0' max='100'></td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table><br><br>";
    echo "<input type='submit'>";
    echo "</form>";
}
