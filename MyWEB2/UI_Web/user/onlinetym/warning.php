<div class="modal" id="warning-box" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span style="color:red">Warning</span></h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<div class="modal-body">
				<p style="color:black;">Warning message to <span id="warn-name"></span></p>
				<textarea id="warn-msg" style="width:90%;"></textarea><br>
				<button id="warn-btn" class="btn btn-primary" onclick="warn_send()">Send</button>
				<button class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function warn_send(){
		$("#warning-box").modal("hide");
		var msg=document.getElementById("warn-msg").value;
		var xhr=new XMLHttpRequest();
		var email="saihtetaung276@gmail.com";
		xhr.open('POST','../requestProcess.php?request=warn&email='+email+"&msg="+msg,true);
		xhr.onreadystatechange=function(){
			if(this.readyState==4&&this.status==200)
			{
				if(this.responseText!=="")
					alert(this.responseText);
			}
		}
		xhr.send();
	}
</script>