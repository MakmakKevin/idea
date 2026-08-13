<?php

it('can register a new user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'johndoe@idea.com')
        ->fill('password', 'SUPERUSER')
        ->click('Create account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'johndoe@idea.com',
    ]);
});
