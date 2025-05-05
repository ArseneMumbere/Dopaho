@push('styles')
<style>
    /* Styles du bouton premium */
    .btn-warning {
        background: linear-gradient(45deg, #FFD700, #FFA500);
        border: none;
        color: #000;
        font-weight: 600;
        padding: 0.8rem;
        width: 100%;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        color: #000;
    }

    .btn-warning .fas {
        color: #000;
    }

    .premium-price {
        font-size: 0.8rem;
        opacity: 0.8;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .sidebar {
        background: #2c3e50;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .sidebar .navbar-brand {
        color: white;
        padding: 1.5rem;
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-link {
        color: white !important;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin: 0.3rem 1rem;
        transition: all 0.3s ease;
        font-weight: 500;
        letter-spacing: 0.3px;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        z-index: -1;
    }

    .nav-link:hover::before,
    .nav-link.active::before {
        transform: translateX(0);
    }

    .nav-link:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .nav-link.active {
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        font-weight: 600;
    }

    .nav-link i {
        width: 24px;
        text-align: center;
        margin-right: 12px;
        font-size: 1.1em;
        transition: transform 0.3s ease;
    }

    .nav-link:hover i {
        transform: scale(1.1);
    }

    .user-info {
        padding: 1.5rem;
        color: white;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .user-avatar img {
        border: 3px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .user-name {
        color: white;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    /* Common card styles */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.97);
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .section-title {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
    }

    .section-title h5 {
        color: #2c3e50;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .section-title p {
        color: #6c757d;
        font-size: 0.9rem;
        margin: 0;
    }

    .card-header {
        background: linear-gradient(45deg, #1a73e8, #289cf5);
        color: white;
        border: none;
        padding: 1rem 1.5rem;
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .card-body {
        padding: 2rem;
    }

    /* Form styles */
    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-label i {
        margin-right: 0.5rem;
        color: #1a73e8;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #e0e0e0;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:hover {
        border-color: #1a73e8;
        background: white;
    }

    .form-control:focus {
        border-color: #1a73e8;
        box-shadow: 0 0 0 0.2rem rgba(26, 115, 232, 0.25);
    }

    .btn {
        padding: 0.85rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        letter-spacing: 0.3px;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(-100%) rotate(45deg);
        transition: transform 0.6s ease;
    }

    .btn:hover::before {
        transform: translateX(100%) rotate(45deg);
    }

    .btn-primary {
        background: linear-gradient(45deg, #1a73e8, #289cf5);
        border: none;
        box-shadow: 0 4px 15px rgba(26, 115, 232, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 115, 232, 0.4);
    }

    .btn-primary:active {
        transform: translateY(1px);
        box-shadow: 0 2px 10px rgba(26, 115, 232, 0.3);
    }

    /* Page header styles */
    .page-header {
        margin-bottom: 2rem;
    }

    .page-header h1 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 2.5rem;
        font-weight: 600;
    }

    .page-header .lead {
        color: #7f8c8d;
        font-size: 1.2rem;
    }

    /* Card styles */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
        background: white;
    }

    .card-title {
        color: #2c3e50;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .card-title i {
        color: #1a73e8;
        margin-right: 0.5rem;
    }

    /* Appointment styles */
    .appointment-list {
        max-height: 600px;
        overflow-y: auto;
    }

    .appointment-item {
        padding: 1rem;
        border-radius: 8px;
        background: #f8f9fa;
        margin-bottom: 1rem;
        border-left: 4px solid;
        transition: all 0.3s ease;
    }

    .appointment-item:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .appointment-item.upcoming {
        border-left-color: #2ecc71;
        background: #f0fff4;
    }

    .appointment-item.past {
        border-left-color: #95a5a6;
        background: #f8f9fa;
    }

    .appointment-date {
        font-size: 0.9rem;
        color: #7f8c8d;
        margin-bottom: 0.5rem;
    }

    .appointment-status {
        display: inline-block;
        font-size: 0.8rem;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-weight: 500;
    }

    .status-upcoming {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .status-completed {
        background-color: #eceff1;
        color: #546e7a;
    }

    /* Form styles */
    .form-label {
        font-weight: 500;
        color: #2c3e50;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #1a73e8;
        box-shadow: 0 0 0 0.2rem rgba(26, 115, 232, 0.1);
    }

    /* Profile photo styles */
    .profile-photo {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .profile-photo:hover {
        transform: scale(1.05);
    }

    .medical-info {
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 12px;
    }

    .info-item {
        margin-bottom: 1rem;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s;
    }

    .info-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .info-item:last-child {
        margin-bottom: 0;
    }

    .info-item label {
        display: block;
        color: #666;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .info-item p {
        color: #2c3e50;
        font-size: 1rem;
        font-weight: 500;
        margin: 0;
    }

    /* Notification styles */
    .notification-list {
        background: white;
        border-radius: 15px;
        overflow: hidden;
    }

    .notification-item {
        padding: 1.25rem;
        border-bottom: 1px solid #f8f9fa;
        transition: background-color 0.2s;
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-item:hover {
        background-color: #f8f9fa;
    }

    .notification-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(45deg, #1a73e8, #289cf5);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .notification-content h6 {
        color: #2c3e50;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .notification-content p {
        font-size: 0.875rem;
        margin-bottom: 0;
        color: #666;
    }

    .custom-switch {
        padding-left: 2.25rem;
    }

    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #1a73e8;
        border-color: #1a73e8;
    }

    .custom-control-label {
        cursor: pointer;
        padding-top: 2px;
        user-select: none;
    }

    .custom-control-label::before {
        background-color: #e9ecef;
        border: 1px solid #adb5bd;
        transition: all 0.2s ease;
    }

    /* Loading animation */
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #1a73e8;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush
