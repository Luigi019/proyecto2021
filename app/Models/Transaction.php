<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transactions()
    {
        return $this->morphTo();
    }

}
