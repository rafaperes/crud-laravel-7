@extends('layouts.app')

@section('title', $title)

@section('content')

<h4 class="text-uppercase">{{ $title }}</h4>
<a href="{{ route('/') }}" class="btn btn-primary btn-sm mb-4">Voltar</a>

<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="">Imagem:</label>
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Imagem</label>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Nome:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Preço:</label>
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Preço" value="{{ old('price') }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Descrição:</label>
        <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Descrição">{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success btn-sm">Salvar</button>

</form>

@endsection

@push('scripts')
<script>

</script>
@endpush