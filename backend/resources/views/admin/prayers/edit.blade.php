@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Prayers</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">Manage Prayers</a></li>
                    <li class="active">Edit Prayers</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Edit Prayers</h3>
                    {{ Form::model($prayers, ['method' => 'PATCH','route' => ['prayers.update', $prayers->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data'])}}
                    <div class="form-group {{ $errors->has('Imsak') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Imsak</label>
                        <div class="col-sm-5">
                            <input type="time" name="Imsak"
                                   class="form-control @error('Imsak') is-invalid @enderror"
                                   required autocomplete="Imsak" autofocus id="Imsak" value="{{$prayers->Imsak}}"
                                   placeholder="Enter Imsak">
                        </div>
                        @error('Imsak')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('Fajr') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Fajr</label>
                        <div class="col-sm-5">
                            <input type="time" name="Fajr"
                                   class="form-control @error('Fajr') is-invalid @enderror"
                                   required autocomplete="Fajr" autofocus id="Fajr" value="{{$prayers->Fajr}}"
                                   placeholder="Enter Fajr">
                        </div>
                        @error('Fajr')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('Sunrise') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Sunrise</label>
                        <div class="col-sm-5">
                            <input type="time" name="Sunrise"
                                   class="form-control @error('Sunrise') is-invalid @enderror"
                                   required autocomplete="Sunrise" autofocus id="Sunrise" value="{{$prayers->Sunrise}}"
                                   placeholder="Enter Sunrise">
                        </div>
                        @error('Sunrise')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('Dhuhr') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Dhuhr</label>
                        <div class="col-sm-5">
                            <input type="time" name="Dhuhr"
                                   class="form-control @error('Dhuhr') is-invalid @enderror"
                                   required autocomplete="Dhuhr" autofocus id="Dhuhr" value="{{$prayers->Dhuhr}}"
                                   placeholder="Enter Dhuhr">
                        </div>
                        @error('Dhuhr')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('Sunset') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Sunset</label>
                        <div class="col-sm-5">
                            <input type="time" name="Sunset"
                                   class="form-control @error('Sunset') is-invalid @enderror"
                                   required autocomplete="Sunset" autofocus id="Sunset" value="{{$prayers->Sunset}}"
                                   placeholder="Enter Sunset">
                        </div>
                        @error('Sunset')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('Maghrib') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Maghrib</label>
                        <div class="col-sm-5">
                            <input type="time" name="Maghrib"
                                   class="form-control @error('Maghrib') is-invalid @enderror"
                                   required autocomplete="Maghrib" autofocus id="Maghrib" value="{{$prayers->Maghrib}}"
                                   placeholder="Enter Maghrib">
                        </div>
                        @error('Maghrib')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('prayers.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Update
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
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
@endsection
