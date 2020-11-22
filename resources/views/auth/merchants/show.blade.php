@extends('auth.layouts.master')

@section('title', 'Постачальник ' . $merchant->name)

@section('content')
    <div class="col-md-12">
        <h1>Постачальник {{ $merchant->name }}</h1>
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
                <td>{{ $merchant->id }}</td>
            </tr>
            <tr>
                <td>Назва</td>
                <td>{{ $merchant->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $merchant->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
