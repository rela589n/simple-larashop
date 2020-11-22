@extends('auth.layouts.master')

@isset($property)
    @section('title', 'Редагувати властивість ' . $property->name)
@else
    @section('title', 'Створити властивість')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($property)
            <h1>Редагувати Властивість <b>{{ $property->name }}</b></h1>
                @else
                    <h1>Додати Властивість</h1>
                @endisset

                <form method="POST" enctype="multipart/form-data"
                      @isset($property)
                      action="{{ route('properties.update', $property) }}"
                      @else
                      action="{{ route('properties.store') }}"
                    @endisset
                >
                    <div>
                        @isset($property)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                            <div class="col-sm-6">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="name" id="name"
                                       value="@isset($property){{ $property->name }}@endisset">
                            </div>
                        </div>

                            <br>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Назва en: </label>
                                <div class="col-sm-6">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" name="name_en" id="name_en"
                                           value="@isset($property){{ $property->name_en }}@endisset">
                                </div>
                            </div>

                        <button class="btn btn-success">Зберегти</button>
                    </div>
                </form>
    </div>
@endsection

