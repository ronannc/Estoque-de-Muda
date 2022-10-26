<?php

namespace Tests\Feature;

use App\Models\Nursery;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class NurseryTest extends TestCase
{
    use DatabaseMigrations;

    public function test_index()
    {
        $user = User::factory()->create();
        Nursery::factory()->count( 10 )->create();
        $response = $this->actingAs( $user )
                         ->get( '/nursery' );
        $response->assertStatus( 200 );
        $response->assertViewIs( 'nursery.index' );
    }

    public function test_store()
    {
        $user     = User::factory()->create();
        $response = $this->actingAs( $user, 'web' )
                         ->post( '/nursery', [ 'name' => 'teste', 'city_id' => '1', 'address' => 'teste', 'neighborhood' => 'teste', 'number' => 23 ] );
        $response->assertRedirect( '/nursery' );
        $this->assertDatabaseCount( 'nurseries', 1 );
        $this->assertDatabaseHas( 'nurseries', [ 'name' => 'teste' ] );
    }

    public function test_update()
    {
        $user = User::factory()->create();
        Nursery::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->put( '/nursery/1', [ 'name' => 'teste up', 'city_id' => '1', 'address' => 'teste up', 'neighborhood' => 'teste', 'number' => 23 ] );
        $response->assertRedirect( '/nursery' );
        $this->assertDatabaseCount( 'nurseries', 1 );
        $this->assertDatabaseHas( 'nurseries', [ 'name' => 'teste up', 'address' => 'teste up' ] );
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        Nursery::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->delete( '/nursery/1' );
        $response->assertRedirect( '/nursery' );
        $this->assertDatabaseCount( 'nurseries', 1 );
        $this->assertSoftDeleted( 'nurseries', [ 'id' => '1' ] );
    }
}
