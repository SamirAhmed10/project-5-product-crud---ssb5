<div class="br-logo"><a href="{{route('admin.dashboard')}}"><span>[</span>Admin <i>Panel</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('admin.dashboard') }}" class="br-menu-link active mg-t-10">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label ">Dashboard</span>
          </a><!-- br-menu-link -->
          
          <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Product Management</label>
        <li class="br-menu-item">
           <!-- Category menu -->
          <a href="#" class="br-menu-link with-sub">
            
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
          
       <span class="menu-item-label">Categories</span>
        </a><!-- br-menu-link -->
         <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('category.manage')}}" class="sub-link">Manage All Categories</a></li>
         
         </ul>
          <!-- Brands menu -->
            <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Brands</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('brand.manage')}}" class="sub-link">Manage All Brands</a></li>
      
          
            </ul>
            <!-- Products Menu -->
            <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Products</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('products.manage')}}" class="sub-link">Manage All Products</a></li>
      
          
            </ul>
            
           
        </li>
     
          <!-- users Menu -->
       <a href="" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Users</span>
          </a>
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('usermanage')}}" class="sub-link">Manage All Users</a></li>
      
          
            </ul>
            
           
        </li>
        
        
      
       

      

     

        

      </div>

      <br>
    </div>
    <!-- ########## END: LEFT PANEL ########## -->