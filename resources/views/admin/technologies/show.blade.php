@extends('layouts.app')

@section('page-title', $technology->title)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            {{ $technology->id }}
                        </th>
                        <td>
                            {{ $technology->title }}
                        </td>
                        <td>
                            {{ $technology->slug }}
                        </td>
                        <td>
                            <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col bg-light">
            <h2>
                Post con questo technology
            </h2>

            <ul>
                @foreach ($technology->posts as $post)
                    <li>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
