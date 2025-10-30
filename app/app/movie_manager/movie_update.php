<?php include '../views/header.php'; ?>
<head>
 <link rel="stylesheet" href="../main.css">
 </head>
<main>
    <h1>Update Movie</h1>
    <form action="index.php" method="post" id="update_movie_form">
        <input type="hidden" name="action" value="update_movie">
        <input type="hidden" name="movie_id" value="<?php echo $movie['movie_ID'] ?>">

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $movie['Title'] ?>"/>
        <br>

        <label>Genre:</label>
        <select>
        <?php foreach ($genres as $genre) : ?>
            <option value="<?php echo $genre['genre_ID']; ?>" 
                <?php if ($genre['genre_ID'] == $selected_genre) echo 'selected'; ?>>
                <?php echo $genre['Name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Description:</label>
        <input type="text" name="description" value="<?php echo $movie['Description'] ?>"/>
        <br>

        <label>Release Year:</label>
        <input type="text" name="release_year" value="<?php echo $movie['release_Year'] ?>"/>
        <br>

        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $movie['Price'] ?>"/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Movie" />
        <br>
    </form>
    <p>
        <a href="index.php?action=list_movies">View Movie List</a>
    </p>

</main>
<?php include '../views/footer.php'; ?>