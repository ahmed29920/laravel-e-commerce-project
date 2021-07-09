<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CodingLab</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="home">
          <i class='bx bx-home' ></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Home</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Products</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Products</a></li>
          <li><a href="products">Show</a></li>
          <li><a href="add-product">Create</a></li>
          <li><a href="likes">Likes</a></li>
          <li><a href="rates">Rates</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i> 
            <span class="link_name">Categries</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="`#">Categries</a></li>
          <li><a href="category">Show</a></li>
          <li><a href="add-category">Create</a></li>
        </ul>
      </li>
      <li>
        <a href="viewUsers">
        <i class='bx bx-user'></i>
          <span class="link_name">Users</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="viewUsers">users</a></li>
        </ul>
      </li>
      <li>
      <div class="iocn-link">
          <a href="#">
            <i class='bx bx-dollar' ></i>
            <span class="link_name">Offers</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Offers</a></li>
          <li><a href="offers">Show</a></li>
          <li><a href="add-offer">Create</a></li>
        </ul>
      </li>
      <li>
        <a href="orders">
          <i class='bx bx-coin' ></i>
          <span class="link_name">Orders</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="orders">Orders</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-slider' ></i>
            <span class="link_name">Slider</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Slider</a></li>
          <li><a href="sliders">Show</a></li>
          <li><a href="add-slider">Create</a></li>
        </ul>
      </li>
      <li>
      <div class="iocn-link">
          <a href="#">
            <i class='bx bx-star' ></i>
            <span class="link_name">Features</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Features</a></li>
          <li><a href="features">Show</a></li>
          <li><a href="add-feature">Create</a></li>
        </ul>
      </li>
      <li>
      <div class="iocn-link">
          <a href="#">
            <i class='bx bx-pen' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="posts">Show</a></li>
          <li><a href="add-post">Create</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
      </div>
      <div class="name-job">
        <div class="profile_name">{{Auth::user()->name}}</div>
        <div class="job">{{Auth::user()->role}}</div>
      </div>
      <a href="{{ route('signout') }}"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <p> hi {{Auth::user()->name}} </p>
    </div>
  </section>
<script src="{{ asset('js/jquey.min.css') }}"></script>
  <script>

  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }

  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
     sidebar.classList.toggle("close");

  });
  </script>

</body>
</html>

