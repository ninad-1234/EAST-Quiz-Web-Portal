<html>
    <head>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        
            header{
                width: 100%;
            }
            
            nav{
                margin-top: 0.5%;
                margin-left: 1%;
                margin-right: 1%;
                width: 100%;
            }
            
            nav>div{
                display: inline;
            }
            
            nav>div>a{
                background-color: #EEEEEE;
                text-decoration: none;
                padding-left: 2.2%;
                padding-right: 2.2%;
                padding-top: 1%;
                padding-bottom: 1%;
                text-align: center;
                display: inline-block;
                width: 11.5vw;
                
            }
            
            .dropdown{
                display: none;
                margin-left:
                align-item
            }
            
            .menuitem: hover{
                color:blue;
                background:yellow;
                display: block;
            }
            
            .menuitem a: hover{
                background-color:blue;
                background:yellow;
                display: inline;
            }
            
            .submenuitems{
                display: block;
                list-style: none;
            }
            
            .submenuitems > li > a{
                display: block;
            }
            
            .menuitem:hover  .dropdown{
                display: block;
                position: absolute;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <header>
            <nav>
                <div class = "menuitem">
                    <a href = "">About us</a>
                </div>
                <div class = "menuitem">
                    <a href = "">Home page</a>
                </div>
                <div class = "menuitem">
                    <a href="">Test results</a>
                </div>
                <div class = "menuitem">
                    <a href = "">Profile</a>
                        <div class = "dropdown">
                            <ul class = "submenuitems">
                                <li><a href= "view_profile.php">View</a></li>
                                <li><a href= "">Edit</a></li>
                            </ul>
                        </div>
                </div>
                <div class = "menuitem">
                    <a href = "">Discussion forum</a>
                </div>
                <div class = "menuitem">
                    <a href = "">Contact us</a>
                </div>
            </nav>
        </header>
    </body>
</html>
