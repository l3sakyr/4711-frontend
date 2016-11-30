<div class="row">
    <h4>Welcome to our catalog!</h4><br>
    <!--Grid view
    {stock}
    <div class="span3x">
        <p>{name} - {price}</p><br/>
        <p>{description}</p><br/>
        <p>{quantity} left in stock</p><br/>
        <form action="/Sales/receipt">
            <table align="center">
                <tr align="center">
                    <td>Add to cart</td>
                    <td><input type="checkbox" name="cart" value="{code}"></td>
                </tr>
                <tr align="center">
                    <td><p>Quantity</p></td>
                    <td><input type="text" name="quantity" value="1" style="width:20px"></td>
                </tr>
            </table>
        </form>
    </div>
    {/stock}-->
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