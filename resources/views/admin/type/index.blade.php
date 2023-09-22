@extends('layouts.app')

@section('page-title', 'Tutti i type')

@section('main-content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.types.create') }}" class="btn w-100 btn-success mb-5">
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
                    @foreach ($types as $type)

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
                            <td class="button-column ">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
