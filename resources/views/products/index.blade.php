@extends('layouts.app')

@section('title', $title)

@section('content')

<h4 class="text-uppercase">{{ $title }}</h4>
<a href="{{ route('product.create') }}" class="btn btn-success btn-sm mb-4">Novo Produto</a>

@include('components.messages')

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">{{ $title }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="TableProducts">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                    <tr>
                        <th scope="row">{{ $prod->id }}</th>
                        <td>{{ $prod->name }}</td>
                        <td><img src="{{ asset('storage/' . $prod->image) }}" style="width: 75px"></td>
                        <td>{{ $prod->price }}</td>
                        <td>{{ $prod->description }}</td>
                        <td>
                            <a href="{{ route('product.edit', $prod->id) }}" class="btn btn-success btn-sm">Editar</a>
                            <a href="{{ route('product.delete', $prod->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Deseja apagar esse registro?')">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<img src="" alt="">

@push('scripts')
<script>
    $(document).ready(function() {
        $('#TableProducts').DataTable();
    });
</script>
@endpush