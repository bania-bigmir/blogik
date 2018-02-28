jQuery(document).ready(function ($) {
    $('#commentform').on('click', '#submit', function (e) {
        e.preventDefault();

        var comParent = $(this);

        $('.wrap_result').css('color', 'green').text('Збереження коментаря').fadeIn(500, function () {
            var data = $('#commentform').serializeArray();

            $.ajax({
                url: $('#commentform').attr('action'),
                data: data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                datatype: 'JSON',
                success: function (html) {
                    if (html.error) {
                        $('.wrap_result').css('color', 'red').append('<br/><strong>Помилка: </strong>' + html.error.join('<br/>'));
                        $('.wrap_result').delay(2000).fadeOut(500);
                    } else if (html.success) {
                        $('.wrap_result').append('<br/><strong>Збережено!</strong>').delay(2000).fadeOut(500, function () {

                            if (html.data.parent_id > 0) {
                                comParent.parents("div#respond").prev().after('<ol class="children">' + html.comment + '</ol>');
                            } else {
                                if ($.contains('div.comments-area', 'ol.comment-list')) {

                                    $('ol.comment-list').append(html.comment);

                                } else {
                                    $('#respond').before('<ol class="comment-list">' + html.comment + '</ol>');
                                }
                            }
                            $('#cancel-comment-reply-link').click();
                        });
                    }
                },
                error: function () {
                    $('.wrap_result').css('color', 'red').append('<br/><strong>Помилка! </strong>');
                    $('.wrap_result').delay(2000).fadeOut(500,function () {
                        $('#cancel-comment-reply-link').click();
                    });
                }
            });
        });

    });




    if (window.location.hash) {
        var params = window.location.hash;
        $('html, body').animate({
            scrollTop: $(params).offset().top-($('#header').height()+5)
        }, 1000);
    }


if($('.flexslider').length){
        $('#carousel').flexslider({
            animation:"slide",
            controlNav:false,
            animationLoop:false,
            slideshow:false,
            itemWidth:200,
            itemMargin:5,
            asNavFor:'#slider',
            easing:'easeInElastic'

        });
    $('#slider').flexslider({
        animation:"slide",
        controlNav:false,
        animationLoop:false,
        slideshow:false,
        smoothHeight:true,
        sync:'#carousel',
        easing:'easeInElastic',
        prevText: "",
        nextText:""
    });

}







});

function slowScroll() {
    event.preventDefault();
    var params=event.toElement.hash;
    $('html, body').animate({
       scrollTop: $(params).offset().top-($('#header').height()+5)
    }, 1000);

}
