<?php
include_once '../../../_func/func.php';

echo "<option value=''>-- Pilih Korlap --</option>";

$query = "SELECT * FROM korlap ORDER BY nm_korlap ASC";
$korlap = $db->prepare($query);
$korlap->execute();
$res1 = $korlap->get_result();
while ($row = $res1->fetch_assoc()) {
    echo "<option value='" . $row['id_korlap'] . "'>" . $row['nm_korlap'] . "</option>";
}
