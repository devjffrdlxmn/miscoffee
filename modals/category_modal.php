<!-- ADD Modal content -->
			<div id="AddModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<label>Category Name</label>
						<input id="name" name="name" type="text" class="form-control mb-1">
					</div>

					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button onclick="addcategory();" type="button" class="btn btn-success">SAVE</button>
					</div>       
					</div>
				</div>
			</div> 
<!-- ADD Modal content -->

<!-- UPDATE Modal content -->
<div id="UpdateModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<label>category Name</label>
						<input hidden id="updateid" name="updateid" type="text" class="form-control mb-1">
						<input id="updatename" name="updatename" type="text" class="form-control mb-1">
					</div>

					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button onclick="updatecategory();" type="button" class="btn btn-success">UPDATE</button>
					</div>       
					</div>
				</div>
</div> 
<!-- UPDATE Modal content -->