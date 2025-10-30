<!-- functions go here!! -->
 <!-- Column names for the movies table are: Title, genre_ID, Description, release_Year, movie_ID, Price-->
<?php
function get_movies_by_genre($genre_id) {
    global $db;
    $query = 'SELECT * FROM movies
              WHERE movies.genre_ID = :genre_id
              ORDER BY movie_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(":genre_id", $genre_id);
    $statement->execute();
    $movies = $statement->fetchAll();
    $statement->closeCursor();
    return $movies;
}

function get_movies() {
    global $db;
    $query = 'SELECT * FROM movies
            ORDER BY movie_ID';
    $statement = $db->prepare($query);
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

function add_movie($title, $genre_id, $description, $release_year, $price) {
    global $db;
    $query = 'INSERT INTO movies
                 (Title, genre_ID, Description, release_Year, Price)
              VALUES
                 (:title, :genre_id, :description, :release_year, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':release_year', $release_year);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

function update_movie($movie_id, $title, $genre_id, $description, $release_year, $price) {
    global $db;
    $query = 'UPDATE movies
              SET Title = :title, genre_ID = :genre_id, Description = :description, release_Year = :release_year, Price = :price
              WHERE movie_ID = :movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':release_year', $release_year);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':movie_id', $movie_id);
    $statement->execute();
    $statement->closeCursor();
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
?>