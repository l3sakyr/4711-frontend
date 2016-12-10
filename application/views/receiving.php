<div class="row">
    <h4>Inventory</h4><br>

    <!--Grid View
    {supplies}
    <div class="span3x">
            <p><a href="/supply/{code}">{name}<p></a></br>
            <p>{description}<p></br>
                    <label>Order </label>
                    <input type="text" name="receiving_unit">
            </form>		
    </div>
    {/supplies}-->

    <form action="/Receiving/receipt">
        <table border="1" cellpadding="5px">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Order Quantity</th>
                <th>Order</th>
            </tr>
            {supplies}
            <tr align="center">
                <td><a href="/receiving/supply/{code}">{name}<a></td>
                            <td>{description}</td>
                            <td><input type="text" name="receiving_amount/{code}" style="width:20px"></td>
                            <td><input type="submit" name="id" value="{code}"></td>
                            </tr>
                            {/supplies}
                            </table>
                            </form>
                            </div>
