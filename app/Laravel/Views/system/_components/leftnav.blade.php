<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a href="#"
            class="left-sidebar-toggle">{{ env('APP_NAME', 'Ordering Food System') }}</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">






                        <li class="divider">Masterfile</li>
                        <li class="parent"><a href="#"><i class=""></i><span>Category</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('system.category.index') }}">All records</a> </li>
                                <li><a href="{{ route('system.category.create') }}">Create New</a> </li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class=""></i><span>Questions</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('system.product.index') }}">All records</a> </li>
                                <li><a href="{{ route('system.product.create') }}">Create New</a> </li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class=""></i><span>User Management</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('system.user_management.index') }}">All records</a> </li>
                                <li><a href="{{ route('system.user_management.create') }}">Create New</a> </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
