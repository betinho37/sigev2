@extends('adminlte::page')

@section('content')

<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready( function() {
        $('#celular').mask('(99).99999-9999');
        $('#telefone').mask('(99).9999-9999');
        $('#cpf').mask('999.999.999-99');
        $('#valor').mask('999.999.999');
        $('#cnpj').mask('99.999.999/9999-99');
    });
</script>
<div align="center"><h3>SigeTOQ</h3></div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"><br>
                <div align="center" >Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/cliente/store">
                        {!! csrf_field() !!}

                        <div
                        class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nome</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">CPF</label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" >

                            @if ($errors->has('cpf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpf') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">CNPJ</label>

                        <div class="col-md-6">
                            <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}" >

                            @if ($errors->has('cnpj'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpnj') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       <label for="email" class="col-md-4 control-label">E-Mail</label>
                       <div class="col-md-6">
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                           @if ($errors->has('email'))
                           <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Celular</label>
                        <div class="col-md-6">
                            <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" >

                            @if ($errors->has('celular'))
                            <span class="help-block">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div  class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Telefone</label>
                        <div class="col-md-6">
                            <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" >

                            @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <dir></dir>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Pessoa de Contato</label>
                        <div class="col-md-6">
                            <input id="telefone" type="name" class="form-control" name="pessoa" value="{{ old('pessoa') }}" >

                            @if ($errors->has('pessoa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pessoa') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary"> Salvar Cliente</button>
                        <a href="/clientescadastrados" class="btn btn-primary">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
