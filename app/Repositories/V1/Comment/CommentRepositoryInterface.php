<?php

namespace App\Repositories\V1\Comment;

interface CommentRepositoryInterface
{
    public function search($key);

    public function changestatus($data);

    public function commment($id);
}
