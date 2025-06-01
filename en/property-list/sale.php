<?php
$conn = new mysqli("localhost", "root", "", "trustpoint_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Pagination setup
$limit = 6; // Properties per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Get total records
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM properties WHERE is_active = 1");
$totalRow = $totalResult->fetch_assoc();
$total = $totalRow['total'];
$pages = ceil($total / $limit);

// Fetch properties
$sql = "SELECT * FROM properties WHERE is_active = 1 ORDER BY created_date DESC LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from elysian.com/en/property-list/sale by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Apr 2025 12:23:17 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
		content="properties for sale in uae, dubai real estate for sale, dubai properties for sale, real estate properties for sale, commercial property for sale, dubai real estate agents, residential properties for sale, real estate agents in uae, real estate agents in dubai">
	<meta name="description"
		content="Properties for sale in UAE Choose from a wide variety of commercial and residential properties from Elysian one of the best Dubai real estate agents">
	<meta name="Elysian Real Estate" content="website">

	<!-- Title -->
	<title>Properties for Sale in UAE | Dubai Real Estate Agents | Elysian</title>
	<meta property="og:title" content="Properties for Sale in UAE | Dubai Real Estate Agents | Elysian" />
	<meta property="og:image" content="../../assets/images/icons/logo-main.png" />
	<meta property="og:url" content="../../index.html" />
	<meta property="og:site_name" content="Elysian Real Estate" />
	<meta property="og:description"
		content="Elysian Real Estate - We present highly personalised & hand-picked properties just for you" />
	<meta property="og:image:secure_url" content="../../assets/images/icons/logo-main.png" />

	<link rel="manifest" href="site.html">
	<link rel="apple-touch-icon" href="../../assets/images/">
	<meta name="theme-color" content="#151e47">
	<meta name="robots" content="max-image-preview:large">
	<link rel="canonical" href="../../index.html" />

	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>




	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53056980-1"
		type="28303422280c09dd2cfed4be-text/javascript"></script>
	<script type="28303422280c09dd2cfed4be-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-53056980-1');
</script>


	<!-- Google Tag Manager -->
	<script type="28303422280c09dd2cfed4be-text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WX4XXHX');</script>
	<!-- End Google Tag Manager -->



	<!-- Facebook Pixel Code -->
	<script type="28303422280c09dd2cfed4be-text/javascript">
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'../../../connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1985633954823848'); 
fbq('track', 'PageView');
</script>
	<noscript>
		<img height="1" width="1"
			src="https://www.facebook.com/tr?id=1985633954823848&amp;ev=PageView&amp;noscript=1" />
	</noscript>
	<!-- End Facebook Pixel Code -->





	<link href="../../assets/images/" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
	<link href="../../assets/images/" sizes="128x128" rel="shortcut icon" />

	<link href="../../assets/css/stylesbd045f9f.css?v=126" rel="stylesheet">
	<link href="../../assets/plugins/lightbox/magnific-popup.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../files/assets/pages/notification/notification.css">

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> 
-->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" />
 -->
	<!-- 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet"
		href="../../../cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

	<link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> -->


	<!-- Include the plugin's CSS and JS: -->

	<link rel="stylesheet" type="text/css" href="../../assets/css/style_new_work.css">

</head>

