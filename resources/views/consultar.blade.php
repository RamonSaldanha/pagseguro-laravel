@extends('layout')


@section('content')


<h4>Consultando uma transação pelo código</h4>

<p>
	Estamos consultando o seguinte código de transação:
	<span class="badge badge-info">F8AD149EE021478D96A1C393FB80AF99</span>
</p>

<p class="bg-dark text-white p-2">
	<b>Status:</b> {{$information->getStatus()->getName()}}<br />
	<b>Valor Total:</b> {{$information->getAmounts()->getGrossAmount()}}<br />
	<b>Produtos:</b><br />
	@foreach($information->getItems() as $key => $value)
		{{ $value->getDescription() }} => {{$value->getQuantity()}}x {{$value->getAmount()}} <br />
	@endforeach
</p>

@endsection