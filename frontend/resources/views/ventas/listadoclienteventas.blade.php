@extends('dashboard.index')
@section('content')
<div class="bg-black">
<h2 class="text-2xl font-extrabold text-white">VENTAS CLIENTES</h2>

</div>
@livewire('ventas.listadoclienteventas')

@endsection