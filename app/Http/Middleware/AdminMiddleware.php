<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Если пользователь не авторизован — стандартный auth сам редиректит,
        // но мы всё равно проверяем, что auth сработал.
        if (!auth()->check()) {
            return redirect()->guest(route('login'));
        }

        // Тут зависит от того, как ты хранишь признак админа.
        // Вариант А: колонка is_admin (boolean/tinyint) в users
        if (!auth()->user()->is_admin) {
            abort(403, 'Доступ только для администраторов');
        }

        // Вариант Б (если у тебя роль в поле role):
        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Доступ только для администраторов');
        // }

        return $next($request);
    }
}
