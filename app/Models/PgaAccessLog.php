<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PgaAccessLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'endpoint',
        'is_error',
        'error_message',
        'ip',
        'user_agent',
        'referer',
    ];

    public function processLogs(): HasMany
    {
        return $this->hasMany(PgaProcessLog::class);
    }
}
