<?php
include_once '../../../_func/func.php';

$korlap = $db->real_escape_string($_POST['korlap']);;

echo "<option value=''>Pilih Lokasi</option>";

$query = "SELECT * FROM lokasi WHERE korlap=? GROUP BY nm_jalan ORDER BY nm_jalan ASC";
$dewan1 = $db->prepare($query);
$dewan1->bind_param("i", $korlap);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    echo "<option value='" . $row['id_lokasi'] . "'>" . $row['nm_jalan'] . "</option>";
}
