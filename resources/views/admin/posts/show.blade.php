@extends('layouts.app')

@section('page-title', $post->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h1>
                            {{ $post->title }}
                        </h1>
                        <h6>
                            Slug: {{ $post->slug }}
                        </h6>
                        <div>
                            Categoria:
                            @if ($post->category)
                                <a href="{{ route('admin.categories.show', ['category' => $post->category->id]) }}">
                                    {{ $post->category->title }}
                                </a>
                            @else
                                -
                            @endif
                        </div>
                        <div>

                            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo post?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <p>
                        {{ $post->content }}
                    </p>

                    <hr>

                    <div>
                        <h3>Technology:</h3>
                        <div>
                            @if ($post->technologies)
                                @forelse ($post->technologies as $technology)
                                    <span class="badge rounded-pill text-bg-primary">
                                        {{ $technology->title }}
                                    </span>
                                @empty
                                    Nessuna technology associata a questo post
                                @endforelse
                            @else
                                Nessuna technology associata a questo post
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
