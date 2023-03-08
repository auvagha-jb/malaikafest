@extends('layout.Customer.header-footer') 

@section('content')
<link rel="stylesheet" type="text/css" href="/css/Customer/contact.css">
<div class="container">
        <div class="text">Contact Us</div>

        <form action="#">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">First Name</label>
              </div>
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Last Name</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Email Address</label>
              </div>
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Website Name</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data textarea">
                 <textarea rows="8" cols="80" required></textarea>
                 <br />
                 <div class="underline"></div>
                 <label for="">Write your message</label>
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="submit">
                    </div>
                 </div>
              </div>
           </div>
        </form>
<br><br><br><br><br><br>

         <div class="text">Our Location</div>
         <div class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.046892763057!2d36.81425!3d-1.31863735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1056c8277fa1%3A0xb4526fb3c6c6f763!2sT-Mall!5e0!3m2!1sen!2ske!4v1675719430181!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
</div>

@endsection
