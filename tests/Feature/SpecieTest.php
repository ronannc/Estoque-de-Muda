<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\Specie;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SpecieTest extends TestCase
{
    use DatabaseMigrations;

    public function test_index()
    {
        $user = User::factory()->create();
        Specie::factory()->count( 10 )->create();
        $response = $this->actingAs( $user )
                         ->get( '/specie' );
        $response->assertStatus( 200 );
        $response->assertViewIs( 'specie.index' );
    }

    public function test_store()
    {
        $user = User::factory()->create();
        Group::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->post( '/specie', [ 'name' => 'teste', 'specie' => 'teste especie', 'group_id' => '1' ] );
        $response->assertRedirect( '/specie' );
        $this->assertDatabaseCount( 'species', 1 );
        $this->assertDatabaseHas( 'species', [ 'name' => 'teste' ] );
    }

    public function test_update()
    {
        $user = User::factory()->create();
        Group::factory()->count( 1 )->create();
        Specie::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->put( '/specie/1', [ 'name' => 'teste up', 'specie' => 'teste especie up', 'group_id' => '1' ] );
        $response->assertRedirect( '/specie' );
        $this->assertDatabaseCount( 'species', 1 );
        $this->assertDatabaseHas( 'species', [ 'name' => 'teste up' ] );
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        Specie::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->delete( '/specie/1' );
        $response->assertRedirect( '/specie' );
        $this->assertDatabaseCount( 'species', 1 );
        $this->assertSoftDeleted( 'species', [ 'id' => '1' ] );
    }
}
