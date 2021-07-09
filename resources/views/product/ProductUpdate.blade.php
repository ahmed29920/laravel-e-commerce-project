{{view('dashboard')}}
<div class="table-container">

@if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
@endif
<!-- start form -->
    <form action = "/edit-product/<?php echo $product[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <!-- start table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Product Name :</td>
                <td class="table-dark">
                     <input type = 'text' name = 'name' value = '<?php echo $product[0]->name; ?>'> 
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Product Code :</td>
                <td class="table-dark">
                    <input type = 'text' name = 'code' value = '<?php echo $product[0]->code; ?>'>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Product Price :</td>
                <td class="table-dark">
                    <input type = 'text' name = 'price' value = '<?php echo $product[0]->price; ?>'>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Categry Id</td>
                <td class="table-dark">
                        <select name="category_id" id="category_id" class="formcontrol">
                                <option value= <?php echo $product[0]->category_id; ?> > <?php echo $product[0]->category_id; ?> </option>
                                @foreach ($Categries as $Categry)
                                    @if( $product[0]->category_id !=  $Categry->id )
                                    <option value= {{ $Categry->id }} >{{ $Categry->id }}</option>
                                    @endif
                                @endforeach
                        </select>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td  class="table-dark">
                 <input type = 'submit' value = "Update Product"  class="btn btn-success">
                </td>
                <td  class="table-dark">
                <a class="btn btn-danger" href = " {{ url('products') }}"> BACK </a>
                </td>
            </tr>
        </table>
        <!-- end table -->
    </form>
    <!-- end form -->
</div>

</body>
</html>