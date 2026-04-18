<div class="page-title">
  <h1>Upcoming & Past Events</h1>
</div>

<% loop $PaginatedEvents %>
  <section class="
  text-image-block text-image-block--borderline
  <% if $ImageAlignment == 'Left' %> text-image-block--images-left<% end_if %>
      <% if $BGColour == "Light Grey" %>
    light-grey-bg
  <% else_if $BGColour == "Dark Grey" %>
    dark-grey-bg
  <% else_if $BGColour == "Red" %>
    red-bg
  <% else %>
    white-bg
  <% end_if %>
">
    <div class="text-image-block__wrapper">
      <div class="text-image-block__text-wrapper <% if not $EventImage %>text-image-block__text-wrapper--no-image<% end_if %>">

        <%-- If there's a Start Date, print this date / time row --%>
        <% if $StartDate %>
            <div class="text-image-block__text-date">
                <%--
                StartDate:
                 If the End Date is the same as the Start Date (ie a 1-day event),
                 print the Start Date with the year, eg '20 February 2026'.
                 Otherwise (if there is an End Date that is not the same as the Start Date),
                 print the Start date without the year, eg. '20 February'
                --%>
                <% if $EndDate == $StartDate %>
                    $StartDate.Format("d MMMM Y")
                <% else_if $EndDate != $StartDate %>
                    $StartDate.Format("d MMMM")
                <% end_if %>

                <%--
                    If there are both valid $StartTime and $EndTime,
                    proceed to print the Start Time (hours:minutes, 24-hr format).
                --%>
                <% if $StartTime != '00:00:00' && $EndTime != '00:00:00' %>
                    @ $StartTime.Format('HH:mm')h
                    <%--
                        If there is no End Date or the End Date is the same as the Start Date
                        (ie, if it is a 1-day event), print the End Time here (beside the Start Time).
                    --%>
                    <% if $EndDate == '' || $EndDate == $StartDate %>
                      - $EndTime.Format('HH:mm')h
                    <% end_if %>
                <% end_if %>

                <%--
                    If the End Date is different from the Start Date
                    (ie, if it is a multi-day event), print the End Date.
                    If there's a valid End Time, print it here (after the End Date).
                --%>
                <% if $EndDate != $StartDate %>
                  - $EndDate.Format("d MMMM")
                  <% if $EndTime != '00:00:00' %>
                    @ $EndTime.Format('HH:mm')h
                  <% end_if %>
                <% end_if %>

              <% if $IsPast %>
                  <br />*Note that this event has already taken place.
              <% end_if %>
            </div>
        <% end_if %>

        <div class="text-image-block__text-title<% if $IsPast %> text-image-block__text-title--past-event<% end_if %>">$Title</div>
        <% if $EventLocationTitle || $EventHostDojo || $FacebookURL %>
        <div class="text-image-block__text-location">
          <% if $EventLocationTitle %>
            <div class="icon event__bullets">
              <div class="event__bullet event__location-title">
              <i class="fa fa-map-marker"></i>
                $EventLocationTitle
                <% if $EventLocationAddress %>
                  ( $EventLocationAddress )
                <% end_if %>
              </div>
              <% if $EventHostDojo %>
                <div class="event__bullet event__host-dojo">
                  <i class="fa-solid fa-house-chimney-user"></i> Hosted by $EventHostDojo
                </div>
              <% end_if %>
              <% if $FacebookURL %>
                <div class="event__bullet">
                  <i class="fa-brands fa-square-facebook"></i> <a href="$FacebookURL" target="_blank">View this event on Facebook</a>
                </div>
              <% end_if %>
            </div>
          <% end_if %>
        </div>
        <% end_if %>
        <div class="text-image-block__text-content">$Details</div>

        <% if $EventImage %>
        <div class="text-image-block__image-wrapper">
          <div class="text-image-block__image-unit">
            <div class="text-image-block__image-img">
              <img
                  src="$EventImage.URL"
                  alt="$Title"
              >
            </div>
            <div class="text-image-block__image-caption">$Image1Caption</div>
          </div>
      </div>
      <% end_if %>
      </div>
    </div>
  </section>
<% end_loop %>

<div class="paginated-list">
<% if $PaginatedEvents.MoreThanOnePage %>
    <% if $PaginatedEvents.NotFirstPage %>
      <a class="prev" href="$PaginatedEvents.PrevLink">Prev</a>
    <% end_if %>
    <% loop $PaginatedEvents.PaginationSummary %>
        <% if $CurrentBool %>
            $PageNum
        <% else %>
            <% if $Link %>
              <a href="$Link" class="paginated-list__page-number">$PageNum</a>
            <% else %>
              ...
            <% end_if %>
        <% end_if %>
    <% end_loop %>
    <% if $PaginatedEvents.NotLastPage %>
      <a class="next" href="$PaginatedEvents.NextLink">Next</a>
    <% end_if %>
<% end_if %>
</div>