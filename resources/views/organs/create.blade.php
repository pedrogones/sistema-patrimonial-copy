@extends('adminlte::page')

@section('title', 'Novo Órgão')

@section('content_header')
<h3></h3>
@stop

@section('content')

<div class="row">

    <div class="col-md-12">
        @include('shared.error-message')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Novo Órgão</h3>
            </div>

            <form action="{{route('organs.store')}}" method="post" >
                @csrf 
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name='name' id="name" 
                            placeholder="Digite um nome" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="cod">Sigla</label>
                        <input type="text" class="form-control @error('sigla') is-invalid @enderror" name='sigla' id="sigla" 
                            placeholder="Digite uma sigla" value="{{ old('sigla') }}">
                            @error('sigla')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="management_unit_id">Selecione a Unidade Gestora</label>
                        <select class="js-basic form-control" name="management_unit_id">
                            <option value="">Selecione</option>
                            @foreach($managementUnits as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        @error('management_unit_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name="status" value=1>

                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="address" class="form-control @error('address') is-invalid @enderror" 
                            name="address" id="address" placeholder="Digite o endereço">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control @error('descricao') is-invalid @enderror" 
                            name="descricao" id="descricao" placeholder="Digite a descrição" value="{{ old('descricao') }}">
                            @error('descricao')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{route('organs.view')}}" type="button" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>


    </div>

</div>

@stop