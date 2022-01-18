<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Name</th>
            <td>{{$board->name}}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center h4">Description</th>
        </tr>
        <tr>
            <td colspan="2">{!!$board->description!!}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$board->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
