jQuery(document).ready(function(){
  var wrapContainer = jQuery('.wrap');
  wrapContainer = wrapContainer[0];
  var imgDiv = document.createElement("DIV");
  imgDiv.id = 'dashboard_splashHeaderImg';
  wrapContainer.prepend(imgDiv);
  console.log(wrapContainer);
});
