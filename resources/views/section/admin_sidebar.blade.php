@if(auth()->user()->role =='admin')
<li>
    <a href="/appointments">
      <i class="nc-icon nc-book-bookmark"></i>
      <p>Appointments</p>
  </a>
</li>
<li>
    <a href="/timeslots">
      <i class="nc-icon nc-time-alarm"></i>
      <p>Timeslots</p>
  </a>
</li>
<li>
    <a href="/doctorfees">
      <i class="nc-icon nc-tag-content"></i>
      <p>Doctor Fees</p>
  </a>
</li>
<li>
    <a href="/doctorschedules">
      <i class="nc-icon nc-badge"></i>
      <p>Doctor Schedules</p>
  </a>
</li>
<li>
    <a href="/tests">
      <i class="nc-icon nc-zoom-split"></i>
      <p>Tests</p>
  </a>
</li>
<li>
    <a href="/patienttests">
      <i class="nc-icon nc-single-copy-04"></i>
      <p>Patient Tests</p>
  </a>
</li>
<li>
    <a href="/patientmedicines">
      <i class="nc-icon nc-money-coins"></i>
      <p>Patient Medicines</p>
  </a>
</li>
<li>
    <a href="/prescriptions">
      <i class="nc-icon nc-paper"></i>
      <p>Prescriptions</p>
  </a>
</li>
<li>
    <a href="/doctors">
      <i class="nc-icon nc-single-02"></i>
      <p>Doctors</p>
  </a>
</li>
<li>
    <a href="/patients">
      <i class="nc-icon nc-single-02"></i>
      <p>Patients</p>
  </a>
</li>
<li>
    <a href="/finance">
      <i class="nc-icon nc-credit-card"></i>
      <p>Finance</p>
  </a>
</li>
<li>
    <a href="/users">
      <i class="nc-icon nc-single-02"></i>
      <p>Users</p>
  </a>
</li>
@endif