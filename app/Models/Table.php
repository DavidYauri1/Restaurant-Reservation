<?php

namespace App\Models;

use App\Enums\TableStatus;
use App\Models\Reservation;
use App\Enums\TableLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'guest_number', 'status', 'location'];

    protected $cats = [
        'status' => TableStatus::class,
        'location' => TableLocation::class,
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }


}
