<?php
include_once(plugin_dir_path( __FILE__ ) . '/api/client.php');

// Adding the shortcodes

// Upcoming movies shortcut
function movie_manager_upcoming_movies() {
    $client = new Movies_API_client();
    $movies = $client->get_upcoming();
    // Rendering the movies 

    echo '<section class="elementor-section elementor-inner-section elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-element_type="section">';
	echo '<div class="elementor-container elementor-column-gap-no">';
    
    for ($i = 0; $i < 10; $i++) {
       $movie = $movies->results[$i];
       $genres = $client->get_genres_name($movie->genre_ids);
       $poster = 'https://image.tmdb.org/t/p/w500/' . $movie->poster_path;
       if ($i%3 == 0) {
        echo '</div>';
        echo '</section>';
        echo '<section class="elementor-section elementor-inner-section elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-element_type="section">';
	    echo '<div class="elementor-container elementor-column-gap-no">';
       }

       echo ' <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-40aa3af4" data-id="40aa3af4" data-element_type="column"> ' .
			    '<div class="elementor-widget-wrap elementor-element-populated">' .
					'<div class="elementor-element elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-element_type="widget" data-widget_type="image-box.default">' .
				        '<div class="elementor-widget-container">' .
                            '<div class="elementor-image-box-wrapper">' .
                               '<figure class="elementor-image-box-img"><img width="350" height="350" src="'.$poster.'" class="elementor-animation-grow attachment-full size-full" alt="" loading="lazy"></figure>' .
                               '<div class="elementor-image-box-content">' .
                                    '<h4 class="elementor-image-box-title">' .$movie->title. '</h4>' .
                                    '<p class="elementor-image-box-description">' . $movie->release_date . ' / ' . $genres . '</p>' .
                                '</div>' .
                            '</div>' .
                        '</div>' .
				    '</div>' .
				'</div>' .
		    '</div>';
    }
	echo '</div>';
	echo '</section>';
}

add_shortcode('wpmmanager_upcoming_movies', 'movie_manager_upcoming_movies');

// Top actors shortcode
function movie_manager_top_actors() {
    $client = new Movies_API_client();
    $actors = $client->get_top_actors();
    // Rendering the actors 

    echo '<section class="elementor-section elementor-inner-section elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-element_type="section">';
	echo '<div class="elementor-container elementor-column-gap-no">';
    
    for ($i = 0; $i < 10; $i++) {
       $actor = $actors->results[$i];
       $photo = 'https://image.tmdb.org/t/p/w500/' . $actor->profile_path;
       if ($i%4 == 0) {
        echo '</div>';
        echo '</section>';
        echo '<section class="elementor-section elementor-inner-section elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-element_type="section">';
	    echo '<div class="elementor-container elementor-column-gap-no">';
       }

       echo ' <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-40aa3af4" data-id="40aa3af4" data-element_type="column"> ' .
			    '<div class="elementor-widget-wrap elementor-element-populated">' .
					'<div class="elementor-element elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-element_type="widget" data-widget_type="image-box.default">' .
				        '<div class="elementor-widget-container">' .
                            '<div class="elementor-image-box-wrapper">' .
                               '<figure class="elementor-image-box-img"><img width="250" height="250" src="'.$photo.'" class="elementor-animation-grow attachment-full size-full" alt="" loading="lazy"></figure>' .
                                '<div class="elementor-image-box-content">' .
                                    '<h4 class="elementor-image-box-title">' .$actor->name. '</h4>'.
                                '</div>' .
                            '</div>' .
                        '</div>' .
				    '</div>' .
				'</div>' .
		    '</div>';
    }
	echo '</div>';
	echo '</section>';
}

add_shortcode('wpmmanager_top_actors', 'movie_manager_top_actors');
