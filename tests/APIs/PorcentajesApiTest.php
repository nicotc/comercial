<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Porcentajes;

class PorcentajesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/porcentajes', $porcentajes
        );

        $this->assertApiResponse($porcentajes);
    }

    /**
     * @test
     */
    public function test_read_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/porcentajes/'.$porcentajes->id
        );

        $this->assertApiResponse($porcentajes->toArray());
    }

    /**
     * @test
     */
    public function test_update_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->create();
        $editedPorcentajes = factory(Porcentajes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/porcentajes/'.$porcentajes->id,
            $editedPorcentajes
        );

        $this->assertApiResponse($editedPorcentajes);
    }

    /**
     * @test
     */
    public function test_delete_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/porcentajes/'.$porcentajes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/porcentajes/'.$porcentajes->id
        );

        $this->response->assertStatus(404);
    }
}
