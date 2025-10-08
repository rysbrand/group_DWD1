<?php
function get_genres() {
    global $db;
    $query = 'SELECT * FROM genres
              ORDER BY genre_ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $genres = $statement->fetchAll();
    $statement->closeCursor();
    return $genres;    
}

// Make sure to double check that these are the correct names in the 
// database
function get_genre_name($genre_id) {
    global $db;
    $query = 'SELECT * FROM genres
              WHERE genre_ID = :genre_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();    
    $genre = $statement->fetch();
    $statement->closeCursor();    
    $genre_name = $genre['genre_Name'];
    return $genre_name;
}
?>