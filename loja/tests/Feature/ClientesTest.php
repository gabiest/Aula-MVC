<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
Use App\Models\Clientes;
Use Illuminate\Foundation\Testing\DatabaseTransactions;
Use DatabaseTrasactions;


class ClientesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testecreate(){

        $cliente = Clientes::create ([
                'nome' => 'Bono',
                'endereco'=> 'Rua dos bobos, 0',
                'email' => 'ads@teste.com',
                'telefone' => '1196776756'
        ]);

        // $cliente ->destroy($cliente->id);

        // $this->assertDatabaseHas('Clientes',['nome'=>'Bono']);
    }


    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
