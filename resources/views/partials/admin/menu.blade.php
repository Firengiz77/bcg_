@php
    $company_logo = \App\Models\Utility::GetLogo();
    $plan = \Auth::user()->currentPlan;
@endphp
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
        @else
            <nav class="dash-sidebar light-sidebar">
                @endif
                <div class="navbar-wrapper">
                    <div class="m-header justify-content-center">
                        <a href="{{ route('dashboard') }}" class="b-brand">
                            <!-- ========   change your logo hear   ============ -->
                            <img
                                src="{{ asset('assets/images/logo/logo-dark.png') }}"
                                alt="{{ config('app.name', 'MarkUp') }}" class="logo logo-lg fix-logo" height="40px"/>
                        </a>
                    </div>
                    <div class="navbar-content">
                        <ul class="dash-navbar">
                            @if (Auth::user()->type == 1)
                                <li class="dash-item {{ Request::segment(1) == 'dashboard' ? ' active' : 'collapsed' }}">
                                    <a href="{{ route('dashboard') }}"
                                       class="dash-link {{ request()->is('dashboard') ? 'active' : '' }}">
                                <span class="dash-micon">
                                    <i class="ti ti-home"></i>
                                </span>
                                        <span class="dash-mtext">{{ __('Dashboard') }}</span>
                                    </a>
                                </li>


                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'sociallink.index' || request()->is('admin/sociallink*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('sociallink.index') }}"
                                       class="dash-link {{ request()->is('sociallink') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('sociallink') }}</span>
                                    </a>
                                </li>

                                
                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'partner.index' || request()->is('admin/partner*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('partner.index') }}"
                                       class="dash-link {{ request()->is('partner') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('partner') }}</span>
                                    </a>
                                </li>

                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'faq.index' || request()->is('admin/faq*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('faq.index') }}"
                                       class="dash-link {{ request()->is('faq') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('Faq') }}</span>
                                    </a>
                                </li>

                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'about.index' || request()->is('admin/about*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('about.index') }}"
                                       class="dash-link {{ request()->is('about') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('About') }}</span>
                                    </a>
                                </li>
                                <!-- <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'counter.index' || request()->is('admin/counter*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('counter.index') }}"
                                       class="dash-link {{ request()->is('counter') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('counter') }}</span>
                                    </a>
                                </li> -->


                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'aboutdetail.index' || request()->is('admin/aboutdetail*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('aboutdetail.index') }}"
                                       class="dash-link {{ request()->is('aboutdetail') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('aboutdetail') }}</span>
                                    </a>
                                </li>

                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'project.index' || request()->is('admin/project*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('project.index') }}"
                                       class="dash-link {{ request()->is('project') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('project') }}</span>
                                    </a>
                                </li>


                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'equipment.index' || request()->is('admin/equipment*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('equipment.index') }}"
                                       class="dash-link {{ request()->is('equipment') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('equipment') }}</span>
                                    </a>
                                </li>





                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'tag.index' || request()->is('admin/tag*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('tag.index') }}"
                                       class="dash-link {{ request()->is('tag') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('tag') }}</span>
                                    </a>
                                </li>


                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'blog.index' || request()->is('admin/blog*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('blog.index') }}"
                                       class="dash-link {{ request()->is('blog') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('blog') }}</span>
                                    </a>
                                </li>



                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'contact.index' || request()->is('admin/contact*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('contact.index') }}"
                                       class="dash-link {{ request()->is('contact') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('contact') }}</span>
                                    </a>
                                </li>



                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'maininformation.index' || request()->is('admin/maininformation*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('maininformation.index') }}"
                                       class="dash-link {{ request()->is('maininformation') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('maininformation') }}</span>
                                    </a>
                                </li>

                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'gallery.index' || request()->is('admin/gallery*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('gallery.index') }}"
                                       class="dash-link {{ request()->is('gallery') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('gallery') }}</span>
                                    </a>
                                </li>

                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'video.index' || request()->is('admin/video*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('video.index') }}"
                                       class="dash-link {{ request()->is('video') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('video') }}</span>
                                    </a>
                                </li>

                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'certificate.index' || request()->is('admin/certificate*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('certificate.index') }}"
                                       class="dash-link {{ request()->is('certificate') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('certificate') }}</span>
                                    </a>
                                </li>




                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'slider.index' || request()->is('admin/slider*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('slider.index') }}"
                                       class="dash-link {{ request()->is('slider') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('slider') }}</span>
                                    </a>
                                </li>

                                
                                <li
                                    class="dash-item dash-hasmenu {{ Request::route()->getName() == 'service.index' || request()->is('admin/service*') ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('service.index') }}"
                                       class="dash-link {{ request()->is('service') ? 'active' : '' }}">
                                <span class="dash-micon">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                                </span>
                                        <span class="dash-mtext">{{ __('service') }}</span>
                                    </a>
                                </li>


                        

                                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'settings' || Request::route()->getName() == 'store.editproducts' ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('settings') }}"
                                       class="dash-link {{ request()->is('settings') ? 'active' : '' }}">
                                <span class="dash-micon">
                                    <i class="ti ti-settings"></i>
                                </span>
                                        <span class="dash-mtext">
                                                    {{ __('Settings') }}

                                </span>
                                    </a>
                                </li>


                                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'crud' ? ' active dash-trigger' : 'collapsed' }}">
                                    <a href="{{ route('crud.index') }}"
                                       class="dash-link {{ request()->is('crud') ? 'active' : '' }}">
                                <span class="dash-micon">
                                    <i class="ti ti-settings"></i>
                                </span>
                                        <span class="dash-mtext">
                                                    {{ __('Crud') }}

                                </span>
                                    </a>
                                </li>

                         <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'users.index' || Request::route()->getName() == 'users.show' ? ' active dash-trigger' : 'collapsed' }}">
                                    <a class="dash-link"
                                       href="{{ route('users.index') }}">
                                                                    <span class="dash-micon">
                                <i class="ti ti-users"></i>
                            </span>{{ __('User') }}</a>
                                </li>  

                            @endif
                        </ul>
                        <div class="navbar-footer border-top bg-white">
                            <div class="d-flex align-items-center py-3 px-3 border-bottom">
                                <div class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30"
                                         fill="none">
                                        <circle cx="14.5" cy="15.1846" r="14.5" fill="#6FD943"/>
                                        <path opacity="0.4"
                                              d="M22.08 8.66459C21.75 8.28459 21.4 7.92459 21.02 7.60459C19.28 6.09459 17 5.18461 14.5 5.18461C12.01 5.18461 9.73999 6.09459 7.98999 7.60459C7.60999 7.92459 7.24999 8.28459 6.92999 8.66459C5.40999 10.4146 4.5 12.6946 4.5 15.1846C4.5 17.6746 5.40999 19.9546 6.92999 21.7046C7.24999 22.0846 7.60999 22.4446 7.98999 22.7646C9.73999 24.2746 12.01 25.1846 14.5 25.1846C17 25.1846 19.28 24.2746 21.02 22.7646C21.4 22.4446 21.75 22.0846 22.08 21.7046C23.59 19.9546 24.5 17.6746 24.5 15.1846C24.5 12.6946 23.59 10.4146 22.08 8.66459ZM14.5 19.6246C13.54 19.6246 12.65 19.3146 11.93 18.7946C11.52 18.5146 11.17 18.1646 10.88 17.7546C10.37 17.0346 10.06 16.1346 10.06 15.1846C10.06 14.2346 10.37 13.3346 10.88 12.6146C11.17 12.2046 11.52 11.8546 11.93 11.5746C12.65 11.0546 13.54 10.7446 14.5 10.7446C15.46 10.7446 16.35 11.0546 17.08 11.5646C17.49 11.8546 17.84 12.2046 18.13 12.6146C18.64 13.3346 18.95 14.2346 18.95 15.1846C18.95 16.1346 18.64 17.0346 18.13 17.7546C17.84 18.1646 17.49 18.5146 17.08 18.8046C16.35 19.3146 15.46 19.6246 14.5 19.6246Z"
                                              fill="#162C4E"/>
                                        <path
                                            d="M22.08 8.66459L18.18 12.5746C18.16 12.5846 18.15 12.6046 18.13 12.6146C17.84 12.2046 17.49 11.8546 17.08 11.5646C17.09 11.5446 17.1 11.5346 17.12 11.5146L21.02 7.60459C21.4 7.92459 21.75 8.28459 22.08 8.66459Z"
                                            fill="#162C4E"/>
                                        <path
                                            d="M11.9297 18.7947C11.9197 18.8147 11.9097 18.8347 11.8897 18.8547L7.98969 22.7647C7.60969 22.4447 7.24969 22.0847 6.92969 21.7047L10.8297 17.7947C10.8397 17.7747 10.8597 17.7647 10.8797 17.7547C11.1697 18.1647 11.5197 18.5147 11.9297 18.7947Z"
                                            fill="#162C4E"/>
                                        <path
                                            d="M11.9297 11.5746C11.5197 11.8546 11.1697 12.2045 10.8797 12.6145C10.8597 12.6045 10.8497 12.5846 10.8297 12.5746L6.92969 8.66453C7.24969 8.28453 7.60969 7.92453 7.98969 7.60453L11.8897 11.5146C11.9097 11.5346 11.9197 11.5546 11.9297 11.5746Z"
                                            fill="#162C4E"/>
                                        <path
                                            d="M22.08 21.7046C21.75 22.0846 21.4 22.4446 21.02 22.7646L17.12 18.8546C17.1 18.8346 17.09 18.8246 17.08 18.8046C17.49 18.5146 17.84 18.1646 18.13 17.7546C18.15 17.7646 18.16 17.7746 18.18 17.7946L22.08 21.7046Z"
                                            fill="#162C4E"/>
                                    </svg>
                                </div>
                                <div>
                                    <b class="d-block f-w-700">{{ __('You need help?') }}</b>
                                    <span>{{ __('Contact MarkUp') }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
