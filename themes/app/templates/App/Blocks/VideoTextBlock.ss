<section class="
  text-video-block
  <% if $VideoAlignment == 'Left' %> text-video-block--video-left<% end_if %>
  <% if $BGColour == 'Light Grey' %> light-grey-bg
  <% else_if $BGColour == 'Dark Grey' %> dark-grey-bg
  <% else_if $BGColour == 'Red' %> red-bg
  <% else %> white-bg <% end_if %>
">
  <div class="text-video-block__wrapper">
    <div class="text-video-block__text-wrapper">

      <% if $Title %><div class="text-video-block__text-title">$Title</div><% end_if %>

      <div class="text-video-block__video-wrapper">
        <div class="text-video-block__video-unit">
          <div class="video-container">
            <iframe
                    src="$EmbedURL"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
          </div>
        </div>
      </div>

      <div class="text-video-block__text-content">$BlockText</div>
    </div>
  </div>
</section>