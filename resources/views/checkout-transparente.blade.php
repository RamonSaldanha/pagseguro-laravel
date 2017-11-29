@extends('layout')

@section('content')

<h4>Checkout transparente <small>Em andamento</small></h4>
<p>
	O checkout transparente do pagseguro é muito engeçado e dificil de implementar. Eu não terminei de implementar pois é muito mais conveniente usar o checkout transparente do MoIp que é feito para ser de fácil implementação. contudo, eu me encontrei esse projeto que pode ser usado como base para implementação do checkout transparente do pagseguro.<br />
	<a href="https://github.com/lubuzzo/checkout-transparente-PagSeguro" target="blank">
	https://github.com/lubuzzo/checkout-transparente-PagSeguro
	</a>
	<br /><br />
	Nesta aplicação eu só fiz a conexão com a API do pagseguro usando CURL, aproveitando as configurações do módulo <span class="bg-dark text-white">michaeldouglas/laravel-pagseguro</span> e com javascript retornei no console.log os meios de pagamento disponíveis.<br /><br />

	No site do pagseguro você encontrará a documentação do checkout transparente.<br />
	<a href="https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente" target="blank">
	https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente
	</a>
</p>


@endsection

@section('javascript')
{{-- EM PRODUÇÃO --}}
{{-- <script type="text/javascript" src=
"https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
</script> --}}

{{-- SANDBOX --}}
<script type="text/javascript" src=
"https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
</script>

<script type="text/javascript">
	PagSeguroDirectPayment.setSessionId('{{$session_id}}');

	PagSeguroDirectPayment.getPaymentMethods({
	    amount: 500.00,
	    success: function(response) {
	        //meios de pagamento disponíveis
	        console.log(response);
	    },
	    error: function(response) {
	        //tratamento do erro
	    },
	    complete: function(response) {
	        //tratamento comum para todas chamadas
	    }
	});
</script>

@endsection