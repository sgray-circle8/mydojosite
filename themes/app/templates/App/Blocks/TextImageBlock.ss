<section class="
  text-image-block
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
    <div class="text-image-block__text-wrapper">
      <% if $ShowTitle %>
        <div class="text-image-block__text-title">$Title</div>
      <% end_if %>
      <% if $SubTitle %>
        <div class="text-image-block__text-subtitle">$SubTitle</div>
      <% end_if %>
      <div class="text-image-block__image-wrapper">
        <div class="text-image-block__image-unit">
          <div class="text-image-block__image-img">
            <img
              src="$Image1.URL"
              alt="$Image1Caption"
              <% if not $Image2 %>class="full-width"<% end_if %>
            >
          </div>
          <div class="text-image-block__image-caption">$Image1Caption</div>
        </div>

        <div class="text-image-block__image-unit">
          <div class="text-image-block__image-img">
            <% if $Image2 %><img src="$Image2.URL" alt="$Image2Caption"><% end_if %>
          </div>
          <div class="text-image-block__image-caption">$Image2Caption</div>
        </div>
      </div>

      <div class="text-image-block__text-content">$BlockText</div>
    </div>
  </div>
</section>