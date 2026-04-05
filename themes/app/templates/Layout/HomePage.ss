
<main>
    <div id="contents" class="content-container unit size4of4 lastUnit">
        <% loop $ElementalArea.Elements.Filter('ClassName', 'App\Blocks\CTABlockFullWidth') %>
            $Me
        <% end_loop %>

      <div class="container index-blocks">
        <div class="row no-gutter-4 flex-container">
            <% loop $ElementalArea.Elements.Exclude('ClassName', 'App\Blocks\CTABlockFullWidth') %>
                $Me
            <% end_loop %>
        </div>
      </div>

<%--        <div class="container index-blocks">--%>
<%--            <div class="row no-gutter-4">--%>
<%--                <div class="rowheight row-height">--%>

<%--                    <!-- News Block Carousel -->--%>
<%--                    <div class="col-lg-4 col-md-4 clearfix column col-height col-top index-news light-grey-bg">--%>
<%--                        <div class="news-carousel clearfix">--%>
<%--                            <!-- News: Kiso Gata Workshop -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>Kiso Gata Workshop - June 2023</h1>--%>
<%--                                <div class="picture">--%>
<%--                                    <img src="/assets/images/home/news-2023_KisoGata.png" class="img-responsive" alt="2023 Kiso Gata" >--%>
<%--                                </div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        The Kiso Gata Bujinkan fundamentals workshop was a great success.--%>
<%--                                        Thanks to Shihan Alan McGregor for making the trip down from Whangarei to share--%>
<%--                                        his knowledge with us!--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: MutoDori Workshop 2019 -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>MutoDori Workshop 2019</h1>--%>
<%--                                <div class="picture">--%>
<%--                                    <img src="/assets/images/home/news-2019_MutoDori.png" class="img-responsive" alt="2019 MutoDori Workshop" >--%>
<%--                                </div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        The Muto Dori workshop with Daishihan Simon Gaunt was very well received. Many--%>
<%--                                        thanks to Gaunt Sensei of Hamilton for sharing his knowledge of sword distance--%>
<%--                                        with us.--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: Nunu Otutaha 2020-->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>Timing, Distance, and Modern Applications</h1>--%>
<%--                                <div class="picture">--%>
<%--                                    <img--%>
<%--                                        src="/assets/images/home/news-2020_TimingDistanceModernApplications.png"--%>
<%--                                        class="img-responsive"--%>
<%--                                        alt="2020 Timing, Distance and Modern Applications Workshop"--%>
<%--                                    />--%>
<%--                                </div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        Much gratitude to Nunu Otutaha of Auckland for sharing his Taijutsu skills--%>
<%--                                        with us in this workshop on timing distance and modern applications. Otutaha--%>
<%--                                        Sensei runs a successful "Little Ninja" kids training program and we had a kids--%>
<%--                                        segment in this workshop also.--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: Kagami Biraki 2019 -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>Kagami Biraki 2019</h1>--%>
<%--                                <div class="picture"><img src="/assets/images/home/news-2019_KagamiBiraki.jpg" class="img-responsive" alt="2019 Kagami Biraki" ></div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        Our 2019 kick-off training was enjoyed by all!--%>
<%--                                        A good chance to reflect and look forward to the coming year's training.--%>
<%--                                        Well done everyone!--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: New Website! -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>New Website!</h1>--%>
<%--                                <div class="picture"><img src="/assets/images/home/news-newwebsite.png" class="img-responsive" alt="New Website" ></div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">Our site has just has its first facelift in over 5 years! Much has changed in that time, so check out all the new stuff!</div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: Auckland Seminar -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>Auckland Seminar</h1>--%>
<%--                                <div class="picture"><img src="/assets/images/home/news-seminar180610.png" class="img-responsive" alt="Auckland Seminar" ></div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        Hosted by <a href="https://www.facebook.com/events/185032622128458/">Catchingbutterfly Dojo</a>, Auckland<br />--%>
<%--                                        10 June (Sun), 09:30 - 16:30<br />--%>
<%--                                        45 Woodside Avenue, Northcote, Auckland--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: Nagato Taikai -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>Toshiro Nagato Taikai NZ</h1>--%>
<%--                                <div class="picture"><img src="/assets/images/home/news-nagato.jpg" class="img-responsive" alt="Nagato Taikai" ></div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        The Taikai with Nagato Sensei in Auckland was very successful. Lots of good training with friends old and new. Three of us made the road trip from Wellington--%>
<%--                                        to join in the fun.--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                            <!-- News: 20th Anniversary Seminar -->--%>
<%--                            <div class="block clearfix">--%>
<%--                                <h1>20th Anniversary!</h1>--%>
<%--                                <div class="picture"><img src="/assets/images/home/news-20thAnnSeminar.png" class="img-responsive" alt="20th Anniversary Seminar" ></div>--%>
<%--                                <div class="detail clearfix">--%>
<%--                                    <div class="description">--%>
<%--                                        Our dōjō 20th anniversary seminar was a year late due to Covid, but worth the wait! A good day of training with participants and guest instructors from around NZ.--%>
<%--                                    </div>--%>
<%--                                </div>--%>
<%--                            </div>--%>

