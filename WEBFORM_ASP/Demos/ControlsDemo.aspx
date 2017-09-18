<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="ControlsDemo.aspx.vb" Inherits="WEBFORM_ASP.ControlsDemo" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <h1>Heading 1</h1>

            <asp:TextBox ID="TextBox1" runat="server" Width="250px"></asp:TextBox>
            <asp:Button ID="Button1" runat="server" Text="Submit Information" />
            <br />
            <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Size="XX-Large" ForeColor="#009933"></asp:Label>
        </div>
    </form>
</body>
</html>
