<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Magazine</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/linearicons.css') }}">
	<!--link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}"-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/main.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('backend/components/loading/style.css') }}">
</head>

<body>

	<header>

		@include('frontend.layout.partials.header2')

		@include('frontend.layout.partials.mainmenu2')

	</header>

	@yield('content')

	<footer class="footer-area section-gap">

		@include('frontend.layout.partials.footer2')

	</footer>

	<!-- jQuery 3 -->
	<!--script src="{{ URL::asset('backend/components/jquery/dist/jquery.min.js') }}"></script-->
	<!--script src="{{ asset('frontend/js/breaking-news-ticker.min.js') }}"></script-->

	@stack('scripts')
	<script src="{{ URL::asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ URL::asset('js/easing.min.js') }}"></script>
	<script src="{{ URL::asset('js/hoverIntent.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/1.8.1/jquery.hoverIntent.min.js"></script>
	<!--script src="{{ asset('js/superfish.min.js') }}"></script-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/js/superfish.min.js"></script>
	<script src="{{ URL::asset('js/jquery.ajaxchimp.min.js') }}"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"></script-->
	<script src="{{ URL::asset('js/mn-accordion.js') }}"></script>
	<script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
	<script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset('js/mail-script.js') }}"></script>
	<script src="{{ URL::asset('js/main.js') }}"></script>

	<script>
		$(function() {
			$('form').submit(function(e) {
				$(".latest-post-wrap").css({
					opacity: 0.5
				});
				$('#pagination').remove();
				var $form = $(this);
				$.ajax({
					type: $form.attr('method'),
					url: $form.attr('action'),
					data: $form.serialize()
				}).done(function(response) {
					if (response.length == 0) {
						$('.latest-post-wrap').html("No Data Found");
						$(".latest-post-wrap").css({
							opacity: 1.0
						});
					} else {
						$(".latest-post-wrap").css({
							opacity: 1.0
						});
						$('.latest-post-wrap').html(response);
					}
				}).fail(function() {
					console.log('fail');
				});
				//отмена действия по умолчанию для кнопки submit
				e.preventDefault();
			});
		});


		/*$('form').submit(function(e) {
			var $form = $(this);
			filter($form);
		})

		function filter($form) {
			$.ajax({
				type: $form.attr('method'),
				url: $form.attr('action'),
				data: $form.serialize()
			}).done(function(response) {				
				$('.latest-post-wrap').html(response);
				$(".latest-post-wrap").css({
					opacity: 1.0
				});
			}).fail(function() {
				console.log('fail');
			});			
		}*/
		/*function filter(element) {
			var url = form.attr("action");
			var formData = {};
			$(form).find("input[name]").each(function(index, node) {
				formData[node.name] = node.value;
			});
			$.post(url, formData).done(function(data) {
				alert(data);
			});
		}*/
		// var temp = this;	

		/*$(".latest-post-wrap").css({
				opacity: 0.5
			});
			var id = $(element).data('id');
			var type = $(element).data('value');

			console.log(type);

			// var date = $('#date_input').val;
			var dateControl = document.querySelector('input[type="date"]');

			date = dateControl.value;
			// console.log(dateControl.value);

			$.post("{{route('filter-news')}}", {
				date: date,
				type: type,
				id: id,
				_token: "{{csrf_token()}}"
			}).done(function(response) {
				$('.latest-post-wrap').html(response);
				$(".latest-post-wrap").css({
					opacity: 1.0
				});
			}).fail((error) => console.error(error))
		}*/

		/*var request = $.ajax({
				type: 'POST',
				url: "{{ route('filter-news') }}",
				data: {
					date: date,
					type: type,
					id: id,
					_token: "{{csrf_token()}}"
				},
				success: function(response) {
					$('.latest-post-wrap').html(response);
					$(".latest-post-wrap").css({
						opacity: 1.0
					});

				},
				fail: function() {
					console.log("Fail");
				}
			});
		}*/
	</script>

	<script>
		$(document).ready(function() {
			loadMore();
		})

		function loadMore(element) {
			var id = $(element).data('id');
			$('#btn-more').text("Loading...");
			var request = $.ajax({
				type: 'POST',
				url: "{{ route('load-more') }}",
				data: {
					id: id,
					_token: "{{csrf_token()}}"
				},
				success: function(response) {
					console.log(response);
					$('#btn-more').remove();
					$('#post_data').append(response);

				},
				fail: function() {
					console.log("Fail");
				}
			});
			//$('#btn-more').show();
		}
	</script>

	<!--script src="public/js/main.js"></script-->

	<!--script>
        $(function(){
            $('#breakingnewsticker').breakingNews({radius: 0});
        });
    </script-->

</body>

</html>