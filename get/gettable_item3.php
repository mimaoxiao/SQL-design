<?php
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();


    $sql = "SELECT item.ID,item.message,status,donor.name as donorname,donee.name as ownername 
    FROM donor,item,donee 
    where item.avaliable=1 and donor.avaliable=1 and donee.avaliable=1 and item.donor_ID=donor.ID and item.owner_ID=donee.ID and item.status=3";
    $query = $this->db->query($sql);

    echo json_encode($query->result_array()); //然后前排接收即可
?>