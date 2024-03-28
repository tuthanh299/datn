@extends('layouts.app')
@section('content')
      <!-- Content -->
      <div class="wrap-main">
        <div class="wrap-content">
          <div class="title-main">
            LIÊN HỆ
          </div>
          <div class="content-main" style="gap: 20px; display: flex;justify-content: space-between;">
            <div class="contact-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus unde obcaecati ipsa maiores ipsum voluptas
              debitis odit rerum, eius, quis at quam? Laborum libero amet quod labore debitis sequi provident
              consectetur totam? Iusto, ut aspernatur sed quis aliquam excepturi error praesentium optio aperiam
              sapiente eius magnam adipisci impedit, quos architecto asperiores id enim ducimus consectetur ullam vero
              ratione accusantium sunt. Ea magnam dignissimos assumenda minus vero voluptates placeat corrupti vitae
              vel. Minima blanditiis, vitae ducimus dicta dolores suscipit quam eveniet mollitia distinctio amet rem
              ullam molestiae voluptatum nostrum nihil, ad in a atque. Quia accusantium, illum et quidem voluptates
              eius. Quod est fuga iure, optio minus quae vitae illum consequatur exercitationem natus id maiores
              corrupti quos veniam ullam ut, eum tempore eos. Eius eveniet cum nemo reprehenderit? Eveniet, fuga itaque
              mollitia saepe consequatur sunt labore, magnam adipisci reiciendis fugit nobis delectus sint eos quidem a
              facere at nulla unde ab minima eligendi nemo! Laudantium, maiores repellat sapiente sed quia commodi ipsum
              quas magnam molestiae, quidem molestias magni, voluptas voluptate suscipit quam. Laboriosam architecto vel
              earum temporibus est eveniet nostrum magnam nesciunt et. Sint illo aliquid rem ad illum mollitia officia
              hic autem voluptatum fuga amet dolore, corrupti maiores, saepe tempore?
            </div>
            <div class="contact-form-whole">
              <!--Section: Contact v.2-->
              <section class="mb-4"> 
                <div class="row">

                  <!--Grid column-->
                  <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST"> 
                      <!--Grid row-->
                      <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                          <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                          </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                          <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                          </div>
                        </div>
                        <!--Grid column-->

                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                          </div>
                        </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                          <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2"
                              class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                          </div>

                        </div>
                      </div>
                      <!--Grid row-->

                    </form>

                    <div class="text-center text-md-left">
                      <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                    </div>
                    <div class="status"></div>
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                      <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p> </p>
                      </li>

                      <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p> </p>
                      </li>

                      <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p> </p>
                      </li>
                    </ul>
                  </div>
                  <!--Grid column-->

                </div>

              </section>
              <!--Section: Contact v.2-->
            </div>

          </div>
        </div>
      </div>
@endsection