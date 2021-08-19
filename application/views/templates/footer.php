</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url() ?>assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	function hitung() {
		var bayar = $("#bayaran").val()
		var total = $("#total").val()

		var kembali = parseInt(bayar) - parseInt(total);

		$("#bayar2").attr("value", bayar);

		if (kembali > 1) {
			$("#kembali").attr("value", kembali);
		} else {
			$("#kembali").attr("value", "0000");
		}

	};

</script>

<script type="text/javascript">
	$(document).ready(function () {
		$('ul li a').click(function () {
			$('li a').removeClass("active");
			$(this).addClass("active");
		});
	});

</script>

<script>
	function nextfieldBarcode(event) { // fungsi saat tombol enter
		if (event.keyCode == 9 || event.which == 9) {
			document.getElementById('no').focus();
		}
	}

</script>

<script>
	function nextfieldJml(event) { // fungsi saat tombol enter
		if (event.keyCode == 9 || event.which == 9) {
			document.getElementById('btnBrg').focus();
		} else if (event.keyCode == 39 || event.which == 39) {
			document.getElementById('btnBrg').focus();
		} else if (event.keyCode == 35 || event.which == 35) {
			document.getElementById('btnByr').focus();
		}
	}

</script>

<!-- alrt -->
<script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/alertku.js"></script>

<!-- slidebar -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

<!-- data table -->

<!-- inputAngka -->
<script src="<?= base_url() ?>assets/js/inputHanya_ku.js"></script>

<!-- hitung -->
<script src="<?= base_url() ?>assets/js/hitung.js"></script>

<!-- dataTables -->
<script type="text/javascript" src="<?= base_url() ?>assets/DataTables/datatable.min.js"></script>
<script>
	$(document).ready(function () {
		$('#tabel').DataTable();
	});

</script>

<script>
	$(document).ready(function () {
		$('#bel').DataTable();
	});
</script>
<!-- end dataTables -->

</body>

</html>
