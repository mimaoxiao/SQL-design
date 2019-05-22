<?php
    ini_set('date.timezone','Asia/Shanghai');
    $this->load->database();


    $sql = "SELECT computer.ID,computer.type,status,donor.name as donorname,keeper.name as ownername 
    FROM keeper,computer,donor 
    where computer.avaliable=1 and donor.avaliable=1 and keeper.avaliable=1 and computer.donor_ID=donor.ID and computer.owner_ID=keeper.ID and computer.status=2";
    $query = $this->db->query($sql);

    echo json_encode($query->result_array()); //然后前排接收即可
?>