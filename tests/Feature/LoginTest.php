<?php

use App\Models\User;

it('can login an existing user', function () {
    $user = User::factory()->create(['password' => 'SUPERUSER']);

    visit('/login')
        ->fill('email',$user->email)
        ->fill('password', 'SUPERUSER')
        ->click('@login-button')
        ->assertPathIs('/');
});

it('cannot login with invalid credentials', function () {
    $user = User::factory()->create(['password' => 'SUPERUSER']);

    visit('/login')
        ->fill('email',$user->email)
        ->fill('password', 'INVALID_PASSWORD')
        ->click('@login-button')
        ->assertPathIs('/login');
});

it('can logout an authenticated user', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    visit('/')
        ->click('Logout')
        ->assertPathIs('/');

    $this->assertGuest();
});

