@extends('admin.layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pages</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">Manage Pages</a></li>
                    <li class="active">Edit Page</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Edit Page</h3>
                    {{ Form::model($obituary, ['method' => 'PATCH','route' => ['pages.update', $obituary->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data'])}}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Page Name</label>
                        <div class="col-sm-4">
                            {{ Form::text('title', null, ['class' => 'form-control','id'=>'name','placeholder'=>'Enter Name']) }}
                            @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                   
                    
                    
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">
                           
                                      <textarea name="content">{{$obituary->content}}</textarea>
                <script>
                        CKEDITOR.replace( 'content',{allowedContent:true,} );
                        
                </script>
                            @error('content')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    
                   
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('pages.index') }}" class="btn btn-info waves-effect waves-light
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
   <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    
@endsection
