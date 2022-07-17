<!-- <div id="page_top"><a href="#"></a></div> -->
<div class="footer_nav" id="footer_nav">
    <input id="share-chk" class="menu-chk" type="checkbox">
    <label class="menu-mk share-mk" for="share-chk">シェア</label>
    <input id="top-chk" class="menu-chk" type="checkbox">
    <label class="menu-mk top-mk" for="top-chk">トップ</label>
    <input id="discord-chk" class="menu-chk" type="checkbox">
    <label class="menu-mk discord-mk" for="discord-chk">
    <?php 
        if ($disLib->isLogin()) { 
            echo "<span id='logout-span'>ログアウト</span>"; 
        } else { 
            echo "<span id='login-span'>ログイン</span>"; 
        } 
    ?>
    </label>
</div>
<footer class="footer">
    <div class="footer-center col-md-10 col-sm-6">
        <div class="icons">
            <a href="https://twitter.com/mlserver2408" target="_blank"><i class="fa-brands fa-twitter" style="color: #1DA1F2;"></i></a>
            <a href="https://www.youtube.com/channel/UCWSz32UUYgAzs_hVqKeqq-Q" target="_blank"><i class="fa-brands fa-youtube" style="color: #c4302b;"></i></a>
            <a href="https://discord.mlserver.xyz" target="_blank"><i class="fa-brands fa-discord" style="color: #7289da;"></i></a>
            <a href="https://twitch.mlserver.xyz" target="_blank"><i class="fa-brands fa-twitch" style="color: #9d4bff;"></i></a>
        </div>
        <p class="foot-menu">
            <a id='home-uri' href="<?php echo $func->getUrl(); ?>/"> ホーム</a> |
            <a href="<?php echo $func->getUrl(); ?>/#about"> About</a> |
            <a href="<?php echo $func->getUrl(); ?>/terms"> 利用規約・ガイドライン</a> |
            <a href="<?php echo $func->getUrl(); ?>/privacy_policy"> プライバシーポリシー</a>
        </p><br/>
        <p class="foot-menu">
            <a href="<?php echo $func->getUrl(); ?>/sitemap">サイトマップ</a> |
            <a href="<?php echo $func->getUrl(); ?>/sitemap2"> サイトマップ beta</a>
        </p><br/>
    </div>
    <div class="footer-center" style="border-top: 1px solid #000; margin-top: 10px; padding-top: 20px;">
        <p class="name"> MonsterLifeServer &copy; 2018-<?php echo date("Y"); ?></p>
    </div>
</footer>