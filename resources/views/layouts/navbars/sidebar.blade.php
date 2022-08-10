<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-primary" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (auth()->user()->type == 1) { ?>
            <a class="navbar-brand pt-0" href="{{ route('admin.home') }}">
                <!-- <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-briefcase-medical text-white"></i>
                </div>
                <div class="sidebar-brand-text mx-0 text-white">คลินิคหมอขิง - หมอณัฐพล</sup></div>
            </a>
        <?php
        } ?>
        <?php if (auth()->user()->type == 2 || auth()->user()->type== 3 || auth()->user()->type== 4) { ?>
            <a class="navbar-brand pt-0" href="{{ route('home') }}">
                <!-- <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-briefcase-medical text-white"></i>
                </div>
                <div class="sidebar-brand-text mx-0 text-white">คลินิคหมอขิง - หมอณัฐพล</sup></div>
            </a>
        <?php
        } ?>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <?php if (auth()->user()->type == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}">
                            <i class="ni ni-tv-2 text-primary text-white"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                <?php
                } ?>
                <?php if (auth()->user()->type == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('userdata') }}">
                            <i class="ni ni-circle-08 text-white"></i> {{ __('ผู้ใช้ในระบบ') }}
                        </a>
                    </li>
                <?php
                } ?>
                <!-- <?php if (auth()->user()->type == 2) { ?> //ตารางเก่า
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sendpatientbone') }}">
                            <i class="ni ni-circle-08"></i> {{ __('ตารางสำหรับส่งรายชื่อคนไข้(กระดูก)') }}
                        </a>
                    </li>
                <?php
                        } ?> -->
                <?php if (auth()->user()->type == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-sendpatientbone" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <!-- <i class="fab fa-laravel" style="color: #f4645f;"></i> -->
                            <i class="ni ni-bullet-list-67 text-white"></i>
                            <span class="nav-link-text text-white">{{ __('ตารางสำหรับส่งรายชื่อคนไข้') }}</span>
                        </a>
                        <div class="collapse" id="navbar-sendpatientbone">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('profile.edit') }}"> -->
                                    <a class="nav-link text-white" href="{{ route('sendpatientbone') }}">
                                        {{ __('• คนไข้กระดูก') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('sendpatientchild') }}">
                                        {{ __('• คนไข้เด็ก') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php
                } ?>

                <?php if (auth()->user()->type == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-donepatient" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <!-- <i class="fab fa-laravel" style="color: #f4645f;"></i> -->
                            <i class="ni ni-bullet-list-67 text-white"></i>
                            <span class="nav-link-text text-white">{{ __('ตารางคนไข้เตรียมจ่ายยา') }}</span>
                        </a>
                        <div class="collapse" id="navbar-donepatient">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('profile.edit') }}"> -->
                                    <a class="nav-link text-white" href="{{ route('donepatientbone') }}">
                                        {{ __('• คนไข้กระดูก') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('donepatientchild') }}">
                                        {{ __('• คนไข้เด็ก') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php
                } ?>
                <?php if (auth()->user()->type == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('patientcheckbone') }}">
                            <i class="ni ni-circle-08 text-white"></i> {{ __('รายชื่อคนไข้รอตรวจ(กระดูก)') }}
                        </a>
                    </li>
                <?php
                } ?>
                <?php if (auth()->user()->type == 4) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('patientcheckchild') }}">
                            <i class="ni ni-circle-08 text-white"></i> {{ __('รายชื่อคนไข้รอตรวจ(เด็ก)') }}
                        </a>
                    </li>
                <?php
                } ?>
                <?php if (auth()->user()->type == 1 || auth()->user()->type == 2) { ?>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#navbar-patient" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <!-- <i class="fab fa-laravel" style="color: #f4645f;"></i> -->
                            <i class="ni ni-bullet-list-67 text-white"></i>
                            <span class="nav-link-text text-white">{{ __('รายชื่อคนไข้') }}</span>
                        </a>
                        <div class="collapse" id="navbar-patient">
                            <ul class="nav nav-sm flex-column ">
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('profile.edit') }}"> -->
                                    <a class="nav-link text-white" href="{{ route('patientbone') }}">
                                        {{ __('• รักษากระดูก') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('patientchild') }}">
                                        {{ __('• รักษาเด็ก') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php
                } ?>
                <?php if (auth()->user()->type == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('stock') }}">
                            <i class="fa-solid fa-capsules text-white"></i> {{ __('จัดการสต๊อกยา') }}
                        </a>
                    </li>
                <?php
                } ?>
                <?php if (auth()->user()->type == 1 || auth()->user()->type == 3 || auth()->user()->type == 4) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-drug" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <!-- <i class="fab fa-laravel" style="color: #f4645f;"></i> -->
                            <i class="fa fa-plus-square text-white"></i>
                            <span class="nav-link-text text-white">{{ __('ข้อมูลยา') }}</span>
                        </a>

                        <div class="collapse" id="navbar-drug">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('typedrugs') }}">
                                        {{ __('• ประเภทยา') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('drugslist') }}">
                                        {{ __('• แสดงข้อมูลยาทั้งหมด') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('drugs-low') }}">
                                        {{ __('• สินค้าที่ใกล้หมด') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php
                } ?>
            </ul>
        </div>
        <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <span>{{ __('Logout') }}</span>
        </a>
    </div>
</nav>