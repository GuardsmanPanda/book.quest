<?php

namespace Infrastructure\Auth\Service;

use Domain\User\Model\User;
use Illuminate\Support\Facades\DB;

class Auth {
    private static ?string $user_id = null;
    private static ?User $current_user = null;
    /**
     * @var array<string>
     */
    private static ?array $permissions = null;
    private static ?array $role = null;

    public static function id(): ?string {
        return self::$user_id;
    }

    public static function setLoggedInUserId(?string $user_id): void {
        self::$user_id = $user_id;
    }

    public static function user(): ?User {
        if (self::$user_id === null) {
            return null;
        }
        self::$current_user ??= User::find(self::$user_id);
        return self::$current_user;
    }

    public static function hasPermission(string $permission_name): bool {
        if (self::$user_id === null) {
            return false;
        }
        if (self::$permissions === null) {
            $per = DB::select("
                SELECT p.permission_name
                FROM role_user ru
                JOIN role_permission rp ON ru.role_id = rp.role_id
                JOIN permission p on p.id = rp.permission_id
                WHERE ru.user_id = ?", [self::$user_id]);
            self::$permissions = array_column($per, 'permission_name');
        }
        return in_array($permission_name, self::$permissions, true);
    }

    public static function hasRole(string $roleName): bool {
        if (self::$user_id === null) {
            return false;
        }
        if (self::$role === null) {
            $per = DB::select("
                SELECT r.role_name
                FROM role_user ru
                JOIN role r on r.id = ru.role_id
                WHERE ru.user_id = ?", [self::$user_id]);
            self::$role = array_column($per, 'role_name');
        }
        return in_array($roleName, self::$role, true);
    }
}
