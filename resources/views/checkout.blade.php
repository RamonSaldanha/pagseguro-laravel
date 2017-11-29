@extends('layout')


@section('content')
		<h4>Enviar uma compra ao pagseguro</h4>
		<p>
			Observe que enviamos as informações da compra para o pagseguro e ele nos retornará as informações da transação (código de transação)
		</p>
		<pre style="height: 300px;" class="bg-dark text-white p-2">
$data = [
  'items' => [
      [
          'id' => '18',
          'description' => 'Item Um',
          'quantity' => '1',
          'amount' => '1.15',
          'weight' => '45',
          'shippingCost' => '3.5',
          'width' => '50',
          'height' => '45',
          'length' => '60',
      ],
      [
          'id' => '19',
          'description' => 'Item Dois',
          'quantity' => '1',
          'amount' => '3.15',
          'weight' => '50',
          'shippingCost' => '8.5',
          'width' => '40',
          'height' => '50',
          'length' => '80',
      ],
  ],
  'shipping' => [
      'address' => [
          'postalCode' => '06410030',
          'street' => 'Rua Leonardo Arruda',
          'number' => '12',
          'district' => 'Jardim dos Camargos',
          'city' => 'Barueri',
          'state' => 'SP',
          'country' => 'BRA',
      ],
      'type' => 2,
      'cost' => 30.4,
  ],
  'sender' => [
      'email' => 'sender@gmail.com',
      'name' => 'Isaque de Souza Barbosa',
      'documents' => [
          [
              'number' => '01234567890',
              'type' => 'CPF'
          ]
      ],
      'phone' => '11985445522',
      'bornDate' => '1988-03-21',
  ]
];
		</pre>
		<p>
			Perceba abaixo as informações da transação já foram geradas no pagseguro
		</p>
    @php printf('<pre class="bg-dark text-white p-2">%s</pre>', print_r($information, 1)); @endphp
    <p>
    	<b>[code:protected]</b>: código da transação da compra. lembrando que você só poderá consultar um código de transação, quando a transação for concluída pelo cliente.
    	<br />
    	<b>[link:protected]</b>: Link para o checkout do pagseguro, este link lhe levará para o checkout padrão do pagseguro.
    </p>
    <p>

	    <a href="{{$information->getLink()}}" target="blank">
	    	<img src="{{asset('img/pagseguro.00_png_srz')}}" height="50px" />
	    </a>
  	</p>

@endsection