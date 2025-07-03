$(document).ready(function () {

    var getUrl = window.location;
	var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
	// var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1];

	$(".number").keyup(function (event) {
		// skip for arrow keys
		if (event.which >= 37 && event.which <= 40) return;

		// format number
		$(this).val(function (index, value) {
			return value.replace(/\D/g, "");
		});
	});

	$(document).ready(function () {
		window.setTimeout(function () {
			$(".alert")
				.fadeTo(500, 0)
				.slideUp(500, function () {
					$(this).remove();
				});
		}, 2500);
	});

	$(".custom-file-input").on("change", function () {
		let fileName = $(this).val().split("\\").pop();
		$(".custom-file-label").html("");
		$(".custom-file-label").html(fileName);
	});

	$(".deleteImage").click(function () {
		var id = $(this).data("id");
		var id_produk = $(this).data("id_produk");
		alertify.confirm(
			"Delete Data?",
			function () {
				alertify.success("Deleted!");
				window.location.href = baseUrl + "/admin/delete_image/" + id + "/" + id_produk;
			},
			function () {
				alertify.error("Canceled!");
			}
		);
	});

	$(".deleteImageGallery").click(function () {
		var id = $(this).data("id");
		alertify.confirm(
			"Delete Data?",
			function () {
				alertify.success("Deleted!");
				window.location.href = baseUrl + "/admin/delete_image_gallery/" + id;
			},
			function () {
				alertify.error("Canceled!");
			}
		);
	});

	$(".deleteImageAbout").click(function () {
		var id = $(this).data("id_content_image");
		alertify.confirm(
			"Delete Data?",
			function () {
				alertify.success("Deleted!");
				window.location.href = baseUrl + "/admin/delete_image_about/" + id;
			},
			function () {
				alertify.error("Canceled!");
			}
		);
	});

	$(".deleteProduct").click(function () {
		var id = $(this).data("id");
		alertify.confirm(
			"Delete Data?",
			function () {
				alertify.success("Deleted!");
				window.location.href = baseUrl + "/admin/delete_product/" + id;
			},
			function () {
				alertify.error("Canceled!");
			}
		);
	});
	$(".deleteCategory").click(function () {
		var id = $(this).data("id");
		alertify.confirm(
			"Delete Data?",
			function () {
				alertify.success("Deleted!");
				window.location.href = baseUrl + "/admin/delete_category/" + id;
			},
			function () {
				alertify.error("Canceled!");
			}
		);
	});
	$(".deleteContentHome").click(function () {
		var id = $(this).data("id");
		alertify.confirm(
			"Delete Data?",
			function () {
				alertify.success("Deleted!");
				window.location.href = baseUrl + "/admin/delete_content_home/" + id;
			},
			function () {
				alertify.error("Canceled!");
			}
		);
	});

	$("#stokForm").on("change", function () {
		var stok = $(this).val();
		var id = $('#id_produk').val();
		$.ajax({
			url: baseUrl+ '/admin/changeStok',
			method: "POST",
			data: {
				stok: stok,
				id: id,
			},
			async: true,
			dataType: "JSON",
			success: function(){
				window.location.reload();
			},
			error: function(){
				alert('error!');
			}
		});
		return false;
	});


	$("#order_status").on("change", function () {
		var status = $(this).val();
		var id = $('#id_pesanan').val();
		$.ajax({
			url: baseUrl+ '/admin/changeStatusPesanan',
			method: "POST",
			data: {
				status: status,
				id: id,
			},
			async: true,
			dataType: "JSON",
			success: function(){
				window.location.reload();
			},
			error: function(){
				alert('error!');
			}
		});
		return false;
	});
});
