@if(auth()->user()->role =='receptionist')
<li>
    <a href="/doctors">
      <i class="nc-icon nc-single-02"></i>
      <p>Doctors</p>
  </a>
</li>
<li>
    <a href="/appointments">
      <i class="nc-icon nc-book-bookmark"></i>
      <p>Appointments</p>
  </a>
</li>
<li>
    <a href="/profile">
      <i class="nc-icon nc-bullet-list-67"></i>
      <p>My Information</p>
  </a>
</li>
@endif