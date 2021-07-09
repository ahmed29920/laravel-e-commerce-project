{{view('dashboard')}}
<div class="table-container">
        @if(Session('status'))
            <div class="alert alert-success">
                {{ Session('status') }}
            </div>
        @endif

        <form method="post" action="{{url('add-post')}}" enctype="multipart/form-data" >
@csrf
<table class="table table-dark table-striped">
    <tr class="table-dark"> 
        <td>  Post text : </td>
        <td> <textarea class="form-control" name="text" placeholder="enter your post text" ></textarea> </td>
    </tr>
    <tr class="table-dark"> 
        <td>  post image : </td>
        <td> <input type="file" name="image" class="formcontrol"> </td>
    </tr>
    <tr class="table-dark"> 
        <td>  <button class="btn btn-primary" type="submit">save</button> </td>
        <td> <a class="btn btn-danger" href="products">cancel</button> </td>
    </tr>
</table>
 </form>
 </div>
    </body>
</html>