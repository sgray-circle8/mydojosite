<div class="<% if $Size == "1-Col" %>col-lg-4 col-md-4<% else %>col-lg-8 col-md-8<% end_if %> column col-height col-top">
    <% if $BlockImage %>
      <img src="$BlockImage.URL" class="img-responsive" alt="$BlockImage.Title" >
    <% end_if %>
</div>