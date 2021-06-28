<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{$title}}</title>
</head>
<body>
  <div class="relative min-h-screen md:flex">
 
    <!-- mobile menu bar -->
    <div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
      <!-- logo -->
      <a href="#" class="block p-4 text-white font-bold">Better Dev</a>
  
      <!-- mobile menu button -->
      <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  
    <!-- sidebar -->
    <div class="sidebar flex rounded-r-3xl bg-red-800 justify-center text-blue-100 w-21 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
     
      <!-- nav -->
      <nav class="w-20 relative">
        <div>
          <svg viewBox="-15 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" >
            <g filter="url(#filter0_i)">
            <path id="myPath" d="M62.2222 9.5H45.9667C44.3333 3.99 40.0556 0 35 0C29.9444 0 25.6667 3.99 24.0333 9.5H7.77778C3.5 9.5 0 13.775 0 19V85.5C0 90.725 3.5 95 7.77778 95H62.2222C66.5 95 70 90.725 70 85.5V19C70 13.775 66.5 9.5 62.2222 9.5ZM35 9.5C37.1389 9.5 38.8889 11.6375 38.8889 14.25C38.8889 16.8625 37.1389 19 35 19C32.8611 19 31.1111 16.8625 31.1111 14.25C31.1111 11.6375 32.8611 9.5 35 9.5ZM42.7778 76H15.5556V66.5H42.7778V76ZM54.4444 57H15.5556V47.5H54.4444V57ZM54.4444 38H15.5556V28.5H54.4444V38Z" fill="#DEDEDE"/>
            </g>
            <defs>
            <filter id="filter0_i" x="0" y="0" width="80" height="105" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
            <feOffset dx="10" dy="10"/>
            <feGaussianBlur stdDeviation="5"/>
            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.8 0"/>
            <feBlend mode="normal" in2="shape" result="effect1_innerShadow"/>
            </filter>
            </defs>
          </svg>
             <br> 
          <svg viewBox="-7.5 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="my-4">
            <path d="M76.5 0H8.5C3.825 0 0.0425 3.375 0.0425 7.5L0 52.5C0 56.625 3.825 60 8.5 60H76.5C81.175 60 85 56.625 85 52.5V7.5C85 3.375 81.175 0 76.5 0ZM76.5 15L42.5 33.75L8.5 15V7.5L42.5 26.25L76.5 7.5V15Z" fill="#DEDEDE"/>
          </svg>
        </div>
       
        <svg viewBox="-7.5 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0">
          <path d="M42.5 0C19.04 0 0 19.04 0 42.5C0 65.96 19.04 85 42.5 85C65.96 85 85 65.96 85 42.5C85 19.04 65.96 0 42.5 0ZM46.75 72.25H38.25V63.75H46.75V72.25ZM55.5475 39.3125L51.7225 43.2225C48.6625 46.325 46.75 48.875 46.75 55.25H38.25V53.125C38.25 48.45 40.1625 44.2 43.2225 41.0975L48.4925 35.7425C50.065 34.2125 51 32.0875 51 29.75C51 25.075 47.175 21.25 42.5 21.25C37.825 21.25 34 25.075 34 29.75H25.5C25.5 20.3575 33.1075 12.75 42.5 12.75C51.8925 12.75 59.5 20.3575 59.5 29.75C59.5 33.49 57.97 36.89 55.5475 39.3125Z" fill="#DEDEDE"/>
        </svg>
          
      </nav>
    </div>
  
    <!-- content -->
    <div class="flex-1 p-10 font-bold">
      <div class="flex justify-center relative">
        <h1 class="text-6xl right-1/2 ">WBSAPP</h1>
        <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 right-0">
          <path d="M45.5 0C20.384 0 0 20.384 0 45.5C0 70.616 20.384 91 45.5 91C70.616 91 91 70.616 91 45.5C91 20.384 70.616 0 45.5 0ZM45.5 13.65C53.053 13.65 59.15 19.747 59.15 27.3C59.15 34.853 53.053 40.95 45.5 40.95C37.947 40.95 31.85 34.853 31.85 27.3C31.85 19.747 37.947 13.65 45.5 13.65ZM45.5 78.26C34.125 78.26 24.0695 72.436 18.2 63.609C18.3365 54.5545 36.4 49.595 45.5 49.595C54.5545 49.595 72.6635 54.5545 72.8 63.609C66.9305 72.436 56.875 78.26 45.5 78.26Z" fill="black"/>
        </svg>
          
      </div>
      
      


  
     
        
    </div>
  
  </div>
</body>

<script>
    // grab everything we need
  const btn = document.querySelector(".mobile-menu-button");
  const sidebar = document.querySelector(".sidebar");

  // add our event listener for the click
  btn.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
  });

  let myPathBox = document.getElementById("myPath").getBBox();
  let myPathBox2 = document.getElementById("myPath").getBoundingClientRect().width;
  console.log(myPathBox);
  console.log(myPathBox2);
  


</script>

</html>