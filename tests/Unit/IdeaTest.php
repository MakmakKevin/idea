<?php

use App\Models\Idea;
use App\Models\Step;
use App\Models\User;

test('example', function () {
    expect(true)->toBeTrue();
});

test('idea belongs to user', function() {
    $idea = Idea::factory()->create();
    expect($idea->user)->toBeInstanceOf(User::class);
});

test('idea can have steps', function() {
    $idea = Idea::factory()->create();
    
    expect($idea->steps)->toBeEmpty();

    $idea->steps()->create([
        'description' => 'Step 1',
    ]);

    expect($idea->fresh()->steps)->toHaveCount(1);
    expect($idea->steps()->first())->toBeInstanceOf(Step::class);
});
