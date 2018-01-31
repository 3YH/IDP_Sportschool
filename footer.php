<footer class="social-footer">
  <div class="social-footer-left">
    <a href="#">Benno&#39;s Sportshool</a>
  </div>
  <div class="social-footer-icons">
    <ul class="menu simple">
      <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
      <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</footer>
	<script src="bower_components/jquery/dist/jquery.js"></script>
  <script src="bower_components/what-input/dist/what-input.js"></script>
  <script src="bower_components/foundation-sites/dist/js/foundation.js"></script>
	<script src="js/app.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="https://use.fontawesome.com/c855b369a0.js"></script>
  <script>
		$(document).ready(function () {
			// Add smooth scrolling to all links
			$("a").on('click', function (event) {

				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
					// Prevent default anchor click behavior
					event.preventDefault();

					// Store hash
					var hash = this.hash;

					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					}, 800, function () {

						// Add hash (#) to URL when done scrolling (default click behavior)
						window.location.hash = hash;
					});
				} // End if
			});
		});
  </script>
  <script>
    $('.top-bar').on('sticky.zf.stuckto:top', function(){
  $(this).addClass('sticky-padding');
}).on('sticky.zf.unstuckfrom:top', function(){
  $(this).removeClass('sticky-padding');
})
    </script>
</body>
</html>