<div>
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>brand companies</h2>
                {{-- <p>What they are saying about us</p> --}}
            </div>

            <div class="owl-carousel testimonials-carousel" data-aos="fade-up">
                @foreach ($sliders as $slider)
                    <div class="testimonial-item">
                        <img src="{{ asset($slider->image) }}" class="   testimonial-img" alt="">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Proin iaculis purus consequat sem cure digni ssim donec
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <h3>{{ $slider->name }}</h3>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Testimonials Section -->
</div>
</div>
