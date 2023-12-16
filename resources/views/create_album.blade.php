@extends('layouts.app')

@section('content')
    @if(isset($record))
{{--        {{dd($record)}}--}}
    @endif

    <div class="container d-flex justify-content-center">
        <div class="card p-lg-3">

                <h1 class="card-title">Создание альбома</h1>
                <div>

                    <form method="post" action="{{route('Addalbum')}}">
                        @csrf

                        <div class="form-group">
                            <label for="artist">Артист</label>
                            <input type="text" class="form-control" name="artist" id="artist" placeholder="Артист"@if(isset($album)) value="{{$album}}"@endif  onkeyup="toggleInput()" required>
                        </div>

                        <div class="form-group">
                            <label for="album">Альбом</label>
                            <input type="text" class="form-control " name="album" id="album" onchange="submit()" placeholder="Альбом" @if(isset($artist)) value="{{$artist}}"@endif  required >
                        </div>

                        <div class="form-group">
                            <label for="image">Обложка альбома</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Пусть к обложке альбома" @if(isset($img)) value="{{$img}}"@endif required>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Описание" required>
                        </div>
                        <div class="form-group text-center">

                            <p>@if(isset($msg)) {{$msg}} @endif</p>

                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                        <script>
                            document.onload = toggleInput();
                            function toggleInput() {

                                var input1 = document.getElementById("artist");
                                var input2 = document.getElementById("album");
                                input2.disabled = true;
                                if (input1.value) {
                                    input2.disabled = false;
                                } else {
                                    input2.disabled = true;
                                }
                            }
                        </script>



                    </form>
                </div>
            </div>

</div>

@endsection
