<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Loan extends Model
{
    use HasFactory;

   
// .relación inversa utilizando el método belongsTo:

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

}

