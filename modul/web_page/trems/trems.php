<?php
include '_func/.identity.php';
?>
<title>Privacy Policy | <?= $title; ?></title>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="single-post mb-0">
                <!-- Single Post
						============================================= -->
                <div class="entry clearfix">
                    <!-- Entry Title
							============================================= -->
                    <!-- <div class="entry-title">
								<h2>This is a Standard post with a Preview Image</h2>
							</div> -->
                    <!-- .entry-title end -->

                    <!-- Entry Content
							============================================= -->
                    <div class="entry-content mt-0 container">
                        <?php
                        $trems = $db->query("SELECT * FROM trems WHERE id='1'")->fetch_assoc();
                        echo $trems['trems'];
                        ?>
                    </div><!-- .entry end -->
                </div>
            </div>
        </div>
</section><!-- #content end -->