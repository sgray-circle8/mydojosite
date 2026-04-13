<div class="card text-block">
    <div class="col
      <% if $BGColour == "Red" %>
        red-bg
      <% else_if $BGColour == "Dark Grey" %>
        medium-grey-bg-2
      <% else %>
      light-grey-bg
      <% end_if %>
    ">
      <h2>$Title</h2>
      <% if $SubTitle %><h4>$SubTitle</h4><% end_if %>
      <p>$BlockSummary</p>
      <% if $ButtonText %>
          <div class="button">
          <a
            href="$LinkedPage.Link"
            <% if $BGColour != "Light Grey" %>class="white"<% end_if %>
          >$ButtonText</a>
        </div>
      <% end_if %>
    </div>
</div>