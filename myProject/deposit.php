

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php 
function transaction($act1, $act2, $change, $type){
         require("config.php");
         $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
         $db = new PDO($conn_string, $username, $password);
         $select_query = "select SUM(amount) as Total from Transations where account_source = :account";
         $db->prepare($select_query);
         $stmt->execute(array(:account=>$act1));
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $act1Total = $result["Total"];
         $act1Total += $change; // expected total
         
         $select_query = "select SUM(amount) as Total from Transations where account_source = :account";
         $db->prepare($select_query);
         $stmt->execute(array(:account=>$act2));
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $act2Tatal = $result["Total"];
         $act2Total += ($change * -1); // expected total
         
         $insert = "INSERT INTO Transactions (account_source, account_dest, amount, type, Total) 
         VAlUES(:p1act1, :p1act2, :p1change, :type, :act1Total),(:p2act2,   :p1act1, :p2change, :type, :act2Total)";
                 
         $db->prepare($insert);
       /* $result = $stmt->execute(array(
                       ":p1act1"=>$act1,
                       ":p1act2"=>$act2,
                       ":p1change"=>$change,
                       ":p1type"=>$type,
                       
                       ":p1Total"=>$act1Total,
                       ":p2act2"=>$act1,
                       ":p2act1"=>$act1,
                       ":p2change"=>($change *- 1),
                       ":p2type"=>$type,
                       
                       ":p2Total"=>$act2Total,
                
                     ));   */  
                     
        // $stmt = $db->prepare($query);
         $stmt->bindValue(":p1a1", $act1);
         $stmt->bindValue(":p1a2", $act2);
         $stmt->bindValue(":p1change", $change);
         $stmt->bindValue(":type", $type);
         $stmt->bindValue(":act1total", $act1Total);
         	//flip data for other half of transaction
         $stmt->bindValue(":p2act1", $act2);
         $stmt->bindValue(":p2act2", $act1);
         $stmt->bindValue(":p2change", ($change * -1));
         $stmt->bindValue(":type", $type);
         $stmt->bindValue(":act2Total", $act2otal);
         $result = $stmt->execute();
         echo var_export($result, true);
         echo var_export($stmt->errorInfo(), true);
         return $result;
 }

?> 

<html>
<head>
</head>
<body>
<form method="POST">
	<input type="text" name="account1" placeholder="Account Number">
	<!-- If our sample is a transfer show other account field-->
	<?php if($_GET['type'] == 'transfer') : ?>
	<input type="text" name="account2" placeholder="Other Account Number">
	<?php endif; ?>
	<input type="number" name="amount" placeholder="$0.00"/>
	<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
	<!--Based on sample type change the submit button display-->
	<input type="submit" value="Move Money"/>
</form>
</body>
</html>

<?php 
if(isset($_POST['type']) && isset($_POST['account1']) && isset($_POST['amount'])){
    $type = $_POST['type'];
    $amount = (int)$_POST['amount'];
    switch($type){
          case 'deposit':
                  transaction("000000000000", $_POST['account1'], ($amount * -1), $type);
                  break;
          case 'withdraw':
                  transaction("000000000000", $_POST['account1'], ($amount * -1), $type);
                  break;
          case 'transfer':
                  transaction($_POST['account1'], $_POST['account1'], ($amount * -1), $type);
                  break;
    }
}

?>