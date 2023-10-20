<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BANKING SYSTEM</title>
    <link rel="stylesheet" href="style_sendmoney.css">
  </head>
  <body style="background-color: whitesmoke;">
  <div class="navbar">
  <center>
  <hr color="grey" width=70% size=1>
  <h1> SECUREVAULT </h1>
  <a href="index.php">Home</a>
  <a class="active" href="sendmoney.php">Transfer Money</a>
  <a href="customers.php">View All Customers</a>
  <a href="transactions.php">Transactions</a>
  <a href="contact.php">Contact Us</a>
  <a href="about.php">About Us</a>
  <hr color="grey" width=70% size=1>
  </center> 
  </div>
  <div class="container">
  <div class="header" > Welcome to Securevault! </div>
  <img src="https://graphicsfamily.com/wp-content/uploads/2020/05/3D-Logo-Mockup-4-scaled.jpg" height=80% width=20% 
  alt="Welcome to the Securevault!" style="padding: 5px; margin-right: 8vw; margin-top:1vh; float:right"> 
  </div>
  <marquee> IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.  IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.  IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.  IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.</marquee>
  <center>
  <div class="contentbox">
  <h1> TRANSFER MONEY </h1>
  <div class="subcontent">
  <form action="sendmoney.php" method="POST">    
    <h3> Sender Account </h3>
    <?php
    $server="localhost";
    $username="root";
    $password="";
    $dbname="banking";
    //create connections
    $con=mysqli_connect( $server, $username, $password, $dbname);
    //check for connection success
    if (!$con){
     die("Connection to this database failed due to ".mysqli_connect_error());
    }
    echo "<select id='sender' name='sender'>";
    echo "<option value='disabled selected hidden'>Choose the sender</option>";
    $sql1="Select Name, Account_No from Customers";
    $result= $con->query($sql1);
    if ($result){
      while ($row = $result->fetch_assoc()){
        echo "<option value=".$row["Account_No"].">".$row["Name"]."<p> &nbsp; &nbsp;</p>". $row["Account_No"]."</option>";
      }
    }
    echo "</select>";
    echo "<br> <br> <h3> Receiver Account </h3>";
    echo "<select id='receiver' name='receiver'>";
    echo "<option value='' disabled selected hidden>Choose the receiver</option>";
    $result= $con-> query($sql1);
    if ($result){
      while ($row = $result-> fetch_assoc()){
        echo "<option value=".$row["Account_No"].">".$row["Name"]."<p> &nbsp; &nbsp;</p>". $row["Account_No"]."</option>";
      }
    }
    echo "</select>";
    $con->close();
    ?>
    <br><br>
    <h3> Amount </h3><input class='input' type="text" name="amount" id="amount" placeholder="Enter the amount"><br>
    <br>
        <button class="button" value="submit"> Send Money</button>
    <br> <br>
    </form>
      <?php
    if (isset($_POST['sender'])){
    $server="localhost";
    $username="root";
    $password="";
    $dbname="banking";
    $tablename="Customers";
    $tablename="transactions";
    $con=mysqli_connect( $server, $username, $password, $dbname);
    if (!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
    $sender=$_POST['sender'];
    $receiver=$_POST['receiver'];
    $amount=$_POST['amount'];
    $sql1 = "SELECT Name, Balance FROM customers WHERE Account_no=$sender"; 
    $sql2 = "SELECT Name, Balance FROM customers WHERE Account_no=$receiver";
    //query to select the amounts from the database for R and S
    $res1= $con-> query($sql1);
    $res2= $con-> query($sql2);
    $sender_bal=$receiver_bal=$sender_name=$receiver_name=0;
    while($row = $res1-> fetch_assoc()){
      $sender_bal=$row['Balance'];
      $sender_name=$row['Name'];
    }
    while($row=$res2-> fetch_assoc()){
      $receiver_bal=$row['Balance'];
      $receiver_name=$row['Name'];
    }
    if($sender_bal>=$amount){
      //calculate final balance
      $receiver_bal=$receiver_bal+$amount;
      $sender_bal=$sender_bal-$amount;
      $update1="UPDATE customers SET Balance=$receiver_bal WHERE Account_no=$receiver";
      $update2="UPDATE customers SET Balance=$sender_bal WHERE Account_no=$sender";
      $updatebal_rec=$con-> query($update1);
      $updatebal_sender=$con-> query($update2);
    $sql = "SELECT * FROM transactions";
      if ($updatebal_sender==true && $updatebal_rec==true){
          echo "<h3 style='color: green'> Transaction Successful! </h3>";
          $status="Transaction Successful";
          //add into records when transaction is successful
          $query_rec="INSERT INTO transactions(ID,SENDERS_ACCOUNT_NO, SENDERS_NAME, RECEIVERS_ACCOUNT_NO, RECEIVERS_NAME, AMOUNT_TRANSFERRED, SENDERS_BALANCE, RECEIVERS_BALANCE,TRANSACTION_STATUS) VALUES('$sender','$sender', '$sender_name', '$receiver', '$receiver_name','$amount', '$sender_bal', '$receiver_bal', '$status')";
          if ($con->query($query_rec)==true){
            //echo "Successfully Inserted";
            $insert=true;
        }
        else{
            echo "ERROR : $sql <br> $con->error";
        }
      }
      else{
        echo "<h3 style='color: brown'> ERROR! Invalid Account Number  </h3>";
        echo "ERROR : $sql <br> $con->error";
    }
    }
    if ($amount>$sender_bal){
      //also add the transaction of failed transactions
      $status="Transaction Failed";
      $query_rec="INSERT INTO transactions(ID,SENDERS_ACCOUNT_NO, SENDERS_NAME, RECEIVERS_ACCOUNT_NO, RECEIVERS_NAME, AMOUNT_TRANSFERRED, SENDERS_BALANCE, RECEIVERS_BALANCE,TRANSACTION_STATUS) VALUES('$sender','$sender', '$sender_name', '$receiver', '$receiver_name','$amount', '$sender_bal', '$receiver_bal', '$status')";
        if ($con->query($query_rec)==true){
          $insert=true;
      }
      else{
            echo "ERROR : $sql <br> $con->error";
      }
      echo "<h3 style='color: red'> Transaction Failed! Insufficient Balance in Sender's Account </h3>";
    }
    $con->close();
    }
    ?>
  </div>
</div>
<div class="pagebreak">
</div>
<div style="width: 80%; color:black; padding: 20px">
<h4><marquee>Please do not refresh the page in the middle of the transaction.Please do not refresh the page in the middle of the transaction.</marquee></h4>
</div>
<div class="footer">
 <center>
  <p>@ 2023 Copyright-Made by Mansi Verma, Intern at The Sparks Foundation.All rights reserved.</p>
  <a href= "terms.php"> Terms & Conditions</a>
  <a href ="privacy.php">Privacy Policy</a>
</center>
</div>
</body>
</html>  
