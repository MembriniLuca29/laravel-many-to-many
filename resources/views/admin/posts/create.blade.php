@extends('layouts.app')

@section('page-title', 'Aggiungi un post')

@section('main-content')
    <div class="row">
        <div class="col bg-info-subtle">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="255" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">immagine di copertina</label>
                    <input class="form-control" type="file" id="cover_img" name="cover_img" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">tipologia</label>
                    <select class="form-select" id="type_id" name="type_id">
                        <option value="">Seleziona una tipologia...</option>
                        @foreach ($types as $type)
                            <option
                                {{-- Il value sarà l'ID della categoria --}}
                                value="{{ $type->id }}"

                                {{-- Aggiungo l'attributo selected sulla option che era stata precedentemente selezionata --}}
                                @if (old('type_id') == $type->id)
                                    selected
                                @endif
                                {{-- {{ old('type_id') == $type->id ? 'selected' : '' }} --}}
                                >
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">tecnology</label>
                    @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="technologies[]"
                            id="technology-{{ $technology->id }}"
                            value="{{ $technology->id }}"
                            @if (in_array($technology->id, old('technologies', [])))
                                checked
                            @endif
                        >
                        <label class="form-check-label" for="technology-{{ $technology->id }}">
                            {{ $technology->title }}
                        </label>
                    </div>
                @endforeach
                
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
