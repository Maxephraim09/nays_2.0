<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Welcome</h5>
                <p class="card-text">Welcome back, <?php echo $user->first_name ?? 'User'; ?>!</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Member Status</h5>
                <p class="card-text">You are logged in as a valid member.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Quick Links</h5>
                <p class="card-text">
                    <a href="<?php echo url('profile'); ?>" class="text-white">View Profile</a>
                </p>
            </div>
        </div>
    </div>
</div>