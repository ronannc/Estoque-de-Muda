<?php

namespace Tests\Feature;

use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TypeTest extends TestCase
{
    use DatabaseMigrations;

    public function test_index()
    {
        $user = User::factory()->create();
        Type::factory()->count( 10 )->create();
        $response = $this->actingAs( $user )
                         ->get( '/type' );
        $response->assertStatus( 200 );
        $response->assertViewIs( 'type.index' );
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs( $user, 'web' )
                         ->post( '/type', [ 'name' => 'teste' ] );
        $response->assertRedirect( '/type' );
        $this->assertDatabaseCount( 'types', 1 );
        $this->assertDatabaseHas( 'types', [ 'name' => 'teste' ] );
    }

    public function test_update()
    {
        $user = User::factory()->create();
        Type::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->put( '/type/1', [ 'name' => 'teste update' ] );
        $response->assertRedirect( '/type' );
        $this->assertDatabaseCount( 'types', 1 );
        $this->assertDatabaseHas( 'types', [ 'name' => 'teste update' ] );
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        Type::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->delete( '/type/1' );
        $response->assertRedirect( '/type' );
        $this->assertDatabaseCount( 'types', 1 );
        $this->assertSoftDeleted( 'types', [ 'id' => '1' ] );
    }
}
