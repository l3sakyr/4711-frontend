<div class="row">
    <h4>Edit Recipes</h4><br>
    <table border="1" cellpadding="5px">
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
        {recipes}
        <tr align="center">
            <td><a href="/Administration/editrecipe/{code}">{name}<a></td>
                        <td>{description}</td>
                        </tr>
                        {/recipes}
                        </table>
                        </div>