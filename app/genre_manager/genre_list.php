<?php include '../views/header.php'; ?>
<main>
    <h1>Genre List</h1>

    <section>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($genres as $genre) : ?>
            <tr>
                <td><?php echo $genre['Name']; ?></td>
                <td><?php echo $genre['Description']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_genre">
                    <input type="hidden" name="genre_id"
                           value="<?php echo $genre['genre_ID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_update_form">
                    <input type="hidden" name="genre_id"
                           value="<?php echo $genre['genre_ID']; ?>">
                    <input type="submit" value="Update">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Genre</a></p>
        <!-- <p class="last_paragraph"><a href="?action=list_categories">List Categories</a></p>         -->
    </section>
</main>
<?php include '../views/footer.php'; ?>