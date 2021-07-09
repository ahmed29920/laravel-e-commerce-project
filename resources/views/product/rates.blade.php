{{view('dashboard')}}
<div class="table-container">
    <table  class="table table-dark table-striped">
        <tr class="table-dark">
            <td  class="table-dark">User Id</td>
            <td  class="table-dark">Product Id</td>
            <td  class="table-dark">Rate</td>
        </tr>
        @foreach ($rates as $rate)
        <tr class="table-dark">
            <td class="table-dark">{{ $rate->user_id }}</td>
            <td class="table-dark">{{ $rate->product_id }}</td>  
            <td class="table-dark">{{ $rate->rate }}</td>    
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