<body>

	<header>
		<div class=" bg-lighter">


			<style type="text/css">
				@media only screen and (max-width: 767.98px) {
					.video-call-icon {
						margin-left: 0px !important;
					}
				}
			</style>

		
			<nav
				class="navbar navbar-expand-lg navbar-soft navbar navbar-expand-lg navbar-light bg-header-latest pb-3 pt-2">

				<div class="container">
					<a class="navbar-brand" href="en.html">
						<!-- <img src="assets/images/icons/logo-white.png" alt="six senses the palm" class="img-fluid">  -->
						<img src="../../trusst.png" alt="" class="img-fluid">
					</a>

					<button class="navbar-toggler mt-0 mt-md-0" type="button" data-toggle="collapse"
						data-target="#main_nav99" aria-controls="main_nav99" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="main_nav99">

						<ul class="navbar-nav mx-auto">
							<li class="nav-item"><a class="nav-link" href="en/property-list/sale.html"> Buy </a></li>
							<li class="nav-item"><a class="nav-link" href="en/property-list/rent.html"> Rent </a></li>
							<li class="nav-item"><a class="nav-link" href="en/sell-with-us.html"> List </a></li>

							<li class="nav-item"><a class="nav-link" href="en/area-guides.html"> Area Guides </a></li>


							<!-- <li class="nav-item dropdown navDropdown">
								<a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdownMenuLink"
									role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Offplan </a>
								<div class="dropdown-menu dropdown-menu-right navDropdown"
									aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="en/off-plan-projects/all-projects.html">Latest
										Projects</a>
									<a class="dropdown-item" href="en/off-plan-projects/all-developers.html">Dubai
										Developers</a>
								</div>
							</li> -->
							<!--<li class="nav-item" ><a class="nav-link" href="https://elysian.com/latest-launches-in-dubai"> New Developments </a></li>-->

							<!-- <li class="nav-item dropdown navDropdown">
								<a class="nav-link" href="index.html" id="navbarDropdownMenuLink"
									role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									About Us </a>
								<div class="dropdown-menu dropdown-menu-right navDropdown"
									aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="en/about-us.html">Who we are</a>
									<a class="dropdown-item" href="en/our-agents.html">Our Team</a>
									<a class="dropdown-item" href="en/client-testimonials.html">Our Testimonials</a>
								</div>
							</li> -->


							<li class="nav-item" ><a class="nav-link" href="en/about-us.html"> Who we are </a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="en/join-our-team.html"> Careers</a></li> -->
							<li class="nav-item"><a class="nav-link" href="en/contact-us.html"> Contact Us </a></li>

							<!--<li class="nav-item dropdown navDropdown">-->
							<!--            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
							<!--          <img src="https://elysian.com/assets/images/icons/en.svg">-->
							<!--            </a>-->
							<!--            <div class="dropdown-menu flag-menu dropdown-menu-right navDropdown" aria-labelledby="navbarDropdownMenuLink">-->
							<!--              <a class="dropdown-item" href="https://elysian.com/"><img src="https://elysian.com/assets/images/icons/en.svg"> </a>-->
							<!--         <a class="dropdown-item" href="https://russian.elysian.com/"><img src="https://elysian.com/assets/images/icons/ru.svg"> </a>-->
							<!--            </div>-->
							<!--        </li>-->

						</ul>



						<!-- Left links -->

						<div class="d-flex align-items-center justify-content-lg-end justify-content-center">
							<ul class="navbar-nav mobile-cheater">
								<!-- <li class=" d-md-inline-block">
									<a href="en/book-valuation.html"
										class="btn bg-main-blue text-white py-2 text-capitalize no-radius book-val">
										Book Valuation
									</a>
								</li> -->
								<li class=" d-md-inline-block">
									<a class="btn text-white bg-main-blue ml-1 py- px-4  text-capitalize  video-call-icon"
										href="#"
										onclick="if (!window.__cfRLUnblockHandlers) return false; Calendly.initPopupWidget({url: 'https://calendly.com/elysian-real-estate/instant-video-call?hide_gdpr_banner=1'});return false;"
										data-cf-modified-b4261873876b98ad6c39f619-="">


										<span class="book-video"> Book a Video call</span> <i
											class="fa fa-video-camera"></i>
									</a>
								</li>

							</ul>


							
						</div>



					</div>


				</div>
			</nav>


		</div>
	</header>








	<style type="text/css">
		.search_result_anchor {
			text-decoration: none !important;
		}

		/*************************styles of the search bar new****************/
		.field-sec {
			border-top: 1px solid #E5E5E5;
		}

		@media (min-width: 768px) {
			.pb-md-4 {
				padding-bottom: 1.5rem !important;
			}
		}

		.Itm-types .itm-box {
			background: #fff;
		}

		.shadow-1 {
			box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .05) !important;
		}

		.sort-picking h1 {
			font-style: normal;
			font-weight: 600;
			font-size: 22px;
			letter-spacing: -0.02em;
		}

		/*************************styles of the search bar new ends here****************/
	</style>

	<section class="field-sec pt-4 pb-1 pb-md-4 bg-main-blue">
		<div class="container">

			<form action="../../search_listings.php" id="mytform" method="post"
				accept-charset="utf-8">
				<!-- <form name="search_sort_form" action="https://elysian.com/en/submit_search_filter"> -->
				<div class="row">
					<div class="col-lg-10">
						<input type="hidden" name="sort_option_selected" value="">
						<div class="p-3">
							<div class="row">
								<div class="propr_here">

								</div>

								<input type="hidden" name="tag_length_val" value="0">
								<div class="display_tags_val">

								</div>
							</div>
							<div class="row mb-3">

								<!-- <input type="hidden" name="offering_type" value="sale"> -->

								<div class="col-md pl-md-0 pl-2 pr-2">
									<select name="offering_type" placeholder="Category" class=" form-control bg-white"
										onchange="if (!window.__cfRLUnblockHandlers) return false; choose_price_show()"
										data-cf-modified-28303422280c09dd2cfed4be-="">

										<option value="sale" selected="selected" selected>Sale</option>

										<option value="rent">Rent</option>
									</select>
								</div>
								<div class="col-md px-2">
									<select name="property_type" placeholder="Property Type" id="type"
										class=" form-control bg-white">
										<option style="display: none" value="">Property Type</option>
										<option value="Apartment">Apartment</option>
										<option value="Townhouse">Townhouse</option>
										<option value="Villa">Villa</option>
										<option value="Penthouse">Penthouse</option>
										<option value="Land">Land</option>

										<option value="Studio">Studio</option>
										<option value="Office">Office</option>
										<option value="Commercial">Commercial</option>
										<option value="Shop">Shop</option>
										<option value="Duplex">Duplex</option>
										<option value="Hotel Apartment">Hotel Apartment</option>
										<option value="Loft">Loft</option>
										<option value="Retail">Retail</option>
										<option value="Residential">Residential</option>

									</select>
								</div>
								<!-- 	<div class="col-md" >
										 <div class="input-group">
										<input type="text" class="form-control  bg-white" placeholder="Enter Location"  onKeyUp="showResults(this.value)" autocomplete="off" /><i class="fa fa-map-marker"></i>
													<div id="result"></div>
										</div>

										  <div class="input-group  input-group-lg ">
                    <input type="text" class="form-control bg-white " placeholder="Building Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                  </div> 

									</div> -->

								<div class="col-md px-2">
									<div class="input-group   ">
										<input type="text" class="form-control bg-white border-end-0"
											placeholder="Enter Location" aria-label="Sizing example input"
											aria-describedby="inputGroup-sizing-lg"
											onKeyUp="if (!window.__cfRLUnblockHandlers) return false; showResults(this.value)"
											autocomplete="off" data-cf-modified-28303422280c09dd2cfed4be-="">
										<span class="input-group-text bg-white border-start-0 px-1" id=""><i
												class="fa fa-search"></i></span>
										<div id="result"></div>
									</div>
								</div>
								<div class="col-md px-2">
									<select name="bedroom" placeholder="Bedroom" id="bedid"
										class=" form-control bg-white js-example-basic-single">
										<option style="display: none" value="">Bedrooms</option>
										<option value="">Choose</option>

										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value=">4">5+</option>

									</select>
								</div>


								<div class="col-md px-2">


									<div class="sales_price" style="display:block;">
										<select name="price_from" placeholder="Price range"
											class=" form-control bg-white">
											<option selected="" style="display: none" value="">Price Range</option>
											<option value="">Choose</option>
											<option value="0-500k">0-500k</option>
											<option value="500k-1m"> 500k-1m</option>
											<option value="1m-5m">1m-5m</option>
											<option value="5m-10m">5m-10m</option>
											<option value="10m-20m">10m-20m</option>
											<option value="20m-30m">20m-30m</option>
											<option value="30m-40m">30m-40m</option>
											<option value="40m-50m">40m-50m</option>
											<option value="50m+">50m+</option>

										</select>
									</div>

									<div class="rent_price" style="display: none;">
										<select name="price_from_rent" placeholder="Price range"
											class=" form-control bg-white">
											<option selected="" style="display: none" value="">Price Range</option>
											<option value="">Choose</option>
											<option value="10k-100k">10k-100k</option>
											<option value="100k-500k"> 100k-500k</option>
											<option value="500k-1m">500k-1m</option>
											<option value="1m-3m">1m-3m</option>

										</select>
									</div>


								</div>
							</div>


							<div class="collapse show_dropdown" id="collapseExample">
								<div class="row mb-3">

									<div class="col-md pl-md-0 pl-2 pr-2">
										<select name="completion_sts" placeholder="Completion status"
											class=" form-control bg-white">
											<option style="display: none" value="">Completion Status</option>
											<option value="Completed">Completed</option>
											<option value="Off Plan">Off-Plan</option>

										</select>
									</div>
									<div class="col-md px-2">
										<select name="size_range" placeholder="Size" class=" form-control bg-white">
											<option selected="" style="display: none" value="">Size </option>
											<option value="">Choose</option>
											<option value="1000">0 to 1000 sq.ft.</option>
											<option value="3000">1001 to 3000 sq.ft.</option>
											<option value="5000">3001 to 5000 sq.ft.</option>
											<option value="15000">5001 to 15000 sq.ft.</option>
											<option value="15001">15000+ sq.ft.</option>
										</select>
									</div>
									<div class="col-md px-2">
										<select name="furnished_sts" placeholder="Location"
											class=" form-control bg-white">
											<option style="display: none" value="">Furnished Status</option>
											<option value="Yes">Furnished</option>
											<option value="Partly">Partly Furnished</option>
											<option value="No">Unfurnished</option>
										</select>
									</div>
									<div class="col-md px-2 d-none d-md-block">
										<select name="amenities[]" placeholder="Amenities"
											class=" form-control bg-white  selectpicker " multiple
											data-live-search="true" data-style="bg-white" data-dropup-auto="false">
											<option value="" selected=""> Amenities</option>

											<option value="Shared Gym;">Shared GYM</option>

											<option value="Shared Spa;">Shared Spa</option>

											<option value="Balcony;">Balcony</option>

											<option value="Shared Pool;">Shared Pool</option>

											<option value="Private Jacuzzi;">Private Jacuzzi</option>

											<option value="Private Garden;">Private Garden</option>

											<option value="Central A/C & Heating;">Central A/C & Heating
											</option>
											<option value="Study;">Study</option>

											<option value="Pets Allowed;">Pets Allowed</option>

											<option value="Walk in Closet;">Walk in Closet</option>

											<option value="Built in Wardrobes;">Built in Wardrobes
											</option>
											<option value="Built in Kitchen Appliances;">Built in Kitchen Appliances
											</option>

											<option value="Security;">Security</option>

											<option value="Concierge Service;">Concierge Service</option>

											<option value="Maids Room;">Maids Room</option>

											<option value="Maid Service;">Maid Service</option>

											<option value="Covered Parking;">Covered Parking</option>

											<option value="View of Landmark;">View of Landmark</option>

											<option value="View of Water;">View of Water</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row mt-1 ">

								<div class="col-md-3  pl-0 pr-2">
									<button class="btn mt-2 mt-md-0 btn-block text-white search_submit_btn"
										type="submit" style="border: 2px solid #fff !important;">Search</button>
								</div>

								<div class="col-md-3">
									<button type="button" data-toggle="collapse" data-target="#collapseExample"
										aria-expanded="false" aria-controls="collapseExample"
										class="btn mt-md-0 change_btn_name text-white"
										onclick="if (!window.__cfRLUnblockHandlers) return false; change_btn_name()"
										data-cf-modified-28303422280c09dd2cfed4be-="">+ Advance Search</button>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-2">

					</div>
				</div>
			</form>
		</div>
	</section>
	
	<section class="pt-5 pb-1 sort-picking">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6">
					<h1 class="h3-ely text-el-blue  font-weight-bold">
						Properties For Sale In Dubai </h1>
					<small>119 results</small>
				</div>
				<div class="col-12 col-md-6">
					<div class="d-flex justify-content-center justify-content-md-end align-items-center">
						<label for="" style="margin-bottom: 0px;">Sort by:</label>
						<select
							class="form-select bg-white border-0 shadow-1 form-select-md select-option-dropdown mx-3"
							aria-label=".form-select-lg example" name="sort_filter"
							onchange="if (!window.__cfRLUnblockHandlers) return false; sort_filter()"
							data-cf-modified-28303422280c09dd2cfed4be-="">
							<option value="" selected="selected">Choose</option>
							<option value="latest"> Latest Listing</option>
							<option value="oldest">Oldest Listing</option>
							<option value="high_low">Price High to Low</option>
							<option value="low_high">Price Low to High</option>
						</select>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-white py-1">
	<div class="container">
		<div class="row mt-5 mb-4">

			<?php while ($row = $result->fetch_assoc()): ?>
				<div class="col-sm-6 col-xs-12 col-lg-4 mb-5">
					<a href="../property-details/<?= htmlspecialchars($row['ref']) ?>-<?= urlencode($row['title']) ?>.html">
						<div class="main-pro" style="box-shadow: 5px 5px 5px #ddd;">
							<img src="<?= $row['dp'] ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="img-fluid">
							<div class="p-3 bg-white adj-hgt">
								<h3 class="text-el-blue mt-4 font-weight-bold">AED <?= number_format($row['price']) ?></h3>
								<p class="text-alaya mb-0"><?= htmlspecialchars($row['category']) ?> for <?= htmlspecialchars($row['purpose']) ?></p>
								<p class="text-el-blue mb-1 font-p"><?= htmlspecialchars($row['building_name']) ?></p>
								<p class="text-alaya"><i class="fa fa-map-marker"></i> <?= htmlspecialchars($row['location']) ?>, <?= htmlspecialchars($row['community']) ?></p>
							</div>

							<div class="row no-gutters">
								<button class="col btn-block no-radius btn bg-alaya border-righter">
									<i class="fa fa-bed"></i> <?= $row['bedroom'] ?> Beds
								</button>
								<button class="col btn-block no-radius btn bg-alaya border-righter">
									<i class="fa fa-bath"></i> <?= $row['bathroom'] ?> bathrooms
								</button>
								<button class="col btn-block no-radius btn bg-alaya">
									<i class="fa fa-arrows"></i> <?= $row['size'] ?> <?= $row['size_unit'] ?>
								</button>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>

		</div>

		<!-- Pagination -->
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center">
				<?php for ($i = 1; $i <= $pages; $i++): ?>
					<li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
						<a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
					</li>
				<?php endfor; ?>
			</ul>
		</nav>
	</div>
