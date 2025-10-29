<?php 
require_once('../models/database.php');
require('../models/genres_db.php');
require('../models/movies_db.php');

//include('../movie_catalog/movie_view.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'r'); // <-- Add this line
}

if ($action == NULL) {
    $action = 'list_movies';
}

if ($action == 'list_movies') {
    $movies = get_movies();
    include('../movie_catalog/movie_view.php');
}
elseif ($action == 'view_movie') {
    $movie_id = filter_input(INPUT_GET, 'movie_id', FILTER_VALIDATE_INT);
    if ($movie_id) {
        $movie = get_movie($movie_id);
        $movies = get_movies(); 
        include('../movie_catalog/movie_view.php');
    } else {
        echo "<p>Invalid movie ID.</p>";
    }
}


?>
