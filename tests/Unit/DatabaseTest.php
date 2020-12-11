<?php

namespace Tests\Unit;

use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com',
        ]);
    }
}
