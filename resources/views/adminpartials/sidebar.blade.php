<div class="deznav">
    <div class="deznav-scroll mm-active">
        <ul class="metismenu mm-show" id="menu">
            <li class="mm-active">
                <a class="has-arrow ai-icon" href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="{{ route('admin.consultant.index') }}"  aria-expanded="false">
                    <i class="flaticon-381-user-5"></i>
                    <span class="nav-text">Consultant Form</span>
                 </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.inspection.index') }}"  aria-expanded="false">
                    <i class="flaticon-381-user-5"></i>
                    <span class="nav-text">Booking Inpsection</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.contact.index') }}"  aria-expanded="false">
                    <i class="flaticon-381-user-5"></i>
                    <span class="nav-text">Contact Form</span>
                </a>
            </li>
           
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.gallery.index') }}" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Gallery</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.project.index') }}" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Project</span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.post.index') }}" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Post</span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.service.index') }}" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Services</span>
                </a>
            </li>
            
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-settings"></i>
                <span class="nav-text">FAQs</span>
            </a>
            <ul aria-expanded="false" class="mm-collapse">
               
                <li>
                    <a href="{{ route('admin.faq.index') }}" aria-expanded="false"> View FAQs</a>
                </li>
                <li>
                    <a href="{{ route('admin.faq.submtForm') }}" aria-expanded="false">FAQs Submit Form</a>
                </li>
                
            </ul>
        </li>
            
            
           
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-settings"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                   
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"> Menu</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{route('admin.project.projectMenu')}}" previewlistener="true">Project Menu</a></li>
                            <li><a href="{{route('admin.menu.index')}}" previewlistener="true">Manage Menu</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"> slider</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{route('admin.slider.index')}}" previewlistener="true">Manage Slider</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="{{ route('admin.settings.content') }}" aria-expanded="false">Contents</a>
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