@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Section</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Manage Section</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <div class="row">
        @include('admin.partials._msg')
        <div class="col-sm-12">
            <div class="white-box">

                <h3 class="box-title m-b-0">Manage Section</h3>
                <p class="text-muted m-b-30">Section List</p>
                <div class="table-responsive">

                    <table id="" class="table table-striped responsive nowrap" width="100%">
                        <thead>
                            <th>#</th>
                            <th>NAME</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($sections as $id=>$name)
                                <tr>
                                    <th scope="row">{{ $id }}</th>
                                    <td>{{ $name }}</td>
                                    <td>
                                        <a title="Edit User" class="btn btn-success btn-circle"
                                           href="{{ route('sections.edit',$id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- sample modal content -->

                <!-- /.modal -->
            </div>
        </div>


    </div>
    </div>

@section('scripts')

@endsection
@stop
