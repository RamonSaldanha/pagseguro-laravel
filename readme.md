<h4>Pagseguro + Laravel</h4>
<p>
	Esta aplicação demonstra o uso do pagseguro com o laravel.
	<br /><br/>
	<b>Utilizarei esse módulo:</b>
	<br />
	<a href="https://github.com/michaeldouglas/laravel-pagseguro" target="blank">
	https://github.com/michaeldouglas/laravel-pagseguro
	</a>
</p>

<p>
	<b>Dicas:</b><br />
	<li>Quando estiver testando, não esqueça de colocar true a opção das configs no config/laravelpagseguro.php, coloque 'use-sandbox' => true.</li>
	<li>Coloque o email e o token entre ''</li>
	<li>As url de redirect e notifications, coloque como fixeds. assim: 'fixed' => 'http://localhost:8000/redirect'. (pois o módulo está com um bug para a função routes(), deve ser incompatibilidade com a versão 5.5 do laravel)</li>
</p>

<p>
	<b>Importante:</b><br />
	O checkout transparente do pagseguro é muito engeçado e dificil de implementar, eu não terminei de implementar pois é muito mais conveniente usar o checkout transparente do MoIp que é feito para ser de fácil implementação. contudo, eu me encontrei esse projeto que pode ser usado como base para implementação do checkout transparente do pagseguro.<br />
	<a href="https://github.com/lubuzzo/checkout-transparente-PagSeguro" target="blank">
	https://github.com/lubuzzo/checkout-transparente-PagSeguro
	</a>
</p>
