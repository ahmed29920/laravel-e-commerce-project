{{view('dashboard')}}
<div class="table-container">
    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
<!-- start form -->
    <form method="post" action="{{url('add-product')}}" enctype="multipart/form-data" >
    @csrf
    <!-- start table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark"> 
                <td>  product name : </td>
                <td> <input type="text" name="name" class="formcontrol"> </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>  product code : </td>
                <td> <input type="number" name="code" class="formcontrol"> </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>  product price : </td>
                <td> <input type="number" name="price" class="formcontrol"> </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>  category id : </td>
                <td> 
                    <select name="category_id" id="category_id" class="formcontrol">
                        @foreach ($Categries as $Categry)
                            <option value= {{ $Categry->id }} >{{ $Categry->id }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>  product image : </td>
                <td> <input type="file" name="image" class="formcontrol"> </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>  <button class="btn btn-primary" type="submit">save</button> </td>
                <td> <a class="btn btn-danger" href="products">cancel</button> </td>
            </tr>
        </table>
    </form>    
</div>
</body>
</html>