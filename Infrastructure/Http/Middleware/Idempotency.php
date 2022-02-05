<?php

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Infrastructure\Auth\Service\Auth;
use Infrastructure\Http\Service\Req;
use Symfony\Component\HttpFoundation\Response;

class Idempotency {
    public function handle(Request $request, Closure $next): Response  {
        $is_write_request = Req::isWriteRequest();

        if ($is_write_request) {
            $idempotency_key = $request->header('idempotency-key') ?? $request->input('_idempotency');
            if ($idempotency_key !== null) {
                DB::insert("INSERT INTO z_idempotency (idempotency_key, user_id, http_verb, http_path) VALUES (?, ?, ?, ?)", [$idempotency_key, Auth::id(), $request->getMethod(), $request->path()]);
            }
        }

        $resp = $next($request);

        //REMOVE IDEMPOTENCY ON SERVER ERROR
        if ($is_write_request && $idempotency_key !== null && $resp->getStatusCode() >= 400) {
            DB::delete("DELETE FROM z_idempotency WHERE idempotency_key = ?", [$idempotency_key]);
        }
        return $resp;
    }
}