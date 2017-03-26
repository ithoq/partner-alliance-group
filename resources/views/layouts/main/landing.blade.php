<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.main.fragments.head')
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="60">
  <div class="wrapper">
    
    <!-- Navigation -->
    @include('layouts.main.fragments.navi')
    <!-- End Navigation -->

    <header id="header">
      <div class="container">
        
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="intro-text">
              <h2 class="section-heading animated">Stunning Design With Awesome Layouts</h2>
              <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis <br> quisquam animi iusto, modi natus iste?</p>
            </div>
          </div>  
        </div>

        <div id="video-container">
          <a id="play-video" href="#" data-toggle="modal" data-target="#video-modal" data-backdrop="true">
            <img src="assets/images/landing-page/video-bg.png" alt="">
            <span class="play-icon">
              <img src="assets/images/landing-page/play-icon.png" alt="">
            </span>
          </a>
        </div>
      </div><!-- .container -->
    </header><!-- #header -->

    <div class="modal fade video-modal" id="video-modal" role="dialog">
      <div class="modal-content">
        <iframe src="https://player.vimeo.com/video/160856876" width="860" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>
    </div><!-- #video-modal -->

    <section id="features">
      <div class="container">

        <div class="text-center">
          <h2 class="section-heading animated">Working to Build A Better Web</h2>
          <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus sunt quisquam ea distinctio unde, iste doloribus iure dignissimos rerum eaque ipsum nostrum. Non deserunt reprehenderit eaque libero sunt, nam optio.</p>
        </div><!-- .text-center -->

        <div class="row text-center">

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/tie.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/pig.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/pointer.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->
          
        </div><!-- .row -->
      </div><!-- .container -->
    </section><!-- #features -->

    <section id="brief">
      <div id="brief-img">
        <img src="assets/images/landing-page/img-1.jpg" alt="">
      </div><!-- #brief-img -->

      <div class="container">
        <div id="brief-text">
          <h2 class="section-heading animated">Creative &amp; Professional</h2>
          <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo sit non sunt, a numquam reiciendis expedita possimus quisquam ipsam veritatis doloribus voluptas illum, nostrum perspiciatis laudantium minima obcaecati maxime laborum.</p>
          <ul>
            <li>
              <img class="item-icon" src="assets/svg/check.svg" alt="">
              <span class="item-text">Home Audio Recording For Everyone</span>
            </li>
            <li>
              <img class="item-icon" src="assets/svg/check.svg" alt="">
              <span class="item-text">Understanding Operating Systems</span>
            </li>
            <li>
              <img class="item-icon" src="assets/svg/check.svg" alt="">
              <span class="item-text">Compare Prices Find The Best</span>
            </li>
          </ul>
        </div><!-- #brief-text -->
      </div><!-- .container -->
    </section><!-- #brief -->

    <section id="states" class="bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="col-inner text-center">
              <h3 class="counterUp">51</h3>
              <h4>The Advantages</h4>
              <p>If you are a male over the age of 40 and are suffering from weakness, impotence, pain</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-3 col-sm-6">
            <div class="col-inner text-center">
              <h3 class="counterUp">2542</h3>
              <h4>Active Users</h4>
              <p>Chamomile is known worldwide to be a calming sleep aid, a remedy to ease an upset stomach</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-3 col-sm-6">
            <div class="col-inner text-center">
              <h3 class="counterUp">8546</h3>
              <h4>Vasectomy</h4>
              <p>Classical homeopathy is generally defined as a system of medical treatment </p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-3 col-sm-6">
            <div class="col-inner text-center">
              <h3 class="counterUp">1258</h3>
              <h4>Asperger</h4>
              <p>LASIK is the most commonly performed refractive surgery.</p>
            </div>
          </div><!-- /.col -->
        </div><!-- .row -->
      </div><!-- .container -->
    </section><!-- #states -->

    <section id="subscribe">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="text-center">
              <h2 class="section-heading animated">Subscribe</h2>
              <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt accusantium est illum ratione corporis?</p>
            </div>
          </div><!-- /.col -->
        </div><!-- .row -->

        <div class="subs-form">
          <form action="#" class="form-horizontal">
            <div class="col-md-4">
              <div class="control-wrap">
                <input type="text" class="form-control" placeholder="Your Name">
                <img src="assets/svg/users.svg" alt="">
              </div>
            </div><!-- /.col -->

            <div class="col-md-4">
              <div class="control-wrap">
                <input type="text" class="form-control" placeholder="Your Email">
                <img src="assets/svg/email.svg" alt="">
              </div>
            </div><!-- /.col -->

            <div class="col-md-4">
              <input type="submit" value="SUBSCRIBE NOW" class="btn btn-block btn-primary">
            </div><!-- /.col -->
          </form>
        </div>
      </div><!-- .container -->
    </section><!-- #subscribe -->

    <section id="price">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="text-center">
              <h2 class="section-heading animated">Our Prices</h2>
              <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt accusantium est illum ratione corporis?</p>
            </div>
          </div><!-- /.col -->
        </div><!-- .row -->

        <div class="row">
          <div class="col-md-4 price-column">
            <div class="price-column-inner">
              <header>
                <h4>Basic</h4>
                <h3>Free</h3>
              </header>
              <ul>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Simple Install</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Unlimited Projects</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/remove.svg" alt="">
                  <span class="crossed">After Hourss Support</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/remove.svg" alt="">
                  <span class="crossed">Unlimited Storage</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/remove.svg" alt="">
                  <span class="crossed">Desdcated Server</span>
                </li>
              </ul>
              <footer class="text-center">
                <button class="btn btn-default">BUY NOW</button>
              </footer>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4 price-column">
            <div class="price-column-inner">
              <header>
                <h4>Professional</h4>
                <h3>$<span class="counterUp">49</span></h3>
              </header>
              <ul>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Simple Install</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Unlimited Projects</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>After Hourss Support</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/remove.svg" alt="">
                  <span class="crossed">Unlimited Storage</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/remove.svg" alt="">
                  <span class="crossed">Desdcated Server</span>
                </li>
              </ul>
              <footer class="text-center">
                <button class="btn btn-primary">BUY NOW</button>
              </footer>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4 price-column">
            <div class="price-column-inner">
              <header>
                <h4>Unlimited</h4>
                <h3>$<span class="counterUp">415</span></h3>
              </header>
              <ul>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Simple Install</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Unlimited Projects</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>After Hourss Support</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Unlimited Storage</span>
                </li>
                <li>
                  <img class="item-icon" src="assets/svg/check.svg" alt="">
                  <span>Desdcated Server</span>
                </li>
              </ul>
              <footer class="text-center">
                <button class="btn btn-default">BUY NOW</button>
              </footer>
            </div>
          </div><!-- /.col -->
        </div><!-- .row -->
      </div><!-- .container -->
    </section><!-- #price -->

    <section id="reviews">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="text-center">
              <img src="assets/images/landing-page/talk-bubble.png" alt="">
            </div>
            <div id="owl-slider" class="owl-carousel owl-theme">
              <div class="item">
                <p class="review-text">Being the richest man in the cemetery doesn't matter to me. Going to bed at night saying we've done something wonderful, that's what matters to me.</p>
                <h4 class="reviewer">Steve Jobs</h4>
              </div>
              
              <div class="item">
                <p class="review-text">Technology is just a tool. In terms of getting the kids working together and motivating them, the teacher is the most important</p>
                <h4 class="reviewer">Bill Gates</h4>
              </div>

              <div class="item">
                <p class="review-text">When you give everyone a voice and give people power, the system usually ends up in a really good place. So, what we view our role as, is giving people that power.</p>
                <h4 class="reviewer">Mark Zuckerberg</h4>
              </div>
            </div><!-- #owl-slider -->
          </div><!-- /.col -->
        </div>
      </div><!-- .container -->
    </section><!-- #reviews -->
    
    @include('layouts.main.fragments.footer')
</body>
</html>