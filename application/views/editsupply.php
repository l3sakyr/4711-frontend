<div class="row">
    <div>
        {supplies}
        <form>
            <table border="1" cellpadding="5px">
                <input type="text" name="code" placeholder="{code}" readonly><br>
                <input type="text" name="name" placeholder="{name}"><br>
                <input type="text" name="description" placeholder="{description}"><br>
                <input type="text" name="quantity" placeholder="{quantity}"><br>
                <input type="text" name="measuring_units" placeholder="{measuring_units}"><br>
                <input type="text" name="receiving_cost" placeholder="{receiving_cost}"><br>
                <input type="text" name="receiving_amount" placeholder="{receiving_amount}"><br>
                <br>
                <a class="btn btn-default" href="/administration/updatesupply">Submit</a><br>
                
            </table>
        </form>
        {/supplies}
    </div>
</div>