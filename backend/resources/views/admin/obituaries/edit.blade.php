@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/bower_components/summernote/dist/summernote.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Obituaries</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('obituaries.index') }}">Manage Obituaries</a></li>
                    <li class="active">Edit Obituaries</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Edit Obituaries</h3>
                    {{ Form::model($obituary, ['method' => 'PATCH','route' => ['obituaries.update', $obituary->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data'])}}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            {{ Form::text('name', null, ['class' => 'form-control','id'=>'name','placeholder'=>'Enter Name']) }}
                            @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_of_death') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Date of Death</label>
                        <div class="col-sm-4">
                            {{ Form::date('date_of_death', null, ['class' => 'form-control','id'=>'date_of_death','placeholder'=>'Enter Date of Death']) }}
                            @error('date_of_death')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_of_burial') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Date of Burial</label>
                        <div class="col-sm-4">
                            {{ Form::date('date_of_burial', null, ['class' => 'form-control','id'=>'date_of_burial','placeholder'=>'Enter Date of Burial']) }}
                            @error('date_of_burial')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('cemetry') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Cemetry</label>
                        <div class="col-sm-4">
                            {{ Form::text('cemetry', null, ['class' => 'form-control','id'=>'cemetry','placeholder'=>'Enter Cemetry']) }}
                            @error('cemetry')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">
                            <textarea name="description" rows="20" id="description"
                                      class="form-control description">{{$obituary->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="image" id="image"/>
{{--                            <span><img src="{{asset('uploads/'.$post->feature_image}}" alt="Image is not found" /></span>--}}
                            @if(File::exists('uploads/thumbnail/'.$obituary->image))
                                <img src="{{asset('uploads/thumbnail/'.$obituary->image)}}"
                                     style=" width:120px;max-width:100%;margin-top:12px" alt="Image is not found."/>
                            @else
                                <img src="{{asset('uploads/placeholder.jpg')}}" style=" width:120px;max-width:100%;margin-top:12px"
                                     alt="Image is not found."/>
                            @endif
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('obituaries.index') }}" class="btn btn-info waves-effect waves-light
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
        $(document).ready(function () {
            $(".tags").select2({
                    placeholder: "Please select a Tag",
                    allowClear: true
                }
            )
        });
    </script>
@endsection
