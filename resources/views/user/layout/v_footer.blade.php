<!-- footer -->
	<div class="footer container-fluid">
		<div class="row">
			<div class="col-lg-3 maps d-none d-lg-block" style="padding-top:20px">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3949.776235128012!2d112.1748734!3d-8.1242504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78eb693f8ce5fd%3A0x4309f1de239fae4b!2sJIgroup!5e0!3m2!1sid!2sid!4v1628525587136!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-lg-3 col-6">
				<h1 class="title-content text-center mb-3 medsos-title">Media Sosial</h1>
				<div class="medsos ">
					<p><a target="_blank" href="https://wa.me/+6281233110326" style="text-decoration:none ;color:black;"><i class="fa fa-phone"></i>+6281233110326</a></p>
					<!--<p><i class="fa fa-facebook-square"></i>Facebook</p>-->
					<p><a target="_blank" href="https://www.facebook.com/Jatinom-Indah-Group-103616585192634" style="text-decoration:none ;color:black;"><i class="fa fa-facebook-square"></i>Jatinom Indah Group</a></p>
					<p><a target="_blank" href="https://www.instagram.com/jatinomindah/" style="text-decoration:none ;color:black;"><i class="fa fa-instagram"></i>Jatinomindah</a></p>
					<p><a target="_blank" href="https://www.youtube.com/channel/UCEqG9vSubdsA1xhhy1suigA" style="text-decoration:none ;color:black;"><i class="fa fa-youtube"></i>Jatinom Indah Group</a></p>
				</div>
			</div>
			<div class="col-lg-3 col-6 ">
				<h1 class="title-content text-center mb-3 menu-title">Menu</h1>
				<div class="menu-item">
					<p><a href="../../fasilitas-user"> Fasilitas </a></p>
					<p><a href="../../produk-user"> Produk </a></p>
					<p><a href="../../blog-user"> Blog </a></p>
					<p><a href="../../tentang-user"> Tentang </a></p>
					<p><a href="../../shop-user"> Shop </a></p>
				</div>
			</div>
			<div class="col-lg-3 searching d-none d-lg-block">
				<!--<form class="d-flex">-->
			 <!--       <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
			 <!--       <button class="btn btn-warning text-white" type="submit">Search</button>-->
			 <!--   </form>-->
			    <img src="{{asset('template-user/img/ji_group_header.png')}}" width="300px;" alt="">
			</div>
		</div>
	</div>
<!-- end footer -->

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="{{ asset('template-user/js/jquery.js') }}"></script>
    
    <script src="{{ asset('template-user/js/owl-carousel/owl.carousel.min.js') }}"></script>

    <script type="text/javascript">
	  jQuery(document).ready(function() {
	     jQuery( '.carousel-inner .carousel-item:first' ).addClass( 'active' );
	  });
	</script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    
<script>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      margin: 10,
      nav: false,
      loop: false,
      responsive: {
        0: {
          items: 2
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    })
  })
</script>
    
</body>
</html>