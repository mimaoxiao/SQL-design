<?php
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();


    $sql = "SELECT * FROM logsp";
    $query = $this->db->query($sql);

    echo json_encode($query->result_array()); //然后前排接收即可
?>