let sliderLeftBtn = document.querySelector('#slider-left');     
let left = 0;
			
let slider = document.querySelector('.progress__wrapper');
let startX;
let endX;
	
	
	sliderLeftBtn.addEventListener('click', function() {            
		left = left - 400;
		  if (left < -800) {
			left = 0;
		  }
			slider.style.left = left + 'px';            
	   });
	
	slider.addEventListener('touchstart', e => {
		console.log('touchstart', e.touches[0].clientX);
		startX = e.touches[0].clientX;
	})
	slider.addEventListener('touchmove', e => {
		console.log('touchmovet', e.touches[0].clientX);
		endX = e.touches[0].clientX;
	});
	
	
	slider.addEventListener('touchend', e => {
		if (startX > endX) {
			left = left - 300;
			if (left < -890) {
				left = 0;
			}
			slider.style.left = left + 'px';   
		} else {
			left = left + 300;
			if (left > 0) {
				left = 0;
			} 
			slider.style.left = left + 'px';
		}				
	})	
			
	