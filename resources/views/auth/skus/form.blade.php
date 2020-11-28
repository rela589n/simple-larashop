@extends('auth.layouts.master')

@isset($skus)
    @section('title', 'Редагувати Sku ' . $skus->name)
@else
    @section('title', 'Створити Sku')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($skus)
            <h1>Редагувати Sku <b>{{ $skus->name }}</b></h1>
        @else
            <h1>Додати Sku</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($skus)
              action="{{ route('skus.update', [$product, $skus]) }}"
              @else
              action="{{ route('skus.store', $product) }}"
            @endisset
        >
            <div>
                @isset($skus)
                    @method('PUT')
                @endisset
                @csrf

                    <div class="input-group row">
                        <label for="price" class="col-sm-6 col-form-label">Ціна: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error', ['fieldName' => 'price'])
                            <input type="text" class="form-control" name="price"
                                   value="@isset($skus){{ $skus->price }}@endisset">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label for="count" class="col-sm-6 col-form-label">К-сть: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error', ['fieldName' => 'count'])
                            <input type="text" class="form-control" name="count"
                                   value="@isset($skus){{ $skus->count }}@endisset">
                        </div>
                    </div>
                    <br>

                @foreach ($product->properties as $property)
                    <div class="input-group row">
                        <label for="property_id[{{ $property->id }}]" class="col-sm-6 col-form-label">{{ $property->name }}: </label>
                        <div class="col-sm-6">
                            <select name="property_id[{{ $property->id }}]" class="form-control">
                                @foreach($property->propertyOptions as $propertyOption)
                                    <option value="{{ $propertyOption->id }}"
                                        @isset($skus)
                                        @if($skus->propertyOptions->contains($propertyOption->id))
                                            selected
                                        @endif
                                        @endisset
                                    >{{ $propertyOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach

                <button class="btn btn-success">Зберегти</button>
            </div>
        </form>
    </div>
@endsection

