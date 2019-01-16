<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWListHostsValue extends Model
{
    //
    protected $table = 'vw_listhost_value';
}

/*

## VIEW ##

CREATE OR REPLACE VIEW public.vw_listhost_value(
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
         hu.value,
         hu.clock
  FROM hosts h
       JOIN items i ON h.hostid = i.hostid
       JOIN history_uint hu ON i.itemid = hu.itemid
  WHERE (h.status = ANY (ARRAY [ 0, 1 ])) AND
        h.flags = 0 AND
        i.type = 0
  ORDER BY hu.clock DESC;

*/