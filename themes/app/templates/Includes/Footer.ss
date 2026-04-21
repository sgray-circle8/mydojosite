<section class="footer-strip">
	<div class="container">
		<div class="strip-inner">
			<div class="strip-logo">
				<span class="logo--footer">
					<img src="/_resources/themes/app/dist/img/DragonEnsoRyuUn.svg" style="max-width:32px; max-height:32px;background-color: black; fill: white;">
				</span>
				<strong style="font-size: 1.1rem; letter-spacing: 1px; font-style: italic;">
					$SiteConfig.Tagline
				</strong>
			</div>

			<button class="back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" aria-label="Back to top">
				↑
			</button>
		</div>
	</div>
</section>

<div class="wrap">
	<div class="container">
		<div class="footer-links-area">

			<div class="contact-block">
				<h2>Contacts</h2>
				<ul>
					<li>
						<div class="icon"><i class="fa fa-envelope"></i></div>
						<div class="text"><a href="/contact/">bujinkan at graydojo.org</a></div>
					</li>
					<li>
						<div class="icon"><i class="fa-brands fa-facebook"></i></div>
						<div class="text"><a href="#" target="_blank">$SiteConfig.FacebookLink</a></div>
					</li>
					<li>
						<div class="icon"><i class="fa fa-map-marker"></i></div>
						<div class="text">$SiteConfig.DojoAddress</div>
					</li>
				</ul>
			</div>

			<div class="sitemap-block">
				<h2>Site Map</h2>
				<div class="sitemap-columns">
					<% loop $Menu(1) %>
						<%--
							If it's the first Menu item, output the opening unordered list tag
						--%>
						<% if $Pos == 1 %>
						<ul>
						<% end_if %>
						<%--
							A column should have at most 4 items, so
							if this is the 5th Menu item
							close the previous list and start a new one
						--%>
						<% if $Pos == 5 %>
						</ul>
						<ul>
						<% end_if %>
						<li>
							<a href="$Link" class="<% if $LinkingMode == 'current' %>active<% end_if %>">
								$MenuTitle
							</a>
						</li>
						<%--
							If it's the last Menu item, output the final closing unordered list tag
						--%>
						<% if $Last %>
						</ul>
						<% end_if %>
					<% end_loop %>
				</div>
			</div>

		</div>
	</div>
</div>

<script>
	const menuBtn = document.getElementById('menuBtn');
	const mainNav = document.getElementById('mainNav');
	const overlay = document.getElementById('overlay');
	const navLinks = mainNav.querySelectorAll('a');
	const lastNavLink = navLinks[navLinks.length - 1];

	function toggleMenu() {
		const isActive = menuBtn.classList.toggle('active');
		mainNav.classList.toggle('active');
		overlay.classList.toggle('active');

		// Set focus when the menu opens
		if (isActive) {
			menuBtn.focus();
		}
	}

	menuBtn.addEventListener('click', toggleMenu);
	overlay.addEventListener('click', toggleMenu);

	// Focus Trap
	window.addEventListener('keydown', (e) => {
		if (!mainNav.classList.contains('active')) return;

		const isTabPressed = e.key === 'Tab';
		const isEscPressed = e.key === 'Escape';

		if (isEscPressed) {
			toggleMenu();
		}

		if (!isTabPressed) return;

		if (e.shiftKey) {
			if (document.activeElement === menuBtn) {
				lastNavLink.focus();
				e.preventDefault();
			}
		} else {
			if (document.activeElement === lastNavLink) {
				menuBtn.focus();
				e.preventDefault();
			}
		}
	});

	// Close menu when a link is clicked
	navLinks.forEach(link => {
		link.addEventListener('click', () => {
			menuBtn.classList.remove('active');
			mainNav.classList.remove('active');
			overlay.classList.remove('active');
		});
	});
</script>