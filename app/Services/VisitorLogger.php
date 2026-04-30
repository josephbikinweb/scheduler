<?php
namespace App\Services;

use App\Models\VisitorDetail;
use App\Models\VisitorLog;
use Illuminate\Support\Str;

class VisitorLogger
{
    public function handle(array $data)
    {
        if (empty($data)) {
            return;
        }

        $log = VisitorLog::create([
            'id'            => Str::ulid(),
            'user_id'       => $data['user_id'] ?? null,
            'ip_address'    => $data['ip_address'],
            'status_code'   => $data['status_code'],
            'url'           => $data['url'],
            'referer'       => $data['referer'] ?? null,
            'method'        => $data['method'],
            'response_time' => $data['response_time'],
            'is_bot'        => $data['is_bot'] ?? false,
            'visited_at'    => $data['visited_at'],
        ]);

        VisitorDetail::create([
            'visitor_log_id' => $log->id,
            'user_agent'     => $data['user_agent'] ?? null,
        ]);
    }

    public function isBot(?string $agent): bool
    {
        $agent = strtolower($agent ?? '');

        return str_contains($agent, 'bot') ||
        str_contains($agent, 'crawl') ||
        str_contains($agent, 'spider');
    }
}
