<div class="card image-block
  <% if $Size == "1-Col" %>
    image-block--one-column
  <% else_if $Size == "2-Col" %>
    image-block--two-column
  <% end_if %>">
  <div class="col<% if $Size == "2-Col" %> image--two-column<% end_if %>">
    <% if $BlockImage %>
      <img src="$BlockImage.URL" class="img-responsive" alt="$BlockImage.Title" >
    <% end_if %>
    </div>
</div>