</section>

<?php
$conn->close();
?>
	<!-- SCROLL TO TOP -->


	<!-- SCROLL TO TOP -->
	<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
	<!-- END SCROLL TO TOP -->


	<script src="../../assets/js/index.bundlebd04bd04.js?8918068d71def746395d"
		type="28303422280c09dd2cfed4be-text/javascript"></script>
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"
		type="28303422280c09dd2cfed4be-text/javascript"></script>
	<script type="28303422280c09dd2cfed4be-text/javascript" src="../../assets/js/script_search_functions.js"></script>
	<script type="28303422280c09dd2cfed4be-text/javascript" src="../../assets/js/matchHeight-min.js"></script>

	<!-- notification js -->
	<script type="28303422280c09dd2cfed4be-text/javascript" src="../../files/assets/js/bootstrap-growl.min.js"></script>


	<script type="28303422280c09dd2cfed4be-text/javascript">
  function modalOne(heading,subheading){
    $("#anyModal").modal();    
    $("#modal_title").text(heading);
    $("#modal_desc").text(subheading);    
  }
</script>


	<script type="28303422280c09dd2cfed4be-text/javascript">
window.addEventListener('mouseover', initLandbot, { once: true });
window.addEventListener('touchstart', initLandbot, { once: true });
var myLandbot;
function initLandbot() {
  if (!myLandbot) {
    var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
    s.addEventListener('load', function() {
      var myLandbot = new Landbot.Livechat({
        configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-1778455-766IER25L33NKZOS/index.json',
      });
    });
    s.src = '../../../cdn.landbot.io/landbot-3/landbot-3.0.0.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
  }
}
</script>


	<script type="28303422280c09dd2cfed4be-text/javascript">
  $(document).ready(function(){  
    $('.button_subscribe').on("click",function()
    {
      var subscribe_email=$("input[name='subscribe_email']").val();
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(regex.test(subscribe_email)==true)
        {
          jQuery.ajax({
                url:"https://elysian.com/Home/submit_subscribe",
                type:"post",
                data:{"subscribe_email":subscribe_email},
                success:function(result)
                {
                   if(result)
                   {
                   $('.show_sub_result').html(result);
                   }                       
                }
            });
        }
        else
        {
           $('.show_sub_result').html('<p style="color:red">ERROR::Bad Email Format.</p> ');
        }

      //alert('isndie the button');
    });
  });

