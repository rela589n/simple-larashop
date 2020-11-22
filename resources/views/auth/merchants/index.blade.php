@extends('auth.layouts.master')

@section('title', 'Постачальники')

@section('content')
    <div class="col-md-12">
        <h1>Постачальники</h1>
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Назва
                </th>
                <th>
                    Email
                </th>
                <th>
                    Дії
                </th>
            </tr>
            @foreach($merchants as $merchant)
                <tr>
                    <td>{{ $merchant->id }}</td>
                    <td>{{ $merchant->name }}</td>
                    <td>{{ $merchant->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('merchants.destroy', $merchant) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('merchants.show', $merchant) }}">Переглянути</a>
                                <a class="btn btn-warning" type="button" href="{{ route('merchants.edit', $merchant) }}">Редагувати</a>
                                <a class="btn btn-primary" type="button" href="{{ route('merchants.update_token', $merchant) }}">Оновити токен</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Видалити"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $merchants->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('merchants.create') }}">Додати постачальника</a>
    </div>
@endsection
