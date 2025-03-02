<x-app-layout>
    <div class="admin_container">
        <div class="lastseen_details">
            <p>Welcome <strong>{{ Auth::check() ? Auth::user()->user_level_label : 'Guest'}}</strong>
                {{  Auth::user()->first_name}} {{  Auth::user()->last_name}}
            </p>
            
         
        </div>
        
        <div class="dashboard_infor">
            <div class="admin_dashboard">
                <div class="admin_items">
                    <i class="fa fa-user-graduate"></i>
                    <div class="details">
                        <p>Students</p>
                        <span>1</span>
                    </div>
                </div>
                
                <div class="admin_items">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <div class="details">
                        <p>Teachers</p>
                        <span>5</span>
                    </div>
                </div>
                
                <div class="admin_items">
                    <i class="fa fa-child"></i>
                    <div class="details">
                        <p>Parents</p>
                        <span>15</span>
                    </div>
                </div>

                <div class="admin_items">
                    <i class="fa fa-school"></i>
                    <div class="details">
                        <p>Classes</p>
                        <span>20</span>
                    </div>
                </div>
    
                <div class="admin_items">
                    <i class="fa fa-bed"></i>
                    <div class="details">
                        <p>Dorms</p>
                        <span>90</span>
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
</x-app-layout>