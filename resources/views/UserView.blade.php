{{view('dashboard')}}
<div class="table-container">
    @if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
    @endif
    <!-- table -->
    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>ROLE</td>
            @if(Auth::user()->role == 'admin')
                <td>OPREATION</td>
            @endif
        </tr>
        @foreach ($users as $user)
        <!-- row -->
        <tr class="table-dark">
            <td class="table-dark">{{ $user->id }}</td>
            <td class="table-dark">{{ $user->name }}</td>
            <td class="table-dark">{{ $user->email }}</td>
            <td class="table-dark">{{ $user->role }}</td>
            @if(Auth::user()->role == 'admin')
                <td class="table-dark">
                    <a class="btn btn-warning" href = 'edit/{{ $user->id }}'>EDIT</a>
                    <a class="btn btn-danger" href = 'delete/{{ $user->id }}'>DELET</a>
                </td>
            @endif
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>