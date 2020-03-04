
<div class="container-full"></div>

<nav class="main-navigation">
	<div class="navbar-header animated fadeInUp">
		<a class="navbar-brand" href="#">
			<img src="assets/icons/bg-smtct-icon.png" width="45" height="60" class="d-inline-block align-top" alt="brand">
			<h6 style="color: white">S M A R T . C I T Y</h6>
		</a>
	</div>
	
	<div class="nav-list">
		<a href="index.php" class="nav-link">HOME</a>
		<a href="index.php?controller=streets&action=index" class="nav-link">Streets</a>
		<a href="index.php?controller=lights&action=index" class="nav-link">Lights</a>
		
		
			<div class="dropdown" >
				<button type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">
					Setting
				</button>
				<div class="dropdown-menu">
					<a href="index.php?controller=trafics&action=create" class="drop">Add trafic log</a>
					<hr>
					<a href="index.php?controller=lights&action=create" class="drop">Add new light</a>
					<hr>
					<a href="index.php?controller=pollutions&action=create" class="drop">Add pollution log</a>
					
				</div>
			

		</div>
		<a href="index.php?controller=users&action=index" class="nav-link">Profil</a>
		<a href="login.php" style="color:white;" class="nav-link">Déconnexion</a>
	</div>
</nav>