@extends('layouts.app')

@section('page-title', 'aggiungi post')

@section('main-content')
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="" >Titolo</label>
                    <input type="text" name="title" required maxlength="255" value='{{ old('title') }}'>
                </div>

                <div>
                    <label for="">Contenuto</label>
                    <textarea name="content" rows="3" required value='{{ old('content') }}'></textarea>
                </div>

                <div class="mt-4">
                    <label for="type_id" class="form-label">type</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option selected>Seleziona un type......</option>

                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                @if (old('type_id') == $type->id)
                                selected
                            @endif>
                                {{ $type->title }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="justify-content-center">
                    <button type="submit" class="btn btn-success mt-4">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
