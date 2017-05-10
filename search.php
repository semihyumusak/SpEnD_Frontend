<?php include ("config.php") ?>
<?php
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM endpoints WHERE endpointUrl LIKE '%".$searchTerm."%' ORDER BY endpointUrl ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['endpointUrl'];
}
//return json data
echo json_encode($data);
?>
