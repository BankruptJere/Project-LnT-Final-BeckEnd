@extends('layouts.app')

@section('title', 'Home | PT Musang')


@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-3">
                    <div class="col-md-12 bg-light rounded p-3 shadow-sm">
                        <img src="{{ asset('storage/items/' . $item->photo) }}" class="w-100">
                        <h4>{{ $item->itemname }}</h4>
                        <span class="text-muted">{{ $ites->user->username }}</span>
                        <span class="badge bg-info">{{ $item->category->category_name }}</span>
                        <p>{{ $item->item_price }}</p>
                        <p>{{ $item->item_amount }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection