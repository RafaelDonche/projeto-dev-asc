@extends('main')

@section('content')

    <div class="col-md-12">

        @include('errors.alerts')
        @include('errors.errors')

        <h3 class="text-center">Nova campanha de contatos</h5>
        <div class="card text-bg-light mb-3 main-card">
            <div class="card-body">
                <form action="{{ route('salvar-campanha') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="campanha">Nome da campanha:</label>
                            <input class="form-control" type="text" name="campanha" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label w-100">Arquivo .csv</label>
                            <input type="file" accept=".csv" name="arquivo" required>
                            {{-- <small class="form-text text-muted">Example block-level help text here.</small> --}}
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="campanha">Delimitador de valores:</label>
                            <input class="form-control" type="text" name="delimitador" id="delimitador" placeholder=", ou ;">
                            <span class="text-danger d-none" id="erro_delimitador"><strong>Este campo só recebe , ou ; como valor</strong></span>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Importar dados</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#delimitador').on('input', function() {
                if (this.value == '' || this.value == null) {
                    $('#erro_delimitador').addClass('d-none');
                }else {

                    if (this.value != ',' && this.value != ';') {
                        $('#erro_delimitador').removeClass('d-none');
                        $('#delimitador').val('');
                    }else {
                        $('#erro_delimitador').addClass('d-none');
                    }
                }
            });
        });
    </script>
@endsection
