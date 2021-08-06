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
        $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
    }
    var pagetop = $('#page_top');
    // ボタン非表示
    pagetop.hide();
  
    // 100px スクロールしたらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    });
});