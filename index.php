<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-sacle=1.0">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">

<style type="text/css">

.card-wrapper{
	display: flex;
	align-content: center;
	align-items: center;
	flex-direction: column;
}
.card{
	width: 30rem;
	background-color: #ebeef8;
	display: flex;
	flex-direction: column;
	align-items: center;
	align-content: center;
	margin: 2rem 0;
	box-shadow: .5rem .5rem 3rem rgba(0,0,0,0.2);
}
.card .card-img{
	width: 100%;
	height: 26rem;
	object-fit: cover;
	clip-path: polygon(0 0, 100% 0, 100% 70%, 0% 100%);
}

.profile-img{
	width: 15rem;
	height: 15rem;
	object-fit: cover;
	border-radius: 50%;
	margin-top: -11rem;
	z-index: 999;
	border:1rem solid #ebeef8;
}

.card h1{
	font-size: 2.5rem;
	color: #333;
	margin:1.5rem 0;
}
.profileid{
	color: #777;
	font-size: 1.5rem;
	font-style: bold;
	text-transform: uppercase;
	font-weight: 300;
}
.about{
	font-size: 1.5rem;
	margin: 1.5rem 0;
		text-align: center;
	color:#333;
}
.card .btn{
	padding: 1rem 2.5rem;
	background-color: #445ae3;
	border-radius: 2rem;
	margin: 1rem 0;
	text-transform: uppercase;
	color: #eee;
	font-size: 1.4rem;
	transition: all .5s;
}
.card .btn:hover{
	transform: translateY(-2px);
	box-shadow: .5rem 2rem rgba(0,0,0.2);
}
.card .btn:active{
	transform: translateY(0);
	box-shadow: none;
}


@media screen and (min-width: 700px){
	.card-wrapper{
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
	}
	.card{
		margin: 2rem;
		transition: transform .5s;
	}

	.card:hover{
		transform: scale(1.05);
	}


	@keyframes fadeIn{
		from{
			opacity: 0;
		}
		to{
			opacity: 1;
		}
	}
		.card:nth-child(1){
			animation: fadeIn .5s .5s backwards;
		}
		.card:nth-child(2){
			animation: fadeIn .5s 1s backwards;
		}
		.card:nth-child(3){
			animation: fadeIn .5s 1.5s backwards;
		}
		.card:nth-child(4){
			animation: fadeIn .5s 2s backwards;
		}
		.card:nth-child(5){
			animation: fadeIn .5s 2.5s backwards;
		}
		.card:nth-child(6){
			animation: fadeIn .5s 3s backwards;
		}
	
}

tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
  background-color: #4CAF50;
  color: white;
}
table{ text-align: center; }

</style>

</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>

		<?php endif ?>
	</div>
			<div class="container">
				<div class="card-wrapper">
				
			<div class="card">
					<img src="Profilebackground.jpg" alt="card background" class="card-img">
					<img src="Profile_photo.png" alt="profile image" class="profile-img">
					<h1>Welcome</h1>
					<p class="profileid"><strong><?php echo $_SESSION['username']; ?></strong></p>
					<p class="about">
						This is login Page UI of profile view on any user.
					</p>
					<a href="index.php?logout='1'" class="btn" > logout</a>
					<br>
					<br>
				</div>
			</div>
			</div>

			</div>
			<div class="container" >
				<div class="card-wrapper">
				
			<div class="card">
				<div>
            
            <?php 
            $con = mysqli_connect('localhost','root');
   	mysqli_select_db($con,'registration');

              $query= "select *  from users ";
              $q=mysqli_query($con,$query);
              ?>
          

          <table align="center" class=" text-center table-hover" style="margin-bottom: 100px; margin-top: 100px; width: 400px; line-height: 40px;" border="3px">
            <tr>
              <th style="font-weight: bold; padding: 20px; background-color: #001a33; font-size: 28px; color: white; " colspan="2">Total User List</th>
            </tr>
            <tr>
              <th> Name </th>
              <th> Email ID </th>
            </tr>

            <?php
              while ($rows= mysqli_fetch_assoc($q)) {
                ?>

              <tr>
                <td><?php echo $rows['username']; ?></td>
                <td><?php echo $rows['email']; ?></td>
              </tr>

            <?php
            }
            ?>
          </table>
      </div>
					
				</div>
			</div>
			</div>
		
		
		
</body>
</html>