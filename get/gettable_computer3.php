<?php
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();


    $sql = "SELECT computer.ID,computer.type,status,donor.name as donorname,donee.name as ownername 
    FROM donor,computer,donee 
    where computer.avaliable=1 and donor.avaliable=1 and donee.avaliable=1 and computer.donor_ID=donor.ID and computer.owner_ID=donee.ID and computer.status=3";
    $query = $this->db->query($sql);

    echo json_encode($query->result_array()); //然后前排接收即可
?>