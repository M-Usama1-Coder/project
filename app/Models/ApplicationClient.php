<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationClient extends Model
{
    use HasFactory;
    protected $table = 'application_clients';
    protected $fillable = [
        'client_id',
        'application_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];
}
