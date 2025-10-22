<?php
require('../models/database.php');
require('../models/genres_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_genres';
    }
}

if ($action == 'list_genres') {
    $genres = get_genres();
    include('genre_list.php');
} else if ($action == 'show_add_form') {
    $genres = get_genres();
    include('genre_add.php');    
} else if ($action == 'add_genre') {
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    if ($name == NULL || $description == NULL) {
        $error = "Invalid movie data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_genre($name, $description);
        header("Location: index.php?action=list_genres");
        exit();
    }
} else if ($action == 'show_update_form') {
    $genre_id = filter_input(INPUT_POST, 'genre_id', 
            FILTER_VALIDATE_INT);
    $genre = get_genre($genre_id);
    include('genre_update.php');    
} else if ($action == 'update_genre') {
    $genre_id = filter_input(INPUT_POST, 'genre_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    if ($genre_id == NULL || $genre_id == FALSE || $name == NULL || $description == NULL) {
        $error = "Invalid genre data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_genre($genre_id, $name, $description);
        header("Location: index.php?action=list_genres");
        exit();
    }
} else if ($action == 'delete_genre') {
    $genre_id = filter_input(INPUT_POST, 'genre_id', 
            FILTER_VALIDATE_INT);
    if ($genre_id == NULL || $genre_id == FALSE) {
        $error = "Missing or incorrect category.";
        include('../errors/error.php');
    } else { 
        delete_genre($genre_id);
        header("Location: index.php?action=list_genres");
        exit();
    }
} 


?>