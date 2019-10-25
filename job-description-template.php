<?php

/*
Template Name: Job Description Layout
*/

get_header();

if(have_posts()):
        while(have_posts()): the_post(); ?> 
        
        <article class="post page">
                <div class="container">
                        <div class="row">
                                <div class="col-sm-6">
                                        <h2><?php the_title(); ?> </h2>
                                        <p><?php the_content(); ?></p>
                                </div>
                                <div class="col-sm-6">
                                <div class="col-lg-10 app-form">
                                        <div class="job-meta"><h3>Apply for this Job</h3></div>
                                        <hr>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Full Name</label>
                                        <input type="email" class="form-control" id="name"> </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Email ID</label>
                                        <input type="email" class="form-control" id="email-address"> </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Address</label>
                                        <input type="email" class="form-control" id="address"> </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">LinkedIn Profile</label>
                                        <input type="email" class="form-control" id="linkedin"> </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                        <label for="exampleInput1" class="bmd-label-floating">Current Role / Responsibilities</label>
                                        <input type="email" class="form-control" id="current-role"> </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group form-file-upload form-file-multiple">
                                        <label for="exampleInput1" class="bmd-label-floating">Upload your resume</label>
                                        <input type="file" multiple="" class="inputFileHidden" id="resume">
                                        </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Why Haptik?</label>
                                        <textarea class="form-control" rows="3" id="why-haptik"></textarea>
                                        </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <button class="btn" id="apply">Apply for this Job</button>
                                        <label for="" class="success"></label>
                                        </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </article>
    
    <?php endwhile;
    
    else:
        echo '<p>No content found</p>';
    
    endif;

get_footer();

?> 