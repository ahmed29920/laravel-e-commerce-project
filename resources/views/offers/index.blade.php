{{view('dashboard')}}  
<div class="table-container">

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
    <!-- table -->
    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td  class="table-dark">Product Id</td>
            <td  class="table-dark">Discount</td>
            <td  class="table-dark">Product Image</td>
            <td  class="table-dark">Product Price</td>
            <td  class="table-dark">Final Price</td>
            <td>OPREATION</td>
        </tr>
        @foreach ($offers as $offer)
        <!-- row -->
        <tr class="table-dark">
            <td class="table-dark">{{ $offer->product_id }}</td>
            <td class="table-dark">{{ $offer->percentage }} %</td>
            @foreach($products as $product)
                @if($product->id == $offer->product_id)
                    <td class="table-dark img-data">
                        <img src="{{ asset('upload/products/' . $product->image) }}" class="image" style="height:7rem">
                    </td>
                    <td class="table-dark">{{ $product->price }}</td>   
                    <td class="table-dark">{{ $product->price - ($product->price * $offer->percentage)/100 }}</td>
                    @break
                @endif    
            @endforeach 
            <td class="table-dark">
                <a class="btn btn-warning" href = 'edit-offer/{{ $offer->id }}'>EDIT </a>
                <a class="btn btn-danger" href = 'delete-offer/{{ $offer->id }}'>DELETE </a>
            </td>    
        </tr>
        @endforeach
    </table>
    <!-- end table -->
</div>
</body>
</html>
