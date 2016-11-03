--DROP VIEW dbgroup.vw_dict_allocation_addr;

CREATE VIEW vw_dict_allocation_addr AS
    SELECT dict_allocation_addr.id, dict_allocation_addr.allocation,
        dict_allocation_addr.type, dict_allocation_addr.value, dict_allocation_addr.description,
        dict_allocation_addr.staff_modified
    FROM dict.vw_dict_allocation_addr dict_allocation_addr;


ALTER TABLE dbgroup.vw_dict_allocation_addr OWNER TO dbgroup;

COMMENT ON VIEW vw_dict_allocation_addr IS 'View for allocation address';

CREATE RULE delete_vw_dict_allocation_addr AS ON DELETE TO vw_dict_allocation_addr DO INSTEAD DELETE FROM dict.vw_dict_allocation_addr WHERE (vw_dict_allocation_addr.id = old.id);

CREATE RULE insert_vw_dict_allocation_addr AS ON INSERT TO vw_dict_allocation_addr DO INSTEAD INSERT INTO dict.vw_dict_allocation_addr (allocation, type, value, description, staff_modified) VALUES (new.allocation, new.type, new.value, new.description, new.staff_modified) RETURNING vw_dict_allocation_addr.id, vw_dict_allocation_addr.allocation, vw_dict_allocation_addr.type, vw_dict_allocation_addr.value, vw_dict_allocation_addr.description, vw_dict_allocation_addr.staff_modified;

CREATE RULE update_vw_dict_allocation_addr AS ON UPDATE TO vw_dict_allocation_addr DO INSTEAD UPDATE dict.vw_dict_allocation_addr SET allocation = new.allocation, type = new.type, value = new.value, description = new.description, staff_modified = new.staff_modified WHERE (vw_dict_allocation_addr.id = new.id);