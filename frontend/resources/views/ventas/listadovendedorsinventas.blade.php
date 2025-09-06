@extends('dashboard.index')
@section('content')
<div class="bg-black">
<h2 class="text-2xl font-extrabold text-white">Vendedores sin ventas</h2>

</div>
@livewire('ventas.listadovendedorsinventas')

@endsection