@extends('auth.layouts.master')

@section('title', 'Sku ' . $skus->name)

@section('content')
    <div class="col-md-12">
        <h1>Sku товару {{ $skus->product->name }}</h1>
        <h2>{{ $skus->propertyOptions->map->name->implode(', ') }}</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значення
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $skus->id }}</td>
            </tr>
            <tr>
                <td>Ціна</td>
                <td>{{ $skus->price }}</td>
            </tr>
            <tr>
                <td>К-сть</td>
                <td>{{ $skus->count }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
