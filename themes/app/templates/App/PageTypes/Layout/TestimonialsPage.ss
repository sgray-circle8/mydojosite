<div class="page-title">
  <h1>Testimonials</h1>
</div>

<div class="testimonials-wrapper">
    <% loop $Testimonials %>
      <div class="testimonial">
        <div class="testimonial-quotemark__wrapper">
          <div class="testimonial-quotemark">
            <img src='/_resources/themes/app/dist/img/quote.svg'>
          </div>
        </div>
        <div class="testimonial-text">$Testimonial</div>
        <div class="testimonial-name">$Name</div>
        <div class="testimonial-location">$Location</div>
      </div>
    <% end_loop %>
</div>
