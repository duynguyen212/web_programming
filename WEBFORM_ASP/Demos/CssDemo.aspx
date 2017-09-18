<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="CssDemo.aspx.vb" Inherits="WEBFORM_ASP.CssDemo" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CSS Demo</title>

    <style>
        h1 {
            font-size: 20px;
            color: green;
        }

        p{
            color: #0000FF;
            font-style: italic;
        }

        .RightAligned {
            text-align : right;
        }
    </style>
</head>
<body>
    <div>
        <h1>Welcome to this CSS Demo Page</h1>
        <p>CSS makes it super easy to style your pages</p>
        <p class="RightAligned">With very little code, you can quickly change the looks of a page</p>
    </div>
</body>
</html>
