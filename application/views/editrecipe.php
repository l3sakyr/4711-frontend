<div class="row">
    <div>
        <form>
            {recipes}
            <table border="1" cellpadding="5px">
                <input type="text" name="code" placeholder="{code}"><br>
                <input type="text" name="name" placeholder="{name}"><br>
                <input type="text" name="description" placeholder="{description}"><br>
                {ingredients}
                <input type="text" name="{name}" placeholder="{ingredName} : {amount}mL"><br>
                {/ingredients}
                <br>
                <a class="btn btn-default" href="/administration/editrecipe/{code}">Submit</a><br>
            </table>
            {/recipes}
        </form>
    </div>
</div>