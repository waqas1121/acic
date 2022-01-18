@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/bower_components/summernote/dist/summernote.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Prayers</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('prayers.index') }}">Manage Prayers</a></li>
                    <li class="active">Add Prayers</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Add Prayers</h3>
                    {{ Form::open([ 'route' => 'prayers.store','class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data']) }}
                    <div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Select Month</label>
                        <div class="col-sm-4">
                            <select id="" name="month" class="form-control months">
                                <option>--Select Month--</option>
                                @foreach($months as $index=>$value)
                                    <option value="{{$index}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div id="form">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <input type="button" class="btn btn-xs btn-success" id="add" value="+ Add More">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-2">
                                <input type="text" name="title[]"
                                       class="form-control @error('title') is-invalid @enderror"
                                       required autocomplete="title" autofocus id="title"
                                       placeholder="Enter Title">
                                @error('title')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <label class="col-sm-1 control-label">Time</label>
                            <div class="col-sm-2">
                                <input type="time" name="time[]"
                                       class="form-control @error('time') is-invalid @enderror"
                                       placeholder="Enter Time">
                                @error('time')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('prayers.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Save
                            </button>
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
    <script type="text/javascript"
            src="{{asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#add").click(function () {
                var markup = "<div class='form-group'>" +
                    "<label class='col-sm-3 control-label'>Title</label>" +
                    "<div class='col-sm-2'>" +
                    "<input type = 'text' name = 'title[]' class = 'form-control' placeholder = 'Enter Prayer Title' />" +
                    "</div>" +
                    "<label class='col-sm-1 control-label'>Time</label>" +
                    "<div class='col-sm-2'>" +
                    "<input type = 'time' name = 'time[]' class = 'form-control' placeholder = 'Enter Prayer Time' />" +
                    "</div>" +
                    "</div>"

                $("#form").append(markup);
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var options = {
                height: 350
            };
            $('#description').summernote(options);
        });
    </script>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".months").select2({
                    placeholder: "Please select a Category",
                    allowClear: true
                }
            )
        });
    </script>
@endsection
