<div class="dw-wrapper">
    <div class="dw-dashboard _3dwht">
        <div class="topHeading">
            <div class="container">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4 dw-dashboard-profile"> 
                            <img src="images/ceo.jpg" class="img-circle"> 
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 dw-dashboard-title">
                            <h3>Mike Johnson</h3>
                            <p><img src="images/bookingIcon.png" width="15" class="img-responsive">My Bookings: 12</p>
                            <p><img src="images/recieved_icons.png" width="12" class="img-responsive" style="margin-right:11px;">My Received Bookings: 08</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-2 col-sm-12">
                    <div class="searchBar search-book">
                        <input placeholder="Search bookings" class="destination" type="text">
                        <a href="search-parking.html">
                            <button type="submit" class="searchBttn booking-btn bttn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="container padd50">
            <div class="col-md-3 col-sm-4">
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked">
                    <li><a href="dashboard.html"><span class="fa fa-long-arrow-right"></span>Dashboard</a></li>
                    <li><a href="my-spaces.html"><span class="fa fa-long-arrow-right"></span>My Dryveways</a></li>
                    <li><a href="complete-bookings.html"><span class="fa fa-long-arrow-right"></span>Completed Bookings</a></li>
                    <li><a href="upcoming-bookings.html"><span class="fa fa-long-arrow-right"></span>Upcoming Bookings</a></li>
                    <li><a href="payment.html"><span class="fa fa-long-arrow-right"></span>Payment</a></li>
                    <li class="active"><a href="edit-profile.html"><span class="fa fa-long-arrow-right"></span>Update Your Profile</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <div class="_3wtable create-profile">
                            <h3 class="h3-form"> Update Your Profile </h3>
                            <div class="form-group col-md-6">
                                <form>
                                   <div class="droparea">
                                        <div class="droparea text-center" id="drop1"> <img src="images/fileupload.jpg" id="file_preview_1" > <br >
                                            <p>Upload Profile Picture</p>
                                        </div>
                                    </div>
                                    <input type="file" name="file" id="file_1" accept="image/*" style="display: none;" >
                                </form>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" placeholder="First name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Last name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="New password">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Confirm password">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Company name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="new-control _date" id="setdob" placeholder="Select date of birth"/>
                            </div>
                            <div class="clearfix"> </div> <br/>
                        </div>
                    
                        <div class="_3wtable create-profile">
                            <h3 class="h3-form">Contact Details</h3>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Email address">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Your phone number">
                            </div>
                            <div class="form-group col-md-6">
                                <select>
                                    <option selected disabled>Select country</option>
                                    <option>Select country</option>
                                    <option>Select country</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Your postal code">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="updatebttn">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" >

$(document).ready(function() {

    var options1 = {
        url: 'server.php',
        file_holder: '#file_1',
        file_preview: '#file_preview_1',
        success: function( server_return, name, uploaded_file )
        {
            var oFReader = new FileReader();
            var _drop = $('#drop1');

            _drop.after( $('<p />').html( 'File sent: <b>' + name + '</b>' ) );

            oFReader.readAsDataURL( uploaded_file );
            oFReader.onload = function (oFREvent)
            {
                $( '#file_preview_1' ).animate({opacity: 0}, 'slow', function(){
                        // change the image source
                        $(this)
                                .attr('src', oFREvent.target.result).animate({opacity: 1}, 'fast')
                                .on('load', function()
                                {
                                        _drop.find('.statusbar').css({
                                                width: _drop.outerWidth(),
                                                height: _drop.outerHeight()
                                        });
                                });

                        // remove the alert block whenever it exists.
                        _drop.find('.statusbar.alert-block').fadeOut('slow', function(){ $(this).remove(); });
                });
            };
        }
    };

    // Exemples
    $('#drop1').droparea(options1);

});

</script> 

