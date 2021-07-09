{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <!-- start form -->
    <form action = "/edit-order/<?php echo $order[0]->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <!-- start table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">id</td>
                <td class="table-dark"> <?php echo $order[0]->id; ?> </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">status</td>
                <td class="table-dark">
                    <select name="status" id="status" class="formcontrol"> 
                        <!-- check the status -->
                        <option value= <?php echo $order[0]->status; ?> > <?php echo $order[0]->status; ?> </option>
                            @if( $order[0]->status ==  "pending" )
                                <option value="dlivered"  >deliverd</option>
                            @else
                            <option value="pending"  >pending</option>
                            @endif
                    </select>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">payment status</td>
                <td class="table-dark">
                    <select name="paymentStatus" id="status" class="formcontrol">
                        <option value= <?php echo $order[0]->payment_status; ?> > <?php echo $order[0]->payment_status; ?> </option>
                           <!-- check the payment status -->
                            @if( $order[0]->payment_status ==  "pending" )
                                <option value="dlivered"  >deliverd</option>
                            @else
                            <option value="pending"  >pending</option>
                            @endif
                    </select>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td  class="table-dark">
                 <input type = 'submit' value = "Update Order"  class="btn btn-success">
                </td>
                <td  class="table-dark">
                <a class="btn btn-danger" href = " {{ url('orders') }}"> BACK </a>
                </td>
            </tr>
        </table>            
    </form>
</div>    
</body>
</html>