</script>


	<script type="28303422280c09dd2cfed4be-text/javascript">
	$(function(){
		$('.adj-hgt').matchHeight();
	});
</script>

	<script type="28303422280c09dd2cfed4be-text/javascript">
		function change_btn_name()
		{
			console.log('inside the btn change');
			$('.show_dropdown').toggle();
			if ($('.show_dropdown').is(':visible'))
	    	{
	    		$('.change_btn_name').html('- Advanced Search');
	    	}
	    	else
	    	{
	    		$('.change_btn_name').html('+ Advanced Search');
	    	}
		}

///////social icons /////
$(window).scroll(function () {
		if ($(this).scrollTop() > 350) {
			$("#socials").fadeIn();
		} else {
			$("#socials").fadeOut();
		}
	});
	</script>

	<!--<script>-->
	<!--document.querySelectorAll('a[href^="#"]').forEach(a => {-->
	<!--       a.addEventListener('click', function (e) {-->
	<!--           e.preventDefault();-->
	<!--           var href = this.getAttribute("href");-->
	<!--           var elem = document.querySelector(href)||document.querySelector("a[name="+href.substring(1, href.length)+"]");-->
	<!--//gets Element with an id of the link's href -->
	<!--//or an anchor tag with a name attribute of the href of the link without the #-->
	<!--           window.scroll({-->
	<!--               top: elem.offsetTop, -->
	<!--               left: 0, -->
	<!--               behavior: 'smooth' -->
	<!--           });-->
	<!-- //if you want to add the hash to window.location.hash-->
	<!-- //you will need to use setTimeout to prevent losing the smooth scrolling behavior-->
	<!--//the following code will work for that purpose-->
	<!--/*setTimeout(function(){-->
	<!--     window.location.hash = this.hash;-->
	<!-- }, 2000); */-->
	<!--       });-->
	<!--   });-->
	<!--</script>-->
	<!-- Calendly link widget begin -->
	<link href="../../../assets.calendly.com/assets/external/widget.css" rel="stylesheet">
	<script src="../../../assets.calendly.com/assets/external/widget.js" type="28303422280c09dd2cfed4be-text/javascript"
		async></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
 -->
	<!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
 -->

	<link rel="stylesheet" type="text/css"
		href="../../../cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/css/intlTelInput.css">
	<script type="28303422280c09dd2cfed4be-text/javascript"
		src="../../../cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/intlTelInput.js"></script>

	<script type="28303422280c09dd2cfed4be-text/javascript">
 ////////////////for get in touch form/////////////////
       var input = document.querySelector(".phone2"),
        errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"],
        result = document.querySelector("#result");
    
    
    window.addEventListener("load", function () {
      
      
      errorMsg = document.querySelector("#error-msg");
    
    function getIp(callback) {
        fetch('https://jsonip.com/', { mode: 'cors' })
  .then((resp) => resp.json())
  
  .catch(() => {
         return {
          country: '',
         };
      })
      
   .then((resp) => callback(resp.country));
  
    //  fetch('https://www.findip.net/', { headers: { 'Accept': 'application/json' }})
    //   .then((resp) => resp.json())
      
    //   .catch(() => {
    //      return {
    //       country: '',
    //      };
    //   })
       
    //   .then((resp) => callback(resp.country));
    //     console.log('inside the ip');
    //   console.log(resp.json());
    }
      
    var iti = window.intlTelInput(input, {
                // allowDropdown: false,
                // dropdownContainer: document.body,
                // excludeCountries: ["us"],
                hiddenInput: "full_number",                         
                nationalMode: false,
                formatOnDisplay: true,           
                separateDialCode: true,
                autoHideDialCode: true, 
                autoPlaceholder: "aggressive" ,
                initialCountry: "auto",
                placeholderNumberType: "MOBILE",
                preferredCountries: ['ae','ge'],           
                geoIpLookup: function(callback) {
                    $.get('https://freeipapi.com/api/json', function (data) {
                        callback(data.countryCode);
   // console.log(data.countryCode);
});
    // $.get('https://ipinfo.io?token=dc16e243f14bf5', function() {}, "jsonp").always(function(resp) {
    //   var countryCode = (resp && resp.country) ? resp.country : "";
    //   callback(countryCode);
    // });
  },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/utils.js",
            });
      
      
      input.addEventListener('keyup', formatIntlTelInput);
    input.addEventListener('change', formatIntlTelInput);
    
    function formatIntlTelInput() {
        if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
            var currentText = iti.getNumber(intlTelInputUtils.numberFormat.E164);
            if (typeof currentText === 'string') { // sometimes the currentText is an object :)
                iti.setNumber(currentText); // will autoformat because of formatOnDisplay=true
            }
        }
    }
       
      
             
           input.addEventListener('keyup', function () {     
                reset();
                if (input.value.trim()) {
                    if (iti.isValidNumber()) {
            $(input).addClass('form-control is-valid');
                             
                    } else {                  
                        $(input).addClass('form-control is-invalid');
                        var errorCode = iti.getValidationError();
                        errorMsg.innerHTML = errorMap[errorCode];                   
                        $(errorMsg).show();
                    }
                }
            });        
            input.addEventListener('change', reset);        
            input.addEventListener('keyup', reset);
            
      
          var reset = function () {
            $(input).removeClass('form-control is-invalid');
            errorMsg.innerHTML = "";
            $(errorMsg).hide();
          
        };
      
      
      
    ////////////// testing - start //////////////
    
    input.addEventListener('keyup', function(e) {
      e.preventDefault();
      var num = iti.getNumber(),
          valid = iti.isValidNumber();
      result.textContent = "Number: " + num + ", valid: " + valid;
    }, false);
    
    input.addEventListener("focus", function() {
      result.textContent = "";
    }, false);
        
        
   var iti3_1 = window.intlTelInputGlobals.getInstance(input);     
   input.addEventListener('input', function() {
    var fullNumber = iti3_1.getNumber();
         console.log(fullNumber+' phone');
    // document.querySelector('fullphone_number').value = fullNumber;
    document.querySelector('.input-phone2').value = fullNumber;
  });
      
      $(input).on("focusout", function(e, countryData) {
                   var intlNumber = iti.getNumber();
                   console.log(intlNumber);   
               });
      
    ////////////// testing - end //////////////
      
        });
        
        
      //-----------------------only-phone-number-input code (with +)-------------------------------start-------// 
       function isPhoneNumberKey(evt)
       {
           var charCode = (evt.which) ? evt.which : evt.keyCode
           if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
               return false;
           return true;
       }

       //-----------------------only-phone-number-input code (with +)-------------------------------end-------//         
  </script>


	<script type="28303422280c09dd2cfed4be-text/javascript">
  ///////////////for register interest form - anymodal ////////////////
       var input_new = document.querySelector(".phone1"),
        errorMap_new = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"],
        result_new = document.querySelector("#result-new");
    
    
    window.addEventListener("load", function () {
      
      
      errorMsg_new = document.querySelector("#error-msg-new");
    
   function getIp(callback) {
        fetch('https://jsonip.com/', { mode: 'cors' })
  .then((resp) => resp.json())
  
  .catch(() => {
         return {
          country: '',
         };
      })
      
   .then((resp) => callback(resp.country));
  
    //  fetch('https://www.findip.net/', { headers: { 'Accept': 'application/json' }})
    //   .then((resp) => resp.json())
      
    //   .catch(() => {
    //      return {
    //       country: '',
    //      };
    //   })
       
    //   .then((resp) => callback(resp.country));
    //     console.log('inside the ip');
    //   console.log(resp.json());
    }
      
    var iti_new = window.intlTelInput(input_new, {
                // allowDropdown: false,
                // dropdownContainer: document.body,
                // excludeCountries: ["us"],
                hiddenInput: "full_number",                         
                nationalMode: false,
                formatOnDisplay: true,           
                separateDialCode: true,
                autoHideDialCode: true, 
                autoPlaceholder: "aggressive" ,
                initialCountry: "auto",
                placeholderNumberType: "MOBILE",
                preferredCountries: ['ae','ge'],           
                geoIpLookup: function(callback) {
                     $.get('https://freeipapi.com/api/json', function (data) {
                        callback(data.countryCode);
   // console.log(data.countryCode);
});
    // $.get('https://ipinfo.io?token=dc16e243f14bf5', function() {}, "jsonp").always(function(resp) {
    //   var countryCode = (resp && resp.country) ? resp.country : "";
    //   callback(countryCode);
    // });
  },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/utils.js",
            });
      
      
      input_new.addEventListener('keyup', formatIntlTelInput);
    input_new.addEventListener('change', formatIntlTelInput);
    
    function formatIntlTelInput() {
        if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
            var currentText = iti_new.getNumber(intlTelInputUtils.numberFormat.E164);
            if (typeof currentText === 'string') { // sometimes the currentText is an object :)
                iti_new.setNumber(currentText); // will autoformat because of formatOnDisplay=true
            }
        }
    }
       
      
             
           input_new.addEventListener('keyup', function () {     
                reset();
                if (input_new.value.trim()) {
                    if (iti_new.isValidNumber()) {
            $(input_new).addClass('form-control is-valid');
                             
                    } else {                  
                        $(input_new).addClass('form-control is-invalid');
                        var errorCode = iti_new.getValidationError();
                        errorMsg_new.innerHTML = errorMap_new[errorCode];                   
                        $(errorMsg_new).show();
                    }
                }
            });        
            input_new.addEventListener('change', reset);        
            input_new.addEventListener('keyup', reset);
      
          var reset = function () {
            $(input_new).removeClass('form-control is-invalid');
            errorMsg_new.innerHTML = "";
            $(errorMsg_new).hide();
          
        };
      
      
      
    ////////////// testing - start //////////////
    
    input_new.addEventListener('keyup', function(e) {
      e.preventDefault();
      var num = iti_new.getNumber(),
          valid = iti_new.isValidNumber();
      result_new.textContent = "Number: " + num + ", valid: " + valid;
    }, false);
    
    input_new.addEventListener("focus", function() {
      result_new.textContent = "";
    }, false);
        
        
     var iti3_2 = window.intlTelInputGlobals.getInstance(input_new); 
         input_new.addEventListener('input', function() {
    var fullNumber = iti3_2.getNumber();
         console.log(fullNumber+'phone');
    // document.querySelector('fullphone_number').value = fullNumber;
    document.querySelector('.input-phone1').value = fullNumber;
  });
      
      $(input_new).on("focusout", function(e, countryData) {
                   var intlNumber = iti_new.getNumber();
                   console.log(intlNumber);   
               });
      
    ////////////// testing - end //////////////
      
        });
        
        
      //-----------------------only-phone-number-input code (with +)-------------------------------start-------// 
      
       //-----------------------only-phone-number-input code (with +)-------------------------------end-------//         
  </script>


	<script type="28303422280c09dd2cfed4be-text/javascript">
  ///////////////for agent modal - agentmodal //////////////////////////
       var input_new1 = document.querySelector(".phone3"),
        errorMap_new1 = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"],
        result_new1 = document.querySelector("#result_new1");
    
    
    window.addEventListener("load", function () {
      
      
      errorMsg_new1 = document.querySelector("#error-msg-new1");
    
    function getIp(callback) {
        fetch('https://jsonip.com/', { mode: 'cors' })
  .then((resp) => resp.json())
  
  .catch(() => {
         return {
          country: '',
         };
      })
      
   .then((resp) => callback(resp.country));
  
    //  fetch('https://www.findip.net/', { headers: { 'Accept': 'application/json' }})
    //   .then((resp) => resp.json())
      
    //   .catch(() => {
    //      return {
    //       country: '',
    //      };
    //   })
       
    //   .then((resp) => callback(resp.country));
    //     console.log('inside the ip');
    //   console.log(resp.json());
    }
      
    var iti_new1 = window.intlTelInput(input_new1, {
                // allowDropdown: false,
                // dropdownContainer: document.body,
                // excludeCountries: ["us"],
                hiddenInput: "full_number",                         
                nationalMode: false,
                formatOnDisplay: true,           
                separateDialCode: true,
                autoHideDialCode: true, 
                autoPlaceholder: "aggressive" ,
                initialCountry: "auto",
                placeholderNumberType: "MOBILE",
                preferredCountries: ['ae','ge'],           
                geoIpLookup: function(callback) {
                    $.get('https://freeipapi.com/api/json', function (data) {
                        callback(data.countryCode);
   // console.log(data.countryCode);
});
    // $.get('https://ipinfo.io?token=dc16e243f14bf5', function() {}, "jsonp").always(function(resp) {
    //   var countryCode = (resp && resp.country) ? resp.country : "";
    //   callback(countryCode);
    // });
  },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/utils.js",
            });
      
      
       var iti3_3 = window.intlTelInputGlobals.getInstance(input_new1);   
         input_new1.addEventListener('input', function() {
    var fullNumber = iti_new1.getNumber();
         console.log(fullNumber+'phone get in tyouch');
    // document.querySelector('fullphone_number').value = fullNumber;
    document.querySelector('.input-phone3').value = fullNumber;
  });
  
  
  
      
      input_new1.addEventListener('keyup', formatIntlTelInput);
    input_new1.addEventListener('change', formatIntlTelInput);
    
    function formatIntlTelInput() {
        if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
            var currentText = iti_new1.getNumber(intlTelInputUtils.numberFormat.E164);
            if (typeof currentText === 'string') { // sometimes the currentText is an object :)
                iti_new1.setNumber(currentText); // will autoformat because of formatOnDisplay=true
            }
        }
    }
       
      
             
           input_new1.addEventListener('keyup', function () {     
                reset();
                if (input_new1.value.trim()) {
                    if (iti_new1.isValidNumber()) {
            $(input_new1).addClass('form-control is-valid');
                             
                    } else {                  
                        $(input_new1).addClass('form-control is-invalid');
                        var errorCode = iti_new1.getValidationError();
                        errorMsg_new1.innerHTML = errorMap_new1[errorCode];                   
                        $(errorMsg_new1).show();
                    }
                }
            });        
            input_new1.addEventListener('change', reset);        
            input_new1.addEventListener('keyup', reset);
      
          var reset = function () {
            $(input_new1).removeClass('form-control is-invalid');
            errorMsg_new1.innerHTML = "";
            $(errorMsg_new1).hide();
          
        };
      
      
      
    ////////////// testing - start //////////////
    
    input_new1.addEventListener('keyup', function(e) {
      e.preventDefault();
      var num = iti_new1.getNumber(),
          valid = iti_new1.isValidNumber();
      result_new1.textContent = "Number: " + num + ", valid: " + valid;
    }, false);
    
    input_new1.addEventListener("focus", function() {
      result_new1.textContent = "";
    }, false);
        
        
      
      
      $(input_new1).on("focusout", function(e, countryData) {
                   var intlNumber = iti_new1.getNumber();
                   console.log(intlNumber);   
               });
      
    ////////////// testing - end //////////////
      
        });
        
        
      //-----------------------only-phone-number-input code (with +)-------------------------------start-------// 
      
       //-----------------------only-phone-number-input code (with +)-------------------------------end-------//         
  </script>

	<!-- Start RAEK Code for elysian.com -->
	<script type="28303422280c09dd2cfed4be-text/javascript">
					(function(window, document, id){
					    var script = document.createElement('script');
					    script.id = 'raekTag';
					    script.type = 'text/javascript';
					    script.src = '../../../cdn.raek.net/js/raek.min5445.js?id='+id;
					    script.async = true;
					    document.getElementsByTagName('head')[0].appendChild(script);
					})(window, document, "4e65928d35e0e7522ad19d29794015294755c8f27bd23083bd21f905548b8cfff4a9f1e573da74aa9b8dd8430410492a6aa2ac3c4a1a5fb0be9cb4485c31c54d");
					</script>
	<!-- End RAEK Code -->

	<!-- Footer -->
	<footer class="py-5 bg-main-blue">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class=" text-white"><b>Trust Point Realty</b></p>
				</div>
				<div class="col-md-2">
					<div class="footer-menu">
						<h5 class="text-white"> Menu </h5>
						<a href="en/about-us.html" alt="About Us">About Us </a>
						<a href="en/our-agents.html">Our Team</a>
						<a href="en/join-our-team.html">Careers</a>
						<a href="en/property-management.html">Property Management</a>
						<a href="en/real-estate-latest-news.html">Blogs</a>
						<!-- <a href="" >Services</a>           -->
						<!-- <a href="" >Offices</a> -->
						<a href="en/contact-us.html">Contact Us</a>

					</div>
				</div>
				<div class="col-md-3  mt-4 mt-md-0">
					<div class="footer-menu">
						<h5 class="text-white"> Contact Us</h5>
						<p class="text-white">info@trustpointrealty.ae
							<!--<span class="d-block">Head Office </span>-->
							<!--<span class="d-block">Elysian Real Estate Broker L.L.C <br/> Elysian Sales Center </span>-->
							<span class="d-block"> Trust Point Realty </span>
							<span class="d-block"> Sheikh Zayed Road, Dubai, UAE</span>
							<span class="d-block">+971 56 139 6917</span>
							<!--<span class="d-block">+971 (04) 885-3050</span>-->
					</div>
				</div>
				<!-- <div class="col-md-2">
        <div class="footer-menu">
          <h5 class="text-white" > Letting </h5>
          <a data-toggle="modal" class="text-white" data-target="#bookvaluation" >Free Valuation</a>
          <a data-toggle="modal" class="text-white" data-target="#residentialSearch" >Residentail Serach</a>
          <a href="" >Mortgage Calculator </a>
          <a href="contact.php" >Contact Us</a>
        </div>
      </div> -->
				<div class="col-md-7">
					<div class="mt-4 mt-md-0">
						<h5 class="text-white"> Keep up to date </h5>
						<p class="text-white">Subscribe to our newsletters to be the first to hear the latest news about
							what is happening in real estate market.</p>
						<div class="footer-form">
							<div class="row no-gutters">
								<div class="form-group col-7 col-lg-9">
									<form class="footer_mailchimp_form">


										<input type="email" required="" class="form-control footer-input"
											name="subscribe_email" placeholder="Email">
										<div class="show_sub_result"></div>
								</div>
								<div class="col-5 col-lg-3">
									<button class="btn btn-primary rounded-elg button_subscribe" type="submit"
										name="submit">Subscribe</button>
								</div>
							</div>
							</form>
							<div class="row mt-3">
								<div class=" col-12">
									<p class="text-white fervonix-paragraph-sm">By clicking subscribe, you agree to our
										terms of use and privacy.</p>
								</div>
								<div class="d-flex text-lg-center py-4 px-2 py-md-0">
									<a target="_blank" href=""
										class="text-white px-2"><img src="../../assets/images/icons/fb.png"></a>
									<a target="_blank" href=""
										class="text-white px-2"><img src="../../assets/images/icons/tw.png"></a>
									<a target="_blank" href=""
										class="text-white px-2"><img src="../../assets/images/icons/insta.png"></a>
									<a target="_blank"
										href=""
										class="text-white px-2"><img src="../../assets/images/icons/youtube.png"></a>
									<a target="_blank"
										href=""
										class="text-white px-2"><img src="../../assets/images/icons/linkedin.png"></a>
								</div>

							</div>
						</div>


					</div>
				</div>
			</div>





			<div class="row ">
				<div class="col-md-12">
					<div class="footer-end pt-4">
						<div class="row">
							<div class="col-md-6 text-muted">
								<a href="" class="text-white">Terms & Conditions </a> <span
									class="px-1">|</span>
								<a href="" class="text-white"> Privacy Policy </a>
							</div>

							<!-- <div class="col-md-2 ">
								<p class="text-white" style="display:block;"> <span><a href="en.html"><img
												src="assets/images/icons/en.svg">English | </a></span>
									<span><a href="ru.html"><img src="as">Russian</a></span>
								</p>
							</div> -->

							<div class="col-md-6 text-lg-right">
								<p class="text-white">Copyright © trustpointrealty 2025 . All Rights Reserved. </p>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div>
	</footer>

	<!--------------------modal for social chat icons--------------------->
	<style>
		/*Social Media Icons CSS*/

		.social-media-icon {
			position: fixed;
			top: 90%;
			left: 0;
			display: inline-flex;
			align-items: center;
			justify-content: right;
			transform: translateY(-50%);
			z-index: 15000;
			/*display: none;*/

		}

		.social-media-icon ul li {
			width: 100%;
		}

		.social-media-icon ul li a {
			display: inline-flex;
			align-items: center;
			padding: 10px 15px;
			font-size: 20px;
			border-radius: 10px;
			color: #fff;
			box-shadow: 0px 2px 6px rgb(0, 0, 0, 0.1);
			transition: 0.8s all;
			margin: 5px 0;
			text-decoration: none;
			text-align: center;
		}

		.social-media-icon ul li .whatsapp-btn {
			background: #25d366;
		}

		.social-media-icon ul li .call-btn {
			background: #50afe4;
		}

		.social-media-icon ul {
			list-style: none;
			float: right;
		}


		.social-media-icon ul li a .icon {
			font-size: 25px;
			width: 35px;
		}

		.eaMApA {
			right: auto !important;
			left: 0px;

		}
	</style>

	<div class="social-media-icon" id="socials">
		<ul>
			<li>
				<a href="tel:+97148853050" class="call-btn">
					<i class="icon ion-android-call"></i>

				</a>
			</li>
			<li>
				<a href="https://api.whatsapp.com/send?phone=971547786800&amp;text=I+would+like+to+know+more+information+about+Elysian%20Real%20Estate%20."
					target="_blank" class="whatsapp-btn">
					<i class="icon ion-social-whatsapp-outline"></i>

				</a>
			</li>
		</ul>
	</div>
	<!--------------------end modal for social chat icons--------------------->

	<!--<div class="modal fade" id="anyModal" tabindex="1" role="dialog" aria-hidden="true">-->
	<!--  <div class="modal-dialog modal-md" role="document">             -->
	<!--    <div class="modal-content">-->
	<!--      <div class="modal-body">-->
	<!--        <div class="d-flex">-->
	<!--          <span class="filler" ></span>-->
	<!--          <button class="btn btn-link text-danger" data-dismiss="modal" >Ask Me Later</button>-->
	<!--        </div>-->
	<!--        <div class="px-3">-->
	<!--          <div class="product-form-header text-center">-->
	<!--            <h3 class="text-center text-capitalize mb-1" id="modal_title" > Register Now </h3>-->
	<!--            <h5 id="modal_desc" >Fill in your details below to receive more information on this development. </h5>-->
	<!--          </div>-->
	<!--          <div class="product-form-body">-->
	<!--            <form method="POST" action="https://www.elysian.com/lp/form/send.php" >-->

	<!--                  <input type="hidden" name="APIK" value="8hdysnd4es5" >-->
	<!--                  <input type="hidden" name="channel" value="" >-->
	<!--                  <input type="hidden" name="type" value="" >-->



	<!--            <div class="row">-->
	<!--              <div class="form-group col-12">-->
	<!--                <input type="text" required="" class="form-control" placeholder="Your Name" name="name" >-->
	<!--              </div>-->
	<!--              <div class="form-group col-md-6">-->
	<!--                <input type="text" class="form-control" required="" placeholder="Phone" id="phone1" name="phone" >-->
	<!--              </div>-->
	<!--              <div class="form-group col-md-6">-->
	<!--                <input type="email" class="form-control" placeholder="Email"  name="email" >-->
	<!--              </div>-->
	<!--              <div class="form-group col-md-12">-->
	<!--                <textarea type="text" class="form-control" name="comment" placeholder="Message" ></textarea>-->
	<!--              </div>-->
	<!--            </div>-->
	<!--            <div class="profile__agent__footer">-->
	<!--              <div class="form-group mb-0">-->
	<!--                <button class="btn btn-primary text-capitalize rounded-elg btn-block" type="submit" name="submit" > Request Details </button>                        -->
	<!--              </div>-->
	<!--              <div class="d-md-block d-none" >-->
	<!--                <div class="row mt-3">-->
	<!--                  <div class="col-md-6">-->
	<!--                    <a href="tel:" class="text-lg btn btn-outline-dark text-capitalize rounded-elg btn-block mb-2 px-2 py-2"> <i class="fa fa-phone pr-2"></i>  Call Us </a>-->
	<!--                  </div>-->
	<!--                  <div class="col-md-6">-->
	<!--                    <a href="" target="self" class="text-lg col btn btn-outline-dark text-capitalize rounded-elg btn-block mb-2 px-2 py-2"> <i class="fa fa-whatsapp text-success pr-2"></i>  Whatsapp </a>-->
	<!--                  </div>-->
	<!--                </div>-->
	<!--              </div>-->

	<!--              <div class="text-center mt-4 d-md-block d-none">-->
	<!--                <p class="text-sm" >Please note that if the details you enter are incorrect you will not be able to receive full details of this offer. We respect your privacy and your details will not be passed on to any third party companies.</p>-->
	<!--              </div>-->
	<!--            </div>-->
	<!--            </form>-->
	<!--          </div>-->
	<!--        </div>-->
	<!--      </div>-->
	<!--    </div>-->
	<!--  </div>-->
	<!--</div>-->






	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script type="28303422280c09dd2cfed4be-text/javascript">
	 $(document).ready(function(){  
$('.selectpicker').selectpicker();
});
</script>



	<script type="28303422280c09dd2cfed4be-text/javascript">

