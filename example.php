<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Sample</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
<div class="container-fluid">
	
   <div class="row-fluid">
   	Navigation
   </div>
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
      <div class="well well-small">
          <div class="btn-group">
          <button class="btn">Left</button>
          <button class="btn">Middle</button>
          <button class="btn">Right</button>
        </div>
        </div>
    </div>
    <!--Boby content-->		
    <div class="span10">
        <div class="tabbable">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                    <a href="#tab1" data-toggle="tab">
                        <i class="green icon-home bigger-110"></i>
                        Tab1
                    </a>
                </li>

                <li>
                    <a href="#tab2" data-toggle="tab">
                        Tab2
                        <span class="badge badge-important"></span>
                    </a>
                </li>
                
                <li>
                    <a href="#tab3" data-toggle="tab">
                        Tab3
                        <span class="badge badge-important"></span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane in active" id="tab1">
                    <p>Tab 1.</p>
                </div>

                <div class="tab-pane" id="tab2">
                    <p>Tab 2</p>
                </div>
                
                <div class="tab-pane" id="tab3">
                    <p>Tab 3</p>
                </div>
                
            </div>
        </div>
    </div>

  </div>
</div>




<div>
<img src="img/info.png" id="info"
rel="popover" 
data-content="Info" 
data-original-title="Title">
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <script>
	$(function (){
         $("#info").popover( );
      });
	</script>
  </body>
</html>