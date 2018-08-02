<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Peninsula</title>
    <meta name="description" content="@yield('meta_description', 'Peninsula')">
    <meta name="author" content="@yield('meta_author', 'Pconsortium')">
@yield('meta')

{{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
@stack('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}



    @stack('after-styles')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

</head>