$(document).ready(function(){
   $("#hide_advbtn").on('click',function(){
        $(".show_dropdown").hide();
    });
});

	function show_dropdown()
	{
		$('.show_dropdown').toggle();
		if ($('.show_dropdown').is(':visible'))
    	{
    		$('#show_advbtn').html('Less Search <i class="flaticon-more pl10 flr-520"></i>');
    	}
    	else
    	{
    		$('#show_advbtn').html('Advanced Search <i class="flaticon-more pl10 flr-520"></i>');
    	}
		
	} 

function showResults(val) {
	 if(val)
	{
	jQuery.ajax({
            url:"https://elysian.com/en/get_location_key_press",
            type:"post",
            data:{"query":val},
            success:function(result)
            {
               if(result)
               {
               if(val.length>1)
					{
                    $('#result').html(result);
                	}
                	else
                	{
                		$('#result').html('');
                	}
               }                       
            }
        });
	}
	else
	{
		$('#result').html('');
	}
}


function showResults_offplan(val) {
   if(val)
  {
  jQuery.ajax({
            url:"https://elysian.com/en/get_project_name_tt",
            type:"post",
            data:{"query":val},
            success:function(result)
            {
               if(result)
               {
               if(val.length>1)
          {
                    $('#result').html(result);
                  }
                  else
                  {
                    $('#result').html('');
                  }
               }                       
            }
        });
  }
  else
  {
    $('#result').html('');
  }
}

