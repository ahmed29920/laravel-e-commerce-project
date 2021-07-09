{{view('dashboard')}}
<div class="table-container">

    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td class="table-dark catigory-data" >Id</td>
            <td class="table-dark catigory-data" >Name</td>
            @if(Auth::user()->role == 'admin')
            <td class="table-dark catigory-data">OPREATION</td>
            @endif
        </tr>

        @foreach ($categories as $category)
        <!-- row -->
            <tr class="table-dark">
                <td class="table-dark catigory-data">{{ $category->id }}</td>
                <td class="table-dark catigory-data">{{$category->name }}</td>
                @if(Auth::user()->role == 'admin')
                    <td class="table-dark catigory-data">
                        <a class="btn btn-warning" href = 'edit-category/{{ $category->id }}'>EDIT </a>
                        <a class="btn btn-danger" href = 'delete-category/{{ $category->id }}'> DELET </a>
                    </td>   
                @endif 
            </tr>
        @endforeach
    </table>    
</div>
</body>
</html>