-- Function: dbgroup.fn_geodist(numeric, numeric, character varying, character varying)

-- DROP FUNCTION dbgroup.fn_geodist(numeric, numeric, character varying, character varying);

CREATE OR REPLACE FUNCTION dbgroup.fn_geodist(src_lat numeric, src_lon numeric, dst_lat character varying, dst_lon character varying)
  RETURNS numeric AS
$BODY$DECLARE
  dist numeric;
BEGIN
  dist=6371 * 2 * ASIN(SQRT(
                           POWER(SIN((src_lat - ABS(dst_lat::numeric)) * PI()/180 / 2), 2) +
                           COS(src_lat * PI()/180) *
                           COS(ABS(dst_lat::numeric) * PI()/180) *
                           POWER(SIN((src_lon - dst_lon::numeric) * PI()/180 / 2), 2)
                       ));
  RETURN dist;

END;$BODY$
LANGUAGE plpgsql VOLATILE
COST 100;

ALTER FUNCTION dbgroup.fn_geodist(numeric, numeric, character varying, character varying)
OWNER TO dbgroup;