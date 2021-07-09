{{view('dashboard')}}
<div class="table-container">

    @if(Session('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif
    <!-- start form -->
    <form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <!-- table -->
        <table class="table table-dark table-striped">
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">First Name</td>
                <td class="table-dark">
                     <input type = 'text' name = 'name' value = '<?php echo$users[0]->name; ?>'> 
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Email</td>
                <td class="table-dark">
                    <input type = 'text' name = 'email' value = '<?php echo$users[0]->email; ?>'>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td class="table-dark">Role</td>
                <td class="table-dark">
                   <select name="role" id="role">
                       <option value="<?php echo$users[0]->role; ?>"><?php echo$users[0]->role; ?></option>
                        @if($users[0]->role == 'user')
                           <option value="admin">admin</option>
                           <option value="moderator">moderator</option>
                        @endif
                        @if($users[0]->role == 'admin')
                            <option value="moderator">moderator</option>
                           <option value="user">user</option>
                        @endif
                        @if($users[0]->role == 'moderator')
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        @endif
                   </select>
                </td>
            </tr>
            <!-- row -->
            <tr class="table-dark">
                <td  class="table-dark">
                    <input type = 'submit' value = "Update User"  class="btn btn-success">
                </td>
                <td  class="table-dark">
                    <a class="btn btn-danger" href = " {{ url('viewUsers') }}"> BACK </a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>