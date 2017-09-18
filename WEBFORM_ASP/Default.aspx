<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="Default.aspx.vb" Inherits="WEBFORM_ASP._Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style type="text/css">
        .auto-style1 {
            color: #FF0000;
        }
        .nouveauStyle1 {
            padding: 0px;
            margin: 0px 0px 10px 0px;
        }
        .Introduction {
            color: #0000FF;
            font-style: italic;
        }
    </style>
    <link href="Styles/Styles.css" rel="stylesheet" />
    <script src="Scripts/modernizr-2.8.3.js"></script>
</head>
<body>
    <form id="form1" runat="server">
        <div id="PageWrapper">
            <header>Header Goes Here</header>
            <nav>Nav Goes Here</nav>
            <section id="MainContent">
                <h1>Hi there visitor and welcome to Planet Wrox </h1>
                <p class="Introduction">
                    We're glad you're<span class="auto-style1"> paying a visit</span> to <a href="http://www.planetwrox.com">www.PlanetWrox.com</a> the coolest music community site on the internet.
                </p>
                <p>
                    Feel free to have a look around, there are lots of interesting reviews and concerts pictures to be found here</p>
            </section>
            <aside id="Sidebar">Sidebar Goes Here</aside>
            <footer>Footer Goes Here</footer>
        </div>
    </form>
</body>
</html>
