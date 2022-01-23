<?php

namespace Infrastructure\Audit\Utility;

use Illuminate\Database\Eloquent\Model;

class Extractors {
    public static function extractAuditColumns(Model $model): array {
        $arr = $model->toArray();
        foreach ($arr as $key => $value) {
            if (str_starts_with($key, 'encrypted_')) {
                $arr[$key] = 'HIDDEN';
            }
        }
        return $arr;
    }

    public static function extraPrimaryKeyArray(Model $model): array {
        $primary_key_value = $model->getKey();
        $res = [null, null, null];
        // Test the key to find out what type it is.
        if (is_int($primary_key_value)) {
            $res[0] = $primary_key_value;
        } else if (is_string($primary_key_value) && preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $primary_key_value)) {
            $res[1] = $primary_key_value;
        } else {
            $res[2] = $primary_key_value;
        }
        return $res;
    }
}