@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="title">MiniImg</h1>

        <form id="upload-form" method="post" action="{{ route('image.compress') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" id="file" multiple>
            <div class="dz-message">Drop PNG, JPEG, WebP, GIF, SVG files here or click to compress</div>
        </form>

        <table id="files-table" class="table mt-4"></table>
    </div>
@endsection
