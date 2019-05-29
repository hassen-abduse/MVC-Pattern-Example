<?php
include("Bid.php");
include("Bidder.php");
include("CategoryController.php");

$form = new FormController();
if(isset($_GET["type"])){
if($_GET["type"]=="view"){
	$form->getRequestInfo();
}
else if($_GET["type"]=="viewWinner"){
	$form->notifyWinner();
}
else if($_GET["type"]=="login"){
    include("../HTML/header_homepage.html");
    $form->getLoginForm();
}
else if($_GET["type"]=="sendrequire"){
    $form->getRequirementForm();
}
else if($_GET["type"]=="sendrequest"){
    $form->getRequestForm();
}
else if($_GET["type"]=="signup"){
    $form->getSignUpForm();
}
else if($_GET["type"]=="approveForm"){
    $form->getBid();
}
else if($_GET["type"]=="approveBid"){
    echo $_GET["TicketNumber"];
    $form->approveBid($_GET["TicketNumber"]);
}
else if($_GET["type"]=="bidForm"){
    $form->getBidForm();
}
else if($_GET["type"]=="bidd"){
    $form->addBid($_GET["pname"]);
}
else if($_GET["type"]=="ticketform"){
        $form->getTicketNumberForm();
}
else if($_GET["type"]=="ticketSub"){
        $form->CheckTicket($_POST["TicketNum"]);
}
}
class FormController{
     public function CheckTicket($TicketN){
                    $item = new FormController();
                    $bidder = new Bidder();
                    $row = $bidder->getTicketNumber();
                    foreach ($row as $r) {
                        if($TicketN==$r["TicketNumber"]){
                            $item->displayBidderOptions($TicketN);
                            break;
                        }
                        else{
                          
                        }
                    }

            }
             public function displayBidderOptions($TicketN){
                $it = new Bid();
                $bidRow = $it->getBid($TicketN);
                   $bid = new Bid();
        if(empty($bidRow)){
            echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
     include("../HTML/header_homepage.html");
     echo "<style>
        p{
            margin-left:40%;
            font-size:40px;
        }
        </style>";
     echo "<p>No pending Bids!</p>";

        }
        else{
                 echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
     include("../HTML/header_homepage.html");
     echo '
        <div>
         <table class="table">
            <thead>
                <tr>
                    <th>TicketNumber</th>
                    <th>Price </th>
                    <th>Status </th>
                    <th>Reciept</th>
                    <th>Bid date</th>
                    <th>ProductNumber</th>
                </tr>
            </thead>';
         foreach($bidRow as $request){
            echo '
            <tbody>
                <tr>
                    <td>'.$request["TicketNumber"].'</td>
                    <td>'.$request["Price"].'</td>
                    <td>'.$request["Status"].'</td>
                    <td>'.$request["Reciept"].'</td>
                    <td>'.$request["BidDate"].'</td>
                    <td>'.$request["ProductNumber"].'</td>
                    
                </tr>';
               
            '</tbody>
        </table>
        </div>';
            }
            echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
        }
    }
    public function getTicketNumberForm(){
        echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
     include("../HTML/header_homepage.html");
         echo '
                <div class="login-card"><img src="assets/img/avatar_2x.png" class="profile-img-card">
        <p class="profile-name-card"> </p>
        <form class="form-signin" method="post" action="FormController.php?type=ticketSub"><span class="reauth-email"> </span>
            <input class="form-control input-lg" type="number" required="" placeholder="Ticket Number" autofocus="" id="inputEmail"
            name="TicketNum">
            <div class="checkbox"></div>
            <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="Submit" name="TicketButton">
        </form>
    </div>';
    echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");

    }
    public function getRequestInfo(){
    	$bid = new Bid();
    	$result = $bid->getRequestInfo();
         include("../HTML/Vendor.html");
            echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';

    	foreach ($result as $r) {
                		echo '
    	<div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Number</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.$r["ProductName"].'</td>
                     <td>'.$r["Status"].'</td>
                                      </tr>
            </tbody>
        </table>
    </div>';
    echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
    	}
    	
    }
    public function addBiddr($productNumber){
        $bidder = new Bidder();
        $bidder_fname = $_POST["input_firstname"];
        $bidder_lname = $_POST["input_lastname"];
        $bidder_email = $_POST["input_email"];
        $bidder_address= $_POST["input_address"];
        $bidder_phoneNumber = $_POST["input_phone"];
        $productNumber = $productNumber;
        echo $productNumber;
        $r = $bidder->addBidder($bidder_fname,$bidder_lname,$bidder_email,$productNumber,$bidder_address,$bidder_phoneNumber);
        if($r){
            echo "Successfully Submitted";
        }

    }
    public function addBid($productName){
        $item =new Item();
        $productNumber=0;
        $row = $item->getProductNumber($productName);
        print_r($row);
        foreach ($row as $r) {
            $productNumber = $r["ProductNumber"];
        }
        $form = new FormController();
        $bid = new Bid();
        $bidder= new FormController();
        $bidder_fname = $_POST["input_price"];
        $reciept = $form->upload_image($_FILES["reciept_image"]["name"]);
        $bidDate = "20".Date("y-m-d");
        echo $bidDate;
        echo $productNumber;
        $r = $bid->addBid($bidder_fname,"pending",$reciept,$bidDate,$productNumber);
        $re = $bidder->addBiddr($productNumber);
        print_r($re);
        if($r){
            echo "Successfully Submitted";
        }

    }
     public function upload_image($name){
            $target_dir = "uploads/";
            $target_file = $target_dir.basename($name);
            $upload_ok = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));           
            if(move_uploaded_file($_FILES["reciept_image"]["tmp_name"], $target_file)){
                echo basename($_FILES["reciept_image"]["name"])."File has been uploaded";
                return $target_file;
            } 
            }
             public function getBidForm(){
        
        include("../HTML/header_homepage.html");
        echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
        echo'
       <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="FormController.php?type=bidd&pname='.$_SESSION['pname'].'" enctype="multipart/form-data" onsubmit = "return validateForm()">
                <h1>Bidder Form</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">First Name</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" id = "fname" name="input_firstname">
                        <p id = "error_msg_fname" style="color:red"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Last Name</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" id = "lname" name="input_lastname">
                        <p id = "error_msg_lname" style="color:red"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Address </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" id = "addr" name="input_address">
                        <p id = "error_msg_addr" style="color:red"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Price </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type = "number" id = "price" name="input_price">
                        <p id = "error_msg_price" style="color:red"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">phone number</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="phone" id = "phone" name="input_phone">
                        <p id = "error_msg_phone" style="color:red"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Email </label>
                        
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" id = "email" name="input_email">
                        <p id = "error_msg_email" style="color:red"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Reciept </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input type="file" name="reciept_image">
                </div>
                <div>
                     <p id = "error_msg" style="color:red"></p>
                </div>
                <div>
                <input class="btn btn-default submit-button" type="submit" id = "submit_button"></input>
                </div>
            </form>
        </div>
    </div>';
    echo ' <script src="../HTML/assets/js/jquery.min.js"></script>
    <script src="../HTML/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src = "../HTML/assets/js/bidderRegistration.js"></script> ';
    echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
    }
    public function getLoginForm(){
        echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
        echo'
        <div class="login-card"><img src="../HTML/assets/img/avatar_2x.png" class="profile-img-card">
        <p class="profile-name-card"> </p>
        <form class="form-signin" method="post" action="AccountController.php"><span class="reauth-email" > </span>
            <input class="form-control input-lg" type="text" required="" placeholder="Username" autofocus="" id="inputEmail" name="input_username">
            <input class="form-control input-lg" type="password" required="" placeholder="Password" id="inputPassword" name="input_password">
            <div class="checkbox"></div>
            <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="LoginButton" value="Signin">
         <div class="checkbox">
                <label>
                    <input type="checkbox" name="role" value="Vendor">Vendor</label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="role" value="Admin">Admin</label>
            </div>
        </form>
    </div>
    ';
    echo ' <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>';
echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
    }
    public function getRequirementForm(){
        
        include("../HTML/Vendor.html");
        echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
        echo'
        <form class="bootstrap-form-with-validation" action="../PHP/VendorController.php" method="POST" enctype="multipart/form-data">
        <h2 class="text-center">Requirement Form</h2>
        <div class="form-group has-warning">
            <label class="control-label" for="file-input">Requirement </label>
            <input type="file" name="requirement">
        </div>
        <div class="form-group has-warning">
            <label class="control-label" for="file-input">Reciept </label>
            <input type="file" name="reciept">
        </div>
        <div class="form-group has-warning">
            <input class="btn btn-primary" type="submit" name="ReqSubmit" value="Submit">
        </div>
    </form>';
    echo ' <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>';
    echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
    }
   
     public function getRequestForm(){
        $cat = new CategoryController();
        $CategoryRow = $cat->getCategory();
        include("../HTML/Vendor.html");
        echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
        echo'
        <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="../PHP/VendorController.php" enctype="multipart/form-data">
                <h1>Request Form</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Product Name</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Initial Price</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="number" name="input_price">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Description </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_desctiption">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">ManufacturingDate</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text"  name="input_manufacture">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="dropdown-input-field">Category </label>
                    </div>
                    <div class="col-sm-4 input-column">
                        <select name="Categories">
        <optgroup>';
        foreach ($CategoryRow as $c) {
            echo'
            <option value='.$c['Name'].'selected="">'.$c['Name'].'</option>';
            }
         echo  ' 
        </optgroup>
    </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Start Date</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_start">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Deadline </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_deadline">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Image </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input type="file" name="my_image">
                    </div>
                </div>
                <input class="btn btn-default submit-button" type="submit" value="Submit Form" name="RequestSubmit">
            </form>
        </div>
    </div>';
    echo ' <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>';
    echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
    }
    public function notifyWinner(){
    	$bid = new Bid();
    	$result = $bid->getWinner();
    	foreach ($result as $r) {
            include("../HTML/Vendor.html");
            echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
    		echo '
    	<div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Ticket Number</th>
                    <th>Product Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.$r["TicketNumber"].'</td>
                     <td>'.$r["ProductNumber"].'</td>
                      <td>'.$r["Status"].'</td>
                </tr>
            </tbody>
        </table>
    </div>';
    echo'<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
include("../HTML/header2.html");
    	}
    }
    public function validateBidForm(){

    }
    public function viewBids(){
        $bid = new Bid();
        $row = $bid->viewBid();
        echo ' <div class="row">';
        foreach ($row as $r) {

            /*echo
            '
            <div class="row product">
        <div class="col-md-5 col-md-offset-0"><img class="img-responsive" src="'.$r['Image'].'" width="300px" height="300px"></div>
        <div class="col-md-7">
            <h2>'.$r['ProductName'].'</h2>
            <p>'.$r['Description'].' </p>
            <h3>'.$r['InitialPrice'].' birr. </h3>
            <a class="btn btn-primary" href="BidderController.php?pname='.$r['ProductName'].'">Bid </a>
        </div>
    </div>';*/
     echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
    echo '
        <div class="col-md-3">
            <div class="thumbnail"><img class="img-responsive" src="'.$r['Image'].'" width="100px" height="100px">
                <div class="caption">
                    <h3>Product name:'.$r['ProductName'].'</h3>
                    <p>Description:'.$r['Description'].'</p>
                    <p>Initial price:'.$r['InitialPrice'].' birr.</p>
                    <p>Start date:'.$r['StartDate'].'</p>
                    <p>Deadline:'.$r['Deadline'].'</p>
                </div>
            </div>
            <a class="btn btn-default" href="FormController.php?type=bidForm"><strong>Bid</strong></a>
        </div>
        ';
    $_SESSION['pname'] = $r['ProductName'];
        }
    echo '</div>';
    

    }
    public function getSignUpForm(){
        include("../HTML/header_homepage.html");
            echo '<link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">';
           include("../HTML/Signup.html");

            
    }
    public function getBid(){
            $bid = new Bid();
        $pendingRequests = $bid->getPendingBid();
        if(empty($pendingRequests)){
            echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
     include("../HTML/Auctioneer.html");
     echo "<style>
        p{
            margin-left:40%;
            font-size:40px;
        }
        </style>";
     echo "<p>No pending Bids!</p>";

        }
        else{
                 echo ' <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
        <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
     <link rel="stylesheet" href="../HTML/assets/css/Google-Style-Login.css">';
     include("../HTML/Auctioneer.html");
     echo '
        <div>
         <table class="table">
            <thead>
                <tr>
                    <th>TicketNumber</th>
                    <th>Price </th>
                    <th>Status </th>
                    <th>Reciept</th>
                    <th>Bid date</th>
                    <th>ProductNumber</th>
                </tr>
            </thead>';
         foreach($pendingRequests as $request){
            echo '
            <tbody>
                <tr>
                    <td>'.$request["TicketNumber"].'</td>
                    <td>'.$request["Price"].'</td>
                    <td>'.$request["Status"].'</td>
                    <td>'.$request["Reciept"].'</td>
                    <td>'.$request["BidDate"].'</td>
                    <td>'.$request["ProductNumber"].'</td>
                    <td><a href="FormController.php?type=approveBid&TicketNumber='.$request["TicketNumber"].'">Approve</a></td>
                </tr>';
               
            '</tbody>
        </table>
        </div>';
    }
}
}
public function approveBid($tn){
        $bid = new Bid();
        $isApproved = $bid->setStatus($tn);
        echo $isApproved;
        }
}
	
?>
	
	