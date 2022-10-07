<?php
header("Access-Control-Allow-Origin: *");
$arr = null;
$conn = new mysqli("localhost", "hybrid_160420115", "ubaya", "hybrid_160420115");

if($conn->connect_error) $arr = ["result" => "error", "message" => "Unable to connect"];
else {
    $sql = "select * from movie";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        $data = [];
        while($r = mysqli_fetch_assoc($result)){
            array_push($data, $r);
        }
        $arr = ["result" => "success", "data" => $data];

    }
    else $arr = ["result" => "error", "message" => "sql error $sql"];
    echo json_encode($arr);
    $stmt->close();
    $conn->close();
}
?>