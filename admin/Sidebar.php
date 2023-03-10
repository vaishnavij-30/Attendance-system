<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="../CSElogo2.png" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">CSE Department</span>
                <span class="text-secondary text-small">M. S. Bidve Engineering </span>
                <span class="text-secondary text-small">College, Latur</span>
              </div>
              <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Home</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="subject.php">
              <span class="menu-title">Class & Subject</span>
              <i class="mdi mdi-star menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Staff</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add_staff.php">Add Staff</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_staff.php">View Staff</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">Student</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add_std.php">Add Student</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_std.php"> View Student </a></li>
              </ul>
              </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="assign.php">
              <span class="menu-title">Assign a class</span>
              <i class="mdi mdi-star menu-icon"></i>
            </a>
          </li> 
        </ul>
      </nav>