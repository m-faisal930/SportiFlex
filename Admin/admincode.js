// showDiv();
// function hideDiv() {
//     var div = document.getElementById("adminproducts");
//     div.style.display = "none";
//     var div = document.getElementById("myModal");
//     div.style.display = "block";
    
//     $("#register-title").hide();

// }



// function showDiv() {
//      var div = document.getElementById("myModal");
//      div.style.display = "block";
// }


var sizes = [];
var colors = [];
var tags = [];
var categories = [];


function showSelected(selectID, presentID, array) {
  var selectBox = document.getElementById(arguments[0]);
  for (var i = 0; i < selectBox.options.length; i++) {
    if (selectBox.options[i].selected) {
        if (array.includes(selectBox.options[i].value)) {
            array.splice(array.indexOf(selectBox.options[i].value), 1);
          } else {
            array.push(selectBox.options[i].value);
  }
    }
  }
  document.getElementById(arguments[1]).innerHTML = array.join(", ");
}


function showSelectedColors () {
    showSelected('colors', 'selectedcolors', colors);

}

function showSelectedSizes () {
    showSelected('sizes', 'selectedsizes', sizes);
}
function showSelectedTags () {
    showSelected('tags', 'selectedtags', tags);
}
function showSelectedCategories () {
    showSelected('categories', 'selectedcategories', categories);

}


