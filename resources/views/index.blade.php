@include('format.header')


<header class="masthead text-center text-white d-flex">
  <div class="container my-auto">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h1 class="text-uppercase">
          <strong>Your Favorite Restaurant Review Site</strong>
        </h1>
        <hr>
      </div>
      <div class="col-lg-8 mx-auto">
        <p class="text-faded mb-5">A Community Where Food Lovers Can Review About There Food Experiences...</p>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
      </div>
    </div>
  </div>
</header>




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
        <strong>Reviews</strong>
      </h1>
      <hr>
    </div>
  <div class="container">
  @foreach ($reviews as $reviews)
  <div class="row">
    <div class="leftSide">
      <h3>{{$reviews->menu}}</h3>
      <div class="row">
        <div class="left">
          <img class="img" src="img/page1_pic3.jpg"/>
        </div>
        <div class="right">
          <p class="para4">Posted By: {{$reviews->user->name}}</p>
          <p class="para2">Restaurant Name: {{$reviews->restaurent->name}}</p>
          <p class="para">{{$reviews->details}}</p>
          <p class="para3"> Rating: {{$reviews->rating}} </p>
          <p>{{$reviews->updated_at}} 
            @if(!Auth::guest()) 
              | <button id="commentbox{{$reviews->id}}" onclick="comment({{$reviews->id}})">Comment</button></p><br/>   
            @endif
          <div id="commentFormDiv{{$reviews->id}}"  style="display:none;">
            <form id="commentform{{$reviews->id}}" data-review-id="{{$reviews->id}}" class="formClass">
                  <input id="name{{$reviews->id}}" type="text" class="form-control" placeholder="Write a comment" name="name">
                  <input id="button" type="submit" value="Submit"></input>
            </form>

          </div>


          <div>
            <h4>================Comments==================</h4>
          </div>

          
          <div id="comments{{$reviews->id}}">
            @foreach($comments as $comments)
              <div id="commentedDiv{{$comments->id}}">
                <div id="userDiv{{$comments->uid}}">
                  <h3>{{$comments->user->name}}</h3>
                </div>
                <p id="commentPara{{$comments->id}}">{{$comments->comment}}</p>
                <button id="dlt{{$comments->id}}" class="button-delete" data-comment-id="{{$comments->id}}">Remove</button>
                
              </div>
            @endforeach
          </div>

          


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

   
