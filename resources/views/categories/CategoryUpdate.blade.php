{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <!-- form -->
    <form action = "/edit-category/<?php echo $Categries[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <!-- table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Name</td>
                <td class="table-dark">
                     <input type = 'text' name = 'name' value = '<?php echo $Categries[0]->name; ?>'> 
                </td>
            </tr>    
            <!-- row -->
            <tr class="table-dark">
                <td colspan = '2' class="table-dark">
                 <input type = 'submit' value = "Update ctegory"  class="btn btn-success">
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td colspan = '2' class="table-dark">
                <a class="btn btn-danger" href = " {{ url('category') }}"> BACK </a>
                </td>
            </tr>
            <!-- end table -->
        </table>
    </form>
</div>
</body>
</html>