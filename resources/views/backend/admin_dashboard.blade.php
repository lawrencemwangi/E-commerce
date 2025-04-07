<x-admin-layout>
    <p>Welcome <strong>{{ Auth::check() ? Auth::user()->user_level_label : 'Guest'}}</strong>
        <strong>{{  Auth::user()->names}}</strong>
    </p>

    <div class="dashboard_infor">
        <div class="admin_dashboard">
            <div class="admin_items">
                <i class="fa fa-users"></i>
                <div class="details">
                    <p>Users</p>
                    <span>{{ $Count_users }}</span>
                </div>
            </div>
            
            <div class="admin_items">
                <i class="fa fa-chalkboard-teacher"></i>
                <div class="details">
                    <p>Teachers</p>
                    <span>#</span>
                </div>
            </div>
            
            <div class="admin_items">
                <i class="fa fa-child"></i>
                <div class="details">
                    <p>Parents</p>
                    <span>#</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fa fa-school"></i>
                <div class="details">
                    <p>Messages</p>
                    <span>{{ $Count_messages }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fa fa-bed"></i>
                <div class="details">
                    <p>Dorms</p>
                    <span>#</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fas fa-dollar-sign"></i>
                <div class="details">
                    <p>sales</p>
                    <span>#</span>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>