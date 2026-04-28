<div class="card recent-events-block
  <% if $BGColour == "Red" %>
    red-bg
  <% else_if $BGColour == "Dark Grey" %>
    medium-grey-bg-2
  <% else %>
  light-grey-bg
  <% end_if %>
">
  <div class="recent-events-block__title">
    <h2>$Title</h2>
    <a href="$LinkedPageURL" class="recent-events-block__linked-page">全・See all events</a>
  </div>
  <div class="recent-event-wrapper">
    <% loop $RecentEvents %>
      <div class="recent-event">
        <div class="recent-event__start-date">
          $StartDate.Format("d MMMM Y")
          <% if $IsPast %>
            <br />*This event has already taken place.
          <% end_if %>
        </div>
        <h3>
          <div class="recent-event__link<% if $IsPast %> text-image-block__text-title--past-event<% end_if %>">
            $Title
          </div>
          <% if $EventLocationTitle || $EventHostName || $FacebookURL %>
            <div class="text-image-block__text-location">
              <div class="icon event__bullets">

                <% if $EventLocationTitle %>
                    <div class="event__bullet event__location-title">
                      <i class="fa fa-map-marker"></i>
                      $EventLocationTitle
                    </div>
                <% end_if %>

                <% if $EventEventHost %>
                  <div class="event__bullet event__host-dojo">
                    <i class="fa-solid fa-house-chimney-user"></i>
                    Hosted by
                    <% if $EventHostURL %><a href="{$EventHostURL}" target="_blank"><% end_if %>
                    $EventEventHost
                    <% if $EventHostURL %></a><% end_if %>
                  </div>
                <% end_if %>

                <% if $FacebookURL %>
                  <div class="event__bullet">
                    <i class="fa-brands fa-square-facebook"></i> <a href="$FacebookURL" target="_blank">View on Facebook</a>
                  </div>
                <% end_if %>

                <%-- Registration link for future events only --%>
                <% if not $IsPast %>
                  <% if $EventRegistrationLink %>
                    <div class="event__bullet event__registration-link">
                      <i class="fa fa-sign-in"></i>
                      $EventRegistrationLink
                    </div>
                  <% end_if %>
                <% end_if %>

              </div>
            </div>
          <% end_if %>
        </h3>
        <div class="recent-event__image">
          <%--
          To do: Implement this when doing the Event Page
          <a href="#" class="recent-event__link">
          --%>
          <div class="recent-event__link">
            <% if $EventImage %>
              <img src="$EventImage.URL" alt="Event image for $Title">
            <% else %>
              <img src="/_resources/themes/app/dist/img/DragonEnsoRyuUn.svg" class="logo" alt="Site Logo">
            <% end_if %>
          </div>
        </div>
        <div class="recent-event__details">
            $Details
        </div>
      </div>
    <% end_loop %>
    <div class="recent-events-block__title">
      <a href="$LinkedPageURL" class="recent-events-block__linked-page">全・See all events</a>
    </div>
  </div>
</div>