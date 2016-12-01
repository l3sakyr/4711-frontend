<div class="row">
    <h4>Welcome to our catalog!</h4><br>
    <form action="/Sales/receipt">
        <table border="1" cellpadding="5px">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Description</th>
                <th>Add to cart</th>
                <th>Quantity</th>
            </tr>
            {stock}
            <tr align="center">
                <td><a href="/sales/item/{code}">{name}<a></td>
                <td>{price}</td>
                <td>{description}</td>
                <td><input type="checkbox" name="cart" value="{code}"></td>
                <td><input type="text" name="quantity" value="1" style="width:20px"></td>
            </tr>
            {/stock}
        </table>
        <!--<input type="submit" name="submit">-->
    </form>
</div>