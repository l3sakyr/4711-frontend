<div class="row">
    <div>
        <form>
            {recipes}
            <table border="1" cellpadding="5px">
                <input type="text" name="code" placeholder="{code}" readonly><br>
                <input type="text" name="name" placeholder="{name}"><br>
                <input type="text" name="description" placeholder="{description}"><br>
                {/recipes}
                {ingredients}
                <input type="text" name="{name}" placeholder="{supplyName} : {amount}mL" readonly><br>
                {/ingredients}
                <br>
                <a class="btn btn-default" href="/administration/updaterecipe">Submit</a><br>
            </table>
        </form>
    </div>
</div>