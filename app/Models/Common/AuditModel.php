<?php

namespace Api\Models\Common;

use Illuminate\Database\Eloquent\Model;


class AuditModel extends Model
{
    protected $fillable = ["ip", "user_agent"];
    protected $hidden = ["ip", "user_agent"];
}