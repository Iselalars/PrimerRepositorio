@extends('layout/template');

@section('title', 'Registro')

@section('content')
    <main>
        <div class="container py4">
            <h2>Registrar alumno</h2>
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                         <li> {{$error}}</li>   
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('alumnos') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="matricula" class="col-sm-3 col-form-label">Matricula</label>
                    <input type="text" name="matricula" class="form-control" id="matricula"
                        value="{{ old('matricula') }}" >
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre completo</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}"
                        required>
                </div>
                <div class="mb-3 row">
                    <label for="fecha" class="col-sm-3 col-form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha" class="form-control" id="fecha" value="{{ old('fecha') }}"
                        required>
                </div>
                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-3 col-form-label">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}"
                        required>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3 row">
                    <label for="nivel" class="col-sm-3 col-form-label">Nivel</label>
                    <div>
                        <select name="nivel" id="nivel" class="form-select" required>
                            <option value="">Seleccionar nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>
