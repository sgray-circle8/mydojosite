<header class="card site-header" role="banner">
	<div class="brand">
		<div class="site-header__logo">
		<a href="/">
			<img src="/_resources/themes/app/dist/img/DragonEnsoRyuUn.svg" class="logo" alt="Site Logo">
		</a>
		</div>
		<span class="site-title">$SiteConfig.Title</span>
	</div>

	<button class="menu-toggle" id="menuBtn" aria-label="Toggle navigation">
		<span></span>
		<span></span>
		<span></span>
	</button>

	<nav class="primary" id="mainNav">
		<% loop $Menu(1) %>
			<a href="$Link" class="<% if $LinkingMode == 'current' %>active<% end_if %>">$MenuTitle</a>
		<% end_loop %>
	</nav>
</header>