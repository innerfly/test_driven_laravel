<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ticket[] $tickets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @mixin \Eloquent
 */
class Order extends Model
{

    protected $guarded = [];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
