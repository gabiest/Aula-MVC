<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
Use App\Models\Vendedores;


class VendedoresControllerTest extends TestCase
{

    public function __construct(){
        parent::__construct();
        $this->vendedores = new VendedoresController;
    }
    public function testCheckVendedor(){
        $vendedores = new VendedoresController;

        // $this->assertTrue($vendedores->checkVendedor(1));
        // $this->assertTrue($vendedores->checkVendedor(0));
    }

    public function testGetVendedor(){
        //  $this->assertEquals('Marcos',$this->vendedores->getVendedor(1));
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
