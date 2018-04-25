$(document).ready(function() {
    $('.js-toggle').click(function(event) {
        $(this).toggleClass('js-nav--open');
        $('.site-header__nav').toggleClass('js-nav--open');
        $('.site-header__overlay').toggleClass('js-nav--open');
        event.preventDefault();
    });

    $('.site-header__overlay').click(function(event) {
        $(this).toggleClass('js-nav--open');
        $('.site-header__nav').toggleClass('js-nav--open');
        $('.menu-gamburger').toggleClass('js-nav--open');
        event.preventDefault();
    });

    function scrollToElement(el, delay, speed) {
        var scroll_speed = speed || 500,
            delay_before_scroll = delay || 1000,
            $el = $(el);

        var getPosition = function () {
            return Math.floor($el.offset().top + 1 - $(window).scrollTop());
        };

        setTimeout(function () {
            $('html, body').stop().animate({
                'scrollTop': getPosition()
            }, scroll_speed);
        }, delay_before_scroll);
    }

    $('.js-arrow--to-bottom').click(function() {
        scrollToElement('.site-wrapper', 100, 600);
    });

    $('.js-arrow--to-top').click(function() {
        scrollToElement('.site-header', 100, 600);
    });

    // show or hide arrow--to-top

    $(window).scroll(function () {
        if ($(this).scrollTop() > $('.first-screen').height()*0.99) {
            $('.js-arrow--to-top').fadeIn(100);
        } else {
            $('.js-arrow--to-top').fadeOut(100);
        }
    });

});

// Text writer

var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];
    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }
    this.el.innerHTML = '<span class="text-insert__container">' + this.txt + '</span>';
    var that = this;
    var delta = 200 - Math.random() * 100;
    if (this.isDeleting) {
        delta /= 2;
    }
    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }
    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('text-insert');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-words');
        var period = elements[i].getAttribute('data-time');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
};