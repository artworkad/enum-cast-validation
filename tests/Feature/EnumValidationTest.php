<?php

namespace Tests\Feature;

use Illuminate\Validation\ValidationException;
use App\Actions\StorePostAction;
use App\Enums\PostTopic;
use App\Models\Post;

it('requires title_other if title is set to OTHER (Action)', function () {
    $post = Post::factory()->make([
        'title' => PostTopic::OTHER->value,
        'title_other' => null,
    ]);

    StorePostAction::run($post);
})->throws(ValidationException::class);

it('requires title_other if title is set to OTHER (FormRequest)', function () {
    $this->post('/posts/', [
        'title' => PostTopic::OTHER->value,
        'title_other' => null,
    ])->assertStatus(302);
});