function get_loc_name(id)
{
	//console.log(loc_name);
var loc_count=$('.location_type').length;
if(loc_count < 3)
		{
	var tag_length_val=parseFloat($('input[name="tag_length_val"]').val())+1;
		$('input[name="tag_length_val"]').val(tag_length_val);
		$('.display_tags_val').append('<button type="button" class="btn btn-primary location_type tag_location_'+tag_length_val+'" style="background-color:#9aa0a6;border-color:#9aa0a6;margin-bottom:1%">'+
  	$('#loc_names_'+id).text()+' <span class="badge badge-light " onclick="remove_tag_loc('+tag_length_val+')">x</span>'+'</button> ');
  					
	$(".propr_here").append('<input type="hidden" name="location_values[]" value="'+$('#loc_names_'+id).text()+'::'+$('#loc_names_'+id).attr('class')+'" class="type_loc_'+tag_length_val+'">');

	$('#result').html('');
	}
}

function get_prj_name(id)
{
  var loc_count=$('.location_type').length;
if(loc_count < 3)
    {
  var tag_length_val=parseFloat($('input[name="tag_length_val"]').val())+1;
    $('input[name="tag_length_val"]').val(tag_length_val);
    $('.display_tags_val').append('<button type="button" class="btn btn-primary location_type tag_location_'+tag_length_val+'" style="background-color:#9aa0a6;border-color:#9aa0a6;margin-bottom:1%">'+
    $('#loc_names_'+id).text()+' <span class="badge badge-light " onclick="remove_tag_loc('+tag_length_val+')">x</span>'+'</button> ');
            
  $(".propr_here").append('<input type="hidden" name="location_values[]" value="'+$('#loc_names_'+id).text()+'::'+$('#loc_names_'+id).attr('class')+'" class="type_loc_'+tag_length_val+'">');

  $('#result').html('');
  }
}

