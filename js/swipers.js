function loadScript(src) {
	let script = document.createElement('script');
	script.src = src;
	script.async = false;
	document.body.append(script);
  }
  

loadScript("../vendor/purecounter/purecounter.js");
loadScript("../vendor/glightbox/js/glightbox.min.js");
loadScript("../vendor/isotope-layout/isotope.pkgd.min.js");
loadScript("../vendor/swiper/swiper-bundle.min.js");

