
    <?php
    $cart = 'cartDWD';
    ?>
    <main>
        <h1>Your Cart</h1>
        <?php if (empty($_SESSION[$cart]) || 
                  count($_SESSION[$cart]) == 0) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="update">
                <table>
                    <tr id="cart_header">
                        <th class="left">Item</th>
                        <th class="right">Quantity</th>
                    </tr>
                <?php foreach( $_SESSION[$cart] as $key => $item ):
                ?>
                    <tr>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td class="right">
                            <input type="text" class="cart_qty"
                            name="newqty[<?php echo $key; ?>]"
                            value="<?php echo $item['qty']; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="right">
                            <input type="submit" value="Update Cart">
                        </td>
                    </tr>
                </table>
                <p>Click "Update Cart" to update quantities in your
                cart. <br>Enter a quantity of 0 to remove an item.
                </p>
            </form>
        <?php endif; ?>
        <p><a href=".?action=show_add_item">Add Item</a></p>
        <p><a href=".?action=empty_cart">Empty Cart</a></p>
    </main>
    <?php require_once ('../views/footer.php')
    ?>