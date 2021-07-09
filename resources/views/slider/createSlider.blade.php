{{view('dashboard')}}
<div class="table-container">
    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
<!-- start form -->
    <form method="post" action="{{url('add-slider')}}" enctype="multipart/form-data">
        @csrf
        <!-- start table -->
        <table class="table table-dark table-striped">
            <!-- start row -->
            <tr class="table-dark"> 
                <td>  Product Image </td>
                <td>  <input type="file" name="image" class="formcontrol">  </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>   Description </td>
                <td>  <input type="text" name="description" class="formcontrol">  </td>
            </tr>
            <!-- row -->
            <tr class="table-dark"> 
                <td>  <button class="btn btn-success" type="submit">save</button> </td>
                <td>  <a class="btn btn-danger" href="sliders"> cancel </a>  </td>
            </tr>
        </table>
        <!-- end table -->
    </form>
</div>
</body>
</html>