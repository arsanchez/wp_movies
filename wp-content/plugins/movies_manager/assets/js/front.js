(function($) {
    // Pagination click listener 
    $('.movies-pagination li:not(.disabled)').on('click', function() {
        let page = $(this).data('page');
        if (page == 'next') {
            page =  parseInt($('#movie_page').val()) + 1;
        } else if (page == 'prev') {
            page =  parseInt($('#movie_page').val()) - 1;
        }
        $('#movie_page').val(page);
        $('#search_btn').trigger('click');
    });

    jQuery('#search_btn').on('click', function(e) {
        if ($('#original_value').val() != $('#value').val()) {
            $('#movie_page').val(1);
        }
    })
	
})( jQuery );