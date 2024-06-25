<?php
use \App\Http\Controllers\HomeController;  
$user = HomeController::getUser();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link text-center">
          <span class="brand-text font-weight-bold ">TLBookstore</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex text-light">

              <div class="info-hello">
                  Xin chào, {{$user->first_name}}
              </div> 
          </div>
          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item {{ Route::current()->getName() === 'dashboard.index' ? 'menu-open' : null }}">
                      <a href="#"
                          class="nav-link {{ Route::current()->getName() === 'dashboard.index' ? 'active' : null }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p class="text-capitalize">
                              Bảng điều khiển
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('dashboard') }}"
                                  class="nav-link {{ Route::current()->getName() === 'dashboard.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-chart-pie"></i>
                                  <p class="text-capitalize">Thống kê</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li
                      class="nav-item {{ Route::current()->getName() === 'product.index' || Route::current()->getName() === 'publisher.index' || Route::current()->getName() === 'categories.index' || Route::current()->getName() === 'product.warehouse' ? 'menu-open' : null }}">
                      <a href="#"
                          class="nav-link {{ Route::current()->getName() === 'product.index' || Route::current()->getName() === 'publisher.index' || Route::current()->getName() === 'categories.index' || Route::current()->getName() === 'product.warehouse'? 'active' : null }}">
                          <i class="nav-icon text-sm fas fa-layer-group"></i>
                          <p class="text-capitalize">
                              Group Sản Phẩm
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('categories.index') }}"
                                  class="nav-link {{ Route::current()->getName() === 'categories.index' ? 'active' : null }}">
                                  <i class="nav-icon text-sm fas fa-boxes"></i>
                                  <p class="text-capitalize">
                                      Danh Mục Sản Phẩm
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('publisher.index') }}"
                                  class="nav-link {{ Route::current()->getName() === 'publisher.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-book"></i>
                                  <p class="text-capitalize">
                                      Nhà Xuất Bản
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('product.index') }}"
                                  class="nav-link {{ Route::current()->getName() === 'product.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p class="text-capitalize">
                                      Danh Sách sản phẩm
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('product.warehouse') }}"
                                  class="nav-link {{ Route::current()->getName() === 'product.warehouse' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p class="text-capitalize">
                                      Quản lý kho
                                  </p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li
                      class="nav-item {{ Route::current()->getName() === 'import_invoice.index' ? 'menu-open' : null }}">
                      <a href="#"
                          class="nav-link {{ Route::current()->getName() === 'import_invoice.index' ? 'active' : null }}">
                          <i class="nav-icon text-sm fas fa-layer-group"></i>
                          <p class="text-capitalize">
                              Group Hóa Đơn
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('import_invoice.index') }}"
                                  class="nav-link {{ Route::current()->getName() === 'import_invoice.index' ? 'active' : null }}">
                                  <i class="nav-icon text-sm fas fa-boxes"></i>
                                  <p class="text-capitalize">
                                      Hóa Đơn Nhập
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="nav-icon fas fa-book"></i>
                                  <p class="text-capitalize">
                                      Hóa Đơn Bán
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item {{ Route::current()->getName() === 'staticnews.index' || Route::current()->getName() === 'news.index' ? 'menu-open' : null }}">
                      <a href="#" class="nav-link {{ Route::current()->getName() === 'staticnews.index' || Route::current()->getName() === 'news.index' ? 'active' : null }} ">
                          <i class="nav-icon text-sm far fa-newspaper"></i>
                          <p class="text-capitalize">
                              Group Bài Viết
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('staticnews.index') }}" class="nav-link {{ Route::current()->getName() === 'staticnews.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-file"></i>
                                  <p class="text-capitalize">
                                      Bài viết giới thiệu
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('news.index') }}" class="nav-link {{ Route::current()->getName() === 'news.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p class="text-capitalize">
                                      Bài Viết tin tức
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item {{ Route::current()->getName() === 'users.index' || Route::current()->getName() === 'roles.index' ? 'menu-open' : null }}">
                      <a href="#" class="nav-link {{ Route::current()->getName() === 'users.index' || Route::current()->getName() === 'roles.index' ? 'active' : null }}">
                          <i class="nav-icon text-sm fas fa-users"></i>
                          <p class="text-capitalize">
                              Group users
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('users.index') }}" class="nav-link {{ Route::current()->getName() === 'users.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p class="text-capitalize">
                                      Danh Sách Nhân Viên
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('roles.index') }}" class="nav-link {{ Route::current()->getName() === 'roles.index' ? 'active' : null }}">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p class="text-capitalize">
                                      Danh sách vai trò
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('slider.index') }}" class="nav-link {{ Route::current()->getName() === 'slider.index' ? 'active' : null }}">
                          <i class="nav-icon far fa-image"></i>
                          <p class="text-capitalize">
                              Slider
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('setting.index') }}" class="nav-link {{ Route::current()->getName() === 'setting.index' ? 'active' : null }}">
                          <i class="nav-icon text-sm fas fa-cogs"></i>
                          <p class="text-capitalize">
                              Cấu Hình Chung
                          </p>
                      </a>
                  </li> 
              </ul>
          </nav>
      </div>
  </aside>
