(function($) {
    // Pagination click listener 
    $('.movies-pagination li:not(.disabled)').on('click', function() {
        let page = $(this).data('page');
        if (page == 'next') {
            page =  parseInt($('#movie_page').val()) + 1;
        } else if (page == 'prev') {
            page =  parseInt($('#movie_page').val()) - 1;
        }
        console.log(page);
        $('#movie_page').val(page);
        $('#search_btn').trigger('click');
    });

    jQuery('#filter_by').on('changes', function() {
        $('#movie_page').val(1);
    })
	
})( jQuery );