<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Name</th>
            <td>{{$obituaries->name}}</td>
        </tr>
        <tr>
            <th>Date of Death</th>
            <td>{{$obituaries->date_of_death}}</td>
        </tr>
        <tr>
            <th>Date of Burial</th>
            <td>{{$obituaries->date_of_burial}}</td>
        </tr>
        <tr>
            <th>Cemetry</th>
            <td>{{$obituaries->cemetry}}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center h4">Description</th>
        </tr>
        <tr>
            <td colspan="2">{!!$obituaries->description!!}</td>
        </tr>
        <tr>
            <th>Created At</th>
            @if(File::exists('uploads/thumbnail/'.$obituaries->image))
                <td><img src="{{asset('uploads/thumbnail/'.$obituaries->image)}}"
                         style=" width:120px;max-width:100%;margin-top:12px" alt="Image is not found."/></td>
            @else
                <td><img src="{{asset('uploads/placeholder.jpg')}}" style=" width:120px;max-width:100%;margin-top:12px"
                         alt="Image is not found."/></td>
            @endif
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$obituaries->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
