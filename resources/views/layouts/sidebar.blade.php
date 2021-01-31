<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        
        <li class="menu-sidebar"><a href="{{ url('home') }}"><span class="fa fa-dashboard"></span> Beranda Dashboard</span></a></li>
        
        <li class="menu-sidebar"><a href="{{ url('/barang') }}"><span class="fa fa-cubes"></span> Barang</span></a></li>

        <li class="header">Admin</li>
        <li class="menu-sidebar"><a href="{{ url('/supplier') }}"><span class="fa fa-users"></span> Supllier</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/jenisbarang') }}"><span class="fa fa-th-list"></span> Jenis Barang</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/satuan') }}"><span class="fa fa-cube"></span> Satuan</span></a></li>

        

        <li class="menu-sidebar"><a href="{{ url('/po') }}"><span class="fa fa-cart-plus"></span> Order Pembelian</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/gr') }}"><span class="fa fa-fire"></span> Good Receipt</span></a></li>

        <li class="header">Karyawan</li>

        <li class="menu-sidebar"><a href="{{ url('/pos') }}"><span class="fa fa-cart-plus"></span> Transaksi Penjualan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/history') }}"><span class="fa fa-history"></span> History Penjualan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>