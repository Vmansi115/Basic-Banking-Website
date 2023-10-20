<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BANKING SYSTEM</title>
    <link rel="stylesheet" href="style_customers.css">
  </head>
<body style= "background-color: whitesmoke;">
<div class="navbar">
<center>
  <hr color="grey" width=70% size=1>
  <h1> SECUREVAULT </h1>
  <a  href="index.php">Home</a>
  <a href="sendmoney.php">Transfer Money</a>
  <a class="active" href="customers.php">View All Customers</a>
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
<marquee> IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.</marquee>
<center>
<div class="contentbox" cellspacing="20px" cellpadding="20px">
<h1> ALL CUSTOMERS </h1>
<table class="customer" style="font-color: black">
<th> Name </th>
<th> Email </th>
<th> Account No </th>
<th> Balance </th>
</tr>
</div>
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
$sql="Select Name, Email, Account_no, Balance from customers";
$result= $con-> query($sql);
if ($result-> num_rows>0){
  while ($row = $result-> fetch_assoc()){
    echo "<tr><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Account_no"]."</td><td>".$row["Balance"]."</td></tr>";
  }
  echo "</table>";
}
else{
  echo "0 Result Found!";
}
$con->close();
?>
<div class="pagebreak">
</div>
<div style="width: 80%; color: #02080e; padding: 20px">
<h5>When a customer deposits money into the bank, this money is on loan to the bank and the bank’s most important obligation is to follow the customer’s instructions in relation to this money. The customer can withdraw money from the account at any point, and they can also stop payment of a cheque by informing the bank. If an overdraft agreement is in place, the bank must also give reasonable written notice of any decision to reduce overdraft credit.
</h5>
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
