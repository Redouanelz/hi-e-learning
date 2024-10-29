<template>
  <div>
    <!-- Header Section with Image and Text -->
    <div class="row" style="margin-top: 50px">
      <div class="col-md-4 offset-2">
        <img src="/public/banner.svg" alt="" width="100%" class="fade-in-animation" />
      </div>
      <div class="col-md-4 ">
        <div class="slide-in-text" style="margin-top: 50px">
          <h2>Hi</h2>
          <h5>E-learning platform</h5>
          <p style="color: gray">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi
            exercitationem placeat accusamus odio architecto sed quia eaque,
            quod similique qui ad, harum assumenda, repudiandae officiis porro
            sequi debitis nihil sit.
          </p>
          <a class="btn btn-primary" href="Learn more">Learn More</a>
        </div>
      </div>
    </div>

    <!-- About Us Section with Animated Numbers -->
    <div id="numbers" class="fade-in-section my-container">
      <div class="row">
        <div
          class="col-md-3 animated-number"
          style="border-right: 1px solid gray"
        >
          <h1 data-count="4">0</h1>
          <span>Chapters</span>
        </div>
        <div
          class="col-md-3 animated-number"
          style="border-right: 1px solid gray"
        >
          <h1 data-count="56">0</h1>
          <span>Lessons</span>
        </div>
        <div
          class="col-md-3 animated-number"
          style="border-right: 1px solid gray"
        >
          <h1 data-count="42">0</h1>
          <span>Hours of video</span>
        </div>
        <div class="col-md-3 animated-number">
          <h1 data-count="10000">0</h1>
          <span>Students community</span>
        </div>
      </div>
    </div>

    <!-- Services Section with Hover Scale Effect -->
    <div class="container">
      <div class="row">
        <div class="col-md-4 service-card">
          <img src="/public/e2.png" width="60%" class="scale-on-hover" />
          <h4>lorem</h4>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti
            reprehenderit quidem sapiente eveniet tenetur alias nostrum
            doloremque beatae harum, delectus accusantium ullam nobis dicta,
            voluptate officia. Sit dignissimos minus explicabo!
          </p>
          <button class="btn btn-primary">Learn more</button>
        </div>
        <div class="col-md-4 service-card">
          <img src="/public/e3.png" width="60%" class="scale-on-hover" />
          <h4>lorem</h4>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti
            reprehenderit quidem sapiente eveniet tenetur alias nostrum
            doloremque beatae harum, delectus accusantium ullam nobis dicta,
            voluptate officia. Sit dignissimos minus explicabo!
          </p>
          <button class="btn btn-primary">Learn more</button>
        </div>
        <div class="col-md-4 service-card">
          <img src="/public/e4.png" width="60%" class="scale-on-hover" />
          <h4>lorem</h4>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti
            reprehenderit quidem sapiente eveniet tenetur alias nostrum
            doloremque beatae harum, delectus accusantium ullam nobis dicta,
            voluptate officia. Sit dignissimos minus explicabo!
          </p>
          <button class="btn btn-primary">Learn more</button>
        </div>
      </div>
    </div>


    <div class="my-container" id="start-now">
        <div class="row">
          <div class="col-md-6">
              <h1>Start learning today!</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit dignissim arcu cursus tincidunt et odio enim aliquam.</p>
          </div>
          <div class="col-md-3 offset-2">
            <br>
              <button class="btn" id="btn-start-now">Start now</button>
          </div>
        </div>
    </div>

    <div class="container" style="margin-top: 150px">
      <section id="testimonials">
        <div class="row d-flex justify-content-center">
          <div class="col-md-10 col-xl-8 text-center fade-in-animation">
            <h3 class="mb-4">Testimonials</h3>
            <p class="mb-4 pb-2 mb-md-5 pb-md-0">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit,
              error amet numquam iure provident voluptate esse quasi, veritatis
              totam voluptas nostrum quisquam eum porro a pariatur veniam.
            </p>
          </div>
        </div>

        <div class="row text-center">
          <div
            class="col-md-6 mb-4 mb-md-0 fade-in-animation"
            style="animation-delay: 0.5s"
          >
            <div class="d-flex justify-content-center mb-4">
              <img
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(22).webp"
                class="rounded-circle shadow-1-strong scale-up-animation"
                width="100"
                height="100"
              />
            </div>
            <p class="lead my-3 text-muted">
              "Lorem ipsum dolor sit amet eos adipisci, consectetur adipisicing
              elit sed ut perspiciatis unde omnis."
              <br>              
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </p>
           
            <p class="font-italic font-weight-normal mb-0">- Anna Morian</p>
          </div>
          <div
            class="col-md-6 mb-0 fade-in-animation"
            style="animation-delay: 1s"
          >
            <div class="d-flex justify-content-center mb-4">
              <img
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                class="rounded-circle shadow-1-strong scale-up-animation"
                width="100"
                height="100"
              />
            </div>
            <p class="lead my-3 text-muted">
              "Neque cupiditate assumenda in maiores repudiandae mollitia
              architecto elit sed adipiscing elit."
              <br>

              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>

            </p>
            <p class="font-italic font-weight-normal mb-0">- Teresa May</p>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
