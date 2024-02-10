<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "angularSpa");


$result = $conn->query("SELECT * from contactpage");



$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"title":"'   . $rs["title"]        . '",';
    $outp .= '"description":"'   . $rs["description"]        . '",';
    $outp .= '"image":"'. $rs["img"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);

?>