<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cdr extends Model
{
    use HasFactory;

    protected $fillable = [
        'calldate','clid','src','dst','dcontext','channel','dstchannel','lastapp',
        'lastdata','duration','billsec','disposition','amaflags','accountcode',
        'uniqueid','userfield','did','recordingfile','cnum','cnam','outbound_cnum',
        'outbound_cnam','dst_cnam','prime_dst','bit_dst','enjoy_dst','daon_dst',
        'pnp_dst','daon_ivr','happyeco_dst','bisen_dst','answer_time','hangup_time'        
    ];

}
