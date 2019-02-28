<section class="content-header">
    <h1>Inventory setup > Stock</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Inventory setup > Stock </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form>
            <div class="col-md-4 col-xs-12 text-center">
               <br/>
                <div class="droparea">
                    <h4> Upload Image </h4>
                    <div class="droparea text-center" id="drop1"> 
                        <img src="img/employee-img.png" id="file_preview_1" > <br >
                    </div>
                    <p class="text-center">  PNG OR JPEG  </p>
                </div>
                <input type="file" name="image" id="file_1" accept="image/*" style="display: none;" >
            </div>
            <div class="col-md-8">
                <div class="row"> 
        
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" name="inventory_category" id="inventory_category">
                                <option value=""> Stock Category </option>
                                <option> Stock Category I</option>
                                <option> Stock Category II </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="stock_name" id="stock_name" placeholder="Stock Name">
                        </div>
                    </div>
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="product_code" id="product_code" placeholder="Product Code">
                        </div>
                    </div>
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="barcode" id="barcode" placeholder="Barcode">
                        </div>
                    </div>
                    <div class="clearfix"></div>
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control sign-control" name="stock_type" id="stock_type">
                                <option value=""> Stock Type </option>
                                <option> Product</option>
                                <option> Service </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Location" name="location_id" id="location_id" class="chosen-select" multiple style="width:100%;">
                                        <option value=""> </option>
                                        <option> Palasia </option>
                                        <option> Vijay nagar </option>
                                        <option> Navlakha </option>
                                    </select>

                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
          <!------------------------------------------------>
          
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Tax" name="tax_name" id="tax_name" class="chosen-select" multiple style="width:100%;">
                                        <option value=""> </option>
                                        <option> 5% </option>
                                        <option> 10% </option>
                                        <option> 15% </option>
                                    </select>

                                 </div>     
                            </div>
                        </div>
                    </div>
          
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Discount" name="discount_name" id="discount_name" class="chosen-select" multiple style="width:100%;">
                                      <option value=""> </option>
                                      <option> 5% </option>
                                      <option> 10% </option>
                                      <option> 15% </option>
                                    </select>

                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
           <!------------------------------------------------>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <textarea placeholder="Description" name="description" id="description" class="form-control sign-control textarea-control" rows="5" ></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="side-by-side clearfix">
                                <div>
                                    <select data-placeholder="Unit" name="unit" id="unit" class="chosen-select" multiple style="width:100%;">
                                      <option value=""> </option>
                                      <option> Kilogram </option>
                                      <option> Litre </option>
                                    </select>

                                </div>     
                            </div>
                        </div>
                    </div>
          <!------------------------------------------------>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="cost_price" id="cost_price" placeholder="Cost Price">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="sell_rice" id="sell_rice" placeholder="Sell Price">
                        </div>
                    </div>
                    <!------------------------------------------------>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="opening_quantity" id="opening_quantity" placeholder="Opening Quantity">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" name="current_quantity" id="current_quantity" placeholder="Current Quantity" disabled>
                        </div>
                    </div>
          <!------------------------------------------------>
          
          
                    <div class="clearfix"> </div>
                    <div class="col-md-12"> 
                        <h4>Would you like to add custom fields? 
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#custom-popup">Yes</button></h4>
                    </div>
          
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control sign-control" id="custom-field" placeholder="Language">
                        </div>
                    </div>
                    <div class="clearfix"></div>

          <!------------------------------------------------>
          
          
                </div>
                <div class="form-group">
                    <button class="btn btn-default" type="button"> Save </button>
                </div>
            </div>
          <div class="clearfix"> </div> 
          <hr>
<div class="row">
  <div class="col-md-12">
  <div class="table-responsive">
  <table class="table table-bg">
  <thead class="thead-inverse">
    <tr>
      <th> Stock Name </th>
      <th> Product Code </th>
      <th> Barcode </th>
      <th> Type </th>
      <th> Location </th>
      <th> Tax </th>
      <th> Discount </th>
      <th> Add/Remove </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> Stock Name 1  </td>
      <td> Product Code  I </td>
      <td> 012345 </td>
      <td> Product </td>
      <td> Location I </td>
      <td> 5%</td>
      <td> 17%</td>
      <td> <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
      	   <a href=""> <i class="fa fa-times" aria-hidden="true"></i> </a>
      </td>
    </tr>
    <tr>
      <td> Stock Name 2  </td>
      <td> Product Code  II </td>
      <td> 012345 </td>
      <td> Service </td>
      <td> Location II </td>
      <td> 5%</td>
      <td> 17%</td>
      <td> <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
      	   <a href=""> <i class="fa fa-times" aria-hidden="true"></i> </a>
      </td>
    </tr>
    <tr>
      <td> Stock Name 3  </td>
      <td> Product Code  III </td>
      <td> 012345 </td>
      <td> Product </td>
      <td> Location III </td>
      <td> 5%</td>
      <td> 17%</td>
      <td> <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
      	   <a href=""> <i class="fa fa-times" aria-hidden="true"></i> </a>
      </td>
    </tr>
    <tr>
      <td> Stock Name 4  </td>
      <td> Product Code  IV </td>
      <td> 012345 </td>
      <td> Service </td>
      <td> Location IV </td>
      <td> 5%</td>
      <td> 17%</td>
      <td> <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
      	   <a href=""> <i class="fa fa-times" aria-hidden="true"></i> </a>
      </td>
    </tr>
    <tr>
      <td> Stock Name 5  </td>
      <td> Product Code  V </td>
      <td> 012345 </td>
      <td> Product </td>
      <td> Location V </td>
      <td> 5%</td>
      <td> 17%</td>
      <td> <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
      	   <a href=""> <i class="fa fa-times" aria-hidden="true"></i> </a>
      </td>
    </tr>
    <tr>
      <td> Stock Name 6  </td>
      <td> Product Code  VI </td>
      <td> 012345 </td>
      <td> Product</td>
      <td> Location VI </td>
      <td> 5%</td>
      <td> 17%</td>
      <td> <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp; &nbsp;
      	   <a href=""> <i class="fa fa-times" aria-hidden="true"></i> </a>
      </td>
    </tr>

  </tbody>
</table>
</div>
</div>
</div>
          <div class="col-md-12 text-right">
          
          
         <a href="admin.html"> <button class="btn btn-success" type="button"> Finish  </button></a>
          </div>
          
        </form>
      </div>
      <!-----row------> 
  </section>
 
