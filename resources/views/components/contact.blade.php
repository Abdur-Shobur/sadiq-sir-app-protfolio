@php
    $profileData = $profile ?? \App\Models\Profile::first();
@endphp

<section class="contact section-padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 valign">
                <div class="sec-head info-box full-width md-mb80">
                    <div class="phone fz-30 fw-600 underline main-color">
                        <a href="tel:{{ $profileData->phone ?? '+1 840 841 25 69' }}">{{ $profileData->phone ?? '01111111' }}</a>
                    </div>
                    <div class="morinfo mt-50 pb-30 bord-thin-bottom">
                        <h6 class="mb-15">Address</h6>
                        <p>{{ $profileData->address ?? 'Test Address' }}</p>
                    </div>
                    <div class="morinfo mt-30 pb-30 bord-thin-bottom">
                        <h6 class="mb-15">Email</h6>
                        <p><a href="mailto:{{ $profileData->email ?? 'test@test.com' }}">{{ $profileData->email ?? 'test@test.com' }}</a></p>
                    </div>

                    <div class="social-icon mt-50">
                        @if($socialMedia)
                            @if($socialMedia->facebook)
                                <a href="{{ $socialMedia->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($socialMedia->twitter)
                                <a href="{{ $socialMedia->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($socialMedia->linkedin)
                                <a href="{{ $socialMedia->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if($socialMedia->instagram)
                                <a href="{{ $socialMedia->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                        @else
                            <a href="#0"><i class="fab fa-facebook-f"></i></a>
                            <a href="#0"><i class="fab fa-dribbble"></i></a>
                            <a href="#0"><i class="fab fa-behance"></i></a>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1 valign">
                <div class="full-width">
                    <div class="sec-head mb-50">
                        <h6 class="sub-title main-color mb-15">Let's Chat</h6>
                        <h3 class="text-u ls1">
                            Send a <span class="fw-200">message</span>
                        </h3>
                    </div>
                    <form id="contact-form" class="form2" method="post" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="controls row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_name" type="text" name="name" placeholder="Name" required="required" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input id="form_email" type="email" name="email" placeholder="Email" required="required" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-30">
                                    <input id="form_subject" type="text" name="subject" placeholder="Subject" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" placeholder="Message" rows="4" required="required"></textarea>
                                </div>
                                <div id="contact-message" class="contact-message" style="display: none;"></div>
                                <div class="mt-30">
                                    <button type="submit" class="butn butn-full butn-bord radius-30" id="contact-submit-btn">
                                        <span class="text">Let's Talk</span>
                                        <span class="loader-spinner" style="display: none; margin-left: 10px;">
                                            <i class="fas fa-spinner fa-spin"></i> Sending...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>

.contact {
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
        -webkit-box-shadow: 0 0 0px 1000px #000000 inset !important; /* Changes background color */
        -webkit-text-fill-color: #fff !important; /* Changes text color */
        color: #fff !important;
        background-color: #000000 !important;
    }
}

/* Loader spinner styles */
#contact-submit-btn .loader-spinner {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

#contact-submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    pointer-events: none;
}

/* Contact message styles */
#contact-message {
    margin-top: 15px;
    margin-bottom: 15px;
    padding: 12px 20px;
    border-radius: 5px;
    font-size: 14px;
    line-height: 1.5;
    animation: slideDown 0.3s ease-out;
}

#contact-message.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

#contact-message.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>
@endpush
