<?php
namespace yourlastname\cart;
 require_once('../models/database.php');
 require_once('../models/movies_db.php');

// Add an item to the cart
function add_item(&$cart, $key, $quantity) {
    global $movies;

    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($_SESSION[$cart][$key])) {
        $quantity += $_SESSION[$cart][$key]['qty'];
        update_item($cart, $key, $quantity);
        return;
    }

    $movie= get_movie($key);
    if (!$movie) 
        return;
    // Add item
    $item = array(
        'name' => $movie ['Title'],
        'qty'  => $quantity
    );
    $_SESSION[$cart][$key] = $item;
}

// Update an item in the cart
function update_item(&$cart, $key, $quantity) {
    $quantity = (int) $quantity;
    if (isset($_SESSION[$cart][$key])) {
        if ($quantity <= 0) {
            unset($_SESSION[$cart][$key]);
        } else {
            $_SESSION[$cart][$key]['qty'] = $quantity;
        }
    }
}

?>