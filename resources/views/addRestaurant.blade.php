@include('format.header')

<section class="bg-primary" id="about">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="col-lg-4 mx-auto">
              <h1 class="text-uppercase">
                <strong>Add A Place</strong>
              </h1>
              <hr>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="contact-form" role="form" method="POST" action="{{ url('/addRestaurant') }}">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="restaurant">Restaurant Name</label>
                                            <input type="text" class="form-control" name="restaurant" required="required">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Menu</label>
                                            <input type="text" class="form-control" name="menu" required="required">
                                        </div>  
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control" name="type" required="required">
                                        </div> 
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" required="required">
                                        </div>  
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="contact" required="required">
                                        </div>               
                                    </div>
                                    <div class="col-sm-7">                        
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea name="details" id="details" required="required"  class="form-control" rows="8"></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg" required="required">Post </button>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@include('format.footer')
