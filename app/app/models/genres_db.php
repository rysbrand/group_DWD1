<!-- Column names for Genres table are: Name, Description, genre_ID -->
<?php
function get_genres() {
    global $db;
    $query = 'SELECT * FROM genre
              ORDER BY genre_ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $genres = $statement->fetchAll();
    $statement->closeCursor();
    return $genres;    
}

// Make sure to double check that these are the correct names in the 
// database
function get_genre($genre_id) {
    global $db;
    $query = 'SELECT * FROM genre
              WHERE genre_ID = :genre_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":genre_id", $genre_id);
    $statement->execute();
    $genre = $statement->fetch();
    $statement->closeCursor();
    return $genre;
}

function get_genre_name($genre_id) {
    global $db;
    $query = 'SELECT * FROM genre
              WHERE genre_ID = :genre_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();    
    $genre = $statement->fetch();
    $statement->closeCursor();    
    $genre_name = $genre['Name'];
    return $genre_name;
}

function add_genre($name, $description) {
    global $db;
    $query = 'INSERT INTO genre
                 (Name, Description)
              VALUES
                 (:name, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

function update_genre($genre_id, $name, $description) {
    global $db;
    $query = 'UPDATE genre
              SET Name = :name, Description = :description
              WHERE genre_ID = :genre_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_genre($genre_id) {
    global $db;
    $query = 'DELETE FROM genre
              WHERE genre_ID = :genre_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre_id', $genre_id);
    $statement->execute();
    $statement->closeCursor();
}
?>