<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWListHostsPercent extends Model
{
    //
    protected $table = 'vw_listhost_percent';
}

/* 

## VIEW ##

CREATE OR REPLACE VIEW public.vw_listhost_percent(
    hostid,
    host,
    itemid,
    name,
    key_,
    units,
    description,
    value,
    clock)
AS
  SELECT h.hostid,
         h.host,
         i.itemid,
         i.name,
         i.key_,
         i.units,
         i.description,
         hy.value,
         hy.clock
  FROM hosts h
       JOIN items i ON h.hostid = i.hostid
       JOIN history hy ON i.itemid = hy.itemid
  WHERE (h.status = ANY (ARRAY [ 0, 1 ])) AND
        h.flags = 0 AND
        i.type = 0
  ORDER BY hy.clock DESC;

*/