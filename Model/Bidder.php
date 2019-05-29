<?php
class Bidder{
private $conne;


	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conne = $db;
    }
	private $ticketNumber='string';
	private $name = 'string';
	private $phoneNumber='string';
	private $address='string';
	private $item='string';	
	
	private $bidder_fname='string';
	private $bidder_lname='string';
	private $bidder_email='string';
	private $productNumber='string';
	private $bidder_address='string';
	private $bidder_phoneNumber='string';
	
	public function addBidder($bidder_fname,$bidder_lname,$bidder_email,$productNumber,$bidder_address,$bidder_phoneNumber)
	{
	$requestQuery="INSERT INTO Bidder SET FirstName='$bidder_fname',LastName='$bidder_lname',Email='$bidder_email',BidId=$productNumber,Address='$bidder_address',PhoneNumber='$bidder_phoneNumber'";
				echo $requestQuery;
		$tableVendorQuery=$this->conne->exec($requestQuery);
		if($tableVendorQuery){
			$query = "SELECT BidId from Bidder Where PhoneNumber =".$bidder_phoneNumber;
			$tableVendorQuery=$this->conne->exec($query);
			return $tableVendorQuery;
		}
		
	}
	public function getTicketNumber(){
		$registrationQuery="SELECT TicketNumber FROM Bid";
		$tableVendorQuery=$this->conne->query($registrationQuery);
		$row = $tableVendorQuery->fetchAll();
		return $row;
	}
	public function getName($bidid){
		$registrationQuery="SELECT * FROM Bidder WHERE UserName='$bidid'";
		$tableVendorQuery=$this->conne->query($registrationQuery);
		$row = $tableVendorQuery->fetchAll();
		foreach($row as $vend) {
			$this->name= $vend['BidderFname']." ".$vend['BidderFname'];
   		}
		return $this->phoneNumber;
	}
	public function getPhoneNumber($bidid){
		$registrationQuery="SELECT * FROM Bidder WHERE UserName='$bidid'";
		$tableVendorQuery=$this->conne->query($registrationQuery);
		$row = $tableVendorQuery->fetchAll();
		foreach($row as $vend) {
			$this->phoneNumber= $vend['PhoneNumber'];
   		}
		return $this->phoneNumber;
	}
	public function getAddress($bidid){
		$registrationQuery="SELECT * FROM Bidder WHERE UserName='$bidid'";
		$tableVendorQuery=$this->conne->query($registrationQuery);
		$row = $tableVendorQuery->fetchAll();
		foreach($row as $vend) {
			$this->address= $vend['Address'];
   		}
		return $this->address;
	}
	public function getItem($bidid){
		$registrationQuery="SELECT * FROM Bid WHERE UserName='$bidid'";
		$tableVendorQuery=$this->conne->query($registrationQuery);
		$row = $tableVendorQuery->fetchAll();
		foreach($row as $vend) {
			$this->address= $vend['Address'];
   		}
		return $this->address;
	}
}
?>