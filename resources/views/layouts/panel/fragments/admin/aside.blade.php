<aside id="menubar" class="menubar light">
    <div class="app-user">
        
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive" src="{{ Auth::user()->present()->avatar }}" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            
          <div class="media-body">
            <div class="foldable">
              <h5><a href="javascript:void(0)" class="username">John Doe</a></h5>
              <ul>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <small>Web Developer</small>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu animated flipInY">
                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('estates.manage') }}">
                        <i class="menu-icon zmdi zmdi-pin zmdi-hc-lg"></i>
                        <span class="menu-text">Estates</span>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-home zmdi-hc-lg"></i>
                        <span class="menu-text">Properties</span>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-comment-text zmdi-hc-lg"></i>
                        <span class="menu-text">News</span>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-download zmdi-hc-lg"></i>
                        <span class="menu-text">Downloads</span>
                    </a>
                </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div><!-- .media-body -->
        </div><!-- .media -->
      </div><!-- .app-user -->
    
    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            
            <ul class="app-menu">
                <li>
                    <a href="#">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('estates.manage') }}">
                        <i class="menu-icon zmdi zmdi-pin zmdi-hc-lg"></i>
                        <span class="menu-text">Estates</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('properties.manage') }}">
                        <i class="menu-icon zmdi zmdi-home zmdi-hc-lg"></i>
                        <span class="menu-text">Properties</span>
                    </a>
                </li>
                
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-comment-text zmdi-hc-lg"></i>
                        <span class="menu-text">News</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    
                    <ul class="submenu">
                        <li><a href="{{ route('news.manage') }}"><span class="menu-text">Manage News</span></a></li>
                        <li><a href="{{ route('news.categories.manage') }}"><span class="menu-text">News Categories</span></a></li>  
                    </ul>
                </li>
                
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-download zmdi-hc-lg"></i>
                        <span class="menu-text">Downloads</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    
                    <ul class="submenu">
                        <li><a href="{{ route('downloads.manage') }}"><span class="menu-text">Manage Downloads</span></a></li>
                        <li><a href="{{ route('downloads.types.manage') }}"><span class="menu-text">Download Types</span></a></li>  
                    </ul>
                </li>
                
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-account zmdi-hc-lg"></i>
                        <span class="menu-text">User Management</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    
                    <ul class="submenu">
                        <li><a href="{{ route('user.list') }}"><span class="menu-text">Manage Users</span></a></li>
                        <li><a href="{{ route('activity.index') }}"><span class="menu-text">User Activity</span></a></li>
                        <li><a href="{{ url('/panel/admin/permission') }}"><span class="menu-text">Permissions</span></a></li>
                        <li><a href="{{ route('role.index') }}"><span class="menu-text">Roles</span></a></li>         
                    </ul>
                </li>
                
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Settings</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    
                    <ul class="submenu">
                        <li><a href="{{ route('settings.general') }}"><span class="menu-text">General Settings</span></a></li>
                        <li><a href="{{ route('settings.auth') }}"><span class="menu-text">Registration</span></a></li>
                        <li><a href="{{ route('settings.notifications') }}"><span class="menu-text">Notifications</span></a></li>         
                    </ul>
                </li>   
                
          </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>