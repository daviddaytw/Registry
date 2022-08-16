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
        $response = $this->get(route('registry.show', [$registry]));
        $response->assertSuccessful();
        $response->assertSee($registry->data);
    }
}
