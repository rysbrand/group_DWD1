<?php
// Include cart functions
require_once('cart.php');
session_start();
use yourlastname\cart;

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_item';
    }
}
$cart='cartDWD';
if (!isset($_SESSION[$cart])) {
    $_SESSION[$cart] = [];
}


// Add or update cart as needed
switch($action) {
    case 'add':
        $key = filter_input(INPUT_POST, 'productkey');
        $quantity = filter_input(INPUT_POST, 'itemqty');
        $cart = 'cartDWD';
        cart\add_item($cart, $key, $quantity);
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', 
                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION[$cart][$key]['qty'] != $qty) {
                cart\update_item($cart, $key, $qty);
            }
        }
        include('cart_view.php');
        break;
    case 'show_cart':
        include('cart_view.php');
        break;
    case 'empty_cart':
        unset($_SESSION[$cart]);
        include('cart_view.php');
        break;
}
?>