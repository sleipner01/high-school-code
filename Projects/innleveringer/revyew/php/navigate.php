<div class="navigation">
	 <div class="logo"><a href="../index.php"><img type="image/png" src="../bilder/logo.png" alt="Logo" height="52px"></a></div>
	 <div class=<?php if($page == 'revyer') {echo 'links-active';} else {echo 'links';}?>><a class="link_a" href="revyer.php">Alle anmeldte revyer</a></div>
	 <div class=<?php if($page == 'anmeld_revy') {echo 'links-active';} else {echo 'links';}?>><a class="link_a" href="anmeld_revy.php">Anmeld revy</a></div>
	 <div class=<?php if($page == 'upload') {echo 'links-r-active';} else {echo 'links-r';}?>><a href="upload.php" class="link_a">Last opp bilde</a></div>
	 <div class=<?php if($page == 'registrer_arrangor') {echo 'links-active';} else {echo 'links';}?>><a class="link_a" href="registrer_arrangor.php">Registrer arrangør</a></div>
	 <div class=<?php if($page == 'rediger_anmeldelse') {echo 'links-active';} else {echo 'links';}?>><a href="rediger_anmeldelse.php" class="link_a">Rediger anmeldelse</a></div>
</div>