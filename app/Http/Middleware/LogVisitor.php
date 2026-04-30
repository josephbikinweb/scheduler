<?php
namespace App\Http\Middleware;

use App\Services\VisitorLogger;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $skip = [
            'api/*',
            'images/*',
            'css/*',
            'js/*',
            'build/*',
            'storage/*',
            '*.css',
            '*.js',
            '*.png',
            '*.jpg',
            '*.jpeg',
            '*.svg',
            '*.ico',
        ];

        foreach ($skip as $pattern) {
            if ($request->is($pattern)) {
                return $next($request);
            }
        }

        // skip ajax / json
        if (
            $request->ajax() ||
            $request->expectsJson() ||
            ! str_contains($request->header('accept'), 'text/html')
        ) {
            return $next($request);
        }
        $start = microtime(true);

        $response = $next($request);

        $end = microtime(true);

        $isBot   = app(VisitorLogger::class)->isBot($request->userAgent());
        $payload = [
            'user_id'       => auth()->id(),
            'ip_address'    => $request->ip(),
            'status_code'   => $response->getStatusCode(),
            'url'           => $request->path(),
            'referer'       => $request->headers->get('referer'),
            'method'        => $request->method(),
            'response_time' => (int) (($end - $start) * 1000),
            'is_bot'        => $isBot,
            'visited_at'    => now(),

            // detail
            'user_agent'    => $request->userAgent(),
        ];

        dispatch(new \App\Jobs\LogVisitorJob($payload));

        return $response;
    }
}
{

}
