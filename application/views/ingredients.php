<div class="row">
    {recipes}
    <table border="1" cellpadding="5px">
        <tr>
            <td><p>Recipe</p></td>
            <td><p>{name}</p></td>
        </tr>
        <tr>
            <td><p>Description</p></td>
            <td><p>{description}</p></td>
        </tr>
        {/recipes}
        {ingredients}
        <tr>
            <td><p>Ingredient</p></td>
            <td><p>{supplyName}</p></td>
        </tr>
        <tr>
            <td><p>Amount</p></td>
            <td><p>{amount} {measuring_units}</p></td>
        </tr>
        {/ingredients}
    </table>
</div>
