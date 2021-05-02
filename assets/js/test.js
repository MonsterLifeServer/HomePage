$(document).ready(function(){
    var time = 2;
    var $bar,
        $slick,
        isPause,
        tick,
        percentTime;
    
    $slick = $('.slider');
    $slick.slick({
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 1500,
        speed: 1500,
        fade: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        pauseOnDotsHover: false,
    });
    
    $bar = $('.slider-progress .progress');
    
    $('.slider-wrapper').on({
        mouseenter: function() {
            isPause = true;
        },
        mouseleave: function() {
            isPause = false;
        }
    })
    
    function startProgressbar() {
        resetProgressbar();
        percentTime = 0;
        isPause = false;
        tick = setInterval(interval, 10);
    }
    
    function interval() {
        if(isPause === false) {
            percentTime += 1 / (time+0.1);
            $bar.css({
                width: percentTime+"%"
            });
            if(percentTime >= 100) {
                $slick.slick('slickNext');
                startProgressbar();
            }
        }
    }
    
    
    function resetProgressbar() {
        $bar.css({
            width: 0+'%' 
        });
        clearTimeout(tick);
    }
    
    startProgressbar();
    
  });