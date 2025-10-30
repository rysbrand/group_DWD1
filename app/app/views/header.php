<?php
// views/header.php
if (!isset($route)) { $route = 'home'; }
if (!isset($page_title)) { $page_title = 'Movie Catalog'; }
//$ROOT = $_SERVER['DOCUMENT_ROOT'];

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../app/main.css">
</head>
<body>
  <nav class="navbar">
    <div class="nav-left">
      <span class="brand">DWD1 Movies</span>
      <a class="nav-link <?= $route==='home'?'active':'' ?>" href="http://localhost:8080/group_DWD1/app/index.php?r=home">Home</a>
      <a class="nav-link <?= $route==='list'?'active':'' ?>" href="http://localhost:8080/group_DWD1/app/index.php?r=list">Movie List</a>
    </div>
    <div class="nav-right">
      <a class="nav-link <?= $route==='cart'?'active':'' ?>" href="http://localhost:8080/group_DWD1/app/index.php?r=cart">🛒 Cart</a>
    </div>
  </nav>
  <main class="container">
