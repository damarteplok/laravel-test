@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
    <div class="card-header">Createa a new Gallert</div>
    <div class="card-body">
        <form action="{{ route('gallery') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="featured">Product photos (can attach more than one)</label>
                <input type="file" name="photos[]" multiple class="form-control">
            </div>


            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store gallery</button>
                </div>
            </div>

        </form>
    </div>
</div>

@stop






