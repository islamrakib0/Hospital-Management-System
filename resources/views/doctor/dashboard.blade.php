@if(auth()->user()->role =='doctor')
<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-body ">
      <div class="row">
        <div class="col-5 col-md-4">
          <div class="icon-big text-center icon-warning">
            <i class="nc-icon nc-book-bookmark text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>My Appointments</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/appointments" class="">
        <div class="stats text-center">
          <i class="fa fa-search"></i> View
        </div>
      </a>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-body ">
      <div class="row">
        <div class="col-5 col-md-4">
          <div class="icon-big text-center icon-warning">
            <i class="nc-icon nc-single-02 text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>My Account</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/profile" class="">
        <div class="stats text-center">
          <i class="fa fa-search"></i> View
        </div>
      </a>
    </div>
  </div>
</div>

@endif