@extends('admin.index')


@section('menu')
    <div id="app">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Travel Blog </div>
            <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light" id="country">Country</a>
            <a href="#" class="list-group-item list-group-item-action bg-light" id="city">City</a>
            <a href="#" class="list-group-item list-group-item-action bg-light" id="post">Post</a>
            </div>
        </div>
    </div>
@endsection