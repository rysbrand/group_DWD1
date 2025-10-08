<?php include '../views/header.php'; ?>
<main>
    <aside>
        <h1>Movie List</h1>
        <nav>
            <ul>
                <?php //foreach ($movies as $movie) : ?>
                <li>
                    <!--<a href="?movie_id=<?php// echo $movie['movieID']; ?>">
                        <?php //echo $movie['title']; ?>-->
                    </a>
                </li>
                <?php// endforeach; ?>
            </ul>
        </nav>
    </aside>
    <section>
        <h1>Movie Details</h1>
        <!-- <?php //if (isset($movie)) : ?>
        <div id="movie_details">
            <h2><?php// echo $movie['title']; ?></h2>
            <p><strong>Release Year:</strong>
                <?php// echo $movie['releaseYear']; ?></p>
            <p><strong>Genre:</strong>
                <?php// echo $movie['genre_ID']; ?></p>
            <p><strong>Description:</strong>
                <?php// echo $movie['description']; ?></p>
            <form action="../cart" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="movie_id"
                       value="<?php// echo $movie['movieID']; ?>">
                <label>Quantity:</label>
                <input type="text" name="quantity" value="1">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
        <?php //else: ?>
        <p>Select a movie to view its details.</p>
        <?php// endif; ?>-->
    </section>
</main>
<?php include '../views/footer.php'; ?>
