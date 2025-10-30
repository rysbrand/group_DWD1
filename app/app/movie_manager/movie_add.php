<?php include '../views/header.php'; ?>
<head>
 <link rel="stylesheet" href="../main.css">
 </head>
<main>
    <h1>Add Movie</h1>
    <form action="index.php" method="post" id="add_movie_form">
        <input type="hidden" name="action" value="add_movie">

        <label>Title:</label>
        <input type="text" name="title" />
        <br>

        <label>Genre:</label>
        <select name="genre_ID">
        <?php foreach ( $genres as $genre ) : ?>
            <option value="<?php echo $genre['genre_ID']; ?>">
                <?php echo $genre['Name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Description:</label>
        <input type="text" name="description" />
        <br>

        <label>Release Year:</label>
        <input type="text" name="release_year" />
        <br>

        <label>Price:</label>
        <input type="text" name="price" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Movie" />
        <br>
    </form>
    <p>
        <a href="index.php?action=list_movies">View Movie List</a>
    </p>

</main>
<?php include '../views/footer.php'; ?>