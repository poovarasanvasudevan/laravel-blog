<div class="card">
    <div class="toolbar">

        <div class="toolbar__left mr+++">
            <button class="btn btn--l btn--black btn--icon" lx-ripple>
                <i class="mdi mdi-menu icon-white"></i>
            </button>
        </div>

        <span class="toolbar__label fs-title"><a href="dashboard" class="icon-white">{{env("APP_NAME")}}</a><sub>&nbsp;&nbsp;v2</sub></span>


        <div class="toolbar__right">


            {{--
                    Admin Role
            --}}
            @role("admin")

            <div>
                <lx-dropdown position="right" from-top>
                    <label class="btn" lx-ripple lx-dropdown-toggle>
                        Admin
                        <i class="mdi mdi-menu-down icon-white"></i>
                    </label>

                    <lx-dropdown-menu>
                        <ul>
                            <li><a class="dropdown-link dropdown-link--is-large"><i class="mdi mdi-zip-box"></i><span>Products</span></a></li>
                            <li><a class="dropdown-link dropdown-link--is-large"><i class="mdi mdi-arrow-down"></i><span>Inventory In</span></a></li>
                            <li><a class="dropdown-link dropdown-link--is-large"><i class="mdi mdi-arrow-up"></i><span>Inventory Out</span></a></li>
                            <li><a class="dropdown-link dropdown-link--is-large"><i class="mdi mdi-directions"></i><span>Intransit Inventory In/Out</span></a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-link dropdown-link--is-large"><i class="mdi mdi-account-box"></i><span>Accounts</span></a></li>
                            <li><a class="dropdown-link dropdown-link--is-large"><i class="mdi mdi-sale"></i><span>Sales Details</span></a></li>
                        </ul>
                    </lx-dropdown-menu>
                </lx-dropdown>
            </div>

            @endrole
            @role("invoicemenu")
            <div>
                <lx-dropdown position="right" from-top>
                    <label class="btn" lx-ripple lx-dropdown-toggle>
                        Invoices
                        <i class="mdi mdi-menu-down icon-white"></i>
                    </label>

                    <lx-dropdown-menu>
                        <ul>
                            <li><a class="dropdown-link">Action</a></li>
                            <li><a class="dropdown-link">Another action</a></li>
                            <li><a class="dropdown-link">Something else here</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-link dropdown-link--is-header">Header</a></li>
                            <li><a class="dropdown-link">Separated link</a></li>
                        </ul>
                    </lx-dropdown-menu>
                </lx-dropdown>
            </div>
            @endrole

            <div>
                <button class="btn btn--l btn--icon" lx-ripple>
                    <i class="mdi mdi-bell" class="icon-white"></i>
                </button>
            </div>
            @role('reportmenu')

            <div>
                <lx-dropdown position="right" from-top>
                    <label class="btn" lx-ripple lx-dropdown-toggle>
                        Reports
                        <i class="mdi mdi-menu-down icon-white"></i>
                    </label>

                    <lx-dropdown-menu>
                        <ul>

                            <li><a class="dropdown-link dropdown-link--is-large">
                                    <i class="mdi mdi-file-excel"></i><span>PosInvoice Report</span></a></li>
                            <li><a class="dropdown-link dropdown-link--is-large">
                                    <i class="mdi mdi-file"></i><span>Transcation Report</span></a></li>
                            <li><a class="dropdown-link dropdown-link--is-large">
                                    <i class="mdi mdi-details"></i><span>Transcation Details</span></a></li>
                        </ul>
                    </lx-dropdown-menu>
                </lx-dropdown>
            </div>

            @endrole

            <label>{{Auth::user()->name}}</label>

            <lx-dropdown position="right" from-top>
                <button class="btn btn--l btn--black btn--icon" lx-ripple lx-dropdown-toggle>
                    <lx-icon lx-id="account" class="icon-white"></lx-icon>
                </button>

                <lx-dropdown-menu>
                    <ul>
                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="mdi mdi-share-variant"></i><span>Shortcuts</span></a></li>
                        <li><a class="dropdown-link  dropdown-link--is-large"><i class="mdi mdi-settings"></i><span>System Settings</span></a>
                        </li>
                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="mdi mdi-account-alert"></i><span>Accounts Setting</span></a></li>
                        @role("admin")
                            <li><a class="dropdown-link  dropdown-link--is-large"><i class="mdi mdi-eye-off"></i><span>Admin System Setting</span></a></li>
                        @endrole
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-link  dropdown-link--is-large" href="feedback"><i
                                        class="mdi mdi-file"></i><span>Feedback</span></a></li>

                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="mdi mdi-account-remove"></i><span>Problem</span></a></li>

                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="mdi mdi-help"></i><span>Help</span></a></li>
                        <li class="dropdown-divider"></li>


                        @permission("canlogout.logout")
                        <li>
                            <a class="dropdown-link  dropdown-link--is-large"
                               href="logout">
                                <i class="mdi mdi-close"></i><span>Logout</span>
                            </a>
                        </li>
                        @endpermission
                    </ul>
                </lx-dropdown-menu>
            </lx-dropdown>
        </div>
    </div>
</div>