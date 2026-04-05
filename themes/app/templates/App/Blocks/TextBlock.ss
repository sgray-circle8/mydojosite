<div class="
  col-lg-4 col-md-4 col-xs-12 column col-height col-top
  box
  <% if $BGColour == "Red" %>
    red-bg
  <% else_if $BGColour == "Dark Grey" %>
    medium-grey-bg-2
  <% else %>
  light-grey-bg
  <% end_if %>
">
  <h3>$Title</h3>
  <% if $SubTitle %><h4>$SubTitle</h4><% end_if %>
  <div class="description">
    $BlockSummary
  </div>
  <% if $ButtonText %>
    <div class="button">
      <a
        href="$LinkedPage.Link"
        <% if $BGColour != "Light Grey" %>class="white"<% end_if %>
      >$ButtonText</a>
    </div>
  <% end_if %>
</div>