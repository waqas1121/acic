<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <th>Category Name</th>
        <td>
            @foreach($post->categories as $category)
                {{$category->name}},
            @endforeach
        </td>
        <tr>
            <th>Post Title</th>
            <td>{{$post->title}}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center h4">Post Description</th>
        </tr>
        <tr>
            <td colspan="2">{!!$post->description!!}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{$post->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
