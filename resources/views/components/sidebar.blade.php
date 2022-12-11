<div class="main">
    <div class="sidebar">
        <div class="sidebar-content">
                <div class="menu-account">
                    <a href="{{ route('seller.profile') }}" class="account">
                        <div class="left">
                            <iconify-icon class="icon" icon="ic:baseline-account-circle"></iconify-icon>
                            <p>Account</p>
                        </div>
                        <p>></p>
                    </a>
                </div>
            
                <div class="menu-product">
                    <a href="{{ route('seller.products') }}" class="product">
                        <div class="left">
                            <iconify-icon class="icon" icon="ph:package-light"></iconify-icon>
                            <p>Product</p>
                        </div>
                        <p>></p>
                    </a>
                </div>
    
                <div class="menu-transaction">
                    <a href="{{ route('seller.upcoming') }}" class="transaction">
                        <div class="left">
                            <iconify-icon class="icon" icon="mdi:checkbox-marked-outline"></iconify-icon>
                            <p>Transaction</p>
                        </div>
                        <p>></p>
                </a>
                </div>
                
                <div class="menu-report">
                    <a href="{{ route('seller.report') }}" class="report">
                        <div class="left">
                            <iconify-icon class="icon" icon="ph:flag"></iconify-icon>
                            <p>Report</p>
                        </div>
                        <p>></p>
                    </a>
                </div>

                <div class="menu-setting">
                    <a href="{{ route('seller.setting-info') }}" class="setting">
                        <div class="left">
                            <iconify-icon class="icon" icon="ant-design:setting-outlined"></iconify-icon>
                            <p>Setting</p>
                        </div>
                        <p>></p>
                    </a>
                </div>
        </div>
        {{-- <div class="sidebar-footer">
            <img src="assets/ALM00016.JPG" alt="">
            <div class="text">
                <p>Kiagus Ganteng</p>
                <p>Kgs.farhan@gmail.com</p>
            </div>
            <iconify-icon class="icon" icon="tabler:logout"></iconify-icon>
        </div> --}}
    </div>
    