function loadAnimations() {
  const elementsToAnimate = document.querySelectorAll(
    ".fade-in-animation, .scale-up-animation, #numbers"
  );
  const animatedNumbers = document.querySelectorAll(".animated-number h1");

  const observerOptions = {
    threshold: 0.2, // Adjust threshold as needed
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (entry.target.id === "numbers") {
          entry.target.classList.add("fade-in-trigger");
          animatedNumbers.forEach((number) => animateCount(number));
          observer.unobserve(entry.target);
        } else if (entry.target.classList.contains("fade-in-animation")) {
          entry.target.classList.add("fade-in-trigger");
        } else if (entry.target.classList.contains("scale-up-animation")) {
          entry.target.classList.add("scale-up-trigger");
        }
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  elementsToAnimate.forEach((el) => observer.observe(el));

  function animateCount(element) {
    let count = 0;
    const target = +element.getAttribute("data-count");
    const increment = Math.ceil(target / 100);

    function updateCount() {
      count += increment;
      if (count < target) {
        element.textContent = count;
        requestAnimationFrame(updateCount);
      } else {
        element.textContent = target;
      }
    }
    updateCount();
  }
}

// Run loadAnimations initially and on each scroll event
loadAnimations();
window.addEventListener("scroll", loadAnimations);



</script>

<style>
/* Container and Row Styling */
.container {
  margin: 50px auto;
  text-align: center;
}

/* Fade-in animation for the image */
.fade-in-animation {
  opacity: 0;
  animation: fadeIn 1.5s ease-in forwards;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: scale(0.9);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

/* Slide-in animation for the text */
.slide-in-text {
  opacity: 0;
  transform: translateX(30px);
  animation: slideIn 1.5s ease-in forwards;
  animation-delay: 0.5s;
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateX(30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Fade-in effect for numbers section */
#numbers {
  background-color: teal;
  color: white;
  padding: 100px;
  margin-top: 100px;
}
.fade-in-section {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1.5s ease, transform 1.5s ease;
}
/* Triggered fade-in state */
.fade-in-trigger {
    opacity: 1;
    transform: translateY(0);
}

@keyframes fadeInSection {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Number animation styling */
.animated-number {
  opacity: 0;
  animation: numberFadeIn 1.5s ease-in forwards;
}

@keyframes numberFadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Hover scale effect for service cards */
.service-card {
  transition: transform 0.3s ease;
}

.service-card:hover {
  transform: scale(1.05);
}

.scale-on-hover {
  transition: transform 0.3s ease;
}

.scale-on-hover:hover {
  transform: scale(1.1);
}

/* General fade-in animation for text */
.fade-in-animation {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 1.5s ease, transform 1.5s ease;
}

.scale-up-animation {
  opacity: 0;
  transform: scale(0.8);
  transition: opacity 1.5s ease, transform 1.5s ease;
}

/* Add animation triggers */
.fade-in-trigger {
  opacity: 1;
  transform: translateY(0);
}

.scale-up-trigger {
  opacity: 1;
  transform: scale(1);
}
.my-container {
  width: 100%; /* Full-width container */
  padding: 0; /* No padding by default */
  margin: 0 auto; /* Center align if needed */
}
#btn-start-now{

   border-radius: 15px;
   border: 1px solid gray;
   font-size: 25px;
   color: teal;
   background-color: white;
   padding: 10px 50px;
}
#start-now{
  background-color: teal;
  color: white;
  padding: 100px;
  margin-top: 100px;
}
</style>
