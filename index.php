<?php include 'Components/Header/header.php';



// Check if the user name is set in the session
?>
<div class="container">
	<main class="container py-5">
		<h2 class="text-center ">Choose Your Language</h2>
		<div class="row g-4 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
			<div class="col">
				<div class="card h-100 border-success" style="background-color: #16235E">
					<div class="card-body text-center d-flex justify-content-center align-items-center"
						style="height: 200px">
						<button type="button" class="btn " onclick="submit_selection('English')">
							<h3 class="text-white">English 40</h3>
						</button>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card h-100 border-primary" style="background-color:#EC6C1E">
					<div class="card-body text-center d-flex justify-content-center align-items-center"
						style="height: 200px">
						<button type="button" class="btn" onclick="submit_selection('Marathi')">
							<h3 class="text-white">Marathi 30</h3>
						</button>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<script type="text/javascript">

	function submit_selection(lang) {
		event.preventDefault();
		// var speed = document.getElementById('speed_select').value;
		var newParam = `param1=${lang}`;
		window.location.replace('home.php?' + newParam);
	}

</script>
<?php include 'Components/Footer/footer.php'; ?>