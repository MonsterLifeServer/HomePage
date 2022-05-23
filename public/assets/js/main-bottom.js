function FooterNavUpdate() {
    var footerNav = $('.footer_nav');

    var scroll = $(window).scrollTop(); //スクロール値を取得
    var wH = window.innerHeight; //画面の高さを取得
    var footerPos =  $('.footer').offset().top; //footerの位置を取得
    console.log("scroll   : " + scroll);
    console.log("wH       : " + wH);
    console.log("footerPos: " + footerPos);
    console.log(" ");
    if(scroll+wH >= (footerPos)) {
        var pos = (scroll+wH) - footerPos //スクロールの値＋画面の高さからfooterの位置＋10pxを引いた場所を取得し
        footerNav.css('bottom',pos); //.footer_navに上記の値をCSSのbottomに直接指定してフッター手前で止まるようにする
        //footerNav.css('position', "static");
    }else{//それ以外は
        footerNav.css('bottom','0');// 下から10pxの位置にページリンクを指定
        //footerNav.css('position', "fixed");
    }
}

$(function() {
    $('.menu-btn').on('click', function(){
        $('.menu').toggleClass('is-active');
        $('.menu-btn').toggleClass('is-active');
        $('.overlay').toggleClass('is-active');
        $('body').toggleClass('is-fixed');
        return false;
    });
    $('.overlay').on('click', function(){
        if($(this).hasClass('is-active')){
            $('.overlay').removeClass('is-active');
            $('.menu').removeClass('is-active');
            $('.menu-btn').removeClass('is-active');
            $('body').removeClass('is-fixed');
            $('.js-menu__item__link').each(function() {
                if ($(this).hasClass('on')) {
                    $(this).removeClass('on');
                    $(this).slideUp();
                }
            });
            return false;
        }
    });
    $('.js-menu__item__link').each(function(){
        $(this).on('click',function(){
            if (window.matchMedia('(max-width:750px)').matches) {
                $(this).toggleClass('on');
                $("+.submenu",this).slideToggle();
                return false;
            }
        });
    });
    
    var nav = $('.nav');
    var sidenav = $('.submenu');
    $('li', nav)
    .mouseover(function(e) {
        if (window.matchMedia('(max-width:750px)').matches) return false;
        $('ul.submenu', this).stop().slideDown('fast');
    })
    .mouseout(function(e) {
        if (window.matchMedia('(max-width:750px)').matches) return false;
        $('ul.submenu', this).stop().slideUp('fast');
    });

    
    $('li', sidenav)
    .mouseover(function(e) {
        if (window.matchMedia('(max-width:750px)').matches) return false;
        $('ul.sidemenu', this).stop().slideDown('fast');
    })
    .mouseout(function(e) {
        if (window.matchMedia('(max-width:750px)').matches) return false;
        $('ul.sidemenu', this).stop().slideUp('fast');
    });

    var $ftr = $('.footer');
    
    if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
        var temp = $(".wrapper").offset();
        $ftr.attr({'style': 'position:fixed; top:' + ( temp.bottom + 20 + $('.footer').offset().outerHeight() ) +'px;' });
    }

    FooterNavUpdate()

    // 100px スクロールしたらボタン表示
    $(window).scroll(function () {
        FooterNavUpdate()
    });
    $(window).resize(function () {
        FooterNavUpdate()
    });
    $('.top-mk').click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    });
    $('.share-mk').click(function () {
        if ($('.sns-share-menu').hasClass("is-active")) {
            $('.sns-share-menu').removeClass("is-active");
            $('.footer_nav').css("z-index", 101);
        } else {
            $('.sns-share-menu').addClass("is-active");
            $('.footer_nav').css("z-index", 0);
        }
        return false;
    });
    $('.sns-share-close').click(function () {
        if ($('.sns-share-menu').hasClass("is-active")) {
            $('.sns-share-menu').removeClass("is-active");
            $('.footer_nav').css("z-index", 101);
        }
        return false;
    });
});