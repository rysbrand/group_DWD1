<?php include '../views/header.php'; ?>
<main>
    <h1>Update Genre</h1>
    <form action="index.php" method="post" id="update_genre_form">
        <input type="hidden" name="action" value="update_genre">
        <input type="hidden" name="genre_id" value="<?php echo $genre['genre_ID'] ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $genre['Name'] ?>"/>
        <br>

        <label>Description:</label>
        <input type="text" name="description" value="<?php echo $genre['Description'] ?>"/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Genre" />
        <br>
    </form>
    <p>
        <a href="index.php?action=list_genres">View Genre List</a>
    </p>

</main>
<?php include '../views/footer.php'; ?>