@if(auth()->user()->role =='patient')
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
            <p class="card-category"><b>Book Appointments</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/appointments/create" class="">
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
            <i class="nc-icon nc-book-bookmark text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>View Appointments</b></p>
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
            <i class="nc-icon nc-zoom-split text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>Test History</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/patienttests" class="">
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
            <i class="nc-icon nc-money-coins text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>Medicine Purchases</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/patientmedicines" class="">
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
            <i class="nc-icon nc-paper text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>Doctor Prescriptions</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/prescriptions" class="">
        <div class="stats text-center">
          <i class="fa fa-search"></i> View
        </div>
      </a>
    </div>
  </div>
</div>
@endif