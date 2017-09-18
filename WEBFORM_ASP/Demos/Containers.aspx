<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="Containers.aspx.vb" Inherits="WEBFORM_ASP.Containers" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:CheckBox ID="CheckBox1" runat="server" AutoPostBack="True"  OnCheckedChanged = "CheckBox1_CheckedChanged" Text="Show Panel" />
            <asp:Panel ID="Panel1" runat="server" Visible="False">
                <asp:Wizard ID="Wizard1" runat="server" ActiveStepIndex="1" StartNextButtonText="Next" StepNextButtonText="Next" StepPreviousButtonText="Previous" Width="500px">
                    <WizardSteps>
                        <asp:WizardStep ID="WizardStep1" runat="server" Title="About You">Type your name&nbsp;
                            <asp:TextBox ID="txtYourName" runat="server"></asp:TextBox>
                        </asp:WizardStep>
                        <asp:WizardStep ID="WizardStep2" runat="server" Title="Favorite Language" StepType="Finish">
                            <asp:DropDownList ID="ddlFavoriteLanguage" runat="server">
                                <asp:ListItem>C#</asp:ListItem>
                                <asp:ListItem>Visual Basic</asp:ListItem>
                                <asp:ListItem>CSS</asp:ListItem>
                            </asp:DropDownList>
                        </asp:WizardStep>
                        <asp:WizardStep runat="server" StepType="Complete" Title="Ready">
                            <asp:Label ID="lblResult" runat="server"></asp:Label>
                        </asp:WizardStep>
                    </WizardSteps>
                </asp:Wizard>

            </asp:Panel>
            <br />
        </div>
    </form>
</body>
</html>
