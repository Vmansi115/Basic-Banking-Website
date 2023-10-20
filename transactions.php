<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BANKING SYSTEM</title>
    <link rel="stylesheet" href="style_transactions.css">
  </head>
  <body style="background-color: whitesmoke;">
  <div class="navbar">
  <center>
  <hr color="grey" width=70% size=1>
  <h1> SECUREVAULT</h1>
  <font style="monospace">
  <a  href="index.php">Home</a>
  <a href="sendmoney.php">Transfer Money</a>
  <a href="customers.php">View All Customers</a>
  <a class="active"  href="transactions.php">Transactions</a>
  <a href="contact.php">Contact Us</a>
  <a href="about.php">About Us</a>
  </font>
  <hr color="grey" width=70% size=1>
  </center>
  </div>
  <div class="container">
  <div class="header" > Welcome to Securevault! </div>
  <img src="https://graphicsfamily.com/wp-content/uploads/2020/05/3D-Logo-Mockup-4-scaled.jpg" height=80% width=20% 
  alt="Welcome to the Securevault!" style="padding: 5px; margin-right: 8vw; margin-top:1vh; float:right"> 
  </div>
  <marquee> IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.  IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.  IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.  IN BANKING OR FINANCE, TRUST IS THE ONLY THING YOU HAVE TO SELL.</marquee>
  <br>
  <div class="contentbox">
  <center>
  <h1> TRANSACTION HISTORY </h1>
  <center>
  <table class="customer">
  <tr>
  <th>ID</th>
  <th> SENDER'S ACCOUNT NO. </th>
  <th> SENDER'S NAME </th>
  <th> RECEIVER'S ACCOUNT NO. </th>
  <th> RECEIVER'S NAME </th>
  <th> AMOUNT TRANSFERRED </th>
  <th> SENDER'S BALANCE </th>
  <th> RECEIVER'S BALANCE </th>
  <th> TRANSACTION STATUS </th>
  <th> TIME </th>
  </tr>
  <?php
  $server="localhost";
  $username="root";
  $password="";
  $dbname="banking";
  $tablename="transactions";
  //create connections
  $con=mysqli_connect( $server, $username, $password, $dbname);
  //check for connection success
  if (!$con){
   die("Connection to this database failed due to ".mysqli_connect_error());
  }
  $sql="Select * from transactions";
  $result= $con-> query($sql);
  if ($result){
  while ($row = $result-> fetch_assoc()){
    echo "<tr><td>".$row["ID"]."</td><td>".$row["SENDERS_ACCOUNT_NO"]."</td><td>".$row["SENDERS_NAME"]."</td><td>".$row["RECEIVERS_ACCOUNT_NO"]."</td><td>".$row["RECEIVERS_NAME"]."</td><td>".$row["AMOUNT_TRANSFERRED"]."</td><td>".$row["SENDERS_BALANCE"]."</td><td>".$row["RECEIVERS_BALANCE"]."</td><td>".$row["TRANSACTION_STATUS"]."</td><td>".$row["TIME"]."</td></tr>";
  }
  echo "</table>";
  }
  else{
  echo "</table> <br>";
  echo "0 Result Found!";
  }
  $con->close();
  ?>
  </div>
  <br> <br><br> <br>
  <br><br><br> <br>
  <br> <br><br> <br>
  <center>
  <div class="pagebreak">
  </div>
  <div style="width: 80%; color: black; padding:  20px">
  <h4> Our vision is your safety</h4>
  </div>
  </center>
  <div class="footer">
 <center>
  <p>@ 2023 Copyright-Made by Mansi Verma, Intern at The Sparks Foundation.All rights reserved.</p>
  <a href= "terms.php"> Terms & Conditions</a>
  <a href ="privacy.php">Privacy Policy</a>
</center>
</div>
</body>
</html>
