<?php include '../views/header.php'; ?>
<main>
    <h1>Movie List</h1>

    <aside>
        <!-- display a list of genres -->
        <h2>Genres</h2>
        <nav>
        <ul>
        <?php foreach ($genres as $genre) : ?>
            <li>
            <a href="?genre_ID=<?php echo $genre['genre_ID']; ?>">
                <?php echo $genre['Name']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of movies -->
        <h2><?php echo $genre_name; ?></h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Genre Name</th>
                <th>Description</th>
                <th>Release Year</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($movies as $movie) : ?>
            <tr>
                <td><?php echo $movie['Title']; ?></td>
                <td><?php echo $movie['genre_ID']; ?></td>
                <td><?php echo $movie['Description']; ?></td>
                <td><?php echo $movie['release_Year']; ?></td>
                <td><?php echo $movie['Price']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_movie">
                    <input type="hidden" name="movie_id"
                           value="<?php echo $movie['movie_ID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_update_form">
                    <input type="hidden" name="movie_id"
                           value="<?php echo $movie['movie_ID']; ?>">
                    <input type="hidden" name="genre_id"
                           value="<?php echo $movie['genre_ID']; ?>">
                    <input type="submit" value="Update">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Movie</a></p>
        <!-- <p class="last_paragraph"><a href="?action=list_categories">List Categories</a></p>         -->
    </section>
</main>
<?php include '../views/footer.php'; ?>