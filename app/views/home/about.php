<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4"><?php echo $title; ?></h1>
            
            <?php if ($isLoggedIn): ?>
                <div class="alert alert-info">You are logged in as a member!</div>
            <?php endif; ?>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Our Mission</h5>
                    <p class="card-text">To unite Yungur students worldwide, promote academic excellence, preserve our cultural heritage, and develop future leaders.</p>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Our Vision</h5>
                    <p class="card-text">A global community of empowered Yungur students and alumni driving positive change in their communities and beyond.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Our Values</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Unity and Brotherhood</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Academic Excellence</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Cultural Preservation</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Leadership Development</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Community Service</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>