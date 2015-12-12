<!DOCTYPE html>
<html>
<head>
	<title>
		{{title}}
	</title>
	<link rel="stylesheet" type="text/css" href="public/css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="public/css/main.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="public/JS/jscript.js"></script>
</head>
	<body>
        <div class="big-container">
			<div class="welcome">{{username}}</div>
			<header>
				<div class="antet">
					<h1 align="center">{{title}}</h1>
					<div class="menu">
						<ul>
							{{ if logged }}
							<li class="submenu-item">
								<a href="index.php?page=admin">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Admin</span>
											</div>
											<div class="active-state">
												<span>Admin</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="submenu-item">
								<a href="index.php?page=login&action=logout">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Logout</span>
											</div>
											<div class="active-state">
												<span>Logout</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							{{ else }}
							<li class="submenu-item">
								<a href="index.php?page=login">     
									<div class="menubuttons">
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Login</span>
											</div>
											<div class="active-state">
												<span>Login</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							{{ endif }}
							<li class="submenu-item">
								<a href="index.php?page=contact">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Contact</span>
											</div>
											<div class="active-state">
												<span>Contact</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="submenu-item">
								<a href="index.php?page=articles">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Articles</span>
											</div>
											<div class="active-state">
												<span>Articles</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="submenu-item">
								<a href="index.php?page=team">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Team</span>
											</div>
											<div class="active-state">
												<span>Team</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="submenu-item">
								<a href="index.php?page=hobby">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Hobby</span>
											</div>
											<div class="active-state">
												<span>Hobby</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="submenu-item">
								<a href="index.php?page=aboutme">
									<div class="menubuttons">    
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>About me</span>
											</div>
											<div class="active-state">
												<span>About me</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<li class="submenu-item">
								<a href="index.php">     
									<div class="menubuttons">
										<div class="cube flip-to-top">
											<div class="default-state">
												<span>Home</span>
											</div>
												<div class="active-state">
											<span>Home</span>
											</div>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</header> 