function get_sort_option()
  {
    console.log('inside sort options');
    var offering_type = $('input[name="offering_type"]').val();
        var property_type= $('input[name="property_type"]').val();
        var price_from = $('input[name="price_from"]').val();
        var price_to= $('input[name="price_to"]').val();
        var bedroom = $('input[name="bedroom"]').val();
        var size_range= $('input[name="size_range"]').val();
        var furnished_sts = $('input[name="furnished_sts"]').val();
        var amenities= $('input[name="sort_amenities"]').val();
        var community = $('input[name="sort_community"]').val();
        var sub_community= $('input[name="sort_sub_community"]').val();
        var sort_type=$('select[name="sort_option"]').find('option:selected').val();
        var view_type= $('input[name="view_type"]').val();
        var completion_sts= $('input[name="completion_sts"]').val();
//console.log(amenities);
         jQuery.ajax({
                    url:"https://elysian.com/Property_data/sort_data",
                    type:"post",
                    data:{"offering_type":offering_type,"property_type":property_type,"price_from":price_from,"price_to":price_to,"bedroom":bedroom,"size_range":size_range,"furnished_sts":furnished_sts,"amenities_sort":amenities,"community_sort":community,"sub_community_sort":sub_community,"sort_type":sort_type,"view_type":view_type,"completion_sts":completion_sts
                },
                    success:function(result)
                    {
                      console.log(result);
                       if(result)
                       {
                          $('.sorted_data').html(result); 
                       }                       
                    }
                });
  }

  function choose_price_show()
  {
    var selected_type=$('select[name="offering_type"]').find('option:selected').val();
    if(selected_type=="sale")
    {
      $('.sales_price').show();
      $('.rent_price').hide();
    }
    else
    {
      $('.rent_price').show();
      $('.sales_price').hide();
    }

  }

  function sort_filter()
  {
     var selected_type=$('select[name="sort_filter"]').find('option:selected').val();
     console.log(selected_type);
    
     $('input[name="sort_option_selected"]').val(selected_type);
     $('#mytform').submit();
     //$(".search_submit_btn").click();
  }
