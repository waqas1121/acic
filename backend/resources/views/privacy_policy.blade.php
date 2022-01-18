<html>
<head>
    @php $setting =\App\Setting::pluck('value','name')->toArray(); @endphp
    <link rel="icon" type="image/png" sizes="16x16"
          href="@isset($setting['favicon']){{ asset('uploads/'.$setting['favicon']) }}@endisset">
    <title>Privacy Policy</title>
{{--    <link rel="stylesheet" href="{{ mix('css/admin-master.css') }}">--}}
</head>
<body class="fix-header">
<div style="text-align: center">
    <img src="{{asset('uploads/logo.png')}}"
         alt="home" class="light-logo" style="height: 160px"/>
</div>

<div style="margin: 15px;">
    {!!$privacy_policy->description!!}
</div>
{{--<script src="{{ mix('js/admin-master.js') }}"></script>--}}
</body>
</html>
