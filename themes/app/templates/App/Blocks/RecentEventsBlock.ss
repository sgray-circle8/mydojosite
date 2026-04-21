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
        <div class="recent-event__start-date">$StartDate.Format("d MMMM Y")</div>
        <h3>
            <div class="recent-event__link">$Title</div>
            <%--
            To do: Implement this when doing the Event Page
            <a href="#" class="recent-event__link">$Title</a>
            --%>
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