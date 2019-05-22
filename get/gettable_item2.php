<?php
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();


    $sql = "SELECT item.ID,item.message,status,donor.name as donorname,keeper.name as ownername 
    FROM keeper,item,donor 
    where item.avaliable=1 and donor.avaliable=1 and keeper.avaliable=1 and item.donor_ID=donor.ID and item.owner_ID=keeper.ID and item.status=2";
    $query = $this->db->query($sql);

    echo json_encode($query->result_array()); //然后前排接收即可
?>