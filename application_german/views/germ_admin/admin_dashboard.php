<?php include('admin_header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if(!empty($users)){echo $users;}else{ echo '0';}?></div>
                                    <div>Total Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="fit_administrator/profile/user_lists">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if(!empty($users_active)){echo $users_active;}else{ echo '0';}?></div>
                                    <div>Total Active Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="fit_administrator/profile/user_lists">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if(!empty($users_inactive)){echo $users_inactive;}else{ echo '0';}?></div>
                                    <div>Total In-Active Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php if(!empty($fanpage_tot)){echo $fanpage_tot;}else{ echo '0';}?></div>
                                    <div>Total Power Pages</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                
            </div>
            
            
            
            <div class="row">
                <div class="col-lg-4" style="cursor: pointer;" onclick="window.location.href='fit_administrator/message/message_latests'">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Messages
                        </div>
                        <div class="panel-body">
                            <p>Latest Five Messages.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4" style="cursor: pointer;" onclick="window.location.href='fit_administrator/newsfeed/newsfeed_latests'">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            News Feeds
                        </div>
                        <div class="panel-body">
                            <p>Latest Five News Feeds.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4" style="cursor: pointer;" onclick="window.location.href='fit_administrator/reportabuse/latest_reportabuse'">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Report Abuses
                        </div>
                        <div class="panel-body">
                            <p>Latest Five Report Abuses.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->


<?php include('admin_footer.php'); ?>
