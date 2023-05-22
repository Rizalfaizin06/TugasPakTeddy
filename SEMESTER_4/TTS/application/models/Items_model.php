<?php

class Items_model extends CI_Model
{
    public function get_all_items()
    {
        $result = $this->db->get('inventtable');
        return $result;
    }

    public function get_items($rowno, $rowperpage, $searchCode = "", $searchName = "", $searchPrice = "")
    {
        $this->db->select('*');
        $this->db->from('inventtable');


        // $this->db->like('items_code', $searchCode);
        // $this->db->like('items_name', $searchName);
        // $this->db->like('items_price', $searchPrice);


        $this->db->order_by('ITEMID', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }



    public function save_items($ITEMNAME, $ITEMTYPE, $NAMEALIAS)
    {
        $data_inventtable = array(
            'ITEMID' => NULL,
            'ITEMNAME' => $ITEMNAME,
            'ITEMTYPE' => $ITEMTYPE,
            'NAMEALIAS' => $NAMEALIAS
        );

        $this->db->insert('inventtable', $data_inventtable);

        return true;

    }

    public function update_items($ITEMID, $ITEMNAME, $ITEMTYPE, $NAMEALIAS)
    {
        $data = array(
            'ITEMNAME' => $ITEMNAME,
            'ITEMTYPE' => $ITEMTYPE,
            'NAMEALIAS' => $NAMEALIAS
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
        // $query = $this->db->get_where('inventtable', array('ACCOUNTNUM' => $ACCOUNTNUM));
        return $result;
    }

    public function delete($ITEMID)
    {
        $this->db->where('ITEMID', $ITEMID);
        $this->db->delete('inventtable');

        return true;

    }

    //count total record
    public function get_items_count($searchCode = "", $searchName = "", $searchPrice = "")
    {
        $this->db->select('*');
        $this->db->from('inventtable');


        // $this->db->like('items_code', $searchCode);
        // $this->db->like('items_name', $searchName);
        // $this->db->like('items_price', $searchPrice);

        $result = $this->db->count_all_results();

        return $result;
    }
}