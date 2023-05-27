<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

//uses(Tests\TestCase::class, RefreshDatabase::class);
uses(TestCase::class);

beforeEach(function () {
    $this->user_data = User::factory()->create();
});

it('can login on correct password', function() {
    //$user = User::factory()->create();

    $login_data = ['user_code' => $this->user_data->user_code, 'password'=>'Abs@123123'];

    $response = $this->postJson('/api/auth/login', $login_data);
    $response->assertStatus(200)->assertJson([ 'status' => 'success']);
    //$this->assertDatabaseHas('posts', $post);
});

it('cannot login on wrong password', function() {
    //$user = User::factory()->create();

    $login_data = ['user_code' => $this->user_data->user_code, 'password'=>'test123'];

    $response = $this->postJson('/api/auth/login', $login_data);
    $response->assertStatus(401)->assertJson([ 'status' => 'failure']);
    //$this->assertDatabaseHas('posts', $post);
});



afterEach(function () {
    // Clean testing data after all tests run...
});
