@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mt-5 pt-3" style="font-family: 'Lato', sans-serif;">
    <h2 class="text-center mb-4 text-dark" style="font-family: 'Montserrat', sans-serif;">Contact Us</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="custom-card">
                <div class="card-body">
                    <h3 class="text-dark" style="font-family: 'Lato', sans-serif;">Get in Touch</h3>
                    <p class="text-secondary" style="font-family: 'Lato', sans-serif;">If you have any questions, please fill out the form below and we'll get back to you as soon as possible.</p>
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        @guest
                        <div class="form-group">
                            <label for="name" class="text-dark" style="font-family: 'Lato', sans-serif;">Your Name</label>
                            <input type="text" class="form-control bg-light text-dark border-dark" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-dark" style="font-family: 'Lato', sans-serif;">Your Email</label>
                            <input type="email" class="form-control bg-light text-dark border-dark" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="text-dark" style="font-family: 'Lato', sans-serif;">Subject</label>
                            <input type="text" class="form-control bg-light text-dark border-dark" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-dark" style="font-family: 'Lato', sans-serif;">Message</label>
                            <textarea class="form-control bg-light text-dark border-dark" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <input type="hidden" name="role">
                        <button type="submit" class="btn btn-dark btn-block" style="font-family: 'Lato', sans-serif;">Send Message</button>
                        @else
                        <div class="form-group">
                            <label for="name" class="text-dark" style="font-family: 'Lato', sans-serif;">Your Name</label>
                            <input type="text" class="form-control bg-light text-dark border-dark" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-dark" style="font-family: 'Lato', sans-serif;">Your Email</label>
                            <input type="email" class="form-control bg-light text-dark border-dark" id="email" name="email" value="{{ Auth::user()->email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="text-dark" style="font-family: 'Lato', sans-serif;">Subject</label>
                            <input type="text" class="form-control bg-light text-dark border-dark" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-dark" style="font-family: 'Lato', sans-serif;">Message</label>
                            <textarea class="form-control bg-light text-dark border-dark" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                        <button type="submit" class="btn btn-dark btn-block" style="font-family: 'Lato', sans-serif;">Send Message</button>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="custom-card">
                <div class="card-body">
                    <h3 class="text-dark" style="font-family: 'Lato', sans-serif;">Contact Information</h3>
                    <p class="text-dark" style="font-family: 'Lato', sans-serif;"><strong>Email:</strong> support@camboevents.com</p>
                    <p class="text-dark" style="font-family: 'Lato', sans-serif;"><strong>Phone:</strong> +855 23 458 896 (Khmer/English/Chinese)<br>
                        +855 12 558 234 (Khmer/Vietnam)<br>
                        +855 10 468 485 (Khmer/Thai)</p>
                    <p class="text-dark" style="font-family: 'Lato', sans-serif;"><strong>Address:</strong> 123 Street, Phnom Penh, Cambodia</p>
                    <h3 class="text-dark mt-4" style="font-family: 'Lato', sans-serif;">Our Location</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3672312003556!2d104.89579241532567!3d11.582402691772802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517bf7757d23%3A0x965c34888684bf1!2sParagon%20International%20University!5e0!3m2!1sen!2skh!4v1687256759371!5m2!1sen!2skh" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
