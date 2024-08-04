    <!-- Footer Start -->

    <section class="footer" >
      <!-- Remove the container if you want to extend the Footer to full width. -->
      <div class="my-5">
        <!-- Footer -->
        <footer
          class="text-center text-lg-start text-white"
          style="background-color: #0a0a0a"
        >
          <!-- Grid container -->
          <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
              <!--Grid row-->
              <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                  <h5 class="text-uppercase">About Us</h5>

                  <p>
                    FlexiSports is a sports wear brand based in Sialkot,
                    Pakistan. We specialize in football, hockey, cricket and
                    other sports attire. Our products are loved by customers
                    across Europe and beyond. At FlexiSports, we are committed
                    to delivering high-quality sports wear that enhances your
                    performance and style on the field.
                  </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                  <h5 class="text-uppercase">Help</h5>

                  <ul class="list-unstyled mb-0">
                    <li style="margin-bottom: 4px;">
                      <a href="privacy" class="text-white">Privacy Policy</a>
                    </li>
                    <li style="margin-bottom: 4px;">
                      <a href="term-conditions " class="text-white">Terms and Conditions</a>
                    </li>

                  </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                  <h5 class="text-uppercase">Company</h5>

                  <ul class="list-unstyled mb-0">
                    <li style="margin-bottom: 4px;">
                      <a href="contact" class="text-white">Contact Us</a>
                    </li>
                    <li style="margin-bottom: 4px;">
                      <a href="gurantee" class="text-white">Money Back Guarantee</a>
                    </li>
                    <li style="margin-bottom: 4px;">
                      <a href="refund" class="text-white">Refund Policy</a>
                    </li>

                  </ul>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </section>
            <!-- Section: Links -->


            <?php 
            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                echo "            <hr class='mb-4' />

                <!-- Section: CTA -->
                <section class=''>
                  <p class='d-flex justify-content-center align-items-center'>
                    <span class='me-3'>Register for free</span>
                    <button
                      id='login-button'
                      type='button'
                      class='btn btn-outline-light btn-rounded'
                    >
                      <a
                        style='text-decoration: none'
                        href='#myModal'
                        onclick='hideDiv()'
                        ;
                        data-toggle='modal'
                        >Sin Up!</a
                      >
                    </button>
                  </p>
                </section>
                <!-- Section: CTA -->
    ";
            }

?>

<a />
            <hr class="mb-4" />

            <!-- Section: Social media -->
            <section class="mb-4 text-center">
              <!-- Facebook -->
              <a
                class="btn btn-outline-light btn-floating m-1"
                href="https://www.facebook.com/profile.php?id=100094035506902&mibextid=ZbWKwL"
                role="button"
                target="_blank"
                ><i class="fab fa-facebook-f"></i
              ></a>
              
                            <!-- Whatsapp -->
              <a
                class="btn btn-outline-light btn-floating m-1"
                href="https://wa.me/923106931894"
                role="button"
                target="_blank"
                > <i class="fa-brands fa-whatsapp"></i></a>

              <!-- Twitter -->
              <a
                class="btn btn-outline-light btn-floating m-1"
                href="https://twitter.com/FlexiSports894"
                role="button"
                target="_blank"
                ><i class="fab fa-twitter"></i
              ></a>



              <!-- Instagram -->
              <a
                class="btn btn-outline-light btn-floating m-1"
                href="https://www.instagram.com/flexisports2/"
                role="button"
                target="_blank"
                ><i class="fab fa-instagram"></i
              ></a>




            </section>
            <!-- Section: Social media -->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div
            class="text-center p-3"
            style="background-color: rgba(0, 0, 0, 0.2)"
          >
            © 2023 Copyright:
            <a class="text-white" href="https://www.linkedin.com/in/muhammad-faisal-429549203/"
              >Created By Muhammad Faisal</a
            >
            <button class="" id="scroll-to-top-btn">
              <i class="fas fa-arrow-up"></i>
            </button>
          </div>
          <!-- <div class="goTop d-flex justify-content-end"> -->
          <!-- </div> -->
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </div>
    </section>
    <!-- End of .container -->
    <!-- Footer End -->
    