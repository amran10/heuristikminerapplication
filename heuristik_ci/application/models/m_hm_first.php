    <?php

    class m_wika extends CI_Model{

    function tampil_data()
    {
    $this->db->select('*');
    $this->db->from('tbl_versi_modul');
    $this->db->join('tbl_modul', 'tbl_modul.m_versi = tbl_versi_modul.versi');
    $this->db->order_by('id_modul','DESC');
    $query = $this->db->get();
    return $query->result();    
    }

    function input_data($table, $data)
    {
        $this->db->insert($table,$data);
    }

    function input_data1($table, $data)
    {
        $this->db->insert($table,$data);
    }
        
    function update_data($table,$data,$id)
    {
        $this->db->where('id_modul',$id)->update($table,$data);
    }

    function update_data1($table,$data,$id)
    {
        $this->db->where('versi',$id)->update($table,$data);
    }

    function update_data2($table,$data,$id)
    {
        $this->db->where('m_versi',$id)->update($table,$data);
    }

    function deleteData($table,$versi)
    {
        $this->db->delete($table,$versi);
    }

    function deleteData1($table,$m_versi)
    {
        $this->db->delete($table,$m_versi);
    }

    function deleteData12($table,$id_modul)
    {
        $this->db->delete($table,$id_modul);
    }
   
    function getDataEdit($id_modul)
    {
    return $this->db->query("SELECT * from tbl_modul where id_modul = '$id_modul' ")->result();  
    }

    function getDataEdit1($versi)
    {
    return $this->db->query("SELECT * from tbl_versi_modul where versi = '$versi' ")->result(); 
    }

    function getData($versi)
    {
    return $this->db->query("SELECT * from tbl_versi_modul where versi = '$versi' ")->result();  
    }

    function get_view_detail($versi)
    {
    //return $this->db->query("SELECT * from tbl_versi_modul where versi = '$versi' ")->result();
    $this->db->select('*');
    $this->db->from('tbl_versi_modul');
    $this->db->join('tbl_modul', 'tbl_modul.m_versi = tbl_versi_modul.versi');
    $this->db->where('versi', $versi);
    $this->db->order_by('id_modul','DESC');
    $query = $this->db->get();
    return $query->result();    
    }

    function get_edit_modul($versi)
    {
    //return $this->db->query("SELECT * from tbl_versi_modul where versi = '$versi' ")->result();
    $this->db->select('*');
    $this->db->from('tbl_versi_modul');
    $this->db->join('tbl_modul', 'tbl_modul.m_versi = tbl_versi_modul.versi');
    $this->db->where('versi', $versi);
    $query = $this->db->get();
    return $query->result();    
    }
}
?>