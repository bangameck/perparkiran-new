<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:32:29
 * @modify date 2021-06-11 14:34:09
 * @desc [description]
 */

function sweetAlert($m, $t, $j, $p = '')
{
	global $base_url;
	if ($t == 'sukses') {
		echo "<script type='text/javascript'>
		setTimeout(function (){
		   let timerInterval
		   swal.fire({
			   	title: '$j',
			   	showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
			   	html: '$p',
			   	icon: 'success',
			   	timer: 3000,
			   	timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading()
					timerInterval = setInterval(() => {
					const content = Swal.getHtmlContainer()
					if (content) {
						const b = content.querySelector('b')
						if (b) {
						b.textContent = Swal.getTimerLeft()
						}
					}
					}, 100)
				},
				willClose: () => {
					clearInterval(timerInterval)
				}
				}).then((result) => {
				/* Read more about handling dismissals below */
				if (result.dismiss === Swal.DismissReason.timer) {
					console.log('I was closed by the timer')
				}
				});
			},10);
		   window.setTimeout(function() {
		   window.location.replace('" . $base_url . "$m');
		}, 3000)
	   </script>";
	} elseif ($t == 'error') {
		echo "<script type='text/javascript'>
		setTimeout(function (){
		   let timerInterval
		   swal.fire({
			   title: '$j',
			   showClass: {
					popup: 'animate__animated animate__wobble'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
			   html: '$p<br><hr> <small> Notifikasi ini akan berakhir otomatis dalam <b></b> Milidetik</small>',
			   icon: 'error',
			   timer: 6000,
			   timerProgressBar: true,
			   didOpen: () => {
				   Swal.showLoading()
				   timerInterval = setInterval(() => {
				   const content = Swal.getHtmlContainer()
				   if (content) {
					   const b = content.querySelector('b')
					   if (b) {
					   b.textContent = Swal.getTimerLeft()
					   }
				   }
				   }, 100)
			   },
			   willClose: () => {
				   clearInterval(timerInterval)
			   }
			   }).then((result) => {
			   /* Read more about handling dismissals below */
			   if (result.dismiss === Swal.DismissReason.timer) {
				   console.log('I was closed by the timer')
			   }
			   });
		   },10);
		   window.setTimeout(function() {
		   window.location.replace('" . $base_url . "$m');
		}, 6000)
	   </script>";
	} elseif ($t == 'verify-error') {
		echo "<script type='text/javascript'>
		setTimeout(function (){
		   let timerInterval
		   swal.fire({
			   title: '$j',
			   showClass: {
					popup: 'animate__animated animate__wobble'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
			   html: '$p<br><hr> <small> Notifikasi ini akan berakhir otomatis dalam <b></b> Milidetik</small>',
			   icon: 'error',
			   timer: 12000,
			   timerProgressBar: true,
			   didOpen: () => {
				   Swal.showLoading()
				   timerInterval = setInterval(() => {
				   const content = Swal.getHtmlContainer()
				   if (content) {
					   const b = content.querySelector('b')
					   if (b) {
					   b.textContent = Swal.getTimerLeft()
					   }
				   }
				   }, 100)
			   },
			   willClose: () => {
				   clearInterval(timerInterval)
			   }
			   }).then((result) => {
			   /* Read more about handling dismissals below */
			   if (result.dismiss === Swal.DismissReason.timer) {
				   console.log('I was closed by the timer')
			   }
			   });
		   },10);
		   window.setTimeout(function() {
		   window.location.replace('" . $base_url . "$m');
		}, 12000)
	   </script>";
	}
}

function javascript($m, $t, $pesan = '')
{ //$t=redirect,alert,confirm
	global $base_url;
	if ($t == 'redirect') {
		echo "<script>window.location='" . $base_url . "$m';</script>";
	} elseif ($t == 'alert-error') {
		echo '<br>
		<div class="alert alert-danger dark alert-dismissible fade show" role="alert">
		<strong>Error !</strong>' . $pesan . ' 
		<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div> ';
	} elseif ($t == 'alert-sukses-2') {
		echo '<br>
		<div class="alert alert-success dark alert-dismissible fade show" role="alert">
		<strong>Selamat !</strong>' . $pesan . ' <a class="alert-link" href="' . base_url() . $m . '">Silahkan klik disini</a>
		<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div> ';
	} elseif ($t == 'alert-sukses-3') {
		echo '<br>
		<div class="alert alert-success dark alert-dismissible fade show" role="alert">
		<strong>Selamat !</strong>' . $pesan . ' <a class="alert-link" href="' . base_url() . 'out">Silahkan klik disini</a>
		<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div> ';
	} elseif ($t == 'alert-sukses') {
		echo "<script>alert('$pesan');
				window.location='" . $base_url . "$m';</script>";
	} elseif ($t == 'confirm') {
		echo "			<script language='JavaScript'>
			function non()
			{
			tanya = confirm('Anda Yakin Untuk Menon-Aktifkan Akun Ini ?');
			if (tanya == true) return true;
			else return false;
			}
			function aktif()
			{
			tanya = confirm('Anda Yakin Untuk Meng-Aktifkan Akun Ini ?');
			if (tanya == true) return true;
			else return false;
			}
			function logout()
			{
			tanya =  Swal.fire({
				title: 'Apakah kamu yakin?',
				text: 'Jika anda keluar, Data session akan terhapus dan anda tidak dapat mengakses sistem ini lagi, jika ingin mengkases sistem ini silahkan login kembali.',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
			  }).then((result) => {
				if (result.isConfirmed) {
				  Swal.fire(
					'Berhasil!',
					'Anda berhasil keluar dari sistem. Silhakan login kembali jika ingin mengakses sistem',
					'success'
				  );
				  window.setTimeout(function() {
					window.location.replace('" . $base_url . "out');
				 }, 3000)
				}
			  });
			if (tanya == true) return true;
			else return false;
			}
			function logoutweb()
			{
			tanya =  Swal.fire({
				title: 'Apakah kamu yakin?',
				text: 'Jika anda keluar, Data session akan terhapus.',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
			  }).then((result) => {
				if (result.isConfirmed) {
				  Swal.fire(
					'Berhasil!',
					'Anda berhasil keluar dari sistem.',
					'success'
				  );
				  window.setTimeout(function() {
					window.location.replace('" . $base_url . "p/out');
				 }, 3000)
				}
			  });
			if (tanya == true) return true;
			else return false;
			}
			</script>";
	}
}
