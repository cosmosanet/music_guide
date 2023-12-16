@extends('layouts.app')

@section('content')


    <div class="container d-flex justify-content-center">
        <div class="card p-lg-3">

            <h1 class="card-title">Создание альбома</h1>
            <div>

                <form method="post" action="{{route('Changealbum',['id' => $id])}}">
                    @csrf

                    <div class="form-group">
                        <label for="artist">Артист</label>
                        <input type="text" class="form-control" name="artist" id="artist" placeholder="Артист" onkeyup="toggleInput()" @if(isset($record_info->executor)) value="{{$record_info->executor}}" @endif required>
                    </div>

                    <div class="form-group">
                        <label for="album">Альбом</label>
                        <input type="text" class="form-control " name="album" id="album" placeholder="Албом"  @if(isset($record_info->name)) value="{{$record_info->name}}" @endif  required >
                    </div>

                    <div class="form-group">
                        <label for="image">Обложка альбома</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="Пусть к обложке альбома" @if(isset($record_info->image)) value="{{$record_info->image}}" @endif required>
                    </div>

                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Описание" @if(isset($record_info->description)) value="{{$record_info->description}}" @endif required>
                    </div>
                    <div class="form-group text-center">

                        <p>@if(isset($msg)) {{$msg}} @endif</p>

                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
