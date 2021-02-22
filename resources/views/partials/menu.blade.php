<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('applicationsmenu_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-clipboard c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.applicationsmenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('districtposting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.districtpostings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/districtpostings") || request()->is("admin/districtpostings/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.districtposting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.applications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/applications") || request()->is("admin/applications/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.application.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pondicheryapplication_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pondicheryapplications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pondicheryapplications") || request()->is("admin/pondicheryapplications/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pondicheryapplication.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('advance_search_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("advance-search") }}" class="c-sidebar-nav-link {{ request()->is("admin/advance-search") || request()->is("admin/advance-search") ? "active" : "" }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    Advance Search
                </a>
            </li>
        @endcan
        @can('posting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.postings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/postings") || request()->is("admin/postings/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.posting.title') }}
                </a>
            </li>
        @endcan
        @can('pondicheryposting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.pondicherypostings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pondicherypostings") || request()->is("admin/pondicherypostings/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.pondicheryposting.title') }}
                </a>
            </li>
        @endcan
        @can('master_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.master.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                <i class="fa-fw fab fa-blogger c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('subcategory_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subcategories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subcategories") || request()->is("admin/subcategories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-sort-alpha-down c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subcategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.post.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('district_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.districts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/districts") || request()->is("admin/districts/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.district.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('block_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.blocks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/blocks") || request()->is("admin/blocks/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-map-marker c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.block.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('panchayat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.panchayats.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/panchayats") || request()->is("admin/panchayats/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-map-marked c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.panchayat.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('townpanchayat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.townpanchayats.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/townpanchayats") || request()->is("admin/townpanchayats/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.townpanchayat.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('townvattam_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.townvattams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/townvattams") || request()->is("admin/townvattams/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.townvattam.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('municipality_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.municipalities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/municipalities") || request()->is("admin/municipalities/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.municipality.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('municipalityvattam_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.municipalityvattams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/municipalityvattams") || request()->is("admin/municipalityvattams/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.municipalityvattam.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('metropolitan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.metropolitans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/metropolitans") || request()->is("admin/metropolitans/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.metropolitan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('area_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.areas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/areas") || request()->is("admin/areas/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.area.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('metrovattam_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.metrovattams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/metrovattams") || request()->is("admin/metrovattams/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-dot-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.metrovattam.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('assembly_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assemblies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assemblies") || request()->is("admin/assemblies/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assembly.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('pondichery_master_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.pondicheryMaster.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('category_pondichery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.category-pondicheries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/category-pondicheries") || request()->is("admin/category-pondicheries/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.categoryPondichery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('subcategory_pondichery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subcategory-pondicheries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subcategory-pondicheries") || request()->is("admin/subcategory-pondicheries/*") ? "active" : "" }}">
                                <i class="fa-fw fab fa-microsoft c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subcategoryPondichery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('subsubcategory_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subsubcategories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subsubcategories") || request()->is("admin/subsubcategories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-atlas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subsubcategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('districtspondichery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.districtspondicheries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/districtspondicheries") || request()->is("admin/districtspondicheries/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.districtspondichery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pondicheryassembly_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pondicheryassemblies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pondicheryassemblies") || request()->is("admin/pondicheryassemblies/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pondicheryassembly.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('meeting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.meetings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/meetings") || request()->is("admin/meetings/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.meeting.title') }}
                </a>
            </li>
        @endcan
        @can('training_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.trainings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trainings") || request()->is("admin/trainings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.training.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>