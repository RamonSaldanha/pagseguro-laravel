<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/checkout', function(){

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

    try {

        $credentials = PagSeguro::credentials()->get();
        $checkout = PagSeguro::checkout()->createFromArray($data);
        
        $information = $checkout->send($credentials);

        return view('checkout', ['information' => $information]);


    } catch (\Exception $e) {

        printf('<pre>%s</pre>', print_r((string)$e, 1));

    }

    
})->name('checkout');


Route::get('/consultar', function(){

    $credentials = PagSeguro::credentials()->get();
    $transaction = PagSeguro::transaction()->get('F8AD149EE021478D96A1C393FB80AF99', $credentials);
    $information = $transaction->getInformation();

    /*
        dd($information);

        $information->getCode()
        $information->getDate()
        $information->getReference()
        $information->getType()
        $information->getStatus()
        $information->getLastEventDate()
        $information->getPaymentMethod()
        $information->getAmounts()
        $information->getInstallmentCount()
        $information->getItemCount()
        $information->getItems()
        $information->getSender()
        $information->getShipping()

        adicionar sempre get para pegar uma própriedade.
        $information->getStatus()->getName()

    */

    return view('consultar', ['information' => $information]);

})->name('consultar');



Route::get('/checkout-transparente', function(){

    /* recuperar session id do pagseguro */
    $checkout_transparente = new \App\Pagseguro\CheckoutTransparente();

    return view('checkout-transparente', ['session_id' => $checkout_transparente->id]);

})->name('checkout-transparente');




Route::get('/redirect', function(){
    return "Parabéns";
})->name('redirect');

Route::get('/notification', function(){
    return "Parabéns";
})->name('notification');