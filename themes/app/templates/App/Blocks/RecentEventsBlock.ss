<div
    class="vue-recent-events-block"
    data-title="$Title.ATT"
    data-bgcolour="$BGColour.ATT"
    data-linkedpageurl="$LinkedPageURL.ATT"
    data-events='[
    <% loop $RecentEvents %>
    {
      "title": "$Title.JS",
      "startDate": "$StartDate.Format('d MMMM Y').JS",
      "isPast": <% if $IsPast %>true<% else %>false<% end_if %>,
      "locationTitle": "$EventLocationTitle.JS",
      "hostName": "$EventEventHost.JS",
      "hostUrl": "$EventHostURL.JS",
      "facebookUrl": "$FacebookURL.JS",
      "registrationLink": "$EventRegistrationLink.JS",
      "imageUrl": <% if $EventImage %>"$EventImage.URL.JS"<% else %>null<% end_if %>,
      "details": "$Details.JS"
    }<% if not $Last %>,<% end_if %>
    <% end_loop %>
  ]'
></div>