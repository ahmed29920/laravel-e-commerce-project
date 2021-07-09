{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}
    </div>
    @endif
    <!-- form -->
    <form method="post" action="{{url('add-category')}}">
        @csrf
        <!-- table -->
        <table class="table table-dark table-stripred">
            <!-- row -->
            <tr class="table-dark">
                <td> category name </td>
                <td> <input type="text" name="name" class="formcontrol"> </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td> <button class="btn btn-success" type="submit">save</button> </td>
                <td> <a class="btn btn-danger" href="category">cancel</a> </td>
            </tr>   

        <table>    
    </form>
    
</div>
</body>
</html>