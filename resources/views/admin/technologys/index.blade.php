@extends('layouts.app')

@section('page-title', 'Tutti i technology')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.technologys.create') }}" class="btn w-100 btn-success mb-5">
                + Aggiungi
            </a>

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
                    @foreach ($technologys as $technology)
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
                                <a href="{{ route('admin.technologys.show', ['technology' => $technology->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.technologys.edit', ['technology' => $technology->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                                <form action="{{ route('admin.technologys.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection