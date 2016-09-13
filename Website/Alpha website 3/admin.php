<?php
session_start();
if (!isset($_SESSION['username']))
{
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chowers NPO</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">Chowers NPO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
			 <li>
				<a class="page-scroll" href="#addUser" data-toggle="modal">add user</a>
				<a class="page-scroll" href="#removeUser" data-toggle="modal">remove user</a>
			 </li>
			 <li>
				<a class="page-scroll" href="#addGroup" data-toggle="modal">add group</a>
				<a class="page-scroll" href="#removeGroup" data-toggle="modal">remove group</a>
			 </li>
			 <li>
				<a class="page-scroll" href="#addArticle" data-toggle="modal">add article</a>
				<a class="page-scroll" href="#removeArticle" data-toggle="modal">remove article</a>
			 </li>
			 <li>
				<a class="page-scroll" href="#addFile" data-toggle="modal">add file</a>
				<a class="page-scroll" href="#removeFile" data-toggle="modal">remove file</a>
			 </li>
			 <li>
				<a class="page-scroll" href="#addEvent" data-toggle="modal">add event</a>
				<a class="page-scroll" href="#removeEvent" data-toggle="modal">remove event</a>
			 </li>
			 <?php
				if (isset($_SESSION['username']))
				{
					echo "<li id=\"loginLink\"><a href=\"logout.php\">logout  ".$_SESSION['username']."</a></li>";
				}
				else
				{
					header('Location: index.php');
				}
			?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
		<div class="intro-heading">Chowers NPO</div>
                <div class="intro-lead-in">Administration Page</div>
                <a href="index.php" class="page-scroll btn btn-xl">Progress to the home page</a>
            </div>
        </div>
    </header>




    <!--  Modals -->
    
    <!-- Add user  -->
    <div class="portfolio-modal modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Add User</h2>
			    <p class="item-intro text-muted">Please enter new user details</p>
                                <form action="addUser.php" method="post">
				<p></p>
				<label>First Name:</label> <input type="text" name="fname" required pattern=".+" maxlength="50"><br>
				<label>Last Name:</label> <input type="text" name="surname" required pattern=".+" maxlength="50"><br>
				<label>Email:</label> <input type="text" name="email" required pattern=".+" maxlength="50"><br>
				<label>Password:</label> <input type="password" name="password" required pattern=".+" maxlength="50"><br>
				<label>User Type</label>
				<input type="radio" name="userType" value="regular" checked> Regular
				<input type="radio" name="userType" value="admin"> Admin<br>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Add User" > 
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
    <!-- Remove user  -->
    <div class="portfolio-modal modal fade" id="removeUser" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Remove User</h2>
			    <p class="item-intro text-muted">Please select user to remove</p>
                                <form action="removeUser.php" method="post">
				<p></p>
				<label>Remove user:</label>
				<?php
					$servername = "server29.000webhost.com";
					$dbUsername = "a7472183_user";
					$dbPassword = "Chowers1234";
					$db = "a7472183_db";

					$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
					if (!$conn) {
						//die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
						header('Location: admin.php');
					}
					else{
						//echo "Connected (db imy320) successfully"."<br><br>";
					}

					$sql = mysqli_query($conn,"SELECT * FROM users");
					
					if (!$sql) 
					{
						//die(mysqli_error($conn));
						header('Location: admin.php');
					}
					
					if(mysqli_num_rows($sql)>0)
					{
						echo '<select name="email">';
						while($row = mysqli_fetch_array($sql))
						{
							echo '<option value="'.$row['email'].'">'.substr($row["name"],0,1).".".$row['surname'].'</option>';
						}
						echo '</select>';
					}
					mysqli_close($conn);
				?>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Remove User" > 
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Add group-->
    <div class="portfolio-modal modal fade" id="addGroup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Add Group</h2>
			    <p class="item-intro text-muted">Please enter new group name</p>
                                <form action="addGroup.php" method="post">
				<p></p>
				<p></p>
				<label>Group Name:</label> <input type="text" name="goupName" required maxlength="50"><br>
				<label>Team manager:</label>
				<?php
					$servername = "server29.000webhost.com";
					$dbUsername = "a7472183_user";
					$dbPassword = "Chowers1234";
					$db = "a7472183_db";

					$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
					if (!$conn) {
						//die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
						header('Location: admin.php');
					}
					else{
						//echo "Connected (db imy320) successfully"."<br><br>";
					}

					$sql = mysqli_query($conn,"SELECT * FROM users");
					
					if (!$sql) 
					{
						//die(mysqli_error($conn));
						header('Location: admin.php');
					}
					
					if(mysqli_num_rows($sql)>0)
					{
						echo '<select name="manager">';
						while($row = mysqli_fetch_array($sql))
						{
							echo '<option value="'.$row['email'].'">'.substr($row["name"],0,1).".".$row['surname'].'</option>';
						}
						echo '</select>';
					}
					echo '<br><br>';
					mysqli_close($conn);
				?>
				<label>Members:</label><br>
				<?php
					$servername = "server29.000webhost.com";
					$dbUsername = "a7472183_user";
					$dbPassword = "Chowers1234";
					$db = "a7472183_db";

					$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
					if (!$conn) {
						//die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
						header('Location: admin.php');
					}
					else{
						//echo "Connected (db imy320) successfully"."<br><br>";
					}

					$sql = mysqli_query($conn,"SELECT * FROM users");
					
					if (!$sql) 
					{
						//die(mysqli_error($conn));
						header('Location: admin.php');
					}
					
					if(mysqli_num_rows($sql)>0)
					{
						while($row = mysqli_fetch_array($sql))
						{
							echo '<label>'.substr($row["name"],0,1).".".$row['surname'].'</label><input type="checkbox" id="check" name="members[]" value="'.$row['email'].'">'.'<br>';
						}
					}
					mysqli_close($conn);
				?>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Add Group" > 
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
       <!-- Remove group-->
    <div class="portfolio-modal modal fade" id="removeGroup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Remove Group</h2>
			    <p class="item-intro text-muted">Please enter new group name</p>
                                <form action="removeGroup.php" method="post">
				<label>Remove group:</label>
				<?php
					$servername = "server29.000webhost.com";
					$dbUsername = "a7472183_user";
					$dbPassword = "Chowers1234";
					$db = "a7472183_db";

					$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
					if (!$conn) {
						//die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
						header('Location: admin.php');
					}
					else{
						//echo "Connected (db imy320) successfully"."<br><br>";
					}

					$sql = mysqli_query($conn,"SELECT * FROM groups");
					
					if (!$sql) 
					{
						//die(mysqli_error($conn));
						header('Location: admin.php');
					}
					
					if(mysqli_num_rows($sql)>0)
					{
						echo '<select name="group">';
						while($row = mysqli_fetch_array($sql))
						{
							echo '<option value="'.$row['groupName'].'">'.$row['groupName'].'</option>';
						}
						echo '</select>';
					}
					mysqli_close($conn);
				?>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Remove Group" > 
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Add article-->
    <div class="portfolio-modal modal fade" id="addArticle" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Add Article</h2>
			    <p class="item-intro text-muted">Please enter article details</p>
                                <form action="addArticle.php" method="post">
				<p></p>
				<p></p>
				<label>Name:</label> <input type="text" name="name" required maxlength="50"><br>
				<label>Headline:</label> <input type="text" name="headline" required  maxlength="50"><br>
				<p></p>
				<label>Article:</label><br>
				<textarea rows="6" cols="60" id="textarea"name="article" ></textarea>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Add Article" > 
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
        <!-- Remove article-->
    <div class="portfolio-modal modal fade" id="removeArticle" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Remove Article</h2>
			    <p class="item-intro text-muted">Please enter article details</p>
                                <form action="removeArticle.php" method="post">
				<label>Remove article:</label>
				<?php
					$servername = "server29.000webhost.com";
					$dbUsername = "a7472183_user";
					$dbPassword = "Chowers1234";
					$db = "a7472183_db";

					$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
					if (!$conn) {
						//die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
						header('Location: admin.php');
					}
					else{
						//echo "Connected (db imy320) successfully"."<br><br>";
					}

					$sql = mysqli_query($conn,"SELECT * FROM articles");
					
					if (!$sql) 
					{
						//die(mysqli_error($conn));
						header('Location: admin.php');
					}
					
					if(mysqli_num_rows($sql)>0)
					{
						echo '<select name="article">';
						while($row = mysqli_fetch_array($sql))
						{
							echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
						}
						echo '</select>';
					}
					mysqli_close($conn);
				?>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Remove Article" >
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <!-- add file-->
    <div class="portfolio-modal modal fade" id="addFile" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Add File</h2>
			    <p class="item-intro text-muted">Please enter file details</p>
                                <form action="#" method="post">
				<p></p>
				<label>File Name:</label> <input type="text" name="fileName" required maxlength="50"><br>
				<label>Description:</label> <input type="text" name="description" required maxlength="50"><br>
				<p></p>
				<!--<label>Select File:</label>--><center><input type="file" name="file" required><br></center>
				
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Add File" >  
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <!-- Remove file-->
    <div class="portfolio-modal modal fade" id="removeFile" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Remove File</h2>
			    <p class="item-intro text-muted">Please enter file details</p>
                                <form action="#" method="post">
				<label>Remove file:</label>
				<?php
					$servername = "server29.000webhost.com";
					$dbUsername = "a7472183_user";
					$dbPassword = "Chowers1234";
					$db = "a7472183_db";

					$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
					if (!$conn) {
						//die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
						header('Location: admin.php');
					}
					else{
						//echo "Connected (db imy320) successfully"."<br><br>";
					}

					$sql = mysqli_query($conn,"SELECT * FROM users");
					
					if (!$sql) 
					{
						//die(mysqli_error($conn));
						header('Location: admin.php');
					}
					
					if(mysqli_num_rows($sql)>0)
					{
						echo '<select name="email">';
						while($row = mysqli_fetch_array($sql))
						{
							echo '<option value="'.$row['email'].'">'.$row['name']." ".$row['surname'].'</option>';
						}
						echo '</select>';
					}
					mysqli_close($conn);
				?>
				<p></p>
				<input class="btn btn-primary" id="login2" type="submit" value="Remove File" >
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <!-- Add event-->
    <div class="portfolio-modal modal fade" id="addEvent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Add event</h2>
			    <p class="item-intro text-muted">Please head over to the NPO's email by clicking on the below link</p>
                                <form action="#" method="post">
				<p></p>
				<a href="https://mail.google.com"><input class="btn btn-primary" id="login2" value="Add Event" ><a>  
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <!-- Remove event-->
    <div class="portfolio-modal modal fade" id="removeEvent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Remove event</h2>
			    <p class="item-intro text-muted">Please head over to the NPO's email by clicking on the below link</p>
                                <form action="#" method="post">
				<p></p>
				<a href="https://mail.google.com"><input class="btn btn-primary" id="login2" value="Remove Event" ><a>  
			   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
