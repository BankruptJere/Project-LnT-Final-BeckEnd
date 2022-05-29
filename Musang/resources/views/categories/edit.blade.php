@extends('layouts.app')

@section('title', 'Edit Category | Blogify')

@section('content')
    {{-- EDIT CATEGORY --}}
    <div class="container mt-3">
        <div class="col-md-7 bg-light p-4 rounded">
            <h4>Edit Category</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia cumque repudiandae, optio aliquam ipsa alias
            </p>
            <hr>

            <form action="{{ route('updateCategory', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Type category title..." name="title"
                        value="{{ old('title') ? old('title') : $category->title }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
