{{view('dashboard')}}  
    @if(Session('status'))
            <div class="alert alert-success">
                {{ Session('status') }}
            </div>
    @endif
    @if(Session('fail-status'))
            <div class="alert alert-danger">
                {{ Session('fail-status') }}
            </div>
    @endif
    <div class="table-container" >
        <!-- start table -->
    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td  class="table-dark">Id</td>
            <td  class="table-dark">Name</td>
            <td  class="table-dark">CODE</td>
            <td  class="table-dark">CATEGORY ID</td>
            <td  class="table-dark">PRICE</td>
            <td  class="table-dark">IMAGE</td>
            <!-- if the role is admin => show the operations buttons -->
            @if(Auth::user()->role == 'admin')
                <td>OPREATION</td>
            @endif
        </tr>
        @foreach ($products as $product)
            <!-- row -->
        <tr class="table-dark">
            <td class="table-dark">{{ $product->id }}</td>
            <td class="table-dark">{{ $product->name }}</td>
            <td class="table-dark">{{ $product->code }}</td>
            <td class="table-dark">{{ $product->category_id }}</td>
            <td class="table-dark">{{ $product->price }}</td>
            <td class="table-dark img-data">
                <img src="{{ asset('upload/products/' . $product->image) }}" class="image">
            </td>
            @if(Auth::user()->role == 'admin')
            <td class="table-dark">
                <a class="btn btn-warning" href = 'edit-product/{{ $product->id }}'>EDIT </a>
                <a class="btn btn-danger" href = 'delete-product/{{ $product->id }}'> DELET </a>
            </td>    
            @endif
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
