		<nav id="navigation" class="navbar navbar-inverse">
			<div class="container navbar-container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="home"><img src="/assets/images/logos/logo-bgd2.png" width="195" height="70" alt="" ></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-right">
						<% if $URLSegment == 'home' %>
			            <li class="active"><a href="home" class="external">Home</a></li>
			            <% else %>
			            <li><a href="home" class="external">Home</a></li>
			            <% end_if %>
						<% if $URLSegment == 'about' %>
			            <li class="active"><a href="about" class="external">About</a></li>
			            <% else %>
			            <li><a href="about" class="external">About</a></li>
			            <% end_if %>
			            <% if $URLSegment == 'training' %>
			            <li class="active"><a href="training" class="external">Training</a></li>
			            <% else %>
			            <li><a href="training" class="external">Training</a></li>
			            <% end_if %>
			            <% if $URLSegment == 'instructor' %>
			            <li class="active"><a href="instructor" class="external">Instructor</a></li>
			            <% else %>
			            <li><a href="instructor" class="external">Instructor</a></li>
			            <% end_if %>
			            <% if $URLSegment == 'events' %>
			            <li class="active"><a href="events" class="external">Events</a></li>
			            <% else %>
			            <li><a href="events" class="external">Events</a></li>
			            <% end_if %>
			            <% if $URLSegment == 'kudos' %>
			            <li class="active"><a href="kudos" class="external">Kudos</a></li>
			            <% else %>
			            <li><a href="kudos" class="external">Kudos</a></li>
			            <% end_if %>
			            <% if $URLSegment == 'contact' %>
			            <li class="active"><a href="contact" class="external">Contact</a></li>
			            <% else %>
			            <li><a href="contact" class="external">Contact</a></li>
			            <% end_if %>

					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
		<!-- /. NAVIGATION ENDS -->
