<x-admin-layout>
    <p>Welcome Back <strong>{{ Auth::check() ? Auth::user()->user_level_label : 'Guest'}}</strong>
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
                <i class="fas fa-layer-group"></i>
                <div class="details">
                    <p>Collection</p>
                    <span>{{ $Count_collection }}</span>
                </div>
            </div>
            
            <div class="admin_items">
                <i class="fas fa-warehouse"></i>
                <div class="details">
                    <p>Stock</p>
                    <span>{{ $Count_stock }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fas fa-comments"></i>
                <div class="details">
                    <p>Messages</p>
                    <span>{{ $Count_messages }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fas fa-folder-open"></i>
                <div class="details">
                    <p>Assets</p>
                    <span>{{ $Count_assets }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fas fa-file-invoice-dollar"></i>
                <div class="details">
                    <p>Quotations</p>
                    <span>{{ $Count_messages }}</span>
                </div>
            </div>

            <div class="admin_items">
                <i class="fas fa-folder"></i>
                <div class="details">
                    <p>Assets Value</p>
                    <span>{{ number_format($total_assets,2) }}</span>
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