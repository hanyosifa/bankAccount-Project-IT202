<?php 
function transaction($act1, $act2, $change, $type){
        $select_query = "select SUM(change) as Tatal from Transations where accountID = ";
        $select_query += "account_source = :account";
        $db->prepare($select_query);
        $stmt->execute(array(:account, $act1));
        $act1Tatal = result["Total"];
        $act1Total += $change; // expected total
        
        $db->prepare($select_query);
        $stmt->execute(array(:account, $act2));
        $act2Tatal = result["Total"];
        $act2Total += ($change *- 1); // expected total
        
        $insert = "INSERT INTO Transactions (act1, act2, change, type, Total )";
        $insect += "VAlUES(:p1act1, :p1act2, :p1change, :type, p1Total),";
        $insect += "VAlUES(:p2act2, :p1act1, :p2change, :type, p2Total)";
        
        $db->prepare($insert);
        $stmt->execute(array(
                 ":p1act1"=>$act1,
                 ":p1act2"=>$act2,
                 ":p1change"=>$change,
                 ":type"=>$type,
                 
                 ":p2Total"=>$act1Total,
                 ":p2act2"=>$act1,
                 ":p2act1"=>$act1,
                 ":p2change"=>($change *- 1),
                 ":type"=>$type,
                 
                 ":p2Total"=>$act2Total,
        
                 ));
}

?>