<?php
// カルーセルに使用する画像一覧(推奨サイズ: 1920×1080)
$images = [
	"https://i.gyazo.com/d5e3fe57a5718d72f538e2e9690a1abe.png",
	"https://i.gyazo.com/419a033caf3d2fa57c0dc1558a57e54c.png",
	"https://i.gyazo.com/2575a25f1ccfbd4c37a0d517e0d211b3.png",
	"https://i.gyazo.com/b34e6f3356881fc2a3e9a4606c8c0039.png",
    "https://i.gyazo.com/80076d5d3f59660d7480569f58264c8b.png"
];
?>
<div class="slider-wrapper" id="slick-1">
    <div class="slider">
        <?php 
            foreach ( $images as $image ) {
                echo '<div class="slide"><img class="carousel-img" src="'.$image.'"></div>';
            }
        ?>
    </div>
    <div class="slider-progress">
        <div class="progress"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $func->getUrl(); ?>/assets/js/carousel.min.js"></script>