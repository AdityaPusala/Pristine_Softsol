<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRISTINE SOFTSOL | HOME</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f6aebad549.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo" style="width: 420px;">
                <img src="images/logo.png" alt="" style="width: 20%;">
            </div>
            <div class="nav-links" id="navLinks">
                <b>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="#about-us">ABOUT US</a></li>
                    <li><a href="#contact-us">CONTACT US</a></li> 
                    <li><a href="orders.html">MY ORDERS</a></li> 
                </ul>
                </b>
            </div>
        </nav>
    </div>
     <!-- Hero Section -->
     <section id="home" class="hero">
        <div class="hero-content">
            <h2>HEY <?php
                        if (isset($_SESSION['username'])) {
                            echo " " . strtoupper (htmlspecialchars($_SESSION['username'])) . "!";
                        } else {
                            echo "! ";
                        }
                        ?>  BUILD YOUR PERFECT WEBSITE WITH EASE</h2>
            <p>Pristine Softsol offers top-quality web development services tailored to your needs.<br> Choose from a variety of templates or customize your own website.</p>
            <a href="#services" class="hero-btn">Get Started</a>
        </div>
        <div class="illustrations">
            <img src="images/ill1.svg" alt="Illustration">
        </div>
    </section>

    <!-- services section -->
    <section id="services" class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="card">
                    <h3>Custom Website Design</h3>
                    <p>Tailored websites that match your business needs.</p>
                </div>
                <div class="card">
                    <h3>SEO Optimization</h3>
                    <p>Improve your search engine rankings and reach more customers.</p>
                </div>
                <div class="card">
                    <h3>Responsive Development</h3>
                    <p>Websites that look great on any device, from mobile to desktop.</p>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Our Process Section -->
<section id="process" class="process">
    <div class="container">
        <h2>Our Process</h2>
        <div class="process-cards">
            <div class="process-card">
                <h3>1. Consultation</h3>
                <p>We begin with a thorough discussion to understand your business goals, target audience, and branding vision.</p>
            </div>
            <div class="process-card">
                <h3>2. Select Preferences</h3>
                <p>Choose your preferred template, design style, and features using our guided selection form or questionnaire.</p>
            </div>
            <div class="process-card">
                <h3>3. Payment</h3>
                <p>Securely complete your payment using various available methods to initiate your project officially.</p>
            </div>
            <div class="process-card">
                <h3>4. Design</h3>
                <p>Our creative team designs an engaging and intuitive layout that reflects your brand’s identity and values.</p>
            </div>
            <div class="process-card">
                <h3>5. Development</h3>
                <p>We transform the design into a functional website using clean, efficient code optimized for all devices.</p>
            </div>
            <div class="process-card">
                <h3>6. Launch</h3>
                <p>After thorough testing, we launch your website and provide continuous support for updates and improvements.</p>
            </div>
        </div>
    </div>
</section>

