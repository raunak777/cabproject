<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'header.php'; ?>
	
	<section>
		<div class="caption center " >Book a City Taxi to your destination in town<br><h4 class="text-center">Choose from a range of categories and prices</h4>
		</div>
		<img src="background.jpg" class="img-fluid">
		<div class="row row1" style="z-index: 1;">
			<div class="col-12">
				<h3 class="city">City Taxi</h3>
				<div class="input-group pt-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupPrepend2">Pickup<span class="text-danger">*</span></span></div>
						<select id="pick" name="pick" class="form-control" >
							<option value="">Select Pickup</option>
							<option value="Charbagh">Charbagh</option>
							<option value="IndiraNagar">Indira Nagar </option>
							<option value="BBD">BBD</option>
							<option value="Barabanki">Barabanki</option>
							<option value="Faizabad">Faizabad</option>
							<option value="Basti">Basti</option>
							<option value="Gorakhpur">Gorakhpur</option>
						</select>
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupPrepend2">Drop<span class="text-danger">*</span></span></div>
							<select id="drop" name="pick" class="form-control" >
								<option value="">Select Pickup</option>
								<option value="Charbagh">Charbagh</option>
								<option value="IndiraNagar">Indira Nagar </option>
								<option value="BBD">BBD</option>
								<option value="Barabanki">Barabanki</option>
								<option value="Faizabad">Faizabad</option>
								<option value="Basti">Basti</option>
								<option value="Gorakhpur">Gorakhpur</option>
							</select>
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupPrepend2">CabType<span class="text-danger">*</span></span></div>
								<select id="cabtype" name="cabtype" class="form-control" >
									<option value="">Select Cab Type</option>
									<option value="CedMicro">CedMicro</option>
									<option value="CedMini">CedMini </option>
									<option value="CedRoyal">CedRoyal</option>
									<option value="CedSUV">CedSUV</option>
								</select>
							</div>
							<div class="input-group mt-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupPrepend2">Luggage</span></div>
									<input type="number" onpaste="return false" class="form-control" id="weight" placeholder="Enter weight in KG">
								</div>
								<br>
								<input type="submit" class="btn btn-block" name="submit" value="Calculate Fare">
							</div>
							<div id="fare"></div>
							<div id="error"></div>
						</div>
					</section>

					<script type="text/javascript">
						$(function(){
							var invalidChars=["-","+","e","E"]
							$("#weight").on("keydown", function(e){
								if(invalidChars.includes(e.key)){
									e.preventDefault();
								}
							});
							$('#pick').change(function() {
								$("#drop option").show();
								$('#drop option[value='+ $(this).val()+ ']').hide();
							});

							$('#drop').change(function() {
								$("#pick option").show();
								$('#pick option[value=' + $(this).val()+ ']').hide();
							});

							$("#cabtype").change(function(){
								var type= $("#cabtype").val();
								if (type =="CedMicro") {
									$("#weight").val('');
									$("#weight").attr("placeholder","Luggage is not allowed in cedmicro cab");
									$("#weight").attr("disabled","disabled");

								}
								else{
									$("#weight").removeAttr("disabled");
									$("#weight").attr("placeholder","Enter weight in KG");
								}
							});

							$(".btn").on("click", function(){
								var pickup= $("#pick").val();
								var drop= $("#drop").val();
								var cabtype= $("#cabtype").val();
								var weight= $("#weight").val();
								if (pickup=="") {
									$("#error").text("Select pickup location!").slideDown();
									$("#error").delay(1000).slideUp(500);

								}
								else if(drop==""){
									$("#error").text("Select drop location!").slideDown();
									$("#error").delay(1000).slideUp(500);

								}
								else if(cabtype==""){
									$("#error").text("Select Cab type!").slideDown();
									$("#error").delay(1000).slideUp(500);
								}
								else if(weight>1000)
								{
									$("#error").text("Weight must be 0 to 1000 kg").slideDown();
									$("#error").delay(1000).slideUp(500);
								}
								else {
									$.ajax({
										type: "POST",
										url: "fare.php",
										data: {pickup : pickup, drop : drop, cabtype : cabtype, weight: weight},
										success: function(data){
											$("#fare").html(data);
										}
									});
								}
							});
						});
					</script>
					<?php include 'footer.php' ?>
				</body>
				</html>