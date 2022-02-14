 <!-- menu profile quick info -->
 <div class="profile clearfix">
     <div class="profile_pic">
         <img src="/img/anggota/<?= session()->get('pic'); ?>" alt="..." class="img-circle profile_img">
     </div>
     <div class="profile_info">
         <span>Welcome,</span>
         <h2><?= session()->get('name'); ?></h2>
     </div>
 </div>
 <!-- /menu profile quick info -->

 <br />
 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
     <div class="menu_section">
         <h3>General</h3>
         <ul class="nav side-menu">
             <li><a href="/admin"><i class=" fa fa-home"></i> Home</a>

             </li>
             <li><a href="/admin/list"><i class="fa fa-users"></i> Data Anggota <span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="/admin/list">List Anggota</a></li>
                     <li><a href="/admin/register">Register Anggota</a></li>
                 </ul>
             </li>
         </ul>
     </div>


 </div>
 <!-- /sidebar menu -->
 <!-- /menu footer buttons -->
 <div class="sidebar-footer hidden-small">
     <a data-toggle="tooltip" data-placement="top" title="Settings">
         <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
     </a>
     <a data-toggle="tooltip" data-placement="top" title="FullScreen">
         <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
     </a>
     <a data-toggle="tooltip" data-placement="top" title="Lock">
         <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
     </a>
     <a data-toggle="tooltip" data-placement="top" title="Logout" href="/auth/logout">
         <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
     </a>
 </div>
 <!-- /menu footer buttons -->
 </div>
 </div>