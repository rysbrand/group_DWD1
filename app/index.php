<?php
// index.php (root)
declare(strict_types=1);

$ROOT = __DIR__;

// Models (load once for all included pages)
require_once $ROOT . '/models/database.php';
require_once $ROOT . '/models/genres_db.php';
require_once $ROOT . '/models/movies_db.php';

// Route: home (movie_view), catalog (movie_list), cart
$route = $_GET['r'] ?? 'home';



// Make $route/$page_title visible to header.php
include $ROOT . '/views/header.php';

switch ($route) {
  case 'list':
    include $ROOT . '/movie_catalog/movie_view.php';
    break;

  case 'cart':
    include $ROOT . '/cart/cart_view.php';
    break;

  case 'home':
  default:
    include $ROOT . '/Home/index.php'; // ← home page
    break;
    
}

include $ROOT . '/views/footer.php';
