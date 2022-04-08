 <!-- ADD Modal content -->
 <div id="AddModal" class="modal" >
    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
        <span class="close" onclick="closebtn()">&times;</span>
    </div>
        
        <div class="modal-body">
            <div class="form-group">
                <label for="addProductName">Product Name</label>
                <input type="text" class="form-control" id="addProductName"  placeholder="Enter Product Name">
            </div>

            <div class="form-group">
                <label for="addProductPrice">Product Price</label>
                <input type="text" class="form-control" id="addProductPrice"  placeholder="Enter Product Price">
            </div>

            <div class="form-group">
                <label for="addProductStocks">Product Stocks</label>
                <input type="text" class="form-control" id="addProductStocks"  placeholder="Enter Product Stocks">
            </div>

            <div class="form-group">
                <label for="addProductCategory">Product Category</label>
                <select id="addProductCategory" class="form-control">
                    <option disabled selected="true">Select Category</option>
                    <option value="milktea">Milktea</option>
                    <option value="Coffee Blend">Coffee Blend</option>
                    <option value="Frappe">Frappe</option>
                    <option value="Fruit Selection">Fruit Selection</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Rice">Rice</option>
                </select>
            </div>

            <div class="form-group">
                <label for="addProductType">Product Type</label>
                <select id="addProductType" class="form-control">
                    <option disabled selected="true">Select Type</option>
                    <option value="Drink">Drink</option>
                    <option value="Meal">Meal</option>
                </select>
            </div>
            

        </div>
        <div class="modal-footer">
            <button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
            <button type="button" class="btn btn-success" id="addProduct">SAVE</button>
        </div>       
    </div>
</div> 
 <!-- END ADD Modal content -->

 <!-- UPDATE Modal content -->
 <div id="updateModal" class="modal" >
    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
        <span class="close" onclick="closebtn()">&times;</span>
    </div>
        
        <div class="modal-body">
            <input type="text"  id="updateProductId"hidden>
            <div class="form-group">
                <label for="updateProductName">Product Name</label>
                <input type="text" class="form-control" id="updateProductName"  placeholder="Enter Product Name">
            </div>

            <div class="form-group">
                <label for="updateProductPrice">Product Price</label>
                <input type="text" class="form-control" id="updateProductPrice"  placeholder="Enter Product Price">
            </div>

            <div class="form-group">
                <label for="updateProductStocks">Product Stocks</label>
                <input type="text" class="form-control" id="updateProductStocks"  placeholder="Enter Product Stocks">
            </div>

            <div class="form-group">
                <label for="updateProductCategory">Product Category</label>
                <select id="updateProductCategory" class="form-control">
                    <option disabled selected="true">Select Category</option>
                    <option value="milktea">Milktea</option>
                    <option value="Coffee Blend">Coffee Blend</option>
                    <option value="Frappe">Frappe</option>
                    <option value="Fruit Selection">Fruit Selection</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Rice">Rice</option>
                </select>
            </div>

            <div class="form-group">
                <label for="updateProductType">Product Type</label>
                <select id="updateProductType" class="form-control">
                    <option disabled selected="true">Select Type</option>
                    <option value="Drink">Drink</option>
                    <option value="Meal">Meal</option>
                </select>
            </div>
            

        </div>
        <div class="modal-footer">
            <button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
            <button type="button" class="btn btn-success" id="addProduct">SAVE</button>
        </div>       
    </div>
</div> 


 <!-- END UPDATE Modal content -->