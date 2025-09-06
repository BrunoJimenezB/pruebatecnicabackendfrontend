@extends('dashboard.index')
@section('content')
<div class="bg-black">
<h2 class="text-2xl font-extrabold text-white">Clientes</h2>

</div>
@livewire('clientes.listadoclientes')

@endsection