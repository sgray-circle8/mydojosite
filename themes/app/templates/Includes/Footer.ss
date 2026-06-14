

		<!-- STRIP STARTS
			========================================================================= -->
		<div class="totop-strip blue-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"><img src="/assets/images/logos/logo-bgd-ftr.png" alt="" ></div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<div class="scrollup"><a href="#"></a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. STRIP ENDS
			========================================================================= -->
		<!-- FOOTER STARTS
			========================================================================= -->
		<footer class="dark-grey-bg">
			<div class="container">
				<div class="row">
					<!-- Links Starts -->
					<div class="col-lg-5 links">
						<div class="block">
							<h1>Site Map</h1>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
									<ul class="links">
										<li><a href="home">Home</a></li>
										<li><a href="about">About</a></li>
										<li><a href="training">Training</a></li>
										<li><a href="instructor">Instructor</a></li>
									</ul>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
									<ul class="links">
                                        <li><a href="events">Events</a></li>
                                        <li><a href="stories">Stories</a></li>
                                        <!--li><a href="blog.php">Blog</a></li-->
                                        <li><a href="contact">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Links Ends -->
					<!-- Contact Starts -->
					<div class="col-lg-3 contact">
						<div class="block">
							<h1>Contacts</h1>
							<ul>
                                <li>
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <div class="text"><a href="mailto:bujinkan@graydojo.org">bujinkan@graydojo.org</a></div>
                                </li>
								<li>
                                    <div class="icon"><i class="fa fa-facebook"></i></div>
                                    <div class="text"><a href="https://www.facebook.com/graydojo/" target="_blank">https://www.facebook.com/graydojo/</a></div>
                                </li>
								<li>
									<div class="icon"><i class="fa fa-map-marker"></i></div>
									<div class="text">80 Underhill Road, Featherston</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Contact Ends -->
				</div>
			</div>
		</footer>
		<!-- /. FOOTER ENDS
			========================================================================= -->
		<!-- COPYRIGHT STARTS
			========================================================================= -->

		<!-- /. COPYRIGHT ENDS
			========================================================================= -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/_resources/themes/app/dist/js/bootstrap.min.js"></script>
		<!-- REVOLUTION JS FILES -->
		<script type="text/javascript" src="/revolution/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="/revolution/js/jquery.themepunch.revolution.min.js"></script>
		<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
			(Load Extensions only on Local File Systems !
			The following part can be removed on Server for On Demand Loading) -->
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.migration.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.video.min.js"></script>
		<script type="text/javascript">
			var tpj=jQuery;
			var revapi4;
			tpj(document).ready(function() {
				if(tpj("#rev_slider_46_1").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider_46_1");
				}else{
					revapi4 = tpj("#rev_slider_46_1").show().revolution({
						sliderType:"standard",
						jsFileLocation:"/revolution/js/",
						sliderLayout:"fullscreen",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
							onHoverStop:"off",
							touch:{
								touchenabled:"on",
								swipe_threshold: 75,
								swipe_min_touches: 1,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							}
							,
							arrows: {
								style:"zeus",
								enable:true,
								hide_onmobile:true,
								hide_under:600,
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1200,
								tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
								left: {
									h_align:"left",
									v_align:"center",
									h_offset:30,
									v_offset:0
								},
								right: {
									h_align:"right",
									v_align:"center",
									h_offset:30,
									v_offset:0
								}
							}
							,
							bullets: {
								enable:true,
								hide_onmobile:true,
								hide_under:600,
								style:"metis",
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1200,
								direction:"horizontal",
								h_align:"center",
								v_align:"bottom",
								h_offset:0,
								v_offset:30,
								space:5,
								tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
							}
						},
						viewPort: {
							enable:true,
							outof:"pause",
							visible_area:"80%"
						},
						responsiveLevels:[1240,1024,778,480],
						gridwidth:[1240,1024,778,480],
						gridheight:[600,600,500,400],
						lazyType:"none",
						parallax: {
							type:"mouse",
							origo:"slidercenter",
							speed:2000,
							levels:[2,3,4,5,6,7,12,16,10,50],
						},
						shadow:0,
						spinner:"off",
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						fullScreenAlignForce:"off",
						fullScreenOffsetContainer: "",
						fullScreenOffset: "0px",
						disableProgressBar:"on",
						hideThumbsOnMobile:"off",

						shuffle:"off",
						autoHeight:"off",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				}
			});	/*ready*/
		</script>
		<!-- Isotope Gallery -->
		<script type="text/javascript" src="/_resources/themes/app/dist/js/isotope/jquery.isotope.min.js"></script>
		<script type="text/javascript" src="/_resources/themes/app/dist/js/isotope/custom-isotope-mansory.js"></script>
		<!-- Magnific Popup core JS file -->
<%--		<script type="text/javascript" src="/_resources/themes/app/dist/js/magnific-popup/jquery.magnific-popup.js"></script>--%>
		<!-- Owl Carousel -->
<%--		<script type="text/javascript" src="/_resources/themes/app/dist/js/owl-carousel/owl.carousel.js"></script>--%>
        <!-- FitVids -->
		<script type="text/javascript" src="/_resources/themes/app/dist/js/fitvids/jquery.fitvids.js"></script>
		<!-- ScrollTo -->
<%--		<script type="text/javascript" src="/_resources/themes/app/dist/js/nav/jquery.scrollTo.js"></script>--%>
<%--		<script type="text/javascript" src="/_resources/themes/app/dist/js/nav/jquery.nav.js"></script>--%>
		<!-- Sticky -->
<%--		<script type="text/javascript" src="/_resources/themes/app/dist/js/sticky/jquery.sticky.js"></script>--%>
		<!-- Custom JS -->
		<script src="/_resources/themes/app/dist/js/custom/custom.js"></script>

