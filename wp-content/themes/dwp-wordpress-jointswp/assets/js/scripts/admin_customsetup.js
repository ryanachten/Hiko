jQuery(document).ready(function(){

  // Add logo container to top of dashboard
  // (src handled via php and styles via scss)
  function addMainDashboardLogo(){
    var wrapContainer = jQuery('.wrap');
    wrapContainer = wrapContainer[0];
    var imgDiv = document.createElement("DIV");
    imgDiv.id = 'dashboard_splashHeaderImg';
    wrapContainer.prepend(imgDiv);
  }
  addMainDashboardLogo();
  
});
