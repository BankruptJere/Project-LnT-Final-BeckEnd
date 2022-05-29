@extends('layouts.app')

@section('title', 'Manage Blog | Blogify')

@section('content')
    {{-- MODAL CREATE --}}
    @include('blogs.create')

    {{-- MANAGE BLOG --}}
    <div class="container mt-3">
        <div class="col-md-7 bg-light p-4 rounded">
            <h4>Manage Blog</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia cumque repudiandae, optio aliquam ipsa alias
            </p>
            <hr>

            @if (Auth::user()->role == 'Member')
                <button class="btn btn-sm btn-dark my-3" data-bs-toggle="modal" data-bs-target="#createBlogModal">
                    <i class="uil uil-plus me-1"></i>Buat Blog
                </button>
            @endif

            @if (session('success_msg'))
                <div class="alert alert-success mb-3">{{ session('success_msg') }}</div>
            @endif

            @if ($blogs->count() != 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Judul Blog</th>
                            <th>Deskripsi</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ asset('storage/blogs/' . $blog->thumbnail) }}" width="100">
                                </td>
                                <td>
                                    <span class="d-block">{{ $blog->title }}</span>
                                    <span class="badge bg-primary">{{ $blog->category->title }}</span>
                                </td>
                                <td>{{ $blog->description }}</td>
                                <td>{{ $blog->user->username }}</td>
                                <td>
                                    @if (Auth::user()->role == 'Member')
                                        <a href="{{ route('editBlog', $blog->id) }}" class="text-primary"><i
                                                class="uil uil-edit"></i></a>
                                    @endif

                                    <a href="" class="text-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
                                        <i class="uil uil-trash-alt"></i>
                                        <form id="delete-form" action="{{ route('deleteBlog', $blog->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">Blognya masih kosong</div>
            @endif
        </div>
    </div>
@endsection
