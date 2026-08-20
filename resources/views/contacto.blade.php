@extends('layouts.publico')

@section('titulo', 'Contacto · Blog de Avisos')

@section('contenido')
    <div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow mt-8">
        <h1 class="block text-sm font-medium text-gray-700 mb-1">Contacto</h1>
        <p class="block text-sm font-medium text-gray-700 mb-1">Si tienes alguna pregunta o comentario, no dudes en contactarnos.</p>
        <input type="text" name="nombre" placeholder="Nombre" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none mb-4">
        <button type="submit" class="w-full bg-marca text-white font-semibold rounded-lg py-2 hover:bg-blue-800 transition">Enviar</button>
    </div>
@endsection