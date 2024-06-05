@extends('layout')
@section('title','contact Us')
@section('content')
<section class="contact">
    <h2>Contact Us</h2>
    <form class="contact-form" action="#" method="post">
        @csrf
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <input type="submit" value="Send Message">
    </form>
</section>
@endsection