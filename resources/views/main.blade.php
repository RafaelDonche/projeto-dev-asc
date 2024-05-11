<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Listagem</title>

        {{-- styles --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    </head>
    <body>

        <style>
            .bg-brand {
                background-color: #053e94;
                color: white;
                border-radius: 20px;
                padding: 0 1rem;
            }

            .bg-brand:hover {
                background-color: #032d6b;
                color: white;
            }

            .nav-link {
                border-radius: 20px;
            }

            .nav-link:hover {
                background-color: #0b4aa8;
                border-radius: 20px;
            }

            .main {
                /* display: flex;
                justify-content: center; */
                padding: 2rem 1rem !important;
            }
        </style>

        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand bg-brand" href="{{ route('listagem') }}">Projeto Desenvolvedor ASC-Brazil</a>
                <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->uri == '/' ? 'active' : null }}"
                                @if (Route::current()->uri == '/')
                                    aria-current="page"
                                @endif href="{{ route('listagem') }}">Listagem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->uri == 'nova-campanha' ? 'active' : null }}"
                                @if (Route::current()->uri == 'nova-campanha')
                                    aria-current="page"
                                @endif href="{{ route('nova-campanha') }}">Nova campanha</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container main">
            @yield('content')
        </div>

        {{-- scripts --}}
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="{{ asset('js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>

        @yield('scripts')
    </body>
</html>
