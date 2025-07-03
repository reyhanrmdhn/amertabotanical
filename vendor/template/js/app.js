$(document).ready(function () {
	window.setTimeout(function () {
		$(".alert")
			.fadeTo(500, 0)
			.slideUp(500, function () {
				$(this).remove();
			});
	}, 2500);

	$(".number").keyup(function (event) {
		// skip for arrow keys
		if (event.which >= 37 && event.which <= 40) return;

		// format number
		$(this).val(function (index, value) {
			return value.replace(/\D/g, "");
		});
	});

	var getUrl = window.location;
	var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";

	$(".view-product").click(function () {
		var id_produk = $(this).data("id_produk");
		const name = $(this).data("name");
		const harga = $(this).data("harga");
		const deskripsi = $(this).data("deskripsi");
		var price = harga.toLocaleString("en-US", {
			style: "currency",
			currency: "USD",
		});

		$.ajax({
			url: baseUrl + "Home/get_image",
			method: "POST",
			data: {
				id_produk: id_produk,
			},
			async: true,
			dataType: "JSON",
			success: function (output) {
				$(".productName").html(name);
				$(".productPrice").html(price);
				$(".productDesc").html(deskripsi);
				var html_image = "";
				html_image += '<li><img src="' + baseUrl + "assets/product/" + output[0].gambar +'" alt="product"></li>';
				$(".productImage").html(html_image);
				// $('.productImageSlider').append(html_image2);
				$(".add-cart").data("id", id_produk);
				$(".add-cart").data("name", name);
				$(".add-cart").data("price", harga);
				$("#product-view").modal("show");
			},
			error: function () {
				alert("error!");
			},
		});
		return false;
	});

	$(".email").on("keyup", function () {
		var email = $(this).val();
		let position = email.search("@");

		$.ajax({
			url: baseUrl + "auth/validasi_email",
			method: "POST",
			data: {
				email: email,
			},
			async: true,
			dataType: "JSON",
			success: function (output) {
				if (position < 0) {
					$(".email_valid")
						.html("This Email is not valid!")
						.css("color", "red");
				} else if (email == "") {
					$(".email_valid").html("");
				} else if (output) {
					$(".email_valid")
						.html("Email is already registered!")
						.css("color", "red");
				} else {
					$(".email_valid")
						.html("This Email is available!")
						.css("color", "green");
				}
			},
		});
		return false;
	});

	$("#password, #password2").on("keyup", function () {
		if ($("#password").val() == "") {
			$(".message").html("Password is Empty").css("color", "red");
			$("#btnRegister").prop("disabled", true);
		} else if (this.value.length < 8) {
			$(".message").html("Password is too short!").css("color", "red");
			$("#btnRegister").prop("disabled", true);
		} else if ($("#password").val() == $("#password2").val()) {
			$(".message").html("Password Matching").css("color", "green");
			$("#btnRegister").prop("disabled", false);
		} else {
			$(".message").html("Password Not Matching").css("color", "red");
			$("#btnRegister").prop("disabled", true);
		}
	});



	$.ajax({
		method: "GET",
		url: baseUrl + "product/cart_api?action=cart_info",
		success: function (res) {
			var data = res.data;
			var total_item = data.total_item;
			$(".cart-item-total").text(total_item);
			if (total_item == 0) {
				$(".cart-list").remove();
				$(".empty-item").show();
			}
		},
	});

	$(".add-cart").click(function (e) {
		e.preventDefault();
		var id = $(this).data("id");
		var qty = $(this).data("qty");
		qty = qty > 0 ? qty : 1;
		var price = $(this).data("price");
		var name = $(this).data("name");

		$.ajax({
			method: "POST",
			url: baseUrl + "product/cart_api?action=add_item",
			data: {
				id: id,
				qty: qty,
				price: price,
				name: name,
			},
			success: function (res) {
				if (res.code == 200) {
					var totalItem = res.total_item;
					$(".cart-item-total").text(totalItem);
					alertify.success("Item added!");
					setTimeout(function (e) {
						window.location.reload();
					}, 500);
				} else {
					alertify.error("Error!");
				}
			},
		});
	});

	$(".remove-item").click(function (e) {
		e.preventDefault();
		var rowid = $(this).data("rowid");
		var item = $(".item-" + rowid);
		$(".remove-text").html('<i class="fa fa-spin fa-spinner"></i> Removing...');
		$.ajax({
			method: "POST",
			url: baseUrl + "product/cart_api?action=remove_item",
			data: {
				rowid: rowid,
			},
			success: function (res) {
				if (res.code == 204) {
					if (res.total_item == 0) {
						setTimeout(function (e) {
							item.hide("fade");
							$(".remove-text").html("");
							alertify.error("Item Removed!");
						}, 2000);
						setTimeout(function (e) {
							window.location.reload();
						}, 2500);
					} else {
						setTimeout(function (e) {
							item.hide("fade");
							$(".remove-text").html("");
							alertify.error("Item Removed!");
						}, 2000);
					}
				}
			},
		});
	});

	$(".cancel").click(function () {
		const id_pesanan = $(this).data("id_pesanan");
		$("#cancelOrderModal").modal("show");
		$("#cancelOrder").click(function () {
			$.ajax({
				url: baseUrl + "product/cancel_order",
				method: "POST",
				data: {
					id_pesanan: id_pesanan,
				},
				async: true,
				dataType: "JSON",
				success: function () {
					alertify.error("Order Canceled!");
					setTimeout(function (e) {
						window.location.href = baseUrl;
					}, 1500);
				},
				error: function () {
					alert("Error!");
				},
			});
			return false;
		});
		return false;
	});

	$("#editProfile").click(function () {
		const id = $(this).data("id");
		const name = $(this).data("name");
		const email = $(this).data("email");
		$(".id").val(id);
		$(".name").val(name);
		$(".email").val(email);
		$("#profile_edit").modal("show");
	});

	$("#changePass").click(function () {
		const id = $(this).data("id");
		$(".id").val(id);
		$("#change_password").modal("show");
	});

	$("#btn_bukti_tf").click(function () {
		const url = baseUrl + 'assets/img/bukti_tf/' + $(this).data("bukti_tf");
		$(".bukti_tf_img").attr("src",url);
		$("#bukti_tf_modal").modal("show");
	});

 	$('#old_password').on('keyup',function(){
		var id = $('#id_user').val();
		var password = $(this).val();
		$.ajax({
			url: baseUrl + "user/checkPassword",
			method: "POST",
			data: {
				id: id,
				password: password,
			},
			async: true,
			dataType: "JSON",
			success: function(res){
				if (res.code == 100) {
					$('#message1').html('Password Matching').css('color', 'green');
					$('#new_password, #new_password2').on('keyup', function() {
						if ($('#new_password').val() == '') {
							$('#message').html('Password is Empty').css('color', 'red');
						} else if (this.value.length < 8) {
							$("#message").html("Password is too short!").css("color", "red");
						} else if ($('#new_password').val() == $('#new_password2').val()) {
							$('#message').html('Password Matching').css('color', 'green');
							$('#btn_changePass').prop('disabled',false);
						} else {
							$('#message').html('Password Not Matching').css('color', 'red');
						}
					});
				} else {
					$('#message1').html('Password is not Matching').css('color', 'red');
				}
			},
			error: function(){
				alert("error!");
			}
		});
		return false;
	});

	$('#star-1').click(function() {
		$('#rating').val(1);
	});
	$('#star-2').click(function() {
		$('#rating').val(2);
	});
	$('#star-3').click(function() {
		$('#rating').val(3);
	});
	$('#star-4').click(function() {
		$('#rating').val(4);
	});
	$('#star-5').click(function() {
		$('#rating').val(5);
	});
});
