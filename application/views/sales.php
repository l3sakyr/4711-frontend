<div class="row">
    <h4>Welcome to our catalog!</h4><br>
    <form action="/Sales/receipt">
        <table border="1" cellpadding="5px">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Description</th>
                <th>Add to cart</th>
            </tr>
            {stock}
            <tr align="center">
                <td><a href="/Sales/item/{code}">{name}<a></td>
                            <td>{price}</td>
                            <td>{description}</td>
                            <td><a class="btn btn-default" role="button" value="{code}" href="/Sales/add/{code}">Add</a></td>
                            </tr>
                            {/stock}
                            </table>

                            <div style="width:200px">
                                {currentOrder}
                            </div>
                            <br>
                            <a class="btn btn-default" href="/Sales/checkout">Checkout</a>
                            <a class="btn btn-default" href="/Sales/cancel">Cancel</a>
                            </form>
                            </div>