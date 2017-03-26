<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.panel.fragments.head')
</head>
	
<body class="menubar-top menubar-light theme-primary">
    
    <!-- Navigation -->
    @if($panel['type'] == 'admin')
        @include('layouts.panel.fragments.admin.navi')
    @elseif($panel['type'] == 'user')
        @include('layouts.panel.fragments.user.navi')
    @endif
    <!-- End Navigation -->
    
    <!-- Aside -->
    @if($panel['type'] == 'admin')
        @include('layouts.panel.fragments.admin.aside')
    @elseif($panel['type'] == 'user')
        @include('layouts.panel.fragments.user.aside')
    @endif
    <!-- End Aside -->

    <!-- Main -->
    <main id="app-main" class="app-main">
        
        <!-- Content -->
        <div class="wrap">
            <section class="app-content">
                @include('layouts.panel.fragments.messages')
                @yield('page-content', 'Content Here.')
            </section>
        </div>
        <!-- End Content -->
        
        <!-- Footer -->
        <div class="wrap p-t-0">
            <footer class="app-footer">
                <div class="clearfix">
                    <ul class="footer-menu pull-right">
                        <li><a href="javascript:void(0)">Careers</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
                    </ul>
                    <div class="copyright pull-left">Copyright RaThemes 2016 &copy;</div>
                </div>
            </footer>
        </div>
        <!-- End Footer -->
        
    </main>
    <!-- End Main -->
	
	<!-- Foot -->
    @include('layouts.panel.fragments.foot')
    <!-- End Foot -->

</body>
</html>