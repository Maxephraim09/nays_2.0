// ========================================
// PROJECT NAYS 2.0 - MAIN JAVASCRIPT
// ========================================

$(document).ready(function() {
    
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
    
    // Confirm delete actions
    $('.delete-confirm').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
    
    // Character counter for textareas
    $('textarea[data-maxlength]').on('keyup', function() {
        var maxLength = $(this).data('maxlength');
        var currentLength = $(this).val().length;
        var remaining = maxLength - currentLength;
        
        var counter = $(this).siblings('.character-counter');
        if (counter.length === 0) {
            counter = $('<div class="character-counter text-muted small"></div>');
            $(this).after(counter);
        }
        
        counter.text(remaining + ' characters remaining');
        
        if (remaining < 0) {
            counter.addClass('text-danger');
        } else {
            counter.removeClass('text-danger');
        }
    });
    
    // Password strength meter
    $('#password').on('keyup', function() {
        var password = $(this).val();
        var strength = 0;
        
        if (password.length >= 8) strength += 1;
        if (password.match(/[a-z]+/)) strength += 1;
        if (password.match(/[A-Z]+/)) strength += 1;
        if (password.match(/[0-9]+/)) strength += 1;
        if (password.match(/[$@#&!]+/)) strength += 1;
        
        var meter = $('#password-strength');
        if (meter.length === 0) {
            meter = $('<div id="password-strength" class="progress mt-2" style="height: 5px;"></div>');
            $(this).after(meter);
        }
        
        var width = (strength / 5) * 100;
        var color = '#dc3545';
        
        if (strength >= 4) color = '#28a745';
        else if (strength >= 3) color = '#ffc107';
        
        meter.html('<div class="progress-bar" style="width: ' + width + '%; background-color: ' + color + ';"></div>');
    });
    
    // Toggle sidebar on mobile
    $('#sidebarToggle').on('click', function() {
        $('.sidebar').toggleClass('show');
    });
    
    // Infinite scroll for forum topics
    var loading = false;
    $(window).on('scroll', function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            if (!loading && $('#load-more').length) {
                loading = true;
                var url = $('#load-more').data('url');
                var page = $('#load-more').data('page');
                
                $.ajax({
                    url: url,
                    data: { page: page },
                    success: function(data) {
                        if (data.html) {
                            $('#topics-list').append(data.html);
                            $('#load-more').data('page', page + 1);
                            if (!data.hasMore) {
                                $('#load-more').remove();
                            }
                        }
                        loading = false;
                    },
                    error: function() {
                        loading = false;
                    }
                });
            }
        }
    });
    
    // Live search
    var searchTimeout;
    $('#search-input').on('keyup', function() {
        clearTimeout(searchTimeout);
        var query = $(this).val();
        
        searchTimeout = setTimeout(function() {
            if (query.length >= 3) {
                $.ajax({
                    url: '/api/search',
                    data: { q: query },
                    success: function(data) {
                        $('#search-results').html(data.html).show();
                    }
                });
            } else {
                $('#search-results').hide();
            }
        }, 300);
    });
    
    // Close search results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#search-input, #search-results').length) {
            $('#search-results').hide();
        }
    });
    
});

// Toastr configuration
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    showDuration: 300,
    hideDuration: 1000,
    timeOut: 5000,
    extendedTimeOut: 1000,
    showEasing: 'swing',
    hideEasing: 'linear',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut'
};

// AJAX setup for CSRF token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});