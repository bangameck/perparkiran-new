<?php 
include '_func/database.php';
if (empty($_SESSION['username'])) {
    $hid = 'hidden';
} else {
    $hid = '';
} 
if ($_SESSION['level']=='7') {
    $profil     = 'p/users/profile';
    $setting    = 'p/users/settings';
    $logout     = 'p/out';
} else {
    $profil     = 'profile/'.$_SESSION['username'];
    $setting    = 'setting';
    $logout     = 'p/out';
}

if (empty($_SESSION['username'])) {
    $lgn = '<a href="'.base_url().'login-for-users" class="d-none d-xl-block button rounded-pill bg-color-2 button-light text-dark ls0 fw-medium m-0"><i class="icon-line2-login"></i> Login / Register</a>';
    $out = '';
} else if ($_SESSION['level']!='7') {
    $lgn = '<a href="'.base_url().'dashboard" class="d-none d-xl-block button rounded-pill ls0 fw-medium my-0 ms-2 d-none d-sm-flex"><i class="icon-user-shield"></i> Admin Page</a>';
    $out = '<a href="'.base_url().'p/out" style="background-color: #df4759;" class="d-none d-xl-block button rounded-pill bg-color-2 button-light text-light ls0 fw-medium m-0" onclick="return logoutweb()"><i class="icon-power-off"></i>Logout</a>';
} else {
    $lgn = '<a href="'.base_url().''.$profil.'" style="background-color: #5cb85c;" class="d-none d-xl-block button rounded-pill bg-color-2 button-light text-light ls0 fw-medium m-0"><i class="icon-user-secret"></i>Profile</a>';
    $out = '<a href="'.base_url().'p/out" style="background-color: #df4759;" class="d-none d-xl-block button rounded-pill bg-color-2 button-light text-light ls0 fw-medium m-0" onclick="return logoutweb()"><i class="icon-power-off"></i>Logout</a>';
}
javascript('out','confirm');
?>
<ul class="menu-container">
    <li class="menu-item">
        <a class="menu-link" href="<?= base_url(); ?>">
            <div id="ptserif"><b>HOME</b></div>
        </a>
    </li>
    <li class="menu-item">
        <a class="menu-link" href="#">
            <div id="ptserif"><b>BERITA</b></div>
        </a>
        <ul class="sub-menu-container">
            <li class="menu-item">
                <a class="menu-link" href="<?= base_url(); ?>p/berita">
                    <div id="ptserif"><i class="icon-newspaper1"></i>SELURUH BERITA</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <div id="ptserif"><i class="icon-newspaper3"></i>TAGS BERITA</div>
                </a>
                <ul class="sub-menu-container">
                    <?php 
						$tags = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
						while($t=$tags->fetch_assoc()):
					?>
                    <li class="menu-item">
                        <a class="menu-link" href="<?= base_url(); ?>p/tags/<?= $t['url']; ?>">
                            <div id="ptserif"><?= strtoupper($t['nm_tags']); ?></div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a class="menu-link" href="<?= base_url(); ?>p/pengaduan">
            <div id="ptserif"><b>PENGADUAN</b></div>
        </a>
        <ul class="sub-menu-container">
            <li class="menu-item">
                <a class="menu-link" href="<?= base_url(); ?>p/pengaduan#tahapan">
                    <div id="ptserif"><i class="icon-laptop1"></i>INPUT PENGADUAN</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?= base_url(); ?>p/pengaduan/all">
                    <div id="ptserif"><i class="icon-line-monitor"></i>SELURUH PENGADUAN</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a class="menu-link" href="<?= base_url(); ?>p/pcare">
            <div id="ptserif"><b>P-CARE</b></div>
        </a>
    </li>
    <!-- <li class="menu-item" <?= $hid; ?>>
        <a class="menu-link" href="#">
            <div id="ptserif"><i class="icon-user-secret"></i></div>
        </a>
        <ul class="sub-menu-container">
            <li class="menu-item">
                <a class="menu-link" href="<?= base_url(); ?><?= $profil; ?>">
                    <div id="ptserif"><i class="icon-user-shield"></i>PROFIL</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?= base_url(); ?><?= $setting; ?>">
                    <div id="ptserif"><i class="icon-user-cog"></i>SETTING</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="<?= base_url(); ?>p/out" onclick="return logoutweb()">
                    <div id="ptserif"><i class="icon-user-alt-slash"></i>LOGOUT</div>
                </a>
            </li>
        </ul>
    </li> -->
    <!-- <li class="menu-item" <?= $hid; ?>>
        <a class="menu-link" href="<?= base_url(); ?>p/out" onclick="return logoutweb()">
            <div id="ptserif"><i class="icon-power-off"></i></div>
        </a>
    </li> -->
    <div class="header-misc">
		<?= $lgn; ?> &nbsp;&nbsp;&nbsp;
		<?= $out; ?>
							<!-- <a href="#" class="button rounded-pill ls0 fw-medium my-0 ms-2 d-none d-sm-flex">Download App</a> -->
	</div>
</ul>