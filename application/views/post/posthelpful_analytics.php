<script src="js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="js/custom_lazy_load.js"></script>
<script type="text/javascript">
    var globalInfo = {
        postId: '<?php echo $post_id;?>',
        graphType: '',
        dateRange: '<?php echo date('Y-m-d')?>',
        // this can be changef to get grid or list view in future 
        viewType: 'grid',
        page: 1
    };
</script>
<script type="text/javascript" src="js/helpful_graph.js"></script> 
<section id="blog" class="container">
    <div class="widget search">
        <?php echo commonSearchForm();?>
    </div>
    
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($postdetail_tabs)){ echo $postdetail_tabs; } ?>
                
                <div class="tab">
                    <nav class="tab-nav mini-tab no-collapse">
                        <ul class="dragscroll">
                            <li><a href="post/analytics/postview_analytics/<?php echo base64_encode($post_id);?>">Views</a></li>  
                            <li><a href="post/analytics/postfollow_analytics/<?php echo base64_encode($post_id);?>">Followers</a></li>  
                            <li class="active"><a href="post/analytics/posthelpful_analytics/<?php echo base64_encode($post_id);?>">Helpful</a></li>  
                        </ul>
                    </nav>
                    <div class="tab-pane active" id="analytic_tab1">
                        <div class="blog-content">
                            <h3 class="h3-heading"><?php if(!empty($post_info)){ echo $post_info->title; }?></h3>
                            <ul class="nav nav-pills navigator_tabb" id="analytic_tab1">
                                <li class="active" data-value="daily"><a href="javascript:void(0)">Daily</a></li>
                                <li class="" data-value="weekly"><a href="javascript:void(0)">Weekly</a></li>
                                <li class="" data-value="monthly"><a href="javascript:void(0)">Monthly</a></li>
                                <li class="" data-value="yearly"><a href="javascript:void(0)">Yearly</a></li>
                            </ul>  

                            <div id="graph-section" class="graph">
                                <!-- graph will display here -->
                            </div> 
                        </div>
                    </div>
                    
                </div>
               

            </div>
        </div>
    </div>
</section>

<div class="modal fade" data-toggle="modal" id="load_user">
    
</div>