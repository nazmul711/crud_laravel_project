@extends('layoutss.app')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h3 class="text-muted">Product Edit #{{$product->name}}</h3>
                <form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="hidden" name="edit_id" value="{{$product->id}}" />
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" />
                        @if($errors->has('name'))
                        <span class="text-danger"> {{$errors->first('name')}} </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="4"
                            name="description"> {{$product->description}} </textarea>

                        @if($errors->has('description'))
                        <span class="text-danger"> {{$errors->first('description')}} </span>
                        @endif
                    </div>
                    <div class="from-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        @if($errors->has('image'))
                        <span class="text-danger"> {{$errors->first('image')}} </span>
                        @endif

                    </div>
                    <button type="submit" class="btn btn-dark"> submit </button>
                </form>
            </div>
        </div>
        @endsection