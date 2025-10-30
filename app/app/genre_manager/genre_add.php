<?php include '../views/header.php'; ?>
<main>
    <h1>Add Genre</h1>
    <form action="index.php" method="post" id="add_genre_form">
        <input type="hidden" name="action" value="add_genre">

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Description:</label>
        <input type="text" name="description" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Genre" />
        <br>
    </form>
    <p>
        <a href="index.php?action=list_genres">View Movie List</a>
    </p>

</main>
<?php include '../views/footer.php'; ?>