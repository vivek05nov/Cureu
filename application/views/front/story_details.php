<div class="breadcrumb-bar">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Story Details</li>
               </ol>
            </nav>
            <h2 class="breadcrumb-title">Story Details</h2>
         </div>
      </div>
   </div>
</div>
<div class="content" style="transform: none; min-height: 166px;">
   <div class="container" style="transform: none;">
      <div class="row" style="transform: none;">
         <div class="col-lg-8 col-md-12">
            <div class="blog-view">
               <div class="blog blog-single-post">
                  <div class="blog-image">
                     <img alt="" src="<?php echo base_url().$q[0]->image; ?>" class="img-fluid">
                  </div>
                  <h3 class="blog-title"><?php echo $q[0]->treatment;?></h3>
                  <div class="blog-info clearfix">
                     <div class="post-left">
                        <ul>
                           <li>
                              <div class="post-author">
                                 <a href="#!"><img src="<?php echo base_url().$q[0]->image; ?>" alt="Post Author"> <span><?php echo $q[0]->title;?></span></a>
                              </div>
                           </li>
                           <li><i class="far fa-calendar"></i><?php echo $q[0]->added_date;?></li>
                          
                        </ul>
                     </div>
                  </div>
                  <div class="blog-content">
                     <p><?php echo $q[0]->about;?></p>
                  </div>
               </div>
			   
        <!--       <div class="card blog-share clearfix">
                  <div class="card-header">
                     <h4 class="card-title">Share the post</h4>
                  </div>
                  <div class="card-body">
                     <ul class="social-share">
                        <li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </div>   -->
			   
               <div class="card author-widget clearfix">
                  <div class="card-header">
                     <h4 class="card-title">About Author</h4>
                  </div>
                  <div class="card-body">
                     <div class="about-author">
                        <div class="about-author-img">
                           <div class="author-img-wrap">
                              <a href="#!"><img class="img-fluid rounded-circle" alt="" src="https://cureu.in/assets/img/hospital/maxresdefault.jpg"></a>
                           </div>
                        </div>
                        <div class="author-details">
                           <a href="#!" class="blog-author-name">Dr. Priyanka Ortego</a>
                           <p class="mb-0">Dr Apabrita and Nidhi(co-ordinator) are very sincere and helpful. We are grateful to them for their cordial support. Medical team of the hospital is very good, and we are 100% happy. Especially Dr Manjula Patil and Dr Preeti, they are very skilled for gynaecology! I highly Recommend them," said Priyanka.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 3021.5px;">
            <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: absolute; transform: translateY(1601.72px); top: 0px; width: 350px;">
			
           <!--    <div class="card search-widget">
                  <div class="card-body">
                     <form class="search-form">
                        <div class="input-group">
                           <input type="text" placeholder="Search..." class="form-control">
                           <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>   -->
			   
               <div class="card post-widget">
                  <div class="card-header">
                     <h4 class="card-title">Latest Posts</h4>
                  </div>
                  <div class="card-body">
                     <ul class="latest-posts">
					 
					 <?php $a=1; foreach($story_details as $story){ ?>
                        <li>
                           <div class="post-thumb">
                              <a href="<?php echo base_url('story-details/').base64_encode($story->id);?>">
                              <img class="img-fluid" src="<?php echo base_url().$story->image; ?>" alt="">
                              </a>
                           </div>
                           <div class="post-info">
                              <h4>
                                 <a href="<?php echo base_url('story-details/').base64_encode($story->id);?>"><?php echo $story->title; ?></a>
                              </h4>
                           </div>
                        </li>
                        <?php $a++; } ?>
                       
                      
                     </ul>
                  </div>
               </div>
               <div class="card category-widget">
                  <div class="card-header">
                     <h4 class="card-title">Blog Categories</h4>
                  </div>
                  <div class="card-body">
                     <ul class="categories">
                        <li><a href="#">Cardiology <span>(62)</span></a></li>
                        <li><a href="#">Health Care <span>(27)</span></a></li>
                        <li><a href="#">Nutritions <span>(41)</span></a></li>
                        <li><a href="#">Health Tips <span>(16)</span></a></li>
                        <li><a href="#">Medical Research <span>(55)</span></a></li>
                        <li><a href="#">Health Treatment <span>(07)</span></a></li>
                     </ul>
                  </div>
               </div>
               <div class="card tags-widget">
                  <div class="card-header">
                     <h4 class="card-title">Tags</h4>
                  </div>
                  <div class="card-body">
                     <ul class="tags">
                        <li><a href="#" class="tag">Children</a></li>
                        <li><a href="#" class="tag">Disease</a></li>
                        <li><a href="#" class="tag">Appointment</a></li>
                        <li><a href="#" class="tag">Booking</a></li>
                        <li><a href="#" class="tag">Kids</a></li>
                        <li><a href="#" class="tag">Health</a></li>
                        <li><a href="#" class="tag">Family</a></li>
                        <li><a href="#" class="tag">Tips</a></li>
                        <li><a href="#" class="tag">Shedule</a></li>
                        <li><a href="#" class="tag">Treatment</a></li>
                        <li><a href="#" class="tag">Dr</a></li>
                        <li><a href="#" class="tag">Clinic</a></li>
                        <li><a href="#" class="tag">Online</a></li>
                        <li><a href="#" class="tag">Health Care</a></li>
                        <li><a href="#" class="tag">Consulting</a></li>
                        <li><a href="#" class="tag">Doctors</a></li>
                        <li><a href="#" class="tag">Cardiologist</a></li>
                        <li><a href="#" class="tag">Cardiologistss</a></li>
                        <li><a href="#" class="tag">Specialist</a></li>
                        <li><a href="#" class="tag">Cureu</a></li>
                     </ul>
                  </div>
               </div>
               <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                  <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                     <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 360px; height: 1430px;"></div>
                  </div>
                  <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                     <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>