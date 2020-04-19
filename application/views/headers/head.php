<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum - Responsive HTML5 Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Forum - Responsive HTML5 Template">
    <meta name="author" content="Forum">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>fontawesome/css/font-awesome.min.css">
</head>
<body>
    <!-- tt-mobile menu -->
    <nav class="panel-menu" id="mobile-menu">
        <ul>

        </ul>
        <div class="mm-navbtn-names">
            <div class="mm-closebtn">
                Close
                <div class="tt-icon">
                    <svg>
                      <use xlink:href="#icon-cancel"></use>
                  </svg>
              </div>
          </div>
          <div class="mm-backbtn">Back</div>
      </div>
  </nav>
  <header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- toggle mobile menu -->
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-menu_icon"></use>
                  </svg>
              </a>
              <!-- /toggle mobile menu -->
              <!-- logo -->
              <div class="tt-logo">
                <a href="index.html"><img src="images/logo.png" alt=""></a>
            </div>
            <!-- /logo -->
            <!-- desctop menu -->
            <div class="tt-desktop-menu">
                <nav>

                </nav>
            </div>
            <!-- /desctop menu -->
            <!-- tt-search -->
            <div class="tt-search">
                <!-- toggle -->
                <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                 <svg class="tt-icon">
                  <use xlink:href="#icon-search"></use>
              </svg>
          </button>
          <!-- /toggle -->
          <form class="search-wrapper">
            <div class="search-form">
                <input type="text" class="tt-search__input" placeholder="Search">
                <button class="tt-search__btn" type="submit">
                 <svg class="tt-icon">
                  <use xlink:href="#icon-search"></use>
              </svg>
          </button>
          <button class="tt-search__close">
             <svg class="tt-icon">
              <use xlink:href="#cancel"></use>
          </svg>
      </button>
  </div>
  <div class="search-results">
    <div class="tt-search-scroll">
        <ul>
            <li>
                <a href="page-single-topic.html">
                    <h6 class="tt-title">Rdr2 secret easter eggs</h6>
                    <div class="tt-description">
                     Here’s what I’ve found in Red Dead Redem..
                 </div>
             </a>
         </li>
         <li>
             <a href="page-single-topic.html">
                <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>
                <div class="tt-description">
                    You can find these easter eggs in Red Dea..
                </div>
            </a>
        </li>
        <li>
         <a href="page-single-topic.html">
            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
            <div class="tt-description">
                Here’s what I’ve found in Red Dead Redem..
            </div>
        </a>
    </li>
    <li>
        <a href="page-single-topic.html">
            <h6 class="tt-title">Rdr2 secret easter eggs</h6>
            <div class="tt-description">
             Here’s what I’ve found in Red Dead Redem..
         </div>
     </a>
 </li>
 <li>
     <a href="page-single-topic.html">
        <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>
        <div class="tt-description">
            You can find these easter eggs in Red Dea..
        </div>
    </a>
</li>
<li>
 <a href="page-single-topic.html">
    <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
    <div class="tt-description">
        Here’s what I’ve found in Red Dead Redem..
    </div>
</a>
</li>
</ul>
</div>
<button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button>
</div>
</form>
</div>
<!-- /tt-search -->
</div>
<div class="col-auto ml-auto">
    <div class="tt-account-btn">
      
                  
        <a href="<?php echo base_url('L');?>" class="btn btn-primary">Log in</a>
        <a href="<?php echo base_url('R');?>" class="btn btn-secondary">Sign up</a>
       
  </div>
</div>
</div>
</div>
<?php
                  if($this->session->flashdata('success')){
                  ?>
                  <div class="alert alert-info text-center" style="color:green;">
                    <?php echo $this->session->flashdata('success'); ?> 
                </div>
                <?php
            }else if($this->session->flashdata('errors')){
            ?>
            <div class="alert alert-info text-center" style="color:red;">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
            <?php
        }
        ?>
</header>
