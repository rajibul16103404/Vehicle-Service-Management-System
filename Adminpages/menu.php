<?php
session_start();
	if($_SESSION['adminname'])
	{
?>


<!DOCTYPE html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="CSS/menu.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="path/to/line-awesome/css/line-awesome-font-awesome.min.css">
</head>
<body>
	<div class="navigation">
		<div class="user">
			<span>Welcome</span>
			<h3><?php echo $_SESSION['adminname']; ?></h3>
		</div>
		<ul>
			<li class="list active">
				<a href="menu.php?page=home">
					<span class="icon"></span>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=users">
					<span class="icon"></span>
					<span class="title">Users</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=mechanic">
					<span class="icon"></span>
					<span class="title">Mechanic</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=pickup">
					<span class="icon"></span>
					<span class="title">PickUp-Delivery</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=request">
					<span class="icon"></span>
					<span class="title">Request</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=feedback">
					<span class="icon"></span>
					<span class="title">Feedback</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=servicing">
					<span class="icon"></span>
					<span class="title">Servicing</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=Report">
					<span class="icon"></span>
					<span class="title">Report</span>
				</a>
			</li>
			<li class="list">
				<a href="menu.php?page=logout">
					<span class="icon"></span>
					<span class="title">Log Out</span>
				</a>
			</li>
			
		</ul>

	</div>

						<div class="inner">
                            <?php
                                $p=$_GET['page'];
                            
                                $page=$p.".php";

                                if(file_exists($page))
                                {
                                    include($page);
                                }
                                elseif($p=="")
                                {
                                   echo "Page Not Found";
                                }
                                else
                                {
                                    echo "What are you looking for?";
                                }

                            ?>
                        </div>


	<script>
		let list = document.querySelectorAll('.list');
		for(let i=0; i<list.length; i++)
		{
			list[i].onclick = function()
			{
				let j = 0;
				while(j<list.length)
				{
					list[j++].className = 'list';
				}
				list[i].className = 'list active';
			}
		}
	</script>

</body>


<?php
	}
	else{
		header("location:../adminlogin.php");
	}
?>