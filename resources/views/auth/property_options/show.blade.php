@extends('auth.layouts.master')

@section('title', 'Вариант властивості ' . $propertyOption->name)

@section('content')
    <div class="col-md-12">
        <h1>Вариант властивості {{ $propertyOption->name }}</h1>
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
                <td>{{ $propertyOption->id }}</td>
            </tr>
            <tr>
                <td>Властивість</td>
                <td>{{ $propertyOption->property->name }}</td>
            </tr>
            <tr>
                <td>Назва</td>
                <td>{{ $propertyOption->name }}</td>
            </tr>
            <tr>
                <td>Назва en</td>
                <td>{{ $propertyOption->name_en }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
