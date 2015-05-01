@extends('app')

@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#fullpage').fullpage({
            sectionsColor: ['', '#4BBFC3', '#7BAABE', '#736AFF', '#ccddff'],
            anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
            menu: '#menu',
            scrollingSpeed: 1000,
            resize: false
        });

    });
</script>

<ul id="menu">
    <li data-menuanchor="firstPage"><a href="#firstPage">Início</a></li>
    <li data-menuanchor="secondPage"><a href="#secondPage">Registo</a></li>
    <li data-menuanchor="3rdPage"><a href="#3rdPage">Inventário</a></li>
    <li data-menuanchor="4thpage"><a href="#4thpage">Análise</a></li>
</ul>


<div id="fullpage">
    <div class="section" id="section0">
        <div class="container">
            <h1>Ativos</h1>

            <p>Registo e análise dos ativos (ISO/ICE 207001)</p>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="intro">
            <h1>Registo de Ativos</h1>

            <p>Este formulário destina-se a regitar todos os ativos a considerar. Apenas os ativos que justifiquem
                importância no funcionamento de todos os processos em causa devem ser registados</p>
            <br><br><br>

            <div id="formAtivo">
                @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                <form id="formRegisto" method="post" action="{{ url('/ativos') }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome de Ativo</label>
                                <input name="name" class="form-control" id="a" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localization">Localização do Ativo</label>
                                <select name="localization" class="form-control">
                                    <option></option>
                                    <option>DME</option>
                                    <option>DMSI</option>
                                    <option>Escolas</option>
                                    <option>Cozinhas</option>
                                    <option>Refeitório</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Tipo de Ativo</label>
                                <select name="type" class="form-control">
                                    <option></option>
                                    <option>Humano</option>
                                    <option>Hardware</option>
                                    <option>Software</option>
                                    <option>Utensilio</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <br/><br/>

                            <div class="form-group">
                                <label for="value">valor do Ativo</label>
                                <input name="value" class="form-control" id="b2" type="text" value=>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="observations">Observações</label>
                                <textarea name="observations" class="form-control" id="c3"></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                    <input type="submit" class="btn btn-primary btn-block" value="Submeter"/>
                </form>
            </div>

        </div>
    </div>
    <div class="section" id="section2">
        <div class="slide">
            <div class="intro">
                <h1>Inventário de ativos</h1>

                <p>Neste espaço estão descritos todos os ativos relevantes ao funcionamento de toda a estrutura que está
                    incluída no âmbito em causa (Refeições nas escolas). </p>
                <img src="imgs/slider.png" alt="slider"/>
            </div>

        </div>
        <div class="slide">
            <div class="intro">
                <div class="container">
                    <h1>Ativos</h1>
                    <table class="table table-striped">
                        <thead>
                        <th class="text-left col-md-4"><b>Nome</b></th>
                        <th class="text-left col-md-3"><b>Localização</b></th>
                        <th class="text-left col-md-1"><b>Tipo</b></th>
                        <th class="text-center col-md-1"><b>Valor</b></th>
                        <th class="text-left col-md-3">Acções</th>
                        </thead>
                        <tbody>
                        @forelse(App\Ativo::paginate(9) as $ativo)
                        <tr>
                            <td class="text-left col-md-4">{{ $ativo->name }}</td>
                            <td class="text-left col-md-3">{{ $ativo->localization }}</td>
                            <td class="text-left col-md-1">{{ $ativo->type }}</td>
                            <td class="text-center col-md-1">{{ $ativo->value }}</td>
                            <td class="text-left col-md-3">
                                <a href="#" class="btn btn-primary">Ver</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Sem ativos registados!</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {!! App\Ativo::paginate(9)->render() !!}
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="intro">
                <div class="container">
                    <h1>DME</h1>
                    <table class="table table-striped">
                        <thead>
                        <th class="text-left col-md-4"><b>Nome</b></th>
                        <th class="text-left col-md-3"><b>Localização</b></th>
                        <th class="text-left col-md-1"><b>Tipo</b></th>
                        <th class="text-center col-md-1"><b>Valor</b></th>
                        <th class="text-left col-md-3">Acções</th>
                        </thead>
                        <tbody>
                        @forelse(App\Ativo::where('localization', 'DME')->paginate(9) as $ativo)
                        <tr>
                            <td class="text-left col-md-4">{{ $ativo->name }}</td>
                            <td class="text-left col-md-3">{{ $ativo->localization }}</td>
                            <td class="text-left col-md-1">{{ $ativo->type }}</td>
                            <td class="text-center col-md-1">{{ $ativo->value }}</td>
                            <td class="text-left col-md-3">
                                <a href="#" class="btn btn-primary">Ver</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Sem ativos registados!</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {!! App\Ativo::where('localization', 'DME')->paginate(9)->render() !!}
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="intro">
                <div class="container">
                    <h1>DMSI</h1>
                    <table class="table table-striped">
                        <thead>
                        <th class="text-left col-md-4"><b>Nome</b></th>
                        <th class="text-left col-md-3"><b>Localização</b></th>
                        <th class="text-left col-md-1"><b>Tipo</b></th>
                        <th class="text-center col-md-1"><b>Valor</b></th>
                        <th class="text-left col-md-3">Acções</th>
                        </thead>
                        <tbody>
                        @forelse(App\Ativo::where('localization', 'DMSI')->paginate(9) as $ativo)
                        <tr>
                            <td class="text-left col-md-4">{{ $ativo->name }}</td>
                            <td class="text-left col-md-3">{{ $ativo->localization }}</td>
                            <td class="text-left col-md-1">{{ $ativo->type }}</td>
                            <td class="text-center col-md-1">{{ $ativo->value }}</td>
                            <td class="text-left col-md-3">
                                <a href="#" class="btn btn-primary">Ver</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Sem ativos registados!</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {!! App\Ativo::where('localization', 'DMSI')->paginate(9)->render() !!}
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="intro">
                <div class="container">
                    <h1>Escolas</h1>
                    <form id="formRegisto" method="post" action="{{ url('/ativos') }}">
                        <div class=" form-group">
                            <label for="type">Tipo de Ativo</label>
                            <select name="type" class="form-control">
                                <option></option>
                                <option>Escola EB Fernão de Magalhães</option>
                                <option>Escola EB de S. Roque da Lameira</option>
                                <option>EB S. Miguel de Nevolgilde</option>
                                <option>EB S. Nicolau</option>
                                <option>Outras</option>
                            </select>
                        </div>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                        <input type="submit" class="btn btn-primary btn-block" value="Submeter"/>
                    </form>
                    <table class="table table-striped">
                        <thead>
                        <th class="text-left col-md-4"><b>Nome</b></th>
                        <th class="text-left col-md-3"><b>Localização</b></th>
                        <th class="text-left col-md-1"><b>Tipo</b></th>
                        <th class="text-center col-md-1"><b>Valor</b></th>
                        <th class="text-left col-md-3">Acções</th>
                        </thead>
                        <tbody>
                        @forelse(App\Ativo::where('localization', 'escolas')->paginate(6) as $ativo)
                        <tr>
                            <td class="text-left col-md-4">{{ $ativo->name }}</td>
                            <td class="text-left col-md-3">{{ $ativo->localization }}</td>
                            <td class="text-left col-md-1">{{ $ativo->type }}</td>
                            <td class="text-center col-md-1">{{ $ativo->value }}</td>
                            <td class="text-left col-md-3">
                                <a href="#" class="btn btn-primary">Ver</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger">Apagar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Sem ativos registados!</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {!! App\Ativo::where('localization', 'escolas')->paginate(6)->render() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="intro">
            <h1>Working On Tablets</h1>

            <p>
                Designed to fit to different screen sizes as well as tablet and mobile devices.
                <br/><br/><br/><br/><br/><br/>
            </p>
        </div>
        <img src="imgs/tablets.png" alt="tablets"/>
    </div>
</div>
@endsection
