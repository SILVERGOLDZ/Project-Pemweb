  // search-box open close js code
  let navbar = document.querySelector(".navbar");
  let searchBox = document.querySelector(".search-box .bx-search");
  // let searchBoxCancel = document.querySelector(".search-box .bx-x");

  searchBox.addEventListener("click", ()=>{
    navbar.classList.toggle("showInput");
    if(navbar.classList.contains("showInput")){
      searchBox.classList.replace("bx-search" ,"bx-x");
    }else {
      searchBox.classList.replace("bx-x" ,"bx-search");
    }
  });

  document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelector(".nav-links");
    const menuOpenBtn = document.querySelector(".navbar .bx-menu");
    const menuCloseBtn = document.querySelector(".nav-links .bx-x");


    // Open sidebar
    menuOpenBtn.addEventListener("click", () => {
      navLinks.style.left = "0"; // Sidebar slides in
    });

    // Close sidebar
    menuCloseBtn.addEventListener("click", () => {
      navLinks.style.left = "-100%"; // Sidebar slides out
    });
  });// category chooser onclick //
function categoryOnClick(){
  let kategori = document.getElementsByClassName("kategori");
  kategori.classList.add("active");
}

// Add More Card On Category HomePage //
function addCard(){
  document.getElementById('Laptops')
    .innerHTML +=  
      `<div class="card">
            <div class="card-image" style="background-image: url('img/Logo_asus.png');"></div>
            <div class="card-content">
              <h3>ASUS <p style="float: inline-end; font-size: small;" class="description">20</p></h3>
              <p class="description">Views: 0</p>
              
              <div class="stars">★★★★★</div>
            </div>
            
            <div class="card-footer">
              <button class="button">
                &rarr;
              </button>
            </div>
          </div>`;
}