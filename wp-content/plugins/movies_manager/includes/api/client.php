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

    private function build_action_url($action) {
        $url = $this->api_url . $action . '?api_key=' . $this->api_key;
        return $url;
    }

    public function get_upcoming() {
        $response = wp_remote_get(
            $this->build_action_url('movie/upcoming')
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

    public function get_genres_name($genres) {
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
}