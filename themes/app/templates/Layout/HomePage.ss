<% loop $ElementalArea.Elements.Filter('ClassName', 'App\Blocks\CTABlockFullWidth') %>
  $Me
<% end_loop %>

<div class="blocks-wrapper">
  <% loop $ElementalArea.Elements.Exclude('ClassName', 'App\Blocks\CTABlockFullWidth') %>
    $Me
  <% end_loop %>
</div>
