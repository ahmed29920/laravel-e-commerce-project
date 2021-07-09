{{view('dashboard')}}
<div class="table-container">

@if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
@endif
    <form action = "/edit-post/<?php echo $post[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <table class="table table-dark table-striped">
            <tr class="table-dark">
                <td class="table-dark">post text :</td>
                <td class="table-dark">
                    <textarea class="form-control" name="text"  value = '<?php echo $post[0]->post_text; ?>'>
                        <?php echo $post[0]->post_text; ?>
                    </textarea> 
                </td>
            </tr>
            <tr class="table-dark"> 
                <td>  post image : </td>
                <td class="table-dark img-data">
                    <img src="{{ asset('upload/posts/' . $post[0]->image) }}" class="image">
                </td>
            </tr>
            <tr>
                <td>status</td>
                <td>
                    @if( $post[0]->is_active == 1 )
                        active:<input type="checkbox" value=" "  name="is_active[]" checked>
                    @else   
                        active: <input type="checkbox"  value=" " name="is_active[]" >
                    @endif
                </td>
            <tr>
            <tr class="table-dark">
                <td  class="table-dark">
                 <input type = 'submit' value = "Update Post"  class="btn btn-success">
                </td>
                <td  class="table-dark">
                <a class="btn btn-danger" href = " {{ url('posts') }}"> BACK </a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>