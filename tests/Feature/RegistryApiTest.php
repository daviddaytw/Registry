<?php

namespace Tests\Feature;

use App\Models\Registry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_public_registry()
    {
        $registry = Registry::factory()->create(['access_token' => null]);
        $response = $this->get(route('api.registry.show', [$registry]));
        $response->assertSuccessful();
        $response->assertSee($registry->data);
    }

    public function test_show_protected_registry()
    {
        $registry = Registry::factory()->create();
        $response = $this->get(route('api.registry.show', [$registry]));
        $response->assertForbidden();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$registry->access_token,
            'Accept' => 'application/json',
        ])->get(route('api.registry.show', [$registry]));
        $response->assertSuccessful();
        $response->assertSee($registry->data);
    }

    public function test_update_public_registry()
    {
        $text = fake()->text;
        $registry = Registry::factory()->create(['write_token' => null]);

        $response = $this->put(route('api.registry.show', [$registry]), [
            'data' => $text,
        ]);
        $response->assertSuccessful();
        $updated = $registry->fresh();
        $this->assertEquals($text, $updated->data);
    }

    public function test_update_protected_registry()
    {
        $text = fake()->text;
        $registry = Registry::factory()->create();

        $response = $this->put(route('api.registry.show', [$registry]), [
            'data' => $text,
        ]);
        $response->assertForbidden();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$registry->write_token,
            'Accept' => 'application/json',
        ])->put(route('api.registry.show', [$registry]), [
            'data' => $text,
        ]);
        $response->assertSuccessful();
        $updated = $registry->fresh();
        $this->assertEquals($text, $updated->data);
    }
}
