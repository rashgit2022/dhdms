<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DHDMS-Feedback and rating</title>
    <!--boostrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <!--css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      .logo{
        width:7%;
        height:75%;
      }
      @charset "UTF-8";
@import url("https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Potta+One&display=swap");
* {
  box-sizing: border-box;
}

html {
  font-size: 6.25vmax;
}
@media (max-width: 992px) {
  html {
    font-size: 60px;
  }
}

body{
  min-height: 100vh;
  padding: 0.5rem;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #222;
  font-size: 0.24rem;
  font-family: "Space Grotesk", sans-serif;
  background-image: radial-gradient(farthest-side, #afc8f9 90%, #fff0), radial-gradient(farthest-side, #ddc1fb 90%, #fff0), radial-gradient(circle at 0 0, #d5e0fa, #e5d5f6) !important;
  background-size: 7rem 7rem, 6rem 6rem, auto;
  background-position: 30% 10%, 80% 90%, 0;
  background-repeat: no-repeat;
  backdrop-filter: blur(50px);
}

.wrapper {
  width: 6rem;
  padding: 0.3rem 0.6rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.3rem;
  border-radius: 0.25rem;
  box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.2);
  background-color: rgba(255, 255, 255, 0.5);
  z-index: 1;
}
.wrapper .title {
  font-weight: bold;
  font-size: 0.36rem;
}
.wrapper .content {
  line-height: 1.6;
  color: #555;
}

.rate-box {
  display: flex;
  flex-direction: row-reverse;
  gap: 0.1rem;
}
.rate-box input {
  display: none;
}
.rate-box input:hover ~ .star:before {
  color: rgba(255, 204, 51, 0.5);
}
.rate-box input:active + .star:before {
  transform: scale(0.9);
}
.rate-box input:checked ~ .star:before {
  color: #ffcc33;
  text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3), -3px -3px 8px rgba(255, 255, 255, 0.8);
}
.rate-box .star:before {
  content: "★";
  display: inline-block;
  font-family: "Potta One", cursive;
  font-size: 0.6rem;
  cursor: pointer;
  color: #0000;
  text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.5);
  background-color: #aaa;
  background-clip: text;
  -webkit-background-clip: text;
  transition: all 0.3s;
}

textarea {
  border: none;
  resize: none;
  width: 100%;
  padding: 0.2rem;
  color: inherit;
  font-family: inherit;
  line-height: 1.5;
  border-radius: 0.2rem;
  box-shadow: inset 2px 2px 8px rgba(0, 0, 0, 0.3), inset -2px -2px 8px rgba(255, 255, 255, 0.8);
  background-color: rgba(255, 255, 255, 0.3);
}
textarea::placeholder {
  color: #aaa;
}
textarea:focus {
  outline-color: #ffcc33;
}

.submit-btn {
  padding: 0.2rem 0.5rem;
  box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3), -3px -3px 8px rgba(255, 255, 255, 0.8);
  border-radius: 1rem;
  cursor: pointer;
  background-color: rgba(255, 204, 51, 0.8);
  transition: all 0.2s;
}
.submit-btn:active {
  transform: translate(2px, 2px);
}
    </style>
</head>
<body>

<div class="wrapper"> 
  <div class="title">Rate your experience</div>
  <div class="content">We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valuable feedback.</div>
  <div class="rate-box">
    <input type="radio" name="star" id="star0"/>
    <label class="star" for="star0"></label>
    <input type="radio" name="star" id="star1"/>
    <label class="star" for="star1"></label>
    <input type="radio" name="star" id="star2" checked="checked"/>
    <label class="star" for="star2"></label>
    <input type="radio" name="star" id="star3"/>
    <label class="star" for="star3"></label>
    <input type="radio" name="star" id="star4"/>
    <label class="star" for="star4"></label>
  </div>
  <textarea cols="30" rows="6" placeholder="Tell us about your experience!"></textarea>
  <div class="submit-btn">Send</div>
</div>
</body>
</html>