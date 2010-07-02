nocomments(document).ready(function() {
 // hides the slickbox as soon as the DOM is ready
 // (a little sooner than page load)
  nocomments('#nocomments_comwrite').hide();

  // shows the slickbox on clicking the noted link
  nocomments('a#slick-showwrite').click(function() {
 nocomments('#nocomments_comwrite').show('slow');
 return false;
  });
 // hides the slickbox on clicking the noted link
  nocomments('a#slick-hidewrite').click(function() {
 nocomments('#nocomments_comwrite').hide('fast');
 return false;
  });
 
 // toggles the slickbox on clicking the noted link
  nocomments('a#slick-togglewrite').click(function() {
 nocomments('#nocomments_comwrite').toggle(400);
 return false;
  });
});