<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'birth_date',
        'type_id',
    ];

    public function owner(): BelongsTo {
        return $this->BelongsTo(Owner::class);
    }

    public function type(): BelongsTo {
        return $this->BelongsTo(Type::class);
    }

}
