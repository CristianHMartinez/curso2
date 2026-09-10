@extends('layouts.publico')

@section('titulo', 'Contacto · Blog de Avisos')

@section('contenido')
    <form class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow mt-8">
        <h1 class="text-xl font-semibold text-gray-900 mb-5">Contacto</h1>

        <x-campo label="Nombre" name="nombre" />

        <div class="mt-4">
            <x-campo label="Correo" name="correo" type="email" />
        </div>

        <div class="mt-4">
            <x-campo label="Mensaje" name="mensaje" type="textarea" rows="4" />
        </div>

        <button type="submit" class="w-full bg-marca text-white font-semibold rounded-lg py-2 hover:bg-blue-800 transition mt-5">Enviar</button>
    </form>
@endsection