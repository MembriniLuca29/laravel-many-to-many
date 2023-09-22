@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">contenuto</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">
                                {{ $type->id }}
                            </th>
                            <td>
                                {{ $type->title }}
                            </td>
                            <td>
                                {{ $type->slug }}
                            </td>
                            <td>
                                {{ $type->content }}
                            </td>
                            <td class="button-column">
                                <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                                <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" onsubmit="return confirm('sei sicuro di voler eliminare questo type?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit">
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
                project collegati
            </h2>
            <ul class="post-type">
                @foreach ($type->posts as $post)
                    <li class="my-2">
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection