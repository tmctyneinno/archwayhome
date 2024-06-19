<div class="deznav">
    <div class="deznav-scroll mm-active">
        <ul class="metismenu mm-show" id="menu">
            <li class="mm-active">
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
               
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li class="mm-active"><a href="index.html" class="mm-active" previewlistener="true">Dashboard</a></li>
                    <li><a href="#" previewlistener="true">
                        <b>Website Menus</b></a>
                    </li>
                    
                  
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                            <span class="nav-text"> Website setting</span>
                            <span class="badge badge-sm badge-danger ms-3">New</span>
                        </a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="add-agent.html" previewlistener="true">Manage Contents</a></li>
                            <li><a href="add-agent-wizard.html" previewlistener="true">Manage Menu</a></li>
                            
                        </ul>
                    </li>
                    {{-- <li><a href="order-list.html" previewlistener="true">Order List</a></li> --}}
                    
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-user-5"></i>
                    <span class="nav-text">Agents</span>
                    <span class="badge badge-sm badge-danger ms-3">New</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="add-agent.html" previewlistener="true">Add Agent</a></li>
                    <li><a href="add-agent-wizard.html" previewlistener="true">Add Agent Wizard</a></li>
                    <li><a href="all-agents.html" previewlistener="true">All Agents</a></li>
                    <li><a href="agent-profile.html" previewlistener="true">Agent Profile</a></li>
                    
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Property</span>
                    <span class="badge badge-sm badge-danger ms-3">New</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="add-property.html" previewlistener="true">Add Property</a></li>
                    <li><a href="property-list.html" previewlistener="true">Property List</a></li>
                    <li><a href="property-details.html" previewlistener="true">Property Details</a></li>
                    
                </ul>
            </li>
            
           
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-settings"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                   
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"> Menu</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{route('admin.menu.index')}}" previewlistener="true">Manage Menu</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"> slider</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{route('admin.slider.index')}}" previewlistener="true">Manage Slider</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"> Contents</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="add-agent.html" previewlistener="true">Manage Contents</a></li>
                            <li><a href="add-agent-wizard.html" previewlistener="true">Manage Menu</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    
        <div class="copyright">
            <p><strong>Archway Home</strong> ©  <span id="current-year"></span> All Rights Reserved</p>
            <p>by Archway Home</p>
        </div>
    </div>
</div>
<script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>