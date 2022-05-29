@extends('layouts.app')

@section('title', 'Edit Blog | Blogify')

@section('content')
    {{-- EDIT BLOG --}}
    <div class="container mt-3">
        <div class="col-md-7 bg-light p-4 rounded">
            <h4>Edit Blog</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia cumque repudiandae, optio aliquam ipsa alias
            </p>
            <hr>

            <form action="{{ route('updateBlog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Thumbnail Blog</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                        placeholder="Thumbnail Blog..." name="thumbnail" value="{{ old('thumbnail') ? old('thumbnail') : $blog->thumbnail }}">
                    @error('thumbnail')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Judul Blog</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Blog..."
                        name="title" value="{{ old('title') ? old('title') : $blog->title }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Konten Blog</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Konten Blog..." name="content"
                        rows="5">
                    {{ old('content') ? old('content') : $blog->content }}
                </textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kategori Blog</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
