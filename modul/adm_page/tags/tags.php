<?php
include '_func/.identity.php';
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
if ($csrf == false) {
    sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir atau akun anda sudah login diperangkat lain, silahkan login ulang');
} else {
    $a = $_GET['a'];
    switch ($a) {
        default:
            aut(array(1, 2, 3, 4, 5, 6));
            if ($_SESSION['level'] !== '1') {
                $hide = 'hidden';
            }
?>
            <title>Tags | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Data Tags</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="file-text"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Blog</li>
                                    <li class="breadcrumb-item active">Tags </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data" <?= $hide; ?>>
                                    <div class="row g-2">
                                        <div class="col-lg-12 col-md-12">
                                            <label">Nama Tags / Kategori :</label>
                                                <!-- <input type="file" name="gambar" class="dropify" accept="image/jpeg, image/png"  data-allowed-file-extensions="jpg jpeg jpe png"/> -->
                                                <input type="text" class="form-control" name="nm_tags" required>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Nama Tags / Kategori tidak boleh kosong.
                                                </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 col-lg-12 col-md-12 mx-auto">
                                        <button class="btn btn-primary-gradien" name="simpan" type="submit">Tambah Tags</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['simpan'])) {
                                    $nm_tags  = $db->real_escape_string($_POST['nm_tags']);
                                    $url      = slug($nm_tags);
                                    $usr_tags = $_SESSION['id_usr'];
                                    $q = $db->query("INSERT INTO tags VALUES ('','$nm_tags','$url','$usr_tags',NOW(),NULL)");
                                    if ($q) {
                                        sweetAlert('tags', 'sukses', 'Berhasil..!', 'Data tags berhasil diinput.');
                                    } else {
                                        javascript('', 'alert-error', 'Ups..! Sepertinya ada yang salah...');
                                    }
                                }
                                ?>
                                <hr <?= $hide; ?>>
                                <div class="dt-ext table-responsive">
                                    <br>
                                    <table class="display" id="responsive">
                                        <h5 style="text-align: center;"">Daftar Tags / Kategori</h5>
                            <thead>
                                <tr>
                                    <th>Nama Tags</th>
                                    <th style=" text-align: center;" <?= $hide; ?>>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $us = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
                                                $no = 1;
                                                while ($u = $us->fetch_assoc()) :
                                                ?>
                                                    <tr>
                                                        <td><?= $u['nm_tags']; ?></td>
                                                        <td style="text-align: center" <?= $hide; ?>>
                                                            <div class="btn-group">
                                                                <a href="<?= base_url(); ?>tags/edit/<?= $u['id_tags']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                                <form action="<?= base_url(); ?>tags/delete" method="POST">
                                                                    <input type="hidden" name="id_tags" value="<?= $u['id_tags']; ?>">
                                                                    <input type="hidden" name="nm_tags" value="<?= $u['nm_tags']; ?>">
                                                                    <button class="btn btn-danger" onclick="return hapus()"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'edit':
            aut(array(1));
            // $us = $_POST['us'];
            $id = $_GET['id'];
            $d = $db->query("SELECT * FROM tags WHERE id_tags='$id'")->fetch_assoc();
        ?>
            <title>Edit Tags (<?= $d['nm_tags']; ?>) | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Edit Tags (<?= $d['nm_tags']; ?>)</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="file-text"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Blog</li>
                                    <li class="breadcrumb-item">Tags </li>
                                    <li class="breadcrumb-item active">Edit Tags (<?= $d['nm_tags']; ?>)</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data" <?= $hide; ?>>
                            <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <label">Nama Tags / Kategori :</label>
                                        <input type="text" class="form-control" name="nm_tags" value="<?= $d['nm_tags']; ?>" required>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Nama Tags / Kategori tidak boleh kosong.
                                        </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-lg-12 col-md-12 mx-auto">
                                <button class="btn btn-primary-gradien" name="simpan" type="submit">Update Tags</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $nm_tags  = $db->real_escape_string($_POST['nm_tags']);
                            $url      = slug($nm_tags);
                            $q = $db->query("UPDATE tags SET nm_tags='$nm_tags', url='$url', updated_at=NOW() WHERE id_tags='$id'");
                            if ($q) {
                                sweetAlert('tags', 'sukses', 'Berhasil..!', 'Data tags berhasil diupdate.');
                            } else {
                                javascript('', 'alert-error', 'Ups..! Sepertinya ada yang salah...');
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'delete':
            aut(array(1));
            $id_tags = $_POST['id_tags'];
            $nm_tags = $_POST['nm_tags'];
            $db->query("DELETE FROM tags_blog WHERE id_tags='$id_tags'");
            $db->query("DELETE FROM tags WHERE id_tags='$id_tags'");
            sweetAlert('tags', 'sukses', 'Berhasil..!', 'Tags / Kategori ' . $nm_tags . ' Berhasil dihapus..')
        ?>
            <?php break; ?>
<?php }
} ?>