<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Judul</th>
            <th>Synopsis</th>
            <th>Price</th>
        </tr>
    
    <?php
        $mysqli = new mysqli("localhost", "ken", "ken", "movies_db");
        if ($mysqli->connect_errno) echo "Failed to connect to MySQL: {$mysqli->connect_error}";
        $res = $mysqli->query("select * from movies");
        
        while($row = $res->fetch_assoc()){
            $synopsis;
            if (strlen($row['synopsis'])>=40) $synopsis = substr($row['synopsis'],0,40)."....";
            echo 
            "<tr>
                <td>{$row['title']}</td>
                <td>{$synopsis}</td>
                <td>{$row['price']}</td>
            </tr>
            ";
        }
        
        $mysqli->close();
    ?>

    </table>
</body>

</html>