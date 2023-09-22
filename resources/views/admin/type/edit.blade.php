@extends('layouts.app')

@section('page-title', $type->title)

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

            <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" required maxlength="255" value="{{ old('title', $type->title) }}">
                </div>
                
                <div class="justify-content-center">
                    <button type="submit" class="btn btn-success mt-4">
                        Aggiorna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

