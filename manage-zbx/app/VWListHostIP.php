<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWListHostIP extends Model
{
    //
    protected $table = 'vw_host_status';
}

/*

## VIEW ##

CREATE OR REPLACE VIEW public.vw_host_status(
    hostid,
    host,
    available,
    ip)
AS
  SELECT h.hostid,
         h.host,
         h.available,
         i.ip
  FROM hosts h
       JOIN interface i ON h.hostid = i.hostid
  WHERE (h.status = ANY (ARRAY [ 0, 1 ])) AND
        h.flags = 0
  ORDER BY h.host;

*/