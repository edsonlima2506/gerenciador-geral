<!DOCTYPE html>
<html>
<head>
    @include('layouts.main')

    {{-- CSS  --}}
    <link rel="stylesheet" href="{{asset('css/clients.css')}}">

</head>
@include('layouts.header')
@include('layouts.sidebar')
<div class="clients-container">
    <div class="clients-header">
        <h1>Pacientes</h1>
        <a href="/clients/create" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <span><i class="ph-plus-circle"></i> Add</span>
        </a>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Cadastrar paciente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="">
                <div class="mb-3">
                    <label for="client_name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="client_name" name="client_name">
                </div>

                <div class="mb-3">
                    <label for="client_name" class="form-label">Gênero</label>
                    <select name="client_gender" id="client_gender" class="form-select">
                            <option value="M">Masculino</option>                
                            <option value="F">Feminino</option>                  
                    </select>
                </div>  
                
                <div class="mb-3">
                    <label for="client_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="client_email" name="client_email" placeholder="email@exemplo.com">
                </div>

                <div class="mb-3">
                    <label for="client_birthday" class="form-label">Nascimento</label>
                    <input type="date" class="form-control" id="client_birthday" name="client_birthday">
                </div>

                <div class="mb-3">
                    <label for="client_number" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="client_number" name="client_number">
                </div>

                <div class="mb-3">
                    <label for="client_adress" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="client_adress" name="client_adress" placeholder="Rua Exemplo, bairro, cidade">
                </div>

                <div class="mb-3">
                    <label for="client_adress_number" class="form-label">Número</label>
                    <input type="number" class="form-control" id="client_adress_number" name="client_adress_number">
                </div>

                <button type="button" class="btn btn-secondary"  data-bs-dismiss="offcanvas" aria-label="Close">Voltar</button>
                <button type="button" class="btn btn-info" id="save_button" data-bs-dismiss="offcanvas" aria-label="Close">Cadastrar</button>
                    
            </form>
        </div>
    </div>
    <div id="clients-table-container">
        <table id="clients_table">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Aniversário</th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->birthday}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#save_button').on('click', function() {
            dados = {
                name: $('#client_name').val(),
                email: $('#client_email').val(),
                birthday: $('#client_birthday').val(),
                gender: $('#client_gender').val(),
                number: $('#client_number').val(),
                adress: $('#client_adress').val(),
                adress_number: $('#client_adress_number').val(),
            }

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('/clients/store') }}",
                data: {
                    data: dados,
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    if (response == 1) {
                        $('#client_name').val("");
                        $('#client_email').val("");
                        $('#client_birthday').val("");
                        $('#client_gender').val("");
                        $('#client_number').val("");
                        $('#client_adress').val("");
                        $('#client_adress_number').val("");
                    }
                }
            });
        });

        $(document).ready( function () {
            $('#clients_table').DataTable();
        });
    });

</script>