<%--                        </div>--%>
<%--                    </div>--%>
<%--                    <!-- end News Row -->--%>

<%--                    <!-- Friends Block -->--%>
<%--                    <div class="col-lg-4 col-md-4 column col-height col-top index-partners light-grey-bg">--%>
<%--                        <div class="block">--%>
<%--                            <h1>Friends・武友</h1>--%>
<%--                            <div class="row">--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="https://www.facebook.com/bujinkandojonorthshore/" target="_blank" title="Bujinkan Catchingbutterfly Dojo, Auckland">--%>
<%--                                        <img src="/assets/images/home/host-catchingbutterfly.jpg" class="img-responsive center-block" alt="" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="https://www.bujinkannewzealand.net/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-hiryudojo.png" class="img-responsive center-block" title="Bujinkan Simon Gaunt, Hamilton" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="http://www.bujinkanweatheralldojo.com/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-weatheralldojo.jpg" class="img-responsive center-block" title="Bujinkan Weatherall Dojo, Christchurch" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="http://www.bujinkan-brussel.be/dojowebsite/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-numayadojo.jpg" class="img-responsive center-block" title="Bujinkan Numaya Dojo, Belgium" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="http://www.bdn.se/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-norkoppingdojo.png" class="img-responsive center-block" title="Bujinkan Norrköping, Sweden" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="https://www.facebook.com/BujinkanBushinDojo/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-bushindojo.jpg" class="img-responsive center-block" title="Bujinkan Bushin Dojo, Sweden" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="http://www.budo.org/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-goteborgdojo.jpg" class="img-responsive center-block" title="Bujinkan Dojo Göteborg, Sweden" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="http://www.abbybujinkan.com/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-abbotsforddojo.jpg" class="img-responsive center-block" title="Abbotsford Bujinkan, Canada" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">--%>
<%--                                    <a href="http://www.namiyama.com/" target="_blank">--%>
<%--                                        <img src="/assets/images/home/host-namiyama.png" class="img-responsive center-block" title="Bujinkan Namiyama Dojo, Canada" >--%>
<%--                                    </a>--%>
<%--                                </div>--%>
<%--                            </div>--%>
<%--                        </div>--%>
<%--                    </div>--%>

<%--                    <div class="col-lg-4 col-md-4 column col-height col-top index-pricing medium-grey-bg-2">--%>
<%--                        <div class="action-carousel">--%>
<%--                            <div class="block">--%>
<%--                                <h1>Regular Classes - First Class Free!</h1>--%>
<%--                                <ul>--%>
<%--                                    <li><i class="fa fa-mobile"></i> Find out if Bujinkan is for you</li>--%>
<%--                                    <li><i class="fa fa-user"></i> Join one of our regular classes</li>--%>
<%--                                    <li><i class="fa fa-thumbs-up"></i> Any comfortable clothing is ok</li>--%>
<%--                                    <li><i class="fa fa-heartbeat"></i> Train at your own level</li>--%>
<%--                                    <li><i class="fa fa-clock-o"></i> Train Mondays and/or Fridays</li>--%>
<%--                                    <li><i class="fa fa-user"></i> Learn from the ground up</li>--%>
<%--                                    <li><i class="fa fa-heartbeat"></i> Safe, supportive environment</li>--%>
<%--                                    <li><i class="fa fa-thumbs-up"></i> Hands-on instruction</li>--%>
<%--                                </ul>--%>
<%--                                <div class="button"><a href="/contact" class="white">Sign up</a></div>--%>
<%--                            </div>--%>
<%--                        </div>--%>
<%--                    </div>--%>
<%--                </div>--%>
<%--            </div>--%>
<%--        </div>--%>
    </div>
</main>
