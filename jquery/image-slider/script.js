const sliders = $('.slider');
const imageNumber = $('.image-number');
const nextBtn = $('#next');
const prevBtn = $('#prev');

let index = 0;
imageNumber.html(`${index+1} / ${sliders.length}`);

let sliderInterval;
runSlider();

nextBtn.click(() => {
  clearInterval(sliderInterval);
  index++;
  if(index < sliders.length){
      changeSlide(index);
  } else {
    index = 0;
    changeSlide(index);
  }
  runSlider();
});

prevBtn.click(() => {
  clearInterval(sliderInterval);
  index--;
  if(index >= 0){
  changeSlide(index);
}else{
  index = sliders.length - 1;
  changeSlide(index);
}
runSlider();
});

function changeSlide(index){
  sliders.map((i) =>{
    if(i == index){
      sliders.find("img").css({'transform':`translateX(-${index*900}px)`});
      imageNumber.html(`${index+1} / ${sliders.length}`)
    }
  });
}

function runSlider(){
sliderInterval = setInterval(function(){
    changeSlide(index++);
    if(index > sliders.length - 1) index = 0;
  }, 3000);
}
