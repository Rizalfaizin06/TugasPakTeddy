<?php

class Vendor_model extends CI_Model
{
    public function get_all_vendor($searchACCOUNTNUM = "", $searchNAME = "", $searchADDRESS = "")
    {
        $this->db->select('*');
        $this->db->from('vendtable');

        $this->db->like('ACCOUNTNUM', $searchACCOUNTNUM);
        $this->db->like('NAME', $searchNAME);
        $this->db->like('ADDRESS', $searchADDRESS);

        $this->db->order_by('ACCOUNTNUM', 'DESC');
        $result = $this->db->get();

        return $result;
    }

    public function get_vendor($rowno, $rowperpage, $searchACCOUNTNUM = "", $searchNAME = "", $searchADDRESS = "")
    {
        $this->db->select('*');
        $this->db->from('vendtable');


        $this->db->like('ACCOUNTNUM', $searchACCOUNTNUM);
        $this->db->like('NAME', $searchNAME);
        $this->db->like('ADDRESS', $searchADDRESS);


        $this->db->order_by('ACCOUNTNUM', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    public function get_items()
    {
        $result = $this->db->get('inventtable');
        return $result;
    }


    public function save_vendor($NAME, $ADDRESS, $PHONE, $CREATEDDATETIME)
    {
        $data_vendtable = array(
            'ACCOUNTNUM' => NULL,
            'NAME' => $NAME,
            'ADDRESS' => $ADDRESS,
            'PHONE' => $PHONE,
            'CREATEDDATETIME' => $CREATEDDATETIME
        );

        $this->db->insert('vendtable', $data_vendtable);

        return true;

    }

    public function update_vendor($ACCOUNTNUM, $NAME, $ADDRESS, $PHONE)
    {
        $data = array(
            'NAME' => $NAME,
            'ADDRESS' => $ADDRESS,
            'PHONE' => $PHONE
        );

        $this->db->where('ACCOUNTNUM', $ACCOUNTNUM);
        $this->db->update('vendtable', $data);
        return true;
    }

    public function get_vendor_id($ACCOUNTNUM)
    {
        $this->db->select('*');
        $this->db->from('vendtable');
        $this->db->where('ACCOUNTNUM', $ACCOUNTNUM);
        $result = $this->db->get()->row();
        // $query = $this->db->get_where('purchline', array('ACCOUNTNUM' => $ACCOUNTNUM));
        return $result;
    }

    public function delete($ACCOUNTNUM)
    {
        $this->db->where('ACCOUNTNUM', $ACCOUNTNUM);
        $this->db->delete('vendtable');

        return true;

    }

    //count total record
    public function get_vendor_count($searchACCOUNTNUM = "", $searchNAME = "", $searchADDRESS = "")
    {
        $this->db->select('*');
        $this->db->from('vendtable');


        $this->db->like('ACCOUNTNUM', $searchACCOUNTNUM);
        $this->db->like('NAME', $searchNAME);
        $this->db->like('ADDRESS', $searchADDRESS);

        $result = $this->db->count_all_results();

        return $result;
    }
}