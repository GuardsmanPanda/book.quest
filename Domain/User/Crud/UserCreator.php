<?php

namespace Domain\User\Crud;

use Domain\User\Model\User;
use GuardsmanPanda\Larabear\Infrastructure\Database\Service\BearDBService;
use GuardsmanPanda\Larabear\Infrastructure\Http\Service\Req;
use Illuminate\Support\Str;
use RuntimeException;

class UserCreator {
    public static function create(
        string $display_name,
        string $email,
        int $twitch_id = null
    ): User {
        BearDBService::mustBeInTransaction();
        if (!Req::isWriteRequest()) {
            throw new RuntimeException(message: 'Database write operations should not be performed in read-only [GET, HEAD, OPTIONS] requests.');
        }
        $model = new User();
        $model->id = Str::uuid()->toString();

        $model->display_name = $display_name;
        $model->email = $email;
        $model->twitch_id = $twitch_id;

        $model->save();
        return $model->fresh();
    }
}
