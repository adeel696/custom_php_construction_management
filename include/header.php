<div class="navbar">
<div class="navbar-inner">
<div class="container-fluid">
    <a href="home.php" class="brand">
        <small>
            <i class="icon-home"></i>
            <strong>SB<font size="2"> - Snowra Builders</font></strong>
        </small>
    </a><!--/.brand-->

    <ul class="nav ace-nav pull-right">						
        <li class="light-blue" >
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <span style="font-size:12px" >
                    Welcome, <?php if (isset($_SESSION['SN_USER'])) echo $_SESSION['SN_USER']; ?>								
                </span>

                <i class="icon-caret-down"></i>
            </a>

            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                <li>
                    <a href="signout.php">
                        <i class="icon-off"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul><!--/.ace-nav-->
</div><!--/.container-fluid-->
</div>
<!--/.navbar-inner-->
</div>


<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
</a>


<div class="sidebar" id="sidebar">
    <ul class="nav nav-list">
    <li id="owners">
        <a href="#" class="dropdown-toggle">
            <i class="icon-user"></i>
            <span class="menu-text">Person</span>
            <b class="arrow icon-angle-down"></b>
        </a>
        <ul class="submenu">                        
            <li id="new_person">
                <a href="addPerson.php"><i class="icon-double-angle-right"></i>Add</a>
            </li>
            <li id="view_person">
                <a href="viewPerson.php"><i class="icon-double-angle-right"></i>View</a>
            </li>
            <li id="person_account">
                <a href="personAccount.php"><i class="icon-double-angle-right"></i>Account</a>
            </li>
        </ul>
    </li>    
    
    <li id="stock">
        <a href="#" class="dropdown-toggle">
            <i class="icon-list-alt"></i>
            <span class="menu-text">Stock</span>
            <b class="arrow icon-angle-down"></b> 
        </a>
        <ul class="submenu">                        
            <li id="add_stock">
                <a href="addStock.php"><i class="icon-double-angle-right"></i>Add</a>
            </li>
            <li id="viewstock">
                <a href="viewStock.php"><i class="icon-double-angle-right"></i>View</a>
            </li>
            <li id="updatestock">
                <a href="updateStock.php"><i class="icon-double-angle-right"></i>Update</a>
            </li>
        </ul>
    </li>
        
    <li id="report">
        <a href="#" class="dropdown-toggle">
            <i class="icon-bar-chart"></i>
            <span class="menu-text">Reports</span>
            <b class="arrow icon-angle-down"></b> 
        </a>
        <ul class="submenu">                        
            <li id="account_reports">
                <a href="accountReports.php"><i class="icon-double-angle-right"></i>Account</a>
            </li>
            <li id="stock_reports">
                <a href="stockReports.php"><i class="icon-double-angle-right"></i>Stock</a>
            </li>
        </ul>
    </li>  
    
    <li id="type">
        <a href="#" class="dropdown-toggle">
            <i class="icon-wrench"></i>
            <span class="menu-text">Type</span>
            <b class="arrow icon-angle-down"></b> 
        </a>
        <ul class="submenu">                        
            <li id="person_type">
                <a href="personType.php"><i class="icon-double-angle-right"></i>Person Type</a>
            </li>
            <li id="stock_type">
                <a href="stockType.php"><i class="icon-double-angle-right"></i>Stock Type</a>
            </li>
        </ul>
    </li>  
    
    <div id="sidebar-collapse" class="sidebar-collapse">
        <i class="icon-double-angle-left"></i>
    </div>
				
</div>