</script>

	<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Elysian Real Estate",
  "alternateName": "Elysian Real Estate",
  "url": "https://elysian.com/",
  "logo": "https://elysian.com/assets/images/icons/logo-main.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "971 547786800",
    "contactType": "sales",
    "areaServed": "AE",
    "availableLanguage": "en"
  },
  "sameAs": [
    "https://www.facebook.com/elysianGroup",
    "https://twitter.com/elysianGroup",
    "https://www.linkedin.com/company/elysian-real-estate",
    "https://www.instagram.com/elysiangroup",
    "https://www.youtube.com/channel/UC0pQUcli7fvd_NLOeRt44NA"
  ]
}
</script>

	<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Dubai Real Estate Agents",
            "item": "https://elysian.com"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Properties for Sale in UAE",
            "item": "https://elysian.com/villas-and-apartments-in-palm-jumeirah"
        }
    ]
}
  </script>
	<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
		data-cf-settings="28303422280c09dd2cfed4be-|49" defer></script>
	<script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'931bdb397f35e05a',t:'MTc0NDg5MjIxNS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/44e6f86df4dc/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
		integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
		data-cf-beacon='{"rayId":"931bdb397f35e05a","version":"2025.4.0-1-g37f21b1","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"7e5a9681c66a45f289647fcbfd0d16e9","b":1}'
		crossorigin="anonymous"></script>
</body>



<!-- Mirrored from elysian.com/en/property-list/sale by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Apr 2025 12:23:49 GMT -->

</html>