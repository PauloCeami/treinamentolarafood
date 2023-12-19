@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<h1>Planos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
       {{ $res }}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Active</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <th scope="row">{{ $plan->id }}</th>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->price }}</td>
                    <td>{{ $plan->active }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        2 days ago
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop
