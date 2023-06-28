<?php

class Items_model extends CI_Model
{
    public function get_all_items($searchITEMID = "", $searchITEMNAME = "", $searchNAMEALIAS = "")
    {
        $this->db->select('*');
        $this->db->from('inventtable');

        $this->db->like('ITEMID', $searchITEMID);
        $this->db->like('ITEMNAME', $searchITEMNAME);
        $this->db->like('NAMEALIAS', $searchNAMEALIAS);

        $this->db->order_by('ITEMID', 'DESC');
        $result = $this->db->get();

        return $result;
    }

    public function get_items($rowno, $rowperpage, $searchITEMID = "", $searchITEMNAME = "", $searchNAMEALIAS = "")
    {

        $this->db->select('*');
        $this->db->from('inventtable');



        $this->db->like('ITEMID', $searchITEMID);
        $this->db->like('ITEMNAME', $searchITEMNAME);
        $this->db->like('NAMEALIAS', $searchNAMEALIAS);
        $this->db->order_by('ITEMID', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }



    public function save_items($ITEMNAME, $ITEMTYPE, $NAMEALIAS, $ITEMPRICE)
    {
        $data_inventtable = array(
            'ITEMID' => NULL,
            'ITEMNAME' => $ITEMNAME,
            'ITEMTYPE' => $ITEMTYPE,
            'NAMEALIAS' => $NAMEALIAS,
            'ITEMPRICE' => $ITEMPRICE
        );

        $this->db->insert('inventtable', $data_inventtable);

        return true;

    }

    public function update_items($ITEMID, $ITEMNAME, $ITEMTYPE, $NAMEALIAS, $ITEMPRICE)
    {
        $data = array(
            'ITEMNAME' => $ITEMNAME,
            'ITEMTYPE' => $ITEMTYPE,
            'NAMEALIAS' => $NAMEALIAS,
            'ITEMPRICE' => $ITEMPRICE
        );

        $this->db->where('ITEMID', $ITEMID);
        $this->db->update('inventtable', $data);
        return true;
    }

    public function get_items_id($ITEMID)
    {
        $this->db->select('*');
        $this->db->from('inventtable');
        $this->db->where('ITEMID', $ITEMID);
        $result = $this->db->get()->row();
        return $result;
    }

    public function delete($ITEMID)
    {
        $this->db->where('ITEMID', $ITEMID);
        $this->db->delete('inventtable');

        return true;

    }

    //count total record
    public function get_items_count($searchITEMID = "", $searchITEMNAME = "", $searchNAMEALIAS = "")
    {
        $this->db->select('*');
        $this->db->from('inventtable');

        $this->db->like('ITEMID', $searchITEMID);
        $this->db->like('ITEMNAME', $searchITEMNAME);
        $this->db->like('NAMEALIAS', $searchNAMEALIAS);




        $result = $this->db->count_all_results();

        return $result;
    }
}