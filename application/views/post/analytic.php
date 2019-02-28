<section id="blog" class="container">
    <div class="widget search">
        <div class="row">
            <form role="form" class="search-form">
                <div class="col-md-10 col-sm-9 left-search">
                    <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search by usernames, keywords &amp; labels">
                    <div class="advanc-search">
                        <div class="row">
                            <div class="col-md-7 col-sm-7"> 
                                <a href="" data-toggle="modal" data-target="#search_modal"> <i class="fa fa-search"></i> Advanced Search</a> &nbsp; &nbsp; <a href=""> <i class="fa fa-save"></i> Save Search</a>
                            </div>
                            <div class="col-md-5 col-sm-5 text-right pull-right">
                                <a href="" data-toggle="modal" data-target="#save_search"> <i class="fa fa-list"></i> Saved Search</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 right-search">
                    <button class="btn btn-primary search-btn pull-right" type="button"> <i class="fa fa-search"></i> Search </button>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
    
  <!--/.search-->
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbed round">
                   <ul>
                       <li> <a href="post/individual_post/post_details/<?php echo $seg = $this->uri->segment(4)?>" class="" >Post</a></li>
                       <li> <a href="javascript:;" style="pointer-events: none;" class="active" >History</a></li>
                       <li> <a href="javascript:;" class="active<?php //if(!empty($all_posts)){ echo 'active'; } ?>">Analytics</a></li>
                   </ul>
               </div>    
                
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade " id="analytics">
                        <div class="blog-item">
                            <div class="row">


                                  <div class="col-md-12">
                                    <div class="tab">
                      <nav class="tab-nav mini-tab no-collapse">
                        <ul class="dragscroll">
                          <li class="active"><a href="#analytic_tab1">Views</a></li>  
                          <li><a href="#analytic_tab2">Followers</a></li>  
                          <li><a href="#analytic_tab3">Helpful</a></li>  
                        </ul>
                      </nav>
                      <div class="tab-pane active" id="analytic_tab1">
                        <div class="blog-content">
                            <h3 class="h3-heading"> Views</h3>
                             <div id="container-dash" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                        </div>
                      </div>
                      <div class="tab-pane" id="analytic_tab2">
                        <div class="blog-content">
                          <h3 class="h3-heading"> Followers</h3>
                           <div id="container-dash2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                      </div>
                      </div>
                      <div class="tab-pane" id="analytic_tab3">
                        <div class="blog-content">
                          <h3 class="h3-heading"> Helpful</h3>
                           <div id="container-dash3" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                      </div>
                      </div>
                    </div>
                        </div>





                                  </div>
                                </div>
                                <!--/.blog-item-->
                              </div>
                </div>
                
            </div>
        </div>
    </div>

</section>    