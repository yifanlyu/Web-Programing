evar currentSlide = 1;
var lastexectime =0;
var cur = 0;
'use strict';

$(function() {

    //settings for slider
    var width = 1080;
    var animationSpeed = 1000;
    var pause = 5000;

    //cache DOM elements
    var $slider = $('.slideshow-container');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.mySlides', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            var d = new Date();
            lastexectime=d.getTime();
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                ++currentSlide;
                if (currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }


    function pauseSlider() {
        clearInterval(interval);
    }

    function handleVisibilityChange() {
        if (document.visibilityState == "hidden") {
        pauseSlider();
        }
    }

    handleVisibilityChange();

    var d = new Date();
    cur=d.getTime();

    if (cur-lastexectime>animationSpeed*2) {
        startSlider();
    }
});


function plusSlides(n) {
    var width = 1080;
    var animationSpeed = 1000;
    var pause = 5000;

    var $slider = $('.slideshow-container');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.mySlides', $slider);
    var d = new Date();
    cur=d.getTime();

    if (cur-lastexectime>animationSpeed*1.1) {
        if (n==1) {
            var d = new Date();
            lastexectime=d.getTime();
            $slideContainer.animate({'margin-left': '-='+width*n}, animationSpeed, function() {
                ++currentSlide;
                if (currentSlide=== $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });

        } else if (n==-1) {
            if (currentSlide === 1) {
                currentSlide = $slides.length;
                $slideContainer.css('margin-left', (1-$slides.length)*width);
                var d = new Date();
                lastexectime=d.getTime();
                $slideContainer.animate({'margin-left': '-='+width*n}, animationSpeed);
                --currentSlide;
            } else {
                var d = new Date();
                lastexectime=d.getTime();
                $slideContainer.animate({'margin-left': '-='+width*n}, animationSpeed);
                --currentSlide;
            }
        }
    }
}
