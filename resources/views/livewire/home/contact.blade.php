<div>
    <div class="content">
        <!--  section  -->
        <section class="hidden-section single-par2" data-scrollax-parent="true" wire:ignore>
            <div class="bg-wrap bg-parallax-wrap-gradien">
                <div class="bg par-elem "  data-bg="{{ asset('img/slider-2.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
            </div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Our Contacts</span></h2>
                    {{-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4> --}}
                </div>
                <div class="scroll-down-wrap">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                    <span>Scroll Down To Discover</span>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <!-- breadcrumbs-->
        <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
            <div class="container">
                <div class="breadcrumbs-list">
                    <a href="/">Home</a><span>Contact</span>
                </div>

            </div>
        </div>

        <div class="row mt-4" style="padding:0px;">
            <div class="col-md-6" style="padding:35px">
                <div class="box-widget fl-wrap fixed-column_menu-init" style="margin-top: 35px;">
                    <div class="box-widget-content fl-wrap " >
                        <div class="box-widget-title fl-wrap"><h2>We Are Ready to Help</h2></div>
                        <div class="faq-nav scroll-init fl-wrap">
                            <p style="font-size:16px">Your feedback is invaluable to us as we continuously strive to improve our services. If you have any suggestions, comments, or complaints, please don’t hesitate to share them with us. We are committed to addressing your inquiries promptly and professionally.</p>
                            <p style="font-size:16px">Feel free to reach us @ <a href="mailto:support@fyndconcepts.org">support@fyndconcepts.org</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding:35px">
                <div class="contact-form-container">
                    <div class="contact-form-main fl-wrap" style="border:1px solid #eee; margin-top:-155px;">
                        <div class="contact-form-header">
                            <h4>Get In Touch</h4>
                            {{-- <span class="close-contact-form"><i class="fal fa-times"></i></span> --}}
                        </div>
                        <div id="contact-form" class="contact-form fl-wrap">
                            <div id="message"></div>
                            <form  class="custom-form" action="" name="contactform" id="contactform">
                                <fieldset>
                                    <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                    <input type="text" wire:model="name" placeholder="Your Name *" value=""/>
                                    @error('name')
                                        <label class="text-danger"> {{ $message }} </label>
                                    @enderror

                                    <label>Your mail* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                    <input type="text"  wire:model="email" placeholder="Email Address*" value=""/>
                                    @error('email')
                                        <label class="text-danger"> {{ $message }} </label>
                                    @enderror

                                    <label>Your Mobile Number* <span class="dec-icon"><i class="fas fa-phone"></i></span></label>
                                    <input type="text" wire:model="phone_no" placeholder="Phone Number*" value=""/>
                                    @error('phone_no')
                                        <label class="text-danger"> {{ $message }} </label>
                                    @enderror

                                    <textarea wire:model="message" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                    @error('message')
                                        <label class="text-danger"> {{ $message }} </label>
                                    @enderror
                                </fieldset>
                                <button class="btn float-btn color-bg" style="margin-top:15px;" wire:click="submit">Send Message</button>
                            </form>
                        </div>
                        <!-- contact form  end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs end -->
        <!-- section -->
        {{-- <section class="gray-bg small-padding">
            <div class="container">
                <div class="row">
                    <!-- services-item -->
                    <div class="col-md-4">
                        <div class="services-item fl-wrap">
                            <i class="fal fa-envelope"></i>
                            <h4>Our Mails <span>01</span></h4>
                            <a href="mailto:support@fyndconcepts.org" class="serv-link sl-b">support@fyndconcepts.org</a>
                        </div>
                    </div>
                    <!-- services-item  end-->
                    <!-- services-item -->
                    <div class="col-md-4">
                        <div class="services-item fl-wrap">
                            <i class="fal fa-phone-rotary"></i>
                            <h4>Our Phones<span>02</span></h4>
                            <a href="#" class="serv-link sl-b">+234 813 027 3064</a>
                        </div>
                    </div>
                    <!-- services-item  end-->
                    <!-- services-item -->
                    <div class="col-md-4">
                        <div class="services-item fl-wrap">
                            <i class="fal fa-map-marked"></i>
                            <h4>Our Adress <span>03</span></h4>
                            <a href="#" class="serv-link sl-b">---</a>
                        </div>
                    </div>
                    <!-- services-item  end-->
                </div>

            </div>
        </section> --}}
        <!-- section end-->
    </div>
</div>