<!----Questionnaire Section------->
<div class="custom-questionnaire">

  <style>
    .custom-questionnaire {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 30px 10px;
      display: flex;
      justify-content: center;
      background: #f9f9f9;
    }

    .custom-questionnaire form {
      background: #fff;
      max-width: 900px;
      width: 100%;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.07);
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
      box-sizing: border-box;
    }

    .custom-questionnaire h2 {
      grid-column: span 3;
      text-align: center;
      font-size: 22px;
      color: #333;
      margin-bottom: 10px;
    }

    .custom-questionnaire label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      font-weight: 600;
      color: #444;
    }

    .custom-questionnaire input,
    .custom-questionnaire select {
      width: 100%;
      padding: 10px 12px;
      font-size: 14px;
      border-radius: 6px;
      border: 1.5px solid #ccc;
      transition: border-color 0.3s ease;
      box-sizing: border-box;
    }

    .custom-questionnaire input:focus,
    .custom-questionnaire select:focus {
      outline: none;
      border-color: #ff6600;
      box-shadow: 0 0 5px rgba(255, 102, 0, 0.2);
    }

    .custom-questionnaire .full-width {
      grid-column: span 3;
    }

    .custom-questionnaire #priceDisplay {
      grid-column: span 3;
      text-align: center;
      font-weight: bold;
      font-size: 16px;
      color: #ff6600;
      margin-top: 10px;
    }

    .custom-questionnaire button {
      grid-column: span 3;
      background: #ff6600;
      color: white;
      font-weight: 600;
      font-size: 15px;
      border: none;
      padding: 12px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .custom-questionnaire button:hover {
      background-color: #e05600;
    }

    @media (max-width: 768px) {
      .custom-questionnaire h2,
      .custom-questionnaire #priceDisplay,
      .custom-questionnaire button {
        grid-column: span 2;
      }
    }

    @media (max-width: 500px) {
      .custom-questionnaire h2,
      .custom-questionnaire #priceDisplay,
      .custom-questionnaire button {
        grid-column: span 1;
      }
    }
  </style>


</div>
<div class="custom-questionnaire">


  <!-- Your form fields go here -->
   <form id="questionnaireForm" method="POST" action="questionnaire.php">
    <h2>Customer Questionnaire</h2>

    <div>
      <label>Business Name:</label>
      <input type="text" name="businessName" required>
    </div>

    <div>
      <label>Industry Type:</label>
      <input type="text" name="industryType" required>
    </div>

    <div>
      <label>Target Audience:</label>
      <input type="text" name="targetAudience" required>
    </div>

    <div>
      <label>Website Type:</label>
      <select name="websiteType" id="websiteType" required>
        <option value="">-- Select --</option>
        <option value="Landing Page">Landing Page</option>
        <option value="Portfolio">Portfolio</option>
        <option value="eCommerce">eCommerce</option>
        <option value="Blog">Blog</option>
        <option value="Custom">Custom</option>
      </select>
    </div>

    <div>
      <label>Preferred Technology:</label>
      <select name="technology" required>
        <option value="">-- Select --</option>
        <option value="HTML/CSS">HTML/CSS</option>
        <option value="WordPress">WordPress</option>
        <option value="Shopify">Shopify</option>
        <option value="Custom">Custom</option>
      </select>
    </div>

    <div>
      <label>Preferred Layout Style:</label>
      <select name="layoutStyle">
        <option value="">-- Select --</option>
        <option value="Minimalistic">Minimalistic</option>
        <option value="Modern">Modern</option>
        <option value="Professional">Professional</option>
        <option value="Creative">Creative</option>
      </select>
    </div>

    <div>
      <label>Do you have a logo?</label>
      <select name="logo">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        <option value="Need a new one">Need a new one</option>
      </select>
    </div>

    <div>
      <label>Do you need eCommerce functionality?</label>
      <select name="ecommerce" id="ecommerce" required>
        <option value="">-- Select --</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div>
      <label>Payment Gateway Integration:</label>
      <select name="paymentGateway" id="paymentGateway">
        <option value="">-- Select --</option>
        <option value="PayPal">PayPal</option>
        <option value="Stripe">Stripe</option>
        <option value="Razorpay">Razorpay</option>
        <option value="Others">Others</option>
      </select>
    </div>

    <div>
      <label>Do you need a contact form?</label>
      <select name="contactForm">
        <option value="">-- Select --</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div>
      <label>Live Chat Support:</label>
      <select name="liveChat">
        <option value="">-- Select --</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>


    <p id="priceDisplay">Estimated Price: $0</p>
    <input type="hidden" name="estimatedPrice" id="estimatedPriceInput">

    <button type="submit">Submit</button>
  </form>
</div>

<script>
  const websiteTypeEl = document.getElementById('websiteType');
  const ecommerceEl = document.getElementById('ecommerce');
  const paymentGatewayEl = document.getElementById('paymentGateway');
  const priceDisplay = document.getElementById('priceDisplay');
  const estimatedPriceInput = document.getElementById('estimatedPriceInput'); // hidden input

  function calculatePrice() {
    let price = 0;
    const websiteType = websiteTypeEl.value;
    const ecommerce = ecommerceEl.value;
    const paymentGateway = paymentGatewayEl.value;

    switch (websiteType) {
      case 'Landing Page':
        price = 200;
        break;
      case 'Portfolio':
        price = 500;
        break;
      case 'Blog':
        price = 600;
        break;
      case 'eCommerce':
        price = 1000;
        break;
      case 'Custom':
        price = 2000;
        break;
      default:
        price = 0;
    }

    if (ecommerce === 'Yes') {
      price += 500;
      if (paymentGateway === 'Stripe' || paymentGateway === 'PayPal') {
        price += 200;
      } else if (paymentGateway === 'Razorpay') {
        price += 150;
      } else if (paymentGateway === 'Others') {
        price += 100;
      }
    }

    priceDisplay.textContent = `Estimated Price: $${price}`;
    estimatedPriceInput.value = price; // send to PHP
  }

  websiteTypeEl.addEventListener('change', calculatePrice);
  ecommerceEl.addEventListener('change', calculatePrice);
  paymentGatewayEl.addEventListener('change', calculatePrice);

  calculatePrice(); // initial call
</script>


</div>



<!-- Testimonial Section -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <h2>What Our Clients Say</h2>
        <div class="testimonial-boxes">
            <div class="testimonial-card left">
                <div class="testimonial-content">
                    <div class="testimonial-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"WebDev Hub transformed our online presence. The new website is sleek, responsive, and exactly what we needed! Their team was amazing to work with, providing innovative solutions and ensuring our ideas were perfectly realized."</p>
                    <h4>- John Doe, CEO of XYZ Corp</h4>
                </div>
                <div class="testimonial-image">
                    <img src="images/client1.jpg" alt="Client 1" />
                </div>
            </div>

            <div class="testimonial-card right">
                <div class="testimonial-content">
                    <div class="testimonial-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"The team at WebDev Hub was professional and attentive. They delivered beyond our expectations. The new design not only looks great, but also improved user experience, making navigation seamless for our visitors."</p>
                    <h4>- Sarah Smith, Founder of ABC Ltd</h4>
                </div>
                <div class="testimonial-image">
                    <img src="images/client2.jpg" alt="Client 2" />
                </div>
            </div>

            <div class="testimonial-card left">
                <div class="testimonial-content">
                    <div class="testimonial-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"From start to finish, the process was smooth. We couldn't be happier with the results. The attention to detail and the creative solutions provided exceeded our expectations, and we saw a significant increase in online engagement."</p>
                    <h4>- Michael Brown, Marketing Manager at DEF Inc</h4>
                </div>
                <div class="testimonial-image">
                    <img src="images/client3.jpg" alt="Client 3" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact-us" class="contact-us">
    <h2>Contact Us</h2>
    <div class="container">
        <h2>&bull; Keep in Touch &bull;</h2>
        <div class="underline"></div>
        <div class="icon_wrapper">
            <svg class="icon" viewBox="0 0 145.192 145.192">
                <path d="M126.82,32.694c-2.804,0-5.08,2.273-5.08,5.075v2.721c-1.462,0-2.646,1.185-2.646,2.647v1.995 c0,1.585,1.286,2.873,2.874,2.873h20.577c1.462,0,2.646-1.185,2.646-2.647v-3.041c0-1.009-0.816-1.825-1.823-1.825v-2.722 c0-2.802-2.276-5.075-5.079-5.075h-1.985v-3.829c0-3.816-3.095-6.912-6.913-6.912h-0.589h-20.45c0-2.67-2.164-4.835-4.833-4.835 H56.843c-2.67,0-4.835,2.165-4.835,4.835H34.356v-3.384h-9.563v3.384v1.178h-7.061v1.416c-2.67,0.27-10.17,1.424-13.882,5.972 c-1.773,2.17-2.44,4.791-1.983,7.793c0.463,3.043,1.271,6.346,2.128,9.841c2.354,9.616,5.024,20.515,0.549,28.077 C2.647,79.44-3.125,90.589,2.201,99.547c4.123,6.935,13.701,10.44,28.5,10.44c1.186,0,2.405-0.023,3.658-0.068v9.028h-0.296 c-2.516,0-4.558,2.039-4.558,4.558v4.566h100.04v-4.564c0-2.519-2.039-4.558-4.558-4.558h-0.297V84.631h0.297 c2.519,0,4.558-2.037,4.558-4.556v-0.009c0-2.516-2.039-4.556-4.556-4.556l-36.786-0.009V61.973c0-2.193-1.777-3.971-3.972-3.971 v-4.711h0.456c1.629,0,2.952-1.32,2.952-2.949h14.227V34.459h1.658c2.672,0,4.834-2.165,4.834-4.834h20.45v3.069H126.82z M34.06,75.511 c-2.518,0-4.558,2.04-4.558,4.556v0.009c0,2.519,2.042,4.556,4.558,4.556h0.296v24.12l-0.042-1.168 c-15.994,0.574-26.122-2.523-30.106-9.229C-0.464,90.5,4.822,80.347,6.55,77.423c4.964-8.382,2.173-19.774-0.29-29.825 c-0.843-3.442-1.639-6.696-2.088-9.638c-0.354-2.35,0.129-4.3,1.484-5.958c3.029-3.714,9.509-4.805,12.076-5.1v1.233h7.061v1.49 v2.684c-2.403,1.114-4.153,2.997-4.676,5.237H18.15c-0.584,0-1.056,0.474-1.056,1.056v0.83c0,0.584,0.475,1.056,1.056,1.056h1.984 c0.561,2.18,2.304,3.999,4.658,5.092v0.029c0,0-2.282,20.823,16.479,22.099v1.102c0,1.177,0.955,2.133,2.133,2.133h3.297 c1.178,0,2.133-0.956,2.133-2.133V50.135c0-1.177-0.955-2.132-2.133-2.132h-3.297c-1.178,0-2.133,0.955-2.133,2.132 c-1.575-0.235-5.532-1.17-6.635-4.547c2.36-1.092,4.109-2.913,4.669-5.097h1.308c0.722,0,1.309-0.584,1.309-1.308v-0.578 c0-0.584-0.475-1.056-1.056-1.056h-1.539c-0.542-2.332-2.416-4.271-4.968-5.363v-2.559h17.651c0,2.67,2.166,4.835,4.836,4.835 h2.392v15.88h13.639c0,1.629,1.321,2.949,2.951,2.949h0.899v4.711c-2.194,0-3.972,1.778-3.972,3.971v13.529L34.06,75.511z M95.188,101.78 c0,8.655-7.012,15.665-15.664,15.665c-8.653,0-15.667-7.01-15.667-15.665c0-8.647,7.014-15.664,15.667-15.664 C88.177,86.116,95.188,93.132,95.188,101.78z M97.189,45.669h-9.556c0-0.896-0.726-1.62-1.619-1.62H74.494 c-0.896,0-1.621,0.727-1.621,1.62h-8.967v-11.21h33.283V45.669z"></path>
                <path d="M70.865,101.78c0,4.774,3.886,8.657,8.66,8.657c4.774,0,8.657-3.883,8.657-8.657c0-4.773-3.883-8.656-8.657-8.656 C74.751,93.124,70.865,97.006,70.865,101.78z"></path>
            </svg>
        </div>
        <form action="Contact.php" method="post" id="contact_form">
            <div class="name">
                <label for="name"></label>
                <input type="text" placeholder="Name" name="name" id="name_input" required>
            </div>
            <div class="email">
                <label for="email"></label>
                <input type="email" placeholder="E-mail" name="email" id="email_input" required>
            </div>
            <div class="message">
                <label for="message"></label>
                <textarea name="message" placeholder="I'd like to chat about" id="message_input" cols="30" rows="5" required></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="Send Message" id="form_button" />
            </div>
        </form><!-- // End form -->
    </div><!-- // End #container -->
</section>

<!-- About Us Section -->
<section id="about-us" class="about-us">
    <div class="container">
        <h2>About Us</h2>
        <div class="about-content">
            <!-- Text Section (Who We Are) -->
            <div class="about-text">
                <h3>Who We Are</h3>
                <p>We are a team of passionate professionals dedicated to delivering high-quality web development services. We specialize in creating beautiful, functional, and user-friendly websites that help businesses succeed online.</p>
                <p>Our approach is to understand your goals and work collaboratively to bring your vision to life. Whether you're a small startup or an established enterprise, we tailor our solutions to meet your specific needs.</p>
            </div>

            <!-- Video Section (Centered between Who We Are and Our Mission) -->
            <div class="video-section">
                <video width="320" height="240" controls>
                    <source src="images/aboutus.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Mission Section -->
            <div class="mission-text">
                <h3>Our Mission</h3>
                <p>Our mission is to empower businesses by providing innovative web solutions that drive growth, improve user experience, and enhance digital presence. We strive to exceed client expectations with each project and foster long-lasting partnerships.</p>
            </div>
        </div>
    </div>
</section>



     <!-- Footer Section -->
     <footer>
        <div class="footer">
            <p>&copy; 2024 Pristine Softsol. All Rights Reserved.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
