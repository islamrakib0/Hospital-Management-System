@if(auth()->user()->role =='admin')
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
            <p class="card-category"><b>Appointments</b></p>
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
            <i class="nc-icon nc-time-alarm text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>Timeslots</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/timeslots" class="">
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
            <i class="nc-icon nc-tag-content text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>Doctor Fees</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/doctorfees" class="">
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
            <p class="card-category"><b>Tests</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/tests" class="">
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
            <i class="nc-icon nc-single-copy-04 text-warning"></i>
          </div>
        </div>
        <div class="col-7 col-md-8">
          <div class="numbers">
            <p class="card-category"><b>Patient Tests</b></p>
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
            <p class="card-category"><b>Patient Medicines</b></p>
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
            <p class="card-category"><b>Prescriptions</b></p>
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
            <p class="card-category"><b>Patients</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/patients" class="">
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
            <p class="card-category"><b>Finance</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/finance" class="">
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
            <p class="card-category"><b>Users</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer ">
      <hr>
      <a href="/users" class="">
        <div class="stats text-center">
          <i class="fa fa-search"></i> View
        </div>
      </a>
    </div>
  </div>
</div>
@endif