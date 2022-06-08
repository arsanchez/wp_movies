<?php

class Movies_API_client {
    private $api_key;
    private $api_url = 'https://api.themoviedb.org/3/';
    private $genres_dictionary = [];

    public function __construct() {
        $options = get_option( 'wpmmanager_options' );
        $this->api_key = $options['wpmmanager_field_api_key']; 
        $this->get_genres();
    }

    private function build_action_url($action, $params = []) {
        // Bulding the params 
        $params_str = '';
        foreach ($params as $key => $value) {
            $params_str .= '&'.$key.'='.$value;
        }

        $url = $this->api_url . $action . '?api_key=' . $this->api_key.$params_str;
        return $url;
    }

    public function get_upcoming() {
        $response = wp_remote_get(
            $this->build_action_url('movie/upcoming', ['sort_by' => 'release_date.desc'])
        );

        return json_decode($response['body']);
    }

    private function get_genres() {
        $response = wp_remote_get(
            $this->build_action_url('genre/movie/list')
        );

        $genres = json_decode($response['body'])->genres;
        foreach ($genres as $genre) {
            $this->genres_dictionary[$genre->id] = $genre->name;
        }
    }

    public function find_people($name, $return_ids = false, $single = false) {
        $response = wp_remote_get(
            $this->build_action_url('search/person', ['query' => $name])
        );

        $people = json_decode($response['body']);

        if ($return_ids) {

            $ids = [];
            if (empty($people->results )) {
                return $ids;
            }

            foreach ($people->results as $p) {
                $ids[] = $p->id;
            }
            
            return $single ? $ids[0] : $ids;
        }

    }

    
    public function get_genres_name($genres) {
        if (empty($genres)) {
            return '';
        }
        $names = [];
        foreach ($genres as $id) {
            $names[] = $this->genres_dictionary[$id];
        }

        return implode(' - ', $names);
    }

    public function get_top_actors() {
        $response = wp_remote_get(
            $this->build_action_url('person/popular')
        );

        return json_decode($response['body']);
    }

    public function get_all_movies($page = 1, $filter_by = '', $value = '') {
        
        $params  = ['sort_by' => 'original_title.asc', 'page' => $page];

        $endpoint = 'discover/movie';
        
        if ($value != '') {
            switch ($filter_by) {
                case 'title':
                    $params['query'] = $value;
                    $endpoint = 'search/movie';
                    break;

                case 'name': 
                    $people_ids = $this->find_people($value, true, true);
                    $params['with_people'] = $people_ids;
                    break;
                    
                case 'year': 
                    $params['year'] = $value;
                    break;
                
                case 'genre': 
                    foreach ($this->genres_dictionary as $key => $genre) {
                        if (str_contains( strtolower($genre), strtolower($value))) {
                            $genres_ids[] = $key;
                        }
                    }
        
                    $params['with_genres'] = implode(',', $genres_ids);
                    break;
            }
        }
        // echo $this->build_action_url($endpoint,$params);
        $response = wp_remote_get(
            $this->build_action_url($endpoint,$params)
        );
        return json_decode($response['body']);
    }

    public function get_movie_details($movie_id) {
        $response = wp_remote_get(
            $this->build_action_url('movie/' . $movie_id)
        );
        return json_decode($response['body']);
    }

    public function get_movie_trailer($movie_id) {
        $sites_urls = array('YouTube' => 'https://www.youtube.com/watch?v=');

        $response = wp_remote_get(
            $this->build_action_url('movie/' . $movie_id . '/videos')
        );

        $response = json_decode($response['body']);

        $trailer = false;
        foreach ($response->results as $clip) {
            if ($clip->type = 'Trailer') {
                $trailer = $sites_urls[$clip->site] . $clip->key;
            }
        }

        return $trailer;
    }

    public function get_movie_alternative_titles($movie_id) {

        $response = wp_remote_get(
            $this->build_action_url('movie/' . $movie_id . '/alternative_titles')
        );

        $response = json_decode($response['body']);
        $titles = [];
        foreach ($response->titles as $title) {
            $titles[] = $title->title;
        }

        return implode(', ', $titles);
    }

    public function get_movie_reviews($movie_id) {

        $response = wp_remote_get(
            $this->build_action_url('movie/' . $movie_id . '/reviews')
        );

        $response = json_decode($response['body']);
        $reviews = [];
        foreach ($response->results as $review) {
            $reviews[$review->author] = $review->content;
        }

        return $reviews;
    }

    public function get_similar_movies($movie_id) {

        $response = wp_remote_get(
            $this->build_action_url('movie/' . $movie_id . '/similar')
        );

        $response = json_decode($response['body']);
        $movies = [];
        $count = 0;
        foreach ($response->results as $movie) {
            $movies[] = $movie;
            $count++;
            // Only 4 simialar movies 
            if ( $count == 4) { #TODO: Makes this configurable
                break;
            }
        }

        return $movies;
    }
}