@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/bower_components/summernote/dist/summernote.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">News</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('posts.index') }}">Manage News</a></li>
                    <li class="active">Add News</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Add News</h3>
                    {{ Form::open([ 'route' => 'posts.store','class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data']) }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-4">
                            {{ Form::select('categories',$categories, null, ['class' => 'custom-select  custom-select-sm form-control
                                categories']) }}
                            @error('categories')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-4">
                            {{ Form::text('title', null, ['class' => 'form-control','id'=>'title','placeholder'=>'Enter Title']) }}
                            @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">
                            <textarea name="description" rows="20" id="description"
                                      class="form-control description">{{old('description')}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('featured_image') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Featured Image</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="featured_image" id="featured_image"/>
                            @error('featured_image')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('posts.index') }}" class="btn btn-info waves-effect waves-light
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
    <script type="text/javascript" src="{{asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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
            $(".categories").select2({
                    placeholder: "Please select a Category",
                    allowClear: true
                }
            )
        });
    </script>
@endsection
