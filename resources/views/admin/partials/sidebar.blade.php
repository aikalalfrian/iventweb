 <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
 <aside class="left-sidebar bg-sidebar">
     <div id="sidebar" class="sidebar sidebar-with-footer">
         <!-- Aplication Brand -->
         <div class="app-brand">
             <a href="{{ route('admin.home') }}">
                 <img src="{{ asset('images/logo-ivent.png') }}" alt="#">

             </a>
         </div>
         <!-- begin sidebar scrollbar -->
         <div class="sidebar-scrollbar">
             <!-- sidebar menu -->
             <ul class="nav sidebar-inner" id="sidebar-menu">
                 <li class="has-sub active expand">
                     <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                         data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                         <i class="mdi mdi-view-dashboard-outline"></i>
                         <span class="nav-text">Dashboard</span> <b class="caret"></b>
                     </a>
                     <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                         <div class="sub-menu">
                             <li class="active">
                                 {{-- <a class="sidenav-item-link" href={{ route('laporan') }}>
                                     <span class="nav-text">Laporan</span>
                                 </a> --}}
                             </li>
                             <li class="active">
                                 <a class="sidenav-item-link" href="{{ route('admin.transaksi.index') }}">
                                     <span class="nav-text">Transaksi</span>
                                 </a>
                             </li>
                         </div>
                     </ul>
                 </li>
             </ul>

         </div>

         <hr class="separator" />
     </div>
 </aside>
