{{view('dashboard')}}
<div class="table-container">
    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td class="table-dark ">ID</td>
            <td class="table-dark " >product id</td>
            <td>OPREATION</td>
        </tr>
        <!-- row -->
        @foreach ($features as $feature)
            <tr class="table-dark ">
                <td class="table-dark  ">{{ $feature->id }}</td>
                <td class="table-dark  ">{{ $feature->product_id }}</td>
                <td class="table-dark">
                    <a class="btn btn-danger" href = 'delete-feature/{{ $feature->id }}'> DELET </a>
                </td>   
            </tr>
        @endforeach
    </table>
</div>    
</body>
</html>