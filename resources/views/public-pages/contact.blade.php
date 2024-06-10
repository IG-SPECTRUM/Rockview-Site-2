@extends("layouts/website-layout")
@section("title")
  Contact
@endsection
@section("content")
<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/back.gif">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Contact
                            Us</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Do you have other questions? Don't worry, there aren't any dumb questions. Just
                    fill out the form below and we'll get back to you as soon as possible.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">Contact Us</h2>
            </div>
        </div>
        
        @if(@session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span>Your message has been submited successfully.</span>
            </div>
        @endif

        @if(@session('error')) 
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Something went wrong. Try again. </span>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <form action="{{ route('submit-contact-form') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" id="name" name="name" value="{{ old('name') }}" placeholder="Your Name *">
                        @error("name")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" id="mail" name="email" value="{{ old('email') }}" placeholder="Your Email *">
                        @error("email")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control mb-3" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" 
                        placeholder="Your phone number *">
                        @error("phone_number")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject *">
                        @error("subject")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control mb-3"placeholder="Your Message *"> {{ old('message') }} </textarea>
                        @error("message")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- /contact -->

<!-- gmap -->
<section class="section pt-0">
    <!-- Google Map -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3849.309219261922!2d28.19495487674907!3d-15.250923771921459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19405ba7e5dfb38b%3A0x244274f202d92aa1!2sRockview%20university%2010miles%20Campus!5e0!3m2!1sen!2szm!4v1715844049823!5m2!1sen!2szm"
        width="2000" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>
<!-- /gmap -->
@endsection