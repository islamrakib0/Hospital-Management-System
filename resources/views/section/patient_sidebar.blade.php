@if(auth()->user()->role =='patient')
<li>
    <a href="/appointments/create">
      <i class="nc-icon nc-book-bookmark"></i>
      <p>Book Appointment</p>
  </a>
</li>
<li>
    <a href="/appointments">
      <i class="nc-icon nc-book-bookmark"></i>
      <p>View Appointments</p>
  </a>
</li>
<li>
    <a href="/patienttests">
      <i class="nc-icon nc-single-copy-04"></i>
      <p>Test History</p>
  </a>
</li>
<li>
    <a href="/patientmedicines">
      <i class="nc-icon nc-money-coins"></i>
      <p>Medicine Purchases</p>
  </a>
</li>
<li>
    <a href="/prescriptions">
      <i class="nc-icon nc-paper"></i>
      <p>Doctor Prescriptions</p>
  </a>
</li>
@endif