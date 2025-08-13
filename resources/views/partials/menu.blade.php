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
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/addresses*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('address_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.addresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/addresses") || request()->is("admin/addresses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.address.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('site_settings_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/site-settings*") ? "c-show" : "" }} {{ request()->is("admin/countries*") ? "c-show" : "" }} {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/commission-rules*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.siteSettingsMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('site_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.site-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/site-settings") || request()->is("admin/site-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.siteSetting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('commission_rule_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.commission-rules.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/commission-rules") || request()->is("admin/commission-rules/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-ruler-combined c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.commissionRule.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('vendor_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/vendors*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/carts*") ? "c-show" : "" }} {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/payments*") ? "c-show" : "" }} {{ request()->is("admin/shipments*") ? "c-show" : "" }} {{ request()->is("admin/refunds*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-store-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.vendorMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('vendor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vendors") || request()->is("admin/vendors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-store-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vendor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-box c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('cart_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carts") || request()->is("admin/carts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cart.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-credit-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.payment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('shipment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.shipments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shipments") || request()->is("admin/shipments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shipment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('refund_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.refunds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/refunds") || request()->is("admin/refunds/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.refund.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('items_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/cart-items*") ? "c-show" : "" }} {{ request()->is("admin/order-items*") ? "c-show" : "" }} {{ request()->is("admin/payouts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-ellipsis-h c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.itemsMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('cart_item_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cart-items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cart-items") || request()->is("admin/cart-items/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cartItem.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_item_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-items") || request()->is("admin/order-items/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderItem.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payout_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payouts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payouts") || request()->is("admin/payouts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.payout.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('content_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentPage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faq-questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
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