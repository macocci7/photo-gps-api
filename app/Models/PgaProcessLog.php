<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PgaProcessLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pga_access_log_id',
        'filename',
        'exif_version',
        'gps_data',
    ];

    public function accessLog(): BelongsTo
    {
        return $this->belongsTo(PgaAccessLog::class);
    }
}
