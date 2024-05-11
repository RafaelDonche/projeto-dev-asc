@extends('main')

@section('content')

    <style>
        /* .main-card {
            max-width: 1100px;
        } */
    </style>

    <div class="col-md-8">

        @include('errors.alerts')
        @include('errors.errors')

        <h3 class="text-center">Listagem de contatos</h5>
        <div class="card text-bg-light mb-3 main-card">
            <div class="card-header py-3">
                <form action="{{ route('listagem') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="campanha">Filtrar por campanha:</label>
                            <input class="form-control" type="text" name="campanha">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button class="btn btn-primary" type="submit">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="datatables-reponsive" class="table table-bordered table-striped text-center" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Campanha</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Cidade</th>
                                    <th>CEP</th>
                                    <th>Data de Nascimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contatos as $contato)
                                    <tr>
                                        <td>{{ $contato->campanha }}</td>
                                        <td>{{ $contato->nome }}</td>
                                        <td>{{ $contato->sobrenome }}</td>
                                        <td>{{ $contato->email }}</td>
                                        <td class="tel">{{ $contato->telefone }}</td>
                                        <td>{{ $contato->endereco }}</td>
                                        <td>{{ $contato->cidade }}</td>
                                        <td>{{ $contato->cep }}</td>
                                        <td>{{ date('d/m/Y', strtotime($contato->data_nascimento)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 12 ? '00 (00) 0000-0000' : '00 (00) 00000-0000';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.tel').mask(SPMaskBehavior, spOptions);

        $(document).ready( function () {
            $('#datatables-reponsive').DataTable({
                "order": [0, 'asc'],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                    "infoEmpty": "Mostrando 0 / 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros)",
                    "search": "Pesquisar: ",
                    "loadingRecords": "Loading...",
                    "processing": "",
                    "zeroRecords": "Nenhum registro encontrado",
                    "paginate": {
                        "first": "Início",
                        "previous": "Anterior",
                        "next": "Próximo",
                        "last": "Último"
                    }
                }
            });
        });
    </script>
@endsection
