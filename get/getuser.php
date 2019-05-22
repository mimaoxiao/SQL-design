<?php
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();


    $sql = "SELECT ID,username FROM user";
    $query = $this->db->query($sql);

    echo json_encode($query->result_array()); //然后前排接收即可
?>