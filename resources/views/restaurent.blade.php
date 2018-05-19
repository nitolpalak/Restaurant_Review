 @include('format.header')
   <section class="bg-primary" id="about">
  <!-- <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="section-heading text-white">We've got what you need!</h2>
        <hr class="light my-4">
        <p class="text-faded mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
      </div>
    </div>
  </div> -->
  <div class="col-lg-2 mx-auto">
      <h1 class="text-uppercase">
        <strong>Restaurants</strong>
      </h1>
      <hr>
    </div>
  <div class="container">
  @foreach ($restaurants as $restaurants)
  <div class="row">
    <div class="leftSide">
      <h3>{{$restaurants->name}}</h3>
      <div class="row">
        <div class="left">
          <img class="img" src="img/page1_pic3.jpg"/>
        </div>
        <div class="right">
          <p class="para4">Restaurant Type: {{$restaurants->type}}</p>
          <p class="para2">Address: {{$restaurants->address}}</p>
          <p class="para">Contact: {{$restaurants->contact}}</p>

          


        </div>
        
      </div>
    </div>

    <div class="rightSide">
      <p class="para">In pede mi, aliquet sit amet, euismod in, auctor ut, ligula liquam dapibus tincidunt</p>

        <p>by Admin  |  09 Jul 2014</p>
    </div>
  </div>
  @endforeach
  </div>

</section>

    
  @include('format.footer')


