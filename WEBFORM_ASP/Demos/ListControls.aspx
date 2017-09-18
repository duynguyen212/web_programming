<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="ListControls.aspx.vb" Inherits="WEBFORM_ASP.ListControls" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:DropDownList ID="DropDownList1" runat="server">
                <asp:ListItem>C#</asp:ListItem>
                <asp:ListItem>Visual Basic</asp:ListItem>
                <asp:ListItem>CSS</asp:ListItem>
            </asp:DropDownList>
            <asp:CheckBoxList ID="CheckBoxList1" runat="server">
                <asp:ListItem>C#</asp:ListItem>
                <asp:ListItem>Visual Basic</asp:ListItem>
                <asp:ListItem>CSS</asp:ListItem>
            </asp:CheckBoxList>

            <br />
            <asp:Button ID="Button1" runat="server" Text="Button" />
            <br />
            <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            <br />

        </div>
    </form>
</body>
</html>
