nocomments(document).ready(function() {

 // hides the slickbox as soon as the DOM is ready
 // (a little sooner than page load)
  nocomments('#nocomments_combox').hide();
  nocomments('#box').hide();

  // shows the slickbox on clicking the noted link
  nocomments('a#slick-show').click(function() {
 nocomments('#nocomments_combox').show('slow');
 return false;
  });
 // hides the slickbox on clicking the noted link
  nocomments('a#slick-hide').click(function() {
 nocomments('#nocomments_combox').hide('fast');
 return false;
  });
 
 // toggles the slickbox on clicking the noted link
  nocomments('a#slick-toggle').click(function() {
 nocomments('#nocomments_combox').toggle(400);
 nocomments('#box').toggle(400);
 return false;
  });
});