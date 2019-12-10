
<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <header><h1>My Account</h1></header>
        <div class="row">


            <!--SIDEBAR Content-->
            <div class="col-md-3">
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <header>
                            <h2>Related News</h2>
                        </header>
                        <div class="section-content">
                            <article>
                                <h6><a href="#"> Events </a></h6>
                                <ul>
                                    <li> <a href=""> Symposium </a></li>
                                    <li> <a href=""> Workshop </a></li>
                                    <li> <a href=""> Conference </a></li>
                                </ul>
                            </article><!-- /article -->
                            <article>
                                <h6><a href="#"> Category </a></h6>
                                <ul>
                                    <li> <a href=""> Business </a></li>
                                    <li> <a href=""> School </a></li>
                                    <li> <a href=""> College </a></li>
                                </ul>
                            </article><!-- /article -->
                        </div><!-- /.section-content -->
                        <a href="" class="read-more">All News</a>
                    </aside><!-- /.news-small -->
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
            <!-- end SIDEBAR Content-->


            <div class="col-md-9">
                <section id="my-account">
                    <ul class="nav nav-tabs" id="tabs">
                        <li class="active"><a href="#tab-profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#tab-my-events" data-toggle="tab">My Events</a></li>
                      
                        <li><a href="#tab-change-password" data-toggle="tab">Change Password</a></li>
                    </ul><!-- /#my-profile-tabs -->
                    <div class="tab-content my-account-tab-content">
                        <div class="tab-pane active" id="tab-profile">
                            <section id="my-profile">
                                <header><h3>My Profile</h3></header>
                                <div class="my-profile">
                                  <?php foreach ($user as $key => $value) { ?>
                                    
                                <form name="updateprofile" method="post" action="<?php echo base_url(); ?>/customer/account/updateprofile">
                                    <article>
                                        <div class="table-responsive">
                                            <table class="my-profile-table">
                                                <tbody>
                                                <tr>
                                                    <td class="title">First Name</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $value->firstname; ?>">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Last Name</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $value->lastname; ?>">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Email</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <?php echo $value->email; ?>
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Phone No</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="phone_no" name="phone_no" value="<?php echo $value->phone_no; ?>">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Gender</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <?php $gender = $value->gender; ?>
                                                            <select name="gender" id="gender" class="has-dark-background">
                                                                <option value="">Gender</option>
                                                                <option value="1" <?php echo ($gender == '1')?'selected':''; ?>>Male</option>
                                                                <option value="0"  <?php echo ($gender == '0')?'selected':''; ?>>Female</option>
                                                            </select>
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="title">Website</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="website" name="website" value="<?php echo $value->website;?>">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" name="profilesubmit" class="btn btn-framed pull-right">Save Changes</button>
                                    </form>
                                    </article>
                                      <?php }?>
                                </div><!-- /.my-profile -->
                            </section><!-- /#my-profile -->
                        </div><!-- /tab-pane -->
                        <div class="tab-pane" id="tab-my-events">
                            <section id="course-list">
                                <header><h3>My Events</h3></header>
                                <table class="table table-hover table-responsive course-list-table tablesorter">
                                    <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Event Type</th>
                                        <th class="starts">Starts</th>
                                        <th class="status">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="status-not-started">
                                        <th class="course-title"><a href="course-detail-v1.html">Introduction to modo 701</a></th>
                                        <th class="course-category"><a href="#">Symposium</a></th>
                                        <th>01-03-2014</th>
                                        <th class="status"><i class="fa fa-calendar-o"></i>Not started yet</th>
                                    </tr>
                                    <tr class="status-not-started">
                                        <th class="course-title"><a href="course-detail-v1.html">Become self marketer</a></th>
                                        <th class="course-category"><a href="#">Workshop</a></th>
                                        <th>03-03-2014</th>
                                        <th class="status"><i class="fa fa-calendar-o"></i>Not started yet</th>
                                    </tr>
                                    <tr class="status-in-progress">
                                        <th class="course-title"><a href="course-detail-v2.html">How to find long term customers</a></th>
                                        <th class="course-category"><a href="#">Conference</a></th>
                                        <th>06-03-2014</th>
                                        <th class="status"><i class="fa fa-clock-o"></i>In progress</th>
                                    </tr>
                                    <tr class="status-in-progress">
                                        <th class="course-title"><a href="course-detail-v2.html">Neuroscience and the future</a></th>
                                        <th class="course-category"><a href="#">Science</a></th>
                                        <th>21-03-2014</th>
                                        <th class="status"><i class="fa fa-clock-o"></i>In progress</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">History in complex view</a></th>
                                        <th class="course-category"><a href="#">History and Psychology</a></th>
                                        <th>06-04-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">Become self marketer</a></th>
                                        <th class="course-category"><a href="#">Marketing</a></th>
                                        <th>03-03-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">How to find long term customers</a></th>
                                        <th class="course-category"><a href="#">Marketing</a></th>
                                        <th>06-03-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">Neuroscience and the future</a></th>
                                        <th class="course-category"><a href="#">Science</a></th>
                                        <th>21-03-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">History in complex view</a></th>
                                        <th class="course-category"><a href="#">History and Psychology</a></th>
                                        <th>06-04-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="center">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                    </ul>
                                </div>
                            </section><!-- /#course-list -->
                        </div><!-- /.tab-pane -->



                        <div class="tab-pane" id="tab-change-password">
                            <section id="password">
                                <header><h3>Change Password</h3></header>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-4">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            In sollicitudin mi id urna pulvinar, in ornare dui scelerisque.
                                            Nunc nec odio eros
                                        </p>
                                        <form role="form" class="clearfix" action="course-joined.html">
                                            <div class="form-group">
                                                <label for="current-password">Current Password</label>
                                                <input type="password" class="form-control" id="current-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new-password">New Password</label>
                                                <input type="password" class="form-control" id="new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="repeat-new-password">Repeat New Password</label>
                                                <input type="password" class="form-control" id="repeat-new-password">
                                            </div>
                                            <button type="submit" class="btn pull-right">Change Password</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div><!-- /.tab-content -->
                </section>
            </div>





        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->