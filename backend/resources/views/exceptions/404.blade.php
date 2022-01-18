@extends('layouts.master')
@section('content')
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="text-danger">404</h1>
                <h3 class="text-uppercase">Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
                <a href="{{ route('admin.login')}}" class="btn btn-danger btn-rounded waves-effect
                waves-light
                m-b-40"><i class="fa fa-backward"></i> Back to home</a>
            </div>
        </div>
    </section>
@endsection
