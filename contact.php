<!DOCTYPE html>
<html lang="en">
<head>
	<title>Medical Apps</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66387154-1', 'auto');
  ga('send', 'pageview');

</script>

<?php 
    //set validation error flag as false
    $error = false;
    //check if form is submitted
    if (isset($_POST['submit']))
    {
        $name = trim($_POST['txt_name']);
        $fromemail = trim($_POST['txt_email']);
        $message = trim($_POST['txt_msg']);

        //name can contain only alpha characters and space
        if (!preg_match("/^[a-zA-Z ]+$/",$name))
        {
            $error = true;
            $name_error = "Please enter valid name";
        }
        if(!filter_var($fromemail,FILTER_VALIDATE_EMAIL))
        {
            $error = true;
            $fromemail_error = "Please enter valid email address";
        }
        if(empty($message))
        {
            $error = true;
            $message_error = "Please enter your message";
        }
        if (!$error)
        {
            //send mail
            $toemail = "***EMAILADDRESS***";
            $subject = "Enquiry from Visitor " . $name;
            $body = "Here goes your Message Details: \n\n Name: $name \n From: $fromemail \n Message: \n $message";
            $headers = "From: $fromemail\n";
            $headers .= "Reply-To: $fromemail";

            if (mail ($toemail, $subject, $body, $headers))
                $alertmsg  = '<div class="alert alert-success text-center">Message sent successfully.  We will get back to you shortly!</div>';
            else
                $alertmsg = '<div class="alert alert-danger text-center">There is error in sending mail.  Please try again later.</div>';
        }
    }
?>

	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">medical apps</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">home</a></li>
						<li><a href="anaesthesiaexams.html">anaesthesia exams</a></li>
						<li><a href="clinicalexam.html">clinical exam</a></li>
						<li class="active"><a href="#">contact us<span class="sr-only">(current)</span></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-s-12 col-sm-9">

				<h1>Contact Us</h1>
	            <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contactform">
	            <fieldset>

	                <div class="form-group">
	                    <div class="col-md-12">
	                        <label for="txt_name" class="control-label">Name</label>
	                    </div>
	                    <div class="col-md-9">
	                        <input class="form-control" name="txt_name" placeholder="name" type="text" value="<?php if($error) echo $name; ?>" />
	                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-md-12">
	                        <label for="txt_email" class="control-label">Email Address</label>
	                    </div>
	                    <div class="col-md-9">
	                        <input class="form-control" name="txt_email" placeholder="email address" type="text" value="<?php if($error) echo $fromemail; ?>" />
	                        <span class="text-danger"><?php if (isset($fromemail_error)) echo $fromemail_error; ?></span> 
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-md-12">
	                        <label for="txt_msg" class="control-label">Message</label>
	                    </div>
	                    <div class="col-md-9">
	                        <textarea class="form-control" name="txt_msg" rows="4" placeholder="your message"><?php if($error) echo $message; ?></textarea>
	                        <span class="text-danger"><?php if (isset($message_error)) echo $message_error; ?></span>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-md-12">
	                        <input name="submit" type="submit" class="btn btn-primary" value="Send" />
	                    </div>
	                </div>
	            </fieldset>
	            </form>
	            <?php if (isset($alertmsg)) { echo $alertmsg; } ?>
			</div>

			<div class="col-xs-12 col-s-12 col-sm-3 sidebar-offcanvas" id="sidebar" >
				<p>&nbsp;</p>
				<div align="left">
		            <a class="twitter-timeline" data-dnt="true" data-tweet-limit="3" href="https://twitter.com/Dr_Dokes" data-widget-id="632848279764643840">Tweets by @Dr_Dokes</a>
		            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div><!--/.sidebar-offcanvas-->
		</div>

		<hr>
		<div style="font-size: 10px">
			Copyright (c) 2015 Medical Apps Ltd. Company Registered in England & Wales No. 06957271. All rights reserved.
		</div>

	</div>
</body>
</html>