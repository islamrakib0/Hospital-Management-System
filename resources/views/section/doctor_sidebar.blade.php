@if(auth()->user()->role =='doctor')
<li>
    <a href="/appointments">
      <i class="nc-icon nc-book-bookmark"></i>
      <p>My Appointment</p>
  </a>
</li>
<li>
    <a href="/profile">
      <i class="nc-icon nc-single-02"></i>
      <p>My Account</p>
  </a>
</li>
@endif