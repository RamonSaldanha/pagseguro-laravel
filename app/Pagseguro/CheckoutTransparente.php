<?php

namespace App\Pagseguro;

/**
* 
*/
class CheckoutTransparente
{

	public $id;
	
	public function __construct()
	{


		$ch = curl_init();

		/*
			ele buscará nas configurações do pagseguro um valor true ou false pra
			indicar o ambiente apropriado, se é o sandbox ou o de produção(definitivo)
		*/
		if(\Config::get('laravelpagseguro.use-sandbox')){

			/* endereço da api sandbox */
			curl_setopt($ch, CURLOPT_URL, \Config::get('laravelpagseguro.host.sandbox') . '/v2/sessions/?email='.\Config::get('laravelpagseguro.credentials.email').'&token='.\Config::get('laravelpagseguro.credentials.token'));

		} else {

			/* endereço da api sandbox */
			curl_setopt($ch, CURLOPT_URL, \Config::get('laravelpagseguro.host.production') . '/v2/sessions/?email='.\Config::get('laravelpagseguro.credentials.email').'&token='.\Config::get('laravelpagseguro.credentials.token'));

		}
		


		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, true);

		$data = curl_exec($ch);

		/* transforma xml em array */
		$xml = new \SimpleXMLElement($data);


		$this->id = $xml->id;

		curl_close($ch);

	}


	public function __toString(){

		return $this->id;

	}

}

/* recuperar session id do pagseguro */
// $checkout_transparente = new \App\Pagseguro\CheckoutTransparente();