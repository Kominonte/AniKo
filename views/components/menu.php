<nav class="menu">
		<a class="menu-link" href="/">
			<div class="menu-item">
				<img id="logo" class="menu-item-icon" src="../assets/icon/color/aniko.png">
				<span id="name" class="menu-item-label">AniKo</span>
			</div>
		</a>

		<?php if(!$_SESSION['user']){?>
			<a class="menu-link" href="/login">
				<div class="menu-item" id="auth-item">
					<img class="auth-item-icon" src="../assets/icon/dark/enter.png">
					<span class="btn-auth">Войти | Регистрация</span>
				</div>
			</a>
		<?php }else{ ?>
			<a class="menu-link" href="/user">
				<div id="mini-pofile">
					<img id="mini-background" src="../uploads/mini-background/no-mini-background.webp">
					<div id="avatar-wrapper">
						<img id="avatar" src="../uploads/avatar/noavatar.jpg">
						<span id="lvl">23</span>
					</div>
					
					
					<span id="login"><?= $_SESSION['user']['login'] ?></span>
					<div id="progressbar-back"><div id="progressbar"></div></div>

				</div>
				<!-- <div class="menu-item" id="auth-item">
					<img class="auth-item-icon" src="../assets/icon/dark/enter.png">
					<span class="btn-auth">Войти | Регистрация</span>
				</div> -->
			</a>
		<?php }?>
		<a class="menu-link">
			<div class="menu-item">
				<img class="menu-item-icon" src="../assets/icon/color/search.png">
				<span class="menu-item-label">Поиск</span>
			</div>
		</a>
		<a class="menu-link">
			<div class="menu-item">
				<img  class="menu-item-icon" src="../assets/icon/color/catalog.png">
				<span class="menu-item-label">Каталог</span>
			</div>
		</a>
		<a class="menu-link">
			<div class="menu-item">
				<img class="menu-item-icon" src="../assets/icon/color/list.png">
				<span class="menu-item-label">Списки</span>
			</div>
		</a>
</nav>