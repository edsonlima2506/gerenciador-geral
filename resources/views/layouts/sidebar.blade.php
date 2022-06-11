<!DOCTYPE html>
<html>
<head>
    @include('layouts.main')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset("css/sidebar.css")}}">

</head>
<body>
    <div class="sidebar">
        <img src="{{asset('img/logo-hearth.png')}}" alt="Logo da empresa">
        <ul>
            <a href="">
                <li>
                    <i class="ph ph-house"></i>
                    <h4>Início</h4>
                </li>
            </a>
            <a href="">
                <li>
                    <i class="ph-calendar-blank"></i>
                    <h4>Calendário</h4>
                </li>
            </a>
            <a href="">
                <li>
                    <i class="ph-users"></i>
                    <h4>Pacientes</h4>
                </li>
            </a>
            <a href="">
                <li>
                    <i class="ph-folder-simple"></i>
                    <h4>Arquivo</h4>
                </li>
            </a>
        </ul>
    </div>
</body>
</html>