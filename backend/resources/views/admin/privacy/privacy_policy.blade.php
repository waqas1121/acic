@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/bower_components/summernote/dist/summernote.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Privacy Policy</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Edit Privacy Policy</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Edit Privacy Policy</h3>
                    {{ Form::model($privacy, ['method' => 'POST','route' => ['privacy_policy.update', $privacy->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data'])}}
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">
                            <textarea name="description" id="description" rows="10" class="form-control">{{$privacy->description}}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Update</button>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>
@stop
@section("scripts")
    <script type="text/javascript" src="{{asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                height: 350
            };
            $('#description').summernote(options);
        });
    </script>
@endsection
