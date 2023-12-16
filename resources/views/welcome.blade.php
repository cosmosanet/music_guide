@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-wrap">
        @if(isset($list_of_labum))
    @foreach($list_of_labum as $item)


        <div class="card with-16 m-5" >
            <img src="{{url($item->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">Альбом: {{$item->name}}</h4>
                <p class="card-text">Описание: {{$item->description}}</p>
                <p class="card-text">Исполнитель: {{$item->executor}}</p>
                @auth()
                    <div class="d-flex justify-content-between">
                    <a class="btn btn-primary" href="{{url('change_album')}}/{{$item->id}}">Изменить</a>

                    <form action="{{route('DeleteAlbum',['id'=> $item->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Удалить">
                    </form>
                    </div>
                @endauth
            </div>
        </div>


    @endforeach
        @endif
    </div>
@endsection
