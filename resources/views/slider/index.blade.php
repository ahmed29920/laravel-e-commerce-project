{{view('dashboard')}}   
<div class="table-container">
<!-- start table -->
    <table  class="table table-dark table-striped">
        <!-- row -->
        <tr class="table-dark">
            <td class="table-dark ">ID</td>
            <td class="table-dark slider-data " >IMAGE</td>
            <td class="table-dark slider-data " >DESCRIPTION</td>
            <td>OPREATION</td>
        </tr>
        @foreach ($sliders as $slider)
        <!-- row -->
        <tr class="table-dark ">
            <td class="table-dark  ">{{ $slider->id }}</td>
            <td class="table-dark slider-data" > 
                <img src="{{ asset('upload/slider/' . $slider->image) }}"  class="image">
            </td>
            <td class="table-dark slider-data" >{{$slider->description }}</td> 
            <td class="table-dark  ">
                <a class="btn btn-warning" href = 'edit-slider/{{ $slider->id }}'>EDIT </a>
                <a class="btn btn-danger" href = 'delete-slider/{{ $slider->id }}'> DELET </a>
            </td>   
        </tr>
        @endforeach
    </table>
</div>        
</body>
</html>