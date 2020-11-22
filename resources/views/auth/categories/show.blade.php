@extends('auth.layouts.master')

@section('title', 'Категорія ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Категорія {{ $category->name }}</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Назва</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Назва en</td>
                <td>{{ $category->name_en }}</td>
            </tr>
            <tr>
                <td>Опис</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Опис en</td>
                <td>{{ $category->description_en }}</td>
            </tr>
            <tr>
                <td>Зображення</td>
                <td><img src="{{ Storage::url($category->image) }}"
                         height="240px"></td>
            </tr>
            <tr>
                <td>К-сть товарів</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
