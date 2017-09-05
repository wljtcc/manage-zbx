-- Host History Percent
CREATE OR REPLACE VIEW vw_listhost_percent
AS
  SELECT h.hostid, h.host, i.itemid, i.name, i.key_, i.units, i.description, hy.value, hy.clock
  FROM HOSTS h
    INNER JOIN ITEMS i ON h.hostid = i.hostid
    INNER JOIN history hy ON i.itemid = hy.itemid
  WHERE h.status in (0,1)
    AND h.flags = 0
    AND i.type = 0
  ORDER BY hy.clock desc

-- Host History Value
CREATE OR REPLACE VIEW vw_listhost_value
AS
  SELECT h.hostid, h.host, i.itemid, i.name, i.key_, i.units, i.description, hu.value, hu.clock
  FROM HOSTS h
    INNER JOIN ITEMS i ON h.hostid = i.hostid
    INNER JOIN history_uint hu ON i.itemid = hu.itemid
  WHERE h.status in (0,1)
    AND h.flags = 0
    AND i.type = 0
  order by hu.clock desc


-- Host and IP
CREATE OR REPLACE VIEW vw_host_status
AS
	SELECT h.hostid, h.host, h.available, i.ip
	FROM hosts h
		INNER JOIN interface i ON h.hostid = i.hostid
	WHERE h.status in (0,1)
		AND h.flags = 0
	ORDER BY h.host