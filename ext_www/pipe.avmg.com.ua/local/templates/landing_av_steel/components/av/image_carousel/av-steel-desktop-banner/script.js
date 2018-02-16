$(function()
	{


$('.av-center').slick({
  centerMode: true,
  centerPadding: '520px',
  slidesToShow: 1,
    speed: 500,
    touchMove: true,
  responsive: [
	{
      breakpoint: 1500,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '280px',
        slidesToShow: 1
      }
    },
	{
      breakpoint: 1000,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '80px',
        slidesToShow: 1
      }
    },
	{
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },


    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '20px',
        slidesToShow: 1
      }
    }
  ]
})
//---------------------- ON HOVER MOVE SLIDE ---------------------//
    .mouseover(function () {
        $(this)
            .slick('slickPlay')
            .slick('setOption', 'autoplay', true)
            .slick('setOption', 'speed', 1500)
            .slick('setOption', 'autoplaySpeed', 500);
    })
    .mouseout(function () {
        $(this)
            .slick('setOption', 'autoplay', false, false)
            .slick('slickPause');
    });

});
