{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
<!-- form -->
    <form action = "/edit-offer/<?php echo $offers[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <!-- table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark">
                <td class="">Product Id :</td>
                <td class="">
                     <h3> <?php echo$offers[0]->product_id; ?> </h3> 
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="">Product Image :</td>
                @foreach($products as $product)
                    @if($product->id == $offers[0]->product_id)
                        <td class=" img-data">
                            <img src="{{ asset('upload/products/' . $product->image) }}" class="image" style="height:8rem">
                        </td>
                    @endif    
                @endforeach
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="">Product Price :</td>
                @foreach($products as $product)
                    @if($product->id == $offers[0]->product_id)
                        <td class="">
                            <h3> {{$product->price}} </h3>
                        </td>
                    @endif    
                @endforeach
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="">Percentage</td>
                <td class="">
                    <input type ='number' name = 'percentage' value = '<?php echo$offers[0]->percentage; ?>'>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td  class="table-dark">
                    <input type = 'submit' value = "Update Offer"  class="btn btn-success">
                </td>
                <td  class="table-dark">
                    <a class="btn btn-danger" href = " {{ url('offers') }}"> BACK </a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>