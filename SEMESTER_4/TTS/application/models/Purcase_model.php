<?php

class Purcase_model extends CI_Model
{
    public function get_all_purcase($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('purchline AS PL');
        $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        $this->db->like('NAME', $NAME);
        $this->db->like('ITEMNAME', $ITEMNAME);

        $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->get();

        return $result;
    }

    public function get_purcase($rowno, $rowperpage, $INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('purchline AS PL');
        $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        $this->db->like('NAME', $NAME);
        $this->db->like('ITEMNAME', $ITEMNAME);


        $this->db->order_by('INVENTTRANSID', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        return $result;
    }

    public function get_vendor()
    {
        $result = $this->db->get('vendtable');
        return $result;
    }

    public function get_items()
    {
        $result = $this->db->get('inventtable');
        return $result;
    }

    public function get_new_inventtransid()
    {
        $this->db->select('INVENTTRANSID');
        $this->db->from('purchline');
        $this->db->order_by('INVENTTRANSID', 'DESC');
        $this->db->limit(1);
        $inventtransid = $this->db->get()->row()->INVENTTRANSID;
        $last_inventtransid = substr($inventtransid, -3);
        $new_inventtransid = intval($last_inventtransid) + 1;
        $result = "MID" . str_pad($new_inventtransid, 3, "0", STR_PAD_LEFT);

        return $result;
    }

    public function get_new_purchid()
    {
        $this->db->select('PURCHID');
        $this->db->from('purchtable');
        $this->db->order_by('PURCHID', 'DESC');
        $this->db->limit(1);
        $purchid = $this->db->get()->row()->PURCHID;
        $last_purchid = substr($purchid, strrpos($purchid, "-") + 1);
        $new_purchid = intval($last_purchid) + 1;
        $result = "PO-23-" . str_pad($new_purchid, 4, "0", STR_PAD_LEFT);
        return $result;
    }

    public function save_purcase($INVENTTRANSID, $PURCHID, $ACCOUNTNUM, $ITEMID, $LINENUM, $QTYORDERED, $PURCHRECEIVEDNOW, $PURCHPRICE, $LINEAMOUNT, $DELIVERYDATE, $PURCHSTATUS)
    {
        $this->db->trans_start();

        try {
            $data_purchtable = array(
                'PURCHID' => $PURCHID,
                'INVOICEACCOUNT' => $ACCOUNTNUM,
                'DELIVERYDATE' => $DELIVERYDATE,
                'PURCHSTATUS' => $PURCHSTATUS
            );

            $this->db->insert('purchtable', $data_purchtable);

            $data_purchline = array(
                'INVENTTRANSID' => $INVENTTRANSID,
                'PURCHID' => $PURCHID,
                'LINENUM' => $LINENUM,
                'ITEMID' => $ITEMID,
                'PURCHPRICE' => $PURCHPRICE,
                'QTYORDERED' => $QTYORDERED,
                'PURCHRECEIVEDNOW' => $PURCHRECEIVEDNOW,
                'LINEAMOUNT' => $LINEAMOUNT
            );
            $this->db->insert('purchline', $data_purchline);

            $this->db->trans_commit();
            return true;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }

    }

    public function update_purcase($INVENTTRANSID, $PURCHID, $ACCOUNTNUM, $ITEMID, $LINENUM, $QTYORDERED, $PURCHRECEIVEDNOW, $PURCHPRICE, $LINEAMOUNT, $DELIVERYDATE, $PURCHSTATUS)
    {
        $query = "UPDATE purchline
        JOIN purchtable ON purchtable.PURCHID = purchline.PURCHID
        SET purchline.LINENUM = '$LINENUM',
            purchline.ITEMID = '$ITEMID',
            purchline.PURCHPRICE = '$PURCHPRICE',
            purchline.QTYORDERED = '$QTYORDERED',
            purchline.PURCHRECEIVEDNOW = '$PURCHRECEIVEDNOW',
            purchline.LINEAMOUNT = '$LINEAMOUNT',
            purchtable.INVOICEACCOUNT = '$ACCOUNTNUM',
            purchtable.DELIVERYDATE = '$DELIVERYDATE',
            purchtable.PURCHSTATUS = '$PURCHSTATUS'
        WHERE purchline.INVENTTRANSID = '$INVENTTRANSID'
        AND purchtable.PURCHID = '$PURCHID'";

        $this->db->query($query);


        // $this->db->trans_start();

        // try {
        //     $data_purchtable = array(
        //         'INVOICEACCOUNT' => $ACCOUNTNUM,
        //         'DELIVERYDATE' => $DELIVERYDATE,
        //         'PURCHSTATUS' => $PURCHSTATUS
        //     );

        //     $data_purchline = array(
        //         'LINENUM' => $LINENUM,
        //         'ITEMID' => $ITEMID,
        //         'PURCHPRICE' => $PURCHPRICE,
        //         'QTYORDERED' => $QTYORDERED,
        //         'PURCHRECEIVEDNOW' => $PURCHRECEIVEDNOW,
        //         'LINEAMOUNT' => $LINEAMOUNT
        //     );
        //     $this->db->set('purchline.LINENUM', $LINENUM);
        //     $this->db->set('purchline.ITEMID', '5150');
        //     $this->db->set('purchline.PURCHPRICE', '100000');
        //     $this->db->set('purchline.QTYORDERED', '6');
        //     $this->db->set('purchline.PURCHRECEIVEDNOW', '2');
        //     $this->db->set('purchline.LINEAMOUNT', '300000');

        //     $this->db->where('purchline.INVENTTRANSID', 'MID101');
        //     $this->db->update('purchline');

        //     $this->db->set('purchtable.INVOICEACCOUNT', '1150');
        //     $this->db->set('purchtable.DELIVERYDATE', '2023-05-21');
        //     $this->db->set('purchtable.PURCHSTATUS', '1');

        //     $this->db->join('purchline', 'purchtable.PURCHID = purchline.PURCHID');
        //     $this->db->where('purchline.INVENTTRANSID', 'MID101');
        //     $this->db->update('purchtable');
        //     $this->db->trans_commit();
        // } catch (Exception $e) {
        //     $this->db->trans_rollback();
        //     return false;
        // }

        return true;
    }

    public function get_purcase_id($INVENTTRANSID)
    {
        $this->db->select('*');
        $this->db->from('purchline AS PL');
        $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');
        $this->db->where('INVENTTRANSID', $INVENTTRANSID);
        $result = $this->db->get()->row();
        // $query = $this->db->get_where('purchline', array('INVENTTRANSID' => $INVENTTRANSID));
        return $result;
    }

    public function delete($INVENTTRANSID, $PURCHID)
    {
        $this->db->trans_start();

        try {
            $this->db->where('INVENTTRANSID', $INVENTTRANSID);
            $this->db->delete('purchline');

            $this->db->where('PURCHID', $PURCHID);
            $this->db->delete('purchtable');

            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                return false;
            }

            return true; // Transaksi berhasil
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }
    }

    //count total record
    public function get_purcase_count($INVENTTRANSID = "", $NAME = "", $ITEMNAME = "")
    {
        $this->db->select('*');
        $this->db->from('purchline AS PL');
        $this->db->join('purchtable AS PT', 'PL.PURCHID = PT.PURCHID');
        $this->db->join('vendtable AS V', 'PT.INVOICEACCOUNT = V.ACCOUNTNUM');
        $this->db->join('inventtable AS I', 'PL.ITEMID = I.ITEMID');

        $this->db->like('INVENTTRANSID', $INVENTTRANSID);
        $this->db->like('NAME', $NAME);
        $this->db->like('ITEMNAME', $ITEMNAME);

        $result = $this->db->count_all_results();

        return $result;
    }
}