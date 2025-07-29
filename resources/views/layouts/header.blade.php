<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="switch_theme">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') . ' | ' . $title }}</title>
    {{-- bootsrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('template/font-awesome/css/all.min.css') }}">

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('template/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/icon-sidebar.css') }}">
    <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet">
    {{-- logo --}}
    <link rel="shortcut icon" href="{{ asset('images/logo-ksb.png') }}">
    <link rel="icon" href="{{ asset('images/logo-ksb.png') }}">
    {{-- summernote --}}
    <link rel="stylesheet" href="{{ asset('template/summernote/summernote-bs5.min.css') }}">
    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="{{ asset('template/css/style-select2-dark.css') }}">

    {{-- for livewire --}}
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('template/css/style-input.css') }}">

    {{-- lainnya --}}
    <link rel="stylesheet" href="{{ asset('template/css/style-lainnya.css') }}">
</head>
