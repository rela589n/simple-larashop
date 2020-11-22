@extends('auth.layouts.master')

@section('title', 'Продукт ' . $product->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
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
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Назва</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Назва en</td>
                <td>{{ $product->name_en }}</td>
            </tr>
            <tr>
                <td>Опис</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Опис en</td>
                <td>{{ $product->description_en }}</td>
            </tr>
            <tr>
                <td>Зображення</td>
                <td><img src="{{ Storage::url($product->image) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Категорія</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Мітки</td>
                <td>
                    @if($product->isNew())
                        <span class="badge badge-success">Новинка</span>
                    @endif

                    @if($product->isRecommend())
                        <span class="badge badge-warning">Рекомендовані</span>
                    @endif

                    @if($product->isHit())
                        <span class="badge badge-danger">Хіт продаж!</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
