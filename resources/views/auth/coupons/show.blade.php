@extends('auth.layouts.master')

@section('title', 'Купон ' . $coupon->code)

@section('content')
    <div class="col-md-12">
        <h1>{{ $coupon->code }}</h1>
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
                <td>{{ $coupon->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $coupon->code }}</td>
            </tr>
            <tr>
                <td>Опис</td>
                <td>{{ $coupon->description }}</td>
            </tr>
            @isset($coupon->currency)
                <tr>
                    <td>Валюта</td>
                    <td>{{ $coupon->currency->code }}</td>
                </tr>
            @endisset
            <tr>
                <td>Абсолютне значення</td>
                <td>@if($coupon->isAbsolute()) Так @else Ні @endif</td>
            </tr>
            <tr>
                <td>
                    Знижка
                </td>
                <td>
                    {{ $coupon->value }} @if($coupon->isAbsolute()) {{ $coupon->currency->code }} @else % @endif
                </td>
            </tr>
            <tr>
                <td>Використати лише один раз</td>
                <td>@if($coupon->isOnlyOnce()) Так @else Ні @endif</td>
            </tr>
            <tr>
                <td>Використаний:</td>
                <td>{{ $coupon->orders->count() ? 'Так' : 'Ні' }}</td>
            </tr>
            @if($coupon->expired_at)
                <tr>
                    <td>Дійсний до:</td>
                    <td>{{ $coupon->expired_at->format('d.m.Y') }}</td>
                </tr>
            @endisset
            </tbody>
        </table>
    </div>
@endsection
