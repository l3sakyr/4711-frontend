<div class="row">
    <h4>Edit Stock</h4><br>
    <table border="1" cellpadding="5px">
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
        {stock}
        <tr align="center">
            <td><a href="/administration/editstock/{code}">{name}<a></td>
            <td>{description}</td>
        </tr>
        {/stock}
    </table>
</div>