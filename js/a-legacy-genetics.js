var cow_slides_count = 0;
var current_cow_slide_index;
var cow_timeout;

(function($){

    $(function(){

        $('.cow-slide').each(function(){
            cow_slides_count++;
            var img = $(this).find('img');
            var image = new Image();
            image.src = img.prop('src');
            var height = image.height;
            if ( height > 400 )
            {
                var diff = height - 400;
                var move = Math.round( diff / 2 );
                img.css('top', '-' + move + 'px');
            }
        });

        if ( cow_slides_count > 0 ) {
            $('.cow-slide-0').fadeIn();
            current_cow_slide_index = 0;
        }

        cow_timeout = setTimeout( showNextCowSlide, 5000 );

        $('.cow-slider-arrow-left').click(function(){
            clearTimeout( cow_timeout );
            showPrevCowSlide();
        });

        $('.cow-slider-arrow-right').click(function(){
            clearTimeout( cow_timeout );
            showNextCowSlide();
        });
    });

    function showPrevCowSlide() {
        $('.cow-slide-'+current_cow_slide_index).fadeOut(1000,function(){
            current_cow_slide_index--;
            if ( current_cow_slide_index < 0 ) {
                current_cow_slide_index = cow_slides_count - 1;
            }
            $('.cow-slide-'+current_cow_slide_index).fadeIn(1000);
            cow_timeout = setTimeout( showPrevCowSlide, 5000 );
        });
    }

    function showNextCowSlide() {
        $('.cow-slide-'+current_cow_slide_index).fadeOut(1000,function(){
            current_cow_slide_index++;
            if ( current_cow_slide_index >= cow_slides_count ) {
                current_cow_slide_index = 0;
            }
            $('.cow-slide-'+current_cow_slide_index).fadeIn(1000);
            cow_timeout = setTimeout( showNextCowSlide, 5000 );
        });
    }

})(jQuery);