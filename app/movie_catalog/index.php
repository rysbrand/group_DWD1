<?php 
require_once('../models/database.php');
require('../model/genres_db.php');
require('../model/movies_db.php');

//include('../movie_catalog/movie_view.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_movies';
    }
}

?>
