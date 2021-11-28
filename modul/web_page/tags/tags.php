<?php 
include '_func/identity.php';
    $tg = $_GET['id'];
    $tgt = $db->query("SELECT * FROM tags WHERE url='$tg'")->fetch_assoc();
    $pg = $_GET['page'];
    if (empty($pg)) {
        $pgt='Halaman Pertama';
    } elseif($pg=='1'){
        $pgt='Halaman Pertama';
    } else {
        $pgt='Halaman Ke '.penyebut($pg);
    }
    $tb = $db->query("SELECT * FROM tags_blog WHERE id_tags='$tgt[id_tags]'")->fetch_assoc();
    if (empty($tb['id_tags'])) {
        sweetAlert('','error','Kategori tidak ditemikan.!','Berita dengan kategori '.$tgt['nm_tags'].' Tidak ditemukan, atau berita belum tersedia.');
        
    } else {

        $batas = 9;
        $halaman = isset($_GET['page'])?(int)$_GET['page'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                
        $previous = $halaman - 1;
        $next = $halaman + 1;

        $data1 = $db->query("SELECT * FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.publish='Y' AND b.id_tags='$tgt[id_tags]'");
        $jumlah_data = $data1->num_rows;
        $total_halaman = ceil($jumlah_data / $batas);

        ?>
<title>Daftar isi Kategori <?= $tgt['nm_tags']; ?> | <?= $title; ?></title>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
        <h1 class="titular-title fw-normal center font-secondary fst-normal">Daftar isi Kategori <?= $tgt['nm_tags']; ?></h1>
					<p class="titular-sub-title text-primary fw-bold center mb-5"><?= $pgt; ?></p>
            <div class="row gutter-40 col-mb-80">
                <!-- Post Content
						============================================= -->
                <div class="postcontent col-lg-12">
                    <div class="row posts-md col-mb-30">
                            <?php
                               
        $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b, tags_blog c WHERE a.adm_blog=b.id AND a.id_blog=c.id_blog AND a.publish='Y' AND c.id_tags='$tgt[id_tags]' ORDER BY a.created_at DESC LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        // $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' ORDER BY tgl ASC")->fetch_assoc();
        while ($d=$data->fetch_assoc()) :
        ?>
                        <div class="entry col-sm-6 col-xl-4">
                            <div class="grid-inner">
                                <div class="entry-image">
                                    <a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><img src="<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>" alt="<?= $d['sampul']; ?>"></a>
                                </div>
                                <div class="entry-title title-xs nott">
                                    <h3><a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><?= $d['j_blog']; ?></a></h3>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> <?= tgl_indo_singkat(date('Y-m-d', strtotime($d['tgl']))). ' | ' .date('H:i:s', strtotime($d['tgl'])); ?></li>
                                        <li><a href="blog-single.html#comments"><i class="icon-user"></i> <?= $d['nama']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p><?= judul($d['isi'], 150); ?> <a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>" ><span class="badge alert-primary">Selengkapnya <i class="icon-line-arrow-right"></i></span></a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile; ?>
                        <nav>
                                    <ul class="pagination justify-content-center" <?= $hid; ?><?= $hden; ?>>
                                        <li class="page-item">
                                            <a class="page-link"
                                                <?php if ($halaman > 1) {
                            echo "href='".base_url()."p/tags/$tg/page/$previous'";
                        } ?>>Previous</a>
                                        </li>
                                        <?php
                                            for ($x=1;$x<=$total_halaman;$x++) {
                                                ?>
                                        <li class="page-item"><a class="page-link"
                                                href="<?= base_url(); ?>p/tags/<?= $tg; ?>/page/<?php echo $x ?>"><?php echo $x; ?></a>
                                        </li>
                                        <?php
                                            } ?>
                                        <li class="page-item">
                                            <a class="page-link"
                                                <?php if ($halaman < $total_halaman) {
                                                echo "href='".base_url()."p/tags/$tg/page/$next'";
                                            } ?>>Next</a>
                                        </li>
                                    </ul>   
                                </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    } ?>