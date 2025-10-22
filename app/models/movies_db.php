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

function get_movies(): array {
    global $db;
    $query = '
        SELECT 
            m.movie_ID,
            m.Title,
            m.release_Year,
            m.Price,
            g.Name AS Genre,
            m.Description
        FROM movies m
        JOIN genre g ON m.genre_ID = g.genre_ID
        ORDER BY m.Title
    ';
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

function add_movie($genre_id, $title, $price, $description) {
    global $db;
    $query = 'INSERT INTO movies
                 (genre_ID, movie_title, movie_price, movie_description)
              VALUES
                 (:genre_id, :name, :price, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}
?>