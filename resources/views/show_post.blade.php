@extends('layout.base')

@section('main')
    @include('layout.nav')
    <div class="container mt-4">
        <div class="col-6 m-auto">
            <img src="{{ asset('post/' . $post->image) }}" class="img-fluid rounded-start" alt="...">
        </div>
        <h1><span class="text-uppercase">{{ $post->title }}</span>
            <small class="text-body-secondary" style="font-size:10px">{{ $post->created_at }}
                Auth-{{ $post->user->name }}</small>
        </h1>
        <div class="col-6">
            <p>
                {{ $post->content }}
            </p>
        </div>
        <div class="col-5 m-auto">
            <h2>Comments</h2>
            @foreach ($post->comment as $item)
                <p>
                    {{ $item->comment }} by <small> {{ $item->name }} {{ $item->email }}</small>
                </p>
            @endforeach
        </div>
        <form action="{{ route('addcomment', $post->id) }}" method="POST" class="form mt-4 m-auto d-block col-10 mt-5">
            @csrf
            <div class="mb-3 ">
                <div class="mb-3 ">
                    <label for="content" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-10">
                        <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                    </div>
                </div>

                <div class="row d-flex">
                    <div class="mb-3 col-1 ">
                        <button type="submit" class="btn btn-success">Post</button>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

        </form>
    </div>
@endsection
