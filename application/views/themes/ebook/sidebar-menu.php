<div class="nav-side-menu">
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  <div class="menu-list">
      <ul id="menu-content" class="menu-content collapse out">
          <li>

                  <a href="<?=base_url('dashboard/')?>"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a>

          </li>
          <li>
              <a href="<?=base_url('admin/category/')?>"><i class="fa fa-gift fa-lg"></i>Category </a>
          </li>

          <li data-toggle="collapse" data-target="#product" class="collapsed">
              <a href="javascript:void(0)"><i class="fa fa-product-hunt"></i>Products <span class="arrow"></span></a>
          </li>
          <ul class="sub-menu collapse" id="product">
              <li><a href="<?=base_url()?>product/add">Add New Product</a></li>
          </ul>


          <li>
              <a href="<?=base_url('admin/roles')?>"><i class="fa fa-car fa-lg"></i> Roles</a>
          </li>
          <li data-toggle="collapse" data-target="#users" class="collapsed">
              <a href="javascript:void(0)">
                  <i class="fa fa-users fa-lg"></i> Users<span class="arrow"></span>
              </a>
          </li>
          <ul class="sub-menu collapse" id="users">
              <li>Add New User</li>
              <li>View All Users</li>
          </ul>
          <li>
              <a href="javascript:void()">
                  <i class="fa fa-user fa-lg"></i> Profile
              </a>
          </li>
          <li>
              <a href="javascript:void()">
                  <i class="fa fa-address-book-o fa-lg"></i> Contacts
              </a>
          </li>
          <li data-toggle="collapse" data-target="#settings" class="collapsed">
              <a href="javascript:void()">
                  <i class="fa fa-cog fa-lg"></i> Settings<span class="arrow"></span>
              </a>
          </li>
          <ul class="sub-menu collapse" id="settings">
              <li><a href="<?=base_url('admin/settings/basic')?>">Basic Settings</a></li>
              <li><a href="<?=base_url('admin/settings/store')?>">Store Settings</a></li>
              <li><a href="<?=base_url('admin/settings/contact')?>">Contact Settings</a></li>
          </ul>
      </ul>
  </div>
</div>
<div class="adverts_block">
<!--<div data-WRID="WRID-151257826479145664" data-widgetType="staticBanner" data-responsive="yes" data-class="affiliateAdsByFlipkart" height="250" width="300"></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
--></div>
