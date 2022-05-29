@extends('layouts.app')

@section('title', 'Manage Categories | Blogify')

@section('content')
    {{-- MODAL CREATE --}}
    @include('categories.create')

    {{-- MANAGE CATEGORIES --}}
    <div class="container mt-3">
        <div class="col-md-7 bg-light p-4 rounded">
            <h4>Manage Categories</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia cumque repudiandae, optio aliquam ipsa alias
            </p>
            <hr>

            <button class="btn btn-sm btn-dark my-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal"><i
                    class="uil uil-plus me-1"></i>Buat Kategori</button>

            @if (session('success_msg'))
                <div class="alert alert-success mb-3">{{ session('success_msg') }}</div>
            @endif

            @if ($categories->count() != 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ route('editCategory', $category->id) }}" class="text-primary"><i
                                            class="uil uil-edit"></i></a>

                                    <a href="" class="text-danger"
                                        onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
                                        <i class="uil uil-trash-alt"></i>
                                        <form id="delete-form" action="{{ route('deleteCategory', $category->id) }}"
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
                <div class="alert alert-warning">Kategorinya masih kosong</div>
            @endif
        </div>
    </div>
@endsection
