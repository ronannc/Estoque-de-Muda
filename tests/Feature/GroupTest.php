<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use DatabaseMigrations;

    public function test_index()
    {
        $user = User::factory()->create();
        Group::factory()->count( 10 )->create();
        $response = $this->actingAs( $user )
                         ->get( '/group' );
        $response->assertStatus( 200 );
        $response->assertViewIs( 'group.index' );
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs( $user, 'web' )
                         ->post( '/group', [ 'name' => 'teste' ] );
        $response->assertRedirect( '/group' );
        $this->assertDatabaseCount( 'groups', 1 );
        $this->assertDatabaseHas( 'groups', [ 'name' => 'teste' ] );
    }

    public function test_update()
    {
        $user = User::factory()->create();
        Group::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->put( '/group/1', [ 'name' => 'teste update' ] );
        $response->assertRedirect( '/group' );
        $this->assertDatabaseCount( 'groups', 1 );
        $this->assertDatabaseHas( 'groups', [ 'name' => 'teste update' ] );
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        Group::factory()->count( 1 )->create();
        $response = $this->actingAs( $user, 'web' )
                         ->delete( '/group/1' );
        $response->assertRedirect( '/group' );
        $this->assertDatabaseCount( 'groups', 1 );
        $this->assertSoftDeleted( 'groups', [ 'id' => '1' ] );
    }
}
