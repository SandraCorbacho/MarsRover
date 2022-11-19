<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MARS ROVER MISSION</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
       
    </head>
    <body class='home'>
        <div class='container-background'>
            <div class='container-form'>
                <form action="/mart" method='POST'>
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                       <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label for="" class='text'>Coordenadas:</label>

                    <div>
                        <label class='text' for="x">X</label>
                        <input type="number" name = "x" min="0" max="200" value="{{ old('x') }}">
                        <label class='text' for="y">Y</label>
                        <input type="number" name = "y" min="0" max="200" value="{{ old('y') }}">
                    </div>
                    <div class='direction' >
                        <label class='text' for="d">Dirección</label>
                        <div>
                            <label class='text'>N</label>
                            <input type="radio" name='direction' value = 'N' >
                        </div> 
                        <div>
                            <label class='text' for="N">S</label>
                            <input type="radio" name='direction'value = 'S' >
                        </div>
                        <div>
                            <label class='text' for="N">E</label>
                            <input type="radio" name='direction' value = 'E' >
                        </div>
                        <div>
                            <label class='text' for="N">O</label>
                            <input type="radio" name='direction' value = 'O' >
                        </div>
                    </div>
                    <div class='submit'>
                        <input type="submit" value='Inciar'>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
