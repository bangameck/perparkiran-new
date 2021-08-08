<DOCTYPE html>
<html>
 
<head>
    <title>Multiple Upload Foto dengan PHP</title>
    
 
    <!-- <!– Jquery –> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!-- <!– Library Jquery untuk pengiriman form dengan jquery ajax –> -->
    <script src="http://malsup.github.com/jquery.form.js"></script>
	<style>
        #progress { 
			position:relative;
			width:300px;
			color:#111;
			border:1px solid #ddd;
			padding: 1px;
        	border-radius: 3px;
			display: none; 
		}
        #bar { 
			background-color: #d2322d;
			width:0%;
			height:20px;
			border-radius:3px; 
		}
        #percent { 
			position:absolute;
			display:inline-block;
			top:3px;
			left:48%;
		}
 
    </style>
</head>
 
<body>
 
<div style="width:50%;margin:0 auto;border-radius:5px;background:#fff000;padding:10px">
 
    <form name="contoh" method="post" action="upload.php" enctype="multipart/form-data" id="form-upload">
 
        <input type="file" name="foto[]" multiple />
 
        <input type="submit" id="upload-foto" value="Upload">
 
    </form>
 
    <!-- <!– untuk progress bar –> -->
    <div id="progress">
        <div id="bar"></div>
        <div id="percent">0%</div>
    </div>
    <br/>
    <!-- <!– pesan setelah proses upload –> -->
    <div id="message"></div>
 
</div>
 
<script>
 
$(document).ready(function() {
 
    var options = {
        beforeSend: function() {
 
            $("#progress").show();
            $("#bar").width('0%');
            $("#message").html("");
            $("#percent").html("0%");
            $("#upload-foto").attr("disabled",""); // Membuat button upload jadi tidak bisa terklik
            $("#upload-foto").html("Memproses…");
 
        },
        uploadProgress: function(event, position, total, percentComplete) {
 
            $("#bar").width(percentComplete+'%');
            $("#percent").html(percentComplete+'%');
 
        },
        success:function(data, textStatus, jqXHR,ui) {
 
            $("#percent").html("100%");
            $("#progress").hide();
            $("#message").html(data);
            $("#upload-foto").removeAttr("disabled");
            $("#upload-foto").html("Upload");
            $("input[type='file']").val('');
 
        },
        error: function() {
            $("#message").html("<span style=’color:red’> ERROR: Tidak dapat mengupload</span>");
        }
 
    };
 
    // kirim form dengan opsi yang telah dibuat diatas
    $("#form-upload").ajaxForm(options);
 
});
 
</script>
 
</body>
</html>