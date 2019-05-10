@extends('layouts.app')
@section('content')

    <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="" accept="image/*">
        <input type="submit" value="save">
    </form>
@endsection