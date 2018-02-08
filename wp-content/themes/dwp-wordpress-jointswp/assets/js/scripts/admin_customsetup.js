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

  // Add logo container to top of dashboard
  // (src handled via php and styles via scss)
  function addDashboardWidgetLogos(){
    var blogWidgetContainer = jQuery('#dashboard_blogposts_widget h2');
    var projectWidgetContainer = jQuery('#dashboard_project_widget h2');
    var seriesWidgetContainer = jQuery('#dashboard_series_widget h2');

    addImgDiv('blogpost', blogWidgetContainer);
    addImgDiv('project', projectWidgetContainer);
    addImgDiv('series', seriesWidgetContainer);

    function addImgDiv( postType, parentElement ){
      var imgDiv = document.createElement("DIV");
      imgDiv.id = postType + '_widget_headerImg';
      imgDiv.className = 'dashboard-post-widget-headerimg';
      jQuery(parentElement).prepend(imgDiv);
    }
  }
  addDashboardWidgetLogos();

  // Hide extra dashboard postboxes
  function hideDashboardPostboxes(){
    jQuery('#postbox-container-2').remove();
    jQuery('#postbox-container-3').remove();
    jQuery('#postbox-container-4').remove();
  }
  hideDashboardPostboxes();
});
