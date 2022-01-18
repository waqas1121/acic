<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Title</th>
            <td>{{$event->title}}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center h4">Description</th>
        </tr>
        <tr>
            <td colspan="2">{!!$event->description!!}</td>
        </tr>
        <tr>
            <th>From Date</th>
            <td>{{$event->from_date}}</td>
        </tr>
        <tr>
            <th>To Date</th>
            <td>{{$event->to_date}}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$event->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
