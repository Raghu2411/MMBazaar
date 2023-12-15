<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	</style>
</head>
<body>
<div class="modal fade" id="buyer-option" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="media">
					<img src="images/img_2.jpg" class="img-fluid mr-3" width="60" height="60" id="buyer-img">
					<div class="media-body">
						<h4 id="buyer-name">Smart watch</h4>
						<p>Price : <span id="buyer-price">4000 kyats</span></p>
					</div>
				</div>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<p>This item is being sold for <span id="buyer-show-price">4000</span> kyats.Would you like to offer desired price?</p>
				<div class="form-group">
					<label style="color:rgb(50,50,200);"><b>Enter your offer:</b></label>
					<div class="input-group">
						<input type="text" class="form-control" id="buyer-offer-price">
						<div class="input-group-append">
							<span class="input-group-text">kyats</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary" onclick="priceOffer(document.getElementById('buyer-offer-price').value)">Offer</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="seller-option" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="media">
					<img src="" class="img-fluid mr-3" width="60" height="60" id="seller-img">
					<div class="media-body">
						<h4 id="seller-name"></h4>
						<p>Price : <span id="seller-price"></span> kyats</p>
					</div>
				</div>	
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<div id="offer-show">
					<p><span id="seller-offer-name"></span> is offering this item for <span id="seller-show-price">4000</span> kyats. Will you accept this offer?</p>
				</div>
				<div id="offer-no" style="display: none">
					<p>No offer yet</p>
				</div>
			</div>
			<div class="modal-footer">
				<div id="offer-btn-show">
					<button class="btn btn-primary" id="seller-cancel" data-dismiss="modal" onclick="not_accept()">No</button>
					<button class="btn btn-primary" id="seller-submit" onclick="offer_accept()">Yes</button>
				</div>	
				<div id="offer-btn-no" style="display: none">
					<button class="btn btn-primary" data-dismiss="modal">Ok</button>`	
				</div>
			</div>
		</div>
	</div>
</div>
</script>
</body>
</html>