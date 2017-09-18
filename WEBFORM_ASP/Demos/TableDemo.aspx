<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="TableDemo.aspx.vb" Inherits="WEBFORM_ASP.TableDemo" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style type="text/css">
        .auto-style1 {
            width: 100%;
        }
        .auto-style2 {
            height: 23px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <table class="auto-style1">
                <tr>
                    <td class="auto-style2">Bulleted List</td>
                    <td class="auto-style2">
                        <ul>
                            <li>Punk</li>
                            <li>Rock</li>
                            <li>Techno</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Numbered List</td>
                    <td>
                        <ol>
                            <li>Jazz</li>
                            <li>Hip Hop</li>
                            <li>Trip Hop</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td><a href="http://wrox.com">Go to homepage of Planet Wrox</a></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
