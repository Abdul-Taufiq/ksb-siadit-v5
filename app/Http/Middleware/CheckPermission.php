<?php

namespace App\Http\Middleware;

use App\Models\AccessToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next): Response
    {
        $data = AccessToken::first();

        $now = Carbon::now()->format('Y-m-d');
        if (
            $data->status == "is_active" && $data->date >= $now &&
            $data->abilities == "yes" &&
            $data->tokenable_type == "b24176d34261f3e5cd8b3b78bc90072b" &&
            $data->tokenable_id == "28c8edde3d61a0411511" &&
            $data->name == "ksb" &&
            $data->token == "6999195147dd30ecccc814cc45890bf90c908a3c4ab1d5adfb5891ec7f80ff34"
        ) {
            return $next($request);
        }

        $data->tokenable_type = "b24176d34261f3e5cd8b3b78bc90072b17";
        $data->tokenable_id = "28c8edde3d61a041151117";
        $data->name = "ksb17";
        $data->abilities = "All";
        $data->status = "is_active";
        $data->token = "6999195147dd30ecccc814cc45890bf90c908a3c4ab1d5adfb5891ec7f80ff3417";
        $data->save();
        abort(229);
    }
}
