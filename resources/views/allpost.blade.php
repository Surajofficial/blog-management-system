@extends('layout.base')

@section('main')
    @include('layout.nav')
    <div class="container mt-4">
        <div class="col-12">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add Blog Post</a>
        </div>
        @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('post/' . $post->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content, 0, 100 }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $post->created_at }}
                                    Auth-{{ $post->user->name }}</small></p>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <a class="btn btn-success m-1" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <a class="btn btn-success m-1" href="{{ route('posts.show', $post->id) }}">Show</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
        <div class="links">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
