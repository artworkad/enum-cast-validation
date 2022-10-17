<?php

namespace App\Actions;

use Illuminate\Validation\Rules\Enum;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;
use App\Enums\PostTopic;
use App\Models\Post;

class StorePostAction
{
    use AsAction;
    use WithAttributes;

    public function rules(): array
    {
        return [
            'post.title' => ['required', new Enum(PostTopic::class)],
            'post.title_other' => 'required_if:post.title,' . PostTopic::OTHER->value
        ];
    }

    public function handle(Post $post, array $attributes = []): Post
    {
        $this->set('post', $post)->fill($attributes);

        $this->validateAttributes();

        $post->save();

        return $post;
    }
}
