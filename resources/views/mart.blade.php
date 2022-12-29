<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MARS ROVER MISSION</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
       
    </head>
    <body class='mart container-background'>
        <div class='container-body'>
            <div class='container-data'>
                <div class='container-rover'>
                        <div class='x'></div>
                        <div class='y'></div>
                        <img id = 'rover' src="{{asset('img/rover/rover.png')}}" alt="">
                        @foreach(Session::get('obstacles') as $obstacle)
                            <img class = 'obstacle' src="{{asset('img/rover/piedra.png')}}" style='top:{{$obstacle->getY()}}px;left:{{$obstacle->getX()}}px'>
                        @endforeach
                </div>
                <div class='container-form-mart'>
                    <form action="/roverMove" method='POST'>
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
                        <div>
                            <label class='text' for="x">Comando</label>
                            <input type="text" name = "Command" value="{{ old('command') }}">
                        </div>
                        <div class='direction' >
                            <input type="hidden" name= 'currentDirection' value = "{{$rover->getDirection()}}">
                            <input type="hidden" name= 'currentX' value = "{{$rover->getX()}}">
                            <input type="hidden" name= 'currentY' value = "{{$rover->getY()}}">
                        </div>
                        <div class='submit'>
                            <input type="submit" value='Mover'>
                        </div>
                    </form>

                    <p class='text'>Posicion actual:</p>
                    <p class='text'>X: {{$rover->getX()}}</p>
                    <p class='text'>Y: {{$rover->getY()}}</p>
                    <p class='text'>Dirección: {{$rover->getDirection()}}</p>
                    @if(isset($error))
                        <p  class='alert-danger'>{{$error}}</p>
                    @endif
                </div>
            </div>
            <div>
                <div class="obstacles">
                    <p class='text'>Obstaculos encontrados:</p>
                    
                    @if(Session::get('obstacles'))
                    @foreach(Session::get('obstacles') as $obstacle)
                    @if($obstacle->getDetected())
                    <div>
                        <span class='text'>X: {{$obstacle->getX()}}</span>
                        <span class='text'>Y: {{$obstacle->getY()}}</span>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </body>
   <script>
    window.onload = function(){  
        const rover = document.getElementById("rover");
        rover.style.top ={{$rover->getY()}}+"px";  
        rover.style.left ={{$rover->getX()}}+"px"; 
    }
   </script>
</html>
