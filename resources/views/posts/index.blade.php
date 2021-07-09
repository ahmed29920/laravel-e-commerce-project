{{view('dashboard')}}  
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
    <div class="table-container" >
    <table  class="table table-dark table-striped">
    <tr class="table-dark">
        <td  class="table-dark">Id</td>
        <td  class="table-dark">User Id</td>
        <td  class="table-dark">Post Text</td>
        <td  class="table-dark">Post IMAGE</td>
        <td  class="table-dark">Post status</td>
        @if(Auth::user()->role == 'admin')
            <td>OPREATION</td>
        @endif
    </tr>
    @foreach ($posts as $post)
    <tr class="table-dark">
    <td class="table-dark">{{ $post->id }}</td>
        <td class="table-dark">{{ $post->user_id }}</td>
        <td class="table-dark">{{ $post->post_text }}</td>
        <td class="table-dark img-data">
            <img src="{{ asset('upload/posts/' . $post->image) }}" class="image">
        </td>
        @if( $post->is_active == 1 )
        <td class="table-dark">
            active
        </td>
        @else
        <td class="table-dark">
            not active
        </td>
        @endif
        @if(Auth::user()->role == 'admin')
        <td class="table-dark">
            <a class="btn btn-warning" href = 'edit-post/{{ $post->id }}'>EDIT </a>
             <a class="btn btn-danger" href = 'delete-post/{{ $post->id }}'> DELET </a>
        </td>    
        @endif
    </tr>
@endforeach
</table>
    </div>
    </body>
</html>
