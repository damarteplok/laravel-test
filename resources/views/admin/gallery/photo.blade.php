@extends('layouts.app')
@section('content')


@include('admin.include.error')



<div class="card">
    <div class="card-header">Createa a new Photo</div>
    <div class="card-body">
        <form action="{{ route('gallery.photo') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="gallery_id" value="{{ $id }}">

            <div class="form-group">
                <label for="featured">Featured image</label>
                <input type="file" name="filename" class="form-control">
            </div>


            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store photo</button>
                </div>
            </div>

        </form>
    </div>
</div>

@stop






