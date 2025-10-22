<?php
$movies = get_movies();

?>
<main>
<head> <link rel="stylesheet" href="../app/main.css?v=2">
</head>
    <h1>Movie List</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Year</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?= htmlspecialchars($movie['Title']) ?></td>
                    <td><?= htmlspecialchars($movie['release_Year']) ?></td>
                    <td><?= htmlspecialchars($movie['Genre']) ?></td>
                    <td><?= htmlspecialchars($movie['Description']) ?></td>
                    <td><?= htmlspecialchars($movie['Price']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
