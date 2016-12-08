<div class="row">
    <h4>Production</h4><br>
    
    <!--
    <table border="1" cellpadding="5px">
        <tr>
            <th>Recipes</th>
        </tr>
        {recipes}
            <tr align="center">
                <td><a href="/production/ingredients/{code}">{name}<a></td> 
            </tr>
        {/recipes}
    </table>
    -->
    <form action="/Production/receipt"> 
         <table border="1" cellpadding="5px">
            <tr>
                <th>Recipes</th>
                <th>Production Quantity</th>
                <th>Produce</th>
            </tr>
            {recipes}
        
            <tr align="center">
                 <td><a href="/production/ingredients/{code}">{name}<a></td>
                 <td><input type="text" name="production_quantity/{code}" style="width:20px"></td>
                    <td><input type="submit" name="id" value="{code}"></td>
            </tr>
            {/recipes}
        </table>
        
    </form>
    
      
       
    
    
</div>
