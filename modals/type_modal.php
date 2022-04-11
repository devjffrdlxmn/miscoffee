<!-- ADD Modal content -->
<div id="addModal" class="modal" >
        <!-- Modal content -->
        <div class="modal-content" style="width:30%;">
            <div class="modal-body">
            <div class="modal-header">
                <span class="close" onclick="closebtn()">&times;</span>
            </div>

            <div class="form-group">
                <label>Type Name</label>
                <input id="addTypeName" name="addTypeName" type="text" class="form-control mb-1">
            </div>

            <div class="modal-footer">
                <button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
                <button id="addType" type="button" class="btn btn-success">SAVE</button>
            </div>       
            </div>
        </div>
    </div> 
<!-- ADD Modal content -->

<!-- UPDATE Modal content -->
<div id="updateModal" class="modal" >
    <!-- Modal content -->
    <div class="modal-content" style="width:30%;">
        <div class="modal-body">
        <div class="modal-header">
            <span class="close" onclick="closebtn()">&times;</span>
        </div>

        <div class="form-group">
            <label>Type Name Name</label>
            <input hidden id="updateTypeId" name="updateTypeId" type="text" class="form-control mb-1">
            <input id="updateTypeName" name="updateTypeName" type="text" class="form-control mb-1">
        </div>

        <div class="modal-footer">
            <button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
            <button id="updateType" type="button" class="btn btn-success">UPDATE</button>
        </div>       
        </div>
    </div>
</div> 
<!-- UPDATE Modal content -->