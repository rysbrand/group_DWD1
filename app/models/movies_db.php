<!-- functions go here!! -->
<?php
function get_movies_by_genre($genre_id) {
    global $db;
    $query = 'SELECT * FROM movies
              WHERE movies.genreID = :genre_id
              ORDER BY movie_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(":genre_id", $genre_id);
    $statement->execute();
    $movies = $statement->fetchAll();
    $statement->closeCursor();
    return $movies;
}

function get_movie($movie_id) {
    global $db;
    $query = 'SELECT * FROM movies
              WHERE movie_ID = :movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":movie_id", $movie_id);
    $statement->execute();
    $movie = $statement->fetch();
    $statement->closeCursor();
    return $movie;
}

function delete_movie($movie_id) {
    global $db;
    $query = 'DELETE FROM movies
              WHERE movie_ID = :movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':movie_id', $movie_id);
    $statement->execute();
    $statement->closeCursor();
}
// Really need to double check this for all the correct columns and such
function add_movie($genre_id, $name, $price, $description) {
    global $db;
    $query = 'INSERT INTO movies
                 (genre_ID, movie_name, movie_price, movie_description)
              VALUES
                 (:genre_id, :name, :price, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}
?>