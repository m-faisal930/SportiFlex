window.addEventListener("scroll", function() {
    var scrollToTopBtn = document.getElementById("scroll-to-top-btn");
    if (window.pageYOffset > 100) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
});

document.getElementById("scroll-to-top-btn").addEventListener("click", function() {
    window.scrollTo({ top: 0, behavior: "smooth" });
});


$(document).ready(function() {
    // Image gallery functionality
    $('.image-gallery img').on('click', function() {
      $('.main-image img').attr('src', $(this).attr('src'));
    });
  
    // Add to cart functionality
    $('#add-to-cart-btn').on('click', function() {
      alert('Product added to cart!');
    });
  });

// CheckOut Table shown function
function checkRadio() {
    var myDiv = document.getElementById("form-2");
    var radio2 = document.getElementById("check-address");
    var searchIcon = document.getElementById("search-icon");
    if (radio2.checked == false) {
      radio2.checked = true;
      myDiv.style.display = "block";
      searchIcon.style.display = "none";
    } else {
      radio2.checked = false;
      myDiv.style.display = "none";
      searchIcon.style.display = "block";
    }
  }
  
  function checkingRadio() {
    var radio2 = document.getElementById("check-address");
    radio2.checked = !radio2.checked;
  }
