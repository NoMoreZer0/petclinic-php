<!-- Main Sidebar Container -->
<style>
    .main-sidebar {
        /*width: 25vw;*/
    }

    .nav-item {
        font-size: 12px;
    }

    .sidebar-mini .main-sidebar .nav-link {
        width: inherit;
    }
</style>

@php
    $event = session()->get('event');
    $eventTime = session()->get('event_time');
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="row">

        <!-- Brand Logo -->
        <a href="{{route('admin.home')}}" class="brand-link w-100">
            <img src="/admin-assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{config('app.env')!= 'production' ? 'Dev' : ''}} {{__('Admin panel')}}</span>
        </a>

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex w-100"  >
            <div class="image">
                <img src="/admin-assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-white">
                <p class="mb-0">{{auth()->user()->first_name}}</p>
                <b>{{__(auth()->user()->role)}}</b>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item" role="presentation">
            <button
                class="nav-link {{($event && ($eventTime < now())) ? 'disable' : 'active'}}"
                id="home-tab"
                data-bs-toggle="tab"
                data-bs-target="#home"
                type="button"
                role="tab"
                aria-controls="home"
                aria-selected="{{($event && ($eventTime < now())) ? 'false' : 'true'}}"
            >
                General
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="sidebar h-100">

                <!-- Sidebar Menu -->
            </div>
        </div>
    </div>
</aside>
<script>
    $(document).ready(function () {
        $('.nav-item').click((e) => {
            const nav_item = $(e.target)
            nav_item.click((e) => {
                $(e.target).parents().removeClass('menu-is-opening');
                $(e.target).parents().removeClass('menu-open');
                $(e.target).off('click');
            })
        })
    })
</script>
