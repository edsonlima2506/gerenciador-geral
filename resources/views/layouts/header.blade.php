<!DOCTYPE html>
<html>
<head>
    @include('layouts.main')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset("css/header.css")}}">
    
</head>
<body>
    <header>
        <div class="greetings">
            <i class="ph-hand-waving"></i>
            <h1>Olá, Dr. {{Illuminate\Support\Facades\Auth::user()->name}}</h1>
        </div>
        <div class="profile">
            <i class="ph-bell"></i>
            <img src="{{asset('img/perfil.png')}}" alt="">
        </div>
    </header>
</body>
</html>