  <!-- Footer -->
  <footer class="footer clearfix">
    <div class="container">
       <!-- First footer -->
       <div class="first-footer">
          <div class="row">
             <div class="col-md-12">
                <div class="links dark footer-contact-links">
                   <div class="footer-contact-links-wrapper">
                      <div class="footer-contact-link-wrapper">
                         <div class="image-wrapper footer-contact-link-icon">
                            <div class="icon-footer"> <i class="flaticon-phone-call"></i> </div>
                         </div>
                         <div class="footer-contact-link-content">
                            <h6>Call us</h6>
                            <p style="width: max-content;">{{ get_setting('phone')->value ?? 'null'}}</p>
                         </div>
                      </div>
                      <div class="footer-contact-links-divider"></div>
                      <div class="footer-contact-link-wrapper">
                         <div class="image-wrapper footer-contact-link-icon">
                            <div class="icon-footer"> <i class="flaticon-message"></i> </div>
                         </div>
                         <div class="footer-contact-link-content">
                            <h6>Write to us</h6>
                            <p>{{ get_setting('email')->value ?? 'null' }}</p>
                         </div>
                      </div>
                      <div class="footer-contact-links-divider"></div>
                      <div class="footer-contact-link-wrapper">
                         <div class="image-wrapper footer-contact-link-icon">
                            <div class="icon-footer"> <i class="flaticon-placeholder"></i> </div>
                         </div>
                         <div class="footer-contact-link-content">
                            <h6>Address</h6>
                            <p>{{ get_setting('business_address')->value ?? 'null' }}</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- Second footer -->
       <div class="second-footer">
          <div class="row">
             <!-- about & social icons -->
             <div class="col-md-4 widget-area">
                <div class="widget clearfix">
                   <div class="footer-logo">
                    <img class="img-fluid" src="{{ asset(get_setting('site_footer_logo')->value ?? 'null')}}" alt=""> </div>
                   <div class="widget-text">
                      {{-- <p>Quisque imperdiet sapien porttito the bibendum sellentesque the commodo erat acar accumsa lobortis, enim diam the nesuen.</p> --}}
                      <div class="social-icons">
                         <ul class="list-inline">
                            <li><a target="_blank" href="{{ get_setting('instagram_url')->value ?? 'null'}}"><i class="ti-instagram"></i></a></li>
                            <li><a target="_blank" href="{{ get_setting('twitter_url')->value ?? 'null' }}"><i class="ti-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ get_setting('facebook_url')->value ?? 'null' }}"><i class="ti-facebook"></i></a></li>
                            <li><a target="_blank" href="{{ get_setting('youtube_url')->value ?? 'null' }}"><i class="ti-youtube"></i></a></li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
             <!-- quick links -->
             <div class="col-md-3 offset-md-1 widget-area">
                <div class="widget clearfix usful-links">
                   <h3 class="widget-title">Popular Pages</h3>
                   <ul>
                        @foreach(get_pages_both_footer() as $page)
                            <li>
                                <a href="{{ route('page.about', $page->slug) }}">{{ $page->name ?? 'Null' }}</a>
                            </li>
                        @endforeach
                   </ul>
                </div>
             </div>
             <!-- subscribe -->
             <div class="col-md-4 widget-area">
                <div class="widget clearfix">
                   <h3 class="widget-title">Subscribe</h3>
                   <p>Sign up for our monthly blogletter to stay informed about travel and tours</p>
                   <div class="widget-newsletter">
                      <form action="#">
                         <input type="email" placeholder="Email Address" required>
                         <button type="submit">Send</button>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- Bottom footer -->
       <div class="bottom-footer-text">
          <div class="row copyright">
             <div class="col-md-12">
                <p class="mb-0">©2023 <a href="#">{{ get_setting('copy_right')->value ?? 'null'}}</a>. All rights reserved.</p>
             </div>
          </div>
       </div>
    </div>
 </footer>
