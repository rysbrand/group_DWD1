<?php
// index.php (root)
declare(strict_types=1);

$ROOT = __DIR__;

// session and cookies
$lifetime = 60 * 60 *24*365;
session_set_cookie_params($lifetime, '/');
session_start();

// Create a cart array if needed
$cart = 'cartDWD';
if (empty($_SESSION[$cart])) $_SESSION[$cart] = array();

use yourlastname\cart;

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
  
  case 'view_movie':
    $movie_id = filter_input(INPUT_GET, 'movie_id', FILTER_VALIDATE_INT);
    if ($movie_id) {
        $movie = get_movie($movie_id);
        $movies = get_movies(); // Optional
        include $ROOT . '/movie_catalog/movie_view.php';
    } else {
        echo "<p>Invalid movie ID.</p>";
    }
    break;
    
}

include $ROOT . '/views/footer.php';
