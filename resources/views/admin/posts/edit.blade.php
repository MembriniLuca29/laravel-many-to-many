@extends('layouts.app')

@section('page-title', $post->title)

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

            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" required maxlength="255" value="{{ old('title', $post->title) }}">
                </div>

                <div>
                    <label for="content">Contenuto</label>
                    <textarea name="content" rows="3" required>{{ old('content', $post->content) }}</textarea>
                </div>
                {{-- <div class="mt-4">
                    <label for="type_id" class="form-label">type</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option value="{{old('type_id',$type->id }}" selected>{{ old('title',$type->title }}</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="justify-content-center">
                    <button type="submit" class="btn btn-success mt-4">
                        Aggiorna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

