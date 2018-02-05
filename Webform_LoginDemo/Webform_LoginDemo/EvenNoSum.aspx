<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="EvenNoSum.aspx.cs" Inherits="Webform_LoginDemo.EvenNoSum" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <asp:TextBox ID="txtEvenNo" runat="server"></asp:TextBox> <asp:Button ID="Sum" runat="server" Text="Sum of even number" OnClick="Sum_Click" />
    <br />
    <asp:Label ID="lblResult" runat="server" Text="Result : 0"></asp:Label>
</asp:Content>
