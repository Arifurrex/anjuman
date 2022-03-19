<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-name">
                <p class="name"><?=$_SESSION['username']?></p>
                <p class="designation">Manager</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
         
          <!-- ============== -->
          <!-- pos  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-pos" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/01.png" alt="menu icon"> <span class="menu-title">post</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-pos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/post/all-post.php">all post</a></li>
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/post/add-post.php">Add post</a></li>
              </ul>
            </div>
          </li>
           <!-- ============== -->
          <!-- category  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-cat" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/03.png" alt="menu icon"> <span class="menu-title">Category</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-cat">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/category.php">all category</a></li>
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/add-category.php">Add category</a></li>
              </ul>
            </div>
          </li>
          <!-- ============== -->
          <!-- members  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-members" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/02.png" alt="menu icon"> <span class="menu-title">Members</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-members">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/all-member.php">All Members</a></li>
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/add-members.php">Add Member</a></li>
              </ul>
            </div>
          </li>
          <!-- =========== -->
          <!-- ============== -->
          <!-- users  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-users" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Users</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/all-users.php">all users</a></li>
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/add-user.php">Add user</a></li>
              </ul>
            </div>
          </li>
          <!-- =========== -->
          <!-- ============== -->
          <!-- division  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-division" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Division</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-division">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="division.php">All Division</a></li>
              </ul>
            </div>
          </li>
          <!-- =========== -->
          <!-- ============== -->
          <!-- district  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-district" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/07.png" alt="menu icon"> <span class="menu-title">District</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-district">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-district.php">Add District</a></li>
                <li class="nav-item"> <a class="nav-link" href="alldistrict.php">All District</a></li>
              </ul>
            </div>
          </li>
          <!-- ============== -->
           <!-- ============== -->
          <!-- upojella  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-upojella" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/07.png" alt="menu icon"> <span class="menu-title">Upojella</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-upojella">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-upojella.php">Add Upojella</a></li>
                <li class="nav-item"> <a class="nav-link" href="upojella.php">All Upojella</a></li>
              </ul>
            </div>
          </li>
          <!-- ============== -->
          <!-- union  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-union" aria-expanded="false" aria-controls="all-pos"> 
               <img class="menu-icon" src="../images/menu_icons/01.png" alt="menu icon">
               <span class="menu-title">Union</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="all-union">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-postoffice.php">Add Union</a></li>
                <li class="nav-item"> <a class="nav-link" href="postoffice.php">All Union</a></li>
              </ul>
            </div>
          </li>
          <!-- ============== -->
          <!-- village  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-village" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/01.png" alt="menu icon"> <span class="menu-title">Village</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-village">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-village.php">Add Village</a></li>
                <li class="nav-item"> <a class="nav-link" href="village.php">All Village</a></li>
              </ul>
            </div>
          </li>
           <!-- ============== -->
          <!-- position  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#all-position" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/06.png" alt="menu icon"> <span class="menu-title">Position</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="all-position">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-position.php">Add Positon</a></li>
                <li class="nav-item"> <a class="nav-link" href="position.php">All Position</a></li>
              </ul>
            </div>
          </li>
          <!-- =========== -->
           <!-- ============== -->
          <!-- about us  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#about" aria-expanded="false" aria-controls="all-pos"> <img class="menu-icon" src="../images/menu_icons/06.png" alt="menu icon"> <span class="menu-title">About us</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="about">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/add-about.php">Add About</a></li>
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/about.php">All about</a></li>
              </ul>
            </div>
          </li>
          <!-- =========== -->
           <!-- ============== -->
          <!-- ourinstitute us  -->
          <!-- ============== -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ourinstitute" aria-expanded="false" aria-controls="all-ourinstitute"> <img class="menu-icon" src="../images/menu_icons/02.png" alt="menu icon"> <span class="menu-title">our institute`</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="ourinstitute">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/add-ourinstitute.php">Add ourinstitute</a></li>
                <li class="nav-item"> <a class="nav-link" href="https://www.anjumanehefajoth.com/admin/ourinstitute.php">All ourinstitute</a></li>
              </ul>
            </div>
          </li>
          <!-- =========== -->
          <li class="nav-item purchase-button"><a class="nav-link" href="../includes/logout.inc.php" >log out</a></li>
        </ul>
      </nav>