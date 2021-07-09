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
    <!-- start table -->
    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td  class="table-dark"> Id</td>
            <td  class="table-dark">User Id</td>
            <td  class="table-dark">Product Id</td>
            <td  class="table-dark">Product Image</td>
            <td  class="table-dark">Cost</td>
            <td  class="table-dark">Status</td>
            <td  class="table-dark">Payment Method</td>
            <td  class="table-dark">Payment_Stauts</td>
            <td>OPREATION</td>
        </tr>
        @foreach ($orders as $order)
        <!-- row -->
        <tr class="table-dark">
            <td class="table-dark">{{ $order->id }}</td>
            <td class="table-dark">{{ $order->user_id }}</td>
            <td class="table-dark">{{ $order->product_id }}</td>
            @foreach($products as $product)
                @if($product->id == $order->product_id)
                    <td class="table-dark img-data">
                        <img src="{{ asset('upload/products/' . $product->image) }}" class="image">
                    </td>
                @endif    
            @endforeach
            <td class="table-dark">{{ $order->cost }}</td>
            <td class="table-dark">{{ $order->status }}</td>
            <td class="table-dark">{{ $order->payment_method }}</td>
            <td class="table-dark">{{ $order->payment_status }}</td>
            <td class="table-dark">
                <a class="btn btn-warning" href = 'edit-order/{{ $order->id }}'>EDIT </a>
            </td>    
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
