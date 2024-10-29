<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">
				<span>[PHOTO]</span>
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-right" id="menu">
			<ul class="nav navbar-nav">
				<li class="<?php if (esOpcionMenuActiva('/index.php')) echo 'active' ?> lien"><a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a></li>
				<li class="<?php if (esOpcionMenuActiva('/about.php')) echo 'active' ?> lien"><a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
				<li class="<?php if (existeOpcionMenuActivaArray('/blog.php','/single_post.php')) echo 'active' ?> lien"><a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
				<li class="<?php if (esOpcionMenuActiva('/contact.php')) echo 'active' ?> lien"><a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
				<li class="<?php if (esOpcionMenuActiva('/gallery.php')) echo 'active' ?> lien"><a href="gallery.php"><i class="fa fa-image sr-icons"></i> Gallery</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- End of Navigation Bar -->