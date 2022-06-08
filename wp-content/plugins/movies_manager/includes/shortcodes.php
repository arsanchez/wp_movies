<?php
include_once(plugin_dir_path( __FILE__ ) . '/api/client.php');

// Template loading function 
function load_movie_template($file, $params = []) {
    extract($params);

    if (file_exists(PLUGIN_PATH_MOVIES.$file)) {
        ob_start();
        include(PLUGIN_PATH_MOVIES.$file);
        $template = ob_get_clean();
        return $template;
    }

}

// Rendering the pagination
function render_pagination($pages, $current_page) {
    echo load_movie_template('templates/pagination.php', ['pages' => $pages, 'current_page'=> $current_page]);
}

function wpmmanager_render_movies($movies, $client,$movies_per_page = 20, $movies_per_row = 4) {
    
    echo '<section class="elementor-section elementor-inner-section elementor-element elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-element_type="section">';
	echo '<div class="elementor-container elementor-column-gap-no">';

    $movies_per_page = $movies_per_page > count($movies->results) ? count($movies->results) : $movies_per_page;

    for ($i = 0; $i < $movies_per_page; $i++) {
       $movie = $movies->results[$i];
       $genres = $client->get_genres_name($movie->genre_ids);
       $poster = ($movie->poster_path != null) ?  'https://image.tmdb.org/t/p/w500/' . $movie->poster_path : "https://via.placeholder.com/500x750";

       if ($i%$movies_per_row == 0) {
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
                                    '<a href = "' . get_site_url(null, "/movie-details/?movie=" . $movie->id) .'"><h4 class="elementor-image-box-title">' .$movie->title. '</h4></a>' .
                                    '<p class="elementor-image-box-description">' . $movie->release_date . ' / ' . $genres . '</p></a>' .
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
// Adding the shortcodes

// Upcoming movies shortcut
function movie_manager_upcoming_movies() {
    $client = new Movies_API_client();
    $movies = $client->get_upcoming();
    // Rendering the movies 
    wpmmanager_render_movies($movies,$client,10, 3);
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
       $photo = ($actor->profile_path != null) ?  'https://image.tmdb.org/t/p/w500/' . $actor->profile_path : "https://via.placeholder.com/500";
       if ($i%5 == 0) {
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

// Movie list 
function movie_manager_movie_list() {
    $page = (isset($_GET['movie_page'])) ? $_GET['movie_page'] : 1;
    $filter_by = (isset($_GET['filter_by'])) ? $_GET['filter_by'] : 'title';
    $value = (isset($_GET['value'])) ? $_GET['value'] : '';

    // Rendering the search form
    echo load_movie_template('templates/search.php');

  
    $client = new Movies_API_client();
    $movies = $client->get_all_movies($page, $filter_by, $value);
    $current_page = $movies->page;
    $page_count = $movies->total_pages;

    // Rendering the movies
    wpmmanager_render_movies($movies,$client,20);

    // Rendering pagination
    render_pagination($page_count, $current_page);
}

add_shortcode('wpmmanager_movie_list', 'movie_manager_movie_list');

// Movies details shortcode 
function movie_manager_movie_details() {
    
    $movie = (isset($_GET['movie'])) ? $_GET['movie'] : false;
    if ($movie) {
        $client = new Movies_API_client();
        $movie_details = $client->get_movie_details($movie);
        $trailer = $client->get_movie_trailer($movie);
        $reviews = $client->get_movie_reviews($movie);
        $similar_movies = $client->get_similar_movies($movie);
        // var_dump($reviews);exit();


        if ($movie->success !== false) {
            echo load_movie_template('templates/movie_details.php', [
                'movie' => $movie_details, 
                'trailer' => $trailer, 
                'alternative_titles' => $client->get_movie_alternative_titles($movie),
                'reviews' => $reviews,
                'similar_movies' => $similar_movies
            ]);
        } else {
            echo '<h1>Movie not found</h1>';
        }
    } else {
        echo '<h1>Movie not found</h1>';
    }

}

add_shortcode('wpmmanager_movie_details', 'movie_manager_movie_details');

