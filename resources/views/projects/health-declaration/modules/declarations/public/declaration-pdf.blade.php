@extends('projects.health-declaration.layouts.pdf-print.template')
<style type="text/css">

    @font-face {
        font-family: "solaiman-lipi";
        src: url("fonts/solaiman-lipi.ttf");
    }
    .skin-blue .main-header .navbar {background-color: #3c8dbc}
    .skin-blue .main-header .navbar .nav > li > a {color: #fff}
    .skin-blue .main-header .navbar .nav > li > a:hover, .skin-blue .main-header .navbar .nav > li > a:active, .skin-blue .main-header .navbar .nav > li > a:focus, .skin-blue .main-header .navbar .nav .open > a, .skin-blue .main-header .navbar .nav .open > a:hover, .skin-blue .main-header .navbar .nav .open > a:focus, .skin-blue .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-blue .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-blue .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-blue .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-blue .main-header .navbar .sidebar-toggle:hover {background-color: #367fa9}
    @media (max-width: 767px) {
        .skin-blue .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-blue .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-blue .main-header .navbar .dropdown-menu li a:hover {background: #367fa9}
    }
    .skin-blue .main-header .logo {background-color: #367fa9;color: #fff;border-bottom: 0 solid transparent}
    .skin-blue .main-header .logo:hover {background-color: #357ca5}
    .skin-blue .main-header li.user-header {background-color: #3c8dbc}
    .skin-blue .content-header {background: transparent}
    .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {background-color: #222d32}
    .skin-blue .user-panel > .info, .skin-blue .user-panel > .info > a {color: #fff}
    .skin-blue .sidebar-menu > li.header {color: #4b646f;background: #1a2226}
    .skin-blue .sidebar-menu > li > a {border-left: 3px solid transparent}
    .skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {color: #fff;background: #1e282c;border-left-color: #3c8dbc}
    .skin-blue .sidebar-menu > li > .treeview-menu {margin: 0 1px;background: #2c3b41}
    .skin-blue .sidebar a {color: #b8c7ce}
    .skin-blue .sidebar a:hover {text-decoration: none}
    .skin-blue .treeview-menu > li > a {color: #8aa4af}
    .skin-blue .treeview-menu > li.active > a, .skin-blue .treeview-menu > li > a:hover {color: #fff}
    .skin-blue .sidebar-form {border-radius: 3px;border: 1px solid #374850;margin: 10px 10px}
    .skin-blue .sidebar-form input[type="text"], .skin-blue .sidebar-form .btn {box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px}
    .skin-blue .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-blue .sidebar-form input[type="text"]:focus, .skin-blue .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-blue .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-blue .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    .skin-blue.layout-top-nav .main-header > .logo {background-color: #3c8dbc;color: #fff;border-bottom: 0 solid transparent}
    .skin-blue.layout-top-nav .main-header > .logo:hover {background-color: #3b8ab8}
    .skin-blue-light .main-header .navbar {background-color: #3c8dbc}
    .skin-blue-light .main-header .navbar .nav > li > a {color: #fff}
    .skin-blue-light .main-header .navbar .nav > li > a:hover, .skin-blue-light .main-header .navbar .nav > li > a:active, .skin-blue-light .main-header .navbar .nav > li > a:focus, .skin-blue-light .main-header .navbar .nav .open > a, .skin-blue-light .main-header .navbar .nav .open > a:hover, .skin-blue-light .main-header .navbar .nav .open > a:focus, .skin-blue-light .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-blue-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-blue-light .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-blue-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-blue-light .main-header .navbar .sidebar-toggle:hover {background-color: #367fa9}
    @media (max-width: 767px) {
        .skin-blue-light .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-blue-light .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-blue-light .main-header .navbar .dropdown-menu li a:hover {background: #367fa9}
    }
    .skin-blue-light .main-header .logo {background-color: #3c8dbc;color: #fff;border-bottom: 0 solid transparent}
    .skin-blue-light .main-header .logo:hover {background-color: #3b8ab8}
    .skin-blue-light .main-header li.user-header {background-color: #3c8dbc}
    .skin-blue-light .content-header {background: transparent}
    .skin-blue-light .wrapper, .skin-blue-light .main-sidebar, .skin-blue-light .left-side {background-color: #f9fafc}
    .skin-blue-light .content-wrapper, .skin-blue-light .main-footer {border-left: 1px solid #d2d6de}
    .skin-blue-light .user-panel > .info, .skin-blue-light .user-panel > .info > a {color: #444}
    .skin-blue-light .sidebar-menu > li {-webkit-transition: border-left-color .3s ease;-o-transition: border-left-color .3s ease;transition: border-left-color .3s ease}
    .skin-blue-light .sidebar-menu > li.header {color: #848484;background: #f9fafc}
    .skin-blue-light .sidebar-menu > li > a {border-left: 3px solid transparent;font-weight: 600}
    .skin-blue-light .sidebar-menu > li:hover > a, .skin-blue-light .sidebar-menu > li.active > a {color: #000;background: #f4f4f5}
    .skin-blue-light .sidebar-menu > li.active {border-left-color: #3c8dbc}
    .skin-blue-light .sidebar-menu > li.active > a {font-weight: 600}
    .skin-blue-light .sidebar-menu > li > .treeview-menu {background: #f4f4f5}
    .skin-blue-light .sidebar a {color: #444}
    .skin-blue-light .sidebar a:hover {text-decoration: none}
    .skin-blue-light .treeview-menu > li > a {color: #777}
    .skin-blue-light .treeview-menu > li.active > a, .skin-blue-light .treeview-menu > li > a:hover {color: #000}
    .skin-blue-light .treeview-menu > li.active > a {font-weight: 600}
    .skin-blue-light .sidebar-form {border-radius: 3px;border: 1px solid #d2d6de;margin: 10px 10px}
    .skin-blue-light .sidebar-form input[type="text"], .skin-blue-light .sidebar-form .btn {box-shadow: none;background-color: #fff;border: 1px solid transparent;height: 35px}
    .skin-blue-light .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-blue-light .sidebar-form input[type="text"]:focus, .skin-blue-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-blue-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-blue-light .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    @media (min-width: 768px) {
        .skin-blue-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {border-left: 1px solid #d2d6de}
    }
    .skin-blue-light .main-footer {border-top-color: #d2d6de}
    .skin-blue.layout-top-nav .main-header > .logo {background-color: #3c8dbc;color: #fff;border-bottom: 0 solid transparent}
    .skin-blue.layout-top-nav .main-header > .logo:hover {background-color: #3b8ab8}
    .skin-black .main-header {-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05)}
    .skin-black .main-header .navbar-toggle {color: #333}
    .skin-black .main-header .navbar-brand {color: #333;border-right: 1px solid #eee}
    .skin-black .main-header .navbar {background-color: #fff}
    .skin-black .main-header .navbar .nav > li > a {color: #333}
    .skin-black .main-header .navbar .nav > li > a:hover, .skin-black .main-header .navbar .nav > li > a:active, .skin-black .main-header .navbar .nav > li > a:focus, .skin-black .main-header .navbar .nav .open > a, .skin-black .main-header .navbar .nav .open > a:hover, .skin-black .main-header .navbar .nav .open > a:focus, .skin-black .main-header .navbar .nav > .active > a {background: #fff;color: #999}
    .skin-black .main-header .navbar .sidebar-toggle {color: #333}
    .skin-black .main-header .navbar .sidebar-toggle:hover {color: #999;background: #fff}
    .skin-black .main-header .navbar > .sidebar-toggle {color: #333;border-right: 1px solid #eee}
    .skin-black .main-header .navbar .navbar-nav > li > a {border-right: 1px solid #eee}
    .skin-black .main-header .navbar .navbar-custom-menu .navbar-nav > li > a, .skin-black .main-header .navbar .navbar-right > li > a {border-left: 1px solid #eee;border-right-width: 0}
    .skin-black .main-header > .logo {background-color: #fff;color: #333;border-bottom: 0 solid transparent;border-right: 1px solid #eee}
    .skin-black .main-header > .logo:hover {background-color: #fcfcfc}
    @media (max-width: 767px) {
        .skin-black .main-header > .logo {background-color: #222;color: #fff;border-bottom: 0 solid transparent;border-right: none}
        .skin-black .main-header > .logo:hover {background-color: #1f1f1f}
    }
    .skin-black .main-header li.user-header {background-color: #222}
    .skin-black .content-header {background: transparent;box-shadow: none}
    .skin-black .wrapper, .skin-black .main-sidebar, .skin-black .left-side {background-color: #222d32}
    .skin-black .user-panel > .info, .skin-black .user-panel > .info > a {color: #fff}
    .skin-black .sidebar-menu > li.header {color: #4b646f;background: #1a2226}
    .skin-black .sidebar-menu > li > a {border-left: 3px solid transparent}
    .skin-black .sidebar-menu > li:hover > a, .skin-black .sidebar-menu > li.active > a {color: #fff;background: #1e282c;border-left-color: #fff}
    .skin-black .sidebar-menu > li > .treeview-menu {margin: 0 1px;background: #2c3b41}
    .skin-black .sidebar a {color: #b8c7ce}
    .skin-black .sidebar a:hover {text-decoration: none}
    .skin-black .treeview-menu > li > a {color: #8aa4af}
    .skin-black .treeview-menu > li.active > a, .skin-black .treeview-menu > li > a:hover {color: #fff}
    .skin-black .sidebar-form {border-radius: 3px;border: 1px solid #374850;margin: 10px 10px}
    .skin-black .sidebar-form input[type="text"], .skin-black .sidebar-form .btn {box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px}
    .skin-black .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-black .sidebar-form input[type="text"]:focus, .skin-black .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-black .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-black .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    .skin-black .pace .pace-progress {background: #222}
    .skin-black .pace .pace-activity {border-top-color: #222;border-left-color: #222}
    .skin-black-light .main-header {-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05)}
    .skin-black-light .main-header .navbar-toggle {color: #333}
    .skin-black-light .main-header .navbar-brand {color: #333;border-right: 1px solid #eee}
    .skin-black-light .main-header .navbar {background-color: #fff}
    .skin-black-light .main-header .navbar .nav > li > a {color: #333}
    .skin-black-light .main-header .navbar .nav > li > a:hover, .skin-black-light .main-header .navbar .nav > li > a:active, .skin-black-light .main-header .navbar .nav > li > a:focus, .skin-black-light .main-header .navbar .nav .open > a, .skin-black-light .main-header .navbar .nav .open > a:hover, .skin-black-light .main-header .navbar .nav .open > a:focus, .skin-black-light .main-header .navbar .nav > .active > a {background: #fff;color: #999}
    .skin-black-light .main-header .navbar .sidebar-toggle {color: #333}
    .skin-black-light .main-header .navbar .sidebar-toggle:hover {color: #999;background: #fff}
    .skin-black-light .main-header .navbar > .sidebar-toggle {color: #333;border-right: 1px solid #eee}
    .skin-black-light .main-header .navbar .navbar-nav > li > a {border-right: 1px solid #eee}
    .skin-black-light .main-header .navbar .navbar-custom-menu .navbar-nav > li > a, .skin-black-light .main-header .navbar .navbar-right > li > a {border-left: 1px solid #eee;border-right-width: 0}
    .skin-black-light .main-header > .logo {background-color: #fff;color: #333;border-bottom: 0 solid transparent;border-right: 1px solid #eee}
    .skin-black-light .main-header > .logo:hover {background-color: #fcfcfc}
    @media (max-width: 767px) {
        .skin-black-light .main-header > .logo {background-color: #222;color: #fff;border-bottom: 0 solid transparent;border-right: none}
        .skin-black-light .main-header > .logo:hover {background-color: #1f1f1f}
    }
    .skin-black-light .main-header li.user-header {background-color: #222}
    .skin-black-light .content-header {background: transparent;box-shadow: none}
    .skin-black-light .wrapper, .skin-black-light .main-sidebar, .skin-black-light .left-side {background-color: #f9fafc}
    .skin-black-light .content-wrapper, .skin-black-light .main-footer {border-left: 1px solid #d2d6de}
    .skin-black-light .user-panel > .info, .skin-black-light .user-panel > .info > a {color: #444}
    .skin-black-light .sidebar-menu > li {-webkit-transition: border-left-color .3s ease;-o-transition: border-left-color .3s ease;transition: border-left-color .3s ease}
    .skin-black-light .sidebar-menu > li.header {color: #848484;background: #f9fafc}
    .skin-black-light .sidebar-menu > li > a {border-left: 3px solid transparent;font-weight: 600}
    .skin-black-light .sidebar-menu > li:hover > a, .skin-black-light .sidebar-menu > li.active > a {color: #000;background: #f4f4f5}
    .skin-black-light .sidebar-menu > li.active {border-left-color: #fff}
    .skin-black-light .sidebar-menu > li.active > a {font-weight: 600}
    .skin-black-light .sidebar-menu > li > .treeview-menu {background: #f4f4f5}
    .skin-black-light .sidebar a {color: #444}
    .skin-black-light .sidebar a:hover {text-decoration: none}
    .skin-black-light .treeview-menu > li > a {color: #777}
    .skin-black-light .treeview-menu > li.active > a, .skin-black-light .treeview-menu > li > a:hover {color: #000}
    .skin-black-light .treeview-menu > li.active > a {font-weight: 600}
    .skin-black-light .sidebar-form {border-radius: 3px;border: 1px solid #d2d6de;margin: 10px 10px}
    .skin-black-light .sidebar-form input[type="text"], .skin-black-light .sidebar-form .btn {box-shadow: none;background-color: #fff;border: 1px solid transparent;height: 35px}
    .skin-black-light .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-black-light .sidebar-form input[type="text"]:focus, .skin-black-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-black-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-black-light .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    @media (min-width: 768px) {
        .skin-black-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {border-left: 1px solid #d2d6de}
    }
    .skin-green .main-header .navbar {background-color: #00a65a}
    .skin-green .main-header .navbar .nav > li > a {color: #fff}
    .skin-green .main-header .navbar .nav > li > a:hover, .skin-green .main-header .navbar .nav > li > a:active, .skin-green .main-header .navbar .nav > li > a:focus, .skin-green .main-header .navbar .nav .open > a, .skin-green .main-header .navbar .nav .open > a:hover, .skin-green .main-header .navbar .nav .open > a:focus, .skin-green .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-green .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-green .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-green .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-green .main-header .navbar .sidebar-toggle:hover {background-color: #008d4c}
    @media (max-width: 767px) {
        .skin-green .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-green .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-green .main-header .navbar .dropdown-menu li a:hover {background: #008d4c}
    }
    .skin-green .main-header .logo {background-color: #008d4c;color: #fff;border-bottom: 0 solid transparent}
    .skin-green .main-header .logo:hover {background-color: #008749}
    .skin-green .main-header li.user-header {background-color: #00a65a}
    .skin-green .content-header {background: transparent}
    .skin-green .wrapper, .skin-green .main-sidebar, .skin-green .left-side {background-color: #222d32}
    .skin-green .user-panel > .info, .skin-green .user-panel > .info > a {color: #fff}
    .skin-green .sidebar-menu > li.header {color: #4b646f;background: #1a2226}
    .skin-green .sidebar-menu > li > a {border-left: 3px solid transparent}
    .skin-green .sidebar-menu > li:hover > a, .skin-green .sidebar-menu > li.active > a {color: #fff;background: #1e282c;border-left-color: #00a65a}
    .skin-green .sidebar-menu > li > .treeview-menu {margin: 0 1px;background: #2c3b41}
    .skin-green .sidebar a {color: #b8c7ce}
    .skin-green .sidebar a:hover {text-decoration: none}
    .skin-green .treeview-menu > li > a {color: #8aa4af}
    .skin-green .treeview-menu > li.active > a, .skin-green .treeview-menu > li > a:hover {color: #fff}
    .skin-green .sidebar-form {border-radius: 3px;border: 1px solid #374850;margin: 10px 10px}
    .skin-green .sidebar-form input[type="text"], .skin-green .sidebar-form .btn {box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px}
    .skin-green .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-green .sidebar-form input[type="text"]:focus, .skin-green .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-green .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-green .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    .skin-green-light .main-header .navbar {background-color: #00a65a}
    .skin-green-light .main-header .navbar .nav > li > a {color: #fff}
    .skin-green-light .main-header .navbar .nav > li > a:hover, .skin-green-light .main-header .navbar .nav > li > a:active, .skin-green-light .main-header .navbar .nav > li > a:focus, .skin-green-light .main-header .navbar .nav .open > a, .skin-green-light .main-header .navbar .nav .open > a:hover, .skin-green-light .main-header .navbar .nav .open > a:focus, .skin-green-light .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-green-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-green-light .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-green-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-green-light .main-header .navbar .sidebar-toggle:hover {background-color: #008d4c}
    @media (max-width: 767px) {
        .skin-green-light .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-green-light .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-green-light .main-header .navbar .dropdown-menu li a:hover {background: #008d4c}
    }
    .skin-green-light .main-header .logo {background-color: #00a65a;color: #fff;border-bottom: 0 solid transparent}
    .skin-green-light .main-header .logo:hover {background-color: #00a157}
    .skin-green-light .main-header li.user-header {background-color: #00a65a}
    .skin-green-light .content-header {background: transparent}
    .skin-green-light .wrapper, .skin-green-light .main-sidebar, .skin-green-light .left-side {background-color: #f9fafc}
    .skin-green-light .content-wrapper, .skin-green-light .main-footer {border-left: 1px solid #d2d6de}
    .skin-green-light .user-panel > .info, .skin-green-light .user-panel > .info > a {color: #444}
    .skin-green-light .sidebar-menu > li {-webkit-transition: border-left-color .3s ease;-o-transition: border-left-color .3s ease;transition: border-left-color .3s ease}
    .skin-green-light .sidebar-menu > li.header {color: #848484;background: #f9fafc}
    .skin-green-light .sidebar-menu > li > a {border-left: 3px solid transparent;font-weight: 600}
    .skin-green-light .sidebar-menu > li:hover > a, .skin-green-light .sidebar-menu > li.active > a {color: #000;background: #f4f4f5}
    .skin-green-light .sidebar-menu > li.active {border-left-color: #00a65a}
    .skin-green-light .sidebar-menu > li.active > a {font-weight: 600}
    .skin-green-light .sidebar-menu > li > .treeview-menu {background: #f4f4f5}
    .skin-green-light .sidebar a {color: #444}
    .skin-green-light .sidebar a:hover {text-decoration: none}
    .skin-green-light .treeview-menu > li > a {color: #777}
    .skin-green-light .treeview-menu > li.active > a, .skin-green-light .treeview-menu > li > a:hover {color: #000}
    .skin-green-light .treeview-menu > li.active > a {font-weight: 600}
    .skin-green-light .sidebar-form {border-radius: 3px;border: 1px solid #d2d6de;margin: 10px 10px}
    .skin-green-light .sidebar-form input[type="text"], .skin-green-light .sidebar-form .btn {box-shadow: none;background-color: #fff;border: 1px solid transparent;height: 35px}
    .skin-green-light .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-green-light .sidebar-form input[type="text"]:focus, .skin-green-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-green-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-green-light .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    @media (min-width: 768px) {
        .skin-green-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {border-left: 1px solid #d2d6de}
    }
    .skin-red .main-header .navbar {background-color: #dd4b39}
    .skin-red .main-header .navbar .nav > li > a {color: #fff}
    .skin-red .main-header .navbar .nav > li > a:hover, .skin-red .main-header .navbar .nav > li > a:active, .skin-red .main-header .navbar .nav > li > a:focus, .skin-red .main-header .navbar .nav .open > a, .skin-red .main-header .navbar .nav .open > a:hover, .skin-red .main-header .navbar .nav .open > a:focus, .skin-red .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-red .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-red .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-red .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-red .main-header .navbar .sidebar-toggle:hover {background-color: #d73925}
    @media (max-width: 767px) {
        .skin-red .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-red .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-red .main-header .navbar .dropdown-menu li a:hover {background: #d73925}
    }
    .skin-red .main-header .logo {background-color: #d73925;color: #fff;border-bottom: 0 solid transparent}
    .skin-red .main-header .logo:hover {background-color: #d33724}
    .skin-red .main-header li.user-header {background-color: #dd4b39}
    .skin-red .content-header {background: transparent}
    .skin-red .wrapper, .skin-red .main-sidebar, .skin-red .left-side {background-color: #222d32}
    .skin-red .user-panel > .info, .skin-red .user-panel > .info > a {color: #fff}
    .skin-red .sidebar-menu > li.header {color: #4b646f;background: #1a2226}
    .skin-red .sidebar-menu > li > a {border-left: 3px solid transparent}
    .skin-red .sidebar-menu > li:hover > a, .skin-red .sidebar-menu > li.active > a {color: #fff;background: #1e282c;border-left-color: #dd4b39}
    .skin-red .sidebar-menu > li > .treeview-menu {margin: 0 1px;background: #2c3b41}
    .skin-red .sidebar a {color: #b8c7ce}
    .skin-red .sidebar a:hover {text-decoration: none}
    .skin-red .treeview-menu > li > a {color: #8aa4af}
    .skin-red .treeview-menu > li.active > a, .skin-red .treeview-menu > li > a:hover {color: #fff}
    .skin-red .sidebar-form {border-radius: 3px;border: 1px solid #374850;margin: 10px 10px}
    .skin-red .sidebar-form input[type="text"], .skin-red .sidebar-form .btn {box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px}
    .skin-red .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-red .sidebar-form input[type="text"]:focus, .skin-red .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-red .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-red .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    .skin-red-light .main-header .navbar {background-color: #dd4b39}
    .skin-red-light .main-header .navbar .nav > li > a {color: #fff}
    .skin-red-light .main-header .navbar .nav > li > a:hover, .skin-red-light .main-header .navbar .nav > li > a:active, .skin-red-light .main-header .navbar .nav > li > a:focus, .skin-red-light .main-header .navbar .nav .open > a, .skin-red-light .main-header .navbar .nav .open > a:hover, .skin-red-light .main-header .navbar .nav .open > a:focus, .skin-red-light .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-red-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-red-light .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-red-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-red-light .main-header .navbar .sidebar-toggle:hover {background-color: #d73925}
    @media (max-width: 767px) {
        .skin-red-light .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-red-light .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-red-light .main-header .navbar .dropdown-menu li a:hover {background: #d73925}
    }
    .skin-red-light .main-header .logo {background-color: #dd4b39;color: #fff;border-bottom: 0 solid transparent}
    .skin-red-light .main-header .logo:hover {background-color: #dc4735}
    .skin-red-light .main-header li.user-header {background-color: #dd4b39}
    .skin-red-light .content-header {background: transparent}
    .skin-red-light .wrapper, .skin-red-light .main-sidebar, .skin-red-light .left-side {background-color: #f9fafc}
    .skin-red-light .content-wrapper, .skin-red-light .main-footer {border-left: 1px solid #d2d6de}
    .skin-red-light .user-panel > .info, .skin-red-light .user-panel > .info > a {color: #444}
    .skin-red-light .sidebar-menu > li {-webkit-transition: border-left-color .3s ease;-o-transition: border-left-color .3s ease;transition: border-left-color .3s ease}
    .skin-red-light .sidebar-menu > li.header {color: #848484;background: #f9fafc}
    .skin-red-light .sidebar-menu > li > a {border-left: 3px solid transparent;font-weight: 600}
    .skin-red-light .sidebar-menu > li:hover > a, .skin-red-light .sidebar-menu > li.active > a {color: #000;background: #f4f4f5}
    .skin-red-light .sidebar-menu > li.active {border-left-color: #dd4b39}
    .skin-red-light .sidebar-menu > li.active > a {font-weight: 600}
    .skin-red-light .sidebar-menu > li > .treeview-menu {background: #f4f4f5}
    .skin-red-light .sidebar a {color: #444}
    .skin-red-light .sidebar a:hover {text-decoration: none}
    .skin-red-light .treeview-menu > li > a {color: #777}
    .skin-red-light .treeview-menu > li.active > a, .skin-red-light .treeview-menu > li > a:hover {color: #000}
    .skin-red-light .treeview-menu > li.active > a {font-weight: 600}
    .skin-red-light .sidebar-form {border-radius: 3px;border: 1px solid #d2d6de;margin: 10px 10px}
    .skin-red-light .sidebar-form input[type="text"], .skin-red-light .sidebar-form .btn {box-shadow: none;background-color: #fff;border: 1px solid transparent;height: 35px}
    .skin-red-light .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-red-light .sidebar-form input[type="text"]:focus, .skin-red-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-red-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-red-light .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    @media (min-width: 768px) {
        .skin-red-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {border-left: 1px solid #d2d6de}
    }
    .skin-yellow .main-header .navbar {background-color: #f39c12}
    .skin-yellow .main-header .navbar .nav > li > a {color: #fff}
    .skin-yellow .main-header .navbar .nav > li > a:hover, .skin-yellow .main-header .navbar .nav > li > a:active, .skin-yellow .main-header .navbar .nav > li > a:focus, .skin-yellow .main-header .navbar .nav .open > a, .skin-yellow .main-header .navbar .nav .open > a:hover, .skin-yellow .main-header .navbar .nav .open > a:focus, .skin-yellow .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-yellow .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-yellow .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-yellow .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-yellow .main-header .navbar .sidebar-toggle:hover {background-color: #e08e0b}
    @media (max-width: 767px) {
        .skin-yellow .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-yellow .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-yellow .main-header .navbar .dropdown-menu li a:hover {background: #e08e0b}
    }
    .skin-yellow .main-header .logo {background-color: #e08e0b;color: #fff;border-bottom: 0 solid transparent}
    .skin-yellow .main-header .logo:hover {background-color: #db8b0b}
    .skin-yellow .main-header li.user-header {background-color: #f39c12}
    .skin-yellow .content-header {background: transparent}
    .skin-yellow .wrapper, .skin-yellow .main-sidebar, .skin-yellow .left-side {background-color: #222d32}
    .skin-yellow .user-panel > .info, .skin-yellow .user-panel > .info > a {color: #fff}
    .skin-yellow .sidebar-menu > li.header {color: #4b646f;background: #1a2226}
    .skin-yellow .sidebar-menu > li > a {border-left: 3px solid transparent}
    .skin-yellow .sidebar-menu > li:hover > a, .skin-yellow .sidebar-menu > li.active > a {color: #fff;background: #1e282c;border-left-color: #f39c12}
    .skin-yellow .sidebar-menu > li > .treeview-menu {margin: 0 1px;background: #2c3b41}
    .skin-yellow .sidebar a {color: #b8c7ce}
    .skin-yellow .sidebar a:hover {text-decoration: none}
    .skin-yellow .treeview-menu > li > a {color: #8aa4af}
    .skin-yellow .treeview-menu > li.active > a, .skin-yellow .treeview-menu > li > a:hover {color: #fff}
    .skin-yellow .sidebar-form {border-radius: 3px;border: 1px solid #374850;margin: 10px 10px}
    .skin-yellow .sidebar-form input[type="text"], .skin-yellow .sidebar-form .btn {box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px}
    .skin-yellow .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-yellow .sidebar-form input[type="text"]:focus, .skin-yellow .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-yellow .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-yellow .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    .skin-yellow-light .main-header .navbar {background-color: #f39c12}
    .skin-yellow-light .main-header .navbar .nav > li > a {color: #fff}
    .skin-yellow-light .main-header .navbar .nav > li > a:hover, .skin-yellow-light .main-header .navbar .nav > li > a:active, .skin-yellow-light .main-header .navbar .nav > li > a:focus, .skin-yellow-light .main-header .navbar .nav .open > a, .skin-yellow-light .main-header .navbar .nav .open > a:hover, .skin-yellow-light .main-header .navbar .nav .open > a:focus, .skin-yellow-light .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-yellow-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-yellow-light .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-yellow-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-yellow-light .main-header .navbar .sidebar-toggle:hover {background-color: #e08e0b}
    @media (max-width: 767px) {
        .skin-yellow-light .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-yellow-light .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-yellow-light .main-header .navbar .dropdown-menu li a:hover {background: #e08e0b}
    }
    .skin-yellow-light .main-header .logo {background-color: #f39c12;color: #fff;border-bottom: 0 solid transparent}
    .skin-yellow-light .main-header .logo:hover {background-color: #f39a0d}
    .skin-yellow-light .main-header li.user-header {background-color: #f39c12}
    .skin-yellow-light .content-header {background: transparent}
    .skin-yellow-light .wrapper, .skin-yellow-light .main-sidebar, .skin-yellow-light .left-side {background-color: #f9fafc}
    .skin-yellow-light .content-wrapper, .skin-yellow-light .main-footer {border-left: 1px solid #d2d6de}
    .skin-yellow-light .user-panel > .info, .skin-yellow-light .user-panel > .info > a {color: #444}
    .skin-yellow-light .sidebar-menu > li {-webkit-transition: border-left-color .3s ease;-o-transition: border-left-color .3s ease;transition: border-left-color .3s ease}
    .skin-yellow-light .sidebar-menu > li.header {color: #848484;background: #f9fafc}
    .skin-yellow-light .sidebar-menu > li > a {border-left: 3px solid transparent;font-weight: 600}
    .skin-yellow-light .sidebar-menu > li:hover > a, .skin-yellow-light .sidebar-menu > li.active > a {color: #000;background: #f4f4f5}
    .skin-yellow-light .sidebar-menu > li.active {border-left-color: #f39c12}
    .skin-yellow-light .sidebar-menu > li.active > a {font-weight: 600}
    .skin-yellow-light .sidebar-menu > li > .treeview-menu {background: #f4f4f5}
    .skin-yellow-light .sidebar a {color: #444}
    .skin-yellow-light .sidebar a:hover {text-decoration: none}
    .skin-yellow-light .treeview-menu > li > a {color: #777}
    .skin-yellow-light .treeview-menu > li.active > a, .skin-yellow-light .treeview-menu > li > a:hover {color: #000}
    .skin-yellow-light .treeview-menu > li.active > a {font-weight: 600}
    .skin-yellow-light .sidebar-form {border-radius: 3px;border: 1px solid #d2d6de;margin: 10px 10px}
    .skin-yellow-light .sidebar-form input[type="text"], .skin-yellow-light .sidebar-form .btn {box-shadow: none;background-color: #fff;border: 1px solid transparent;height: 35px}
    .skin-yellow-light .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-yellow-light .sidebar-form input[type="text"]:focus, .skin-yellow-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-yellow-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-yellow-light .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    @media (min-width: 768px) {
        .skin-yellow-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {border-left: 1px solid #d2d6de}
    }
    .skin-purple .main-header .navbar {background-color: #605ca8}
    .skin-purple .main-header .navbar .nav > li > a {color: #fff}
    .skin-purple .main-header .navbar .nav > li > a:hover, .skin-purple .main-header .navbar .nav > li > a:active, .skin-purple .main-header .navbar .nav > li > a:focus, .skin-purple .main-header .navbar .nav .open > a, .skin-purple .main-header .navbar .nav .open > a:hover, .skin-purple .main-header .navbar .nav .open > a:focus, .skin-purple .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-purple .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-purple .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-purple .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-purple .main-header .navbar .sidebar-toggle:hover {background-color: #555299}
    @media (max-width: 767px) {
        .skin-purple .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-purple .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-purple .main-header .navbar .dropdown-menu li a:hover {background: #555299}
    }
    .skin-purple .main-header .logo {background-color: #555299;color: #fff;border-bottom: 0 solid transparent}
    .skin-purple .main-header .logo:hover {background-color: #545096}
    .skin-purple .main-header li.user-header {background-color: #605ca8}
    .skin-purple .content-header {background: transparent}
    .skin-purple .wrapper, .skin-purple .main-sidebar, .skin-purple .left-side {background-color: #222d32}
    .skin-purple .user-panel > .info, .skin-purple .user-panel > .info > a {color: #fff}
    .skin-purple .sidebar-menu > li.header {color: #4b646f;background: #1a2226}
    .skin-purple .sidebar-menu > li > a {border-left: 3px solid transparent}
    .skin-purple .sidebar-menu > li:hover > a, .skin-purple .sidebar-menu > li.active > a {color: #fff;background: #1e282c;border-left-color: #605ca8}
    .skin-purple .sidebar-menu > li > .treeview-menu {margin: 0 1px;background: #2c3b41}
    .skin-purple .sidebar a {color: #b8c7ce}
    .skin-purple .sidebar a:hover {text-decoration: none}
    .skin-purple .treeview-menu > li > a {color: #8aa4af}
    .skin-purple .treeview-menu > li.active > a, .skin-purple .treeview-menu > li > a:hover {color: #fff}
    .skin-purple .sidebar-form {border-radius: 3px;border: 1px solid #374850;margin: 10px 10px}
    .skin-purple .sidebar-form input[type="text"], .skin-purple .sidebar-form .btn {box-shadow: none;background-color: #374850;border: 1px solid transparent;height: 35px}
    .skin-purple .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-purple .sidebar-form input[type="text"]:focus, .skin-purple .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-purple .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-purple .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    .skin-purple-light .main-header .navbar {background-color: #605ca8}
    .skin-purple-light .main-header .navbar .nav > li > a {color: #fff}
    .skin-purple-light .main-header .navbar .nav > li > a:hover, .skin-purple-light .main-header .navbar .nav > li > a:active, .skin-purple-light .main-header .navbar .nav > li > a:focus, .skin-purple-light .main-header .navbar .nav .open > a, .skin-purple-light .main-header .navbar .nav .open > a:hover, .skin-purple-light .main-header .navbar .nav .open > a:focus, .skin-purple-light .main-header .navbar .nav > .active > a {background: rgba(0, 0, 0, 0.1);color: #f6f6f6}
    .skin-purple-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-purple-light .main-header .navbar .sidebar-toggle:hover {color: #f6f6f6;background: rgba(0, 0, 0, 0.1)}
    .skin-purple-light .main-header .navbar .sidebar-toggle {color: #fff}
    .skin-purple-light .main-header .navbar .sidebar-toggle:hover {background-color: #555299}
    @media (max-width: 767px) {
        .skin-purple-light .main-header .navbar .dropdown-menu li.divider {background-color: rgba(255, 255, 255, 0.1)}
        .skin-purple-light .main-header .navbar .dropdown-menu li a {color: #fff}
        .skin-purple-light .main-header .navbar .dropdown-menu li a:hover {background: #555299}
    }
    .skin-purple-light .main-header .logo {background-color: #605ca8;color: #fff;border-bottom: 0 solid transparent}
    .skin-purple-light .main-header .logo:hover {background-color: #5d59a6}
    .skin-purple-light .main-header li.user-header {background-color: #605ca8}
    .skin-purple-light .content-header {background: transparent}
    .skin-purple-light .wrapper, .skin-purple-light .main-sidebar, .skin-purple-light .left-side {background-color: #f9fafc}
    .skin-purple-light .content-wrapper, .skin-purple-light .main-footer {border-left: 1px solid #d2d6de}
    .skin-purple-light .user-panel > .info, .skin-purple-light .user-panel > .info > a {color: #444}
    .skin-purple-light .sidebar-menu > li {-webkit-transition: border-left-color .3s ease;-o-transition: border-left-color .3s ease;transition: border-left-color .3s ease}
    .skin-purple-light .sidebar-menu > li.header {color: #848484;background: #f9fafc}
    .skin-purple-light .sidebar-menu > li > a {border-left: 3px solid transparent;font-weight: 600}
    .skin-purple-light .sidebar-menu > li:hover > a, .skin-purple-light .sidebar-menu > li.active > a {color: #000;background: #f4f4f5}
    .skin-purple-light .sidebar-menu > li.active {border-left-color: #605ca8}
    .skin-purple-light .sidebar-menu > li.active > a {font-weight: 600}
    .skin-purple-light .sidebar-menu > li > .treeview-menu {background: #f4f4f5}
    .skin-purple-light .sidebar a {color: #444}
    .skin-purple-light .sidebar a:hover {text-decoration: none}
    .skin-purple-light .treeview-menu > li > a {color: #777}
    .skin-purple-light .treeview-menu > li.active > a, .skin-purple-light .treeview-menu > li > a:hover {color: #000}
    .skin-purple-light .treeview-menu > li.active > a {font-weight: 600}
    .skin-purple-light .sidebar-form {border-radius: 3px;border: 1px solid #d2d6de;margin: 10px 10px}
    .skin-purple-light .sidebar-form input[type="text"], .skin-purple-light .sidebar-form .btn {box-shadow: none;background-color: #fff;border: 1px solid transparent;height: 35px}
    .skin-purple-light .sidebar-form input[type="text"] {color: #666;border-top-left-radius: 2px;border-top-right-radius: 0;border-bottom-right-radius: 0;border-bottom-left-radius: 2px}
    .skin-purple-light .sidebar-form input[type="text"]:focus, .skin-purple-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {background-color: #fff;color: #666}
    .skin-purple-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {border-left-color: #fff}
    .skin-purple-light .sidebar-form .btn {color: #999;border-top-left-radius: 0;border-top-right-radius: 2px;border-bottom-right-radius: 2px;border-bottom-left-radius: 0}
    @media (min-width: 768px) {
        .skin-purple-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {border-left: 1px solid #d2d6de}
    }
    /*!
 * Bootstrap v3.3.6 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 *//*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */
    html {font-family: sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%}
    body {margin: 0}
    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {display: block}
    audio, canvas, progress, video {display: inline-block;vertical-align: baseline}
    audio:not([controls]) {display: none;height: 0}
    [hidden], template {display: none}
    a {background-color: transparent}
    a:active, a:hover {outline: 0}
    abbr[title] {border-bottom: 1px dotted}
    b, strong {font-weight: 700}
    dfn {font-style: italic}
    h1 {margin: .67em 0;font-size: 2em}
    mark {color: #000;background: #ff0}
    small {font-size: 80%}
    sub, sup {position: relative;font-size: 75%;line-height: 0;vertical-align: baseline}
    sup {top: -.5em}
    sub {bottom: -.25em}
    img {border: 0}
    svg:not(:root) {overflow: hidden}
    figure {margin: 1em 40px}
    hr {height: 0;-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box}
    pre {overflow: auto}
    code, kbd, pre, samp {font-family: monospace, monospace;font-size: 1em}
    button, input, optgroup, select, textarea {margin: 0;font: inherit;color: inherit}
    button {overflow: visible}
    button, select {text-transform: none}
    button, html input[type=button], input[type=reset], input[type=submit] {-webkit-appearance: button;cursor: pointer}
    button[disabled], html input[disabled] {cursor: default}
    button::-moz-focus-inner, input::-moz-focus-inner {padding: 0;border: 0}
    input {line-height: normal}
    input[type=checkbox], input[type=radio] {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0}
    input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {height: auto}
    input[type=search] {-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box;-webkit-appearance: textfield}
    input[type=search]::-webkit-search-cancel-button, input[type=search]::-webkit-search-decoration {-webkit-appearance: none}
    fieldset {padding: .35em .625em .75em;margin: 0 2px;border: 1px solid silver}
    legend {padding: 0;border: 0}
    textarea {overflow: auto}
    optgroup {font-weight: 700}
    table {border-spacing: 0;border-collapse: collapse}
    td, th {padding: 0}
    /*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
    @media print {
        *, :after, :before {color: #000 !important;text-shadow: none !important;background: 0 0 !important;-webkit-box-shadow: none !important;box-shadow: none !important}
        a, a:visited {text-decoration: underline}
        a[href]:after {content: " (" attr(href) ")"}
        abbr[title]:after {content: " (" attr(title) ")"}
        a[href^="javascript:"]:after, a[href^="#"]:after {content: ""}
        blockquote, pre {border: 1px solid #999;page-break-inside: avoid}
        thead {display: table-header-group}
        img, tr {page-break-inside: avoid}
        img {max-width: 100% !important}
        h2, h3, p {orphans: 3;widows: 3}
        h2, h3 {page-break-after: avoid}
        .navbar {display: none}
        .btn > .caret, .dropup > .btn > .caret {border-top-color: #000 !important}
        .label {border: 1px solid #000}
        .table {border-collapse: collapse !important}
        .table td, .table th {background-color: #fff !important}
        .table-bordered td, .table-bordered th {border: 1px solid #ddd !important}
    }
    @font-face {
        font-family: 'Glyphicons Halflings';
        src: url(../fonts/glyphicons-halflings-regular.eot);
        src: url(../fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'), url(../fonts/glyphicons-halflings-regular.woff2) format('woff2'), url(../fonts/glyphicons-halflings-regular.woff) format('woff'), url(../fonts/glyphicons-halflings-regular.ttf) format('truetype'), url(../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg')
    }
    .glyphicon {position: relative;top: 1px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale}
    .glyphicon-asterisk:before {content: "\002a"}
    .glyphicon-plus:before {content: "\002b"}
    .glyphicon-eur:before, .glyphicon-euro:before {content: "\20ac"}
    .glyphicon-minus:before {content: "\2212"}
    .glyphicon-cloud:before {content: "\2601"}
    .glyphicon-envelope:before {content: "\2709"}
    .glyphicon-pencil:before {content: "\270f"}
    .glyphicon-glass:before {content: "\e001"}
    .glyphicon-music:before {content: "\e002"}
    .glyphicon-search:before {content: "\e003"}
    .glyphicon-heart:before {content: "\e005"}
    .glyphicon-star:before {content: "\e006"}
    .glyphicon-star-empty:before {content: "\e007"}
    .glyphicon-user:before {content: "\e008"}
    .glyphicon-film:before {content: "\e009"}
    .glyphicon-th-large:before {content: "\e010"}
    .glyphicon-th:before {content: "\e011"}
    .glyphicon-th-list:before {content: "\e012"}
    .glyphicon-ok:before {content: "\e013"}
    .glyphicon-remove:before {content: "\e014"}
    .glyphicon-zoom-in:before {content: "\e015"}
    .glyphicon-zoom-out:before {content: "\e016"}
    .glyphicon-off:before {content: "\e017"}
    .glyphicon-signal:before {content: "\e018"}
    .glyphicon-cog:before {content: "\e019"}
    .glyphicon-trash:before {content: "\e020"}
    .glyphicon-home:before {content: "\e021"}
    .glyphicon-file:before {content: "\e022"}
    .glyphicon-time:before {content: "\e023"}
    .glyphicon-road:before {content: "\e024"}
    .glyphicon-download-alt:before {content: "\e025"}
    .glyphicon-download:before {content: "\e026"}
    .glyphicon-upload:before {content: "\e027"}
    .glyphicon-inbox:before {content: "\e028"}
    .glyphicon-play-circle:before {content: "\e029"}
    .glyphicon-repeat:before {content: "\e030"}
    .glyphicon-refresh:before {content: "\e031"}
    .glyphicon-list-alt:before {content: "\e032"}
    .glyphicon-lock:before {content: "\e033"}
    .glyphicon-flag:before {content: "\e034"}
    .glyphicon-headphones:before {content: "\e035"}
    .glyphicon-volume-off:before {content: "\e036"}
    .glyphicon-volume-down:before {content: "\e037"}
    .glyphicon-volume-up:before {content: "\e038"}
    .glyphicon-qrcode:before {content: "\e039"}
    .glyphicon-barcode:before {content: "\e040"}
    .glyphicon-tag:before {content: "\e041"}
    .glyphicon-tags:before {content: "\e042"}
    .glyphicon-book:before {content: "\e043"}
    .glyphicon-bookmark:before {content: "\e044"}
    .glyphicon-print:before {content: "\e045"}
    .glyphicon-camera:before {content: "\e046"}
    .glyphicon-font:before {content: "\e047"}
    .glyphicon-bold:before {content: "\e048"}
    .glyphicon-italic:before {content: "\e049"}
    .glyphicon-text-height:before {content: "\e050"}
    .glyphicon-text-width:before {content: "\e051"}
    .glyphicon-align-left:before {content: "\e052"}
    .glyphicon-align-center:before {content: "\e053"}
    .glyphicon-align-right:before {content: "\e054"}
    .glyphicon-align-justify:before {content: "\e055"}
    .glyphicon-list:before {content: "\e056"}
    .glyphicon-indent-left:before {content: "\e057"}
    .glyphicon-indent-right:before {content: "\e058"}
    .glyphicon-facetime-video:before {content: "\e059"}
    .glyphicon-picture:before {content: "\e060"}
    .glyphicon-map-marker:before {content: "\e062"}
    .glyphicon-adjust:before {content: "\e063"}
    .glyphicon-tint:before {content: "\e064"}
    .glyphicon-edit:before {content: "\e065"}
    .glyphicon-share:before {content: "\e066"}
    .glyphicon-check:before {content: "\e067"}
    .glyphicon-move:before {content: "\e068"}
    .glyphicon-step-backward:before {content: "\e069"}
    .glyphicon-fast-backward:before {content: "\e070"}
    .glyphicon-backward:before {content: "\e071"}
    .glyphicon-play:before {content: "\e072"}
    .glyphicon-pause:before {content: "\e073"}
    .glyphicon-stop:before {content: "\e074"}
    .glyphicon-forward:before {content: "\e075"}
    .glyphicon-fast-forward:before {content: "\e076"}
    .glyphicon-step-forward:before {content: "\e077"}
    .glyphicon-eject:before {content: "\e078"}
    .glyphicon-chevron-left:before {content: "\e079"}
    .glyphicon-chevron-right:before {content: "\e080"}
    .glyphicon-plus-sign:before {content: "\e081"}
    .glyphicon-minus-sign:before {content: "\e082"}
    .glyphicon-remove-sign:before {content: "\e083"}
    .glyphicon-ok-sign:before {content: "\e084"}
    .glyphicon-question-sign:before {content: "\e085"}
    .glyphicon-info-sign:before {content: "\e086"}
    .glyphicon-screenshot:before {content: "\e087"}
    .glyphicon-remove-circle:before {content: "\e088"}
    .glyphicon-ok-circle:before {content: "\e089"}
    .glyphicon-ban-circle:before {content: "\e090"}
    .glyphicon-arrow-left:before {content: "\e091"}
    .glyphicon-arrow-right:before {content: "\e092"}
    .glyphicon-arrow-up:before {content: "\e093"}
    .glyphicon-arrow-down:before {content: "\e094"}
    .glyphicon-share-alt:before {content: "\e095"}
    .glyphicon-resize-full:before {content: "\e096"}
    .glyphicon-resize-small:before {content: "\e097"}
    .glyphicon-exclamation-sign:before {content: "\e101"}
    .glyphicon-gift:before {content: "\e102"}
    .glyphicon-leaf:before {content: "\e103"}
    .glyphicon-fire:before {content: "\e104"}
    .glyphicon-eye-open:before {content: "\e105"}
    .glyphicon-eye-close:before {content: "\e106"}
    .glyphicon-warning-sign:before {content: "\e107"}
    .glyphicon-plane:before {content: "\e108"}
    .glyphicon-calendar:before {content: "\e109"}
    .glyphicon-random:before {content: "\e110"}
    .glyphicon-comment:before {content: "\e111"}
    .glyphicon-magnet:before {content: "\e112"}
    .glyphicon-chevron-up:before {content: "\e113"}
    .glyphicon-chevron-down:before {content: "\e114"}
    .glyphicon-retweet:before {content: "\e115"}
    .glyphicon-shopping-cart:before {content: "\e116"}
    .glyphicon-folder-close:before {content: "\e117"}
    .glyphicon-folder-open:before {content: "\e118"}
    .glyphicon-resize-vertical:before {content: "\e119"}
    .glyphicon-resize-horizontal:before {content: "\e120"}
    .glyphicon-hdd:before {content: "\e121"}
    .glyphicon-bullhorn:before {content: "\e122"}
    .glyphicon-bell:before {content: "\e123"}
    .glyphicon-certificate:before {content: "\e124"}
    .glyphicon-thumbs-up:before {content: "\e125"}
    .glyphicon-thumbs-down:before {content: "\e126"}
    .glyphicon-hand-right:before {content: "\e127"}
    .glyphicon-hand-left:before {content: "\e128"}
    .glyphicon-hand-up:before {content: "\e129"}
    .glyphicon-hand-down:before {content: "\e130"}
    .glyphicon-circle-arrow-right:before {content: "\e131"}
    .glyphicon-circle-arrow-left:before {content: "\e132"}
    .glyphicon-circle-arrow-up:before {content: "\e133"}
    .glyphicon-circle-arrow-down:before {content: "\e134"}
    .glyphicon-globe:before {content: "\e135"}
    .glyphicon-wrench:before {content: "\e136"}
    .glyphicon-tasks:before {content: "\e137"}
    .glyphicon-filter:before {content: "\e138"}
    .glyphicon-briefcase:before {content: "\e139"}
    .glyphicon-fullscreen:before {content: "\e140"}
    .glyphicon-dashboard:before {content: "\e141"}
    .glyphicon-paperclip:before {content: "\e142"}
    .glyphicon-heart-empty:before {content: "\e143"}
    .glyphicon-link:before {content: "\e144"}
    .glyphicon-phone:before {content: "\e145"}
    .glyphicon-pushpin:before {content: "\e146"}
    .glyphicon-usd:before {content: "\e148"}
    .glyphicon-gbp:before {content: "\e149"}
    .glyphicon-sort:before {content: "\e150"}
    .glyphicon-sort-by-alphabet:before {content: "\e151"}
    .glyphicon-sort-by-alphabet-alt:before {content: "\e152"}
    .glyphicon-sort-by-order:before {content: "\e153"}
    .glyphicon-sort-by-order-alt:before {content: "\e154"}
    .glyphicon-sort-by-attributes:before {content: "\e155"}
    .glyphicon-sort-by-attributes-alt:before {content: "\e156"}
    .glyphicon-unchecked:before {content: "\e157"}
    .glyphicon-expand:before {content: "\e158"}
    .glyphicon-collapse-down:before {content: "\e159"}
    .glyphicon-collapse-up:before {content: "\e160"}
    .glyphicon-log-in:before {content: "\e161"}
    .glyphicon-flash:before {content: "\e162"}
    .glyphicon-log-out:before {content: "\e163"}
    .glyphicon-new-window:before {content: "\e164"}
    .glyphicon-record:before {content: "\e165"}
    .glyphicon-save:before {content: "\e166"}
    .glyphicon-open:before {content: "\e167"}
    .glyphicon-saved:before {content: "\e168"}
    .glyphicon-import:before {content: "\e169"}
    .glyphicon-export:before {content: "\e170"}
    .glyphicon-send:before {content: "\e171"}
    .glyphicon-floppy-disk:before {content: "\e172"}
    .glyphicon-floppy-saved:before {content: "\e173"}
    .glyphicon-floppy-remove:before {content: "\e174"}
    .glyphicon-floppy-save:before {content: "\e175"}
    .glyphicon-floppy-open:before {content: "\e176"}
    .glyphicon-credit-card:before {content: "\e177"}
    .glyphicon-transfer:before {content: "\e178"}
    .glyphicon-cutlery:before {content: "\e179"}
    .glyphicon-header:before {content: "\e180"}
    .glyphicon-compressed:before {content: "\e181"}
    .glyphicon-earphone:before {content: "\e182"}
    .glyphicon-phone-alt:before {content: "\e183"}
    .glyphicon-tower:before {content: "\e184"}
    .glyphicon-stats:before {content: "\e185"}
    .glyphicon-sd-video:before {content: "\e186"}
    .glyphicon-hd-video:before {content: "\e187"}
    .glyphicon-subtitles:before {content: "\e188"}
    .glyphicon-sound-stereo:before {content: "\e189"}
    .glyphicon-sound-dolby:before {content: "\e190"}
    .glyphicon-sound-5-1:before {content: "\e191"}
    .glyphicon-sound-6-1:before {content: "\e192"}
    .glyphicon-sound-7-1:before {content: "\e193"}
    .glyphicon-copyright-mark:before {content: "\e194"}
    .glyphicon-registration-mark:before {content: "\e195"}
    .glyphicon-cloud-download:before {content: "\e197"}
    .glyphicon-cloud-upload:before {content: "\e198"}
    .glyphicon-tree-conifer:before {content: "\e199"}
    .glyphicon-tree-deciduous:before {content: "\e200"}
    .glyphicon-cd:before {content: "\e201"}
    .glyphicon-save-file:before {content: "\e202"}
    .glyphicon-open-file:before {content: "\e203"}
    .glyphicon-level-up:before {content: "\e204"}
    .glyphicon-copy:before {content: "\e205"}
    .glyphicon-paste:before {content: "\e206"}
    .glyphicon-alert:before {content: "\e209"}
    .glyphicon-equalizer:before {content: "\e210"}
    .glyphicon-king:before {content: "\e211"}
    .glyphicon-queen:before {content: "\e212"}
    .glyphicon-pawn:before {content: "\e213"}
    .glyphicon-bishop:before {content: "\e214"}
    .glyphicon-knight:before {content: "\e215"}
    .glyphicon-baby-formula:before {content: "\e216"}
    .glyphicon-tent:before {content: "\26fa"}
    .glyphicon-blackboard:before {content: "\e218"}
    .glyphicon-bed:before {content: "\e219"}
    .glyphicon-apple:before {content: "\f8ff"}
    .glyphicon-erase:before {content: "\e221"}
    .glyphicon-hourglass:before {content: "\231b"}
    .glyphicon-lamp:before {content: "\e223"}
    .glyphicon-duplicate:before {content: "\e224"}
    .glyphicon-piggy-bank:before {content: "\e225"}
    .glyphicon-scissors:before {content: "\e226"}
    .glyphicon-bitcoin:before {content: "\e227"}
    .glyphicon-btc:before {content: "\e227"}
    .glyphicon-xbt:before {content: "\e227"}
    .glyphicon-yen:before {content: "\00a5"}
    .glyphicon-jpy:before {content: "\00a5"}
    .glyphicon-ruble:before {content: "\20bd"}
    .glyphicon-rub:before {content: "\20bd"}
    .glyphicon-scale:before {content: "\e230"}
    .glyphicon-ice-lolly:before {content: "\e231"}
    .glyphicon-ice-lolly-tasted:before {content: "\e232"}
    .glyphicon-education:before {content: "\e233"}
    .glyphicon-option-horizontal:before {content: "\e234"}
    .glyphicon-option-vertical:before {content: "\e235"}
    .glyphicon-menu-hamburger:before {content: "\e236"}
    .glyphicon-modal-window:before {content: "\e237"}
    .glyphicon-oil:before {content: "\e238"}
    .glyphicon-grain:before {content: "\e239"}
    .glyphicon-sunglasses:before {content: "\e240"}
    .glyphicon-text-size:before {content: "\e241"}
    .glyphicon-text-color:before {content: "\e242"}
    .glyphicon-text-background:before {content: "\e243"}
    .glyphicon-object-align-top:before {content: "\e244"}
    .glyphicon-object-align-bottom:before {content: "\e245"}
    .glyphicon-object-align-horizontal:before {content: "\e246"}
    .glyphicon-object-align-left:before {content: "\e247"}
    .glyphicon-object-align-vertical:before {content: "\e248"}
    .glyphicon-object-align-right:before {content: "\e249"}
    .glyphicon-triangle-right:before {content: "\e250"}
    .glyphicon-triangle-left:before {content: "\e251"}
    .glyphicon-triangle-bottom:before {content: "\e252"}
    .glyphicon-triangle-top:before {content: "\e253"}
    .glyphicon-console:before {content: "\e254"}
    .glyphicon-superscript:before {content: "\e255"}
    .glyphicon-subscript:before {content: "\e256"}
    .glyphicon-menu-left:before {content: "\e257"}
    .glyphicon-menu-right:before {content: "\e258"}
    .glyphicon-menu-down:before {content: "\e259"}
    .glyphicon-menu-up:before {content: "\e260"}
    * {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}
    :after, :before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}
    html {font-size: 10px;-webkit-tap-highlight-color: rgba(0, 0, 0, 0)}
    body {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff}
    button, input, select, textarea {font-family: inherit;font-size: inherit;line-height: inherit}
    a {color: #337ab7;text-decoration: none}
    a:focus, a:hover {color: #23527c;text-decoration: underline}
    a:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px}
    figure {margin: 0}
    img {vertical-align: middle}
    .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {display: block;max-width: 100%;height: auto}
    .img-rounded {border-radius: 6px}
    .img-thumbnail {display: inline-block;max-width: 100%;height: auto;padding: 4px;line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;border-radius: 4px;-webkit-transition: all .2s ease-in-out;-o-transition: all .2s ease-in-out;transition: all .2s ease-in-out}
    .img-circle {border-radius: 50%}
    hr {margin-top: 20px;margin-bottom: 20px;border: 0;border-top: 1px solid #eee}
    .sr-only {position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0, 0, 0, 0);border: 0}
    .sr-only-focusable:active, .sr-only-focusable:focus {position: static;width: auto;height: auto;margin: 0;overflow: visible;clip: auto}
    [role=button] {cursor: pointer}
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit}
    .h1 .small, .h1 small, .h2 .small, .h2 small, .h3 .small, .h3 small, .h4 .small, .h4 small, .h5 .small, .h5 small, .h6 .small, .h6 small, h1 .small, h1 small, h2 .small, h2 small, h3 .small, h3 small, h4 .small, h4 small, h5 .small, h5 small, h6 .small, h6 small {font-weight: 400;line-height: 1;color: #777}
    .h1, .h2, .h3, h1, h2, h3 {margin-top: 20px;margin-bottom: 10px}
    .h1 .small, .h1 small, .h2 .small, .h2 small, .h3 .small, .h3 small, h1 .small, h1 small, h2 .small, h2 small, h3 .small, h3 small {font-size: 65%}
    .h4, .h5, .h6, h4, h5, h6 {margin-top: 10px;margin-bottom: 10px}
    .h4 .small, .h4 small, .h5 .small, .h5 small, .h6 .small, .h6 small, h4 .small, h4 small, h5 .small, h5 small, h6 .small, h6 small {font-size: 75%}
    .h1, h1 {font-size: 36px}
    .h2, h2 {font-size: 30px}
    .h3, h3 {font-size: 24px}
    .h4, h4 {font-size: 18px}
    .h5, h5 {font-size: 14px}
    .h6, h6 {font-size: 12px}
    p {margin: 0 0 10px}
    .lead {margin-bottom: 20px;font-size: 16px;font-weight: 300;line-height: 1.4}
    @media (min-width: 768px) {
        .lead {font-size: 21px}
    }
    .small, small {font-size: 85%}
    .mark, mark {padding: .2em;background-color: #fcf8e3}
    .text-left {text-align: left}
    .text-right {text-align: right}
    .text-center {text-align: center}
    .text-justify {text-align: justify}
    .text-nowrap {white-space: nowrap}
    .text-lowercase {text-transform: lowercase}
    .text-uppercase {text-transform: uppercase}
    .text-capitalize {text-transform: capitalize}
    .text-muted {color: #777}
    .text-primary {color: #337ab7}
    a.text-primary:focus, a.text-primary:hover {color: #286090}
    .text-success {color: #3c763d}
    a.text-success:focus, a.text-success:hover {color: #2b542c}
    .text-info {color: #31708f}
    a.text-info:focus, a.text-info:hover {color: #245269}
    .text-warning {color: #8a6d3b}
    a.text-warning:focus, a.text-warning:hover {color: #66512c}
    .text-danger {color: #a94442}
    a.text-danger:focus, a.text-danger:hover {color: #843534}
    .bg-primary {color: #fff;background-color: #337ab7}
    a.bg-primary:focus, a.bg-primary:hover {background-color: #286090}
    .bg-success {background-color: #dff0d8}
    a.bg-success:focus, a.bg-success:hover {background-color: #c1e2b3}
    .bg-info {background-color: #d9edf7}
    a.bg-info:focus, a.bg-info:hover {background-color: #afd9ee}
    .bg-warning {background-color: #fcf8e3}
    a.bg-warning:focus, a.bg-warning:hover {background-color: #f7ecb5}
    .bg-danger {background-color: #f2dede}
    a.bg-danger:focus, a.bg-danger:hover {background-color: #e4b9b9}
    .page-header {padding-bottom: 9px;margin: 40px 0 20px;border-bottom: 1px solid #eee}
    ol, ul {margin-top: 0;margin-bottom: 10px}
    ol ol, ol ul, ul ol, ul ul {margin-bottom: 0}
    .list-unstyled {padding-left: 0;list-style: none}
    .list-inline {padding-left: 0;margin-left: -5px;list-style: none}
    .list-inline > li {display: inline-block;padding-right: 5px;padding-left: 5px}
    dl {margin-top: 0;margin-bottom: 20px}
    dd, dt {line-height: 1.42857143}
    dt {font-weight: 700}
    dd {margin-left: 0}
    @media (min-width: 768px) {
        .dl-horizontal dt {float: left;width: 160px;overflow: hidden;clear: left;text-align: right;text-overflow: ellipsis;white-space: nowrap}
        .dl-horizontal dd {margin-left: 180px}
    }
    abbr[data-original-title], abbr[title] {cursor: help;border-bottom: 1px dotted #777}
    .initialism {font-size: 90%;text-transform: uppercase}
    blockquote {padding: 10px 20px;margin: 0 0 20px;font-size: 17.5px;border-left: 5px solid #eee}
    blockquote ol:last-child, blockquote p:last-child, blockquote ul:last-child {margin-bottom: 0}
    blockquote .small, blockquote footer, blockquote small {display: block;font-size: 80%;line-height: 1.42857143;color: #777}
    blockquote .small:before, blockquote footer:before, blockquote small:before {content: '\2014 \00A0'}
    .blockquote-reverse, blockquote.pull-right {padding-right: 15px;padding-left: 0;text-align: right;border-right: 5px solid #eee;border-left: 0}
    .blockquote-reverse .small:before, .blockquote-reverse footer:before, .blockquote-reverse small:before, blockquote.pull-right .small:before, blockquote.pull-right footer:before, blockquote.pull-right small:before {content: ''}
    .blockquote-reverse .small:after, .blockquote-reverse footer:after, .blockquote-reverse small:after, blockquote.pull-right .small:after, blockquote.pull-right footer:after, blockquote.pull-right small:after {content: '\00A0 \2014'}
    address {margin-bottom: 20px;font-style: normal;line-height: 1.42857143}
    code, kbd, pre, samp {font-family: Menlo, Monaco, Consolas, "Courier New", monospace}
    code {padding: 2px 4px;font-size: 90%;color: #c7254e;background-color: #f9f2f4;border-radius: 4px}
    kbd {padding: 2px 4px;font-size: 90%;color: #fff;background-color: #333;border-radius: 3px;-webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25)}
    kbd kbd {padding: 0;font-size: 100%;font-weight: 700;-webkit-box-shadow: none;box-shadow: none}
    pre {display: block;padding: 9.5px;margin: 0 0 10px;font-size: 13px;line-height: 1.42857143;color: #333;word-break: break-all;word-wrap: break-word;background-color: #f5f5f5;border: 1px solid #ccc;border-radius: 4px}
    pre code {padding: 0;font-size: inherit;color: inherit;white-space: pre-wrap;background-color: transparent;border-radius: 0}
    .pre-scrollable {max-height: 340px;overflow-y: scroll}
    .container {padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto}
    @media (min-width: 768px) {
        .container {width: 750px}
    }
    @media (min-width: 992px) {
        .container {width: 970px}
    }
    @media (min-width: 1200px) {
        .container {width: 1170px}
    }
    .container-fluid {padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto}
    .row {margin-right: -15px;margin-left: -15px}
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px}
    .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {float: left}
    .col-xs-12 {width: 100%}
    .col-xs-11 {width: 91.66666667%}
    .col-xs-10 {width: 83.33333333%}
    .col-xs-9 {width: 75%}
    .col-xs-8 {width: 66.66666667%}
    .col-xs-7 {width: 58.33333333%}
    .col-xs-6 {width: 50%}
    .col-xs-5 {width: 41.66666667%}
    .col-xs-4 {width: 33.33333333%}
    .col-xs-3 {width: 25%}
    .col-xs-2 {width: 16.66666667%}
    .col-xs-1 {width: 8.33333333%}
    .col-xs-pull-12 {right: 100%}
    .col-xs-pull-11 {right: 91.66666667%}
    .col-xs-pull-10 {right: 83.33333333%}
    .col-xs-pull-9 {right: 75%}
    .col-xs-pull-8 {right: 66.66666667%}
    .col-xs-pull-7 {right: 58.33333333%}
    .col-xs-pull-6 {right: 50%}
    .col-xs-pull-5 {right: 41.66666667%}
    .col-xs-pull-4 {right: 33.33333333%}
    .col-xs-pull-3 {right: 25%}
    .col-xs-pull-2 {right: 16.66666667%}
    .col-xs-pull-1 {right: 8.33333333%}
    .col-xs-pull-0 {right: auto}
    .col-xs-push-12 {left: 100%}
    .col-xs-push-11 {left: 91.66666667%}
    .col-xs-push-10 {left: 83.33333333%}
    .col-xs-push-9 {left: 75%}
    .col-xs-push-8 {left: 66.66666667%}
    .col-xs-push-7 {left: 58.33333333%}
    .col-xs-push-6 {left: 50%}
    .col-xs-push-5 {left: 41.66666667%}
    .col-xs-push-4 {left: 33.33333333%}
    .col-xs-push-3 {left: 25%}
    .col-xs-push-2 {left: 16.66666667%}
    .col-xs-push-1 {left: 8.33333333%}
    .col-xs-push-0 {left: auto}
    .col-xs-offset-12 {margin-left: 100%}
    .col-xs-offset-11 {margin-left: 91.66666667%}
    .col-xs-offset-10 {margin-left: 83.33333333%}
    .col-xs-offset-9 {margin-left: 75%}
    .col-xs-offset-8 {margin-left: 66.66666667%}
    .col-xs-offset-7 {margin-left: 58.33333333%}
    .col-xs-offset-6 {margin-left: 50%}
    .col-xs-offset-5 {margin-left: 41.66666667%}
    .col-xs-offset-4 {margin-left: 33.33333333%}
    .col-xs-offset-3 {margin-left: 25%}
    .col-xs-offset-2 {margin-left: 16.66666667%}
    .col-xs-offset-1 {margin-left: 8.33333333%}
    .col-xs-offset-0 {margin-left: 0}
    @media (min-width: 768px) {
        .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {float: left}
        .col-sm-12 {width: 100%}
        .col-sm-11 {width: 91.66666667%}
        .col-sm-10 {width: 83.33333333%}
        .col-sm-9 {width: 75%}
        .col-sm-8 {width: 66.66666667%}
        .col-sm-7 {width: 58.33333333%}
        .col-sm-6 {width: 50%}
        .col-sm-5 {width: 41.66666667%}
        .col-sm-4 {width: 33.33333333%}
        .col-sm-3 {width: 25%}
        .col-sm-2 {width: 16.66666667%}
        .col-sm-1 {width: 8.33333333%}
        .col-sm-pull-12 {right: 100%}
        .col-sm-pull-11 {right: 91.66666667%}
        .col-sm-pull-10 {right: 83.33333333%}
        .col-sm-pull-9 {right: 75%}
        .col-sm-pull-8 {right: 66.66666667%}
        .col-sm-pull-7 {right: 58.33333333%}
        .col-sm-pull-6 {right: 50%}
        .col-sm-pull-5 {right: 41.66666667%}
        .col-sm-pull-4 {right: 33.33333333%}
        .col-sm-pull-3 {right: 25%}
        .col-sm-pull-2 {right: 16.66666667%}
        .col-sm-pull-1 {right: 8.33333333%}
        .col-sm-pull-0 {right: auto}
        .col-sm-push-12 {left: 100%}
        .col-sm-push-11 {left: 91.66666667%}
        .col-sm-push-10 {left: 83.33333333%}
        .col-sm-push-9 {left: 75%}
        .col-sm-push-8 {left: 66.66666667%}
        .col-sm-push-7 {left: 58.33333333%}
        .col-sm-push-6 {left: 50%}
        .col-sm-push-5 {left: 41.66666667%}
        .col-sm-push-4 {left: 33.33333333%}
        .col-sm-push-3 {left: 25%}
        .col-sm-push-2 {left: 16.66666667%}
        .col-sm-push-1 {left: 8.33333333%}
        .col-sm-push-0 {left: auto}
        .col-sm-offset-12 {margin-left: 100%}
        .col-sm-offset-11 {margin-left: 91.66666667%}
        .col-sm-offset-10 {margin-left: 83.33333333%}
        .col-sm-offset-9 {margin-left: 75%}
        .col-sm-offset-8 {margin-left: 66.66666667%}
        .col-sm-offset-7 {margin-left: 58.33333333%}
        .col-sm-offset-6 {margin-left: 50%}
        .col-sm-offset-5 {margin-left: 41.66666667%}
        .col-sm-offset-4 {margin-left: 33.33333333%}
        .col-sm-offset-3 {margin-left: 25%}
        .col-sm-offset-2 {margin-left: 16.66666667%}
        .col-sm-offset-1 {margin-left: 8.33333333%}
        .col-sm-offset-0 {margin-left: 0}
    }
    @media (min-width: 992px) {
        .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {float: left}
        .col-md-12 {width: 100%}
        .col-md-11 {width: 91.66666667%}
        .col-md-10 {width: 83.33333333%}
        .col-md-9 {width: 75%}
        .col-md-8 {width: 66.66666667%}
        .col-md-7 {width: 58.33333333%}
        .col-md-6 {width: 50%}
        .col-md-5 {width: 41.66666667%}
        .col-md-4 {width: 33.33333333%}
        .col-md-3 {width: 25%}
        .col-md-2 {width: 16.66666667%}
        .col-md-1 {width: 8.33333333%}
        .col-md-pull-12 {right: 100%}
        .col-md-pull-11 {right: 91.66666667%}
        .col-md-pull-10 {right: 83.33333333%}
        .col-md-pull-9 {right: 75%}
        .col-md-pull-8 {right: 66.66666667%}
        .col-md-pull-7 {right: 58.33333333%}
        .col-md-pull-6 {right: 50%}
        .col-md-pull-5 {right: 41.66666667%}
        .col-md-pull-4 {right: 33.33333333%}
        .col-md-pull-3 {right: 25%}
        .col-md-pull-2 {right: 16.66666667%}
        .col-md-pull-1 {right: 8.33333333%}
        .col-md-pull-0 {right: auto}
        .col-md-push-12 {left: 100%}
        .col-md-push-11 {left: 91.66666667%}
        .col-md-push-10 {left: 83.33333333%}
        .col-md-push-9 {left: 75%}
        .col-md-push-8 {left: 66.66666667%}
        .col-md-push-7 {left: 58.33333333%}
        .col-md-push-6 {left: 50%}
        .col-md-push-5 {left: 41.66666667%}
        .col-md-push-4 {left: 33.33333333%}
        .col-md-push-3 {left: 25%}
        .col-md-push-2 {left: 16.66666667%}
        .col-md-push-1 {left: 8.33333333%}
        .col-md-push-0 {left: auto}
        .col-md-offset-12 {margin-left: 100%}
        .col-md-offset-11 {margin-left: 91.66666667%}
        .col-md-offset-10 {margin-left: 83.33333333%}
        .col-md-offset-9 {margin-left: 75%}
        .col-md-offset-8 {margin-left: 66.66666667%}
        .col-md-offset-7 {margin-left: 58.33333333%}
        .col-md-offset-6 {margin-left: 50%}
        .col-md-offset-5 {margin-left: 41.66666667%}
        .col-md-offset-4 {margin-left: 33.33333333%}
        .col-md-offset-3 {margin-left: 25%}
        .col-md-offset-2 {margin-left: 16.66666667%}
        .col-md-offset-1 {margin-left: 8.33333333%}
        .col-md-offset-0 {margin-left: 0}
    }
    @media (min-width: 1200px) {
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9 {float: left}
        .col-lg-12 {width: 100%}
        .col-lg-11 {width: 91.66666667%}
        .col-lg-10 {width: 83.33333333%}
        .col-lg-9 {width: 75%}
        .col-lg-8 {width: 66.66666667%}
        .col-lg-7 {width: 58.33333333%}
        .col-lg-6 {width: 50%}
        .col-lg-5 {width: 41.66666667%}
        .col-lg-4 {width: 33.33333333%}
        .col-lg-3 {width: 25%}
        .col-lg-2 {width: 16.66666667%}
        .col-lg-1 {width: 8.33333333%}
        .col-lg-pull-12 {right: 100%}
        .col-lg-pull-11 {right: 91.66666667%}
        .col-lg-pull-10 {right: 83.33333333%}
        .col-lg-pull-9 {right: 75%}
        .col-lg-pull-8 {right: 66.66666667%}
        .col-lg-pull-7 {right: 58.33333333%}
        .col-lg-pull-6 {right: 50%}
        .col-lg-pull-5 {right: 41.66666667%}
        .col-lg-pull-4 {right: 33.33333333%}
        .col-lg-pull-3 {right: 25%}
        .col-lg-pull-2 {right: 16.66666667%}
        .col-lg-pull-1 {right: 8.33333333%}
        .col-lg-pull-0 {right: auto}
        .col-lg-push-12 {left: 100%}
        .col-lg-push-11 {left: 91.66666667%}
        .col-lg-push-10 {left: 83.33333333%}
        .col-lg-push-9 {left: 75%}
        .col-lg-push-8 {left: 66.66666667%}
        .col-lg-push-7 {left: 58.33333333%}
        .col-lg-push-6 {left: 50%}
        .col-lg-push-5 {left: 41.66666667%}
        .col-lg-push-4 {left: 33.33333333%}
        .col-lg-push-3 {left: 25%}
        .col-lg-push-2 {left: 16.66666667%}
        .col-lg-push-1 {left: 8.33333333%}
        .col-lg-push-0 {left: auto}
        .col-lg-offset-12 {margin-left: 100%}
        .col-lg-offset-11 {margin-left: 91.66666667%}
        .col-lg-offset-10 {margin-left: 83.33333333%}
        .col-lg-offset-9 {margin-left: 75%}
        .col-lg-offset-8 {margin-left: 66.66666667%}
        .col-lg-offset-7 {margin-left: 58.33333333%}
        .col-lg-offset-6 {margin-left: 50%}
        .col-lg-offset-5 {margin-left: 41.66666667%}
        .col-lg-offset-4 {margin-left: 33.33333333%}
        .col-lg-offset-3 {margin-left: 25%}
        .col-lg-offset-2 {margin-left: 16.66666667%}
        .col-lg-offset-1 {margin-left: 8.33333333%}
        .col-lg-offset-0 {margin-left: 0}
    }
    table {background-color: transparent}
    caption {padding-top: 8px;padding-bottom: 8px;color: #777;text-align: left}
    th {text-align: left}
    .table {width: 100%;max-width: 100%;margin-bottom: 20px}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd}
    .table > thead > tr > th {vertical-align: bottom;border-bottom: 2px solid #ddd}
    .table > caption + thead > tr:first-child > td, .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > td, .table > thead:first-child > tr:first-child > th {border-top: 0}
    .table > tbody + tbody {border-top: 2px solid #ddd}
    .table .table {background-color: #fff}
    .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {padding: 5px}
    .table-bordered {border: 1px solid #ddd}
    .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {border: 1px solid #ddd}
    .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {border-bottom-width: 2px}
    .table-striped > tbody > tr:nth-of-type(odd) {background-color: #f9f9f9}
    .table-hover > tbody > tr:hover {background-color: #f5f5f5}
    table col[class*=col-] {position: static;display: table-column;float: none}
    table td[class*=col-], table th[class*=col-] {position: static;display: table-cell;float: none}
    .table > tbody > tr.active > td, .table > tbody > tr.active > th, .table > tbody > tr > td.active, .table > tbody > tr > th.active, .table > tfoot > tr.active > td, .table > tfoot > tr.active > th, .table > tfoot > tr > td.active, .table > tfoot > tr > th.active, .table > thead > tr.active > td, .table > thead > tr.active > th, .table > thead > tr > td.active, .table > thead > tr > th.active {background-color: #f5f5f5}
    .table-hover > tbody > tr.active:hover > td, .table-hover > tbody > tr.active:hover > th, .table-hover > tbody > tr:hover > .active, .table-hover > tbody > tr > td.active:hover, .table-hover > tbody > tr > th.active:hover {background-color: #e8e8e8}
    .table > tbody > tr.success > td, .table > tbody > tr.success > th, .table > tbody > tr > td.success, .table > tbody > tr > th.success, .table > tfoot > tr.success > td, .table > tfoot > tr.success > th, .table > tfoot > tr > td.success, .table > tfoot > tr > th.success, .table > thead > tr.success > td, .table > thead > tr.success > th, .table > thead > tr > td.success, .table > thead > tr > th.success {background-color: #dff0d8}
    .table-hover > tbody > tr.success:hover > td, .table-hover > tbody > tr.success:hover > th, .table-hover > tbody > tr:hover > .success, .table-hover > tbody > tr > td.success:hover, .table-hover > tbody > tr > th.success:hover {background-color: #d0e9c6}
    .table > tbody > tr.info > td, .table > tbody > tr.info > th, .table > tbody > tr > td.info, .table > tbody > tr > th.info, .table > tfoot > tr.info > td, .table > tfoot > tr.info > th, .table > tfoot > tr > td.info, .table > tfoot > tr > th.info, .table > thead > tr.info > td, .table > thead > tr.info > th, .table > thead > tr > td.info, .table > thead > tr > th.info {background-color: #d9edf7}
    .table-hover > tbody > tr.info:hover > td, .table-hover > tbody > tr.info:hover > th, .table-hover > tbody > tr:hover > .info, .table-hover > tbody > tr > td.info:hover, .table-hover > tbody > tr > th.info:hover {background-color: #c4e3f3}
    .table > tbody > tr.warning > td, .table > tbody > tr.warning > th, .table > tbody > tr > td.warning, .table > tbody > tr > th.warning, .table > tfoot > tr.warning > td, .table > tfoot > tr.warning > th, .table > tfoot > tr > td.warning, .table > tfoot > tr > th.warning, .table > thead > tr.warning > td, .table > thead > tr.warning > th, .table > thead > tr > td.warning, .table > thead > tr > th.warning {background-color: #fcf8e3}
    .table-hover > tbody > tr.warning:hover > td, .table-hover > tbody > tr.warning:hover > th, .table-hover > tbody > tr:hover > .warning, .table-hover > tbody > tr > td.warning:hover, .table-hover > tbody > tr > th.warning:hover {background-color: #faf2cc}
    .table > tbody > tr.danger > td, .table > tbody > tr.danger > th, .table > tbody > tr > td.danger, .table > tbody > tr > th.danger, .table > tfoot > tr.danger > td, .table > tfoot > tr.danger > th, .table > tfoot > tr > td.danger, .table > tfoot > tr > th.danger, .table > thead > tr.danger > td, .table > thead > tr.danger > th, .table > thead > tr > td.danger, .table > thead > tr > th.danger {background-color: #f2dede}
    .table-hover > tbody > tr.danger:hover > td, .table-hover > tbody > tr.danger:hover > th, .table-hover > tbody > tr:hover > .danger, .table-hover > tbody > tr > td.danger:hover, .table-hover > tbody > tr > th.danger:hover {background-color: #ebcccc}
    .table-responsive {min-height: .01%;overflow-x: auto}
    @media screen and (max-width: 767px) {
        .table-responsive {width: 100%;margin-bottom: 15px;overflow-y: hidden;-ms-overflow-style: -ms-autohiding-scrollbar;border: 1px solid #ddd}
        .table-responsive > .table {margin-bottom: 0}
        .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > td, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > thead > tr > th {white-space: nowrap}
        .table-responsive > .table-bordered {border: 0}
        .table-responsive > .table-bordered > tbody > tr > td:first-child, .table-responsive > .table-bordered > tbody > tr > th:first-child, .table-responsive > .table-bordered > tfoot > tr > td:first-child, .table-responsive > .table-bordered > tfoot > tr > th:first-child, .table-responsive > .table-bordered > thead > tr > td:first-child, .table-responsive > .table-bordered > thead > tr > th:first-child {border-left: 0}
        .table-responsive > .table-bordered > tbody > tr > td:last-child, .table-responsive > .table-bordered > tbody > tr > th:last-child, .table-responsive > .table-bordered > tfoot > tr > td:last-child, .table-responsive > .table-bordered > tfoot > tr > th:last-child, .table-responsive > .table-bordered > thead > tr > td:last-child, .table-responsive > .table-bordered > thead > tr > th:last-child {border-right: 0}
        .table-responsive > .table-bordered > tbody > tr:last-child > td, .table-responsive > .table-bordered > tbody > tr:last-child > th, .table-responsive > .table-bordered > tfoot > tr:last-child > td, .table-responsive > .table-bordered > tfoot > tr:last-child > th {border-bottom: 0}
    }
    fieldset {min-width: 0;padding: 0;margin: 0;border: 0}
    legend {display: block;width: 100%;padding: 0;margin-bottom: 20px;font-size: 21px;line-height: inherit;color: #333;border: 0;border-bottom: 1px solid #e5e5e5}
    label {display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700}
    input[type=search] {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}
    input[type=checkbox], input[type=radio] {margin: 4px 0 0;margin-top: 1px \9;line-height: normal}
    input[type=file] {display: block}
    input[type=range] {display: block;width: 100%}
    select[multiple], select[size] {height: auto}
    input[type=file]:focus, input[type=checkbox]:focus, input[type=radio]:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px}
    output {display: block;padding-top: 7px;font-size: 14px;line-height: 1.42857143;color: #555}
    .form-control {display: block;width: 100%;height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s}
    .form-control:focus {border-color: #66afe9;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6)}
    .form-control::-moz-placeholder {color: #999;opacity: 1}
    .form-control:-ms-input-placeholder {color: #999}
    .form-control::-webkit-input-placeholder {color: #999}
    .form-control::-ms-expand {background-color: transparent;border: 0}
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {background-color: #eee;opacity: 1}
    .form-control[disabled], fieldset[disabled] .form-control {cursor: not-allowed}
    textarea.form-control {height: auto}
    input[type=search] {-webkit-appearance: none}
    @media screen and (-webkit-min-device-pixel-ratio: 0) {
        input[type=date].form-control, input[type=time].form-control, input[type=datetime-local].form-control, input[type=month].form-control {line-height: 34px}
        .input-group-sm input[type=date], .input-group-sm input[type=time], .input-group-sm input[type=datetime-local], .input-group-sm input[type=month], input[type=date].input-sm, input[type=time].input-sm, input[type=datetime-local].input-sm, input[type=month].input-sm {line-height: 30px}
        .input-group-lg input[type=date], .input-group-lg input[type=time], .input-group-lg input[type=datetime-local], .input-group-lg input[type=month], input[type=date].input-lg, input[type=time].input-lg, input[type=datetime-local].input-lg, input[type=month].input-lg {line-height: 46px}
    }
    .form-group {margin-bottom: 15px}
    .checkbox, .radio {position: relative;display: block;margin-top: 10px;margin-bottom: 10px}
    .checkbox label, .radio label {min-height: 20px;padding-left: 20px;margin-bottom: 0;font-weight: 400;cursor: pointer}
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {position: absolute;margin-top: 4px \9;margin-left: -20px}
    .checkbox + .checkbox, .radio + .radio {margin-top: -5px}
    .checkbox-inline, .radio-inline {position: relative;display: inline-block;padding-left: 20px;margin-bottom: 0;font-weight: 400;vertical-align: middle;cursor: pointer}
    .checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline {margin-top: 0;margin-left: 10px}
    fieldset[disabled] input[type=checkbox], fieldset[disabled] input[type=radio], input[type=checkbox].disabled, input[type=checkbox][disabled], input[type=radio].disabled, input[type=radio][disabled] {cursor: not-allowed}
    .checkbox-inline.disabled, .radio-inline.disabled, fieldset[disabled] .checkbox-inline, fieldset[disabled] .radio-inline {cursor: not-allowed}
    .checkbox.disabled label, .radio.disabled label, fieldset[disabled] .checkbox label, fieldset[disabled] .radio label {cursor: not-allowed}
    .form-control-static {min-height: 34px;padding-top: 7px;padding-bottom: 7px;margin-bottom: 0}
    .form-control-static.input-lg, .form-control-static.input-sm {padding-right: 0;padding-left: 0}
    .input-sm {height: 30px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    select.input-sm {height: 30px;line-height: 30px}
    select[multiple].input-sm, textarea.input-sm {height: auto}
    .form-group-sm .form-control {height: 30px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    .form-group-sm select.form-control {height: 30px;line-height: 30px}
    .form-group-sm select[multiple].form-control, .form-group-sm textarea.form-control {height: auto}
    .form-group-sm .form-control-static {height: 30px;min-height: 32px;padding: 6px 10px;font-size: 12px;line-height: 1.5}
    .input-lg {height: 46px;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    select.input-lg {height: 46px;line-height: 46px}
    select[multiple].input-lg, textarea.input-lg {height: auto}
    .form-group-lg .form-control {height: 46px;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    .form-group-lg select.form-control {height: 46px;line-height: 46px}
    .form-group-lg select[multiple].form-control, .form-group-lg textarea.form-control {height: auto}
    .form-group-lg .form-control-static {height: 46px;min-height: 38px;padding: 11px 16px;font-size: 18px;line-height: 1.3333333}
    .has-feedback {position: relative}
    .has-feedback .form-control {padding-right: 42.5px}
    .form-control-feedback {position: absolute;top: 0;right: 0;z-index: 2;display: block;width: 34px;height: 34px;line-height: 34px;text-align: center;pointer-events: none}
    .form-group-lg .form-control + .form-control-feedback, .input-group-lg + .form-control-feedback, .input-lg + .form-control-feedback {width: 46px;height: 46px;line-height: 46px}
    .form-group-sm .form-control + .form-control-feedback, .input-group-sm + .form-control-feedback, .input-sm + .form-control-feedback {width: 30px;height: 30px;line-height: 30px}
    .has-success .checkbox, .has-success .checkbox-inline, .has-success .control-label, .has-success .help-block, .has-success .radio, .has-success .radio-inline, .has-success.checkbox label, .has-success.checkbox-inline label, .has-success.radio label, .has-success.radio-inline label {color: #3c763d}
    .has-success .form-control {border-color: #3c763d;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)}
    .has-success .form-control:focus {border-color: #2b542c;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168}
    .has-success .input-group-addon {color: #3c763d;background-color: #dff0d8;border-color: #3c763d}
    .has-success .form-control-feedback {color: #3c763d}
    .has-warning .checkbox, .has-warning .checkbox-inline, .has-warning .control-label, .has-warning .help-block, .has-warning .radio, .has-warning .radio-inline, .has-warning.checkbox label, .has-warning.checkbox-inline label, .has-warning.radio label, .has-warning.radio-inline label {color: #8a6d3b}
    .has-warning .form-control {border-color: #8a6d3b;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)}
    .has-warning .form-control:focus {border-color: #66512c;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b}
    .has-warning .input-group-addon {color: #8a6d3b;background-color: #fcf8e3;border-color: #8a6d3b}
    .has-warning .form-control-feedback {color: #8a6d3b}
    .has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {color: #a94442}
    .has-error .form-control {border-color: #a94442;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)}
    .has-error .form-control:focus {border-color: #843534;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483}
    .has-error .input-group-addon {color: #a94442;background-color: #f2dede;border-color: #a94442}
    .has-error .form-control-feedback {color: #a94442}
    .has-feedback label ~ .form-control-feedback {top: 25px}
    .has-feedback label.sr-only ~ .form-control-feedback {top: 0}
    .help-block {display: block;margin-top: 5px;margin-bottom: 10px;color: #737373}
    @media (min-width: 768px) {
        .form-inline .form-group {display: inline-block;margin-bottom: 0;vertical-align: middle}
        .form-inline .form-control {display: inline-block;width: auto;vertical-align: middle}
        .form-inline .form-control-static {display: inline-block}
        .form-inline .input-group {display: inline-table;vertical-align: middle}
        .form-inline .input-group .form-control, .form-inline .input-group .input-group-addon, .form-inline .input-group .input-group-btn {width: auto}
        .form-inline .input-group > .form-control {width: 100%}
        .form-inline .control-label {margin-bottom: 0;vertical-align: middle}
        .form-inline .checkbox, .form-inline .radio {display: inline-block;margin-top: 0;margin-bottom: 0;vertical-align: middle}
        .form-inline .checkbox label, .form-inline .radio label {padding-left: 0}
        .form-inline .checkbox input[type=checkbox], .form-inline .radio input[type=radio] {position: relative;margin-left: 0}
        .form-inline .has-feedback .form-control-feedback {top: 0}
    }
    .form-horizontal .checkbox, .form-horizontal .checkbox-inline, .form-horizontal .radio, .form-horizontal .radio-inline {padding-top: 7px;margin-top: 0;margin-bottom: 0}
    .form-horizontal .checkbox, .form-horizontal .radio {min-height: 27px}
    .form-horizontal .form-group {margin-right: -15px;margin-left: -15px}
    @media (min-width: 768px) {
        .form-horizontal .control-label {padding-top: 7px;margin-bottom: 0;text-align: right}
    }
    .form-horizontal .has-feedback .form-control-feedback {right: 15px}
    @media (min-width: 768px) {
        .form-horizontal .form-group-lg .control-label {padding-top: 11px;font-size: 18px}
    }
    @media (min-width: 768px) {
        .form-horizontal .form-group-sm .control-label {padding-top: 6px;font-size: 12px}
    }
    .btn {display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px}
    .btn.active.focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn:active:focus, .btn:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px}
    .btn.focus, .btn:focus, .btn:hover {color: #333;text-decoration: none}
    .btn.active, .btn:active {background-image: none;outline: 0;-webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)}
    .btn.disabled, .btn[disabled], fieldset[disabled] .btn {cursor: not-allowed;filter: alpha(opacity=65);-webkit-box-shadow: none;box-shadow: none;opacity: .65}
    a.btn.disabled, fieldset[disabled] a.btn {pointer-events: none}
    .btn-default {color: #333;background-color: #fff;border-color: #ccc}
    .btn-default.focus, .btn-default:focus {color: #333;background-color: #e6e6e6;border-color: #8c8c8c}
    .btn-default:hover {color: #333;background-color: #e6e6e6;border-color: #adadad}
    .btn-default.active, .btn-default:active, .open > .dropdown-toggle.btn-default {color: #333;background-color: #e6e6e6;border-color: #adadad}
    .btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open > .dropdown-toggle.btn-default.focus, .open > .dropdown-toggle.btn-default:focus, .open > .dropdown-toggle.btn-default:hover {color: #333;background-color: #d4d4d4;border-color: #8c8c8c}
    .btn-default.active, .btn-default:active, .open > .dropdown-toggle.btn-default {background-image: none}
    .btn-default.disabled.focus, .btn-default.disabled:focus, .btn-default.disabled:hover, .btn-default[disabled].focus, .btn-default[disabled]:focus, .btn-default[disabled]:hover, fieldset[disabled] .btn-default.focus, fieldset[disabled] .btn-default:focus, fieldset[disabled] .btn-default:hover {background-color: #fff;border-color: #ccc}
    .btn-default .badge {color: #fff;background-color: #333}
    .btn-primary {color: #fff;background-color: #337ab7;border-color: #2e6da4}
    .btn-primary.focus, .btn-primary:focus {color: #fff;background-color: #286090;border-color: #122b40}
    .btn-primary:hover {color: #fff;background-color: #286090;border-color: #204d74}
    .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {color: #fff;background-color: #286090;border-color: #204d74}
    .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open > .dropdown-toggle.btn-primary.focus, .open > .dropdown-toggle.btn-primary:focus, .open > .dropdown-toggle.btn-primary:hover {color: #fff;background-color: #204d74;border-color: #122b40}
    .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {background-image: none}
    .btn-primary.disabled.focus, .btn-primary.disabled:focus, .btn-primary.disabled:hover, .btn-primary[disabled].focus, .btn-primary[disabled]:focus, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary.focus, fieldset[disabled] .btn-primary:focus, fieldset[disabled] .btn-primary:hover {background-color: #337ab7;border-color: #2e6da4}
    .btn-primary .badge {color: #337ab7;background-color: #fff}
    .btn-success {color: #fff;background-color: #5cb85c;border-color: #4cae4c}
    .btn-success.focus, .btn-success:focus {color: #fff;background-color: #449d44;border-color: #255625}
    .btn-success:hover {color: #fff;background-color: #449d44;border-color: #398439}
    .btn-success.active, .btn-success:active, .open > .dropdown-toggle.btn-success {color: #fff;background-color: #449d44;border-color: #398439}
    .btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success:active.focus, .btn-success:active:focus, .btn-success:active:hover, .open > .dropdown-toggle.btn-success.focus, .open > .dropdown-toggle.btn-success:focus, .open > .dropdown-toggle.btn-success:hover {color: #fff;background-color: #398439;border-color: #255625}
    .btn-success.active, .btn-success:active, .open > .dropdown-toggle.btn-success {background-image: none}
    .btn-success.disabled.focus, .btn-success.disabled:focus, .btn-success.disabled:hover, .btn-success[disabled].focus, .btn-success[disabled]:focus, .btn-success[disabled]:hover, fieldset[disabled] .btn-success.focus, fieldset[disabled] .btn-success:focus, fieldset[disabled] .btn-success:hover {background-color: #5cb85c;border-color: #4cae4c}
    .btn-success .badge {color: #5cb85c;background-color: #fff}
    .btn-info {color: #fff;background-color: #5bc0de;border-color: #46b8da}
    .btn-info.focus, .btn-info:focus {color: #fff;background-color: #31b0d5;border-color: #1b6d85}
    .btn-info:hover {color: #fff;background-color: #31b0d5;border-color: #269abc}
    .btn-info.active, .btn-info:active, .open > .dropdown-toggle.btn-info {color: #fff;background-color: #31b0d5;border-color: #269abc}
    .btn-info.active.focus, .btn-info.active:focus, .btn-info.active:hover, .btn-info:active.focus, .btn-info:active:focus, .btn-info:active:hover, .open > .dropdown-toggle.btn-info.focus, .open > .dropdown-toggle.btn-info:focus, .open > .dropdown-toggle.btn-info:hover {color: #fff;background-color: #269abc;border-color: #1b6d85}
    .btn-info.active, .btn-info:active, .open > .dropdown-toggle.btn-info {background-image: none}
    .btn-info.disabled.focus, .btn-info.disabled:focus, .btn-info.disabled:hover, .btn-info[disabled].focus, .btn-info[disabled]:focus, .btn-info[disabled]:hover, fieldset[disabled] .btn-info.focus, fieldset[disabled] .btn-info:focus, fieldset[disabled] .btn-info:hover {background-color: #5bc0de;border-color: #46b8da}
    .btn-info .badge {color: #5bc0de;background-color: #fff}
    .btn-warning {color: #fff;background-color: #f0ad4e;border-color: #eea236}
    .btn-warning.focus, .btn-warning:focus {color: #fff;background-color: #ec971f;border-color: #985f0d}
    .btn-warning:hover {color: #fff;background-color: #ec971f;border-color: #d58512}
    .btn-warning.active, .btn-warning:active, .open > .dropdown-toggle.btn-warning {color: #fff;background-color: #ec971f;border-color: #d58512}
    .btn-warning.active.focus, .btn-warning.active:focus, .btn-warning.active:hover, .btn-warning:active.focus, .btn-warning:active:focus, .btn-warning:active:hover, .open > .dropdown-toggle.btn-warning.focus, .open > .dropdown-toggle.btn-warning:focus, .open > .dropdown-toggle.btn-warning:hover {color: #fff;background-color: #d58512;border-color: #985f0d}
    .btn-warning.active, .btn-warning:active, .open > .dropdown-toggle.btn-warning {background-image: none}
    .btn-warning.disabled.focus, .btn-warning.disabled:focus, .btn-warning.disabled:hover, .btn-warning[disabled].focus, .btn-warning[disabled]:focus, .btn-warning[disabled]:hover, fieldset[disabled] .btn-warning.focus, fieldset[disabled] .btn-warning:focus, fieldset[disabled] .btn-warning:hover {background-color: #f0ad4e;border-color: #eea236}
    .btn-warning .badge {color: #f0ad4e;background-color: #fff}
    .btn-danger {color: #fff;background-color: #d9534f;border-color: #d43f3a}
    .btn-danger.focus, .btn-danger:focus {color: #fff;background-color: #c9302c;border-color: #761c19}
    .btn-danger:hover {color: #fff;background-color: #c9302c;border-color: #ac2925}
    .btn-danger.active, .btn-danger:active, .open > .dropdown-toggle.btn-danger {color: #fff;background-color: #c9302c;border-color: #ac2925}
    .btn-danger.active.focus, .btn-danger.active:focus, .btn-danger.active:hover, .btn-danger:active.focus, .btn-danger:active:focus, .btn-danger:active:hover, .open > .dropdown-toggle.btn-danger.focus, .open > .dropdown-toggle.btn-danger:focus, .open > .dropdown-toggle.btn-danger:hover {color: #fff;background-color: #ac2925;border-color: #761c19}
    .btn-danger.active, .btn-danger:active, .open > .dropdown-toggle.btn-danger {background-image: none}
    .btn-danger.disabled.focus, .btn-danger.disabled:focus, .btn-danger.disabled:hover, .btn-danger[disabled].focus, .btn-danger[disabled]:focus, .btn-danger[disabled]:hover, fieldset[disabled] .btn-danger.focus, fieldset[disabled] .btn-danger:focus, fieldset[disabled] .btn-danger:hover {background-color: #d9534f;border-color: #d43f3a}
    .btn-danger .badge {color: #d9534f;background-color: #fff}
    .btn-link {font-weight: 400;color: #337ab7;border-radius: 0}
    .btn-link, .btn-link.active, .btn-link:active, .btn-link[disabled], fieldset[disabled] .btn-link {background-color: transparent;-webkit-box-shadow: none;box-shadow: none}
    .btn-link, .btn-link:active, .btn-link:focus, .btn-link:hover {border-color: transparent}
    .btn-link:focus, .btn-link:hover {color: #23527c;text-decoration: underline;background-color: transparent}
    .btn-link[disabled]:focus, .btn-link[disabled]:hover, fieldset[disabled] .btn-link:focus, fieldset[disabled] .btn-link:hover {color: #777;text-decoration: none}
    .btn-group-lg > .btn, .btn-lg {padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    .btn-group-sm > .btn, .btn-sm {padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    .btn-group-xs > .btn, .btn-xs {padding: 1px 5px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    .btn-block {display: block;width: 100%}
    .btn-block + .btn-block {margin-top: 5px}
    input[type=button].btn-block, input[type=reset].btn-block, input[type=submit].btn-block {width: 100%}
    .fade {opacity: 0;-webkit-transition: opacity .15s linear;-o-transition: opacity .15s linear;transition: opacity .15s linear}
    .fade.in {opacity: 1}
    .collapse {display: none}
    .collapse.in {display: block}
    tr.collapse.in {display: table-row}
    tbody.collapse.in {display: table-row-group}
    .collapsing {position: relative;height: 0;overflow: hidden;-webkit-transition-timing-function: ease;-o-transition-timing-function: ease;transition-timing-function: ease;-webkit-transition-duration: .35s;-o-transition-duration: .35s;transition-duration: .35s;-webkit-transition-property: height, visibility;-o-transition-property: height, visibility;transition-property: height, visibility}
    .caret {display: inline-block;width: 0;height: 0;margin-left: 2px;vertical-align: middle;border-top: 4px dashed;border-top: 4px solid \9;border-right: 4px solid transparent;border-left: 4px solid transparent}
    .dropdown, .dropup {position: relative}
    .dropdown-toggle:focus {outline: 0}
    .dropdown-menu {position: absolute;top: 100%;left: 0;z-index: 1000;display: none;float: left;min-width: 160px;padding: 5px 0;margin: 2px 0 0;font-size: 14px;text-align: left;list-style: none;background-color: #fff;-webkit-background-clip: padding-box;background-clip: padding-box;border: 1px solid #ccc;border: 1px solid rgba(0, 0, 0, .15);border-radius: 4px;-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);box-shadow: 0 6px 12px rgba(0, 0, 0, .175)}
    .dropdown-menu.pull-right {right: 0;left: auto}
    .dropdown-menu .divider {height: 1px;margin: 9px 0;overflow: hidden;background-color: #e5e5e5}
    .dropdown-menu > li > a {display: block;padding: 3px 20px;clear: both;font-weight: 400;line-height: 1.42857143;color: #333;white-space: nowrap}
    .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover {color: #262626;text-decoration: none;background-color: #f5f5f5}
    .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover {color: #fff;text-decoration: none;background-color: #337ab7;outline: 0}
    .dropdown-menu > .disabled > a, .dropdown-menu > .disabled > a:focus, .dropdown-menu > .disabled > a:hover {color: #777}
    .dropdown-menu > .disabled > a:focus, .dropdown-menu > .disabled > a:hover {text-decoration: none;cursor: not-allowed;background-color: transparent;background-image: none;filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)}
    .open > .dropdown-menu {display: block}
    .open > a {outline: 0}
    .dropdown-menu-right {right: 0;left: auto}
    .dropdown-menu-left {right: auto;left: 0}
    .dropdown-header {display: block;padding: 3px 20px;font-size: 12px;line-height: 1.42857143;color: #777;white-space: nowrap}
    .dropdown-backdrop {position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 990}
    .pull-right > .dropdown-menu {right: 0;left: auto}
    .dropup .caret, .navbar-fixed-bottom .dropdown .caret {content: "";border-top: 0;border-bottom: 4px dashed;border-bottom: 4px solid \9}
    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {top: auto;bottom: 100%;margin-bottom: 2px}
    @media (min-width: 768px) {
        .navbar-right .dropdown-menu {right: 0;left: auto}
        .navbar-right .dropdown-menu-left {right: auto;left: 0}
    }
    .btn-group, .btn-group-vertical {position: relative;display: inline-block;vertical-align: middle}
    .btn-group-vertical > .btn, .btn-group > .btn {position: relative;float: left}
    .btn-group-vertical > .btn.active, .btn-group-vertical > .btn:active, .btn-group-vertical > .btn:focus, .btn-group-vertical > .btn:hover, .btn-group > .btn.active, .btn-group > .btn:active, .btn-group > .btn:focus, .btn-group > .btn:hover {z-index: 2}
    .btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group {margin-left: -1px}
    .btn-toolbar {margin-left: -5px}
    .btn-toolbar .btn, .btn-toolbar .btn-group, .btn-toolbar .input-group {float: left}
    .btn-toolbar > .btn, .btn-toolbar > .btn-group, .btn-toolbar > .input-group {margin-left: 5px}
    .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {border-radius: 0}
    .btn-group > .btn:first-child {margin-left: 0}
    .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {border-top-right-radius: 0;border-bottom-right-radius: 0}
    .btn-group > .btn:last-child:not(:first-child), .btn-group > .dropdown-toggle:not(:first-child) {border-top-left-radius: 0;border-bottom-left-radius: 0}
    .btn-group > .btn-group {float: left}
    .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {border-radius: 0}
    .btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {border-top-right-radius: 0;border-bottom-right-radius: 0}
    .btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {border-top-left-radius: 0;border-bottom-left-radius: 0}
    .btn-group .dropdown-toggle:active, .btn-group.open .dropdown-toggle {outline: 0}
    .btn-group > .btn + .dropdown-toggle {padding-right: 8px;padding-left: 8px}
    .btn-group > .btn-lg + .dropdown-toggle {padding-right: 12px;padding-left: 12px}
    .btn-group.open .dropdown-toggle {-webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)}
    .btn-group.open .dropdown-toggle.btn-link {-webkit-box-shadow: none;box-shadow: none}
    .btn .caret {margin-left: 0}
    .btn-lg .caret {border-width: 5px 5px 0;border-bottom-width: 0}
    .dropup .btn-lg .caret {border-width: 0 5px 5px}
    .btn-group-vertical > .btn, .btn-group-vertical > .btn-group, .btn-group-vertical > .btn-group > .btn {display: block;float: none;width: 100%;max-width: 100%}
    .btn-group-vertical > .btn-group > .btn {float: none}
    .btn-group-vertical > .btn + .btn, .btn-group-vertical > .btn + .btn-group, .btn-group-vertical > .btn-group + .btn, .btn-group-vertical > .btn-group + .btn-group {margin-top: -1px;margin-left: 0}
    .btn-group-vertical > .btn:not(:first-child):not(:last-child) {border-radius: 0}
    .btn-group-vertical > .btn:first-child:not(:last-child) {border-top-left-radius: 4px;border-top-right-radius: 4px;border-bottom-right-radius: 0;border-bottom-left-radius: 0}
    .btn-group-vertical > .btn:last-child:not(:first-child) {border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px}
    .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {border-radius: 0}
    .btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {border-bottom-right-radius: 0;border-bottom-left-radius: 0}
    .btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {border-top-left-radius: 0;border-top-right-radius: 0}
    .btn-group-justified {display: table;width: 100%;table-layout: fixed;border-collapse: separate}
    .btn-group-justified > .btn, .btn-group-justified > .btn-group {display: table-cell;float: none;width: 1%}
    .btn-group-justified > .btn-group .btn {width: 100%}
    .btn-group-justified > .btn-group .dropdown-menu {left: auto}
    [data-toggle=buttons] > .btn input[type=checkbox], [data-toggle=buttons] > .btn input[type=radio], [data-toggle=buttons] > .btn-group > .btn input[type=checkbox], [data-toggle=buttons] > .btn-group > .btn input[type=radio] {position: absolute;clip: rect(0, 0, 0, 0);pointer-events: none}
    .input-group {position: relative;display: table;border-collapse: separate}
    .input-group[class*=col-] {float: none;padding-right: 0;padding-left: 0}
    .input-group .form-control {position: relative;z-index: 2;float: left;width: 100%;margin-bottom: 0}
    .input-group .form-control:focus {z-index: 3}
    .input-group-lg > .form-control, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .btn {height: 46px;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    select.input-group-lg > .form-control, select.input-group-lg > .input-group-addon, select.input-group-lg > .input-group-btn > .btn {height: 46px;line-height: 46px}
    select[multiple].input-group-lg > .form-control, select[multiple].input-group-lg > .input-group-addon, select[multiple].input-group-lg > .input-group-btn > .btn, textarea.input-group-lg > .form-control, textarea.input-group-lg > .input-group-addon, textarea.input-group-lg > .input-group-btn > .btn {height: auto}
    .input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn {height: 30px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    select.input-group-sm > .form-control, select.input-group-sm > .input-group-addon, select.input-group-sm > .input-group-btn > .btn {height: 30px;line-height: 30px}
    select[multiple].input-group-sm > .form-control, select[multiple].input-group-sm > .input-group-addon, select[multiple].input-group-sm > .input-group-btn > .btn, textarea.input-group-sm > .form-control, textarea.input-group-sm > .input-group-addon, textarea.input-group-sm > .input-group-btn > .btn {height: auto}
    .input-group .form-control, .input-group-addon, .input-group-btn {display: table-cell}
    .input-group .form-control:not(:first-child):not(:last-child), .input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {border-radius: 0}
    .input-group-addon, .input-group-btn {width: 1%;white-space: nowrap;vertical-align: middle}
    .input-group-addon {padding: 6px 12px;font-size: 14px;font-weight: 400;line-height: 1;color: #555;text-align: center;background-color: #eee;border: 1px solid #ccc;border-radius: 4px}
    .input-group-addon.input-sm {padding: 5px 10px;font-size: 12px;border-radius: 3px}
    .input-group-addon.input-lg {padding: 10px 16px;font-size: 18px;border-radius: 6px}
    .input-group-addon input[type=checkbox], .input-group-addon input[type=radio] {margin-top: 0}
    .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn-group:not(:last-child) > .btn, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {border-top-right-radius: 0;border-bottom-right-radius: 0}
    .input-group-addon:first-child {border-right: 0}
    .input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child > .btn-group:not(:first-child) > .btn, .input-group-btn:first-child > .btn:not(:first-child), .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group > .btn, .input-group-btn:last-child > .dropdown-toggle {border-top-left-radius: 0;border-bottom-left-radius: 0}
    .input-group-addon:last-child {border-left: 0}
    .input-group-btn {position: relative;font-size: 0;white-space: nowrap}
    .input-group-btn > .btn {position: relative}
    .input-group-btn > .btn + .btn {margin-left: -1px}
    .input-group-btn > .btn:active, .input-group-btn > .btn:focus, .input-group-btn > .btn:hover {z-index: 2}
    .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group {margin-right: -1px}
    .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {z-index: 2;margin-left: -1px}
    .nav {padding-left: 0;margin-bottom: 0;list-style: none}
    .nav > li {position: relative;display: block}
    .nav > li > a {position: relative;display: block;padding: 10px 15px}
    .nav > li > a:focus, .nav > li > a:hover {text-decoration: none;background-color: #eee}
    .nav > li.disabled > a {color: #777}
    .nav > li.disabled > a:focus, .nav > li.disabled > a:hover {color: #777;text-decoration: none;cursor: not-allowed;background-color: transparent}
    .nav .open > a, .nav .open > a:focus, .nav .open > a:hover {background-color: #eee;border-color: #337ab7}
    .nav .nav-divider {height: 1px;margin: 9px 0;overflow: hidden;background-color: #e5e5e5}
    .nav > li > a > img {max-width: none}
    .nav-tabs {border-bottom: 1px solid #ddd}
    .nav-tabs > li {float: left;margin-bottom: -1px}
    .nav-tabs > li > a {margin-right: 2px;line-height: 1.42857143;border: 1px solid transparent;border-radius: 4px 4px 0 0}
    .nav-tabs > li > a:hover {border-color: #eee #eee #ddd}
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {color: #555;cursor: default;background-color: #fff;border: 1px solid #ddd;border-bottom-color: transparent}
    .nav-tabs.nav-justified {width: 100%;border-bottom: 0}
    .nav-tabs.nav-justified > li {float: none}
    .nav-tabs.nav-justified > li > a {margin-bottom: 5px;text-align: center}
    .nav-tabs.nav-justified > .dropdown .dropdown-menu {top: auto;left: auto}
    @media (min-width: 768px) {
        .nav-tabs.nav-justified > li {display: table-cell;width: 1%}
        .nav-tabs.nav-justified > li > a {margin-bottom: 0}
    }
    .nav-tabs.nav-justified > li > a {margin-right: 0;border-radius: 4px}
    .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:focus, .nav-tabs.nav-justified > .active > a:hover {border: 1px solid #ddd}
    @media (min-width: 768px) {
        .nav-tabs.nav-justified > li > a {border-bottom: 1px solid #ddd;border-radius: 4px 4px 0 0}
        .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:focus, .nav-tabs.nav-justified > .active > a:hover {border-bottom-color: #fff}
    }
    .nav-pills > li {float: left}
    .nav-pills > li > a {border-radius: 4px}
    .nav-pills > li + li {margin-left: 2px}
    .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {color: #fff;background-color: #337ab7}
    .nav-stacked > li {float: none}
    .nav-stacked > li + li {margin-top: 2px;margin-left: 0}
    .nav-justified {width: 100%}
    .nav-justified > li {float: none}
    .nav-justified > li > a {margin-bottom: 5px;text-align: center}
    .nav-justified > .dropdown .dropdown-menu {top: auto;left: auto}
    @media (min-width: 768px) {
        .nav-justified > li {display: table-cell;width: 1%}
        .nav-justified > li > a {margin-bottom: 0}
    }
    .nav-tabs-justified {border-bottom: 0}
    .nav-tabs-justified > li > a {margin-right: 0;border-radius: 4px}
    .nav-tabs-justified > .active > a, .nav-tabs-justified > .active > a:focus, .nav-tabs-justified > .active > a:hover {border: 1px solid #ddd}
    @media (min-width: 768px) {
        .nav-tabs-justified > li > a {border-bottom: 1px solid #ddd;border-radius: 4px 4px 0 0}
        .nav-tabs-justified > .active > a, .nav-tabs-justified > .active > a:focus, .nav-tabs-justified > .active > a:hover {border-bottom-color: #fff}
    }
    .tab-content > .tab-pane {display: none}
    .tab-content > .active {display: block}
    .nav-tabs .dropdown-menu {margin-top: -1px;border-top-left-radius: 0;border-top-right-radius: 0}
    .navbar {position: relative;min-height: 50px;margin-bottom: 20px;border: 1px solid transparent}
    @media (min-width: 768px) {
        .navbar {border-radius: 4px}
    }
    @media (min-width: 768px) {
        .navbar-header {float: left}
    }
    .navbar-collapse {padding-right: 15px;padding-left: 15px;overflow-x: visible;-webkit-overflow-scrolling: touch;border-top: 1px solid transparent;-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1)}
    .navbar-collapse.in {overflow-y: auto}
    @media (min-width: 768px) {
        .navbar-collapse {width: auto;border-top: 0;-webkit-box-shadow: none;box-shadow: none}
        .navbar-collapse.collapse {display: block !important;height: auto !important;padding-bottom: 0;overflow: visible !important}
        .navbar-collapse.in {overflow-y: visible}
        .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse, .navbar-static-top .navbar-collapse {padding-right: 0;padding-left: 0}
    }
    .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {max-height: 340px}
    @media (max-device-width: 480px) and (orientation: landscape) {
        .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {max-height: 200px}
    }
    .container-fluid > .navbar-collapse, .container-fluid > .navbar-header, .container > .navbar-collapse, .container > .navbar-header {margin-right: -15px;margin-left: -15px}
    @media (min-width: 768px) {
        .container-fluid > .navbar-collapse, .container-fluid > .navbar-header, .container > .navbar-collapse, .container > .navbar-header {margin-right: 0;margin-left: 0}
    }
    .navbar-static-top {z-index: 1000;border-width: 0 0 1px}
    @media (min-width: 768px) {
        .navbar-static-top {border-radius: 0}
    }
    .navbar-fixed-bottom, .navbar-fixed-top {position: fixed;right: 0;left: 0;z-index: 1030}
    @media (min-width: 768px) {
        .navbar-fixed-bottom, .navbar-fixed-top {border-radius: 0}
    }
    .navbar-fixed-top {top: 0;border-width: 0 0 1px}
    .navbar-fixed-bottom {bottom: 0;margin-bottom: 0;border-width: 1px 0 0}
    .navbar-brand {float: left;height: 50px;padding: 15px 15px;font-size: 18px;line-height: 20px}
    .navbar-brand:focus, .navbar-brand:hover {text-decoration: none}
    .navbar-brand > img {display: block}
    @media (min-width: 768px) {
        .navbar > .container .navbar-brand, .navbar > .container-fluid .navbar-brand {margin-left: -15px}
    }
    .navbar-toggle {position: relative;float: right;padding: 9px 10px;margin-top: 8px;margin-right: 15px;margin-bottom: 8px;background-color: transparent;background-image: none;border: 1px solid transparent;border-radius: 4px}
    .navbar-toggle:focus {outline: 0}
    .navbar-toggle .icon-bar {display: block;width: 22px;height: 2px;border-radius: 1px}
    .navbar-toggle .icon-bar + .icon-bar {margin-top: 4px}
    @media (min-width: 768px) {
        .navbar-toggle {display: none}
    }
    .navbar-nav {margin: 7.5px -15px}
    .navbar-nav > li > a {padding-top: 10px;padding-bottom: 10px;line-height: 20px}
    @media (max-width: 767px) {
        .navbar-nav .open .dropdown-menu {position: static;float: none;width: auto;margin-top: 0;background-color: transparent;border: 0;-webkit-box-shadow: none;box-shadow: none}
        .navbar-nav .open .dropdown-menu .dropdown-header, .navbar-nav .open .dropdown-menu > li > a {padding: 5px 15px 5px 25px}
        .navbar-nav .open .dropdown-menu > li > a {line-height: 20px}
        .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-nav .open .dropdown-menu > li > a:hover {background-image: none}
    }
    @media (min-width: 768px) {
        .navbar-nav {float: left;margin: 0}
        .navbar-nav > li {float: left}
        .navbar-nav > li > a {padding-top: 15px;padding-bottom: 15px}
    }
    .navbar-form {padding: 10px 15px;margin-top: 8px;margin-right: -15px;margin-bottom: 8px;margin-left: -15px;border-top: 1px solid transparent;border-bottom: 1px solid transparent;-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1)}
    @media (min-width: 768px) {
        .navbar-form .form-group {display: inline-block;margin-bottom: 0;vertical-align: middle}
        .navbar-form .form-control {display: inline-block;width: auto;vertical-align: middle}
        .navbar-form .form-control-static {display: inline-block}
        .navbar-form .input-group {display: inline-table;vertical-align: middle}
        .navbar-form .input-group .form-control, .navbar-form .input-group .input-group-addon, .navbar-form .input-group .input-group-btn {width: auto}
        .navbar-form .input-group > .form-control {width: 100%}
        .navbar-form .control-label {margin-bottom: 0;vertical-align: middle}
        .navbar-form .checkbox, .navbar-form .radio {display: inline-block;margin-top: 0;margin-bottom: 0;vertical-align: middle}
        .navbar-form .checkbox label, .navbar-form .radio label {padding-left: 0}
        .navbar-form .checkbox input[type=checkbox], .navbar-form .radio input[type=radio] {position: relative;margin-left: 0}
        .navbar-form .has-feedback .form-control-feedback {top: 0}
    }
    @media (max-width: 767px) {
        .navbar-form .form-group {margin-bottom: 5px}
        .navbar-form .form-group:last-child {margin-bottom: 0}
    }
    @media (min-width: 768px) {
        .navbar-form {width: auto;padding-top: 0;padding-bottom: 0;margin-right: 0;margin-left: 0;border: 0;-webkit-box-shadow: none;box-shadow: none}
    }
    .navbar-nav > li > .dropdown-menu {margin-top: 0;border-top-left-radius: 0;border-top-right-radius: 0}
    .navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {margin-bottom: 0;border-top-left-radius: 4px;border-top-right-radius: 4px;border-bottom-right-radius: 0;border-bottom-left-radius: 0}
    .navbar-btn {margin-top: 8px;margin-bottom: 8px}
    .navbar-btn.btn-sm {margin-top: 10px;margin-bottom: 10px}
    .navbar-btn.btn-xs {margin-top: 14px;margin-bottom: 14px}
    .navbar-text {margin-top: 15px;margin-bottom: 15px}
    @media (min-width: 768px) {
        .navbar-text {float: left;margin-right: 15px;margin-left: 15px}
    }
    @media (min-width: 768px) {
        .navbar-left {float: left !important}
        .navbar-right {float: right !important;margin-right: -15px}
        .navbar-right ~ .navbar-right {margin-right: 0}
    }
    .navbar-default {background-color: #f8f8f8;border-color: #e7e7e7}
    .navbar-default .navbar-brand {color: #777}
    .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {color: #5e5e5e;background-color: transparent}
    .navbar-default .navbar-text {color: #777}
    .navbar-default .navbar-nav > li > a {color: #777}
    .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {color: #333;background-color: transparent}
    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {color: #555;background-color: #e7e7e7}
    .navbar-default .navbar-nav > .disabled > a, .navbar-default .navbar-nav > .disabled > a:focus, .navbar-default .navbar-nav > .disabled > a:hover {color: #ccc;background-color: transparent}
    .navbar-default .navbar-toggle {border-color: #ddd}
    .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover {background-color: #ddd}
    .navbar-default .navbar-toggle .icon-bar {background-color: #888}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {border-color: #e7e7e7}
    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {color: #555;background-color: #e7e7e7}
    @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {color: #777}
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover {color: #333;background-color: transparent}
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover {color: #555;background-color: #e7e7e7}
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover {color: #ccc;background-color: transparent}
    }
    .navbar-default .navbar-link {color: #777}
    .navbar-default .navbar-link:hover {color: #333}
    .navbar-default .btn-link {color: #777}
    .navbar-default .btn-link:focus, .navbar-default .btn-link:hover {color: #333}
    .navbar-default .btn-link[disabled]:focus, .navbar-default .btn-link[disabled]:hover, fieldset[disabled] .navbar-default .btn-link:focus, fieldset[disabled] .navbar-default .btn-link:hover {color: #ccc}
    .navbar-inverse {background-color: #222;border-color: #080808}
    .navbar-inverse .navbar-brand {color: #9d9d9d}
    .navbar-inverse .navbar-brand:focus, .navbar-inverse .navbar-brand:hover {color: #fff;background-color: transparent}
    .navbar-inverse .navbar-text {color: #9d9d9d}
    .navbar-inverse .navbar-nav > li > a {color: #9d9d9d}
    .navbar-inverse .navbar-nav > li > a:focus, .navbar-inverse .navbar-nav > li > a:hover {color: #fff;background-color: transparent}
    .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover {color: #fff;background-color: #080808}
    .navbar-inverse .navbar-nav > .disabled > a, .navbar-inverse .navbar-nav > .disabled > a:focus, .navbar-inverse .navbar-nav > .disabled > a:hover {color: #444;background-color: transparent}
    .navbar-inverse .navbar-toggle {border-color: #333}
    .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {background-color: #333}
    .navbar-inverse .navbar-toggle .icon-bar {background-color: #fff}
    .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {border-color: #101010}
    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:focus, .navbar-inverse .navbar-nav > .open > a:hover {color: #fff;background-color: #080808}
    @media (max-width: 767px) {
        .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {border-color: #080808}
        .navbar-inverse .navbar-nav .open .dropdown-menu .divider {background-color: #080808}
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {color: #9d9d9d}
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover {color: #fff;background-color: transparent}
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover {color: #fff;background-color: #080808}
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover {color: #444;background-color: transparent}
    }
    .navbar-inverse .navbar-link {color: #9d9d9d}
    .navbar-inverse .navbar-link:hover {color: #fff}
    .navbar-inverse .btn-link {color: #9d9d9d}
    .navbar-inverse .btn-link:focus, .navbar-inverse .btn-link:hover {color: #fff}
    .navbar-inverse .btn-link[disabled]:focus, .navbar-inverse .btn-link[disabled]:hover, fieldset[disabled] .navbar-inverse .btn-link:focus, fieldset[disabled] .navbar-inverse .btn-link:hover {color: #444}
    .breadcrumb {padding: 8px 15px;margin-bottom: 20px;list-style: none;background-color: #f5f5f5;border-radius: 4px}
    .breadcrumb > li {display: inline-block}
    .breadcrumb > li + li:before {padding: 0 5px;color: #ccc;content: "/\00a0"}
    .breadcrumb > .active {color: #777}
    .pagination {display: inline-block;padding-left: 0;margin: 20px 0;border-radius: 4px}
    .pagination > li {display: inline}
    .pagination > li > a, .pagination > li > span {position: relative;float: left;padding: 6px 12px;margin-left: -1px;line-height: 1.42857143;color: #337ab7;text-decoration: none;background-color: #fff;border: 1px solid #ddd}
    .pagination > li:first-child > a, .pagination > li:first-child > span {margin-left: 0;border-top-left-radius: 4px;border-bottom-left-radius: 4px}
    .pagination > li:last-child > a, .pagination > li:last-child > span {border-top-right-radius: 4px;border-bottom-right-radius: 4px}
    .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover {z-index: 2;color: #23527c;background-color: #eee;border-color: #ddd}
    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {z-index: 3;color: #fff;cursor: default;background-color: #337ab7;border-color: #337ab7}
    .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {color: #777;cursor: not-allowed;background-color: #fff;border-color: #ddd}
    .pagination-lg > li > a, .pagination-lg > li > span {padding: 10px 16px;font-size: 18px;line-height: 1.3333333}
    .pagination-lg > li:first-child > a, .pagination-lg > li:first-child > span {border-top-left-radius: 6px;border-bottom-left-radius: 6px}
    .pagination-lg > li:last-child > a, .pagination-lg > li:last-child > span {border-top-right-radius: 6px;border-bottom-right-radius: 6px}
    .pagination-sm > li > a, .pagination-sm > li > span {padding: 5px 10px;font-size: 12px;line-height: 1.5}
    .pagination-sm > li:first-child > a, .pagination-sm > li:first-child > span {border-top-left-radius: 3px;border-bottom-left-radius: 3px}
    .pagination-sm > li:last-child > a, .pagination-sm > li:last-child > span {border-top-right-radius: 3px;border-bottom-right-radius: 3px}
    .pager {padding-left: 0;margin: 20px 0;text-align: center;list-style: none}
    .pager li {display: inline}
    .pager li > a, .pager li > span {display: inline-block;padding: 5px 14px;background-color: #fff;border: 1px solid #ddd;border-radius: 15px}
    .pager li > a:focus, .pager li > a:hover {text-decoration: none;background-color: #eee}
    .pager .next > a, .pager .next > span {float: right}
    .pager .previous > a, .pager .previous > span {float: left}
    .pager .disabled > a, .pager .disabled > a:focus, .pager .disabled > a:hover, .pager .disabled > span {color: #777;cursor: not-allowed;background-color: #fff}
    .label {display: inline;padding: .2em .6em .3em;font-size: 75%;font-weight: 700;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: .25em}
    a.label:focus, a.label:hover {color: #fff;text-decoration: none;cursor: pointer}
    .label:empty {display: none}
    .btn .label {position: relative;top: -1px}
    .label-default {background-color: #777}
    .label-default[href]:focus, .label-default[href]:hover {background-color: #5e5e5e}
    .label-primary {background-color: #337ab7}
    .label-primary[href]:focus, .label-primary[href]:hover {background-color: #286090}
    .label-success {background-color: #5cb85c}
    .label-success[href]:focus, .label-success[href]:hover {background-color: #449d44}
    .label-info {background-color: #5bc0de}
    .label-info[href]:focus, .label-info[href]:hover {background-color: #31b0d5}
    .label-warning {background-color: #f0ad4e}
    .label-warning[href]:focus, .label-warning[href]:hover {background-color: #ec971f}
    .label-danger {background-color: #d9534f}
    .label-danger[href]:focus, .label-danger[href]:hover {background-color: #c9302c}
    .badge {display: inline-block;min-width: 10px;padding: 3px 7px;font-size: 12px;font-weight: 700;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: middle;background-color: #777;border-radius: 10px}
    .badge:empty {display: none}
    .btn .badge {position: relative;top: -1px}
    .btn-group-xs > .btn .badge, .btn-xs .badge {top: 0;padding: 1px 5px}
    a.badge:focus, a.badge:hover {color: #fff;text-decoration: none;cursor: pointer}
    .list-group-item.active > .badge, .nav-pills > .active > a > .badge {color: #337ab7;background-color: #fff}
    .list-group-item > .badge {float: right}
    .list-group-item > .badge + .badge {margin-right: 5px}
    .nav-pills > li > a > .badge {margin-left: 3px}
    .jumbotron {padding-top: 30px;padding-bottom: 30px;margin-bottom: 30px;color: inherit;background-color: #eee}
    .jumbotron .h1, .jumbotron h1 {color: inherit}
    .jumbotron p {margin-bottom: 15px;font-size: 21px;font-weight: 200}
    .jumbotron > hr {border-top-color: #d5d5d5}
    .container .jumbotron, .container-fluid .jumbotron {padding-right: 15px;padding-left: 15px;border-radius: 6px}
    .jumbotron .container {max-width: 100%}
    @media screen and (min-width: 768px) {
        .jumbotron {padding-top: 48px;padding-bottom: 48px}
        .container .jumbotron, .container-fluid .jumbotron {padding-right: 60px;padding-left: 60px}
        .jumbotron .h1, .jumbotron h1 {font-size: 63px}
    }
    .thumbnail {display: block;padding: 4px;margin-bottom: 20px;line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;border-radius: 4px;-webkit-transition: border .2s ease-in-out;-o-transition: border .2s ease-in-out;transition: border .2s ease-in-out}
    .thumbnail a > img, .thumbnail > img {margin-right: auto;margin-left: auto}
    a.thumbnail.active, a.thumbnail:focus, a.thumbnail:hover {border-color: #337ab7}
    .thumbnail .caption {padding: 9px;color: #333}
    .alert {padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px}
    .alert h4 {margin-top: 0;color: inherit}
    .alert .alert-link {font-weight: 700}
    .alert > p, .alert > ul {margin-bottom: 0}
    .alert > p + p {margin-top: 5px}
    .alert-dismissable, .alert-dismissible {padding-right: 35px}
    .alert-dismissable .close, .alert-dismissible .close {position: relative;top: -2px;right: -21px;color: inherit}
    .alert-success {color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6}
    .alert-success hr {border-top-color: #c9e2b3}
    .alert-success .alert-link {color: #2b542c}
    .alert-info {color: #31708f;background-color: #d9edf7;border-color: #bce8f1}
    .alert-info hr {border-top-color: #a6e1ec}
    .alert-info .alert-link {color: #245269}
    .alert-warning {color: #8a6d3b;background-color: #fcf8e3;border-color: #faebcc}
    .alert-warning hr {border-top-color: #f7e1b5}
    .alert-warning .alert-link {color: #66512c}
    .alert-danger {color: #a94442;background-color: #f2dede;border-color: #ebccd1}
    .alert-danger hr {border-top-color: #e4b9c0}
    .alert-danger .alert-link {color: #843534}
    @-webkit-keyframes progress-bar-stripes {
        from {background-position: 40px 0}
        to {background-position: 0 0}
    }
    @-o-keyframes progress-bar-stripes {
        from {background-position: 40px 0}
        to {background-position: 0 0}
    }
    @keyframes progress-bar-stripes {
        from {background-position: 40px 0}
        to {background-position: 0 0}
    }
    .progress {height: 20px;margin-bottom: 20px;overflow: hidden;background-color: #f5f5f5;border-radius: 4px;-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1)}
    .progress-bar {float: left;width: 0;height: 100%;font-size: 12px;line-height: 20px;color: #fff;text-align: center;background-color: #337ab7;-webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);-webkit-transition: width .6s ease;-o-transition: width .6s ease;transition: width .6s ease}
    .progress-bar-striped, .progress-striped .progress-bar {background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);-webkit-background-size: 40px 40px;background-size: 40px 40px}
    .progress-bar.active, .progress.active .progress-bar {-webkit-animation: progress-bar-stripes 2s linear infinite;-o-animation: progress-bar-stripes 2s linear infinite;animation: progress-bar-stripes 2s linear infinite}
    .progress-bar-success {background-color: #5cb85c}
    .progress-striped .progress-bar-success {background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)}
    .progress-bar-info {background-color: #5bc0de}
    .progress-striped .progress-bar-info {background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)}
    .progress-bar-warning {background-color: #f0ad4e}
    .progress-striped .progress-bar-warning {background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)}
    .progress-bar-danger {background-color: #d9534f}
    .progress-striped .progress-bar-danger {background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)}
    .media {margin-top: 15px}
    .media:first-child {margin-top: 0}
    .media, .media-body {overflow: hidden;zoom: 1}
    .media-body {width: 10000px}
    .media-object {display: block}
    .media-object.img-thumbnail {max-width: none}
    .media-right, .media > .pull-right {padding-left: 10px}
    .media-left, .media > .pull-left {padding-right: 10px}
    .media-body, .media-left, .media-right {display: table-cell;vertical-align: top}
    .media-middle {vertical-align: middle}
    .media-bottom {vertical-align: bottom}
    .media-heading {margin-top: 0;margin-bottom: 5px}
    .media-list {padding-left: 0;list-style: none}
    .list-group {padding-left: 0;margin-bottom: 20px}
    .list-group-item {position: relative;display: block;padding: 10px 15px;margin-bottom: -1px;background-color: #fff;border: 1px solid #ddd}
    .list-group-item:first-child {border-top-left-radius: 4px;border-top-right-radius: 4px}
    .list-group-item:last-child {margin-bottom: 0;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px}
    a.list-group-item, button.list-group-item {color: #555}
    a.list-group-item .list-group-item-heading, button.list-group-item .list-group-item-heading {color: #333}
    a.list-group-item:focus, a.list-group-item:hover, button.list-group-item:focus, button.list-group-item:hover {color: #555;text-decoration: none;background-color: #f5f5f5}
    button.list-group-item {width: 100%;text-align: left}
    .list-group-item.disabled, .list-group-item.disabled:focus, .list-group-item.disabled:hover {color: #777;cursor: not-allowed;background-color: #eee}
    .list-group-item.disabled .list-group-item-heading, .list-group-item.disabled:focus .list-group-item-heading, .list-group-item.disabled:hover .list-group-item-heading {color: inherit}
    .list-group-item.disabled .list-group-item-text, .list-group-item.disabled:focus .list-group-item-text, .list-group-item.disabled:hover .list-group-item-text {color: #777}
    .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {z-index: 2;color: #fff;background-color: #337ab7;border-color: #337ab7}
    .list-group-item.active .list-group-item-heading, .list-group-item.active .list-group-item-heading > .small, .list-group-item.active .list-group-item-heading > small, .list-group-item.active:focus .list-group-item-heading, .list-group-item.active:focus .list-group-item-heading > .small, .list-group-item.active:focus .list-group-item-heading > small, .list-group-item.active:hover .list-group-item-heading, .list-group-item.active:hover .list-group-item-heading > .small, .list-group-item.active:hover .list-group-item-heading > small {color: inherit}
    .list-group-item.active .list-group-item-text, .list-group-item.active:focus .list-group-item-text, .list-group-item.active:hover .list-group-item-text {color: #c7ddef}
    .list-group-item-success {color: #3c763d;background-color: #dff0d8}
    a.list-group-item-success, button.list-group-item-success {color: #3c763d}
    a.list-group-item-success .list-group-item-heading, button.list-group-item-success .list-group-item-heading {color: inherit}
    a.list-group-item-success:focus, a.list-group-item-success:hover, button.list-group-item-success:focus, button.list-group-item-success:hover {color: #3c763d;background-color: #d0e9c6}
    a.list-group-item-success.active, a.list-group-item-success.active:focus, a.list-group-item-success.active:hover, button.list-group-item-success.active, button.list-group-item-success.active:focus, button.list-group-item-success.active:hover {color: #fff;background-color: #3c763d;border-color: #3c763d}
    .list-group-item-info {color: #31708f;background-color: #d9edf7}
    a.list-group-item-info, button.list-group-item-info {color: #31708f}
    a.list-group-item-info .list-group-item-heading, button.list-group-item-info .list-group-item-heading {color: inherit}
    a.list-group-item-info:focus, a.list-group-item-info:hover, button.list-group-item-info:focus, button.list-group-item-info:hover {color: #31708f;background-color: #c4e3f3}
    a.list-group-item-info.active, a.list-group-item-info.active:focus, a.list-group-item-info.active:hover, button.list-group-item-info.active, button.list-group-item-info.active:focus, button.list-group-item-info.active:hover {color: #fff;background-color: #31708f;border-color: #31708f}
    .list-group-item-warning {color: #8a6d3b;background-color: #fcf8e3}
    a.list-group-item-warning, button.list-group-item-warning {color: #8a6d3b}
    a.list-group-item-warning .list-group-item-heading, button.list-group-item-warning .list-group-item-heading {color: inherit}
    a.list-group-item-warning:focus, a.list-group-item-warning:hover, button.list-group-item-warning:focus, button.list-group-item-warning:hover {color: #8a6d3b;background-color: #faf2cc}
    a.list-group-item-warning.active, a.list-group-item-warning.active:focus, a.list-group-item-warning.active:hover, button.list-group-item-warning.active, button.list-group-item-warning.active:focus, button.list-group-item-warning.active:hover {color: #fff;background-color: #8a6d3b;border-color: #8a6d3b}
    .list-group-item-danger {color: #a94442;background-color: #f2dede}
    a.list-group-item-danger, button.list-group-item-danger {color: #a94442}
    a.list-group-item-danger .list-group-item-heading, button.list-group-item-danger .list-group-item-heading {color: inherit}
    a.list-group-item-danger:focus, a.list-group-item-danger:hover, button.list-group-item-danger:focus, button.list-group-item-danger:hover {color: #a94442;background-color: #ebcccc}
    a.list-group-item-danger.active, a.list-group-item-danger.active:focus, a.list-group-item-danger.active:hover, button.list-group-item-danger.active, button.list-group-item-danger.active:focus, button.list-group-item-danger.active:hover {color: #fff;background-color: #a94442;border-color: #a94442}
    .list-group-item-heading {margin-top: 0;margin-bottom: 5px}
    .list-group-item-text {margin-bottom: 0;line-height: 1.3}
    .panel {margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);box-shadow: 0 1px 1px rgba(0, 0, 0, .05)}
    .panel-body {padding: 15px}
    .panel-heading {padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px}
    .panel-heading > .dropdown .dropdown-toggle {color: inherit}
    .panel-title {margin-top: 0;margin-bottom: 0;font-size: 16px;color: inherit}
    .panel-title > .small, .panel-title > .small > a, .panel-title > a, .panel-title > small, .panel-title > small > a {color: inherit}
    .panel-footer {padding: 10px 15px;background-color: #f5f5f5;border-top: 1px solid #ddd;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px}
    .panel > .list-group, .panel > .panel-collapse > .list-group {margin-bottom: 0}
    .panel > .list-group .list-group-item, .panel > .panel-collapse > .list-group .list-group-item {border-width: 1px 0;border-radius: 0}
    .panel > .list-group:first-child .list-group-item:first-child, .panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {border-top: 0;border-top-left-radius: 3px;border-top-right-radius: 3px}
    .panel > .list-group:last-child .list-group-item:last-child, .panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {border-bottom: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px}
    .panel > .panel-heading + .panel-collapse > .list-group .list-group-item:first-child {border-top-left-radius: 0;border-top-right-radius: 0}
    .panel-heading + .list-group .list-group-item:first-child {border-top-width: 0}
    .list-group + .panel-footer {border-top-width: 0}
    .panel > .panel-collapse > .table, .panel > .table, .panel > .table-responsive > .table {margin-bottom: 0}
    .panel > .panel-collapse > .table caption, .panel > .table caption, .panel > .table-responsive > .table caption {padding-right: 15px;padding-left: 15px}
    .panel > .table-responsive:first-child > .table:first-child, .panel > .table:first-child {border-top-left-radius: 3px;border-top-right-radius: 3px}
    .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child, .panel > .table:first-child > thead:first-child > tr:first-child {border-top-left-radius: 3px;border-top-right-radius: 3px}
    .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child td:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child th:first-child, .panel > .table:first-child > thead:first-child > tr:first-child td:first-child, .panel > .table:first-child > thead:first-child > tr:first-child th:first-child {border-top-left-radius: 3px}
    .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child, .panel > .table:first-child > tbody:first-child > tr:first-child td:last-child, .panel > .table:first-child > tbody:first-child > tr:first-child th:last-child, .panel > .table:first-child > thead:first-child > tr:first-child td:last-child, .panel > .table:first-child > thead:first-child > tr:first-child th:last-child {border-top-right-radius: 3px}
    .panel > .table-responsive:last-child > .table:last-child, .panel > .table:last-child {border-bottom-right-radius: 3px;border-bottom-left-radius: 3px}
    .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child, .panel > .table:last-child > tbody:last-child > tr:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child {border-bottom-right-radius: 3px;border-bottom-left-radius: 3px}
    .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child, .panel > .table:last-child > tbody:last-child > tr:last-child td:first-child, .panel > .table:last-child > tbody:last-child > tr:last-child th:first-child, .panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child, .panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child {border-bottom-left-radius: 3px}
    .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child, .panel > .table:last-child > tbody:last-child > tr:last-child td:last-child, .panel > .table:last-child > tbody:last-child > tr:last-child th:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child {border-bottom-right-radius: 3px}
    .panel > .panel-body + .table, .panel > .panel-body + .table-responsive, .panel > .table + .panel-body, .panel > .table-responsive + .panel-body {border-top: 1px solid #ddd}
    .panel > .table > tbody:first-child > tr:first-child td, .panel > .table > tbody:first-child > tr:first-child th {border-top: 0}
    .panel > .table-bordered, .panel > .table-responsive > .table-bordered {border: 0}
    .panel > .table-bordered > tbody > tr > td:first-child, .panel > .table-bordered > tbody > tr > th:first-child, .panel > .table-bordered > tfoot > tr > td:first-child, .panel > .table-bordered > tfoot > tr > th:first-child, .panel > .table-bordered > thead > tr > td:first-child, .panel > .table-bordered > thead > tr > th:first-child, .panel > .table-responsive > .table-bordered > tbody > tr > td:first-child, .panel > .table-responsive > .table-bordered > tbody > tr > th:first-child, .panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child, .panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child, .panel > .table-responsive > .table-bordered > thead > tr > td:first-child, .panel > .table-responsive > .table-bordered > thead > tr > th:first-child {border-left: 0}
    .panel > .table-bordered > tbody > tr > td:last-child, .panel > .table-bordered > tbody > tr > th:last-child, .panel > .table-bordered > tfoot > tr > td:last-child, .panel > .table-bordered > tfoot > tr > th:last-child, .panel > .table-bordered > thead > tr > td:last-child, .panel > .table-bordered > thead > tr > th:last-child, .panel > .table-responsive > .table-bordered > tbody > tr > td:last-child, .panel > .table-responsive > .table-bordered > tbody > tr > th:last-child, .panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child, .panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child, .panel > .table-responsive > .table-bordered > thead > tr > td:last-child, .panel > .table-responsive > .table-bordered > thead > tr > th:last-child {border-right: 0}
    .panel > .table-bordered > tbody > tr:first-child > td, .panel > .table-bordered > tbody > tr:first-child > th, .panel > .table-bordered > thead > tr:first-child > td, .panel > .table-bordered > thead > tr:first-child > th, .panel > .table-responsive > .table-bordered > tbody > tr:first-child > td, .panel > .table-responsive > .table-bordered > tbody > tr:first-child > th, .panel > .table-responsive > .table-bordered > thead > tr:first-child > td, .panel > .table-responsive > .table-bordered > thead > tr:first-child > th {border-bottom: 0}
    .panel > .table-bordered > tbody > tr:last-child > td, .panel > .table-bordered > tbody > tr:last-child > th, .panel > .table-bordered > tfoot > tr:last-child > td, .panel > .table-bordered > tfoot > tr:last-child > th, .panel > .table-responsive > .table-bordered > tbody > tr:last-child > td, .panel > .table-responsive > .table-bordered > tbody > tr:last-child > th, .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td, .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {border-bottom: 0}
    .panel > .table-responsive {margin-bottom: 0;border: 0}
    .panel-group {margin-bottom: 20px}
    .panel-group .panel {margin-bottom: 0;border-radius: 4px}
    .panel-group .panel + .panel {margin-top: 5px}
    .panel-group .panel-heading {border-bottom: 0}
    .panel-group .panel-heading + .panel-collapse > .list-group, .panel-group .panel-heading + .panel-collapse > .panel-body {border-top: 1px solid #ddd}
    .panel-group .panel-footer {border-top: 0}
    .panel-group .panel-footer + .panel-collapse .panel-body {border-bottom: 1px solid #ddd}
    .panel-default {border-color: #ddd}
    .panel-default > .panel-heading {color: #333;background-color: #f5f5f5;border-color: #ddd}
    .panel-default > .panel-heading + .panel-collapse > .panel-body {border-top-color: #ddd}
    .panel-default > .panel-heading .badge {color: #f5f5f5;background-color: #333}
    .panel-default > .panel-footer + .panel-collapse > .panel-body {border-bottom-color: #ddd}
    .panel-primary {border-color: #337ab7}
    .panel-primary > .panel-heading {color: #fff;background-color: #337ab7;border-color: #337ab7}
    .panel-primary > .panel-heading + .panel-collapse > .panel-body {border-top-color: #337ab7}
    .panel-primary > .panel-heading .badge {color: #337ab7;background-color: #fff}
    .panel-primary > .panel-footer + .panel-collapse > .panel-body {border-bottom-color: #337ab7}
    .panel-success {border-color: #d6e9c6}
    .panel-success > .panel-heading {color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6}
    .panel-success > .panel-heading + .panel-collapse > .panel-body {border-top-color: #d6e9c6}
    .panel-success > .panel-heading .badge {color: #dff0d8;background-color: #3c763d}
    .panel-success > .panel-footer + .panel-collapse > .panel-body {border-bottom-color: #d6e9c6}
    .panel-info {border-color: #bce8f1}
    .panel-info > .panel-heading {color: #31708f;background-color: #d9edf7;border-color: #bce8f1}
    .panel-info > .panel-heading + .panel-collapse > .panel-body {border-top-color: #bce8f1}
    .panel-info > .panel-heading .badge {color: #d9edf7;background-color: #31708f}
    .panel-info > .panel-footer + .panel-collapse > .panel-body {border-bottom-color: #bce8f1}
    .panel-warning {border-color: #faebcc}
    .panel-warning > .panel-heading {color: #8a6d3b;background-color: #fcf8e3;border-color: #faebcc}
    .panel-warning > .panel-heading + .panel-collapse > .panel-body {border-top-color: #faebcc}
    .panel-warning > .panel-heading .badge {color: #fcf8e3;background-color: #8a6d3b}
    .panel-warning > .panel-footer + .panel-collapse > .panel-body {border-bottom-color: #faebcc}
    .panel-danger {border-color: #ebccd1}
    .panel-danger > .panel-heading {color: #a94442;background-color: #f2dede;border-color: #ebccd1}
    .panel-danger > .panel-heading + .panel-collapse > .panel-body {border-top-color: #ebccd1}
    .panel-danger > .panel-heading .badge {color: #f2dede;background-color: #a94442}
    .panel-danger > .panel-footer + .panel-collapse > .panel-body {border-bottom-color: #ebccd1}
    .embed-responsive {position: relative;display: block;height: 0;padding: 0;overflow: hidden}
    .embed-responsive .embed-responsive-item, .embed-responsive embed, .embed-responsive iframe, .embed-responsive object, .embed-responsive video {position: absolute;top: 0;bottom: 0;left: 0;width: 100%;height: 100%;border: 0}
    .embed-responsive-16by9 {padding-bottom: 56.25%}
    .embed-responsive-4by3 {padding-bottom: 75%}
    .well {min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid #e3e3e3;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05)}
    .well blockquote {border-color: #ddd;border-color: rgba(0, 0, 0, .15)}
    .well-lg {padding: 24px;border-radius: 6px}
    .well-sm {padding: 9px;border-radius: 3px}
    .close {float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);opacity: .2}
    .close:focus, .close:hover {color: #000;text-decoration: none;cursor: pointer;filter: alpha(opacity=50);opacity: .5}
    button.close {-webkit-appearance: none;padding: 0;cursor: pointer;background: 0 0;border: 0}
    .modal-open {overflow: hidden}
    .modal {position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 1050;display: none;overflow: hidden;-webkit-overflow-scrolling: touch;outline: 0}
    .modal.fade .modal-dialog {-webkit-transition: -webkit-transform .3s ease-out;-o-transition: -o-transform .3s ease-out;transition: transform .3s ease-out;-webkit-transform: translate(0, -25%);-ms-transform: translate(0, -25%);-o-transform: translate(0, -25%);transform: translate(0, -25%)}
    .modal.in .modal-dialog {-webkit-transform: translate(0, 0);-ms-transform: translate(0, 0);-o-transform: translate(0, 0);transform: translate(0, 0)}
    .modal-open .modal {overflow-x: hidden;overflow-y: auto}
    .modal-dialog {position: relative;width: auto;margin: 10px}
    .modal-content {position: relative;background-color: #fff;-webkit-background-clip: padding-box;background-clip: padding-box;border: 1px solid #999;border: 1px solid rgba(0, 0, 0, .2);border-radius: 6px;outline: 0;-webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);box-shadow: 0 3px 9px rgba(0, 0, 0, .5)}
    .modal-backdrop {position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 1040;background-color: #000}
    .modal-backdrop.fade {filter: alpha(opacity=0);opacity: 0}
    .modal-backdrop.in {filter: alpha(opacity=50);opacity: .5}
    .modal-header {padding: 15px;border-bottom: 1px solid #e5e5e5}
    .modal-header .close {margin-top: -2px}
    .modal-title {margin: 0;line-height: 1.42857143}
    .modal-body {position: relative;padding: 15px}
    .modal-footer {padding: 15px;text-align: right;border-top: 1px solid #e5e5e5}
    .modal-footer .btn + .btn {margin-bottom: 0;margin-left: 5px}
    .modal-footer .btn-group .btn + .btn {margin-left: -1px}
    .modal-footer .btn-block + .btn-block {margin-left: 0}
    .modal-scrollbar-measure {position: absolute;top: -9999px;width: 50px;height: 50px;overflow: scroll}
    @media (min-width: 768px) {
        .modal-dialog {width: 600px;margin: 30px auto}
        .modal-content {-webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);box-shadow: 0 5px 15px rgba(0, 0, 0, .5)}
        .modal-sm {width: 300px}
    }
    @media (min-width: 992px) {
        .modal-lg {width: 900px}
    }
    .tooltip {position: absolute;z-index: 1070;display: block;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size: 12px;font-style: normal;font-weight: 400;line-height: 1.42857143;text-align: left;text-align: start;text-decoration: none;text-shadow: none;text-transform: none;letter-spacing: normal;word-break: normal;word-spacing: normal;word-wrap: normal;white-space: normal;filter: alpha(opacity=0);opacity: 0;line-break: auto}
    .tooltip.in {filter: alpha(opacity=90);opacity: .9}
    .tooltip.top {padding: 5px 0;margin-top: -3px}
    .tooltip.right {padding: 0 5px;margin-left: 3px}
    .tooltip.bottom {padding: 5px 0;margin-top: 3px}
    .tooltip.left {padding: 0 5px;margin-left: -3px}
    .tooltip-inner {max-width: 200px;padding: 3px 8px;color: #fff;text-align: center;background-color: #000;border-radius: 4px}
    .tooltip-arrow {position: absolute;width: 0;height: 0;border-color: transparent;border-style: solid}
    .tooltip.top .tooltip-arrow {bottom: 0;left: 50%;margin-left: -5px;border-width: 5px 5px 0;border-top-color: #000}
    .tooltip.top-left .tooltip-arrow {right: 5px;bottom: 0;margin-bottom: -5px;border-width: 5px 5px 0;border-top-color: #000}
    .tooltip.top-right .tooltip-arrow {bottom: 0;left: 5px;margin-bottom: -5px;border-width: 5px 5px 0;border-top-color: #000}
    .tooltip.right .tooltip-arrow {top: 50%;left: 0;margin-top: -5px;border-width: 5px 5px 5px 0;border-right-color: #000}
    .tooltip.left .tooltip-arrow {top: 50%;right: 0;margin-top: -5px;border-width: 5px 0 5px 5px;border-left-color: #000}
    .tooltip.bottom .tooltip-arrow {top: 0;left: 50%;margin-left: -5px;border-width: 0 5px 5px;border-bottom-color: #000}
    .tooltip.bottom-left .tooltip-arrow {top: 0;right: 5px;margin-top: -5px;border-width: 0 5px 5px;border-bottom-color: #000}
    .tooltip.bottom-right .tooltip-arrow {top: 0;left: 5px;margin-top: -5px;border-width: 0 5px 5px;border-bottom-color: #000}
    .popover {position: absolute;top: 0;left: 0;z-index: 1060;display: none;max-width: 276px;padding: 1px;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size: 14px;font-style: normal;font-weight: 400;line-height: 1.42857143;text-align: left;text-align: start;text-decoration: none;text-shadow: none;text-transform: none;letter-spacing: normal;word-break: normal;word-spacing: normal;word-wrap: normal;white-space: normal;background-color: #fff;-webkit-background-clip: padding-box;background-clip: padding-box;border: 1px solid #ccc;border: 1px solid rgba(0, 0, 0, .2);border-radius: 6px;-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);box-shadow: 0 5px 10px rgba(0, 0, 0, .2);line-break: auto}
    .popover.top {margin-top: -10px}
    .popover.right {margin-left: 10px}
    .popover.bottom {margin-top: 10px}
    .popover.left {margin-left: -10px}
    .popover-title {padding: 8px 14px;margin: 0;font-size: 14px;background-color: #f7f7f7;border-bottom: 1px solid #ebebeb;border-radius: 5px 5px 0 0}
    .popover-content {padding: 9px 14px}
    .popover > .arrow, .popover > .arrow:after {position: absolute;display: block;width: 0;height: 0;border-color: transparent;border-style: solid}
    .popover > .arrow {border-width: 11px}
    .popover > .arrow:after {content: "";border-width: 10px}
    .popover.top > .arrow {bottom: -11px;left: 50%;margin-left: -11px;border-top-color: #999;border-top-color: rgba(0, 0, 0, .25);border-bottom-width: 0}
    .popover.top > .arrow:after {bottom: 1px;margin-left: -10px;content: " ";border-top-color: #fff;border-bottom-width: 0}
    .popover.right > .arrow {top: 50%;left: -11px;margin-top: -11px;border-right-color: #999;border-right-color: rgba(0, 0, 0, .25);border-left-width: 0}
    .popover.right > .arrow:after {bottom: -10px;left: 1px;content: " ";border-right-color: #fff;border-left-width: 0}
    .popover.bottom > .arrow {top: -11px;left: 50%;margin-left: -11px;border-top-width: 0;border-bottom-color: #999;border-bottom-color: rgba(0, 0, 0, .25)}
    .popover.bottom > .arrow:after {top: 1px;margin-left: -10px;content: " ";border-top-width: 0;border-bottom-color: #fff}
    .popover.left > .arrow {top: 50%;right: -11px;margin-top: -11px;border-right-width: 0;border-left-color: #999;border-left-color: rgba(0, 0, 0, .25)}
    .popover.left > .arrow:after {right: 1px;bottom: -10px;content: " ";border-right-width: 0;border-left-color: #fff}
    .carousel {position: relative}
    .carousel-inner {position: relative;width: 100%;overflow: hidden}
    .carousel-inner > .item {position: relative;display: none;-webkit-transition: .6s ease-in-out left;-o-transition: .6s ease-in-out left;transition: .6s ease-in-out left}
    .carousel-inner > .item > a > img, .carousel-inner > .item > img {line-height: 1}
    @media all and (transform-3d),(-webkit-transform-3d) {
        .carousel-inner > .item {-webkit-transition: -webkit-transform .6s ease-in-out;-o-transition: -o-transform .6s ease-in-out;transition: transform .6s ease-in-out;-webkit-backface-visibility: hidden;backface-visibility: hidden;-webkit-perspective: 1000px;perspective: 1000px}
        .carousel-inner > .item.active.right, .carousel-inner > .item.next {left: 0;-webkit-transform: translate3d(100%, 0, 0);transform: translate3d(100%, 0, 0)}
        .carousel-inner > .item.active.left, .carousel-inner > .item.prev {left: 0;-webkit-transform: translate3d(-100%, 0, 0);transform: translate3d(-100%, 0, 0)}
        .carousel-inner > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right {left: 0;-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}
    }
    .carousel-inner > .active, .carousel-inner > .next, .carousel-inner > .prev {display: block}
    .carousel-inner > .active {left: 0}
    .carousel-inner > .next, .carousel-inner > .prev {position: absolute;top: 0;width: 100%}
    .carousel-inner > .next {left: 100%}
    .carousel-inner > .prev {left: -100%}
    .carousel-inner > .next.left, .carousel-inner > .prev.right {left: 0}
    .carousel-inner > .active.left {left: -100%}
    .carousel-inner > .active.right {left: 100%}
    .carousel-control {position: absolute;top: 0;bottom: 0;left: 0;width: 15%;font-size: 20px;color: #fff;text-align: center;text-shadow: 0 1px 2px rgba(0, 0, 0, .6);background-color: rgba(0, 0, 0, 0);filter: alpha(opacity=50);opacity: .5}
    .carousel-control.left {background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);background-image: -o-linear-gradient(left, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));background-image: linear-gradient(to right, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);background-repeat: repeat-x}
    .carousel-control.right {right: 0;left: auto;background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);background-image: -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));background-image: linear-gradient(to right, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);background-repeat: repeat-x}
    .carousel-control:focus, .carousel-control:hover {color: #fff;text-decoration: none;filter: alpha(opacity=90);outline: 0;opacity: .9}
    .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev {position: absolute;top: 50%;z-index: 5;display: inline-block;margin-top: -10px}
    .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {left: 50%;margin-left: -10px}
    .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {right: 50%;margin-right: -10px}
    .carousel-control .icon-next, .carousel-control .icon-prev {width: 20px;height: 20px;font-family: serif;line-height: 1}
    .carousel-control .icon-prev:before {content: '\2039'}
    .carousel-control .icon-next:before {content: '\203a'}
    .carousel-indicators {position: absolute;bottom: 10px;left: 50%;z-index: 15;width: 60%;padding-left: 0;margin-left: -30%;text-align: center;list-style: none}
    .carousel-indicators li {display: inline-block;width: 10px;height: 10px;margin: 1px;text-indent: -999px;cursor: pointer;background-color: #000 \9;background-color: rgba(0, 0, 0, 0);border: 1px solid #fff;border-radius: 10px}
    .carousel-indicators .active {width: 12px;height: 12px;margin: 0;background-color: #fff}
    .carousel-caption {position: absolute;right: 15%;bottom: 20px;left: 15%;z-index: 10;padding-top: 20px;padding-bottom: 20px;color: #fff;text-align: center;text-shadow: 0 1px 2px rgba(0, 0, 0, .6)}
    .carousel-caption .btn {text-shadow: none}
    @media screen and (min-width: 768px) {
        .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev {width: 30px;height: 30px;margin-top: -10px;font-size: 30px}
        .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {margin-left: -10px}
        .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {margin-right: -10px}
        .carousel-caption {right: 20%;left: 20%;padding-bottom: 30px}
        .carousel-indicators {bottom: 20px}
    }
    .btn-group-vertical > .btn-group:after, .btn-group-vertical > .btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {display: table;content: " "}
    .btn-group-vertical > .btn-group:after, .btn-toolbar:after, .clearfix:after, .container-fluid:after, .container:after, .dl-horizontal dd:after, .form-horizontal .form-group:after, .modal-footer:after, .modal-header:after, .nav:after, .navbar-collapse:after, .navbar-header:after, .navbar:after, .pager:after, .panel-body:after, .row:after {clear: both}
    .center-block {display: block;margin-right: auto;margin-left: auto}
    .pull-right {float: right !important}
    .pull-left {float: left !important}
    .hide {display: none !important}
    .show {display: block !important}
    .invisible {visibility: hidden}
    .text-hide {font: 0/0 a;color: transparent;text-shadow: none;background-color: transparent;border: 0}
    .hidden {display: none !important}
    .affix {position: fixed}
    @-ms-viewport {
        width: device-width
    }
    .visible-lg, .visible-md, .visible-sm, .visible-xs {display: none !important}
    .visible-lg-block, .visible-lg-inline, .visible-lg-inline-block, .visible-md-block, .visible-md-inline, .visible-md-inline-block, .visible-sm-block, .visible-sm-inline, .visible-sm-inline-block, .visible-xs-block, .visible-xs-inline, .visible-xs-inline-block {display: none !important}
    @media (max-width: 767px) {
        .visible-xs {display: block !important}
        table.visible-xs {display: table !important}
        tr.visible-xs {display: table-row !important}
        td.visible-xs, th.visible-xs {display: table-cell !important}
    }
    @media (max-width: 767px) {
        .visible-xs-block {display: block !important}
    }
    @media (max-width: 767px) {
        .visible-xs-inline {display: inline !important}
    }
    @media (max-width: 767px) {
        .visible-xs-inline-block {display: inline-block !important}
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm {display: block !important}
        table.visible-sm {display: table !important}
        tr.visible-sm {display: table-row !important}
        td.visible-sm, th.visible-sm {display: table-cell !important}
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm-block {display: block !important}
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm-inline {display: inline !important}
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm-inline-block {display: inline-block !important}
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md {display: block !important}
        table.visible-md {display: table !important}
        tr.visible-md {display: table-row !important}
        td.visible-md, th.visible-md {display: table-cell !important}
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md-block {display: block !important}
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md-inline {display: inline !important}
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md-inline-block {display: inline-block !important}
    }
    @media (min-width: 1200px) {
        .visible-lg {display: block !important}
        table.visible-lg {display: table !important}
        tr.visible-lg {display: table-row !important}
        td.visible-lg, th.visible-lg {display: table-cell !important}
    }
    @media (min-width: 1200px) {
        .visible-lg-block {display: block !important}
    }
    @media (min-width: 1200px) {
        .visible-lg-inline {display: inline !important}
    }
    @media (min-width: 1200px) {
        .visible-lg-inline-block {display: inline-block !important}
    }
    @media (max-width: 767px) {
        .hidden-xs {display: none !important}
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-sm {display: none !important}
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-md {display: none !important}
    }
    @media (min-width: 1200px) {
        .hidden-lg {display: none !important}
    }
    .visible-print {display: none !important}
    @media print {
        .visible-print {display: block !important}
        table.visible-print {display: table !important}
        tr.visible-print {display: table-row !important}
        td.visible-print, th.visible-print {display: table-cell !important}
    }
    .visible-print-block {display: none !important}
    @media print {
        .visible-print-block {display: block !important}
    }
    .visible-print-inline {display: none !important}
    @media print {
        .visible-print-inline {display: inline !important}
    }
    .visible-print-inline-block {display: none !important}
    @media print {
        .visible-print-inline-block {display: inline-block !important}
    }
    @media print {
        .hidden-print {display: none !important}
    }
    /*# sourceMappingURL=bootstrap.min.css.map */
    @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic);

    /*
 * Core: General Layout Style
 * -------------------------
 */
    html,
    body {
        min-height: 100%;
    }
    .layout-boxed html,
    .layout-boxed body {
        height: 100%;
    }
    body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;
    }
    /* Layout */
    .wrapper {
        min-height: 100%;
        position: relative;
        overflow: hidden;
    }
    .wrapper:before,
    .wrapper:after {
        content: " ";
        display: table;
    }
    .wrapper:after {
        clear: both;
    }
    .layout-boxed .wrapper {
        max-width: 1250px;
        margin: 0 auto;
        min-height: 100%;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
        position: relative;
    }
    .layout-boxed {
        /*background: url('../img/boxed-bg.jpg') repeat fixed;*/
    }
    /*
 * Content Wrapper - contains the main content
 * ```.right-side has been deprecated as of v2.0.0 in favor of .content-wrapper  ```
 */
    .content-wrapper,
    .right-side,
    .main-footer {
        -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        -moz-transition: -moz-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        margin-left: 230px;
        z-index: 820;
    }
    .layout-top-nav .content-wrapper,
    .layout-top-nav .right-side,
    .layout-top-nav .main-footer {
        margin-left: 0;
    }
    @media (max-width: 767px) {
        .content-wrapper,
        .right-side,
        .main-footer {
            margin-left: 0;
        }
    }
    @media (min-width: 768px) {
        .sidebar-collapse .content-wrapper,
        .sidebar-collapse .right-side,
        .sidebar-collapse .main-footer {
            margin-left: 0;
        }
    }
    @media (max-width: 767px) {
        .sidebar-open .content-wrapper,
        .sidebar-open .right-side,
        .sidebar-open .main-footer {
            -webkit-transform: translate(230px, 0);
            -ms-transform: translate(230px, 0);
            -o-transform: translate(230px, 0);
            transform: translate(230px, 0);
        }
    }
    .content-wrapper,
    .right-side {
        min-height: 100%;
        background-color: #ecf0f5;
        z-index: 800;
    }
    .main-footer {
        background: #fff;
        padding: 15px;
        color: #444;
        border-top: 1px solid #d2d6de;
    }
    /* Fixed layout */
    .fixed .main-header,
    .fixed .main-sidebar,
    .fixed .left-side {
        position: fixed;
    }
    .fixed .main-header {
        top: 0;
        right: 0;
        left: 0;
    }
    .fixed .content-wrapper,
    .fixed .right-side {
        padding-top: 50px;
    }
    @media (max-width: 767px) {
        .fixed .content-wrapper,
        .fixed .right-side {
            padding-top: 100px;
        }
    }
    .fixed.layout-boxed .wrapper {
        max-width: 100%;
    }
    body.hold-transition .content-wrapper,
    body.hold-transition .right-side,
    body.hold-transition .main-footer,
    body.hold-transition .main-sidebar,
    body.hold-transition .left-side,
    body.hold-transition .main-header .navbar,
    body.hold-transition .main-header .logo {
        /* Fix for IE */
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
    }
    /* Content */
    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
    /* H1 - H6 font */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: 'Source Sans Pro', sans-serif;
    }
    /* General Links */
    a {
        color: #3c8dbc;
    }
    a:hover,
    a:active,
    a:focus {
        outline: none;
        text-decoration: none;
        color: #72afd2;
    }
    /* Page Header */
    .page-header {
        margin: 10px 0 20px 0;
        font-size: 22px;
    }
    .page-header > small {
        color: #666;
        display: block;
        margin-top: 5px;
    }
    /*
 * Component: Main Header
 * ----------------------
 */
    .main-header {
        position: relative;
        max-height: 100px;
        z-index: 1030;
    }
    .main-header .navbar {
        -webkit-transition: margin-left 0.3s ease-in-out;
        -o-transition: margin-left 0.3s ease-in-out;
        transition: margin-left 0.3s ease-in-out;
        margin-bottom: 0;
        margin-left: 230px;
        border: none;
        min-height: 50px;
        border-radius: 0;
    }
    .layout-top-nav .main-header .navbar {
        margin-left: 0;
    }
    .main-header #navbar-search-input.form-control {
        background: rgba(255, 255, 255, 0.2);
        border-color: transparent;
    }
    .main-header #navbar-search-input.form-control:focus,
    .main-header #navbar-search-input.form-control:active {
        border-color: rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.9);
    }
    .main-header #navbar-search-input.form-control::-moz-placeholder {
        color: #ccc;
        opacity: 1;
    }
    .main-header #navbar-search-input.form-control:-ms-input-placeholder {
        color: #ccc;
    }
    .main-header #navbar-search-input.form-control::-webkit-input-placeholder {
        color: #ccc;
    }
    .main-header .navbar-custom-menu,
    .main-header .navbar-right {
        float: right;
    }
    @media (max-width: 991px) {
        .main-header .navbar-custom-menu a,
        .main-header .navbar-right a {
            color: inherit;
            background: transparent;
        }
    }
    @media (max-width: 767px) {
        .main-header .navbar-right {
            float: none;
        }
        .navbar-collapse .main-header .navbar-right {
            margin: 7.5px -15px;
        }
        .main-header .navbar-right > li {
            color: inherit;
            border: 0;
        }
    }
    .main-header .sidebar-toggle {
        float: left;
        background-color: transparent;
        background-image: none;
        padding: 15px 15px;
        font-family: fontAwesome;
    }
    .main-header .sidebar-toggle:before {
        content: "\f0c9";
    }
    .main-header .sidebar-toggle:hover {
        color: #fff;
    }
    .main-header .sidebar-toggle:focus,
    .main-header .sidebar-toggle:active {
        background: transparent;
    }
    .main-header .sidebar-toggle .icon-bar {
        display: none;
    }
    .main-header .navbar .nav > li.user > a > .fa,
    .main-header .navbar .nav > li.user > a > .glyphicon,
    .main-header .navbar .nav > li.user > a > .ion {
        margin-right: 5px;
    }
    .main-header .navbar .nav > li > a > .label {
        position: absolute;
        top: 9px;
        right: 7px;
        text-align: center;
        font-size: 9px;
        padding: 2px 3px;
        line-height: .9;
    }
    .main-header .logo {
        -webkit-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
        display: block;
        float: left;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-align: center;
        width: 230px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        padding: 0 15px;
        font-weight: 300;
        overflow: hidden;
    }
    .main-header .logo .logo-lg {
        display: block;
    }
    .main-header .logo .logo-mini {
        display: none;
    }
    .main-header .navbar-brand {
        color: #fff;
    }
    .content-header {
        position: relative;
        padding: 15px 15px 0 15px;
    }
    .content-header > h1 {
        margin: 0;
        font-size: 24px;
    }
    .content-header > h1 > small {
        font-size: 15px;
        display: inline-block;
        padding-left: 4px;
        font-weight: 300;
    }
    .content-header > .breadcrumb {
        float: right;
        background: transparent;
        margin-top: 0;
        margin-bottom: 0;
        font-size: 12px;
        padding: 7px 5px;
        position: absolute;
        top: 15px;
        right: 10px;
        border-radius: 2px;
    }
    .content-header > .breadcrumb > li > a {
        color: #444;
        text-decoration: none;
        display: inline-block;
    }
    .content-header > .breadcrumb > li > a > .fa,
    .content-header > .breadcrumb > li > a > .glyphicon,
    .content-header > .breadcrumb > li > a > .ion {
        margin-right: 5px;
    }
    .content-header > .breadcrumb > li + li:before {
        content: '>\00a0';
    }
    @media (max-width: 991px) {
        .content-header > .breadcrumb {
            position: relative;
            margin-top: 5px;
            top: 0;
            right: 0;
            float: none;
            background: #d2d6de;
            padding-left: 10px;
        }
        .content-header > .breadcrumb li:before {
            color: #97a0b3;
        }
    }
    .navbar-toggle {
        color: #fff;
        border: 0;
        margin: 0;
        padding: 15px 15px;
    }
    @media (max-width: 991px) {
        .navbar-custom-menu .navbar-nav > li {
            float: left;
        }
        .navbar-custom-menu .navbar-nav {
            margin: 0;
            float: left;
        }
        .navbar-custom-menu .navbar-nav > li > a {
            padding-top: 15px;
            padding-bottom: 15px;
            line-height: 20px;
        }
    }
    @media (max-width: 767px) {
        .main-header {
            position: relative;
        }
        .main-header .logo,
        .main-header .navbar {
            width: 100%;
            float: none;
        }
        .main-header .navbar {
            margin: 0;
        }
        .main-header .navbar-custom-menu {
            float: right;
        }
    }
    @media (max-width: 991px) {
        .navbar-collapse.pull-left {
            float: none !important;
        }
        .navbar-collapse.pull-left + .navbar-custom-menu {
            display: block;
            position: absolute;
            top: 0;
            right: 40px;
        }
    }
    /*
 * Component: Sidebar
 * ------------------
 */
    .main-sidebar,
    .left-side {
        position: absolute;
        top: 0;
        left: 0;
        padding-top: 50px;
        min-height: 100%;
        width: 230px;
        z-index: 810;
        -webkit-transition: -webkit-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        -moz-transition: -moz-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
    }
    @media (max-width: 767px) {
        .main-sidebar,
        .left-side {
            padding-top: 100px;
        }
    }
    @media (max-width: 767px) {
        .main-sidebar,
        .left-side {
            -webkit-transform: translate(-230px, 0);
            -ms-transform: translate(-230px, 0);
            -o-transform: translate(-230px, 0);
            transform: translate(-230px, 0);
        }
    }
    @media (min-width: 768px) {
        .sidebar-collapse .main-sidebar,
        .sidebar-collapse .left-side {
            -webkit-transform: translate(-230px, 0);
            -ms-transform: translate(-230px, 0);
            -o-transform: translate(-230px, 0);
            transform: translate(-230px, 0);
        }
    }
    @media (max-width: 767px) {
        .sidebar-open .main-sidebar,
        .sidebar-open .left-side {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }
    }
    .sidebar {
        padding-bottom: 10px;
    }
    .sidebar-form input:focus {
        border-color: transparent;
    }
    .user-panel {
        position: relative;
        width: 100%;
        padding: 10px;
        overflow: hidden;
    }
    .user-panel:before,
    .user-panel:after {
        content: " ";
        display: table;
    }
    .user-panel:after {
        clear: both;
    }
    .user-panel > .image > img {
        width: 100%;
        max-width: 45px;
        height: auto;
    }
    .user-panel > .info {
        padding: 5px 5px 5px 15px;
        line-height: 1;
        position: absolute;
        left: 55px;
    }
    .user-panel > .info > p {
        font-weight: 600;
        margin-bottom: 9px;
    }
    .user-panel > .info > a {
        text-decoration: none;
        padding-right: 5px;
        margin-top: 3px;
        font-size: 11px;
    }
    .user-panel > .info > a > .fa,
    .user-panel > .info > a > .ion,
    .user-panel > .info > a > .glyphicon {
        margin-right: 3px;
    }
    .sidebar-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .sidebar-menu > li {
        position: relative;
        margin: 0;
        padding: 0;
    }
    .sidebar-menu > li > a {
        padding: 12px 5px 12px 15px;
        display: block;
    }
    .sidebar-menu > li > a > .fa,
    .sidebar-menu > li > a > .glyphicon,
    .sidebar-menu > li > a > .ion {
        width: 20px;
    }
    .sidebar-menu > li .label,
    .sidebar-menu > li .badge {
        margin-right: 5px;
    }
    .sidebar-menu > li .badge {
        margin-top: 3px;
    }
    .sidebar-menu li.header {
        padding: 10px 25px 10px 15px;
        font-size: 12px;
    }
    .sidebar-menu li > a > .fa-angle-left,
    .sidebar-menu li > a > .pull-right-container > .fa-angle-left {
        width: auto;
        height: auto;
        padding: 0;
        margin-right: 10px;
    }
    .sidebar-menu li.active > a > .fa-angle-left,
    .sidebar-menu li.active > a > .pull-right-container > .fa-angle-left {
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }
    .sidebar-menu li.active > .treeview-menu {
        display: block;
    }
    .sidebar-menu .treeview-menu {
        display: none;
        list-style: none;
        padding: 0;
        margin: 0;
        padding-left: 5px;
    }
    .sidebar-menu .treeview-menu .treeview-menu {
        padding-left: 20px;
    }
    .sidebar-menu .treeview-menu > li {
        margin: 0;
    }
    .sidebar-menu .treeview-menu > li > a {
        padding: 5px 5px 5px 15px;
        display: block;
        font-size: 14px;
    }
    .sidebar-menu .treeview-menu > li > a > .fa,
    .sidebar-menu .treeview-menu > li > a > .glyphicon,
    .sidebar-menu .treeview-menu > li > a > .ion {
        width: 20px;
    }
    .sidebar-menu .treeview-menu > li > a > .pull-right-container > .fa-angle-left,
    .sidebar-menu .treeview-menu > li > a > .pull-right-container > .fa-angle-down,
    .sidebar-menu .treeview-menu > li > a > .fa-angle-left,
    .sidebar-menu .treeview-menu > li > a > .fa-angle-down {
        width: auto;
    }
    /*
 * Component: Sidebar Mini
 */
    @media (min-width: 768px) {
        .sidebar-mini.sidebar-collapse .content-wrapper,
        .sidebar-mini.sidebar-collapse .right-side,
        .sidebar-mini.sidebar-collapse .main-footer {
            margin-left: 50px !important;
            z-index: 840;
        }
        .sidebar-mini.sidebar-collapse .main-sidebar {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
            width: 50px !important;
            z-index: 850;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li {
            position: relative;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a {
            margin-right: 0;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > span {
            border-top-right-radius: 4px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:not(.treeview) > a > span {
            border-bottom-right-radius: 4px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom-right-radius: 4px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > span:not(.pull-right),
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > .treeview-menu {
            display: block !important;
            position: absolute;
            width: 180px;
            left: 50px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > span {
            top: 0;
            margin-left: -3px;
            padding: 12px 5px 12px 20px;
            background-color: inherit;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > .pull-right-container {
            float: right;
            width: auto !important;
            left: 200px !important;
            top: 10px !important;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > .pull-right-container > .label:not(:first-of-type) {
            display: none;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > .treeview-menu {
            top: 44px;
            margin-left: 0;
        }
        .sidebar-mini.sidebar-collapse .main-sidebar .user-panel > .info,
        .sidebar-mini.sidebar-collapse .sidebar-form,
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > span,
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu,
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > .pull-right,
        .sidebar-mini.sidebar-collapse .sidebar-menu li.header {
            display: none !important;
            -webkit-transform: translateZ(0);
        }
        .sidebar-mini.sidebar-collapse .main-header .logo {
            width: 50px;
        }
        .sidebar-mini.sidebar-collapse .main-header .logo > .logo-mini {
            display: block;
            margin-left: -15px;
            margin-right: -15px;
            font-size: 18px;
        }
        .sidebar-mini.sidebar-collapse .main-header .logo > .logo-lg {
            display: none;
        }
        .sidebar-mini.sidebar-collapse .main-header .navbar {
            margin-left: 50px;
        }
    }
    .sidebar-menu,
    .main-sidebar .user-panel,
    .sidebar-menu > li.header {
        white-space: nowrap;
        overflow: hidden;
    }
    .sidebar-menu:hover {
        overflow: visible;
    }
    .sidebar-form,
    .sidebar-menu > li.header {
        overflow: hidden;
        text-overflow: clip;
    }
    .sidebar-menu li > a {
        position: relative;
    }
    .sidebar-menu li > a > .pull-right-container {
        position: absolute;
        right: 10px;
        top: 50%;
        margin-top: -7px;
    }
    /*
 * Component: Control sidebar. By default, this is the right sidebar.
 */
    .control-sidebar-bg {
        position: fixed;
        z-index: 1000;
        bottom: 0;
    }
    .control-sidebar-bg,
    .control-sidebar {
        top: 0;
        right: -230px;
        width: 230px;
        -webkit-transition: right 0.3s ease-in-out;
        -o-transition: right 0.3s ease-in-out;
        transition: right 0.3s ease-in-out;
    }
    .control-sidebar {
        position: absolute;
        padding-top: 50px;
        z-index: 1010;
    }
    @media (max-width: 768px) {
        .control-sidebar {
            padding-top: 100px;
        }
    }
    .control-sidebar > .tab-content {
        padding: 10px 15px;
    }
    .control-sidebar.control-sidebar-open,
    .control-sidebar.control-sidebar-open + .control-sidebar-bg {
        right: 0;
    }
    .control-sidebar-open .control-sidebar-bg,
    .control-sidebar-open .control-sidebar {
        right: 0;
    }
    @media (min-width: 768px) {
        .control-sidebar-open .content-wrapper,
        .control-sidebar-open .right-side,
        .control-sidebar-open .main-footer {
            margin-right: 230px;
        }
    }
    .nav-tabs.control-sidebar-tabs > li:first-of-type > a,
    .nav-tabs.control-sidebar-tabs > li:first-of-type > a:hover,
    .nav-tabs.control-sidebar-tabs > li:first-of-type > a:focus {
        border-left-width: 0;
    }
    .nav-tabs.control-sidebar-tabs > li > a {
        border-radius: 0;
    }
    .nav-tabs.control-sidebar-tabs > li > a,
    .nav-tabs.control-sidebar-tabs > li > a:hover {
        border-top: none;
        border-right: none;
        border-left: 1px solid transparent;
        border-bottom: 1px solid transparent;
    }
    .nav-tabs.control-sidebar-tabs > li > a .icon {
        font-size: 16px;
    }
    .nav-tabs.control-sidebar-tabs > li.active > a,
    .nav-tabs.control-sidebar-tabs > li.active > a:hover,
    .nav-tabs.control-sidebar-tabs > li.active > a:focus,
    .nav-tabs.control-sidebar-tabs > li.active > a:active {
        border-top: none;
        border-right: none;
        border-bottom: none;
    }
    @media (max-width: 768px) {
        .nav-tabs.control-sidebar-tabs {
            display: table;
        }
        .nav-tabs.control-sidebar-tabs > li {
            display: table-cell;
        }
    }
    .control-sidebar-heading {
        font-weight: 400;
        font-size: 16px;
        padding: 10px 0;
        margin-bottom: 10px;
    }
    .control-sidebar-subheading {
        display: block;
        font-weight: 400;
        font-size: 14px;
    }
    .control-sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0 -15px;
    }
    .control-sidebar-menu > li > a {
        display: block;
        padding: 10px 15px;
    }
    .control-sidebar-menu > li > a:before,
    .control-sidebar-menu > li > a:after {
        content: " ";
        display: table;
    }
    .control-sidebar-menu > li > a:after {
        clear: both;
    }
    .control-sidebar-menu > li > a > .control-sidebar-subheading {
        margin-top: 0;
    }
    .control-sidebar-menu .menu-icon {
        float: left;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        text-align: center;
        line-height: 35px;
    }
    .control-sidebar-menu .menu-info {
        margin-left: 45px;
        margin-top: 3px;
    }
    .control-sidebar-menu .menu-info > .control-sidebar-subheading {
        margin: 0;
    }
    .control-sidebar-menu .menu-info > p {
        margin: 0;
        font-size: 11px;
    }
    .control-sidebar-menu .progress {
        margin: 0;
    }
    .control-sidebar-dark {
        color: #b8c7ce;
    }
    .control-sidebar-dark,
    .control-sidebar-dark + .control-sidebar-bg {
        background: #222d32;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs {
        border-bottom: #1c2529;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a {
        background: #181f23;
        color: #b8c7ce;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus {
        border-left-color: #141a1d;
        border-bottom-color: #141a1d;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:active {
        background: #1c2529;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover {
        color: #fff;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:hover,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:focus,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:active {
        background: #222d32;
        color: #fff;
    }
    .control-sidebar-dark .control-sidebar-heading,
    .control-sidebar-dark .control-sidebar-subheading {
        color: #fff;
    }
    .control-sidebar-dark .control-sidebar-menu > li > a:hover {
        background: #1e282c;
    }
    .control-sidebar-dark .control-sidebar-menu > li > a .menu-info > p {
        color: #b8c7ce;
    }
    .control-sidebar-light {
        color: #5e5e5e;
    }
    .control-sidebar-light,
    .control-sidebar-light + .control-sidebar-bg {
        background: #f9fafc;
        border-left: 1px solid #d2d6de;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs {
        border-bottom: #d2d6de;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a {
        background: #e8ecf4;
        color: #444444;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:focus {
        border-left-color: #d2d6de;
        border-bottom-color: #d2d6de;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:focus,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:active {
        background: #eff1f7;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:hover,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:focus,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:active {
        background: #f9fafc;
        color: #111;
    }
    .control-sidebar-light .control-sidebar-heading,
    .control-sidebar-light .control-sidebar-subheading {
        color: #111;
    }
    .control-sidebar-light .control-sidebar-menu {
        margin-left: -14px;
    }
    .control-sidebar-light .control-sidebar-menu > li > a:hover {
        background: #f4f4f5;
    }
    .control-sidebar-light .control-sidebar-menu > li > a .menu-info > p {
        color: #5e5e5e;
    }
    /*
 * Component: Dropdown menus
 * -------------------------
 */
    /*Dropdowns in general*/
    .dropdown-menu {
        box-shadow: none;
        border-color: #eee;
    }
    .dropdown-menu > li > a {
        color: #777;
    }
    .dropdown-menu > li > a > .glyphicon,
    .dropdown-menu > li > a > .fa,
    .dropdown-menu > li > a > .ion {
        margin-right: 10px;
    }
    .dropdown-menu > li > a:hover {
        background-color: #e1e3e9;
        color: #333;
    }
    .dropdown-menu > .divider {
        background-color: #eee;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu,
    .navbar-nav > .messages-menu > .dropdown-menu,
    .navbar-nav > .tasks-menu > .dropdown-menu {
        width: 280px;
        padding: 0 0 0 0;
        margin: 0;
        top: 100%;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li,
    .navbar-nav > .messages-menu > .dropdown-menu > li,
    .navbar-nav > .tasks-menu > .dropdown-menu > li {
        position: relative;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li.header,
    .navbar-nav > .messages-menu > .dropdown-menu > li.header,
    .navbar-nav > .tasks-menu > .dropdown-menu > li.header {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        background-color: #ffffff;
        padding: 7px 10px;
        border-bottom: 1px solid #f4f4f4;
        color: #444444;
        font-size: 14px;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a,
    .navbar-nav > .messages-menu > .dropdown-menu > li.footer > a,
    .navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
        font-size: 12px;
        background-color: #fff;
        padding: 7px 10px;
        border-bottom: 1px solid #eeeeee;
        color: #444 !important;
        text-align: center;
    }
    @media (max-width: 991px) {
        .navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a,
        .navbar-nav > .messages-menu > .dropdown-menu > li.footer > a,
        .navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a {
            background: #fff !important;
            color: #444 !important;
        }
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a:hover,
    .navbar-nav > .messages-menu > .dropdown-menu > li.footer > a:hover,
    .navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a:hover {
        text-decoration: none;
        font-weight: normal;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu,
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu,
    .navbar-nav > .tasks-menu > .dropdown-menu > li .menu {
        max-height: 200px;
        margin: 0;
        padding: 0;
        list-style: none;
        overflow-x: hidden;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a,
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a,
    .navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a {
        display: block;
        white-space: nowrap;
        /* Prevent text from breaking */
        border-bottom: 1px solid #f4f4f4;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a:hover,
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:hover,
    .navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a:hover {
        background: #f4f4f4;
        text-decoration: none;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a {
        color: #444444;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 10px;
    }
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .glyphicon,
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .fa,
    .navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .ion {
        width: 20px;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a {
        margin: 0;
        padding: 10px 10px;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > div > img {
        margin: auto 10px auto auto;
        width: 40px;
        height: 40px;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 {
        padding: 0;
        margin: 0 0 0 45px;
        color: #444444;
        font-size: 15px;
        position: relative;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 > small {
        color: #999999;
        font-size: 10px;
        position: absolute;
        top: 0;
        right: 0;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > p {
        margin: 0 0 0 45px;
        font-size: 12px;
        color: #888888;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:before,
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:after {
        content: " ";
        display: table;
    }
    .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:after {
        clear: both;
    }
    .navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a {
        padding: 10px;
    }
    .navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a > h3 {
        font-size: 14px;
        padding: 0;
        margin: 0 0 10px 0;
        color: #666666;
    }
    .navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a > .progress {
        padding: 0;
        margin: 0;
    }
    .navbar-nav > .user-menu > .dropdown-menu {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
        padding: 1px 0 0 0;
        border-top-width: 0;
        width: 280px;
    }
    .navbar-nav > .user-menu > .dropdown-menu,
    .navbar-nav > .user-menu > .dropdown-menu > .user-body {
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .navbar-nav > .user-menu > .dropdown-menu > li.user-header {
        height: 175px;
        padding: 10px;
        text-align: center;
    }
    .navbar-nav > .user-menu > .dropdown-menu > li.user-header > img {
        z-index: 5;
        height: 90px;
        width: 90px;
        border: 3px solid;
        border-color: transparent;
        border-color: rgba(255, 255, 255, 0.2);
    }
    .navbar-nav > .user-menu > .dropdown-menu > li.user-header > p {
        z-index: 5;
        color: #fff;
        color: rgba(255, 255, 255, 0.8);
        font-size: 17px;
        margin-top: 10px;
    }
    .navbar-nav > .user-menu > .dropdown-menu > li.user-header > p > small {
        display: block;
        font-size: 12px;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-body {
        padding: 15px;
        border-bottom: 1px solid #f4f4f4;
        border-top: 1px solid #dddddd;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-body:before,
    .navbar-nav > .user-menu > .dropdown-menu > .user-body:after {
        content: " ";
        display: table;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-body:after {
        clear: both;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-body a {
        color: #444 !important;
    }
    @media (max-width: 991px) {
        .navbar-nav > .user-menu > .dropdown-menu > .user-body a {
            background: #fff !important;
            color: #444 !important;
        }
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-footer {
        background-color: #f9f9f9;
        padding: 10px;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-footer:before,
    .navbar-nav > .user-menu > .dropdown-menu > .user-footer:after {
        content: " ";
        display: table;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-footer:after {
        clear: both;
    }
    .navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default {
        color: #666666;
    }
    @media (max-width: 991px) {
        .navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default:hover {
            background-color: #f9f9f9;
        }
    }
    .navbar-nav > .user-menu .user-image {
        float: left;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        margin-right: 10px;
        margin-top: -2px;
    }
    @media (max-width: 767px) {
        .navbar-nav > .user-menu .user-image {
            float: none;
            margin-right: 0;
            margin-top: -8px;
            line-height: 10px;
        }
    }
    /* Add fade animation to dropdown menus by appending
 the class .animated-dropdown-menu to the .dropdown-menu ul (or ol)*/
    .open:not(.dropup) > .animated-dropdown-menu {
        backface-visibility: visible !important;
        -webkit-animation: flipInX 0.7s both;
        -o-animation: flipInX 0.7s both;
        animation: flipInX 0.7s both;
    }
    @keyframes flipInX {
        0% {
            transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
            transition-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            transition-timing-function: ease-in;
        }
        60% {
            transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            opacity: 1;
        }
        80% {
            transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        }
        100% {
            transform: perspective(400px);
        }
    }
    @-webkit-keyframes flipInX {
        0% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
            -webkit-transition-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            -webkit-transition-timing-function: ease-in;
        }
        60% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            opacity: 1;
        }
        80% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        }
        100% {
            -webkit-transform: perspective(400px);
        }
    }
    /* Fix dropdown menu in navbars */
    .navbar-custom-menu > .navbar-nav > li {
        position: relative;
    }
    .navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
        position: absolute;
        right: 0;
        left: auto;
    }
    @media (max-width: 991px) {
        .navbar-custom-menu > .navbar-nav {
            float: right;
        }
        .navbar-custom-menu > .navbar-nav > li {
            position: static;
        }
        .navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
            position: absolute;
            right: 5%;
            left: auto;
            border: 1px solid #ddd;
            background: #fff;
        }
    }
    /*
 * Component: Form
 * ---------------
 */
    .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #d2d6de;
    }
    .form-control:focus {
        border-color: #3c8dbc;
        box-shadow: none;
    }
    .form-control::-moz-placeholder,
    .form-control:-ms-input-placeholder,
    .form-control::-webkit-input-placeholder {
        color: #bbb;
        opacity: 1;
    }
    .form-control:not(select) {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .form-group.has-success label {
        color: #00a65a;
    }
    .form-group.has-success .form-control,
    .form-group.has-success .input-group-addon {
        border-color: #00a65a;
        box-shadow: none;
    }
    .form-group.has-success .help-block {
        color: #00a65a;
    }
    .form-group.has-warning label {
        color: #f39c12;
    }
    .form-group.has-warning .form-control,
    .form-group.has-warning .input-group-addon {
        border-color: #f39c12;
        box-shadow: none;
    }
    .form-group.has-warning .help-block {
        color: #f39c12;
    }
    .form-group.has-error label {
        color: #dd4b39;
    }
    .form-group.has-error .form-control,
    .form-group.has-error .input-group-addon {
        border-color: #dd4b39;
        box-shadow: none;
    }
    .form-group.has-error .help-block {
        color: #dd4b39;
    }
    /* Input group */
    .input-group .input-group-addon {
        border-radius: 0;
        border-color: #d2d6de;
        background-color: #fff;
    }
    /* button groups */
    .btn-group-vertical .btn.btn-flat:first-of-type,
    .btn-group-vertical .btn.btn-flat:last-of-type {
        border-radius: 0;
    }
    .icheck > label {
        padding-left: 0;
    }
    /* support Font Awesome icons in form-control */
    .form-control-feedback.fa {
        line-height: 34px;
    }
    .input-lg + .form-control-feedback.fa,
    .input-group-lg + .form-control-feedback.fa,
    .form-group-lg .form-control + .form-control-feedback.fa {
        line-height: 46px;
    }
    .input-sm + .form-control-feedback.fa,
    .input-group-sm + .form-control-feedback.fa,
    .form-group-sm .form-control + .form-control-feedback.fa {
        line-height: 30px;
    }
    /*
 * Component: Progress Bar
 * -----------------------
 */
    .progress,
    .progress > .progress-bar {
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .progress,
    .progress > .progress-bar,
    .progress .progress-bar,
    .progress > .progress-bar .progress-bar {
        border-radius: 1px;
    }
    /* size variation */
    .progress.sm,
    .progress-sm {
        height: 10px;
    }
    .progress.sm,
    .progress-sm,
    .progress.sm .progress-bar,
    .progress-sm .progress-bar {
        border-radius: 1px;
    }
    .progress.xs,
    .progress-xs {
        height: 7px;
    }
    .progress.xs,
    .progress-xs,
    .progress.xs .progress-bar,
    .progress-xs .progress-bar {
        border-radius: 1px;
    }
    .progress.xxs,
    .progress-xxs {
        height: 3px;
    }
    .progress.xxs,
    .progress-xxs,
    .progress.xxs .progress-bar,
    .progress-xxs .progress-bar {
        border-radius: 1px;
    }
    /* Vertical bars */
    .progress.vertical {
        position: relative;
        width: 30px;
        height: 200px;
        display: inline-block;
        margin-right: 10px;
    }
    .progress.vertical > .progress-bar {
        width: 100%;
        position: absolute;
        bottom: 0;
    }
    .progress.vertical.sm,
    .progress.vertical.progress-sm {
        width: 20px;
    }
    .progress.vertical.xs,
    .progress.vertical.progress-xs {
        width: 10px;
    }
    .progress.vertical.xxs,
    .progress.vertical.progress-xxs {
        width: 3px;
    }
    .progress-group .progress-text {
        font-weight: 600;
    }
    .progress-group .progress-number {
        float: right;
    }
    /* Remove margins from progress bars when put in a table */
    .table tr > td .progress {
        margin: 0;
    }
    .progress-bar-light-blue,
    .progress-bar-primary {
        background-color: #3c8dbc;
    }
    .progress-striped .progress-bar-light-blue,
    .progress-striped .progress-bar-primary {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-green,
    .progress-bar-success {
        background-color: #00a65a;
    }
    .progress-striped .progress-bar-green,
    .progress-striped .progress-bar-success {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-aqua,
    .progress-bar-info {
        background-color: #00c0ef;
    }
    .progress-striped .progress-bar-aqua,
    .progress-striped .progress-bar-info {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-yellow,
    .progress-bar-warning {
        background-color: #f39c12;
    }
    .progress-striped .progress-bar-yellow,
    .progress-striped .progress-bar-warning {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-red,
    .progress-bar-danger {
        background-color: #dd4b39;
    }
    .progress-striped .progress-bar-red,
    .progress-striped .progress-bar-danger {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    /*
 * Component: Small Box
 * --------------------
 */
    .small-box {
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }
    .small-box > .inner {
        padding: 10px;
    }
    .small-box > .small-box-footer {
        position: relative;
        text-align: center;
        padding: 3px 0;
        color: #fff;
        color: rgba(255, 255, 255, 0.8);
        display: block;
        z-index: 10;
        background: rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }
    .small-box > .small-box-footer:hover {
        color: #fff;
        background: rgba(0, 0, 0, 0.15);
    }
    .small-box h3 {
        font-size: 38px;
        font-weight: bold;
        margin: 0 0 10px 0;
        white-space: nowrap;
        padding: 0;
    }
    .small-box p {
        font-size: 15px;
    }
    .small-box p > small {
        display: block;
        color: #f9f9f9;
        font-size: 13px;
        margin-top: 5px;
    }
    .small-box h3,
    .small-box p {
        z-index: 5;
    }
    .small-box .icon {

        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 0;
        font-size: 35px;
        color: rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 767px) {
        .small-box {
            text-align: center;
        }
        .small-box .icon {
            display: none;
        }
        .small-box p {
            font-size: 12px;
        }
    }
    /*
 * Component: Box
 * --------------
 */
    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }
    .box.box-primary {
        border-top-color: #3c8dbc;
    }
    .box.box-info {
        border-top-color: #00c0ef;
    }
    .box.box-danger {
        border-top-color: #dd4b39;
    }
    .box.box-warning {
        border-top-color: #f39c12;
    }
    .box.box-success {
        border-top-color: #00a65a;
    }
    .box.box-default {
        border-top-color: #d2d6de;
    }
    .box.collapsed-box .box-body,
    .box.collapsed-box .box-footer {
        display: none;
    }
    .box .nav-stacked > li {
        border-bottom: 1px solid #f4f4f4;
        margin: 0;
    }
    .box .nav-stacked > li:last-of-type {
        border-bottom: none;
    }
    .box.height-control .box-body {
        max-height: 300px;
        overflow: auto;
    }
    .box .border-right {
        border-right: 1px solid #f4f4f4;
    }
    .box .border-left {
        border-left: 1px solid #f4f4f4;
    }
    .box.box-solid {
        border-top: 0;
    }
    .box.box-solid > .box-header .btn.btn-default {
        background: transparent;
    }
    .box.box-solid > .box-header .btn:hover,
    .box.box-solid > .box-header a:hover {
        background: rgba(0, 0, 0, 0.1);
    }
    .box.box-solid.box-default {
        border: 1px solid #d2d6de;
    }
    .box.box-solid.box-default > .box-header {
        color: #444444;
        background: #d2d6de;
        background-color: #d2d6de;
    }
    .box.box-solid.box-default > .box-header a,
    .box.box-solid.box-default > .box-header .btn {
        color: #444444;
    }
    .box.box-solid.box-primary {
        border: 1px solid #3c8dbc;
    }
    .box.box-solid.box-primary > .box-header {
        color: #ffffff;
        background: #3c8dbc;
        background-color: #3c8dbc;
    }
    .box.box-solid.box-primary > .box-header a,
    .box.box-solid.box-primary > .box-header .btn {
        color: #ffffff;
    }
    .box.box-solid.box-info {
        border: 1px solid #00c0ef;
    }
    .box.box-solid.box-info > .box-header {
        color: #ffffff;
        background: #00c0ef;
        background-color: #00c0ef;
    }
    .box.box-solid.box-info > .box-header a,
    .box.box-solid.box-info > .box-header .btn {
        color: #ffffff;
    }
    .box.box-solid.box-danger {
        border: 1px solid #dd4b39;
    }
    .box.box-solid.box-danger > .box-header {
        color: #ffffff;
        background: #dd4b39;
        background-color: #dd4b39;
    }
    .box.box-solid.box-danger > .box-header a,
    .box.box-solid.box-danger > .box-header .btn {
        color: #ffffff;
    }
    .box.box-solid.box-warning {
        border: 1px solid #f39c12;
    }
    .box.box-solid.box-warning > .box-header {
        color: #ffffff;
        background: #f39c12;
        background-color: #f39c12;
    }
    .box.box-solid.box-warning > .box-header a,
    .box.box-solid.box-warning > .box-header .btn {
        color: #ffffff;
    }
    .box.box-solid.box-success {
        border: 1px solid #00a65a;
    }
    .box.box-solid.box-success > .box-header {
        color: #ffffff;
        background: #00a65a;
        background-color: #00a65a;
    }
    .box.box-solid.box-success > .box-header a,
    .box.box-solid.box-success > .box-header .btn {
        color: #ffffff;
    }
    .box.box-solid > .box-header > .box-tools .btn {
        border: 0;
        box-shadow: none;
    }
    .box.box-solid[class*='bg'] > .box-header {
        color: #fff;
    }
    .box .box-group > .box {
        margin-bottom: 5px;
    }
    .box .knob-label {
        text-align: center;
        color: #333;
        font-weight: 100;
        font-size: 12px;
        margin-bottom: 0.3em;
    }
    .box > .overlay,
    .overlay-wrapper > .overlay,
    .box > .loading-img,
    .overlay-wrapper > .loading-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .box .overlay,
    .overlay-wrapper .overlay {
        z-index: 50;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 3px;
    }
    .box .overlay > .fa,
    .overlay-wrapper .overlay > .fa {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -15px;
        margin-top: -15px;
        color: #000;
        font-size: 30px;
    }
    .box .overlay.dark,
    .overlay-wrapper .overlay.dark {
        background: rgba(0, 0, 0, 0.5);
    }
    .box-header:before,
    .box-body:before,
    .box-footer:before,
    .box-header:after,
    .box-body:after,
    .box-footer:after {
        content: " ";
        display: table;
    }
    .box-header:after,
    .box-body:after,
    .box-footer:after {
        clear: both;
    }
    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative;
    }
    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .collapsed-box .box-header.with-border {
        border-bottom: none;
    }
    .box-header > .fa,
    .box-header > .glyphicon,
    .box-header > .ion,
    .box-header .box-title {
        display: inline-block;
        font-size: 18px;
        margin: 0;
        line-height: 1;
    }
    .box-header > .fa,
    .box-header > .glyphicon,
    .box-header > .ion {
        margin-right: 5px;
    }
    .box-header > .box-tools {
        position: absolute;
        right: 10px;
        top: 5px;
    }
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
    }
    .box-header > .box-tools.pull-right .dropdown-menu {
        right: 0;
        left: auto;
    }
    .btn-box-tool {
        padding: 5px;
        font-size: 12px;
        background: transparent;
        color: #97a0b3;
    }
    .open .btn-box-tool,
    .btn-box-tool:hover {
        color: #606c84;
    }
    .btn-box-tool.btn:active {
        box-shadow: none;
    }
    .box-body {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
    }
    .no-header .box-body {
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .box-body > .table {
        margin-bottom: 0;
    }
    .box-body .fc {
        margin-top: 5px;
    }
    .box-body .full-width-chart {
        margin: -19px;
    }
    .box-body.no-padding .full-width-chart {
        margin: -9px;
    }
    .box-body .box-pane {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 3px;
    }
    .box-body .box-pane-right {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 0;
    }
    .box-footer {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #ffffff;
    }
    .chart-legend {
        margin: 10px 0;
    }
    @media (max-width: 991px) {
        .chart-legend > li {
            float: left;
            margin-right: 10px;
        }
    }
    .box-comments {
        background: #f7f7f7;
    }
    .box-comments .box-comment {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }
    .box-comments .box-comment:before,
    .box-comments .box-comment:after {
        content: " ";
        display: table;
    }
    .box-comments .box-comment:after {
        clear: both;
    }
    .box-comments .box-comment:last-of-type {
        border-bottom: 0;
    }
    .box-comments .box-comment:first-of-type {
        padding-top: 0;
    }
    .box-comments .box-comment img {
        float: left;
    }
    .box-comments .comment-text {
        margin-left: 40px;
        color: #555;
    }
    .box-comments .username {
        color: #444;
        display: block;
        font-weight: 600;
    }
    .box-comments .text-muted {
        font-weight: 400;
        font-size: 12px;
    }
    /* Widget: TODO LIST */
    .todo-list {
        margin: 0;
        padding: 0;
        list-style: none;
        overflow: auto;
    }
    .todo-list > li {
        border-radius: 2px;
        padding: 10px;
        background: #f4f4f4;
        margin-bottom: 2px;
        border-left: 2px solid #e6e7e8;
        color: #444;
    }
    .todo-list > li:last-of-type {
        margin-bottom: 0;
    }
    .todo-list > li > input[type='checkbox'] {
        margin: 0 10px 0 5px;
    }
    .todo-list > li .text {
        display: inline-block;
        margin-left: 5px;
        font-weight: 600;
    }
    .todo-list > li .label {
        margin-left: 10px;
        font-size: 9px;
    }
    .todo-list > li .tools {
        display: none;
        float: right;
        color: #dd4b39;
    }
    .todo-list > li .tools > .fa,
    .todo-list > li .tools > .glyphicon,
    .todo-list > li .tools > .ion {
        margin-right: 5px;
        cursor: pointer;
    }
    .todo-list > li:hover .tools {
        display: inline-block;
    }
    .todo-list > li.done {
        color: #999;
    }
    .todo-list > li.done .text {
        text-decoration: line-through;
        font-weight: 500;
    }
    .todo-list > li.done .label {
        background: #d2d6de !important;
    }
    .todo-list .danger {
        border-left-color: #dd4b39;
    }
    .todo-list .warning {
        border-left-color: #f39c12;
    }
    .todo-list .info {
        border-left-color: #00c0ef;
    }
    .todo-list .success {
        border-left-color: #00a65a;
    }
    .todo-list .primary {
        border-left-color: #3c8dbc;
    }
    .todo-list .handle {
        display: inline-block;
        cursor: move;
        margin: 0 5px;
    }
    /* Chat widget (DEPRECATED - this will be removed in the next major release. Use Direct Chat instead)*/
    .chat {
        padding: 5px 20px 5px 10px;
    }
    .chat .item {
        margin-bottom: 10px;
    }
    .chat .item:before,
    .chat .item:after {
        content: " ";
        display: table;
    }
    .chat .item:after {
        clear: both;
    }
    .chat .item > img {
        width: 40px;
        height: 40px;
        border: 2px solid transparent;
        border-radius: 50%;
    }
    .chat .item > .online {
        border: 2px solid #00a65a;
    }
    .chat .item > .offline {
        border: 2px solid #dd4b39;
    }
    .chat .item > .message {
        margin-left: 55px;
        margin-top: -40px;
    }
    .chat .item > .message > .name {
        display: block;
        font-weight: 600;
    }
    .chat .item > .attachment {
        border-radius: 3px;
        background: #f4f4f4;
        margin-left: 65px;
        margin-right: 15px;
        padding: 10px;
    }
    .chat .item > .attachment > h4 {
        margin: 0 0 5px 0;
        font-weight: 600;
        font-size: 14px;
    }
    .chat .item > .attachment > p,
    .chat .item > .attachment > .filename {
        font-weight: 600;
        font-size: 13px;
        font-style: italic;
        margin: 0;
    }
    .chat .item > .attachment:before,
    .chat .item > .attachment:after {
        content: " ";
        display: table;
    }
    .chat .item > .attachment:after {
        clear: both;
    }
    .box-input {
        max-width: 200px;
    }
    .modal .panel-body {
        color: #444;
    }
    /*
 * Component: Info Box
 * -------------------
 */
    .info-box {
        display: block;
        min-height: 90px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        border-radius: 2px;
        margin-bottom: 15px;
    }
    .info-box small {
        font-size: 14px;
    }
    .info-box .progress {
        background: rgba(0, 0, 0, 0.2);
        margin: 5px -10px 5px -10px;
        height: 2px;
    }
    .info-box .progress,
    .info-box .progress .progress-bar {
        border-radius: 0;
    }
    .info-box .progress .progress-bar {
        background: #fff;
    }
    .info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 90px;
        width: 90px;
        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0, 0, 0, 0.2);
    }
    .info-box-icon > img {
        max-width: 100%;
    }
    .info-box-content {
        padding: 5px 10px;
        margin-left: 90px;
    }
    .info-box-number {
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
    .progress-description,
    .info-box-text {
        display: block;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .info-box-text {
        text-transform: uppercase;
    }
    .info-box-more {
        display: block;
    }
    .progress-description {
        margin: 0;
    }
    /*
 * Component: Timeline
 * -------------------
 */
    .timeline {
        position: relative;
        margin: 0 0 30px 0;
        padding: 0;
        list-style: none;
    }
    .timeline:before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 4px;
        background: #ddd;
        left: 31px;
        margin: 0;
        border-radius: 2px;
    }
    .timeline > li {
        position: relative;
        margin-right: 10px;
        margin-bottom: 15px;
    }
    .timeline > li:before,
    .timeline > li:after {
        content: " ";
        display: table;
    }
    .timeline > li:after {
        clear: both;
    }
    .timeline > li > .timeline-item {
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        margin-top: 0;
        background: #fff;
        color: #444;
        margin-left: 60px;
        margin-right: 15px;
        padding: 0;
        position: relative;
    }
    .timeline > li > .timeline-item > .time {
        color: #999;
        float: right;
        padding: 10px;
        font-size: 12px;
    }
    .timeline > li > .timeline-item > .timeline-header {
        margin: 0;
        color: #555;
        border-bottom: 1px solid #f4f4f4;
        padding: 10px;
        font-size: 16px;
        line-height: 1.1;
    }
    .timeline > li > .timeline-item > .timeline-header > a {
        font-weight: 600;
    }
    .timeline > li > .timeline-item > .timeline-body,
    .timeline > li > .timeline-item > .timeline-footer {
        padding: 10px;
    }
    .timeline > li > .fa,
    .timeline > li > .glyphicon,
    .timeline > li > .ion {
        width: 30px;
        height: 30px;
        font-size: 15px;
        line-height: 30px;
        position: absolute;
        color: #666;
        background: #d2d6de;
        border-radius: 50%;
        text-align: center;
        left: 18px;
        top: 0;
    }
    .timeline > .time-label > span {
        font-weight: 600;
        padding: 5px;
        display: inline-block;
        background-color: #fff;
        border-radius: 4px;
    }
    .timeline-inverse > li > .timeline-item {
        background: #f0f0f0;
        border: 1px solid #ddd;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .timeline-inverse > li > .timeline-item > .timeline-header {
        border-bottom-color: #ddd;
    }
    /*
 * Component: Button
 * -----------------
 */
    .btn {
        border-radius: 3px;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 1px solid transparent;
    }
    .btn.uppercase {
        text-transform: uppercase;
    }
    .btn.btn-flat {
        border-radius: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border-width: 1px;
    }
    .btn:active {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        -moz-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn:focus {
        outline: none;
    }
    .btn.btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn.btn-file > input[type='file'] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        opacity: 0;
        filter: alpha(opacity=0);
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    .btn-default {
        background-color: #f4f4f4;
        color: #444;
        border-color: #ddd;
    }
    .btn-default:hover,
    .btn-default:active,
    .btn-default.hover {
        background-color: #e7e7e7;
    }
    .btn-primary {
        background-color: #3c8dbc;
        border-color: #367fa9;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.hover {
        background-color: #367fa9;
    }
    .btn-success {
        background-color: #00a65a;
        border-color: #008d4c;
    }
    .btn-success:hover,
    .btn-success:active,
    .btn-success.hover {
        background-color: #008d4c;
    }
    .btn-info {
        background-color: #00c0ef;
        border-color: #00acd6;
    }
    .btn-info:hover,
    .btn-info:active,
    .btn-info.hover {
        background-color: #00acd6;
    }
    .btn-danger {
        background-color: #dd4b39;
        border-color: #d73925;
    }
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger.hover {
        background-color: #d73925;
    }
    .btn-warning {
        background-color: #f39c12;
        border-color: #e08e0b;
    }
    .btn-warning:hover,
    .btn-warning:active,
    .btn-warning.hover {
        background-color: #e08e0b;
    }
    .btn-outline {
        border: 1px solid #fff;
        background: transparent;
        color: #fff;
    }
    .btn-outline:hover,
    .btn-outline:focus,
    .btn-outline:active {
        color: rgba(255, 255, 255, 0.7);
        border-color: rgba(255, 255, 255, 0.7);
    }
    .btn-link {
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .btn[class*='bg-']:hover {
        -webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
    }
    .btn-app {
        border-radius: 3px;
        position: relative;
        padding: 15px 5px;
        margin: 0 0 10px 10px;
        min-width: 80px;
        height: 60px;
        text-align: center;
        color: #666;
        border: 1px solid #ddd;
        background-color: #f4f4f4;
        font-size: 12px;
    }
    .btn-app > .fa,
    .btn-app > .glyphicon,
    .btn-app > .ion {
        font-size: 20px;
        display: block;
    }
    .btn-app:hover {
        background: #f4f4f4;
        color: #444;
        border-color: #aaa;
    }
    .btn-app:active,
    .btn-app:focus {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        -moz-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn-app > .badge {
        position: absolute;
        top: -3px;
        right: -10px;
        font-size: 10px;
        font-weight: 400;
    }
    /*
 * Component: Callout
 * ------------------
 */
    .callout {
        border-radius: 3px;
        margin: 0 0 20px 0;
        padding: 15px 30px 15px 15px;
        border-left: 5px solid #eee;
    }
    .callout a {
        color: #fff;
        text-decoration: underline;
    }
    .callout a:hover {
        color: #eee;
    }
    .callout h4 {
        margin-top: 0;
        font-weight: 600;
    }
    .callout p:last-child {
        margin-bottom: 0;
    }
    .callout code,
    .callout .highlight {
        background-color: #fff;
    }
    .callout.callout-danger {
        border-color: #c23321;
    }
    .callout.callout-warning {
        border-color: #c87f0a;
    }
    .callout.callout-info {
        border-color: #0097bc;
    }
    .callout.callout-success {
        border-color: #00733e;
    }
    /*
 * Component: alert
 * ----------------
 */
    .alert {
        border-radius: 3px;
    }
    .alert h4 {
        font-weight: 600;
    }
    .alert .icon {
        margin-right: 10px;
    }
    .alert .close {
        color: #000;
        opacity: 0.2;
        filter: alpha(opacity=20);
    }
    .alert .close:hover {
        opacity: 0.5;
        filter: alpha(opacity=50);
    }
    .alert a {
        color: #fff;
        text-decoration: underline;
    }
    .alert-success {
        border-color: #008d4c;
    }
    .alert-danger,
    .alert-error {
        border-color: #d73925;
    }
    .alert-warning {
        border-color: #e08e0b;
    }
    .alert-info {
        border-color: #00acd6;
    }
    /*
 * Component: Nav
 * --------------
 */
    .nav > li > a:hover,
    .nav > li > a:active,
    .nav > li > a:focus {
        color: #444;
        background: #f7f7f7;
    }
    /* NAV PILLS */
    .nav-pills > li > a {
        border-radius: 0;
        border-top: 3px solid transparent;
        color: #444;
    }
    .nav-pills > li > a > .fa,
    .nav-pills > li > a > .glyphicon,
    .nav-pills > li > a > .ion {
        margin-right: 5px;
    }
    .nav-pills > li.active > a,
    .nav-pills > li.active > a:hover,
    .nav-pills > li.active > a:focus {
        border-top-color: #3c8dbc;
    }
    .nav-pills > li.active > a {
        font-weight: 600;
    }
    /* NAV STACKED */
    .nav-stacked > li > a {
        border-radius: 0;
        border-top: 0;
        border-left: 3px solid transparent;
        color: #444;
    }
    .nav-stacked > li.active > a,
    .nav-stacked > li.active > a:hover {
        background: transparent;
        color: #444;
        border-top: 0;
        border-left-color: #3c8dbc;
    }
    .nav-stacked > li.header {
        border-bottom: 1px solid #ddd;
        color: #777;
        margin-bottom: 10px;
        padding: 5px 10px;
        text-transform: uppercase;
    }
    /* NAV TABS */
    .nav-tabs-custom {
        margin-bottom: 20px;
        background: #fff;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
    }
    .nav-tabs-custom > .nav-tabs {
        margin: 0;
        border-bottom-color: #f4f4f4;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .nav-tabs-custom > .nav-tabs > li {
        border-top: 3px solid transparent;
        margin-bottom: -2px;
        margin-right: 5px;
    }
    .nav-tabs-custom > .nav-tabs > li > a {
        color: #444;
        border-radius: 0;
    }
    .nav-tabs-custom > .nav-tabs > li > a.text-muted {
        color: #999;
    }
    .nav-tabs-custom > .nav-tabs > li > a,
    .nav-tabs-custom > .nav-tabs > li > a:hover {
        background: transparent;
        margin: 0;
    }
    .nav-tabs-custom > .nav-tabs > li > a:hover {
        color: #999;
    }
    .nav-tabs-custom > .nav-tabs > li:not(.active) > a:hover,
    .nav-tabs-custom > .nav-tabs > li:not(.active) > a:focus,
    .nav-tabs-custom > .nav-tabs > li:not(.active) > a:active {
        border-color: transparent;
    }
    .nav-tabs-custom > .nav-tabs > li.active {
        border-top-color: #3c8dbc;
    }
    .nav-tabs-custom > .nav-tabs > li.active > a,
    .nav-tabs-custom > .nav-tabs > li.active:hover > a {
        background-color: #fff;
        color: #444;
    }
    .nav-tabs-custom > .nav-tabs > li.active > a {
        border-top-color: transparent;
        border-left-color: #f4f4f4;
        border-right-color: #f4f4f4;
    }
    .nav-tabs-custom > .nav-tabs > li:first-of-type {
        margin-left: 0;
    }
    .nav-tabs-custom > .nav-tabs > li:first-of-type.active > a {
        border-left-color: transparent;
    }
    .nav-tabs-custom > .nav-tabs.pull-right {
        float: none !important;
    }
    .nav-tabs-custom > .nav-tabs.pull-right > li {
        float: right;
    }
    .nav-tabs-custom > .nav-tabs.pull-right > li:first-of-type {
        margin-right: 0;
    }
    .nav-tabs-custom > .nav-tabs.pull-right > li:first-of-type > a {
        border-left-width: 1px;
    }
    .nav-tabs-custom > .nav-tabs.pull-right > li:first-of-type.active > a {
        border-left-color: #f4f4f4;
        border-right-color: transparent;
    }
    .nav-tabs-custom > .nav-tabs > li.header {
        line-height: 35px;
        padding: 0 10px;
        font-size: 20px;
        color: #444;
    }
    .nav-tabs-custom > .nav-tabs > li.header > .fa,
    .nav-tabs-custom > .nav-tabs > li.header > .glyphicon,
    .nav-tabs-custom > .nav-tabs > li.header > .ion {
        margin-right: 5px;
    }
    .nav-tabs-custom > .tab-content {
        background: #fff;
        padding: 10px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    .nav-tabs-custom .dropdown.open > a:active,
    .nav-tabs-custom .dropdown.open > a:focus {
        background: transparent;
        color: #999;
    }
    .nav-tabs-custom.tab-primary > .nav-tabs > li.active {
        border-top-color: #3c8dbc;
    }
    .nav-tabs-custom.tab-info > .nav-tabs > li.active {
        border-top-color: #00c0ef;
    }
    .nav-tabs-custom.tab-danger > .nav-tabs > li.active {
        border-top-color: #dd4b39;
    }
    .nav-tabs-custom.tab-warning > .nav-tabs > li.active {
        border-top-color: #f39c12;
    }
    .nav-tabs-custom.tab-success > .nav-tabs > li.active {
        border-top-color: #00a65a;
    }
    .nav-tabs-custom.tab-default > .nav-tabs > li.active {
        border-top-color: #d2d6de;
    }
    /* PAGINATION */
    .pagination > li > a {
        background: #fafafa;
        color: #666;
    }
    .pagination.pagination-flat > li > a {
        border-radius: 0 !important;
    }
    /*
 * Component: Products List
 * ------------------------
 */
    .products-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .products-list > .item {
        border-radius: 3px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
        background: #fff;
    }
    .products-list > .item:before,
    .products-list > .item:after {
        content: " ";
        display: table;
    }
    .products-list > .item:after {
        clear: both;
    }
    .products-list .product-img {
        float: left;
    }
    .products-list .product-img img {
        width: 50px;
        height: 50px;
    }
    .products-list .product-info {
        margin-left: 60px;
    }
    .products-list .product-title {
        font-weight: 600;
    }
    .products-list .product-description {
        display: block;
        color: #999;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .product-list-in-box > .item {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
        border-bottom: 1px solid #f4f4f4;
    }
    .product-list-in-box > .item:last-of-type {
        border-bottom-width: 0;
    }
    /*
 * Component: Table
 * ----------------
 */
    .table > thead > tr > th,
    .table > tbody > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tbody > tr > td,
    .table > tfoot > tr > td {
        border-top: 1px solid #f4f4f4;
    }
    .table > thead > tr > th {
        border-bottom: 2px solid #f4f4f4;
    }
    .table tr td .progress {
        margin-top: 5px;
    }
    .table-bordered {
        border: 1px solid #f4f4f4;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #f4f4f4;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > thead > tr > td {
        border-bottom-width: 2px;
    }
    .table.no-border,
    .table.no-border td,
    .table.no-border th {
        border: 0;
    }
    /* .text-center in tables */
    table.text-center,
    table.text-center td,
    table.text-center th {
        text-align: center;
    }
    .table.align th {
        text-align: left;
    }
    .table.align td {
        text-align: right;
    }
    /*
 * Component: Label
 * ----------------
 */
    .label-default {
        background-color: #d2d6de;
        color: #444;
    }
    /*
 * Component: Direct Chat
 * ----------------------
 */
    .direct-chat .box-body {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        position: relative;
        overflow-x: hidden;
        padding: 0;
    }
    .direct-chat.chat-pane-open .direct-chat-contacts {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
    }
    .direct-chat-messages {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
        padding: 10px;
        height: 250px;
        overflow: auto;
    }
    .direct-chat-msg,
    .direct-chat-text {
        display: block;
    }
    .direct-chat-msg {
        margin-bottom: 10px;
    }
    .direct-chat-msg:before,
    .direct-chat-msg:after {
        content: " ";
        display: table;
    }
    .direct-chat-msg:after {
        clear: both;
    }
    .direct-chat-messages,
    .direct-chat-contacts {
        -webkit-transition: -webkit-transform 0.5s ease-in-out;
        -moz-transition: -moz-transform 0.5s ease-in-out;
        -o-transition: -o-transform 0.5s ease-in-out;
        transition: transform 0.5s ease-in-out;
    }
    .direct-chat-text {
        border-radius: 5px;
        position: relative;
        padding: 5px 10px;
        background: #d2d6de;
        border: 1px solid #d2d6de;
        margin: 5px 0 0 50px;
        color: #444444;
    }
    .direct-chat-text:after,
    .direct-chat-text:before {
        position: absolute;
        right: 100%;
        top: 15px;
        border: solid transparent;
        border-right-color: #d2d6de;
        content: ' ';
        height: 0;
        width: 0;
        pointer-events: none;
    }
    .direct-chat-text:after {
        border-width: 5px;
        margin-top: -5px;
    }
    .direct-chat-text:before {
        border-width: 6px;
        margin-top: -6px;
    }
    .right .direct-chat-text {
        margin-right: 50px;
        margin-left: 0;
    }
    .right .direct-chat-text:after,
    .right .direct-chat-text:before {
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #d2d6de;
    }
    .direct-chat-img {
        border-radius: 50%;
        float: left;
        width: 40px;
        height: 40px;
    }
    .right .direct-chat-img {
        float: right;
    }
    .direct-chat-info {
        display: block;
        margin-bottom: 2px;
        font-size: 12px;
    }
    .direct-chat-name {
        font-weight: 600;
    }
    .direct-chat-timestamp {
        color: #999;
    }
    .direct-chat-contacts-open .direct-chat-contacts {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
    }
    .direct-chat-contacts {
        -webkit-transform: translate(101%, 0);
        -ms-transform: translate(101%, 0);
        -o-transform: translate(101%, 0);
        transform: translate(101%, 0);
        position: absolute;
        top: 0;
        bottom: 0;
        height: 250px;
        width: 100%;
        background: #222d32;
        color: #fff;
        overflow: auto;
    }
    .contacts-list > li {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        padding: 10px;
        margin: 0;
    }
    .contacts-list > li:before,
    .contacts-list > li:after {
        content: " ";
        display: table;
    }
    .contacts-list > li:after {
        clear: both;
    }
    .contacts-list > li:last-of-type {
        border-bottom: none;
    }
    .contacts-list-img {
        border-radius: 50%;
        width: 40px;
        float: left;
    }
    .contacts-list-info {
        margin-left: 45px;
        color: #fff;
    }
    .contacts-list-name,
    .contacts-list-status {
        display: block;
    }
    .contacts-list-name {
        font-weight: 600;
    }
    .contacts-list-status {
        font-size: 12px;
    }
    .contacts-list-date {
        color: #aaa;
        font-weight: normal;
    }
    .contacts-list-msg {
        color: #999;
    }
    .direct-chat-danger .right > .direct-chat-text {
        background: #dd4b39;
        border-color: #dd4b39;
        color: #ffffff;
    }
    .direct-chat-danger .right > .direct-chat-text:after,
    .direct-chat-danger .right > .direct-chat-text:before {
        border-left-color: #dd4b39;
    }
    .direct-chat-primary .right > .direct-chat-text {
        background: #3c8dbc;
        border-color: #3c8dbc;
        color: #ffffff;
    }
    .direct-chat-primary .right > .direct-chat-text:after,
    .direct-chat-primary .right > .direct-chat-text:before {
        border-left-color: #3c8dbc;
    }
    .direct-chat-warning .right > .direct-chat-text {
        background: #f39c12;
        border-color: #f39c12;
        color: #ffffff;
    }
    .direct-chat-warning .right > .direct-chat-text:after,
    .direct-chat-warning .right > .direct-chat-text:before {
        border-left-color: #f39c12;
    }
    .direct-chat-info .right > .direct-chat-text {
        background: #00c0ef;
        border-color: #00c0ef;
        color: #ffffff;
    }
    .direct-chat-info .right > .direct-chat-text:after,
    .direct-chat-info .right > .direct-chat-text:before {
        border-left-color: #00c0ef;
    }
    .direct-chat-success .right > .direct-chat-text {
        background: #00a65a;
        border-color: #00a65a;
        color: #ffffff;
    }
    .direct-chat-success .right > .direct-chat-text:after,
    .direct-chat-success .right > .direct-chat-text:before {
        border-left-color: #00a65a;
    }
    /*
 * Component: Users List
 * ---------------------
 */
    .users-list > li {
        width: 25%;
        float: left;
        padding: 10px;
        text-align: center;
    }
    .users-list > li img {
        border-radius: 50%;
        max-width: 100%;
        height: auto;
    }
    .users-list > li > a:hover,
    .users-list > li > a:hover .users-list-name {
        color: #999;
    }
    .users-list-name,
    .users-list-date {
        display: block;
    }
    .users-list-name {
        font-weight: 600;
        color: #444;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .users-list-date {
        color: #999;
        font-size: 12px;
    }
    /*
 * Component: Carousel
 * -------------------
 */
    .carousel-control.left,
    .carousel-control.right {
        background-image: none;
    }
    .carousel-control > .fa {
        font-size: 40px;
        position: absolute;
        top: 50%;
        z-index: 5;
        display: inline-block;
        margin-top: -20px;
    }
    /*
 * Component: modal
 * ----------------
 */
    .modal {
        background: rgba(0, 0, 0, 0.3);
    }
    .modal-content {
        border-radius: 0;
        -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
        border: 0;
    }
    @media (min-width: 768px) {
        .modal-content {
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
        }
    }
    .modal-header {
        border-bottom-color: #f4f4f4;
    }
    .modal-footer {
        border-top-color: #f4f4f4;
    }
    .modal-primary .modal-header,
    .modal-primary .modal-footer {
        border-color: #307095;
    }
    .modal-warning .modal-header,
    .modal-warning .modal-footer {
        border-color: #c87f0a;
    }
    .modal-info .modal-header,
    .modal-info .modal-footer {
        border-color: #0097bc;
    }
    .modal-success .modal-header,
    .modal-success .modal-footer {
        border-color: #00733e;
    }
    .modal-danger .modal-header,
    .modal-danger .modal-footer {
        border-color: #c23321;
    }
    /*
 * Component: Social Widgets
 * -------------------------
 */
    .box-widget {
        border: none;
        position: relative;
    }
    .widget-user .widget-user-header {
        padding: 20px;
        height: 120px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .widget-user .widget-user-username {
        margin-top: 0;
        margin-bottom: 5px;
        font-size: 25px;
        font-weight: 300;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    }
    .widget-user .widget-user-desc {
        margin-top: 0;
    }
    .widget-user .widget-user-image {
        position: absolute;
        top: 65px;
        left: 50%;
        margin-left: -45px;
    }
    .widget-user .widget-user-image > img {
        width: 90px;
        height: auto;
        border: 3px solid #fff;
    }
    .widget-user .box-footer {
        padding-top: 30px;
    }
    .widget-user-2 .widget-user-header {
        padding: 20px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .widget-user-2 .widget-user-username {
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: 25px;
        font-weight: 300;
    }
    .widget-user-2 .widget-user-desc {
        margin-top: 0;
    }
    .widget-user-2 .widget-user-username,
    .widget-user-2 .widget-user-desc {
        margin-left: 75px;
    }
    .widget-user-2 .widget-user-image > img {
        width: 65px;
        height: auto;
        float: left;
    }
    /*
 * Page: Mailbox
 * -------------
 */
    .mailbox-messages > .table {
        margin: 0;
    }
    .mailbox-controls {
        padding: 5px;
    }
    .mailbox-controls.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .mailbox-read-info {
        border-bottom: 1px solid #f4f4f4;
        padding: 10px;
    }
    .mailbox-read-info h3 {
        font-size: 20px;
        margin: 0;
    }
    .mailbox-read-info h5 {
        margin: 0;
        padding: 5px 0 0 0;
    }
    .mailbox-read-time {
        color: #999;
        font-size: 13px;
    }
    .mailbox-read-message {
        padding: 10px;
    }
    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .mailbox-attachment-name {
        font-weight: bold;
        color: #666;
    }
    .mailbox-attachment-icon,
    .mailbox-attachment-info,
    .mailbox-attachment-size {
        display: block;
    }
    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }
    .mailbox-attachment-size {
        color: #999;
        font-size: 12px;
    }
    .mailbox-attachment-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        padding: 20px 10px;
    }
    .mailbox-attachment-icon.has-img {
        padding: 0;
    }
    .mailbox-attachment-icon.has-img > img {
        max-width: 100%;
        height: auto;
    }
    /*
 * Page: Lock Screen
 * -----------------
 */
    /* ADD THIS CLASS TO THE <BODY> TAG */
    .lockscreen {
        background: #d2d6de;
    }
    .lockscreen-logo {
        font-size: 35px;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
    }
    .lockscreen-logo a {
        color: #444;
    }
    .lockscreen-wrapper {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 10%;
    }
    /* User name [optional] */
    .lockscreen .lockscreen-name {
        text-align: center;
        font-weight: 600;
    }
    /* Will contain the image and the sign in form */
    .lockscreen-item {
        border-radius: 4px;
        padding: 0;
        background: #fff;
        position: relative;
        margin: 10px auto 30px auto;
        width: 290px;
    }
    /* User image */
    .lockscreen-image {
        border-radius: 50%;
        position: absolute;
        left: -10px;
        top: -25px;
        background: #fff;
        padding: 5px;
        z-index: 10;
    }
    .lockscreen-image > img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
    }
    /* Contains the password input and the login button */
    .lockscreen-credentials {
        margin-left: 70px;
    }
    .lockscreen-credentials .form-control {
        border: 0;
    }
    .lockscreen-credentials .btn {
        background-color: #fff;
        border: 0;
        padding: 0 10px;
    }
    .lockscreen-footer {
        margin-top: 10px;
    }
    /*
 * Page: Login & Register
 * ----------------------
 */
    .login-logo,
    .register-logo {
        font-size: 35px;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
    }
    .login-logo a,
    .register-logo a {
        color: #444;
    }
    .login-page,
    .register-page {
        background: #d2d6de;
    }
    .login-box,
    .register-box {
        width: 360px;
        margin: 7% auto;
    }
    @media (max-width: 768px) {
        .login-box,
        .register-box {
            width: 90%;
            margin-top: 20px;
        }
    }
    .login-box-body,
    .register-box-body {
        background: #fff;
        padding: 20px;
        border-top: 0;
        color: #666;
    }
    .login-box-body .form-control-feedback,
    .register-box-body .form-control-feedback {
        color: #777;
    }
    .login-box-msg,
    .register-box-msg {
        margin: 0;
        text-align: center;
        padding: 0 20px 20px 20px;
    }
    .social-auth-links {
        margin: 10px 0;
    }
    /*
 * Page: 400 and 500 error pages
 * ------------------------------
 */
    .error-page {
        width: 600px;
        margin: 20px auto 0 auto;
    }
    @media (max-width: 991px) {
        .error-page {
            width: 100%;
        }
    }
    .error-page > .headline {
        float: left;
        font-size: 100px;
        font-weight: 300;
    }
    @media (max-width: 991px) {
        .error-page > .headline {
            float: none;
            text-align: center;
        }
    }
    .error-page > .error-content {
        margin-left: 190px;
        display: block;
    }
    @media (max-width: 991px) {
        .error-page > .error-content {
            margin-left: 0;
        }
    }
    .error-page > .error-content > h3 {
        font-weight: 300;
        font-size: 25px;
    }
    @media (max-width: 991px) {
        .error-page > .error-content > h3 {
            text-align: center;
        }
    }
    /*
 * Page: Invoice
 * -------------
 */
    .invoice {
        position: relative;
        background: #fff;
        border: 1px solid #f4f4f4;
        padding: 20px;
        margin: 10px 25px;
    }
    .invoice-title {
        margin-top: 0;
    }
    /*
 * Page: Profile
 * -------------
 */
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
    .profile-username {
        font-size: 21px;
        margin-top: 5px;
    }
    .post {
        border-bottom: 1px solid #d2d6de;
        margin-bottom: 15px;
        padding-bottom: 15px;
        color: #666;
    }
    .post:last-of-type {
        border-bottom: 0;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .post .user-block {
        margin-bottom: 15px;
    }
    /*
 * Social Buttons for Bootstrap
 *
 * Copyright 2013-2015 Panayiotis Lipiridis
 * Licensed under the MIT License
 *
 * https://github.com/lipis/bootstrap-social
 */
    .btn-social {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .btn-social > :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 32px;
        line-height: 34px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    .btn-social.btn-lg {
        padding-left: 61px;
    }
    .btn-social.btn-lg > :first-child {
        line-height: 45px;
        width: 45px;
        font-size: 1.8em;
    }
    .btn-social.btn-sm {
        padding-left: 38px;
    }
    .btn-social.btn-sm > :first-child {
        line-height: 28px;
        width: 28px;
        font-size: 1.4em;
    }
    .btn-social.btn-xs {
        padding-left: 30px;
    }
    .btn-social.btn-xs > :first-child {
        line-height: 20px;
        width: 20px;
        font-size: 1.2em;
    }
    .btn-social-icon {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 34px;
        width: 34px;
        padding: 0;
    }
    .btn-social-icon > :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 32px;
        line-height: 34px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    .btn-social-icon.btn-lg {
        padding-left: 61px;
    }
    .btn-social-icon.btn-lg > :first-child {
        line-height: 45px;
        width: 45px;
        font-size: 1.8em;
    }
    .btn-social-icon.btn-sm {
        padding-left: 38px;
    }
    .btn-social-icon.btn-sm > :first-child {
        line-height: 28px;
        width: 28px;
        font-size: 1.4em;
    }
    .btn-social-icon.btn-xs {
        padding-left: 30px;
    }
    .btn-social-icon.btn-xs > :first-child {
        line-height: 20px;
        width: 20px;
        font-size: 1.2em;
    }
    .btn-social-icon > :first-child {
        border: none;
        text-align: center;
        width: 100%;
    }
    .btn-social-icon.btn-lg {
        height: 45px;
        width: 45px;
        padding-left: 0;
        padding-right: 0;
    }
    .btn-social-icon.btn-sm {
        height: 30px;
        width: 30px;
        padding-left: 0;
        padding-right: 0;
    }
    .btn-social-icon.btn-xs {
        height: 22px;
        width: 22px;
        padding-left: 0;
        padding-right: 0;
    }
    .btn-adn {
        color: #ffffff;
        background-color: #d87a68;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-adn:focus,
    .btn-adn.focus {
        color: #ffffff;
        background-color: #ce563f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-adn:hover {
        color: #ffffff;
        background-color: #ce563f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-adn:active,
    .btn-adn.active,
    .open > .dropdown-toggle.btn-adn {
        color: #ffffff;
        background-color: #ce563f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-adn:active,
    .btn-adn.active,
    .open > .dropdown-toggle.btn-adn {
        background-image: none;
    }
    .btn-adn .badge {
        color: #d87a68;
        background-color: #ffffff;
    }
    .btn-bitbucket {
        color: #ffffff;
        background-color: #205081;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-bitbucket:focus,
    .btn-bitbucket.focus {
        color: #ffffff;
        background-color: #163758;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-bitbucket:hover {
        color: #ffffff;
        background-color: #163758;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-bitbucket:active,
    .btn-bitbucket.active,
    .open > .dropdown-toggle.btn-bitbucket {
        color: #ffffff;
        background-color: #163758;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-bitbucket:active,
    .btn-bitbucket.active,
    .open > .dropdown-toggle.btn-bitbucket {
        background-image: none;
    }
    .btn-bitbucket .badge {
        color: #205081;
        background-color: #ffffff;
    }
    .btn-dropbox {
        color: #ffffff;
        background-color: #1087dd;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-dropbox:focus,
    .btn-dropbox.focus {
        color: #ffffff;
        background-color: #0d6aad;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-dropbox:hover {
        color: #ffffff;
        background-color: #0d6aad;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-dropbox:active,
    .btn-dropbox.active,
    .open > .dropdown-toggle.btn-dropbox {
        color: #ffffff;
        background-color: #0d6aad;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-dropbox:active,
    .btn-dropbox.active,
    .open > .dropdown-toggle.btn-dropbox {
        background-image: none;
    }
    .btn-dropbox .badge {
        color: #1087dd;
        background-color: #ffffff;
    }
    .btn-facebook {
        color: #ffffff;
        background-color: #3b5998;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-facebook:focus,
    .btn-facebook.focus {
        color: #ffffff;
        background-color: #2d4373;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-facebook:hover {
        color: #ffffff;
        background-color: #2d4373;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-facebook:active,
    .btn-facebook.active,
    .open > .dropdown-toggle.btn-facebook {
        color: #ffffff;
        background-color: #2d4373;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-facebook:active,
    .btn-facebook.active,
    .open > .dropdown-toggle.btn-facebook {
        background-image: none;
    }
    .btn-facebook .badge {
        color: #3b5998;
        background-color: #ffffff;
    }
    .btn-flickr {
        color: #ffffff;
        background-color: #ff0084;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-flickr:focus,
    .btn-flickr.focus {
        color: #ffffff;
        background-color: #cc006a;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-flickr:hover {
        color: #ffffff;
        background-color: #cc006a;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-flickr:active,
    .btn-flickr.active,
    .open > .dropdown-toggle.btn-flickr {
        color: #ffffff;
        background-color: #cc006a;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-flickr:active,
    .btn-flickr.active,
    .open > .dropdown-toggle.btn-flickr {
        background-image: none;
    }
    .btn-flickr .badge {
        color: #ff0084;
        background-color: #ffffff;
    }
    .btn-foursquare {
        color: #ffffff;
        background-color: #f94877;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-foursquare:focus,
    .btn-foursquare.focus {
        color: #ffffff;
        background-color: #f71752;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-foursquare:hover {
        color: #ffffff;
        background-color: #f71752;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-foursquare:active,
    .btn-foursquare.active,
    .open > .dropdown-toggle.btn-foursquare {
        color: #ffffff;
        background-color: #f71752;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-foursquare:active,
    .btn-foursquare.active,
    .open > .dropdown-toggle.btn-foursquare {
        background-image: none;
    }
    .btn-foursquare .badge {
        color: #f94877;
        background-color: #ffffff;
    }
    .btn-github {
        color: #ffffff;
        background-color: #444444;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-github:focus,
    .btn-github.focus {
        color: #ffffff;
        background-color: #2b2b2b;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-github:hover {
        color: #ffffff;
        background-color: #2b2b2b;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-github:active,
    .btn-github.active,
    .open > .dropdown-toggle.btn-github {
        color: #ffffff;
        background-color: #2b2b2b;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-github:active,
    .btn-github.active,
    .open > .dropdown-toggle.btn-github {
        background-image: none;
    }
    .btn-github .badge {
        color: #444444;
        background-color: #ffffff;
    }
    .btn-google {
        color: #ffffff;
        background-color: #dd4b39;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-google:focus,
    .btn-google.focus {
        color: #ffffff;
        background-color: #c23321;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-google:hover {
        color: #ffffff;
        background-color: #c23321;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-google:active,
    .btn-google.active,
    .open > .dropdown-toggle.btn-google {
        color: #ffffff;
        background-color: #c23321;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-google:active,
    .btn-google.active,
    .open > .dropdown-toggle.btn-google {
        background-image: none;
    }
    .btn-google .badge {
        color: #dd4b39;
        background-color: #ffffff;
    }
    .btn-instagram {
        color: #ffffff;
        background-color: #3f729b;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-instagram:focus,
    .btn-instagram.focus {
        color: #ffffff;
        background-color: #305777;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-instagram:hover {
        color: #ffffff;
        background-color: #305777;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-instagram:active,
    .btn-instagram.active,
    .open > .dropdown-toggle.btn-instagram {
        color: #ffffff;
        background-color: #305777;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-instagram:active,
    .btn-instagram.active,
    .open > .dropdown-toggle.btn-instagram {
        background-image: none;
    }
    .btn-instagram .badge {
        color: #3f729b;
        background-color: #ffffff;
    }
    .btn-linkedin {
        color: #ffffff;
        background-color: #007bb6;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-linkedin:focus,
    .btn-linkedin.focus {
        color: #ffffff;
        background-color: #005983;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-linkedin:hover {
        color: #ffffff;
        background-color: #005983;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-linkedin:active,
    .btn-linkedin.active,
    .open > .dropdown-toggle.btn-linkedin {
        color: #ffffff;
        background-color: #005983;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-linkedin:active,
    .btn-linkedin.active,
    .open > .dropdown-toggle.btn-linkedin {
        background-image: none;
    }
    .btn-linkedin .badge {
        color: #007bb6;
        background-color: #ffffff;
    }
    .btn-microsoft {
        color: #ffffff;
        background-color: #2672ec;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-microsoft:focus,
    .btn-microsoft.focus {
        color: #ffffff;
        background-color: #125acd;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-microsoft:hover {
        color: #ffffff;
        background-color: #125acd;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-microsoft:active,
    .btn-microsoft.active,
    .open > .dropdown-toggle.btn-microsoft {
        color: #ffffff;
        background-color: #125acd;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-microsoft:active,
    .btn-microsoft.active,
    .open > .dropdown-toggle.btn-microsoft {
        background-image: none;
    }
    .btn-microsoft .badge {
        color: #2672ec;
        background-color: #ffffff;
    }
    .btn-openid {
        color: #ffffff;
        background-color: #f7931e;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-openid:focus,
    .btn-openid.focus {
        color: #ffffff;
        background-color: #da7908;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-openid:hover {
        color: #ffffff;
        background-color: #da7908;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-openid:active,
    .btn-openid.active,
    .open > .dropdown-toggle.btn-openid {
        color: #ffffff;
        background-color: #da7908;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-openid:active,
    .btn-openid.active,
    .open > .dropdown-toggle.btn-openid {
        background-image: none;
    }
    .btn-openid .badge {
        color: #f7931e;
        background-color: #ffffff;
    }
    .btn-pinterest {
        color: #ffffff;
        background-color: #cb2027;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-pinterest:focus,
    .btn-pinterest.focus {
        color: #ffffff;
        background-color: #9f191f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-pinterest:hover {
        color: #ffffff;
        background-color: #9f191f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-pinterest:active,
    .btn-pinterest.active,
    .open > .dropdown-toggle.btn-pinterest {
        color: #ffffff;
        background-color: #9f191f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-pinterest:active,
    .btn-pinterest.active,
    .open > .dropdown-toggle.btn-pinterest {
        background-image: none;
    }
    .btn-pinterest .badge {
        color: #cb2027;
        background-color: #ffffff;
    }
    .btn-reddit {
        color: #000000;
        background-color: #eff7ff;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-reddit:focus,
    .btn-reddit.focus {
        color: #000000;
        background-color: #bcddff;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-reddit:hover {
        color: #000000;
        background-color: #bcddff;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-reddit:active,
    .btn-reddit.active,
    .open > .dropdown-toggle.btn-reddit {
        color: #000000;
        background-color: #bcddff;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-reddit:active,
    .btn-reddit.active,
    .open > .dropdown-toggle.btn-reddit {
        background-image: none;
    }
    .btn-reddit .badge {
        color: #eff7ff;
        background-color: #000000;
    }
    .btn-soundcloud {
        color: #ffffff;
        background-color: #ff5500;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-soundcloud:focus,
    .btn-soundcloud.focus {
        color: #ffffff;
        background-color: #cc4400;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-soundcloud:hover {
        color: #ffffff;
        background-color: #cc4400;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-soundcloud:active,
    .btn-soundcloud.active,
    .open > .dropdown-toggle.btn-soundcloud {
        color: #ffffff;
        background-color: #cc4400;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-soundcloud:active,
    .btn-soundcloud.active,
    .open > .dropdown-toggle.btn-soundcloud {
        background-image: none;
    }
    .btn-soundcloud .badge {
        color: #ff5500;
        background-color: #ffffff;
    }
    .btn-tumblr {
        color: #ffffff;
        background-color: #2c4762;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-tumblr:focus,
    .btn-tumblr.focus {
        color: #ffffff;
        background-color: #1c2d3f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-tumblr:hover {
        color: #ffffff;
        background-color: #1c2d3f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-tumblr:active,
    .btn-tumblr.active,
    .open > .dropdown-toggle.btn-tumblr {
        color: #ffffff;
        background-color: #1c2d3f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-tumblr:active,
    .btn-tumblr.active,
    .open > .dropdown-toggle.btn-tumblr {
        background-image: none;
    }
    .btn-tumblr .badge {
        color: #2c4762;
        background-color: #ffffff;
    }
    .btn-twitter {
        color: #ffffff;
        background-color: #55acee;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-twitter:focus,
    .btn-twitter.focus {
        color: #ffffff;
        background-color: #2795e9;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-twitter:hover {
        color: #ffffff;
        background-color: #2795e9;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-twitter:active,
    .btn-twitter.active,
    .open > .dropdown-toggle.btn-twitter {
        color: #ffffff;
        background-color: #2795e9;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-twitter:active,
    .btn-twitter.active,
    .open > .dropdown-toggle.btn-twitter {
        background-image: none;
    }
    .btn-twitter .badge {
        color: #55acee;
        background-color: #ffffff;
    }
    .btn-vimeo {
        color: #ffffff;
        background-color: #1ab7ea;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vimeo:focus,
    .btn-vimeo.focus {
        color: #ffffff;
        background-color: #1295bf;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vimeo:hover {
        color: #ffffff;
        background-color: #1295bf;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vimeo:active,
    .btn-vimeo.active,
    .open > .dropdown-toggle.btn-vimeo {
        color: #ffffff;
        background-color: #1295bf;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vimeo:active,
    .btn-vimeo.active,
    .open > .dropdown-toggle.btn-vimeo {
        background-image: none;
    }
    .btn-vimeo .badge {
        color: #1ab7ea;
        background-color: #ffffff;
    }
    .btn-vk {
        color: #ffffff;
        background-color: #587ea3;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vk:focus,
    .btn-vk.focus {
        color: #ffffff;
        background-color: #466482;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vk:hover {
        color: #ffffff;
        background-color: #466482;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vk:active,
    .btn-vk.active,
    .open > .dropdown-toggle.btn-vk {
        color: #ffffff;
        background-color: #466482;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-vk:active,
    .btn-vk.active,
    .open > .dropdown-toggle.btn-vk {
        background-image: none;
    }
    .btn-vk .badge {
        color: #587ea3;
        background-color: #ffffff;
    }
    .btn-yahoo {
        color: #ffffff;
        background-color: #720e9e;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-yahoo:focus,
    .btn-yahoo.focus {
        color: #ffffff;
        background-color: #500a6f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-yahoo:hover {
        color: #ffffff;
        background-color: #500a6f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-yahoo:active,
    .btn-yahoo.active,
    .open > .dropdown-toggle.btn-yahoo {
        color: #ffffff;
        background-color: #500a6f;
        border-color: rgba(0, 0, 0, 0.2);
    }
    .btn-yahoo:active,
    .btn-yahoo.active,
    .open > .dropdown-toggle.btn-yahoo {
        background-image: none;
    }
    .btn-yahoo .badge {
        color: #720e9e;
        background-color: #ffffff;
    }
    /*
 * Plugin: Full Calendar
 * ---------------------
 */
    .fc-button {
        background: #f4f4f4;
        background-image: none;
        color: #444;
        border-color: #ddd;
        border-bottom-color: #ddd;
    }
    .fc-button:hover,
    .fc-button:active,
    .fc-button.hover {
        background-color: #e9e9e9;
    }
    .fc-header-title h2 {
        font-size: 15px;
        line-height: 1.6em;
        color: #666;
        margin-left: 10px;
    }
    .fc-header-right {
        padding-right: 10px;
    }
    .fc-header-left {
        padding-left: 10px;
    }
    .fc-widget-header {
        background: #fafafa;
    }
    .fc-grid {
        width: 100%;
        border: 0;
    }
    .fc-widget-header:first-of-type,
    .fc-widget-content:first-of-type {
        border-left: 0;
        border-right: 0;
    }
    .fc-widget-header:last-of-type,
    .fc-widget-content:last-of-type {
        border-right: 0;
    }
    .fc-toolbar {
        padding: 10px;
        margin: 0;
    }
    .fc-day-number {
        font-size: 20px;
        font-weight: 300;
        padding-right: 10px;
    }
    .fc-color-picker {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .fc-color-picker > li {
        float: left;
        font-size: 30px;
        margin-right: 5px;
        line-height: 30px;
    }
    .fc-color-picker > li .fa {
        -webkit-transition: -webkit-transform linear 0.3s;
        -moz-transition: -moz-transform linear 0.3s;
        -o-transition: -o-transform linear 0.3s;
        transition: transform linear 0.3s;
    }
    .fc-color-picker > li .fa:hover {
        -webkit-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        -o-transform: rotate(30deg);
        transform: rotate(30deg);
    }
    #add-new-event {
        -webkit-transition: all linear 0.3s;
        -o-transition: all linear 0.3s;
        transition: all linear 0.3s;
    }
    .external-event {
        padding: 5px 10px;
        font-weight: bold;
        margin-bottom: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        cursor: move;
    }
    .external-event:hover {
        box-shadow: inset 0 0 90px rgba(0, 0, 0, 0.2);
    }
    /*
 * Plugin: Select2
 * ---------------
 */
    .select2-container--default.select2-container--focus,
    .select2-selection.select2-container--focus,
    .select2-container--default:focus,
    .select2-selection:focus,
    .select2-container--default:active,
    .select2-selection:active {
        outline: none;
    }
    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
        padding: 6px 12px;
        height: 34px;
    }
    .select2-container--default.select2-container--open {
        border-color: #3c8dbc;
    }
    .select2-dropdown {
        border: 1px solid #d2d6de;
        border-radius: 0;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #3c8dbc;
        color: white;
    }
    .select2-results__option {
        padding: 6px 12px;
        user-select: none;
        -webkit-user-select: none;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 0;
        padding-right: 0;
        height: auto;
        margin-top: -4px;
    }
    .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
        padding-right: 6px;
        padding-left: 20px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 28px;
        right: 3px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        margin-top: 0;
    }
    .select2-dropdown .select2-search__field,
    .select2-search--inline .select2-search__field {
        border: 1px solid #d2d6de;
    }
    .select2-dropdown .select2-search__field:focus,
    .select2-search--inline .select2-search__field:focus {
        outline: none;
        border: 1px solid #3c8dbc;
    }
    .select2-container--default .select2-results__option[aria-disabled=true] {
        color: #999;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #ddd;
    }
    .select2-container--default .select2-results__option[aria-selected=true],
    .select2-container--default .select2-results__option[aria-selected=true]:hover {
        color: #444;
    }
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #d2d6de;
        border-radius: 0;
    }
    .select2-container--default .select2-selection--multiple:focus {
        border-color: #3c8dbc;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #d2d6de;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc;
        border-color: #367fa9;
        padding: 1px 10px;
        color: #fff;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-right: 5px;
        color: rgba(255, 255, 255, 0.7);
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #fff;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-right: 10px;
    }
    /*
 * General: Miscellaneous
 * ----------------------
 */
    .pad {
        padding: 10px;
    }
    .margin {
        margin: 10px;
    }
    .margin-bottom {
        margin-bottom: 20px;
    }
    .margin-bottom-none {
        margin-bottom: 0;
    }
    .margin-r-5 {
        margin-right: 5px;
    }
    .inline {
        display: inline;
    }
    .description-block {
        display: block;
        margin: 10px 0;
        text-align: center;
    }
    .description-block.margin-bottom {
        margin-bottom: 25px;
    }
    .description-block > .description-header {
        margin: 0;
        padding: 0;
        font-weight: 600;
        font-size: 16px;
    }
    .description-block > .description-text {
        text-transform: uppercase;
    }
    .bg-red,
    .bg-yellow,
    .bg-aqua,
    .bg-blue,
    .bg-light-blue,
    .bg-green,
    .bg-navy,
    .bg-teal,
    .bg-olive,
    .bg-lime,
    .bg-orange,
    .bg-fuchsia,
    .bg-purple,
    .bg-maroon,
    .bg-black,
    .bg-red-active,
    .bg-yellow-active,
    .bg-aqua-active,
    .bg-blue-active,
    .bg-light-blue-active,
    .bg-green-active,
    .bg-navy-active,
    .bg-teal-active,
    .bg-olive-active,
    .bg-lime-active,
    .bg-orange-active,
    .bg-fuchsia-active,
    .bg-purple-active,
    .bg-maroon-active,
    .bg-black-active,
    .callout.callout-danger,
    .callout.callout-warning,
    .callout.callout-info,
    .callout.callout-success,
    .alert-success,
    .alert-danger,
    .alert-error,
    .alert-warning,
    .alert-info,
    .label-danger,
    .label-info,
    .label-warning,
    .label-primary,
    .label-success,
    .modal-primary .modal-body,
    .modal-primary .modal-header,
    .modal-primary .modal-footer,
    .modal-warning .modal-body,
    .modal-warning .modal-header,
    .modal-warning .modal-footer,
    .modal-info .modal-body,
    .modal-info .modal-header,
    .modal-info .modal-footer,
    .modal-success .modal-body,
    .modal-success .modal-header,
    .modal-success .modal-footer,
    .modal-danger .modal-body,
    .modal-danger .modal-header,
    .modal-danger .modal-footer {
        color: #fff !important;
    }
    .bg-gray {
        color: #000;
        background-color: #d2d6de !important;
    }
    .bg-gray-light {
        background-color: #f7f7f7;
    }
    .bg-black {
        background-color: #111111 !important;
    }
    .bg-red,
    .callout.callout-danger,
    .alert-danger,
    .alert-error,
    .label-danger,
    .modal-danger .modal-body {
        background-color: #dd4b39 !important;
    }
    .bg-yellow,
    .callout.callout-warning,
    .alert-warning,
    .label-warning,
    .modal-warning .modal-body {
        background-color: #f39c12 !important;
    }
    .bg-aqua,
    .callout.callout-info,
    .alert-info,
    .label-info,
    .modal-info .modal-body {
        background-color: #00c0ef !important;
    }
    .bg-blue {
        background-color: #0073b7 !important;
    }
    .bg-light-blue,
    .label-primary,
    .modal-primary .modal-body {
        background-color: #3c8dbc !important;
    }
    .bg-green,
    .callout.callout-success,
    .alert-success,
    .label-success,
    .modal-success .modal-body {
        background-color: #00a65a !important;
    }
    .bg-navy {
        background-color: #001f3f !important;
    }
    .bg-teal {
        background-color: #39cccc !important;
    }
    .bg-olive {
        background-color: #3d9970 !important;
    }
    .bg-lime {
        background-color: #01ff70 !important;
    }
    .bg-orange {
        background-color: #ff851b !important;
    }
    .bg-fuchsia {
        background-color: #f012be !important;
    }
    .bg-purple {
        background-color: #605ca8 !important;
    }
    .bg-maroon {
        background-color: #d81b60 !important;
    }
    .bg-gray-active {
        color: #000;
        background-color: #b5bbc8 !important;
    }
    .bg-black-active {
        background-color: #000000 !important;
    }
    .bg-red-active,
    .modal-danger .modal-header,
    .modal-danger .modal-footer {
        background-color: #d33724 !important;
    }
    .bg-yellow-active,
    .modal-warning .modal-header,
    .modal-warning .modal-footer {
        background-color: #db8b0b !important;
    }
    .bg-aqua-active,
    .modal-info .modal-header,
    .modal-info .modal-footer {
        background-color: #00a7d0 !important;
    }
    .bg-blue-active {
        background-color: #005384 !important;
    }
    .bg-light-blue-active,
    .modal-primary .modal-header,
    .modal-primary .modal-footer {
        background-color: #357ca5 !important;
    }
    .bg-green-active,
    .modal-success .modal-header,
    .modal-success .modal-footer {
        background-color: #008d4c !important;
    }
    .bg-navy-active {
        background-color: #001a35 !important;
    }
    .bg-teal-active {
        background-color: #30bbbb !important;
    }
    .bg-olive-active {
        background-color: #368763 !important;
    }
    .bg-lime-active {
        background-color: #00e765 !important;
    }
    .bg-orange-active {
        background-color: #ff7701 !important;
    }
    .bg-fuchsia-active {
        background-color: #db0ead !important;
    }
    .bg-purple-active {
        background-color: #555299 !important;
    }
    .bg-maroon-active {
        background-color: #ca195a !important;
    }
    [class^="bg-"].disabled {
        opacity: 0.65;
        filter: alpha(opacity=65);
    }
    .text-red {
        color: #dd4b39 !important;
    }
    .text-yellow {
        color: #f39c12 !important;
    }
    .text-aqua {
        color: #00c0ef !important;
    }
    .text-blue {
        color: #0073b7 !important;
    }
    .text-black {
        color: #111111 !important;
    }
    .text-light-blue {
        color: #3c8dbc !important;
    }
    .text-green {
        color: #00a65a !important;
    }
    .text-gray {
        color: #d2d6de !important;
    }
    .text-navy {
        color: #001f3f !important;
    }
    .text-teal {
        color: #39cccc !important;
    }
    .text-olive {
        color: #3d9970 !important;
    }
    .text-lime {
        color: #01ff70 !important;
    }
    .text-orange {
        color: #ff851b !important;
    }
    .text-fuchsia {
        color: #f012be !important;
    }
    .text-purple {
        color: #605ca8 !important;
    }
    .text-maroon {
        color: #d81b60 !important;
    }
    .link-muted {
        color: #7a869d;
    }
    .link-muted:hover,
    .link-muted:focus {
        color: #606c84;
    }
    .link-black {
        color: #666;
    }
    .link-black:hover,
    .link-black:focus {
        color: #999;
    }
    .hide {
        display: none !important;
    }
    .no-border {
        border: 0 !important;
    }
    .no-padding {
        padding: 0 !important;
    }
    .no-margin {
        margin: 0 !important;
    }
    .no-shadow {
        box-shadow: none !important;
    }
    .list-unstyled,
    .chart-legend,
    .contacts-list,
    .users-list,
    .mailbox-attachments {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .list-group-unbordered > .list-group-item {
        border-left: 0;
        border-right: 0;
        border-radius: 0;
        padding-left: 0;
        padding-right: 0;
    }
    .flat {
        border-radius: 0 !important;
    }
    .text-bold,
    .text-bold.table td,
    .text-bold.table th {
        font-weight: 700;
    }
    .text-sm {
        font-size: 12px;
    }
    .jqstooltip {
        padding: 5px !important;
        width: auto !important;
        height: auto !important;
    }
    .bg-teal-gradient {
        background: #39cccc !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #39cccc), color-stop(1, #7adddd)) !important;
        background: -ms-linear-gradient(bottom, #39cccc, #7adddd) !important;
        background: -moz-linear-gradient(center bottom, #39cccc 0%, #7adddd 100%) !important;
        background: -o-linear-gradient(#7adddd, #39cccc) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7adddd', endColorstr='#39cccc', GradientType=0) !important;
        color: #fff;
    }
    .bg-light-blue-gradient {
        background: #3c8dbc !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #3c8dbc), color-stop(1, #67a8ce)) !important;
        background: -ms-linear-gradient(bottom, #3c8dbc, #67a8ce) !important;
        background: -moz-linear-gradient(center bottom, #3c8dbc 0%, #67a8ce 100%) !important;
        background: -o-linear-gradient(#67a8ce, #3c8dbc) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#67a8ce', endColorstr='#3c8dbc', GradientType=0) !important;
        color: #fff;
    }
    .bg-blue-gradient {
        background: #0073b7 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #0073b7), color-stop(1, #0089db)) !important;
        background: -ms-linear-gradient(bottom, #0073b7, #0089db) !important;
        background: -moz-linear-gradient(center bottom, #0073b7 0%, #0089db 100%) !important;
        background: -o-linear-gradient(#0089db, #0073b7) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0089db', endColorstr='#0073b7', GradientType=0) !important;
        color: #fff;
    }
    .bg-aqua-gradient {
        background: #00c0ef !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #00c0ef), color-stop(1, #14d1ff)) !important;
        background: -ms-linear-gradient(bottom, #00c0ef, #14d1ff) !important;
        background: -moz-linear-gradient(center bottom, #00c0ef 0%, #14d1ff 100%) !important;
        background: -o-linear-gradient(#14d1ff, #00c0ef) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#14d1ff', endColorstr='#00c0ef', GradientType=0) !important;
        color: #fff;
    }
    .bg-yellow-gradient {
        background: #f39c12 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #f39c12), color-stop(1, #f7bc60)) !important;
        background: -ms-linear-gradient(bottom, #f39c12, #f7bc60) !important;
        background: -moz-linear-gradient(center bottom, #f39c12 0%, #f7bc60 100%) !important;
        background: -o-linear-gradient(#f7bc60, #f39c12) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7bc60', endColorstr='#f39c12', GradientType=0) !important;
        color: #fff;
    }
    .bg-purple-gradient {
        background: #605ca8 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #605ca8), color-stop(1, #9491c4)) !important;
        background: -ms-linear-gradient(bottom, #605ca8, #9491c4) !important;
        background: -moz-linear-gradient(center bottom, #605ca8 0%, #9491c4 100%) !important;
        background: -o-linear-gradient(#9491c4, #605ca8) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9491c4', endColorstr='#605ca8', GradientType=0) !important;
        color: #fff;
    }
    .bg-green-gradient {
        background: #00a65a !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #00a65a), color-stop(1, #00ca6d)) !important;
        background: -ms-linear-gradient(bottom, #00a65a, #00ca6d) !important;
        background: -moz-linear-gradient(center bottom, #00a65a 0%, #00ca6d 100%) !important;
        background: -o-linear-gradient(#00ca6d, #00a65a) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ca6d', endColorstr='#00a65a', GradientType=0) !important;
        color: #fff;
    }
    .bg-red-gradient {
        background: #dd4b39 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #dd4b39), color-stop(1, #e47365)) !important;
        background: -ms-linear-gradient(bottom, #dd4b39, #e47365) !important;
        background: -moz-linear-gradient(center bottom, #dd4b39 0%, #e47365 100%) !important;
        background: -o-linear-gradient(#e47365, #dd4b39) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e47365', endColorstr='#dd4b39', GradientType=0) !important;
        color: #fff;
    }
    .bg-black-gradient {
        background: #111111 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #111111), color-stop(1, #2b2b2b)) !important;
        background: -ms-linear-gradient(bottom, #111111, #2b2b2b) !important;
        background: -moz-linear-gradient(center bottom, #111111 0%, #2b2b2b 100%) !important;
        background: -o-linear-gradient(#2b2b2b, #111111) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2b2b2b', endColorstr='#111111', GradientType=0) !important;
        color: #fff;
    }
    .bg-maroon-gradient {
        background: #d81b60 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #d81b60), color-stop(1, #e73f7c)) !important;
        background: -ms-linear-gradient(bottom, #d81b60, #e73f7c) !important;
        background: -moz-linear-gradient(center bottom, #d81b60 0%, #e73f7c 100%) !important;
        background: -o-linear-gradient(#e73f7c, #d81b60) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e73f7c', endColorstr='#d81b60', GradientType=0) !important;
        color: #fff;
    }
    .description-block .description-icon {
        font-size: 16px;
    }
    .no-pad-top {
        padding-top: 0;
    }
    .position-static {
        position: static !important;
    }
    .list-header {
        font-size: 15px;
        padding: 10px 4px;
        font-weight: bold;
        color: #666;
    }
    .list-seperator {
        height: 1px;
        background: #f4f4f4;
        margin: 15px 0 9px 0;
    }
    .list-link > a {
        padding: 4px;
        color: #777;
    }
    .list-link > a:hover {
        color: #222;
    }
    .font-light {
        font-weight: 300;
    }
    .user-block:before,
    .user-block:after {
        content: " ";
        display: table;
    }
    .user-block:after {
        clear: both;
    }
    .user-block img {
        width: 40px;
        height: 40px;
        float: left;
    }
    .user-block .username,
    .user-block .description,
    .user-block .comment {
        display: block;
        margin-left: 50px;
    }
    .user-block .username {
        font-size: 16px;
        font-weight: 600;
    }
    .user-block .description {
        color: #999;
        font-size: 13px;
    }
    .user-block.user-block-sm .username,
    .user-block.user-block-sm .description,
    .user-block.user-block-sm .comment {
        margin-left: 40px;
    }
    .user-block.user-block-sm .username {
        font-size: 14px;
    }
    .img-sm,
    .img-md,
    .img-lg,
    .box-comments .box-comment img,
    .user-block.user-block-sm img {
        float: left;
    }
    .img-sm,
    .box-comments .box-comment img,
    .user-block.user-block-sm img {
        width: 30px !important;
        height: 30px !important;
    }
    .img-sm + .img-push {
        margin-left: 40px;
    }
    .img-md {
        width: 60px;
        height: 60px;
    }
    .img-md + .img-push {
        margin-left: 70px;
    }
    .img-lg {
        width: 100px;
        height: 100px;
    }
    .img-lg + .img-push {
        margin-left: 110px;
    }
    .img-bordered {
        border: 3px solid #d2d6de;
        padding: 3px;
    }
    .img-bordered-sm {
        border: 2px solid #d2d6de;
        padding: 2px;
    }
    .attachment-block {
        border: 1px solid #f4f4f4;
        padding: 5px;
        margin-bottom: 10px;
        background: #f7f7f7;
    }
    .attachment-block .attachment-img {
        max-width: 100px;
        max-height: 100px;
        height: auto;
        float: left;
    }
    .attachment-block .attachment-pushed {
        margin-left: 110px;
    }
    .attachment-block .attachment-heading {
        margin: 0;
    }
    .attachment-block .attachment-text {
        color: #555;
    }
    .connectedSortable {
        min-height: 100px;
    }
    .ui-helper-hidden-accessible {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .sort-highlight {
        background: #f4f4f4;
        border: 1px dashed #ddd;
        margin-bottom: 10px;
    }
    .full-opacity-hover {
        opacity: 0.65;
        filter: alpha(opacity=65);
    }
    .full-opacity-hover:hover {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    .chart {
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    .chart svg,
    .chart canvas {
        width: 100% !important;
    }
    /*
 * Misc: print
 * -----------
 */
    @media print {
        .no-print,
        .main-sidebar,
        .left-side,
        .main-header,
        .content-header {
            display: none !important;
        }
        .content-wrapper,
        .right-side,
        .main-footer {
            margin-left: 0 !important;
            min-height: 0 !important;
            -webkit-transform: translate(0, 0) !important;
            -ms-transform: translate(0, 0) !important;
            -o-transform: translate(0, 0) !important;
            transform: translate(0, 0) !important;
        }
        .fixed .content-wrapper,
        .fixed .right-side {
            padding-top: 0 !important;
        }
        .invoice {
            width: 100%;
            border: 0;
            margin: 0;
            padding: 0;
        }
        .invoice-col {
            float: left;
            width: 33.3333333%;
        }
        .table-responsive {
            overflow: auto;
        }
        .table-responsive > .table tr th,
        .table-responsive > .table tr td {
            white-space: normal !important;
        }
    }

    .morris-hover {position: absolute;z-index: 1090;}
    .morris-hover.morris-default-style {border-radius: 10px;padding: 6px;color: #f9f9f9;background: rgba(0, 0, 0, 0.8);border: solid 2px rgba(0, 0, 0, 0.9);font-weight: 600;font-size: 14px;text-align: center;}
    .morris-hover.morris-default-style .morris-hover-row-label {font-weight: bold;margin: 0.25em 0;}
    .morris-hover.morris-default-style .morris-hover-point {white-space: nowrap;margin: 0.1em 0;}

    .jvectormap-label {
        position: absolute;
        display: none;
        border: solid 1px #CDCDCD;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background: #292929;
        color: white;
        font-size: 10px !important;
        padding: 3px;
        z-index: 9999;
    }

    .jvectormap-zoomin, .jvectormap-zoomout {
        position: absolute;
        top: 100%;
        margin-top: -25px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        background: #d2d6de;/ / rgba(0, 0, 0, 0.4);
        padding: 5px;
        color: #444;
        cursor: pointer;
        line-height: 10px;
        text-align: center;
        font-weight: bold;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .jvectormap-zoomin {
        left: 100%;
        margin-left: -50px;
    }

    .jvectormap-zoomout {
        left: 100%;
        margin-left: -30px;
    }
    div.dataTables_length label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
    }

    div.dataTables_length select {
        width: 75px;
        display: inline-block;
    }

    div.dataTables_filter {
        text-align: right;
    }

    div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;
    }

    div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
    }

    div.dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
    }

    div.dataTables_paginate {
        margin: 0;
        white-space: nowrap;
        text-align: right;
    }

    div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
    }

    @media screen and (max-width: 767px) {
        div.dataTables_wrapper > div.row > div,
        div.dataTables_length,
        div.dataTables_filter,
        div.dataTables_info,
        div.dataTables_paginate {
            text-align: center;
        }

        div.DTTT {
            margin-bottom: 0.5em;
        }
    }

    table.dataTable td,
    table.dataTable th {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }

    table.dataTable {
        clear: both;
        margin-top: 6px !important;
        margin-bottom: 6px !important;
        max-width: none !important;
    }

    table.dataTable thead .sorting,
    table.dataTable thead .sorting_asc,
    table.dataTable thead .sorting_desc,
    table.dataTable thead .sorting_asc_disabled,
    table.dataTable thead .sorting_desc_disabled {
        cursor: pointer;
        position: relative;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after {
        position: absolute;
        top: 8px;
        right: 8px;
        display: block;
        font-family: 'Glyphicons Halflings';
        opacity: 0.5;
    }
    table.dataTable thead .sorting:after {
        opacity: 0.2;
        content: "\e150"; /* sort */
    }
    table.dataTable thead .sorting_asc:after {
        content: "\e155"; /* sort-by-attributes */
    }
    table.dataTable thead .sorting_desc:after {
        content: "\e156"; /* sort-by-attributes-alt */
    }
    div.dataTables_scrollBody table.dataTable thead .sorting:after,
    div.dataTables_scrollBody table.dataTable thead .sorting_asc:after,
    div.dataTables_scrollBody table.dataTable thead .sorting_desc:after {
        display: none;
    }

    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
        color: #eee;
    }

    table.dataTable thead > tr > th {
        padding-right: 30px;
    }

    table.dataTable th:active {
        outline: none;
    }

    /* Condensed */
    table.dataTable.table-condensed thead > tr > th {
        padding-right: 20px;
    }

    table.dataTable.table-condensed thead .sorting:after,
    table.dataTable.table-condensed thead .sorting_asc:after,
    table.dataTable.table-condensed thead .sorting_desc:after {
        top: 6px;
        right: 6px;
    }

    /* Scrolling */
    div.dataTables_scrollHead table {
        margin-bottom: 0 !important;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    div.dataTables_scrollHead table thead tr:last-child th:first-child,
    div.dataTables_scrollHead table thead tr:last-child td:first-child {
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    div.dataTables_scrollBody table {
        border-top: none;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    div.dataTables_scrollBody tbody tr:first-child th,
    div.dataTables_scrollBody tbody tr:first-child td {
        border-top: none;
    }

    div.dataTables_scrollFoot table {
        margin-top: 0 !important;
        border-top: none;
    }

    /* Frustratingly the border-collapse:collapse used by Bootstrap makes the column
   width calculations when using scrolling impossible to align columns. We have
   to use separate
 */
    table.table-bordered.dataTable {
        border-collapse: separate !important;
    }
    table.table-bordered thead th,
    table.table-bordered thead td {
        border-left-width: 0;
        border-top-width: 0;
    }
    table.table-bordered tbody th,
    table.table-bordered tbody td {
        border-left-width: 0;
        border-bottom-width: 0;
    }
    table.table-bordered tfoot th,
    table.table-bordered tfoot td {
        border-left-width: 0;
        border-bottom-width: 0;
    }
    table.table-bordered th:last-child,
    table.table-bordered td:last-child {
        border-right-width: 0;
    }
    div.dataTables_scrollHead table.table-bordered {
        border-bottom-width: 0;
    }

    /*
 * TableTools styles
 */
    .table.dataTable tbody tr.active td,
    .table.dataTable tbody tr.active th {
        background-color: #08C;
        color: white;
    }

    .table.dataTable tbody tr.active:hover td,
    .table.dataTable tbody tr.active:hover th {
        background-color: #0075b0 !important;
    }

    .table.dataTable tbody tr.active th > a,
    .table.dataTable tbody tr.active td > a {
        color: white;
    }

    .table-striped.dataTable tbody tr.active:nth-child(odd) td,
    .table-striped.dataTable tbody tr.active:nth-child(odd) th {
        background-color: #017ebc;
    }

    table.DTTT_selectable tbody tr {
        cursor: pointer;
    }

    div.DTTT .btn:hover {
        text-decoration: none !important;
    }

    ul.DTTT_dropdown.dropdown-menu {
        z-index: 2003;
    }

    ul.DTTT_dropdown.dropdown-menu a {
        color: #333 !important; /* needed only when demo_page.css is included */
    }

    ul.DTTT_dropdown.dropdown-menu li {
        position: relative;
    }

    ul.DTTT_dropdown.dropdown-menu li:hover a {
        background-color: #0088cc;
        color: white !important;
    }

    div.DTTT_collection_background {
        z-index: 2002;
    }

    /* TableTools information display */
    div.DTTT_print_info {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 400px;
        height: 150px;
        margin-left: -200px;
        margin-top: -75px;
        text-align: center;
        color: #333;
        padding: 10px 30px;
        opacity: 0.95;

        background-color: white;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;

        -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.5);
        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.5);
    }

    div.DTTT_print_info h6 {
        font-weight: normal;
        font-size: 28px;
        line-height: 28px;
        margin: 1em;
    }

    div.DTTT_print_info p {
        font-size: 14px;
        line-height: 20px;
    }

    div.dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 60px;
        margin-left: -50%;
        margin-top: -25px;
        padding-top: 20px;
        padding-bottom: 20px;
        text-align: center;
        font-size: 1.2em;
        background-color: white;
        background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
    }

    /*
 * FixedColumns styles
 */
    div.DTFC_LeftHeadWrapper table,
    div.DTFC_LeftFootWrapper table,
    div.DTFC_RightHeadWrapper table,
    div.DTFC_RightFootWrapper table,
    table.DTFC_Cloned tr.even {
        background-color: white;
        margin-bottom: 0;
    }

    div.DTFC_RightHeadWrapper table,
    div.DTFC_LeftHeadWrapper table {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        border-top-right-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    div.DTFC_RightHeadWrapper table thead tr:last-child th:first-child,
    div.DTFC_RightHeadWrapper table thead tr:last-child td:first-child,
    div.DTFC_LeftHeadWrapper table thead tr:last-child th:first-child,
    div.DTFC_LeftHeadWrapper table thead tr:last-child td:first-child {
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    div.DTFC_RightBodyWrapper table,
    div.DTFC_LeftBodyWrapper table {
        border-top: none;
        margin: 0 !important;
    }

    div.DTFC_RightBodyWrapper tbody tr:first-child th,
    div.DTFC_RightBodyWrapper tbody tr:first-child td,
    div.DTFC_LeftBodyWrapper tbody tr:first-child th,
    div.DTFC_LeftBodyWrapper tbody tr:first-child td {
        border-top: none;
    }

    div.DTFC_RightFootWrapper table,
    div.DTFC_LeftFootWrapper table {
        border-top: none;
        margin-top: 0 !important;
    }

    div.DTFC_LeftBodyWrapper table.dataTable thead .sorting:after,
    div.DTFC_LeftBodyWrapper table.dataTable thead .sorting_asc:after,
    div.DTFC_LeftBodyWrapper table.dataTable thead .sorting_desc:after,
    div.DTFC_RightBodyWrapper table.dataTable thead .sorting:after,
    div.DTFC_RightBodyWrapper table.dataTable thead .sorting_asc:after,
    div.DTFC_RightBodyWrapper table.dataTable thead .sorting_desc:after {
        display: none;
    }

    /*
 * FixedHeader styles
 */
    div.FixedHeader_Cloned table {
        margin: 0 !important
    }

    /* Z-INDEX */
    .formError { z-index: 990; }
    .formError .formErrorContent { z-index: 991; }
    .formError .formErrorArrow { z-index: 996; }

    .ui-dialog .formError { z-index: 5000; }
    .ui-dialog .formError .formErrorContent { z-index: 5001; }
    .ui-dialog .formError .formErrorArrow { z-index: 5006; }

    .inputContainer {
        position: relative;
        float: left;
    }

    .formError {
        position: absolute;
        top: 300px;
        left: 300px;
        display: block;
        cursor: pointer;
        text-align: left;
    }

    .formError.inline {
        position: relative;
        top: 0;
        left: 0;
        display: inline-block;
    }

    .ajaxSubmit {
        padding: 20px;
        background: #55ea55;
        border: 1px solid #999;
        display: none;
    }

    .formError .formErrorContent {
        width: 100%;
        background: #ee0101;
        position: relative;
        color: #fff;
        min-width: 120px;
        font-size: 11px;
        border: 2px solid #ddd;
        box-shadow: 0 0 6px #000;
        -moz-box-shadow: 0 0 6px #000;
        -webkit-box-shadow: 0 0 6px #000;
        -o-box-shadow: 0 0 6px #000;
        padding: 4px 10px 4px 10px;
        border-radius: 6px;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        -o-border-radius: 6px;
    }

    .formError.inline .formErrorContent {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -o-box-shadow: none;
        border: none;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        -o-border-radius: 0;
    }

    .greenPopup .formErrorContent {
        background: #33be40;
    }

    .blackPopup .formErrorContent {
        background: #393939;
        color: #FFF;
    }

    .formError .formErrorArrow {
        width: 15px;
        margin: -2px 0 0 13px;
        position: relative;
    }
    body[dir='rtl'] .formError .formErrorArrow,
    body.rtl .formError .formErrorArrow {
        margin: -2px 13px 0 0;
    }

    .formError .formErrorArrowBottom {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -o-box-shadow: none;
        margin: 0px 0 0 12px;
        top: 2px;
    }

    .formError .formErrorArrow div {
        border-left: 2px solid #ddd;
        border-right: 2px solid #ddd;
        box-shadow: 0 2px 3px #444;
        -moz-box-shadow: 0 2px 3px #444;
        -webkit-box-shadow: 0 2px 3px #444;
        -o-box-shadow: 0 2px 3px #444;
        font-size: 0px;
        height: 1px;
        background: #ee0101;
        margin: 0 auto;
        line-height: 0;
        font-size: 0;
        display: block;
    }

    .formError .formErrorArrowBottom div {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -o-box-shadow: none;
    }

    .greenPopup .formErrorArrow div {
        background: #33be40;
    }

    .blackPopup .formErrorArrow div {
        background: #393939;
        color: #FFF;
    }

    .formError .formErrorArrow .line10 {
        width: 13px;
        border: none;
    }

    .formError .formErrorArrow .line9 {
        width: 11px;
        border: none;
    }

    .formError .formErrorArrow .line8 {
        width: 11px;
    }

    .formError .formErrorArrow .line7 {
        width: 9px;
    }

    .formError .formErrorArrow .line6 {
        width: 7px;
    }

    .formError .formErrorArrow .line5 {
        width: 5px;
    }

    .formError .formErrorArrow .line4 {
        width: 3px;
    }

    .formError .formErrorArrow .line3 {
        width: 1px;
        border-left: 2px solid #ddd;
        border-right: 2px solid #ddd;
        border-bottom: 0 solid #ddd;
    }

    .formError .formErrorArrow .line2 {
        width: 3px;
        border: none;
        background: #ddd;
    }

    .formError .formErrorArrow .line1 {
        width: 1px;
        border: none;
        background: #ddd;
    }

    .ajax-file-upload-statusbar {
        border: 1px solid #0ba1b5;
        width: 420px;
        margin: 5px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        padding: 5px 5px 5px 15px
    }

    .ajax-file-upload-filename {
        width: 300px;
        height: auto;
        margin: 0 5px 5px 0;

    }

    .ajax-file-upload-filesize {
        width: 50px;
        height: auto;
        margin: 0 5px 5px 0;
        display: inline-block;
        vertical-align: middle;
    }

    .ajax-file-upload-progress {
        margin: 5px 10px 5px 0;
        position: relative;
        width: 250px;
        border: 1px solid #ddd;
        padding: 1px;
        border-radius: 3px;
        display: inline-block;
        color: #FFFFFF;

    }

    .ajax-file-upload-bar {
        background-color: #0ba1b5;
        width: 0;
        height: 20px;
        border-radius: 3px;
        color: #FFFFFF;

    }

    .ajax-file-upload-percent {
        position: absolute;
        display: inline-block;
        top: 3px;
        left: 48%
    }

    .ajax-file-upload-red {
        -moz-box-shadow: inset 0 39px 0 -24px #e67a73;
        -webkit-box-shadow: inset 0 39px 0 -24px #e67a73;
        box-shadow: inset 0 39px 0 -24px #e67a73;
        background-color: #e4685d;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        display: inline-block;
        color: #fff;
        font-family: arial, serif;
        font-size: 13px;
        font-weight: normal;
        padding: 4px 15px;
        text-decoration: none;
        text-shadow: 0 1px 0 #b23e35;
        cursor: pointer;
        vertical-align: top;
        margin: 5px 10px 5px 0;
    }

    .ajax-file-upload-green {
        background-color: #77b55a;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        padding: 0;
        display: inline-block;
        color: #fff;
        font-family: arial, serif;
        font-size: 13px;
        font-weight: normal;
        text-decoration: none;
        cursor: pointer;
        text-shadow: 0 1px 0 #5b8a3c;
        vertical-align: top;
        margin: 5px 10px 5px 0;
    }

    .ajax-file-upload {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        line-height: 20px;
        height: 25px;
        margin: 0 10px 10px 0;
        display: inline-block;
        text-decoration: none;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        padding: 6px 10px 4px 10px;
        color: #fff;
        background: #2f8ab9;
        border: none;
        -moz-box-shadow: 0 2px 0 0 #13648d;
        -webkit-box-shadow: 0 2px 0 0 #13648d;
        box-shadow: 0 2px 0 0 #13648d;
        vertical-align: middle;
    }

    .ajax-file-upload:hover {
        background: #3396c9;
        -moz-box-shadow: 0 2px 0 0 #15719f;
        -webkit-box-shadow: 0 2px 0 0 #15719f;
        box-shadow: 0 2px 0 0 #15719f;
    }

    .ajax-upload-dragdrop {

        border: 2px dotted #A5A5C7;
        width: 420px;
        color: #DADCE3;
        text-align: left;
        vertical-align: middle;
        padding: 10px 10px 10px 10px;
    }

    .state-hover {
        border: 2px solid #A5A5C7;
    }

    .ajax-file-upload-container {
        margin: 20px 0 20px 0;
    }
    .ajax-file-upload-statusbar {
        border: 1px solid #0ba1b5;
        width: 420px;
        margin: 5px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        padding: 5px 5px 5px 15px
    }

    .ajax-file-upload-filename {
        width: 300px;
        height: auto;
        margin: 0 5px 5px 0;

    }

    .ajax-file-upload-filesize {
        width: 50px;
        height: auto;
        margin: 0 5px 5px 0;
        display: inline-block;
        vertical-align: middle;
    }

    .ajax-file-upload-progress {
        margin: 5px 10px 5px 0;
        position: relative;
        width: 250px;
        border: 1px solid #ddd;
        padding: 1px;
        border-radius: 3px;
        display: inline-block;
        color: #FFFFFF;

    }

    .ajax-file-upload-bar {
        background-color: #0ba1b5;
        width: 0;
        height: 20px;
        border-radius: 3px;
        color: #FFFFFF;

    }

    .ajax-file-upload-percent {
        position: absolute;
        display: inline-block;
        top: 3px;
        left: 48%
    }

    .ajax-file-upload-red {
        -moz-box-shadow: inset 0 39px 0 -24px #e67a73;
        -webkit-box-shadow: inset 0 39px 0 -24px #e67a73;
        box-shadow: inset 0 39px 0 -24px #e67a73;
        background-color: #e4685d;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        display: inline-block;
        color: #fff;
        font-family: arial, serif;
        font-size: 13px;
        font-weight: normal;
        padding: 4px 15px;
        text-decoration: none;
        text-shadow: 0 1px 0 #b23e35;
        cursor: pointer;
        vertical-align: top;
        margin: 5px 10px 5px 0;
    }

    .ajax-file-upload-green {
        background-color: #77b55a;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        padding: 0;
        display: inline-block;
        color: #fff;
        font-family: arial, serif;
        font-size: 13px;
        font-weight: normal;
        text-decoration: none;
        cursor: pointer;
        text-shadow: 0 1px 0 #5b8a3c;
        vertical-align: top;
        margin: 5px 10px 5px 0;
    }

    .ajax-file-upload {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        line-height: 20px;
        height: 25px;
        margin: 0 10px 10px 0;
        display: inline-block;
        text-decoration: none;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        padding: 6px 10px 4px 10px;
        color: #fff;
        background: #2f8ab9;
        border: none;
        -moz-box-shadow: 0 2px 0 0 #13648d;
        -webkit-box-shadow: 0 2px 0 0 #13648d;
        box-shadow: 0 2px 0 0 #13648d;
        vertical-align: middle;
    }

    .ajax-file-upload:hover {
        background: #3396c9;
        -moz-box-shadow: 0 2px 0 0 #15719f;
        -webkit-box-shadow: 0 2px 0 0 #15719f;
        box-shadow: 0 2px 0 0 #15719f;
    }

    .ajax-upload-dragdrop {

        border: 2px dotted #A5A5C7;
        width: 420px;
        color: #DADCE3;
        text-align: left;
        vertical-align: middle;
        padding: 10px 10px 10px 10px;
    }

    .state-hover {
        border: 2px solid #A5A5C7;
    }

    .ajax-file-upload-container {
        margin: 20px 0 20px 0;
    }
    /* iCheck plugin skins
----------------------------------- */
    @import url("minimal/_all.css");
    /*
@import url("minimal/minimal.css");
@import url("minimal/red.css");
@import url("minimal/green.css");
@import url("minimal/blue.css");
@import url("minimal/aero.css");
@import url("minimal/grey.css");
@import url("minimal/orange.css");
@import url("minimal/yellow.css");
@import url("minimal/pink.css");
@import url("minimal/purple.css");
*/

    @import url("square/_all.css");
    /*
@import url("square/square.css");
@import url("square/red.css");
@import url("square/green.css");
@import url("square/blue.css");
@import url("square/aero.css");
@import url("square/grey.css");
@import url("square/orange.css");
@import url("square/yellow.css");
@import url("square/pink.css");
@import url("square/purple.css");
*/

    @import url("flat/_all.css");
    /*
@import url("flat/flat.css");
@import url("flat/red.css");
@import url("flat/green.css");
@import url("flat/blue.css");
@import url("flat/aero.css");
@import url("flat/grey.css");
@import url("flat/orange.css");
@import url("flat/yellow.css");
@import url("flat/pink.css");
@import url("flat/purple.css");
*/

    @import url("line/_all.css");
    /*
@import url("line/line.css");
@import url("line/red.css");
@import url("line/green.css");
@import url("line/blue.css");
@import url("line/aero.css");
@import url("line/grey.css");
@import url("line/orange.css");
@import url("line/yellow.css");
@import url("line/pink.css");
@import url("line/purple.css");
*/

    @import url("polaris/polaris.css");

    @import url("futurico/futurico.css");
    /* iCheck plugin Square skin, blue
----------------------------------- */
    .icheckbox_square-blue,
    .iradio_square-blue {
        display: inline-block;
        *display: inline;
        vertical-align: middle;
        margin: 0;
        padding: 0;
        width: 22px;
        height: 22px;
        background: url(blue.png) no-repeat;
        border: none;
        cursor: pointer;
    }

    .icheckbox_square-blue {
        background-position: 0 0;
    }
    .icheckbox_square-blue.hover {
        background-position: -24px 0;
    }
    .icheckbox_square-blue.checked {
        background-position: -48px 0;
    }
    .icheckbox_square-blue.disabled {
        background-position: -72px 0;
        cursor: default;
    }
    .icheckbox_square-blue.checked.disabled {
        background-position: -96px 0;
    }

    .iradio_square-blue {
        background-position: -120px 0;
    }
    .iradio_square-blue.hover {
        background-position: -144px 0;
    }
    .iradio_square-blue.checked {
        background-position: -168px 0;
    }
    .iradio_square-blue.disabled {
        background-position: -192px 0;
        cursor: default;
    }
    .iradio_square-blue.checked.disabled {
        background-position: -216px 0;
    }

    /* Retina support */
    @media only screen and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-moz-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5) {
        .icheckbox_square-blue,
        .iradio_square-blue {
            background-image: url(blue@2x.png);
            -webkit-background-size: 240px 24px;
            background-size: 240px 24px;
        }
    }
    /*!
 * Datepicker for Bootstrap
 *
 * Copyright 2012 Stefan Petre
 * Improvements by Andrew Rowls
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 */
    .datepicker {
        padding: 4px;
        border-radius: 4px;
        direction: ltr;
        /*.dow {
		border-top: 1px solid #ddd !important;
	}*/
    }
    .datepicker-inline {
        width: 100%;
    }
    .datepicker.datepicker-rtl {
        direction: rtl;
    }
    .datepicker.datepicker-rtl table tr td span {
        float: right;
    }
    .datepicker-dropdown {
        top: 0;
        left: 0;
    }
    .datepicker-dropdown:before {
        content: '';
        display: inline-block;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #ccc;
        border-top: 0;
        border-bottom-color: rgba(0, 0, 0, 0.2);
        position: absolute;
    }
    .datepicker-dropdown:after {
        content: '';
        display: inline-block;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #fff;
        border-top: 0;
        position: absolute;
    }
    .datepicker-dropdown.datepicker-orient-left:before {
        left: 6px;
    }
    .datepicker-dropdown.datepicker-orient-left:after {
        left: 7px;
    }
    .datepicker-dropdown.datepicker-orient-right:before {
        right: 6px;
    }
    .datepicker-dropdown.datepicker-orient-right:after {
        right: 7px;
    }
    .datepicker-dropdown.datepicker-orient-top:before {
        top: -7px;
    }
    .datepicker-dropdown.datepicker-orient-top:after {
        top: -6px;
    }
    .datepicker-dropdown.datepicker-orient-bottom:before {
        bottom: -7px;
        border-bottom: 0;
        border-top: 7px solid #999;
    }
    .datepicker-dropdown.datepicker-orient-bottom:after {
        bottom: -6px;
        border-bottom: 0;
        border-top: 6px solid #fff;
    }
    .datepicker > div {
        display: none;
    }
    .datepicker.days div.datepicker-days {
        display: block;
    }
    .datepicker.months div.datepicker-months {
        display: block;
    }
    .datepicker.years div.datepicker-years {
        display: block;
    }
    .datepicker table {
        margin: 0;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .datepicker table tr td,
    .datepicker table tr th {
        text-align: center;
        width: 30px;
        height: 30px;
        border-radius: 4px;
        border: none;
    }
    .table-striped .datepicker table tr td,
    .table-striped .datepicker table tr th {
        background-color: transparent;
    }
    .datepicker table tr td.day:hover,
    .datepicker table tr td.day.focused {
        background: rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }
    .datepicker table tr td.old,
    .datepicker table tr td.new {
        color: #777;
    }
    .datepicker table tr td.disabled,
    .datepicker table tr td.disabled:hover {
        background: none;
        color: #444;
        cursor: default;
    }
    .datepicker table tr td.today,
    .datepicker table tr td.today:hover,
    .datepicker table tr td.today.disabled,
    .datepicker table tr td.today.disabled:hover {
        color: #000000;
        background: rgba(0, 0, 0, 0.2);
        border-color: #ffb733;
    }
    .datepicker table tr td.today:hover,
    .datepicker table tr td.today:hover:hover,
    .datepicker table tr td.today.disabled:hover,
    .datepicker table tr td.today.disabled:hover:hover,
    .datepicker table tr td.today:focus,
    .datepicker table tr td.today:hover:focus,
    .datepicker table tr td.today.disabled:focus,
    .datepicker table tr td.today.disabled:hover:focus,
    .datepicker table tr td.today:active,
    .datepicker table tr td.today:hover:active,
    .datepicker table tr td.today.disabled:active,
    .datepicker table tr td.today.disabled:hover:active,
    .datepicker table tr td.today.active,
    .datepicker table tr td.today:hover.active,
    .datepicker table tr td.today.disabled.active,
    .datepicker table tr td.today.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.today,
    .open .dropdown-toggle.datepicker table tr td.today:hover,
    .open .dropdown-toggle.datepicker table tr td.today.disabled,
    .open .dropdown-toggle.datepicker table tr td.today.disabled:hover {
        color: #000000;
        background: rgba(0, 0, 0, 0.2);
        border-color: #f59e00;
    }
    .datepicker table tr td.today:active,
    .datepicker table tr td.today:hover:active,
    .datepicker table tr td.today.disabled:active,
    .datepicker table tr td.today.disabled:hover:active,
    .datepicker table tr td.today.active,
    .datepicker table tr td.today:hover.active,
    .datepicker table tr td.today.disabled.active,
    .datepicker table tr td.today.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.today,
    .open .dropdown-toggle.datepicker table tr td.today:hover,
    .open .dropdown-toggle.datepicker table tr td.today.disabled,
    .open .dropdown-toggle.datepicker table tr td.today.disabled:hover {
        background-image: none;
    }
    .datepicker table tr td.today.disabled,
    .datepicker table tr td.today:hover.disabled,
    .datepicker table tr td.today.disabled.disabled,
    .datepicker table tr td.today.disabled:hover.disabled,
    .datepicker table tr td.today[disabled],
    .datepicker table tr td.today:hover[disabled],
    .datepicker table tr td.today.disabled[disabled],
    .datepicker table tr td.today.disabled:hover[disabled],
    fieldset[disabled] .datepicker table tr td.today,
    fieldset[disabled] .datepicker table tr td.today:hover,
    fieldset[disabled] .datepicker table tr td.today.disabled,
    fieldset[disabled] .datepicker table tr td.today.disabled:hover,
    .datepicker table tr td.today.disabled:hover,
    .datepicker table tr td.today:hover.disabled:hover,
    .datepicker table tr td.today.disabled.disabled:hover,
    .datepicker table tr td.today.disabled:hover.disabled:hover,
    .datepicker table tr td.today[disabled]:hover,
    .datepicker table tr td.today:hover[disabled]:hover,
    .datepicker table tr td.today.disabled[disabled]:hover,
    .datepicker table tr td.today.disabled:hover[disabled]:hover,
    fieldset[disabled] .datepicker table tr td.today:hover,
    fieldset[disabled] .datepicker table tr td.today:hover:hover,
    fieldset[disabled] .datepicker table tr td.today.disabled:hover,
    fieldset[disabled] .datepicker table tr td.today.disabled:hover:hover,
    .datepicker table tr td.today.disabled:focus,
    .datepicker table tr td.today:hover.disabled:focus,
    .datepicker table tr td.today.disabled.disabled:focus,
    .datepicker table tr td.today.disabled:hover.disabled:focus,
    .datepicker table tr td.today[disabled]:focus,
    .datepicker table tr td.today:hover[disabled]:focus,
    .datepicker table tr td.today.disabled[disabled]:focus,
    .datepicker table tr td.today.disabled:hover[disabled]:focus,
    fieldset[disabled] .datepicker table tr td.today:focus,
    fieldset[disabled] .datepicker table tr td.today:hover:focus,
    fieldset[disabled] .datepicker table tr td.today.disabled:focus,
    fieldset[disabled] .datepicker table tr td.today.disabled:hover:focus,
    .datepicker table tr td.today.disabled:active,
    .datepicker table tr td.today:hover.disabled:active,
    .datepicker table tr td.today.disabled.disabled:active,
    .datepicker table tr td.today.disabled:hover.disabled:active,
    .datepicker table tr td.today[disabled]:active,
    .datepicker table tr td.today:hover[disabled]:active,
    .datepicker table tr td.today.disabled[disabled]:active,
    .datepicker table tr td.today.disabled:hover[disabled]:active,
    fieldset[disabled] .datepicker table tr td.today:active,
    fieldset[disabled] .datepicker table tr td.today:hover:active,
    fieldset[disabled] .datepicker table tr td.today.disabled:active,
    fieldset[disabled] .datepicker table tr td.today.disabled:hover:active,
    .datepicker table tr td.today.disabled.active,
    .datepicker table tr td.today:hover.disabled.active,
    .datepicker table tr td.today.disabled.disabled.active,
    .datepicker table tr td.today.disabled:hover.disabled.active,
    .datepicker table tr td.today[disabled].active,
    .datepicker table tr td.today:hover[disabled].active,
    .datepicker table tr td.today.disabled[disabled].active,
    .datepicker table tr td.today.disabled:hover[disabled].active,
    fieldset[disabled] .datepicker table tr td.today.active,
    fieldset[disabled] .datepicker table tr td.today:hover.active,
    fieldset[disabled] .datepicker table tr td.today.disabled.active,
    fieldset[disabled] .datepicker table tr td.today.disabled:hover.active {
        background: rgba(0, 0, 0, 0.2);
        border-color: #ffb733;
    }
    .datepicker table tr td.today:hover:hover {
        color: #000;
    }
    .datepicker table tr td.today.active:hover {
        color: #fff;
    }
    .datepicker table tr td.range,
    .datepicker table tr td.range:hover,
    .datepicker table tr td.range.disabled,
    .datepicker table tr td.range.disabled:hover {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 0;
    }
    .datepicker table tr td.range.today,
    .datepicker table tr td.range.today:hover,
    .datepicker table tr td.range.today.disabled,
    .datepicker table tr td.range.today.disabled:hover {
        color: #000000;
        background: rgba(0, 0, 0, 0.2);
        border-color: #f1a417;
        border-radius: 0;
    }
    .datepicker table tr td.range.today:hover,
    .datepicker table tr td.range.today:hover:hover,
    .datepicker table tr td.range.today.disabled:hover,
    .datepicker table tr td.range.today.disabled:hover:hover,
    .datepicker table tr td.range.today:focus,
    .datepicker table tr td.range.today:hover:focus,
    .datepicker table tr td.range.today.disabled:focus,
    .datepicker table tr td.range.today.disabled:hover:focus,
    .datepicker table tr td.range.today:active,
    .datepicker table tr td.range.today:hover:active,
    .datepicker table tr td.range.today.disabled:active,
    .datepicker table tr td.range.today.disabled:hover:active,
    .datepicker table tr td.range.today.active,
    .datepicker table tr td.range.today:hover.active,
    .datepicker table tr td.range.today.disabled.active,
    .datepicker table tr td.range.today.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.range.today,
    .open .dropdown-toggle.datepicker table tr td.range.today:hover,
    .open .dropdown-toggle.datepicker table tr td.range.today.disabled,
    .open .dropdown-toggle.datepicker table tr td.range.today.disabled:hover {
        color: #000000;
        background: rgba(0, 0, 0, 0.2);
        border-color: #bf800c;
    }
    .datepicker table tr td.range.today:active,
    .datepicker table tr td.range.today:hover:active,
    .datepicker table tr td.range.today.disabled:active,
    .datepicker table tr td.range.today.disabled:hover:active,
    .datepicker table tr td.range.today.active,
    .datepicker table tr td.range.today:hover.active,
    .datepicker table tr td.range.today.disabled.active,
    .datepicker table tr td.range.today.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.range.today,
    .open .dropdown-toggle.datepicker table tr td.range.today:hover,
    .open .dropdown-toggle.datepicker table tr td.range.today.disabled,
    .open .dropdown-toggle.datepicker table tr td.range.today.disabled:hover {
        background-image: none;
    }
    .datepicker table tr td.range.today.disabled,
    .datepicker table tr td.range.today:hover.disabled,
    .datepicker table tr td.range.today.disabled.disabled,
    .datepicker table tr td.range.today.disabled:hover.disabled,
    .datepicker table tr td.range.today[disabled],
    .datepicker table tr td.range.today:hover[disabled],
    .datepicker table tr td.range.today.disabled[disabled],
    .datepicker table tr td.range.today.disabled:hover[disabled],
    fieldset[disabled] .datepicker table tr td.range.today,
    fieldset[disabled] .datepicker table tr td.range.today:hover,
    fieldset[disabled] .datepicker table tr td.range.today.disabled,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:hover,
    .datepicker table tr td.range.today.disabled:hover,
    .datepicker table tr td.range.today:hover.disabled:hover,
    .datepicker table tr td.range.today.disabled.disabled:hover,
    .datepicker table tr td.range.today.disabled:hover.disabled:hover,
    .datepicker table tr td.range.today[disabled]:hover,
    .datepicker table tr td.range.today:hover[disabled]:hover,
    .datepicker table tr td.range.today.disabled[disabled]:hover,
    .datepicker table tr td.range.today.disabled:hover[disabled]:hover,
    fieldset[disabled] .datepicker table tr td.range.today:hover,
    fieldset[disabled] .datepicker table tr td.range.today:hover:hover,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:hover,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:hover:hover,
    .datepicker table tr td.range.today.disabled:focus,
    .datepicker table tr td.range.today:hover.disabled:focus,
    .datepicker table tr td.range.today.disabled.disabled:focus,
    .datepicker table tr td.range.today.disabled:hover.disabled:focus,
    .datepicker table tr td.range.today[disabled]:focus,
    .datepicker table tr td.range.today:hover[disabled]:focus,
    .datepicker table tr td.range.today.disabled[disabled]:focus,
    .datepicker table tr td.range.today.disabled:hover[disabled]:focus,
    fieldset[disabled] .datepicker table tr td.range.today:focus,
    fieldset[disabled] .datepicker table tr td.range.today:hover:focus,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:focus,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:hover:focus,
    .datepicker table tr td.range.today.disabled:active,
    .datepicker table tr td.range.today:hover.disabled:active,
    .datepicker table tr td.range.today.disabled.disabled:active,
    .datepicker table tr td.range.today.disabled:hover.disabled:active,
    .datepicker table tr td.range.today[disabled]:active,
    .datepicker table tr td.range.today:hover[disabled]:active,
    .datepicker table tr td.range.today.disabled[disabled]:active,
    .datepicker table tr td.range.today.disabled:hover[disabled]:active,
    fieldset[disabled] .datepicker table tr td.range.today:active,
    fieldset[disabled] .datepicker table tr td.range.today:hover:active,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:active,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:hover:active,
    .datepicker table tr td.range.today.disabled.active,
    .datepicker table tr td.range.today:hover.disabled.active,
    .datepicker table tr td.range.today.disabled.disabled.active,
    .datepicker table tr td.range.today.disabled:hover.disabled.active,
    .datepicker table tr td.range.today[disabled].active,
    .datepicker table tr td.range.today:hover[disabled].active,
    .datepicker table tr td.range.today.disabled[disabled].active,
    .datepicker table tr td.range.today.disabled:hover[disabled].active,
    fieldset[disabled] .datepicker table tr td.range.today.active,
    fieldset[disabled] .datepicker table tr td.range.today:hover.active,
    fieldset[disabled] .datepicker table tr td.range.today.disabled.active,
    fieldset[disabled] .datepicker table tr td.range.today.disabled:hover.active {
        background: rgba(0, 0, 0, 0.2);
        border-color: #f1a417;
    }
    .datepicker table tr td.selected,
    .datepicker table tr td.selected:hover,
    .datepicker table tr td.selected.disabled,
    .datepicker table tr td.selected.disabled:hover {
        color: #ffffff;
        background: rgba(0, 0, 0, 0.2);
        border-color: #555555;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .datepicker table tr td.selected:hover,
    .datepicker table tr td.selected:hover:hover,
    .datepicker table tr td.selected.disabled:hover,
    .datepicker table tr td.selected.disabled:hover:hover,
    .datepicker table tr td.selected:focus,
    .datepicker table tr td.selected:hover:focus,
    .datepicker table tr td.selected.disabled:focus,
    .datepicker table tr td.selected.disabled:hover:focus,
    .datepicker table tr td.selected:active,
    .datepicker table tr td.selected:hover:active,
    .datepicker table tr td.selected.disabled:active,
    .datepicker table tr td.selected.disabled:hover:active,
    .datepicker table tr td.selected.active,
    .datepicker table tr td.selected:hover.active,
    .datepicker table tr td.selected.disabled.active,
    .datepicker table tr td.selected.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.selected,
    .open .dropdown-toggle.datepicker table tr td.selected:hover,
    .open .dropdown-toggle.datepicker table tr td.selected.disabled,
    .open .dropdown-toggle.datepicker table tr td.selected.disabled:hover {
        color: #ffffff;
        background: rgba(0, 0, 0, 0.2);
        border-color: #373737;
    }
    .datepicker table tr td.selected:active,
    .datepicker table tr td.selected:hover:active,
    .datepicker table tr td.selected.disabled:active,
    .datepicker table tr td.selected.disabled:hover:active,
    .datepicker table tr td.selected.active,
    .datepicker table tr td.selected:hover.active,
    .datepicker table tr td.selected.disabled.active,
    .datepicker table tr td.selected.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.selected,
    .open .dropdown-toggle.datepicker table tr td.selected:hover,
    .open .dropdown-toggle.datepicker table tr td.selected.disabled,
    .open .dropdown-toggle.datepicker table tr td.selected.disabled:hover {
        background-image: none;
    }
    .datepicker table tr td.selected.disabled,
    .datepicker table tr td.selected:hover.disabled,
    .datepicker table tr td.selected.disabled.disabled,
    .datepicker table tr td.selected.disabled:hover.disabled,
    .datepicker table tr td.selected[disabled],
    .datepicker table tr td.selected:hover[disabled],
    .datepicker table tr td.selected.disabled[disabled],
    .datepicker table tr td.selected.disabled:hover[disabled],
    fieldset[disabled] .datepicker table tr td.selected,
    fieldset[disabled] .datepicker table tr td.selected:hover,
    fieldset[disabled] .datepicker table tr td.selected.disabled,
    fieldset[disabled] .datepicker table tr td.selected.disabled:hover,
    .datepicker table tr td.selected.disabled:hover,
    .datepicker table tr td.selected:hover.disabled:hover,
    .datepicker table tr td.selected.disabled.disabled:hover,
    .datepicker table tr td.selected.disabled:hover.disabled:hover,
    .datepicker table tr td.selected[disabled]:hover,
    .datepicker table tr td.selected:hover[disabled]:hover,
    .datepicker table tr td.selected.disabled[disabled]:hover,
    .datepicker table tr td.selected.disabled:hover[disabled]:hover,
    fieldset[disabled] .datepicker table tr td.selected:hover,
    fieldset[disabled] .datepicker table tr td.selected:hover:hover,
    fieldset[disabled] .datepicker table tr td.selected.disabled:hover,
    fieldset[disabled] .datepicker table tr td.selected.disabled:hover:hover,
    .datepicker table tr td.selected.disabled:focus,
    .datepicker table tr td.selected:hover.disabled:focus,
    .datepicker table tr td.selected.disabled.disabled:focus,
    .datepicker table tr td.selected.disabled:hover.disabled:focus,
    .datepicker table tr td.selected[disabled]:focus,
    .datepicker table tr td.selected:hover[disabled]:focus,
    .datepicker table tr td.selected.disabled[disabled]:focus,
    .datepicker table tr td.selected.disabled:hover[disabled]:focus,
    fieldset[disabled] .datepicker table tr td.selected:focus,
    fieldset[disabled] .datepicker table tr td.selected:hover:focus,
    fieldset[disabled] .datepicker table tr td.selected.disabled:focus,
    fieldset[disabled] .datepicker table tr td.selected.disabled:hover:focus,
    .datepicker table tr td.selected.disabled:active,
    .datepicker table tr td.selected:hover.disabled:active,
    .datepicker table tr td.selected.disabled.disabled:active,
    .datepicker table tr td.selected.disabled:hover.disabled:active,
    .datepicker table tr td.selected[disabled]:active,
    .datepicker table tr td.selected:hover[disabled]:active,
    .datepicker table tr td.selected.disabled[disabled]:active,
    .datepicker table tr td.selected.disabled:hover[disabled]:active,
    fieldset[disabled] .datepicker table tr td.selected:active,
    fieldset[disabled] .datepicker table tr td.selected:hover:active,
    fieldset[disabled] .datepicker table tr td.selected.disabled:active,
    fieldset[disabled] .datepicker table tr td.selected.disabled:hover:active,
    .datepicker table tr td.selected.disabled.active,
    .datepicker table tr td.selected:hover.disabled.active,
    .datepicker table tr td.selected.disabled.disabled.active,
    .datepicker table tr td.selected.disabled:hover.disabled.active,
    .datepicker table tr td.selected[disabled].active,
    .datepicker table tr td.selected:hover[disabled].active,
    .datepicker table tr td.selected.disabled[disabled].active,
    .datepicker table tr td.selected.disabled:hover[disabled].active,
    fieldset[disabled] .datepicker table tr td.selected.active,
    fieldset[disabled] .datepicker table tr td.selected:hover.active,
    fieldset[disabled] .datepicker table tr td.selected.disabled.active,
    fieldset[disabled] .datepicker table tr td.selected.disabled:hover.active {
        background: rgba(0, 0, 0, 0.2);
        border-color: #555555;
    }
    .datepicker table tr td.active,
    .datepicker table tr td.active:hover,
    .datepicker table tr td.active.disabled,
    .datepicker table tr td.active.disabled:hover {
        color: #ffffff;
        background: rgba(0, 0, 0, 0.2);
        border-color: #357ebd;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .datepicker table tr td.active:hover,
    .datepicker table tr td.active:hover:hover,
    .datepicker table tr td.active.disabled:hover,
    .datepicker table tr td.active.disabled:hover:hover,
    .datepicker table tr td.active:focus,
    .datepicker table tr td.active:hover:focus,
    .datepicker table tr td.active.disabled:focus,
    .datepicker table tr td.active.disabled:hover:focus,
    .datepicker table tr td.active:active,
    .datepicker table tr td.active:hover:active,
    .datepicker table tr td.active.disabled:active,
    .datepicker table tr td.active.disabled:hover:active,
    .datepicker table tr td.active.active,
    .datepicker table tr td.active:hover.active,
    .datepicker table tr td.active.disabled.active,
    .datepicker table tr td.active.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.active,
    .open .dropdown-toggle.datepicker table tr td.active:hover,
    .open .dropdown-toggle.datepicker table tr td.active.disabled,
    .open .dropdown-toggle.datepicker table tr td.active.disabled:hover {
        color: #ffffff;
        background: rgba(0, 0, 0, 0.5);
        border-color: #285e8e;
    }
    .datepicker table tr td.active:active,
    .datepicker table tr td.active:hover:active,
    .datepicker table tr td.active.disabled:active,
    .datepicker table tr td.active.disabled:hover:active,
    .datepicker table tr td.active.active,
    .datepicker table tr td.active:hover.active,
    .datepicker table tr td.active.disabled.active,
    .datepicker table tr td.active.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td.active,
    .open .dropdown-toggle.datepicker table tr td.active:hover,
    .open .dropdown-toggle.datepicker table tr td.active.disabled,
    .open .dropdown-toggle.datepicker table tr td.active.disabled:hover {
        background-image: none;
    }
    .datepicker table tr td.active.disabled,
    .datepicker table tr td.active:hover.disabled,
    .datepicker table tr td.active.disabled.disabled,
    .datepicker table tr td.active.disabled:hover.disabled,
    .datepicker table tr td.active[disabled],
    .datepicker table tr td.active:hover[disabled],
    .datepicker table tr td.active.disabled[disabled],
    .datepicker table tr td.active.disabled:hover[disabled],
    fieldset[disabled] .datepicker table tr td.active,
    fieldset[disabled] .datepicker table tr td.active:hover,
    fieldset[disabled] .datepicker table tr td.active.disabled,
    fieldset[disabled] .datepicker table tr td.active.disabled:hover,
    .datepicker table tr td.active.disabled:hover,
    .datepicker table tr td.active:hover.disabled:hover,
    .datepicker table tr td.active.disabled.disabled:hover,
    .datepicker table tr td.active.disabled:hover.disabled:hover,
    .datepicker table tr td.active[disabled]:hover,
    .datepicker table tr td.active:hover[disabled]:hover,
    .datepicker table tr td.active.disabled[disabled]:hover,
    .datepicker table tr td.active.disabled:hover[disabled]:hover,
    fieldset[disabled] .datepicker table tr td.active:hover,
    fieldset[disabled] .datepicker table tr td.active:hover:hover,
    fieldset[disabled] .datepicker table tr td.active.disabled:hover,
    fieldset[disabled] .datepicker table tr td.active.disabled:hover:hover,
    .datepicker table tr td.active.disabled:focus,
    .datepicker table tr td.active:hover.disabled:focus,
    .datepicker table tr td.active.disabled.disabled:focus,
    .datepicker table tr td.active.disabled:hover.disabled:focus,
    .datepicker table tr td.active[disabled]:focus,
    .datepicker table tr td.active:hover[disabled]:focus,
    .datepicker table tr td.active.disabled[disabled]:focus,
    .datepicker table tr td.active.disabled:hover[disabled]:focus,
    fieldset[disabled] .datepicker table tr td.active:focus,
    fieldset[disabled] .datepicker table tr td.active:hover:focus,
    fieldset[disabled] .datepicker table tr td.active.disabled:focus,
    fieldset[disabled] .datepicker table tr td.active.disabled:hover:focus,
    .datepicker table tr td.active.disabled:active,
    .datepicker table tr td.active:hover.disabled:active,
    .datepicker table tr td.active.disabled.disabled:active,
    .datepicker table tr td.active.disabled:hover.disabled:active,
    .datepicker table tr td.active[disabled]:active,
    .datepicker table tr td.active:hover[disabled]:active,
    .datepicker table tr td.active.disabled[disabled]:active,
    .datepicker table tr td.active.disabled:hover[disabled]:active,
    fieldset[disabled] .datepicker table tr td.active:active,
    fieldset[disabled] .datepicker table tr td.active:hover:active,
    fieldset[disabled] .datepicker table tr td.active.disabled:active,
    fieldset[disabled] .datepicker table tr td.active.disabled:hover:active,
    .datepicker table tr td.active.disabled.active,
    .datepicker table tr td.active:hover.disabled.active,
    .datepicker table tr td.active.disabled.disabled.active,
    .datepicker table tr td.active.disabled:hover.disabled.active,
    .datepicker table tr td.active[disabled].active,
    .datepicker table tr td.active:hover[disabled].active,
    .datepicker table tr td.active.disabled[disabled].active,
    .datepicker table tr td.active.disabled:hover[disabled].active,
    fieldset[disabled] .datepicker table tr td.active.active,
    fieldset[disabled] .datepicker table tr td.active:hover.active,
    fieldset[disabled] .datepicker table tr td.active.disabled.active,
    fieldset[disabled] .datepicker table tr td.active.disabled:hover.active {
        background-color: #428bca;
        border-color: #357ebd;
    }
    .datepicker table tr td span {
        display: block;
        width: 23%;
        height: 54px;
        line-height: 54px;
        float: left;
        margin: 1%;
        cursor: pointer;
        border-radius: 4px;
    }
    .datepicker table tr td span:hover {
        background: rgba(0, 0, 0, 0.2);
    }
    .datepicker table tr td span.disabled,
    .datepicker table tr td span.disabled:hover {
        background: none;
        color: #444;
        cursor: default;
    }
    .datepicker table tr td span.active,
    .datepicker table tr td span.active:hover,
    .datepicker table tr td span.active.disabled,
    .datepicker table tr td span.active.disabled:hover {
        color: #ffffff;
        background-color: #428bca;
        border-color: #357ebd;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .datepicker table tr td span.active:hover,
    .datepicker table tr td span.active:hover:hover,
    .datepicker table tr td span.active.disabled:hover,
    .datepicker table tr td span.active.disabled:hover:hover,
    .datepicker table tr td span.active:focus,
    .datepicker table tr td span.active:hover:focus,
    .datepicker table tr td span.active.disabled:focus,
    .datepicker table tr td span.active.disabled:hover:focus,
    .datepicker table tr td span.active:active,
    .datepicker table tr td span.active:hover:active,
    .datepicker table tr td span.active.disabled:active,
    .datepicker table tr td span.active.disabled:hover:active,
    .datepicker table tr td span.active.active,
    .datepicker table tr td span.active:hover.active,
    .datepicker table tr td span.active.disabled.active,
    .datepicker table tr td span.active.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td span.active,
    .open .dropdown-toggle.datepicker table tr td span.active:hover,
    .open .dropdown-toggle.datepicker table tr td span.active.disabled,
    .open .dropdown-toggle.datepicker table tr td span.active.disabled:hover {
        color: #ffffff;
        background-color: #3276b1;
        border-color: #285e8e;
    }
    .datepicker table tr td span.active:active,
    .datepicker table tr td span.active:hover:active,
    .datepicker table tr td span.active.disabled:active,
    .datepicker table tr td span.active.disabled:hover:active,
    .datepicker table tr td span.active.active,
    .datepicker table tr td span.active:hover.active,
    .datepicker table tr td span.active.disabled.active,
    .datepicker table tr td span.active.disabled:hover.active,
    .open .dropdown-toggle.datepicker table tr td span.active,
    .open .dropdown-toggle.datepicker table tr td span.active:hover,
    .open .dropdown-toggle.datepicker table tr td span.active.disabled,
    .open .dropdown-toggle.datepicker table tr td span.active.disabled:hover {
        background-image: none;
    }
    .datepicker table tr td span.active.disabled,
    .datepicker table tr td span.active:hover.disabled,
    .datepicker table tr td span.active.disabled.disabled,
    .datepicker table tr td span.active.disabled:hover.disabled,
    .datepicker table tr td span.active[disabled],
    .datepicker table tr td span.active:hover[disabled],
    .datepicker table tr td span.active.disabled[disabled],
    .datepicker table tr td span.active.disabled:hover[disabled],
    fieldset[disabled] .datepicker table tr td span.active,
    fieldset[disabled] .datepicker table tr td span.active:hover,
    fieldset[disabled] .datepicker table tr td span.active.disabled,
    fieldset[disabled] .datepicker table tr td span.active.disabled:hover,
    .datepicker table tr td span.active.disabled:hover,
    .datepicker table tr td span.active:hover.disabled:hover,
    .datepicker table tr td span.active.disabled.disabled:hover,
    .datepicker table tr td span.active.disabled:hover.disabled:hover,
    .datepicker table tr td span.active[disabled]:hover,
    .datepicker table tr td span.active:hover[disabled]:hover,
    .datepicker table tr td span.active.disabled[disabled]:hover,
    .datepicker table tr td span.active.disabled:hover[disabled]:hover,
    fieldset[disabled] .datepicker table tr td span.active:hover,
    fieldset[disabled] .datepicker table tr td span.active:hover:hover,
    fieldset[disabled] .datepicker table tr td span.active.disabled:hover,
    fieldset[disabled] .datepicker table tr td span.active.disabled:hover:hover,
    .datepicker table tr td span.active.disabled:focus,
    .datepicker table tr td span.active:hover.disabled:focus,
    .datepicker table tr td span.active.disabled.disabled:focus,
    .datepicker table tr td span.active.disabled:hover.disabled:focus,
    .datepicker table tr td span.active[disabled]:focus,
    .datepicker table tr td span.active:hover[disabled]:focus,
    .datepicker table tr td span.active.disabled[disabled]:focus,
    .datepicker table tr td span.active.disabled:hover[disabled]:focus,
    fieldset[disabled] .datepicker table tr td span.active:focus,
    fieldset[disabled] .datepicker table tr td span.active:hover:focus,
    fieldset[disabled] .datepicker table tr td span.active.disabled:focus,
    fieldset[disabled] .datepicker table tr td span.active.disabled:hover:focus,
    .datepicker table tr td span.active.disabled:active,
    .datepicker table tr td span.active:hover.disabled:active,
    .datepicker table tr td span.active.disabled.disabled:active,
    .datepicker table tr td span.active.disabled:hover.disabled:active,
    .datepicker table tr td span.active[disabled]:active,
    .datepicker table tr td span.active:hover[disabled]:active,
    .datepicker table tr td span.active.disabled[disabled]:active,
    .datepicker table tr td span.active.disabled:hover[disabled]:active,
    fieldset[disabled] .datepicker table tr td span.active:active,
    fieldset[disabled] .datepicker table tr td span.active:hover:active,
    fieldset[disabled] .datepicker table tr td span.active.disabled:active,
    fieldset[disabled] .datepicker table tr td span.active.disabled:hover:active,
    .datepicker table tr td span.active.disabled.active,
    .datepicker table tr td span.active:hover.disabled.active,
    .datepicker table tr td span.active.disabled.disabled.active,
    .datepicker table tr td span.active.disabled:hover.disabled.active,
    .datepicker table tr td span.active[disabled].active,
    .datepicker table tr td span.active:hover[disabled].active,
    .datepicker table tr td span.active.disabled[disabled].active,
    .datepicker table tr td span.active.disabled:hover[disabled].active,
    fieldset[disabled] .datepicker table tr td span.active.active,
    fieldset[disabled] .datepicker table tr td span.active:hover.active,
    fieldset[disabled] .datepicker table tr td span.active.disabled.active,
    fieldset[disabled] .datepicker table tr td span.active.disabled:hover.active {
        background-color: #428bca;
        border-color: #357ebd;
    }
    .datepicker table tr td span.old,
    .datepicker table tr td span.new {
        color: #444;
    }
    .datepicker th.datepicker-switch {
        width: 145px;
    }
    .datepicker thead tr:first-child th,
    .datepicker tfoot tr th {
        cursor: pointer;
    }
    .datepicker thead tr:first-child th:hover,
    .datepicker tfoot tr th:hover {
        background: rgba(0, 0, 0, 0.2);
    }
    .datepicker .cw {
        font-size: 10px;
        width: 12px;
        padding: 0 2px 0 5px;
        vertical-align: middle;
    }
    .datepicker thead tr:first-child th.cw {
        cursor: default;
        background-color: transparent;
    }
    .input-group.date .input-group-addon i {
        cursor: pointer;
        width: 16px;
        height: 16px;
    }
    .input-daterange input {
        text-align: center;
    }
    .input-daterange input:first-child {
        border-radius: 3px 0 0 3px;
    }
    .input-daterange input:last-child {
        border-radius: 0 3px 3px 0;
    }
    .input-daterange .input-group-addon {
        width: auto;
        min-width: 16px;
        padding: 4px 5px;
        font-weight: normal;
        line-height: 1.428571429;
        text-align: center;
        text-shadow: 0 1px 0 #fff;
        vertical-align: middle;
        background-color: #eeeeee;
        border: solid #cccccc;
        border-width: 1px 0;
        margin-left: -5px;
        margin-right: -5px;
    }
    .datepicker.dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        float: left;
        display: none;
        min-width: 160px;
        list-style: none;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
        color: #333333;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 13px;
        line-height: 1.428571429;
    }
    .datepicker.dropdown-menu th,
    .datepicker.dropdown-menu td {
        padding: 4px 5px;
    }

    .daterangepicker {
        position: absolute;
        color: inherit;
        background: #fff;
        border-radius: 4px;
        width: 278px;
        padding: 4px;
        margin-top: 1px;
        top: 100px;
        left: 20px;
        /* Calendars */ }
    .daterangepicker:before, .daterangepicker:after {
        position: absolute;
        display: inline-block;
        border-bottom-color: rgba(0, 0, 0, 0.2);
        content: ''; }
    .daterangepicker:before {
        top: -7px;
        border-right: 7px solid transparent;
        border-left: 7px solid transparent;
        border-bottom: 7px solid #ccc; }
    .daterangepicker:after {
        top: -6px;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #fff;
        border-left: 6px solid transparent; }
    .daterangepicker.opensleft:before {
        right: 9px; }
    .daterangepicker.opensleft:after {
        right: 10px; }
    .daterangepicker.openscenter:before {
        left: 0;
        right: 0;
        width: 0;
        margin-left: auto;
        margin-right: auto; }
    .daterangepicker.openscenter:after {
        left: 0;
        right: 0;
        width: 0;
        margin-left: auto;
        margin-right: auto; }
    .daterangepicker.opensright:before {
        left: 9px; }
    .daterangepicker.opensright:after {
        left: 10px; }
    .daterangepicker.dropup {
        margin-top: -5px; }
    .daterangepicker.dropup:before {
        top: initial;
        bottom: -7px;
        border-bottom: initial;
        border-top: 7px solid #ccc; }
    .daterangepicker.dropup:after {
        top: initial;
        bottom: -6px;
        border-bottom: initial;
        border-top: 6px solid #fff; }
    .daterangepicker.dropdown-menu {
        max-width: none;
        z-index: 3001; }
    .daterangepicker.single .ranges, .daterangepicker.single .calendar {
        float: none; }
    .daterangepicker.show-calendar .calendar {
        display: block; }
    .daterangepicker .calendar {
        display: none;
        max-width: 270px;
        margin: 4px; }
    .daterangepicker .calendar.single .calendar-table {
        border: none; }
    .daterangepicker .calendar th, .daterangepicker .calendar td {
        white-space: nowrap;
        text-align: center;
        min-width: 32px; }
    .daterangepicker .calendar-table {
        border: 1px solid #fff;
        padding: 4px;
        border-radius: 4px;
        background: #fff; }
    .daterangepicker table {
        width: 100%;
        margin: 0; }
    .daterangepicker td, .daterangepicker th {
        text-align: center;
        width: 20px;
        height: 20px;
        border-radius: 4px;
        border: 1px solid transparent;
        white-space: nowrap;
        cursor: pointer; }
    .daterangepicker td.available:hover, .daterangepicker th.available:hover {
        background: #eee; }
    .daterangepicker td.week, .daterangepicker th.week {
        font-size: 80%;
        color: #ccc; }
    .daterangepicker td.off, .daterangepicker td.off.in-range, .daterangepicker td.off.start-date, .daterangepicker td.off.end-date {
        background-color: #fff;
        border-color: transparent;
        color: #999; }
    .daterangepicker td.in-range {
        background-color: #ebf4f8;
        border-color: transparent;
        color: #000;
        border-radius: 0; }
    .daterangepicker td.start-date {
        border-radius: 4px 0 0 4px; }
    .daterangepicker td.end-date {
        border-radius: 0 4px 4px 0; }
    .daterangepicker td.start-date.end-date {
        border-radius: 4px; }
    .daterangepicker td.active, .daterangepicker td.active:hover {
        background-color: #357ebd;
        border-color: transparent;
        color: #fff; }
    .daterangepicker th.month {
        width: auto; }
    .daterangepicker td.disabled, .daterangepicker option.disabled {
        color: #999;
        cursor: not-allowed;
        text-decoration: line-through; }
    .daterangepicker select.monthselect, .daterangepicker select.yearselect {
        font-size: 12px;
        padding: 1px;
        height: auto;
        margin: 0;
        cursor: default; }
    .daterangepicker select.monthselect {
        margin-right: 2%;
        width: 56%; }
    .daterangepicker select.yearselect {
        width: 40%; }
    .daterangepicker select.hourselect, .daterangepicker select.minuteselect, .daterangepicker select.secondselect, .daterangepicker select.ampmselect {
        width: 50px;
        margin-bottom: 0; }
    .daterangepicker .input-mini {
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #555;
        height: 30px;
        line-height: 30px;
        display: block;
        vertical-align: middle;
        margin: 0 0 5px 0;
        padding: 0 6px 0 28px;
        width: 100%; }
    .daterangepicker .input-mini.active {
        border: 1px solid #08c;
        border-radius: 4px; }
    .daterangepicker .daterangepicker_input {
        position: relative; }
    .daterangepicker .daterangepicker_input i {
        position: absolute;
        left: 8px;
        top: 8px; }
    .daterangepicker .calendar-time {
        text-align: center;
        margin: 5px auto;
        line-height: 30px;
        position: relative;
        padding-left: 28px; }
    .daterangepicker .calendar-time select.disabled {
        color: #ccc;
        cursor: not-allowed; }

    .ranges {
        font-size: 11px;
        float: none;
        margin: 4px;
        text-align: left; }
    .ranges ul {
        list-style: none;
        margin: 0 auto;
        padding: 0;
        width: 100%; }
    .ranges li {
        font-size: 13px;
        background: #f5f5f5;
        border: 1px solid #f5f5f5;
        border-radius: 4px;
        color: #08c;
        padding: 3px 12px;
        margin-bottom: 8px;
        cursor: pointer; }
    .ranges li:hover {
        background: #08c;
        border: 1px solid #08c;
        color: #fff; }
    .ranges li.active {
        background: #08c;
        border: 1px solid #08c;
        color: #fff; }

    /*  Larger Screen Styling */
    @media (min-width: 564px) {
        .daterangepicker {
            width: auto; }
        .daterangepicker .ranges ul {
            width: 160px; }
        .daterangepicker.single .ranges ul {
            width: 100%; }
        .daterangepicker.single .calendar.left {
            clear: none; }
        .daterangepicker.single .ranges, .daterangepicker.single .calendar {
            float: left; }
        .daterangepicker .calendar.left {
            clear: left;
            margin-right: 0; }
        .daterangepicker .calendar.left .calendar-table {
            border-right: none;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0; }
        .daterangepicker .calendar.right {
            margin-left: 0; }
        .daterangepicker .calendar.right .calendar-table {
            border-left: none;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0; }
        .daterangepicker .left .daterangepicker_input {
            padding-right: 12px; }
        .daterangepicker .calendar.left .calendar-table {
            padding-right: 12px; }
        .daterangepicker .ranges, .daterangepicker .calendar {
            float: left; }
    }

    @media (min-width: 730px) {
        .daterangepicker .ranges {
            width: auto;
            float: left; }
        .daterangepicker .calendar.left {
            clear: none; }
    }

    /*!
 * Datetimepicker for Bootstrap 3
 * version : 4.17.47
 * https://github.com/Eonasdan/bootstrap-datetimepicker/
 */
    .bootstrap-datetimepicker-widget {
        list-style: none;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu {
        display: block;
        margin: 2px 0;
        padding: 4px;
        width: 19em;
    }
    @media (min-width: 768px) {
        .bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs {
            width: 38em;
        }
    }
    @media (min-width: 992px) {
        .bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs {
            width: 38em;
        }
    }
    @media (min-width: 1200px) {
        .bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs {
            width: 38em;
        }
    }
    .bootstrap-datetimepicker-widget.dropdown-menu:before,
    .bootstrap-datetimepicker-widget.dropdown-menu:after {
        content: '';
        display: inline-block;
        position: absolute;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.bottom:before {
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #ccc;
        border-bottom-color: rgba(0, 0, 0, 0.2);
        top: -7px;
        left: 7px;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.bottom:after {
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid white;
        top: -6px;
        left: 8px;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.top:before {
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-top: 7px solid #ccc;
        border-top-color: rgba(0, 0, 0, 0.2);
        bottom: -7px;
        left: 6px;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.top:after {
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid white;
        bottom: -6px;
        left: 7px;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.pull-right:before {
        left: auto;
        right: 6px;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.pull-right:after {
        left: auto;
        right: 7px;
    }
    .bootstrap-datetimepicker-widget .list-unstyled {
        margin: 0;
    }
    .bootstrap-datetimepicker-widget a[data-action] {
        padding: 6px 0;
    }
    .bootstrap-datetimepicker-widget a[data-action]:active {
        box-shadow: none;
    }
    .bootstrap-datetimepicker-widget .timepicker-hour,
    .bootstrap-datetimepicker-widget .timepicker-minute,
    .bootstrap-datetimepicker-widget .timepicker-second {
        width: 54px;
        font-weight: bold;
        font-size: 1.2em;
        margin: 0;
    }
    .bootstrap-datetimepicker-widget button[data-action] {
        padding: 6px;
    }
    .bootstrap-datetimepicker-widget .btn[data-action="incrementHours"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Increment Hours";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="incrementMinutes"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Increment Minutes";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="decrementHours"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Decrement Hours";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="decrementMinutes"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Decrement Minutes";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="showHours"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Show Hours";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="showMinutes"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Show Minutes";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="togglePeriod"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Toggle AM/PM";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="clear"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Clear the picker";
    }
    .bootstrap-datetimepicker-widget .btn[data-action="today"]::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Set the date to today";
    }
    .bootstrap-datetimepicker-widget .picker-switch {
        text-align: center;
    }
    .bootstrap-datetimepicker-widget .picker-switch::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Toggle Date and Time Screens";
    }
    .bootstrap-datetimepicker-widget .picker-switch td {
        padding: 0;
        margin: 0;
        height: auto;
        width: auto;
        line-height: inherit;
    }
    .bootstrap-datetimepicker-widget .picker-switch td span {
        line-height: 2.5;
        height: 2.5em;
        width: 100%;
    }
    .bootstrap-datetimepicker-widget table {
        width: 100%;
        margin: 0;
    }
    .bootstrap-datetimepicker-widget table td,
    .bootstrap-datetimepicker-widget table th {
        text-align: center;
        border-radius: 4px;
    }
    .bootstrap-datetimepicker-widget table th {
        height: 20px;
        line-height: 20px;
        width: 20px;
    }
    .bootstrap-datetimepicker-widget table th.picker-switch {
        width: 145px;
    }
    .bootstrap-datetimepicker-widget table th.disabled,
    .bootstrap-datetimepicker-widget table th.disabled:hover {
        background: none;
        color: #777777;
        cursor: not-allowed;
    }
    .bootstrap-datetimepicker-widget table th.prev::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Previous Month";
    }
    .bootstrap-datetimepicker-widget table th.next::after {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        content: "Next Month";
    }
    .bootstrap-datetimepicker-widget table thead tr:first-child th {
        cursor: pointer;
    }
    .bootstrap-datetimepicker-widget table thead tr:first-child th:hover {
        background: #eeeeee;
    }
    .bootstrap-datetimepicker-widget table td {
        height: 54px;
        line-height: 54px;
        width: 54px;
    }
    .bootstrap-datetimepicker-widget table td.cw {
        font-size: .8em;
        height: 20px;
        line-height: 20px;
        color: #777777;
    }
    .bootstrap-datetimepicker-widget table td.day {
        height: 20px;
        line-height: 20px;
        width: 20px;
    }
    .bootstrap-datetimepicker-widget table td.day:hover,
    .bootstrap-datetimepicker-widget table td.hour:hover,
    .bootstrap-datetimepicker-widget table td.minute:hover,
    .bootstrap-datetimepicker-widget table td.second:hover {
        background: #eeeeee;
        cursor: pointer;
    }
    .bootstrap-datetimepicker-widget table td.old,
    .bootstrap-datetimepicker-widget table td.new {
        color: #777777;
    }
    .bootstrap-datetimepicker-widget table td.today {
        position: relative;
    }
    .bootstrap-datetimepicker-widget table td.today:before {
        content: '';
        display: inline-block;
        border: solid transparent;
        border-width: 0 0 7px 7px;
        border-bottom-color: #337ab7;
        border-top-color: rgba(0, 0, 0, 0.2);
        position: absolute;
        bottom: 4px;
        right: 4px;
    }
    .bootstrap-datetimepicker-widget table td.active,
    .bootstrap-datetimepicker-widget table td.active:hover {
        background-color: #337ab7;
        color: #fff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .bootstrap-datetimepicker-widget table td.active.today:before {
        border-bottom-color: #fff;
    }
    .bootstrap-datetimepicker-widget table td.disabled,
    .bootstrap-datetimepicker-widget table td.disabled:hover {
        background: none;
        color: #777777;
        cursor: not-allowed;
    }
    .bootstrap-datetimepicker-widget table td span {
        display: inline-block;
        width: 54px;
        height: 54px;
        line-height: 54px;
        margin: 2px 1.5px;
        cursor: pointer;
        border-radius: 4px;
    }
    .bootstrap-datetimepicker-widget table td span:hover {
        background: #eeeeee;
    }
    .bootstrap-datetimepicker-widget table td span.active {
        background-color: #337ab7;
        color: #fff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .bootstrap-datetimepicker-widget table td span.old {
        color: #777777;
    }
    .bootstrap-datetimepicker-widget table td span.disabled,
    .bootstrap-datetimepicker-widget table td span.disabled:hover {
        background: none;
        color: #777777;
        cursor: not-allowed;
    }
    .bootstrap-datetimepicker-widget.usetwentyfour td.hour {
        height: 27px;
        line-height: 27px;
    }
    .bootstrap-datetimepicker-widget.wider {
        width: 21em;
    }
    .bootstrap-datetimepicker-widget .datepicker-decades .decade {
        line-height: 1.8em !important;
    }
    .input-group.date .input-group-addon {
        cursor: pointer;
    }
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }

    /*!
 * Slider for Bootstrap
 *
 * Copyright 2012 Stefan Petre
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 */
    .slider {
        display: block;
        vertical-align: middle;
        position: relative;

    }
    .slider.slider-horizontal {
        width: 100%;
        height: 20px;
        margin-bottom: 20px;
    }
    .slider.slider-horizontal:last-of-type {
        margin-bottom: 0;
    }
    .slider.slider-horizontal .slider-track {
        height: 10px;
        width: 100%;
        margin-top: -5px;
        top: 50%;
        left: 0;
    }
    .slider.slider-horizontal .slider-selection,
    .slider.slider-horizontal .slider-track-low,
    .slider.slider-horizontal .slider-track-high {
        height: 100%;
        top: 0;
        bottom: 0;
    }
    .slider.slider-horizontal .slider-tick,
    .slider.slider-horizontal .slider-handle {
        margin-left: -10px;
        margin-top: -5px;
    }
    .slider.slider-horizontal .slider-tick.triangle,
    .slider.slider-horizontal .slider-handle.triangle {
        border-width: 0 10px 10px 10px;
        width: 0;
        height: 0;
        border-bottom-color: #0480be;
        margin-top: 0;
    }
    .slider.slider-horizontal .slider-tick-label-container {
        white-space: nowrap;
        margin-top: 20px;
    }
    .slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
        padding-top: 4px;
        display: inline-block;
        text-align: center;
    }
    .slider.slider-vertical {
        height: 230px;
        width: 20px;
        margin-right: 20px;
        display: inline-block;
    }
    .slider.slider-vertical:last-of-type {
        margin-right: 0;
    }
    .slider.slider-vertical .slider-track {
        width: 10px;
        height: 100%;
        margin-left: -5px;
        left: 50%;
        top: 0;
    }
    .slider.slider-vertical .slider-selection {
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
    }
    .slider.slider-vertical .slider-track-low,
    .slider.slider-vertical .slider-track-high {
        width: 100%;
        left: 0;
        right: 0;
    }
    .slider.slider-vertical .slider-tick,
    .slider.slider-vertical .slider-handle {
        margin-left: -5px;
        margin-top: -10px;
    }
    .slider.slider-vertical .slider-tick.triangle,
    .slider.slider-vertical .slider-handle.triangle {
        border-width: 10px 0 10px 10px;
        width: 1px;
        height: 1px;
        border-left-color: #0480be;
        margin-left: 0;
    }
    .slider.slider-vertical .slider-tick-label-container {
        white-space: nowrap;
    }
    .slider.slider-vertical .slider-tick-label-container .slider-tick-label {
        padding-left: 4px;
    }
    .slider.slider-disabled .slider-handle {
        background-image: -webkit-linear-gradient(top, #dfdfdf 0%, #bebebe 100%);
        background-image: -o-linear-gradient(top, #dfdfdf 0%, #bebebe 100%);
        background-image: linear-gradient(to bottom, #dfdfdf 0%, #bebebe 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffdfdfdf', endColorstr='#ffbebebe', GradientType=0);
    }
    .slider.slider-disabled .slider-track {
        background-image: -webkit-linear-gradient(top, #e5e5e5 0%, #e9e9e9 100%);
        background-image: -o-linear-gradient(top, #e5e5e5 0%, #e9e9e9 100%);
        background-image: linear-gradient(to bottom, #e5e5e5 0%, #e9e9e9 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffe5e5e5', endColorstr='#ffe9e9e9', GradientType=0);
        cursor: not-allowed;
    }
    .slider input {
        display: none;
    }
    .slider .tooltip.top {
        margin-top: -36px;
    }
    .slider .tooltip-inner {
        white-space: nowrap;
    }
    .slider .hide {
        display: none;
    }
    .slider-track {
        position: absolute;
        cursor: pointer;
        background-color: #f7f7f7;
        background-image: -moz-linear-gradient(top, #f0f0f0, #f9f9f9);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f0f0f0), to(#f9f9f9));
        background-image: -webkit-linear-gradient(top, #f0f0f0, #f9f9f9);
        background-image: -o-linear-gradient(top, #f0f0f0, #f9f9f9);
        background-image: linear-gradient(to bottom, #f0f0f0, #f9f9f9);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff0f0f0', endColorstr='#fff9f9f9', GradientType=0);
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .slider-selection {
        position: absolute;
        background-color: #f7f7f7;
        background-image: -moz-linear-gradient(top, #f9f9f9, #f5f5f5);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f9f9f9), to(#f5f5f5));
        background-image: -webkit-linear-gradient(top, #f9f9f9, #f5f5f5);
        background-image: -o-linear-gradient(top, #f9f9f9, #f5f5f5);
        background-image: linear-gradient(to bottom, #f9f9f9, #f5f5f5);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff9f9f9', endColorstr='#fff5f5f5', GradientType=0);
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -moz-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .slider-selection.tick-slider-selection {
        background-image: -webkit-linear-gradient(top, #89cdef 0%, #81bfde 100%);
        background-image: -o-linear-gradient(top, #89cdef 0%, #81bfde 100%);
        background-image: linear-gradient(to bottom, #89cdef 0%, #81bfde 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff89cdef', endColorstr='#ff81bfde', GradientType=0);
    }
    .slider-track-low,
    .slider-track-high {
        position: absolute;
        background: transparent;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border-radius: 4px;
    }
    .slider-handle {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #444;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .2), 0 1px 2px rgba(0, 0, 0, .05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .2), 0 1px 2px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .2), 0 1px 2px rgba(0, 0, 0, .05);
        opacity: 1;
        border: 0px solid transparent;
    }
    .slider-handle.round {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
    }
    .slider-handle.triangle {
        background: transparent none;
    }
    .slider-handle.custom {
        background: transparent none;
    }
    .slider-handle.custom::before {
        line-height: 20px;
        font-size: 20px;
        content: '\2605';
        color: #726204;
    }
    .slider-tick {
        position: absolute;
        width: 20px;
        height: 20px;
        background-image: -webkit-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
        background-image: -o-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
        background-image: linear-gradient(to bottom, #f9f9f9 0%, #f5f5f5 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff9f9f9', endColorstr='#fff5f5f5', GradientType=0);
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        filter: none;
        opacity: 0.8;
        border: 0px solid transparent;
    }
    .slider-tick.round {
        border-radius: 50%;
    }
    .slider-tick.triangle {
        background: transparent none;
    }
    .slider-tick.custom {
        background: transparent none;
    }
    .slider-tick.custom::before {
        line-height: 20px;
        font-size: 20px;
        content: '\2605';
        color: #726204;
    }
    .slider-tick.in-selection {
        background-image: -webkit-linear-gradient(top, #89cdef 0%, #81bfde 100%);
        background-image: -o-linear-gradient(top, #89cdef 0%, #81bfde 100%);
        background-image: linear-gradient(to bottom, #89cdef 0%, #81bfde 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff89cdef', endColorstr='#ff81bfde', GradientType=0);
        opacity: 1;
    }
    .slider-disabled .slider-selection {
        opacity: 0.5;
    }

    #red .slider-selection {
        background: #f56954;
    }

    #blue .slider-selection {
        background: #3c8dbc;
    }

    #green .slider-selection {
        background: #00a65a;
    }

    #yellow .slider-selection {
        background: #f39c12;
    }

    #aqua .slider-selection {
        background: #00c0ef;
    }

    #purple .slider-selection {
        background: #932ab6;
    }
    /*! jQuery UI - v1.12.1 - 2020-01-22
* http://jqueryui.com
* Includes: core.css, accordion.css, autocomplete.css, menu.css, button.css, controlgroup.css, checkboxradio.css, datepicker.css, dialog.css, draggable.css, resizable.css, progressbar.css, selectable.css, selectmenu.css, slider.css, sortable.css, spinner.css, tabs.css, tooltip.css, theme.css
* To view and modify this theme, visit http://jqueryui.com/themeroller/?scope=&folderName=base&cornerRadiusShadow=8px&offsetLeftShadow=0px&offsetTopShadow=0px&thicknessShadow=5px&opacityShadow=30&bgImgOpacityShadow=0&bgTextureShadow=flat&bgColorShadow=666666&opacityOverlay=30&bgImgOpacityOverlay=0&bgTextureOverlay=flat&bgColorOverlay=aaaaaa&iconColorError=cc0000&fcError=5f3f3f&borderColorError=f1a899&bgTextureError=flat&bgColorError=fddfdf&iconColorHighlight=777620&fcHighlight=777620&borderColorHighlight=dad55e&bgTextureHighlight=flat&bgColorHighlight=fffa90&iconColorActive=ffffff&fcActive=ffffff&borderColorActive=003eff&bgTextureActive=flat&bgColorActive=007fff&iconColorHover=555555&fcHover=2b2b2b&borderColorHover=cccccc&bgTextureHover=flat&bgColorHover=ededed&iconColorDefault=777777&fcDefault=454545&borderColorDefault=c5c5c5&bgTextureDefault=flat&bgColorDefault=f6f6f6&iconColorContent=444444&fcContent=333333&borderColorContent=dddddd&bgTextureContent=flat&bgColorContent=ffffff&iconColorHeader=444444&fcHeader=333333&borderColorHeader=dddddd&bgTextureHeader=flat&bgColorHeader=e9e9e9&cornerRadius=3px&fwDefault=normal&fsDefault=1em&ffDefault=Arial%2CHelvetica%2Csans-serif
* Copyright jQuery Foundation and other contributors; Licensed MIT */

    /* Layout helpers
----------------------------------*/
    .ui-helper-hidden {
        display: none;
    }
    .ui-helper-hidden-accessible {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .ui-helper-reset {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        line-height: 1.3;
        text-decoration: none;
        font-size: 100%;
        list-style: none;
    }
    .ui-helper-clearfix:before,
    .ui-helper-clearfix:after {
        content: "";
        display: table;
        border-collapse: collapse;
    }
    .ui-helper-clearfix:after {
        clear: both;
    }
    .ui-helper-zfix {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        position: absolute;
        opacity: 0;
        filter: Alpha(Opacity=0); /* support: IE8 */
    }

    .ui-front {
        z-index: 100;
    }

    /* Interaction Cues
----------------------------------*/
    .ui-state-disabled {
        cursor: default !important;
        pointer-events: none;
    }

    /* Icons
----------------------------------*/
    .ui-icon {
        display: inline-block;
        vertical-align: middle;
        margin-top: -.25em;
        position: relative;
        text-indent: -99999px;
        overflow: hidden;
        background-repeat: no-repeat;
    }

    .ui-widget-icon-block {
        left: 50%;
        margin-left: -8px;
        display: block;
    }

    /* Misc visuals
----------------------------------*/

    /* Overlays */
    .ui-widget-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .ui-accordion .ui-accordion-header {
        display: block;
        cursor: pointer;
        position: relative;
        margin: 2px 0 0 0;
        padding: .5em .5em .5em .7em;
        font-size: 100%;
    }
    .ui-accordion .ui-accordion-content {
        padding: 1em 2.2em;
        border-top: 0;
        overflow: auto;
    }
    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        cursor: default;
    }
    .ui-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: block;
        outline: 0;
    }
    .ui-menu .ui-menu {
        position: absolute;
    }
    .ui-menu .ui-menu-item {
        margin: 0;
        cursor: pointer;
        /* support: IE10, see #8844 */
        list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
    }
    .ui-menu .ui-menu-item-wrapper {
        position: relative;
        padding: 3px 1em 3px .4em;
    }
    .ui-menu .ui-menu-divider {
        margin: 5px 0;
        height: 0;
        font-size: 0;
        line-height: 0;
        border-width: 1px 0 0 0;
    }
    .ui-menu .ui-state-focus,
    .ui-menu .ui-state-active {
        margin: -1px;
    }

    /* icon support */
    .ui-menu-icons {
        position: relative;
    }
    .ui-menu-icons .ui-menu-item-wrapper {
        padding-left: 2em;
    }

    /* left-aligned */
    .ui-menu .ui-icon {
        position: absolute;
        top: 0;
        bottom: 0;
        left: .2em;
        margin: auto 0;
    }

    /* right-aligned */
    .ui-menu .ui-menu-icon {
        left: auto;
        right: 0;
    }
    .ui-button {
        padding: .4em 1em;
        display: inline-block;
        position: relative;
        line-height: normal;
        margin-right: .1em;
        cursor: pointer;
        vertical-align: middle;
        text-align: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;

        /* Support: IE <= 11 */
        overflow: visible;
    }

    .ui-button,
    .ui-button:link,
    .ui-button:visited,
    .ui-button:hover,
    .ui-button:active {
        text-decoration: none;
    }

    /* to make room for the icon, a width needs to be set here */
    .ui-button-icon-only {
        width: 2em;
        box-sizing: border-box;
        text-indent: -9999px;
        white-space: nowrap;
    }

    /* no icon support for input elements */
    input.ui-button.ui-button-icon-only {
        text-indent: 0;
    }

    /* button icon element(s) */
    .ui-button-icon-only .ui-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -8px;
        margin-left: -8px;
    }

    .ui-button.ui-icon-notext .ui-icon {
        padding: 0;
        width: 2.1em;
        height: 2.1em;
        text-indent: -9999px;
        white-space: nowrap;

    }

    input.ui-button.ui-icon-notext .ui-icon {
        width: auto;
        height: auto;
        text-indent: 0;
        white-space: normal;
        padding: .4em 1em;
    }

    /* workarounds */
    /* Support: Firefox 5 - 40 */
    input.ui-button::-moz-focus-inner,
    button.ui-button::-moz-focus-inner {
        border: 0;
        padding: 0;
    }
    .ui-controlgroup {
        vertical-align: middle;
        display: inline-block;
    }
    .ui-controlgroup > .ui-controlgroup-item {
        float: left;
        margin-left: 0;
        margin-right: 0;
    }
    .ui-controlgroup > .ui-controlgroup-item:focus,
    .ui-controlgroup > .ui-controlgroup-item.ui-visual-focus {
        z-index: 9999;
    }
    .ui-controlgroup-vertical > .ui-controlgroup-item {
        display: block;
        float: none;
        width: 100%;
        margin-top: 0;
        margin-bottom: 0;
        text-align: left;
    }
    .ui-controlgroup-vertical .ui-controlgroup-item {
        box-sizing: border-box;
    }
    .ui-controlgroup .ui-controlgroup-label {
        padding: .4em 1em;
    }
    .ui-controlgroup .ui-controlgroup-label span {
        font-size: 80%;
    }
    .ui-controlgroup-horizontal .ui-controlgroup-label + .ui-controlgroup-item {
        border-left: none;
    }
    .ui-controlgroup-vertical .ui-controlgroup-label + .ui-controlgroup-item {
        border-top: none;
    }
    .ui-controlgroup-horizontal .ui-controlgroup-label.ui-widget-content {
        border-right: none;
    }
    .ui-controlgroup-vertical .ui-controlgroup-label.ui-widget-content {
        border-bottom: none;
    }

    /* Spinner specific style fixes */
    .ui-controlgroup-vertical .ui-spinner-input {

        /* Support: IE8 only, Android < 4.4 only */
        width: 75%;
        width: calc(100% - 2.4em);
    }
    .ui-controlgroup-vertical .ui-spinner .ui-spinner-up {
        border-top-style: solid;
    }

    .ui-checkboxradio-label .ui-icon-background {
        box-shadow: inset 1px 1px 1px #ccc;
        border-radius: .12em;
        border: none;
    }
    .ui-checkboxradio-radio-label .ui-icon-background {
        width: 16px;
        height: 16px;
        border-radius: 1em;
        overflow: visible;
        border: none;
    }
    .ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon,
    .ui-checkboxradio-radio-label.ui-checkboxradio-checked:hover .ui-icon {
        background-image: none;
        width: 8px;
        height: 8px;
        border-width: 4px;
        border-style: solid;
    }
    .ui-checkboxradio-disabled {
        pointer-events: none;
    }
    .ui-datepicker {
        width: 17em;
        padding: .2em .2em 0;
        display: none;
    }
    .ui-datepicker .ui-datepicker-header {
        position: relative;
        padding: .2em 0;
    }
    .ui-datepicker .ui-datepicker-prev,
    .ui-datepicker .ui-datepicker-next {
        position: absolute;
        top: 2px;
        width: 1.8em;
        height: 1.8em;
    }
    .ui-datepicker .ui-datepicker-prev-hover,
    .ui-datepicker .ui-datepicker-next-hover {
        top: 1px;
    }
    .ui-datepicker .ui-datepicker-prev {
        left: 2px;
    }
    .ui-datepicker .ui-datepicker-next {
        right: 2px;
    }
    .ui-datepicker .ui-datepicker-prev-hover {
        left: 1px;
    }
    .ui-datepicker .ui-datepicker-next-hover {
        right: 1px;
    }
    .ui-datepicker .ui-datepicker-prev span,
    .ui-datepicker .ui-datepicker-next span {
        display: block;
        position: absolute;
        left: 50%;
        margin-left: -8px;
        top: 50%;
        margin-top: -8px;
    }
    .ui-datepicker .ui-datepicker-title {
        margin: 0 2.3em;
        line-height: 1.8em;
        text-align: center;
    }
    .ui-datepicker .ui-datepicker-title select {
        font-size: 1em;
        margin: 1px 0;
    }
    .ui-datepicker select.ui-datepicker-month,
    .ui-datepicker select.ui-datepicker-year {
        width: 45%;
    }
    .ui-datepicker table {
        width: 100%;
        font-size: .9em;
        border-collapse: collapse;
        margin: 0 0 .4em;
    }
    .ui-datepicker th {
        padding: .7em .3em;
        text-align: center;
        font-weight: bold;
        border: 0;
    }
    .ui-datepicker td {
        border: 0;
        padding: 1px;
    }
    .ui-datepicker td span,
    .ui-datepicker td a {
        display: block;
        padding: .2em;
        text-align: right;
        text-decoration: none;
    }
    .ui-datepicker .ui-datepicker-buttonpane {
        background-image: none;
        margin: .7em 0 0 0;
        padding: 0 .2em;
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
    }
    .ui-datepicker .ui-datepicker-buttonpane button {
        float: right;
        margin: .5em .2em .4em;
        cursor: pointer;
        padding: .2em .6em .3em .6em;
        width: auto;
        overflow: visible;
    }
    .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
        float: left;
    }

    /* with multiple calendars */
    .ui-datepicker.ui-datepicker-multi {
        width: auto;
    }
    .ui-datepicker-multi .ui-datepicker-group {
        float: left;
    }
    .ui-datepicker-multi .ui-datepicker-group table {
        width: 95%;
        margin: 0 auto .4em;
    }
    .ui-datepicker-multi-2 .ui-datepicker-group {
        width: 50%;
    }
    .ui-datepicker-multi-3 .ui-datepicker-group {
        width: 33.3%;
    }
    .ui-datepicker-multi-4 .ui-datepicker-group {
        width: 25%;
    }
    .ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,
    .ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
        border-left-width: 0;
    }
    .ui-datepicker-multi .ui-datepicker-buttonpane {
        clear: left;
    }
    .ui-datepicker-row-break {
        clear: both;
        width: 100%;
        font-size: 0;
    }

    /* RTL support */
    .ui-datepicker-rtl {
        direction: rtl;
    }
    .ui-datepicker-rtl .ui-datepicker-prev {
        right: 2px;
        left: auto;
    }
    .ui-datepicker-rtl .ui-datepicker-next {
        left: 2px;
        right: auto;
    }
    .ui-datepicker-rtl .ui-datepicker-prev:hover {
        right: 1px;
        left: auto;
    }
    .ui-datepicker-rtl .ui-datepicker-next:hover {
        left: 1px;
        right: auto;
    }
    .ui-datepicker-rtl .ui-datepicker-buttonpane {
        clear: right;
    }
    .ui-datepicker-rtl .ui-datepicker-buttonpane button {
        float: left;
    }
    .ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,
    .ui-datepicker-rtl .ui-datepicker-group {
        float: right;
    }
    .ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,
    .ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
        border-right-width: 0;
        border-left-width: 1px;
    }

    /* Icons */
    .ui-datepicker .ui-icon {
        display: block;
        text-indent: -99999px;
        overflow: hidden;
        background-repeat: no-repeat;
        left: .5em;
        top: .3em;
    }
    .ui-dialog {
        position: absolute;
        top: 0;
        left: 0;
        padding: .2em;
        outline: 0;
    }
    .ui-dialog .ui-dialog-titlebar {
        padding: .4em 1em;
        position: relative;
    }
    .ui-dialog .ui-dialog-title {
        float: left;
        margin: .1em 0;
        white-space: nowrap;
        width: 90%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .ui-dialog .ui-dialog-titlebar-close {
        position: absolute;
        right: .3em;
        top: 50%;
        width: 20px;
        margin: -10px 0 0 0;
        padding: 1px;
        height: 20px;
    }
    .ui-dialog .ui-dialog-content {
        position: relative;
        border: 0;
        padding: .5em 1em;
        background: none;
        overflow: auto;
    }
    .ui-dialog .ui-dialog-buttonpane {
        text-align: left;
        border-width: 1px 0 0 0;
        background-image: none;
        margin-top: .5em;
        padding: .3em 1em .5em .4em;
    }
    .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
        float: right;
    }
    .ui-dialog .ui-dialog-buttonpane button {
        margin: .5em .4em .5em 0;
        cursor: pointer;
    }
    .ui-dialog .ui-resizable-n {
        height: 2px;
        top: 0;
    }
    .ui-dialog .ui-resizable-e {
        width: 2px;
        right: 0;
    }
    .ui-dialog .ui-resizable-s {
        height: 2px;
        bottom: 0;
    }
    .ui-dialog .ui-resizable-w {
        width: 2px;
        left: 0;
    }
    .ui-dialog .ui-resizable-se,
    .ui-dialog .ui-resizable-sw,
    .ui-dialog .ui-resizable-ne,
    .ui-dialog .ui-resizable-nw {
        width: 7px;
        height: 7px;
    }
    .ui-dialog .ui-resizable-se {
        right: 0;
        bottom: 0;
    }
    .ui-dialog .ui-resizable-sw {
        left: 0;
        bottom: 0;
    }
    .ui-dialog .ui-resizable-ne {
        right: 0;
        top: 0;
    }
    .ui-dialog .ui-resizable-nw {
        left: 0;
        top: 0;
    }
    .ui-draggable .ui-dialog-titlebar {
        cursor: move;
    }
    .ui-draggable-handle {
        -ms-touch-action: none;
        touch-action: none;
    }
    .ui-resizable {
        position: relative;
    }
    .ui-resizable-handle {
        position: absolute;
        font-size: 0.1px;
        display: block;
        -ms-touch-action: none;
        touch-action: none;
    }
    .ui-resizable-disabled .ui-resizable-handle,
    .ui-resizable-autohide .ui-resizable-handle {
        display: none;
    }
    .ui-resizable-n {
        cursor: n-resize;
        height: 7px;
        width: 100%;
        top: -5px;
        left: 0;
    }
    .ui-resizable-s {
        cursor: s-resize;
        height: 7px;
        width: 100%;
        bottom: -5px;
        left: 0;
    }
    .ui-resizable-e {
        cursor: e-resize;
        width: 7px;
        right: -5px;
        top: 0;
        height: 100%;
    }
    .ui-resizable-w {
        cursor: w-resize;
        width: 7px;
        left: -5px;
        top: 0;
        height: 100%;
    }
    .ui-resizable-se {
        cursor: se-resize;
        width: 12px;
        height: 12px;
        right: 1px;
        bottom: 1px;
    }
    .ui-resizable-sw {
        cursor: sw-resize;
        width: 9px;
        height: 9px;
        left: -5px;
        bottom: -5px;
    }
    .ui-resizable-nw {
        cursor: nw-resize;
        width: 9px;
        height: 9px;
        left: -5px;
        top: -5px;
    }
    .ui-resizable-ne {
        cursor: ne-resize;
        width: 9px;
        height: 9px;
        right: -5px;
        top: -5px;
    }
    .ui-progressbar {
        height: 2em;
        text-align: left;
        overflow: hidden;
    }
    .ui-progressbar .ui-progressbar-value {
        margin: -1px;
        height: 100%;
    }
    .ui-progressbar .ui-progressbar-overlay {
        background: url("data:image/gif;base64,R0lGODlhKAAoAIABAAAAAP///yH/C05FVFNDQVBFMi4wAwEAAAAh+QQJAQABACwAAAAAKAAoAAACkYwNqXrdC52DS06a7MFZI+4FHBCKoDeWKXqymPqGqxvJrXZbMx7Ttc+w9XgU2FB3lOyQRWET2IFGiU9m1frDVpxZZc6bfHwv4c1YXP6k1Vdy292Fb6UkuvFtXpvWSzA+HycXJHUXiGYIiMg2R6W459gnWGfHNdjIqDWVqemH2ekpObkpOlppWUqZiqr6edqqWQAAIfkECQEAAQAsAAAAACgAKAAAApSMgZnGfaqcg1E2uuzDmmHUBR8Qil95hiPKqWn3aqtLsS18y7G1SzNeowWBENtQd+T1JktP05nzPTdJZlR6vUxNWWjV+vUWhWNkWFwxl9VpZRedYcflIOLafaa28XdsH/ynlcc1uPVDZxQIR0K25+cICCmoqCe5mGhZOfeYSUh5yJcJyrkZWWpaR8doJ2o4NYq62lAAACH5BAkBAAEALAAAAAAoACgAAAKVDI4Yy22ZnINRNqosw0Bv7i1gyHUkFj7oSaWlu3ovC8GxNso5fluz3qLVhBVeT/Lz7ZTHyxL5dDalQWPVOsQWtRnuwXaFTj9jVVh8pma9JjZ4zYSj5ZOyma7uuolffh+IR5aW97cHuBUXKGKXlKjn+DiHWMcYJah4N0lYCMlJOXipGRr5qdgoSTrqWSq6WFl2ypoaUAAAIfkECQEAAQAsAAAAACgAKAAAApaEb6HLgd/iO7FNWtcFWe+ufODGjRfoiJ2akShbueb0wtI50zm02pbvwfWEMWBQ1zKGlLIhskiEPm9R6vRXxV4ZzWT2yHOGpWMyorblKlNp8HmHEb/lCXjcW7bmtXP8Xt229OVWR1fod2eWqNfHuMjXCPkIGNileOiImVmCOEmoSfn3yXlJWmoHGhqp6ilYuWYpmTqKUgAAIfkECQEAAQAsAAAAACgAKAAAApiEH6kb58biQ3FNWtMFWW3eNVcojuFGfqnZqSebuS06w5V80/X02pKe8zFwP6EFWOT1lDFk8rGERh1TTNOocQ61Hm4Xm2VexUHpzjymViHrFbiELsefVrn6XKfnt2Q9G/+Xdie499XHd2g4h7ioOGhXGJboGAnXSBnoBwKYyfioubZJ2Hn0RuRZaflZOil56Zp6iioKSXpUAAAh+QQJAQABACwAAAAAKAAoAAACkoQRqRvnxuI7kU1a1UU5bd5tnSeOZXhmn5lWK3qNTWvRdQxP8qvaC+/yaYQzXO7BMvaUEmJRd3TsiMAgswmNYrSgZdYrTX6tSHGZO73ezuAw2uxuQ+BbeZfMxsexY35+/Qe4J1inV0g4x3WHuMhIl2jXOKT2Q+VU5fgoSUI52VfZyfkJGkha6jmY+aaYdirq+lQAACH5BAkBAAEALAAAAAAoACgAAAKWBIKpYe0L3YNKToqswUlvznigd4wiR4KhZrKt9Upqip61i9E3vMvxRdHlbEFiEXfk9YARYxOZZD6VQ2pUunBmtRXo1Lf8hMVVcNl8JafV38aM2/Fu5V16Bn63r6xt97j09+MXSFi4BniGFae3hzbH9+hYBzkpuUh5aZmHuanZOZgIuvbGiNeomCnaxxap2upaCZsq+1kAACH5BAkBAAEALAAAAAAoACgAAAKXjI8By5zf4kOxTVrXNVlv1X0d8IGZGKLnNpYtm8Lr9cqVeuOSvfOW79D9aDHizNhDJidFZhNydEahOaDH6nomtJjp1tutKoNWkvA6JqfRVLHU/QUfau9l2x7G54d1fl995xcIGAdXqMfBNadoYrhH+Mg2KBlpVpbluCiXmMnZ2Sh4GBqJ+ckIOqqJ6LmKSllZmsoq6wpQAAAh+QQJAQABACwAAAAAKAAoAAAClYx/oLvoxuJDkU1a1YUZbJ59nSd2ZXhWqbRa2/gF8Gu2DY3iqs7yrq+xBYEkYvFSM8aSSObE+ZgRl1BHFZNr7pRCavZ5BW2142hY3AN/zWtsmf12p9XxxFl2lpLn1rseztfXZjdIWIf2s5dItwjYKBgo9yg5pHgzJXTEeGlZuenpyPmpGQoKOWkYmSpaSnqKileI2FAAACH5BAkBAAEALAAAAAAoACgAAAKVjB+gu+jG4kORTVrVhRlsnn2dJ3ZleFaptFrb+CXmO9OozeL5VfP99HvAWhpiUdcwkpBH3825AwYdU8xTqlLGhtCosArKMpvfa1mMRae9VvWZfeB2XfPkeLmm18lUcBj+p5dnN8jXZ3YIGEhYuOUn45aoCDkp16hl5IjYJvjWKcnoGQpqyPlpOhr3aElaqrq56Bq7VAAAOw==");
        height: 100%;
        filter: alpha(opacity=25); /* support: IE8 */
        opacity: 0.25;
    }
    .ui-progressbar-indeterminate .ui-progressbar-value {
        background-image: none;
    }
    .ui-selectable {
        -ms-touch-action: none;
        touch-action: none;
    }
    .ui-selectable-helper {
        position: absolute;
        z-index: 100;
        border: 1px dotted black;
    }
    .ui-selectmenu-menu {
        padding: 0;
        margin: 0;
        position: absolute;
        top: 0;
        left: 0;
        display: none;
    }
    .ui-selectmenu-menu .ui-menu {
        overflow: auto;
        overflow-x: hidden;
        padding-bottom: 1px;
    }
    .ui-selectmenu-menu .ui-menu .ui-selectmenu-optgroup {
        font-size: 1em;
        font-weight: bold;
        line-height: 1.5;
        padding: 2px 0.4em;
        margin: 0.5em 0 0 0;
        height: auto;
        border: 0;
    }
    .ui-selectmenu-open {
        display: block;
    }
    .ui-selectmenu-text {
        display: block;
        margin-right: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .ui-selectmenu-button.ui-button {
        text-align: left;
        white-space: nowrap;
        width: 14em;
    }
    .ui-selectmenu-icon.ui-icon {
        float: right;
        margin-top: 0;
    }
    .ui-slider {
        position: relative;
        text-align: left;
    }
    .ui-slider .ui-slider-handle {
        position: absolute;
        z-index: 2;
        width: 1.2em;
        height: 1.2em;
        cursor: default;
        -ms-touch-action: none;
        touch-action: none;
    }
    .ui-slider .ui-slider-range {
        position: absolute;
        z-index: 1;
        font-size: .7em;
        display: block;
        border: 0;
        background-position: 0 0;
    }

    /* support: IE8 - See #6727 */
    .ui-slider.ui-state-disabled .ui-slider-handle,
    .ui-slider.ui-state-disabled .ui-slider-range {
        filter: inherit;
    }

    .ui-slider-horizontal {
        height: .8em;
    }
    .ui-slider-horizontal .ui-slider-handle {
        top: -.3em;
        margin-left: -.6em;
    }
    .ui-slider-horizontal .ui-slider-range {
        top: 0;
        height: 100%;
    }
    .ui-slider-horizontal .ui-slider-range-min {
        left: 0;
    }
    .ui-slider-horizontal .ui-slider-range-max {
        right: 0;
    }

    .ui-slider-vertical {
        width: .8em;
        height: 100px;
    }
    .ui-slider-vertical .ui-slider-handle {
        left: -.3em;
        margin-left: 0;
        margin-bottom: -.6em;
    }
    .ui-slider-vertical .ui-slider-range {
        left: 0;
        width: 100%;
    }
    .ui-slider-vertical .ui-slider-range-min {
        bottom: 0;
    }
    .ui-slider-vertical .ui-slider-range-max {
        top: 0;
    }
    .ui-sortable-handle {
        -ms-touch-action: none;
        touch-action: none;
    }
    .ui-spinner {
        position: relative;
        display: inline-block;
        overflow: hidden;
        padding: 0;
        vertical-align: middle;
    }
    .ui-spinner-input {
        border: none;
        background: none;
        color: inherit;
        padding: .222em 0;
        margin: .2em 0;
        vertical-align: middle;
        margin-left: .4em;
        margin-right: 2em;
    }
    .ui-spinner-button {
        width: 1.6em;
        height: 50%;
        font-size: .5em;
        padding: 0;
        margin: 0;
        text-align: center;
        position: absolute;
        cursor: default;
        display: block;
        overflow: hidden;
        right: 0;
    }
    /* more specificity required here to override default borders */
    .ui-spinner a.ui-spinner-button {
        border-top-style: none;
        border-bottom-style: none;
        border-right-style: none;
    }
    .ui-spinner-up {
        top: 0;
    }
    .ui-spinner-down {
        bottom: 0;
    }
    .ui-tabs {
        position: relative; /* position: relative prevents IE scroll bug (element with position: relative inside container with overflow: auto appear as "fixed") */
        padding: .2em;
    }
    .ui-tabs .ui-tabs-nav {
        margin: 0;
        padding: .2em .2em 0;
    }
    .ui-tabs .ui-tabs-nav li {
        list-style: none;
        float: left;
        position: relative;
        top: 0;
        margin: 1px .2em 0 0;
        border-bottom-width: 0;
        padding: 0;
        white-space: nowrap;
    }
    .ui-tabs .ui-tabs-nav .ui-tabs-anchor {
        float: left;
        padding: .5em 1em;
        text-decoration: none;
    }
    .ui-tabs .ui-tabs-nav li.ui-tabs-active {
        margin-bottom: -1px;
        padding-bottom: 1px;
    }
    .ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor,
    .ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor,
    .ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor {
        cursor: text;
    }
    .ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor {
        cursor: pointer;
    }
    .ui-tabs .ui-tabs-panel {
        display: block;
        border-width: 0;
        padding: 1em 1.4em;
        background: none;
    }
    .ui-tooltip {
        padding: 8px;
        position: absolute;
        z-index: 9999;
        max-width: 300px;
    }
    body .ui-tooltip {
        border-width: 2px;
    }

    /* Component containers
----------------------------------*/
    .ui-widget {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1em;
    }
    .ui-widget .ui-widget {
        font-size: 1em;
    }
    .ui-widget input,
    .ui-widget select,
    .ui-widget textarea,
    .ui-widget button {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1em;
    }
    .ui-widget.ui-widget-content {
        border: 1px solid #c5c5c5;
    }
    .ui-widget-content {
        border: 1px solid #dddddd;
        background: #ffffff;
        color: #333333;
    }
    .ui-widget-content a {
        color: #333333;
    }
    .ui-widget-header {
        border: 1px solid #dddddd;
        background: #e9e9e9;
        color: #333333;
        font-weight: bold;
    }
    .ui-widget-header a {
        color: #333333;
    }

    /* Interaction states
----------------------------------*/
    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
        /* We use html here because we need a greater specificity to make sure disabled
works properly when clicked or hovered */
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        border: 1px solid #c5c5c5;
        background: #f6f6f6;
        font-weight: normal;
        color: #454545;
    }
    .ui-state-default a,
    .ui-state-default a:link,
    .ui-state-default a:visited,
    a.ui-button,
    a:link.ui-button,
    a:visited.ui-button,
    .ui-button {
        color: #454545;
        text-decoration: none;
    }
    .ui-state-hover,
    .ui-widget-content .ui-state-hover,
    .ui-widget-header .ui-state-hover,
    .ui-state-focus,
    .ui-widget-content .ui-state-focus,
    .ui-widget-header .ui-state-focus,
    .ui-button:hover,
    .ui-button:focus {
        border: 1px solid #cccccc;
        background: #ededed;
        font-weight: normal;
        color: #2b2b2b;
    }
    .ui-state-hover a,
    .ui-state-hover a:hover,
    .ui-state-hover a:link,
    .ui-state-hover a:visited,
    .ui-state-focus a,
    .ui-state-focus a:hover,
    .ui-state-focus a:link,
    .ui-state-focus a:visited,
    a.ui-button:hover,
    a.ui-button:focus {
        color: #2b2b2b;
        text-decoration: none;
    }

    .ui-visual-focus {
        box-shadow: 0 0 3px 1px rgb(94, 158, 214);
    }
    .ui-state-active,
    .ui-widget-content .ui-state-active,
    .ui-widget-header .ui-state-active,
    a.ui-button:active,
    .ui-button:active,
    .ui-button.ui-state-active:hover {
        border: 1px solid #003eff;
        background: #007fff;
        font-weight: normal;
        color: #ffffff;
    }
    .ui-icon-background,
    .ui-state-active .ui-icon-background {
        border: #003eff;
        background-color: #ffffff;
    }
    .ui-state-active a,
    .ui-state-active a:link,
    .ui-state-active a:visited {
        color: #ffffff;
        text-decoration: none;
    }

    /* Interaction Cues
----------------------------------*/
    .ui-state-highlight,
    .ui-widget-content .ui-state-highlight,
    .ui-widget-header .ui-state-highlight {
        border: 1px solid #dad55e;
        background: #fffa90;
        color: #777620;
    }
    .ui-state-checked {
        border: 1px solid #dad55e;
        background: #fffa90;
    }
    .ui-state-highlight a,
    .ui-widget-content .ui-state-highlight a,
    .ui-widget-header .ui-state-highlight a {
        color: #777620;
    }
    .ui-state-error,
    .ui-widget-content .ui-state-error,
    .ui-widget-header .ui-state-error {
        border: 1px solid #f1a899;
        background: #fddfdf;
        color: #5f3f3f;
    }
    .ui-state-error a,
    .ui-widget-content .ui-state-error a,
    .ui-widget-header .ui-state-error a {
        color: #5f3f3f;
    }
    .ui-state-error-text,
    .ui-widget-content .ui-state-error-text,
    .ui-widget-header .ui-state-error-text {
        color: #5f3f3f;
    }
    .ui-priority-primary,
    .ui-widget-content .ui-priority-primary,
    .ui-widget-header .ui-priority-primary {
        font-weight: bold;
    }
    .ui-priority-secondary,
    .ui-widget-content .ui-priority-secondary,
    .ui-widget-header .ui-priority-secondary {
        opacity: .7;
        filter: Alpha(Opacity=70); /* support: IE8 */
        font-weight: normal;
    }
    .ui-state-disabled,
    .ui-widget-content .ui-state-disabled,
    .ui-widget-header .ui-state-disabled {
        opacity: .35;
        filter: Alpha(Opacity=35); /* support: IE8 */
        background-image: none;
    }
    .ui-state-disabled .ui-icon {
        filter: Alpha(Opacity=35); /* support: IE8 - See #6059 */
    }

    /* Icons
----------------------------------*/

    /* states and images */
    .ui-icon {
        width: 16px;
        height: 16px;
    }
    .ui-icon,
    .ui-widget-content .ui-icon {
        background-image: url("images/ui-icons_444444_256x240.png");
    }
    .ui-widget-header .ui-icon {
        background-image: url("images/ui-icons_444444_256x240.png");
    }
    .ui-state-hover .ui-icon,
    .ui-state-focus .ui-icon,
    .ui-button:hover .ui-icon,
    .ui-button:focus .ui-icon {
        background-image: url("images/ui-icons_555555_256x240.png");
    }
    .ui-state-active .ui-icon,
    .ui-button:active .ui-icon {
        background-image: url("images/ui-icons_ffffff_256x240.png");
    }
    .ui-state-highlight .ui-icon,
    .ui-button .ui-state-highlight.ui-icon {
        background-image: url("images/ui-icons_777620_256x240.png");
    }
    .ui-state-error .ui-icon,
    .ui-state-error-text .ui-icon {
        background-image: url("images/ui-icons_cc0000_256x240.png");
    }
    .ui-button .ui-icon {
        background-image: url("images/ui-icons_777777_256x240.png");
    }

    /* positioning */
    .ui-icon-blank { background-position: 16px 16px; }
    .ui-icon-caret-1-n { background-position: 0 0; }
    .ui-icon-caret-1-ne { background-position: -16px 0; }
    .ui-icon-caret-1-e { background-position: -32px 0; }
    .ui-icon-caret-1-se { background-position: -48px 0; }
    .ui-icon-caret-1-s { background-position: -65px 0; }
    .ui-icon-caret-1-sw { background-position: -80px 0; }
    .ui-icon-caret-1-w { background-position: -96px 0; }
    .ui-icon-caret-1-nw { background-position: -112px 0; }
    .ui-icon-caret-2-n-s { background-position: -128px 0; }
    .ui-icon-caret-2-e-w { background-position: -144px 0; }
    .ui-icon-triangle-1-n { background-position: 0 -16px; }
    .ui-icon-triangle-1-ne { background-position: -16px -16px; }
    .ui-icon-triangle-1-e { background-position: -32px -16px; }
    .ui-icon-triangle-1-se { background-position: -48px -16px; }
    .ui-icon-triangle-1-s { background-position: -65px -16px; }
    .ui-icon-triangle-1-sw { background-position: -80px -16px; }
    .ui-icon-triangle-1-w { background-position: -96px -16px; }
    .ui-icon-triangle-1-nw { background-position: -112px -16px; }
    .ui-icon-triangle-2-n-s { background-position: -128px -16px; }
    .ui-icon-triangle-2-e-w { background-position: -144px -16px; }
    .ui-icon-arrow-1-n { background-position: 0 -32px; }
    .ui-icon-arrow-1-ne { background-position: -16px -32px; }
    .ui-icon-arrow-1-e { background-position: -32px -32px; }
    .ui-icon-arrow-1-se { background-position: -48px -32px; }
    .ui-icon-arrow-1-s { background-position: -65px -32px; }
    .ui-icon-arrow-1-sw { background-position: -80px -32px; }
    .ui-icon-arrow-1-w { background-position: -96px -32px; }
    .ui-icon-arrow-1-nw { background-position: -112px -32px; }
    .ui-icon-arrow-2-n-s { background-position: -128px -32px; }
    .ui-icon-arrow-2-ne-sw { background-position: -144px -32px; }
    .ui-icon-arrow-2-e-w { background-position: -160px -32px; }
    .ui-icon-arrow-2-se-nw { background-position: -176px -32px; }
    .ui-icon-arrowstop-1-n { background-position: -192px -32px; }
    .ui-icon-arrowstop-1-e { background-position: -208px -32px; }
    .ui-icon-arrowstop-1-s { background-position: -224px -32px; }
    .ui-icon-arrowstop-1-w { background-position: -240px -32px; }
    .ui-icon-arrowthick-1-n { background-position: 1px -48px; }
    .ui-icon-arrowthick-1-ne { background-position: -16px -48px; }
    .ui-icon-arrowthick-1-e { background-position: -32px -48px; }
    .ui-icon-arrowthick-1-se { background-position: -48px -48px; }
    .ui-icon-arrowthick-1-s { background-position: -64px -48px; }
    .ui-icon-arrowthick-1-sw { background-position: -80px -48px; }
    .ui-icon-arrowthick-1-w { background-position: -96px -48px; }
    .ui-icon-arrowthick-1-nw { background-position: -112px -48px; }
    .ui-icon-arrowthick-2-n-s { background-position: -128px -48px; }
    .ui-icon-arrowthick-2-ne-sw { background-position: -144px -48px; }
    .ui-icon-arrowthick-2-e-w { background-position: -160px -48px; }
    .ui-icon-arrowthick-2-se-nw { background-position: -176px -48px; }
    .ui-icon-arrowthickstop-1-n { background-position: -192px -48px; }
    .ui-icon-arrowthickstop-1-e { background-position: -208px -48px; }
    .ui-icon-arrowthickstop-1-s { background-position: -224px -48px; }
    .ui-icon-arrowthickstop-1-w { background-position: -240px -48px; }
    .ui-icon-arrowreturnthick-1-w { background-position: 0 -64px; }
    .ui-icon-arrowreturnthick-1-n { background-position: -16px -64px; }
    .ui-icon-arrowreturnthick-1-e { background-position: -32px -64px; }
    .ui-icon-arrowreturnthick-1-s { background-position: -48px -64px; }
    .ui-icon-arrowreturn-1-w { background-position: -64px -64px; }
    .ui-icon-arrowreturn-1-n { background-position: -80px -64px; }
    .ui-icon-arrowreturn-1-e { background-position: -96px -64px; }
    .ui-icon-arrowreturn-1-s { background-position: -112px -64px; }
    .ui-icon-arrowrefresh-1-w { background-position: -128px -64px; }
    .ui-icon-arrowrefresh-1-n { background-position: -144px -64px; }
    .ui-icon-arrowrefresh-1-e { background-position: -160px -64px; }
    .ui-icon-arrowrefresh-1-s { background-position: -176px -64px; }
    .ui-icon-arrow-4 { background-position: 0 -80px; }
    .ui-icon-arrow-4-diag { background-position: -16px -80px; }
    .ui-icon-extlink { background-position: -32px -80px; }
    .ui-icon-newwin { background-position: -48px -80px; }
    .ui-icon-refresh { background-position: -64px -80px; }
    .ui-icon-shuffle { background-position: -80px -80px; }
    .ui-icon-transfer-e-w { background-position: -96px -80px; }
    .ui-icon-transferthick-e-w { background-position: -112px -80px; }
    .ui-icon-folder-collapsed { background-position: 0 -96px; }
    .ui-icon-folder-open { background-position: -16px -96px; }
    .ui-icon-document { background-position: -32px -96px; }
    .ui-icon-document-b { background-position: -48px -96px; }
    .ui-icon-note { background-position: -64px -96px; }
    .ui-icon-mail-closed { background-position: -80px -96px; }
    .ui-icon-mail-open { background-position: -96px -96px; }
    .ui-icon-suitcase { background-position: -112px -96px; }
    .ui-icon-comment { background-position: -128px -96px; }
    .ui-icon-person { background-position: -144px -96px; }
    .ui-icon-print { background-position: -160px -96px; }
    .ui-icon-trash { background-position: -176px -96px; }
    .ui-icon-locked { background-position: -192px -96px; }
    .ui-icon-unlocked { background-position: -208px -96px; }
    .ui-icon-bookmark { background-position: -224px -96px; }
    .ui-icon-tag { background-position: -240px -96px; }
    .ui-icon-home { background-position: 0 -112px; }
    .ui-icon-flag { background-position: -16px -112px; }
    .ui-icon-calendar { background-position: -32px -112px; }
    .ui-icon-cart { background-position: -48px -112px; }
    .ui-icon-pencil { background-position: -64px -112px; }
    .ui-icon-clock { background-position: -80px -112px; }
    .ui-icon-disk { background-position: -96px -112px; }
    .ui-icon-calculator { background-position: -112px -112px; }
    .ui-icon-zoomin { background-position: -128px -112px; }
    .ui-icon-zoomout { background-position: -144px -112px; }
    .ui-icon-search { background-position: -160px -112px; }
    .ui-icon-wrench { background-position: -176px -112px; }
    .ui-icon-gear { background-position: -192px -112px; }
    .ui-icon-heart { background-position: -208px -112px; }
    .ui-icon-star { background-position: -224px -112px; }
    .ui-icon-link { background-position: -240px -112px; }
    .ui-icon-cancel { background-position: 0 -128px; }
    .ui-icon-plus { background-position: -16px -128px; }
    .ui-icon-plusthick { background-position: -32px -128px; }
    .ui-icon-minus { background-position: -48px -128px; }
    .ui-icon-minusthick { background-position: -64px -128px; }
    .ui-icon-close { background-position: -80px -128px; }
    .ui-icon-closethick { background-position: -96px -128px; }
    .ui-icon-key { background-position: -112px -128px; }
    .ui-icon-lightbulb { background-position: -128px -128px; }
    .ui-icon-scissors { background-position: -144px -128px; }
    .ui-icon-clipboard { background-position: -160px -128px; }
    .ui-icon-copy { background-position: -176px -128px; }
    .ui-icon-contact { background-position: -192px -128px; }
    .ui-icon-image { background-position: -208px -128px; }
    .ui-icon-video { background-position: -224px -128px; }
    .ui-icon-script { background-position: -240px -128px; }
    .ui-icon-alert { background-position: 0 -144px; }
    .ui-icon-info { background-position: -16px -144px; }
    .ui-icon-notice { background-position: -32px -144px; }
    .ui-icon-help { background-position: -48px -144px; }
    .ui-icon-check { background-position: -64px -144px; }
    .ui-icon-bullet { background-position: -80px -144px; }
    .ui-icon-radio-on { background-position: -96px -144px; }
    .ui-icon-radio-off { background-position: -112px -144px; }
    .ui-icon-pin-w { background-position: -128px -144px; }
    .ui-icon-pin-s { background-position: -144px -144px; }
    .ui-icon-play { background-position: 0 -160px; }
    .ui-icon-pause { background-position: -16px -160px; }
    .ui-icon-seek-next { background-position: -32px -160px; }
    .ui-icon-seek-prev { background-position: -48px -160px; }
    .ui-icon-seek-end { background-position: -64px -160px; }
    .ui-icon-seek-start { background-position: -80px -160px; }
    /* ui-icon-seek-first is deprecated, use ui-icon-seek-start instead */
    .ui-icon-seek-first { background-position: -80px -160px; }
    .ui-icon-stop { background-position: -96px -160px; }
    .ui-icon-eject { background-position: -112px -160px; }
    .ui-icon-volume-off { background-position: -128px -160px; }
    .ui-icon-volume-on { background-position: -144px -160px; }
    .ui-icon-power { background-position: 0 -176px; }
    .ui-icon-signal-diag { background-position: -16px -176px; }
    .ui-icon-signal { background-position: -32px -176px; }
    .ui-icon-battery-0 { background-position: -48px -176px; }
    .ui-icon-battery-1 { background-position: -64px -176px; }
    .ui-icon-battery-2 { background-position: -80px -176px; }
    .ui-icon-battery-3 { background-position: -96px -176px; }
    .ui-icon-circle-plus { background-position: 0 -192px; }
    .ui-icon-circle-minus { background-position: -16px -192px; }
    .ui-icon-circle-close { background-position: -32px -192px; }
    .ui-icon-circle-triangle-e { background-position: -48px -192px; }
    .ui-icon-circle-triangle-s { background-position: -64px -192px; }
    .ui-icon-circle-triangle-w { background-position: -80px -192px; }
    .ui-icon-circle-triangle-n { background-position: -96px -192px; }
    .ui-icon-circle-arrow-e { background-position: -112px -192px; }
    .ui-icon-circle-arrow-s { background-position: -128px -192px; }
    .ui-icon-circle-arrow-w { background-position: -144px -192px; }
    .ui-icon-circle-arrow-n { background-position: -160px -192px; }
    .ui-icon-circle-zoomin { background-position: -176px -192px; }
    .ui-icon-circle-zoomout { background-position: -192px -192px; }
    .ui-icon-circle-check { background-position: -208px -192px; }
    .ui-icon-circlesmall-plus { background-position: 0 -208px; }
    .ui-icon-circlesmall-minus { background-position: -16px -208px; }
    .ui-icon-circlesmall-close { background-position: -32px -208px; }
    .ui-icon-squaresmall-plus { background-position: -48px -208px; }
    .ui-icon-squaresmall-minus { background-position: -64px -208px; }
    .ui-icon-squaresmall-close { background-position: -80px -208px; }
    .ui-icon-grip-dotted-vertical { background-position: 0 -224px; }
    .ui-icon-grip-dotted-horizontal { background-position: -16px -224px; }
    .ui-icon-grip-solid-vertical { background-position: -32px -224px; }
    .ui-icon-grip-solid-horizontal { background-position: -48px -224px; }
    .ui-icon-gripsmall-diagonal-se { background-position: -64px -224px; }
    .ui-icon-grip-diagonal-se { background-position: -80px -224px; }

    /* Misc visuals
----------------------------------*/

    /* Corner radius */
    .ui-corner-all,
    .ui-corner-top,
    .ui-corner-left,
    .ui-corner-tl {
        border-top-left-radius: 3px;
    }
    .ui-corner-all,
    .ui-corner-top,
    .ui-corner-right,
    .ui-corner-tr {
        border-top-right-radius: 3px;
    }
    .ui-corner-all,
    .ui-corner-bottom,
    .ui-corner-left,
    .ui-corner-bl {
        border-bottom-left-radius: 3px;
    }
    .ui-corner-all,
    .ui-corner-bottom,
    .ui-corner-right,
    .ui-corner-br {
        border-bottom-right-radius: 3px;
    }

    /* Overlays */
    .ui-widget-overlay {
        background: #aaaaaa;
        opacity: .3;
        filter: Alpha(Opacity=30); /* support: IE8 */
    }
    .ui-widget-shadow {
        -webkit-box-shadow: 0px 0px 5px #666666;
        box-shadow: 0px 0px 5px #666666;
    }

    table {
        border-collapse: collapse;
    }
    table td {
        padding: 0px 5px;

    }

</style>
@section('head-title')
    {{"Declaration Print"}}
@endsection
@section('title-left')

@endsection
@section('title')
    @parent

@endsection
@section('title-right')

@endsection
@section('top')

@endsection
@section('content-top')
    <table class="table-condensed" width="100%">
        <tr>
            <td align="right" style="vertical-align: center">
                <img src="{{public_path().'/projects/health-declaration/logo/GoB.png'}}" width="70px"/>
            </td>
            <td align="center" style="vertical-align: middle">
                <h3>Government of the People's Republic of Bangladesh</h3>
                <h3>Ministry of Health & Family Welfare</h3>
            </td>
            <td align="left" style="vertical-align: center">
                <img src="{{public_path().'/projects/health-declaration/logo/dghs.jpg'}}" width="70px"/>
            </td>
        </tr>
    </table>
@endsection
@section('content')
    <h4 align="center">Health Declaration Card</h4>

    <div class="col-md-12 no-padding no-margin" style="width: 200px; vertical-align: center">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($content)) !!} "
             alt="{{$content}}">
    </div>

    <div class="clearfix"></div>
    @if($declaration->decision=='You are Allowed to Travel')
        <h4 style="color:green;"> Decision: {{$declaration->decision}}. {!! "&#10003" !!}</h4>
        <div class="clearfix"></div>
        @if(((isset($declaration->have_covid_symptoms) && $declaration->have_covid_symptoms)) || (isset($declaration->have_monkey_pox_symptoms) && $declaration->have_monkey_pox_symptoms))
            <h4 style="color:red;">After coming to Bangladesh please contact with Health Desk Before Immigration</h4>
            <h4 style="color:red;font-family:solaiman-lipi">বাংলাদেশে আসার পর ইমিগ্রেশনের আগে হেলথ ডেস্কের সাথে যোগাযোগ করুন</h4>
        @endif
    @else
        <h4 style="color:red;"> Decision: {{$declaration->decision}}. {!! "&#10060" !!}</h4>
    @endif



    <h4>Personal Information</h4>
    <table class="table table-bordered no-padding" width="100%">
        <tr>
            <td>Name</td>
            <td>{{$declaration->passenger_name}}</td>
            <td>Gender</td>
            <td>{{$declaration->gender}}</td>
        </tr>
        <tr>
            <td>Passport No</td>
            <td>{{$declaration->passport_no}}</td>
            <td>Nationality</td>
            <td>{{$declaration->nationality}}</td>

        </tr>
        <tr>
            <td>Mode of Transportation</td>
            <td>{{ucwords($declaration->mode_of_transport)}}</td>
            <td>Visiting From</td>
            <td>{{$declaration->journey_from_country_name}}</td>
        </tr>
        <tr>
            <td>Arrival Date</td>
            <td>{{formatDate($declaration->arrival_date)}}</td>
            <td>Staying At</td>
            <td>{{$declaration->division_name." , ".$declaration->district_name}}</td>
        </tr>
    </table>
    <h4>Covid Information</h4>
    <table class="table table-bordered no-padding" width="100%">

        <tr>
            <td>Has COVID-19 Vaccination</td>
            <td>{!!formatBoolean($declaration->is_vaccinated)!!}</td>
            {{--            <td>Covid-19 Vaccination Name</td>--}}
            {{--            <td>{{$declaration->primary_vaccine_name}}</td>--}}
        </tr>
        {{--        <tr>--}}
        {{--            <td>1st Dose Date</td>--}}
        {{--            <td>{{$declaration->first_vaccine_date}}</td>--}}
        {{--            <td>2nd Dose Date</td>--}}
        {{--            <td>{{$declaration->second_vaccine_date}}</td>--}}
        {{--        </tr>--}}
        <tr>
            <td>Negative In RT-PCR test in last 72 hours?</td>
            <td>{!!formatBoolean($declaration->is_rt_pcr_negative)!!}</td>
            <td>Declaration Created at</td>
            <td>{{formatDateTime($declaration->created_at)}}</td>
        </tr>

    </table>

@endsection
@section('content-bottom')

    <h4>Please carry all necessary documents (Vaccination Certificate/Covid-19 Test Result) with this card.</h4>
    <h4 style="color:red;font-family:solaiman-lipi">অনুগ্রহ করে এই কার্ডের সাথে সমস্ত প্রয়োজনীয় কাগজপত্র (টিকাকরণ শংসাপত্র/কোভিড-১৯ পরীক্ষার ফলাফল) সঙ্গে
        রাখুন।</h4>
    {{--    <div class="col-md-6  no-padding pull-left margin">--}}
    {{--        {!! $title ?? '' !!}--}}
    {{--        <span class="small">{!! $content !!}</span>--}}
    {{--    </div>--}}
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@show