<?php

class Product_model extends CI_Model
{
    public function get_product()
    {
        $result = $this->db->get('product');
        return $result;
    }
    
    public function get_product_pagination($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('product');

        if ($search != '') {
            $this->db->like('product_name', $search);
            $this->db->or_like('product_price', $search);
        }

        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    public function save($product_name, $product_price)
    {
        $data = array(
            'product_name' => $product_name,
            'product_price' => $product_price)
            
            ;

        $this->db->insert('product', $data);
    }

    public function get_product_id($product_code)
    {
        $query = $this->db->get_where('product', array('product_code' => $product_code));
        return $query;
    }

    public function update($product_code, $product_name, $product_price)
    {
        $data = array(
            'product_name' => $product_name,
            'product_price' => $product_price
        
        );

        $this->db->where('product_code', $product_code);
        $this->db->update('product', $data);
    }

    public function delete($product_code)
    {
        $this->db->where('product_code', $product_code);
        $this->db->delete('product');
    }

    //count total record
    public function get_product_count($search = '')
    {
        $this->db->select('*');
        $this->db->from('product');

        if ($search != '') {
            $this->db->like('product_name', $search);
            $this->db->or_like('product_price', $search);
        }
        $result = $this->db->count_all_results();

        return $result;
    }
}
