<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>YN Trading || Admin Dashboard</title>
  
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif !important;
            background-color: #f8fafc !important;
            color: #1e293b !important;
        }

        /* Sidebar Styling */
        .bg-gradient-info,
        .bg-gradient-primary,
        .sidebar-dark {
            background: #0f172a !important;
            background-image: linear-gradient(180deg, #0f172a 0%, #1e293b 100%) !important;
        }
        .sidebar-dark .sidebar-brand {
            color: #ffffff !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px !important;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 1.5rem 1rem !important;
        }
        .sidebar-dark .nav-item .nav-link {
            color: #94a3b8 !important;
            font-weight: 500 !important;
            padding: 0.85rem 1rem !important;
            transition: all 0.2s ease !important;
        }
        .sidebar-dark .nav-item .nav-link i {
            color: #64748b !important;
            transition: color 0.2s ease !important;
        }
        .sidebar-dark .nav-item:hover .nav-link,
        .sidebar-dark .nav-item.active .nav-link {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.06) !important;
        }
        .sidebar-dark .nav-item.active .nav-link {
            border-left: 4px solid #38bdf8 !important;
        }
        .sidebar-dark .nav-item:hover .nav-link i,
        .sidebar-dark .nav-item.active .nav-link i {
            color: #38bdf8 !important;
        }
        .sidebar-heading {
            color: #475569 !important;
            font-size: 0.7rem !important;
            font-weight: 700 !important;
            letter-spacing: 1px !important;
            text-transform: uppercase !important;
            margin-top: 1rem !important;
        }
        .sidebar-divider {
            border-top: 1px solid rgba(255,255,255,0.06) !important;
        }
        .sidebar .collapse-inner {
            background: #1e293b !important;
            border: 1px solid rgba(255,255,255,0.08) !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3) !important;
        }
        .sidebar .collapse-inner .collapse-item {
            color: #94a3b8 !important;
            font-weight: 500 !important;
        }
        .sidebar .collapse-inner .collapse-item:hover,
        .sidebar .collapse-inner .collapse-item.active {
            color: #ffffff !important;
            background: rgba(255,255,255,0.08) !important;
        }
        .sidebar .collapse-inner .collapse-header {
            color: #64748b !important;
        }

        /* Topbar Styling */
        .topbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e2e8f0 !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05) !important;
            height: 4.25rem !important;
        }
        .topbar .nav-item .nav-link {
            color: #475569 !important;
        }
        .topbar .nav-item .nav-link:hover {
            color: #0f172a !important;
        }

        /* Cards & Metric Panels */
        .card {
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05) !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease !important;
        }
        .card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.04) !important;
        }
        .card-header {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e2e8f0 !important;
            font-weight: 600 !important;
            color: #0f172a !important;
            border-top-left-radius: 10px !important;
            border-top-right-radius: 10px !important;
        }

        /* Buttons & Badges */
        .btn-primary, .btn-info {
            background-color: #0f172a !important;
            border-color: #0f172a !important;
            color: #ffffff !important;
            font-weight: 500 !important;
            border-radius: 6px !important;
            padding: 0.5rem 1.25rem !important;
        }
        .btn-primary:hover, .btn-info:hover {
            background-color: #1e293b !important;
            border-color: #1e293b !important;
        }
        .btn-success {
            background-color: #10b981 !important;
            border-color: #10b981 !important;
            border-radius: 6px !important;
        }
        .btn-danger {
            background-color: #ef4444 !important;
            border-color: #ef4444 !important;
            border-radius: 6px !important;
        }

        /* DataTables & Tables Styling */
        .table {
            color: #334155 !important;
        }
        .table thead th {
            background-color: #f8fafc !important;
            color: #475569 !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            font-size: 0.75rem !important;
            letter-spacing: 0.5px !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }
        .table td {
            vertical-align: middle !important;
            border-top: 1px solid #f1f5f9 !important;
        }
        .badge {
            font-weight: 600 !important;
            padding: 0.35em 0.65em !important;
            border-radius: 4px !important;
        }

        /* Footer */
        footer.sticky-footer {
            background: #ffffff !important;
            border-top: 1px solid #e2e8f0 !important;
        }
    </style>
    @stack('styles')
  
</head>