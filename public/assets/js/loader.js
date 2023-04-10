// var loader = {
//     show: function() {
//       $('.sk-chase').show();
//     },
//     hide: function() {
//       $('.sk-chase').hide();
//     }
//   };
  
//   $(document).ajaxStart(function() {
//     loader.show();

//   }).ajaxStop(function() {
//     loader.hide();

//   });

document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector(".loader-container").style.visibility = "visible";
    } else {
        document.querySelector(".loader-container").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
};