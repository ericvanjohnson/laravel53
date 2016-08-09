@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Loop Sample</div>

                    <div class="panel-body">
                        @foreach($posts as $post)
                            <h1>{{ $post->title }}
                                <small> Article # {{ $loop->index }}</small>
                            </h1>
                            <p>{{ $post->body }}</p>
                            <p><em>Remaining: {{ $loop->remaining }}</em></p>
                        @endforeach
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
