    <section id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="col-inner navigation">
              <h2>NAVIGATION</h2>
              <ul class="navigation-menu">
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">SERVICES</a></li>
                <li><a href="#">SELECTED WORK</a></li>
                <li><a href="#">GET IN TOUCH</a></li>
                <li><a href="#">CAREERS</a></li>
              </ul>
            </div>
          </div><!-- /.col -->

          <div class="col-md-5 col-md-offset-1">
            <div class="col-inner news">
              <h2>RECENT NEWS</h2>
              <p>Made with infinty - <a href="#">@Ra-Themes</a> - see more of what our creative customers make a <a class="text-primary" href="#">http://rathemes.com</a></p>
              <p>Computer users and programmers have become so accustomed to using Windows <a href="#">@Ra-Themes</a></p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-3 col-md-offset-1">
            <div class="col-inner">
              <h2>PROJECTS</h2>
              <div class="images clearfix">
                <a href="#"><img class="img-responsive" src="/infinity_components/assets/images/103.jpg" alt=""></a>
                <a href="#"><img class="img-responsive" src="/infinity_components/assets/images/102.jpg" alt=""></a>
                <a href="#"><img class="img-responsive" src="/infinity_components/assets/images/101.jpg" alt=""></a>
              </div>

              <div class="icons">
                <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                <a href="#" class="icon"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="icon"><i class="fa fa-dribbble"></i></a>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- .row -->
      </div><!-- .container -->
    </section><!-- #footer -->

    <section id="copyright">
      <div class="container text-center">
        <p>Copyright &copy; 2016 PRO Medical Theme by <a href="#" class="text-primary">RaThemes</a></p>
      </div>
    </section><!-- #copyright -->
  </div>
  <div id="loading-div">
    <img src="/infinity_components/assets/images/landing-page/puff.svg" width="50" alt="">
  </div>
  <script src="{{ asset('infinity_components/libs/bower/jquery/dist/jquery.js') }}"></script>
  <script src="{{ asset('infinity_components/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>
  <script src="{{ asset('infinity_components/libs/misc/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('infinity_components/libs/bower/smooth-scroll/dist/js/smooth-scroll.min.js') }}"></script>
  <script src="{{ asset('infinity_components/libs/bower/waypoints/lib/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('infinity_components/libs/bower/counterup/jquery.counterup.min.js') }}"></script>

  <script>

    $(function() {
      $(window).on('load', function(){
        $(document.body).addClass('loading-done');
      });

      //= shrink and expand the navbar 
      $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 50) $('.navbar').addClass('shrink');
        else $('.navbar').removeClass('shrink');
      });

      //= autoplay the video when the modal show up
      autoPlayYouTubeModal();

      //= equal columns height
      matchHeight('#states .col-inner');

      //= counterUp plugin
      $('.counterUp').counterUp({ delay: 10, time: 1500 });

      //= set the max-height property for .navbar-collapse
      $(window).on('load resize orientationchange', function(){
        $('.navbar-collapse').css('max-height', $(window).height() - $('.navbar').height());
      });

      $(document).on('click', '[data-toggle="collapse"]', function(e){
        var $trigger = $(e.target);
        $trigger.is('[data-toggle="collapse"]') || ($trigger = $trigger.parents('[data-toggle="collapse"]'));
        var $target = $($trigger.attr('data-target'));
        if ($target.attr('id') === 'page-menu-collapse')
          $(document.body).toggleClass('navbar-collapse-show', !$trigger.hasClass('collapsed'))
      });

      //= initialize smooth scroll plugin
      smoothScroll.init({
        offset: 60,
        speed: 1000,
        updateURL: false
      });

      // initializing owlCarousel
      $("#owl-slider").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay: true
      });

      // initialize waypoints for section-headings
      $('.section-heading').waypoint(function(direction) {
        if (direction === 'down') $(this.element).addClass('fadeInUp');
        else $(this.element).removeClass('fadeInUp');
      }, { offset: '96%' });
    });

    autoPlayYouTubeModal = function() {
      $('#play-video').on("click",function() {
        var theModal = $(this).data("target"),
          videoSRC = $('#video-modal iframe').attr('src'),
          videoSRCauto = videoSRC + "?autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').on("click",function() {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
        $('.modal').on("click",function() {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
      });
    };

    matchHeight = function(selector){
      var height, max = 0, $selector = $(selector);
      $selector.each(function(index, item){
        height = $(item).height();
        if (height > max) max = height;
      });
      $selector.height(max);
    };
  </script>