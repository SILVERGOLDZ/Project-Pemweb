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
// // Add More Card On Category HomePage //
// function addCard(){
//   document.getElementById('Laptops')
//     .innerHTML +=  
//       `<div class="card">
//             <div class="card-image" style="background-image: url('img/Logo_asus.png');"></div>
//             <div class="card-content">
//                 <h3>ASUS <p style="float: inline-end; font-size: small;" class="description">20</p></h3>
//                 <p class="description">Views: 0</p>
              
//                 <div class="stars">
//                   <span class="fa fa-star bintang-rating" id="tes001-ST1"></span>
//                   <span class="fa fa-star bintang-rating" id="tes001-ST2"></span>
//                   <span class="fa fa-star bintang-rating" id="tes001-ST3"></span>
//                   <span class="fa fa-star bintang-rating" id="tes001-ST4"></span>
//                   <span class="fa fa-star bintang-rating" id="tes001-ST5"></span>
//                 </div>
//             </div>
        
//             <div class="card-footer">
//                 <button class="button">
//                   &rarr;
//                 </button>
//             </div>
//           </div>`;
//   star_responsive();
// }

// // Temporary While
// let kriteria = ["Tablet", "Iphone", "TV", "Car", "Bike", "Foot Ball"];
// const companyName_class = document.querySelector(".companyName-cardSelector");
// function auto_add_card(){
//   for (let i = 0; i < kriteria.length; i++){
//     let section_html = 
//     `<h1>${kriteria[i]}</h1>
//     <div class="card-overflow" id="${kriteria[i]}">`;

//     let cards = "";
//     for(let j = 0; j < 20; j++){
//       cards += 
//       ` <div class="card">
//           <div class="card-image" style="background-image: url('img/Logo_asus.png');"></div>
//           <div class="card-content">
//             <h3>ASUS <p style="float: inline-end; font-size: small;" class="description">20</p></h3>
//             <p class="description">Views: 0</p>
            
//             <div class="stars">
//               <span class="fa fa-star bintang-rating" id="${kriteria[i]}00${j}-ST1"></span>
//               <span class="fa fa-star bintang-rating" id="${kriteria[i]}00${j}-ST2"></span>
//               <span class="fa fa-star bintang-rating" id="${kriteria[i]}00${j}-ST3"></span>
//               <span class="fa fa-star bintang-rating" id="${kriteria[i]}00${j}-ST4"></span>
//               <span class="fa fa-star bintang-rating" id="${kriteria[i]}00${j}-ST5"></span>
//             </div>
//           </div>
          
//           <div class="card-footer">
//             <button class="button">
//               &rarr;
//             </button>
//           </div>
//         </div>`;
//     }
    
//     section_html += cards + `</div>`;
//     companyName_class.innerHTML += section_html;
//   }
// }

// auto_add_card()



        
function star_responsive() {
  let bintang_rating = document.querySelectorAll(".bintang-rating"); 
  let id_bintang = "";
  let id = "";
  let other_id = "";
  let current_rating = 0;
        
  
  function star_hover(event) {
    id_bintang = event.target.id;
    other_id = id_bintang.split('-ST')[0]; 
    id = parseInt(id_bintang.match(/-ST(\d+)/)[1], 10); 
    
    for (let i = 1; i <= id; i++) {
      document.getElementById(`${other_id}-ST${i}`).classList.add("bintang-rating-hover");
    }
  }
  
  function star_unhover() {
    bintang_rating.forEach(star => {
      star.classList.remove("bintang-rating-hover");
    });
  }
  
  function star_click() {
    if (current_rating > 0) {
      for (let i = 1; i <= current_rating; i++) {
        document.getElementById(`${other_id}-ST${i}`).classList.remove("bintang-rating-rated");
      }
    }
          
    for (let i = 1; i <= id; i++) {
      document.getElementById(`${other_id}-ST${i}`).classList.add("bintang-rating-rated");
    }
    
    current_rating = id;
  }
  
  bintang_rating.forEach(target => {
    target.removeEventListener("mouseover", star_hover); 
    target.removeEventListener("mouseout", star_unhover);    
    target.removeEventListener("click", star_click);          
      
    target.addEventListener("mouseover", star_hover);
    target.addEventListener("mouseout", star_unhover);
    target.addEventListener("click", star_click);
  });
}

star_responsive();


const navbar = document.getElementById('navbar');

window.onscroll = function() {
  if (window.scrollY > 50) {  
    navbar.style.backgroundColor = 'rgba(25, 26, 28, 0.9)';  // Change background color
  } else {
    navbar.style.backgroundColor = 'transparent';  // Keep navbar transparent
  }
};