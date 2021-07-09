{{view('dashboard')}}
<div class="table-container">
    <table  class="table table-dark table-striped">
        <tr class="table-dark">
            <td  class="table-dark">User Id</td>
            <td  class="table-dark">Product Id</td>
        </tr>
        @foreach ($likes as $like)
        <tr class="table-dark">
            <td class="table-dark">{{ $like->user_id }}</td>
            <td class="table-dark">{{ $like->product_id }}</td>    
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
