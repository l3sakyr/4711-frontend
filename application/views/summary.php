<h5>Orders Processed So Far</h5>

<table class="table">
        <tr><th>Order #</th><th>Date/time</th><th>Amount</th></tr>
{orders}
    <tr>
            <td><a href="/sales/examine/{number}">{number}</a></td>
            <td>{datetime}</td>
            <td>{total}</td>
    </tr>
{/orders}
</table>
<a class="btn btn-default" role="button" href="/sales">Start a New Order</a>