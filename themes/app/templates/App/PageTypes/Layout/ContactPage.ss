<div class="contact-form-wrapper">

    <div class="contact-form__info-block">
        <div class="contact-form__info-title">$InfoBlockTitle</div>
        <div class="contact-form__info-content">$InfoBlockContent</div>
    </div>

    <div class="contact-form__info-block">
        <div class="contact-form__info-title">Training</div>
        <ul class="contact-form__info-list">
          <li class="clearfix">
              <div class="text">
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                    $SiteConfig.DojoName<br />
                    $SiteConfig.DojoAddress<br />
                    $SiteConfig.TrainingSchedule
                </div>
              </div>
          </li>
          <li class="clearfix facebook">
              <div class="text">
                <div class="icon">
                  <i class="fa-brands fa-facebook"></i>
                  <strong>
                    <a href="$SiteConfig.FacebookLink" target="_blank">
                        $SiteConfig.FacebookLink
                    </a>
                  </strong>
                </div>
              </div>
          </li>
        </ul>
    </div>

  <% if $IsSuccess %>
    <div class="contact-form__message">
        <% if $ThankYouMessage %>
            $ThankYouMessage
        <% else %>
            Thanks for your message.  We'll get back to you soon.
        <% end_if %>
    </div>
  <% else %>
    <div class="contact-form">
        $Form
    </div>
  <% end_if %>

</div>

<div class="map">
  <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12777.940984388952!2d138.7170636591061!3d35.360624563075135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019629a42fdc899%3A0xa6a1fcc916f3a4df!2sMount%20Fuji!5e1!3m2!1sen!2snz!4v1781492423940!5m2!1sen!2snz"
      width="100%"
      height="450"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

