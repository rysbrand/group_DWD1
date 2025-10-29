<?php

if (!isset($movies)) {
    $movies = get_movies();
}

?>

<main>
    <aside>
        <h1>Movie List</h1>
        <nav>
            <ul>
                <?php if (isset($movies) && is_array($movies)) : ?>
                <?php foreach ($movies as $m) : ?>
                <li>
                    <a href="?r=view_movie&amp;movie_id=<?php echo $m['movie_ID']; ?>">

                        <?php echo $m['Title']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </aside>
    <?php if (isset($movie)) : ?>
    <section>
        <h1>Movie Details</h1>
        <div id="movie_details">
            <h2><?php echo $movie['Title']; ?></h2>
            <p><strong>Release Year:</strong>
                <?php echo $movie['release_Year']; ?></p>
            <p><strong>Genre:</strong>
                <?php echo $movie['genre_ID']; ?></p>
            <p><strong>Description:</strong>
                <?php echo $movie['Description']; ?></p>
            <form action="../app/cart/index.php" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="productkey"
                       value="<?php echo $movie['movie_ID']; ?>">
                <label>Quantity:</label>
                <input type="text" name="itemqty" value="1">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
        <?php else: ?>
        <p>Select a movie to view its details.</p>
        <?php endif; ?>
    </section>
</main>
