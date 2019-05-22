<?php error_reporting(0); 
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();

    $id=intval($_POST['id']);

    $sql = "SELECT * FROM computer where avaliable = 1 and ID=?";
    $query = $this->db->query($sql,$id);

    echo json_encode($query->result_array()); //然后前排接收即可
?>