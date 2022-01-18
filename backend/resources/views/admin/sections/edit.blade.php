@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/bower_components/summernote/dist/summernote.css')}}">
@endsection
@section('content')
<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Section</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('sections.index') }}">Manage Section</a></li>
                    <li class="active">Edit Section</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('admin.partials._msg')
                    <h3 class="box-title m-b-0">Edit Section -> {{ $section->name }}</h3>
                    <form method="POST" action="{{ route('sections.update',$section->id) }}" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        @php $count=0; @endphp
                        @foreach($all_columns as $column)
                            @if($column['type']=="file")
                                <div class="form-group">
                                    <label class="form-label">{{$column['label']}}</label>
                                    <?php
                                    if(isset($storedColumns[$column['name']])){
                                        $storedColumns[$column['name']] = $storedColumns[$column['name']];
                                    }else {
                                        $storedColumns[$column['name']]='abc.png';
                                    }
                                    ?>
                                    <input type="file" name="{{$column['name']}}" class="{{$column['class']}}" id="{{$column['id']}}">
                                    @if(File::exists('uploads/'.$storedColumns[$column['name']]))
                                        <img src="{{asset('uploads/'.$storedColumns[$column['name']])}}" style="{{$column['style']}}" alt="{{$column['name']}} is not found" />
                                    @else
                                        <img src="{{asset('uploads/img.png')}}" style="{{$column['style']}}" alt="{{$column['name']}} is not found"/>
                                    @endif
                                </div>
                            @endif

                            @if($column['type']=="text")
                                <div class="form-group">
                                    <label class="form-label">{{$column['label']}}</label>
                                    <input type="text"
                                           name="{{$column['name']}}"
                                           placeholder="{{isset($column['place_holder']) ? $column['place_holder'] :''}}"
                                           value="{{ isset($storedColumns[$column['name']]) ? $storedColumns[$column['name']]
                                         : ''}}"
                                           class="{{$column['class']}}" id="{{$column['id']}}">
                                </div>
                            @endif
                            @if($column['type']=="hidden")

                                <input type="hidden" name="{{$column['name']}}" value="{{ isset
                          ($storedColumns[$column['name']]) ? $storedColumns[$column['name']]: ''}}">

                            @endif
                            @if($column['type']=="textarea")
                                <div class="form-group">
                                    <label class="form-label">{{$column['label']}}</label>
                                    <textarea
                                        name="{{$column['name']}}"
                                        class="{{$column['class']}}"
                                        rows="{{$column['rows']}}"
                                        placeholder="{{ isset($column['place_holder']) ? $column['place_holder'] :''}}"
                                        id="description {{$column['id']}}">{{ isset($storedColumns[$column['name']]) ? $storedColumns[$column['name']] : ''}}
                                </textarea>
                                </div>
                            @endif
                            @php $count++; @endphp
                        @endforeach

                        <div class="form-group m-b-0 text-center">
                            <a href="{{ route('sections.index') }}" class="btn btn-info waves-effect waves-light
                             m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>
@stop
@section("scripts")
    <script type="text/javascript" src="{{asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script type="text/javascript">
        $(document).load(function () {
            var options = {
                height: 350
            };
            $('#description').summernote(options);
        });
    </script>
@endsection
