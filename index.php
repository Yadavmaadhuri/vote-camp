
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href='assets/styles.css'> 

    
</head>
<body>
<div class="udcontainer">
        <nav class="navbar" >
            <ul >
            
                <li text-align=""><a href="login.php">Login as user</a></li>
            </ul>
        </nav>
    </div>


    <!-- About Us Section -->
    <div class="hdc-container">
        <section class="hdc-about">
            <h1>About Us</h1>
            <h2>Welcome to Himalaya Darshan College</h2>
        </section>

        <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="assets/slide.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="assets/slide1.jpg" style="width:100%">
  <div class="text"> Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="assets/slide3.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

        <!-- Introduction Section -->
        <section class="hdc-introduction">
            <p>Welcome Himalaya Darshan College, established in 2070 B.S. provides innovative opportunities in a highly academic environment. The College has been established with an objective to promote value-based quality education at the graduate level. The college fosters personal and professional growth of the students through its experienced and distinguished faculties, experts, and professionals from the national level.</p>
        </section>

        <!-- Faculty Section -->
        <section class="hdc-faculty">
            <h2>Our Faculties</h2>
            
            <div class="hdc-faculty-images">
                <div class="hdc-faculty-item">
                    <img src="assets/bbs.jpg" alt="BBS Faculty">
                    <span>BBS</span>
                </div>
                <div class="hdc-faculty-item">
                    <img src="assets/bim.jpg" alt="BIM Faculty">
                    <span>BIM</span>
                </div> 
                <div class="hdc-faculty-item">
                    <img src="assets/bca.jpg" alt="BCA Faculty">
                    <span>BCA</span>
                </div>
                <div class="hdc-faculty-item">
                    <img src="assets/bcsit.jpg" alt="BCSIT Faculty">
                    <span>BCSIT</span>
                </div>
                <div class="hdc-faculty-item">
                    <img src="assets/bhm.jpg" alt="BHM Faculty">
                    <span>BHM</span>
                </div>
            </div>
        </section>

        <!-- Facilities Section -->
        <section class="hdc-facilities">
            <h3>Our Facilities</h3>
            <div class="hdc-facilities-grid">
                <div class="hdc-facility-item">
                    <img src="assets/library.jpg" alt="Library">
                    <span>Library</span>
                </div>
                <div class="hdc-facility-item">
                    <img src="assets/canteen.jpg" alt="Canteen">
                    <span>Canteen</span>
                </div>
                <div class="hdc-facility-item">
                    <img src="assets/hall.jpg" alt="Hall">
                    <span>Hall</span>
                </div>
                <div class="hdc-facility-item">
                    <img src="assets/lab.jpg" alt="Computer Lab">
                    <span>Computer Lab</span>
                </div>

                </div>
            </div>
        </section>

        <!-- Student Testimonial Section -->
        <section class="hdc-testimonials">
            <h3>Student Testimonials</h3>
            <h4>What Our Students Say</h4>
            <div class="hdc-testimonial-item">
                <img src="assets/student1.jpg" alt="Student 1">
                <p>"Himalaya Darshan College has provided me with immense opportunities to grow academically and personally. The faculty is highly supportive, and the environment is conducive to learning."</p>
                <span>- Charu Shrestha <br/>
                         BIM 2078
                </span>
            </div>
            <div class="hdc-testimonial-item">
                <img src="assets/student2.jpg" alt="Student 2">
                <p>"The facilities and the resources available at the college have significantly contributed to my development. I feel proud to be a part of this esteemed institution."</p>
                <span>- Madhuri Yadav <br/> BIM 2078</span>
            </div>
            <div class="hdc-testimonial-item">
                <img src="assets/student3.jpg" alt="Student 3">
                <p>"The facilities and the resources available at the college have significantly contributed to my development. I feel proud to be a part of this esteemed institution."</p>
                <span>- Geeta Kuikhel <br/> BIM 2078 </span>
            </div>
        </section>

        <!-- Tie-Ups & MoUs Section -->
        <section class="hdc-tieups">
            <h3>Tie-Ups & MoUs</h3>
            <div class="hdc-tieups-images">
                <img src="tieup1.png" alt="Tie-Up 1">
                <img src="tieup2.png" alt="Tie-Up 2">
                <img src="tieup3.png" alt="Tie-Up 3">
                <img src="tieup4.png" alt="Tie-Up 4">
                <img src="tieup5.png" alt="Tie-Up 5">
                <img src="tieup6.png" alt="Tie-Up 6">
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="hdc-contact">
            <h3>Contact Us</h3>
            <p>Phone: 021-590471/021-590571</p>
            <p>Website: www.himalayadarshancollege.edu.np</p>
        </section>
    </div>
    <script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>
