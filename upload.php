<?php
 
$dir_foto = "uploads/";
 
if ( !empty($_FILES['foto']['name']) ) {
 
    for ( $i = 0; $i < count( $_FILES['foto']['name']); $i++) {
 
        $nama_foto = $_FILES['foto']['name'][$i];
        $file_tmp = $_FILES['foto']['tmp_name'][$i];
        $ext = pathinfo( $nama_foto, PATHINFO_EXTENSION );
        $ekstensi = array('jpg','jpeg','png','gif','JPG','mp4'); // Ektensi yg diterima
 
        //filter ektensi foto yang diterima
        if( in_array( $ext, $ekstensi ) ) {
 
            //maks ukuran foto 500kb]
 
            if ( move_uploaded_file( $file_tmp, $dir_foto . $nama_foto ) ) {
 
            echo "Foto <b>" . $_FILES['foto']['name'][$i] . "</b> Berhasil <br />";
 
            } else {
            echo "Foto <b>" . $_FILES['foto']['name'][$i] . " </b>Gagal <br />";
            }
 
        } else {
 
            echo "Format " . $_FILES['foto']['name'][$i] . " tidak didukung. <br>";
        }
 
    }
 
} else {
 
    echo "Foto masih kosong.";
}
 
?>