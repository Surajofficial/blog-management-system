@extends('layout.base')

@section('main')
    @include('layout.nav')
    <div class="container mt-4">
        <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST"
            class="form mt-4 m-auto d-block col-10 mt-5">
            @csrf
            @method('PUT')
            <div class="mb-3 ">
                <div class="mb-3 ">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Please Enter Title" value="{{ $post->title }}">
                    </div>
                </div>
                <div class="mb-3 ">
                    <label for="content" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>

                    </div>
                </div>
                <div class="mb-3 ">
                    <label for="image" class="col-sm-2 col-form-label">File</label>
                    <img src="{{ asset('post/' . $post->image) }}" height="100">
                    <div class="col-sm-10">
                        <input type="file" class="form-file" id="image" name="image">
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="mb-3 col-1 ">
                        <button type="submit" class="btn btn-success">Submit</button>
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
