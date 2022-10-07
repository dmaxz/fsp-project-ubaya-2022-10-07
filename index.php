<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid;
            border-color: black;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
    <table>
        <?php
        include_once("class/ChromePhp.php");
        include_once("class/Mahasiswa.php");
        include_once("class/Matakuliah.php");
        include_once("class/Peserta.php");




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
        echo "<form action='/index.php' method='post'>";
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
                    if (!$found){
                        echo "<td><input type='number' id='quantity' name='{$mk['kode']}-{$mh['nrp']}' min='0' max='100'></td>";
                    }
                }
            }
            echo "</tr>";
        }
        echo "</table><br><br>";
        echo "<input type='submit'>";
        echo "</form>";


        // $peserta = Peserta::select("1604C", "160420");
        // ChromePhp::log($peserta);
        if (isset($_POST)){
            ChromePhp::log($_POST);
            // var_dump($_POST);
        }
        ?>
        <!-- <form action="/index.php" method="post">
            <label for="quantity">Quantity (between 1 and 5):</label>
            <input type="number" id="quantity" name="quantity" min="0" max="100">
            <input type="submit">
        </form> -->
    </table>
</body>

</html>