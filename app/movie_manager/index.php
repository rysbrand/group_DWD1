<?php
require('../models/database.php');
require('../models/movies_db.php');
require('../models/genres_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_movies';
    }
}



if ($action == 'list_movies') {
    $genre_ID = filter_input(INPUT_GET, 'genre_ID', 
            FILTER_VALIDATE_INT);
    if ($genre_ID == NULL || $genre_ID == FALSE) {
        $genre_ID = 1;
    }
    $genre_name = get_genre_name($genre_ID); 
    $genres = get_genres();
    $movies = get_movies_by_genre($genre_ID);
    include('movie_list.php');
} else if ($action == 'show_add_form') {
    $genres = get_genres();
    include('movie_add.php');    
} else if ($action == 'add_movie') {
    $title = filter_input(INPUT_POST, 'title');
    $genre_id = filter_input(INPUT_POST, 'genre_ID', 
            FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description');
    $release_year = filter_input(INPUT_POST, 'release_year');
    $price = filter_input(INPUT_POST, 'price');
    if ($title == NULL || $genre_id == NULL || $genre_id == FALSE || $description == NULL || 
            $release_year == NULL || $price == NULL) {
        $error = "Invalid movie data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_movie($title, $genre_id, $description, $release_year, $price);
        header("Location: .?genre_id=$genre_id");
    }
} else if ($action == 'show_update_form') {
    $movie_id = filter_input(INPUT_POST, 'movie_id', 
            FILTER_VALIDATE_INT);
    $genre_id = filter_input(INPUT_POST, 'genre_id', 
            FILTER_VALIDATE_INT);
    $movie = get_movie($movie_id);
    $selected_genre = $genre_id;
    $genres = get_genres();
    include('movie_update.php');    
} else if ($action == 'update_movie') {
    $movie_id = filter_input(INPUT_POST, 'movie_id', 
            FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $genre_id = filter_input(INPUT_POST, 'genre_ID', 
            FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description');
    $release_year = filter_input(INPUT_POST, 'release_year');
    $price = filter_input(INPUT_POST, 'price');
    if ($title == NULL || $genre_id == NULL || $genre_id == FALSE || $description == NULL || 
            $release_year == NULL || $price == NULL) {
        $error = "Invalid movie data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_movie($movie_id, $title, $genre_id, $description, $release_year, $price);
        header("Location: .?genre_id=$genre_id");
    }
} else if ($action == 'delete_movie') {
    $movie_id = filter_input(INPUT_POST, 'movie_id', 
            FILTER_VALIDATE_INT);
    if ($movie_id == NULL || $movie_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_movie($movie_id);
        header("Location: .?genre_id=1");
    }
} 
?>