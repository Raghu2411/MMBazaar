<div class="modal" id="offer-box" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Offer</h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<p style="color:black;">Send message to <span id="warn-name"><?php if(isset($_SESSION['user_name'])) echo $_SESSION['user_name']?></span> to make an offer.</p>
				<textarea id="offer-msg"></textarea><br>
				<button id="offer-btn" class="btn-primary" onclick="offer_send()" style="border:0;">Send</button>
				<button class="btn-primary" data-dismiss="modal" style="border:0;">Cancel</button>
			</div>
		</div>
	</div>
</div>