{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <!-- start form -->
    <form method="post" action="{{url('add-feature')}}">
    @csrf
    <!-- start table  -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr>
                <td> Product Id </td>
                <td>  
                    <select name="product_id" id="category_id" class="formcontrol">
                        @foreach ($products as $product)
                            <option value= {{ $product->id }} >{{ $product->id }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <!-- row -->
            <tr>
                <td><button class="btn btn-success" type="submit">save</button></td>
                <td><a class="btn btn-danger" href="features">cancel</a></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>