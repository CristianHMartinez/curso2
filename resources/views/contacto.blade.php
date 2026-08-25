@extends('layouts.publico')

@section('titulo', 'Contacto · Blog de Avisos')

@section('contenido')
    <form class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow mt-8">
        <h1 class="text-xl font-semibold text-gray-900 mb-5">Contacto</h1>

        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
        <input type="text" name="nombre" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">

        <label class="block text-sm font-medium text-gray-700 mb-1 mt-4">Correo</label>
        <input type="email" name="correo" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">

        <label class="block text-sm font-medium text-gray-700 mb-1 mt-4">Mensaje</label>
        <textarea name="mensaje" rows="4" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"></textarea>

        <button type="submit" class="w-full bg-marca text-white font-semibold rounded-lg py-2 hover:bg-blue-800 transition mt-5">Enviar</button>
    </form>
@endsection