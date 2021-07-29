<?php namespace Tests\Repositories;

use App\Models\Porcentajes;
use App\Repositories\PorcentajesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PorcentajesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PorcentajesRepository
     */
    protected $porcentajesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->porcentajesRepo = \App::make(PorcentajesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->make()->toArray();

        $createdPorcentajes = $this->porcentajesRepo->create($porcentajes);

        $createdPorcentajes = $createdPorcentajes->toArray();
        $this->assertArrayHasKey('id', $createdPorcentajes);
        $this->assertNotNull($createdPorcentajes['id'], 'Created Porcentajes must have id specified');
        $this->assertNotNull(Porcentajes::find($createdPorcentajes['id']), 'Porcentajes with given id must be in DB');
        $this->assertModelData($porcentajes, $createdPorcentajes);
    }

    /**
     * @test read
     */
    public function test_read_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->create();

        $dbPorcentajes = $this->porcentajesRepo->find($porcentajes->id);

        $dbPorcentajes = $dbPorcentajes->toArray();
        $this->assertModelData($porcentajes->toArray(), $dbPorcentajes);
    }

    /**
     * @test update
     */
    public function test_update_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->create();
        $fakePorcentajes = factory(Porcentajes::class)->make()->toArray();

        $updatedPorcentajes = $this->porcentajesRepo->update($fakePorcentajes, $porcentajes->id);

        $this->assertModelData($fakePorcentajes, $updatedPorcentajes->toArray());
        $dbPorcentajes = $this->porcentajesRepo->find($porcentajes->id);
        $this->assertModelData($fakePorcentajes, $dbPorcentajes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_porcentajes()
    {
        $porcentajes = factory(Porcentajes::class)->create();

        $resp = $this->porcentajesRepo->delete($porcentajes->id);

        $this->assertTrue($resp);
        $this->assertNull(Porcentajes::find($porcentajes->id), 'Porcentajes should not exist in DB');
    }
}
