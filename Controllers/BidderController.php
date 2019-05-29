<?php
include("FormController.php");
$form = new FormController();
$pname = $_SESSION['pname'];
echo '
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="../HTML/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../HTML/assets/css/styles.css">
    <link rel="stylesheet" href="../HTML/assets/css/Pretty-Registration-Form.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Brand</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="active" role="presentation"><a href="#">Home </a></li>
                    <li role="presentation"><a href="#">Log in</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Sign up<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#">First Item</a></li>
                            <li role="presentation"><a href="#">Second Item</a></li>
                            <li role="presentation"><a href="#">Third Item</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="../PHP/BidderController.php?pname='.$pname.'>
                <h1>Bidder Form</h1>
                <div class="form-group" >
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">First Name</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_firstname">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Last Name</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_lastname">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Address </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_address">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">phone number</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="input_phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" name="input_email">
                    </div>
                </div>
                <input class="btn btn-default submit-button" value="Submit Form" type="submit">
            </form>
        </div>
    </div>
    <script src="../HTML/assets/js/jquery.min.js"></script>
    <script src="../HTML/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>';

?>