var frst_step_complete = false;

$(document).ready(function() {
    var form_animating = false;
    var form_open = false;
    var closed_text = '';

$('a.external').click(function(e){
	window.open($(this).attr('href'));
	e.preventDefault();
});

    //alert('testing');
    $('.topnav li').mouseenter(function(){
        //alert('testing');
        $(this).children('ul').show();
    }).mouseleave(function() {
        $(this).children('ul').hide();
    });


    $('.promo_btn').click(function(e) {
        if (form_animating) return;
        if (!form_open) {
            var center = $('.promo_btn .btn_center');
            closed_text = center.html();
            center.css({width : center.width()});
        }

        form_animating = true;
        var box = $(this).parents('#promo_box');
        var form = $('.promo_form');
        var form_height = form.outerHeight();


        form.css({
            overflow : 'hidden',
            top : box.height()-16,
            height : form_open ? form_height : 0,
            display : 'block'
        }).animate({
            height: form_open ? 0 : form_height
        }, 1000, function() {
            // Animation complete.
            if (form_open) {
                $('.promo_btn').removeClass('close');
                $('.promo_btn .btn_center').html(closed_text);
                form.css({display : 'none', overflow: 'auto', height : 'auto'});
            }else {
                $('.promo_btn').addClass('close');
                $('.promo_btn .btn_center').html('CLOSE <span class="carret carret_close">&raquo;</span>');
                form.css({overflow: 'auto', height : 'auto'});
            }

            form_animating = false;
            form_open = !form_open;
        });
    });

    var fields = $('.promo_form .gfield').not('.gfield_contains_required');
    fields.hide();
    fields.first().before('<li class="validation_error gfield hidden">Just a few more steps...</li>');
    $('.promo_form .gform_footer').hide();
    $('.submit_step_one').bind('click', function(e) {
        var invalid = false;
        $('.gfield_contains_required input').each(function() {
            if ($(this).attr('value') == '') invalid = true;
        });

        if (invalid) {
            $('.gform_heading').html('<div class="validation_error">Please fill in all required fields.</div>');
            return;
        }

        var wrapper = $(this).parents('.promo_form');
        var form_body = wrapper.find('.gform_body');
        var fields = form_body.children('.gform_fields');

        form_body.css({height: form_body.outerHeight(), overflow: 'hidden'});
        form_body.find('.gfield').not('.gform_hidden').show();

        form_body.animate({
            height: fields.outerHeight()
        }, 1000, function() {
            // Animation complete.
            form_body.css({overflow: 'auto'});
            $('.gform_heading').empty();
            $('.step_one_wrapper').hide();
            $('.gform_footer').show();
            frst_step_complete = true;
        });
    });


    $('.video_link').bind('click',function(e){
        var $content = $(this).next();
        if ($content.hasClass('lb_content_hidden')) {
            $('#lightbox_container .lb_videos .video_container').html(generate_embed($(this).data('type'), $(this).attr('href')));
            $('#lightbox_container .lb_videos .headline').html($content.children('.longtitle').html());
            $('#lightbox_container .lb_videos .sub_headline').html($content.children('.headline').html());
            $('#lightbox_container .lb_videos p').html($content.children('.longdesc').html());

            openLightbox();
            e.preventDefault();

            return false;
        }
    });

    function openLightbox() {
        var offset = 80;
        var top = $(window).scrollTop() + offset;

        $('#lightbox_bg').show();
        $('#lightbox').show();
        $('#lightbox_wrapper').stop()
            .css({'top' : top, 'display' : 'none'})
            .fadeIn(400, function() {$(this).show()});

        $('#lb_close').click(closeLightbox);
        $('#lightbox').click(closeLightbox);
        $('#lightbox_container').click(function(e) {
            e.stopPropagation();
        });
    }

    function closeLightbox() {
        $('#lightbox_wrapper').stop()
            .fadeOut(400, function() {
                $(this).css({'top' : 0, 'display' : 'block', 'opacity' : 1});
                $('#lightbox').hide();
                $('#lightbox_bg').hide();
                $('#lightbox_container .lb_videos .video_container').empty();
            });

        $('#lb_close').unbind('click');
        $('#lightbox').unbind('click');
        $('#lightbox_container').unbind('click');
    }

    function generate_embed(type, url) {
        var embed_str = '';

        if (type == 'vimeo') {
            embed_str = '<iframe src="'+url+'" width="717" height="398" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        }else if (type == 'youtube') {
            embed_str = '<iframe width="717" height="398" src="'+url+'" frameborder="0" allowfullscreen></iframe>';
        }else if (type == 'htmlembed') {
            embed_str = '<iframe src="'+url+'" scrolling="no" width="717" height="398" frameborder="0"></iframe> ';
        }

        return embed_str;
    }
});

window.onbeforeunload = function() {
    var form = $('.gform_wrapper form');
    if (form.length > 0 && frst_step_complete) {
        form.submit();
    }
}
