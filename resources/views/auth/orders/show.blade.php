@extends('auth.layouts.master')

@section('title', 'Замовлення ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Замовлення №{{ $order->id }}</h1>
                    <p>Замовник: <b>{{ $order->name }}</b></p>
                    <p>Номер телефону: <b>{{ $order->phomne }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Назва</th>
                            <th>К-сть</th>
                            <th>Ціна</th>
                            <th>Вартість</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($skus as $sku)
                            <tr>
                                <td>
                                    <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($sku->product->image) }}">
                                        {{ $sku->product->name }}
                                    </a>
                                </td>
                                <td><span class="badge"> {{ $sku->pivot->count }}</span></td>
                                <td>{{ $sku->pivot->price }} {{ $order->currency->symbol }}</td>
                                <td>{{ $sku->pivot->price * $sku->pivot->count }} {{ $order->currency->symbol }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Сумарна вартість:</td>
                            <td>{{ $order->sum }} {{ $order->currency->symbol }}</td>
                        </tr>
                        @if($order->hasCoupon())
                            <tr>
                                <td colspan="3">Был использован купон:</td>
                                <td><a href="{{ route('coupons.show', $order->coupon) }}">{{ $order->coupon->code }}</a></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
